@php
$id = get_option( 'woocommerce_shop_page_id' );
$heroTitle = get_field('trgovina_hero_title', $id);
$heroText = get_field('trgovina_hero_text', $id);

@endphp

@extends('layouts.templates')

@section('content')
<div id="store">
  @php
    do_action('get_header', 'shop');
    do_action('woocommerce_before_main_content');
  @endphp

  <div class="container">
    <div class="store-hero text-center">
      <h1 class="heading-1 heading-1--center">{{ $heroTitle }}</h1>
      <p class="subtext">{{ $heroText }}</p>
    </div>
  </div>
  
  @include('partials.product-types')

  <div class="store-products">

    @if(woocommerce_product_loop())
    <div class="container">

      <div class="clearfix">
      @php
        do_action('woocommerce_before_shop_loop');
      @endphp
      </div>
      
      @php
        woocommerce_product_loop_start();
      @endphp

      @if(wc_get_loop_prop('total'))

        @while(have_posts())
        @php
          the_post();
          do_action('woocommerce_shop_loop');
          wc_get_template_part('content', 'product');
        @endphp
        @endwhile

        @endif

      @php
        woocommerce_product_loop_end();
        do_action('woocommerce_after_shop_loop');
      @endphp
    @else
      @php
        do_action('woocommerce_no_products_found');
      @endphp
    @endif

    <!-- START Custom pagination -->
    @php
    /*
    global $wp_query;
    $big = 999999999;
    */

    $links = paginate_links( array(
      /*
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?page=%#%',
      'total' => $wp_query->max_num_pages,
      'current' => max( 1, get_query_var( 'paged') ),
      'show_all' => false,
      */
      'prev_next' => false,
      'type' => 'array',
      'end_size' => 3,
      'mid_size' => 2,
    ) );
    @endphp

    @if( $links )
    <div class="row posts-navigation">
      <div class="btn-list-item btn-list-item--prev order-md-1">
        @if($prev_posts_link = get_previous_posts_link(__( 'Prejšnja stran', 'sage')))
          {!! $prev_posts_link !!}
        @endif
      </div>

      <ul class="col page-numbers-container mt-2 mt-md-0 order-2"><li>{!! join( '</><li>', $links) !!}</li></ul>

      <div class="btn-list-item btn-list-item--next order-md-3">
        @if($next_posts_link = get_next_posts_link(__( 'Naslednja stran', 'sage')))
          {!! $next_posts_link !!}
        @endif
      </div>
    </div>
    @else
    <div class="pagination-spacer"></div>
    @endif
    <!-- END Custom pagination -->

    </div>
  </div>
  
  <div class="store-features">
      <div class="container">
          @include('partials.section-features')
      </div>
  </div>

  @include('partials.section-newsletter')

  @php
    do_action('woocommerce_after_main_content');
    do_action('get_sidebar', 'shop');
    do_action('get_footer', 'shop');
  @endphp

@endsection
