@php

$heroTitle = get_field('kontakt_hero_naslov');
$heroText = get_field('kontakt_hero_text');
$email = get_field('kontakt_email');

$imageLeft = get_field('kontakt_slika_levo');
$imageRight = get_field('kontakt_slika_desno');
$imageResponsive = get_field('kontakt_slika_desno');

$imePodjetja = get_field('ime_podjetja', 'option');
$skrajsanoPodjetje = get_field('skrajsano_ime_podjetja', 'option');
$ulica = get_field('ulica_podjetja', 'option');
$kraj = get_field('kraj_podjetja', 'option');
$drzava = get_field('drzava_podjetja', 'option');

@endphp

<div id="contact">
    <div class="container-fluid">
        <div class="contact-info row">
            <div class="col-md-4 contact-info__image d-none d-md-block"><img class="w-100" src="{{$imageLeft}}" alt=""></div>
            <div class="col-md-4 text-center">
                <div class="contact-info__content">
                    <img src="@asset('images/contact-responsive.svg')" alt="phone in hand illustration" class="d-md-none mb-2">
                    <h1 class="heading-1 text-md-center">{{ $heroTitle }}</h1>
                    <p class="subtext">
                        {!! $heroText !!}
                    </p>
                    <div class="mt-5">Elektronski naslov:</div>
                    <div class="contact-info__email mt-2">
                        <a href="mailto:{{$email}}">{{ $email }}</a>
                    </div>
                    <div class="contact-form">
                        @php
                            echo do_shortcode('[contact-form-7 id="30" title="Kontakt"]');
                        @endphp
                    </div>
                </div>
            </div>
            <div class="col-md-4 contact-info__image d-none d-md-block"><img class="w-100" src="{{$imageRight}}" alt=""></div>
        </div>
    </div>
    <div class="contact-map">
        <div class="container">
            <div class="row d-flex justify-content-center justify-content-md-start">
                <div class="contact-info-block mw-100 mx-5 mx-md-0">
                    <ul>
                        <img src="@asset('images/contact-block-image.svg')" alt="" class="contact-info-block__image">
                        <li class="contact-info-block__item"><strong>Podjetje</strong></li>
                        <li class="contact-info-block__item">{{ $imePodjetja }}</li>
                        <li class="contact-info-block__item">{{ $skrajsanoPodjetje }}</li>
                        <li class="contact-info-block__item">{{ $ulica }}</li>
                        <li class="contact-info-block__item">{{ $drzava ? "$kraj, $drzava" : "$kraj"}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
