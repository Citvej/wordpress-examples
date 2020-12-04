@php 
  $slug = get_post_field( 'post_name', get_post() );
  if(!$slug) $slug = '';
@endphp
<header class="banner">
  <div class="header-info">
    <div class="container-fluid">
      <nav class="header-info__nav">

        @php wp_nav_menu( array(
          'theme_location' => 'top_navigation_left',
          'container_class' => 'header-info__left',
          'add_li_class'  => 'header-info__link'
          ));
        @endphp
        
        @php wp_nav_menu( array(
          'theme_location' => 'top_navigation_right',
          'container_class' => 'header-info__right',
          'add_li_class'  => 'header-info__link header-info__link-right'
          ));
        @endphp

      </nav>
    </div>
  </div>
  <div class=header-main>
    <div class="container-fluid">
      <nav class="nav-primary">
        <div class="nav-primary__left">
          <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
        </div>
        <div class="nav-primary__right">
          <div class="nav-primary__desktop collapse" id="collapseMenu">
            <div class="close-menu">
              <a data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="false" aria-controls="collapseMenu">
                <img src="@asset('images/close-icon.svg')" alt="Close menu">
              </a>
            </div>
            <div class="nav-primary__main">
            @php wp_nav_menu( array(
              'theme_location' => 'primary_navigation',
              'container' => '',
              'container_class' => '',
              'menu_class' => 'main-menu',
              'add_li_class'  => 'nav-primary__item'
            ));

            $numItems = \App\getNumItemsCart();
            @endphp
            </div>
            <div class="nav-primary__buttons">
              <a href="{{ esc_url(get_permalink(wc_get_page_id('myaccount'))) }}" class="nav-primary__icon nav-primary__profile">
                <img class="icon" src="@asset('images/icon-account.svg')" alt="Acc">
              </a>
              <a href="{{ esc_url(get_permalink(wc_get_page_id('cart'))) }}" class="nav-primary__icon nav-primary__basket">
                <img class="icon" src="@asset('images/icon-basket.svg')" alt="Acc">
                <div class="basket-count">{{ $numItems }}</div>
              </a>
            </div>
          </div>
          <div class="nav-primary__mobile">
            <a class="open-menu" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="false" aria-controls="collapseMenu">
              <img src="@asset('images/burger-menu.svg')" alt="Open menu">
            </a>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>
