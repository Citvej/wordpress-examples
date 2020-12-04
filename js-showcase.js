//lazy load images
//gets images from the supplier reference
//and loads them onto the products one by one
function getProductImages($articleImageArray, i, len) {
	if(i >= len) return;
	let $articleImage = $($articleImageArray[i]);
	let supplierReference = $articleImage.parent('.article-image-wrapper').find('#supplierReference').text();
	let url = '/images/products/' + supplierReference;
	$.ajax({
		type: 'GET',
		url: url,
		success: (imageNames) => {
			imageNames = JSON.parse(imageNames);
			let imageUrl = url + '/' + imageNames['imageNames'][0];
			imageUrl = encodeURI(imageUrl);
			$articleImage.css('background-image', 'url(\'' + imageUrl + '\')');
			i++
			getProductImages($articleImageArray, i, len);
		},
		error: (err) => {
		}
	});
}

function getUser() {
  let url = '/me';

  return $.ajax({
      type: 'GET',
      url: url,
      async: false,
      success: (result) => {
          user = JSON.parse(result);
      },
      error: (err) => {
          user = [];
      },
  });
}

function getCart() {
  let url = '/cart';

  return $.ajax({
      type: 'GET',
      url: url,
      async:false,
      success: (result) => {
          cart = JSON.parse(result);
          cart = cart['cart'];
      }
  });
}
