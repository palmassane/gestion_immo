<div class="header__container">
    <div class="header__inner">
        <div class="header__aside">
            <h2 class="header__title" style="">
                {{ __('Rejoignez-nous') }}
            </h2>

            <div class="header__social">
                <ul class="header__list-social">
                    @if ( isset($_setting->facebook_url) && !empty($_setting->facebook_url) )
                        <li class="header__list-social-item">
                            <a
                                class="header__list-social-item__link"
                                href="{{ $_setting->facebook_url }}"
                                target="_blank"
                            >
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                    @endif

                    @if ( isset($_setting->twitter_url) && !empty($_setting->twitter_url) )
                        <li class="header__list-social-item">
                            <a
                                class="header__list-social-item__link"
                                href="{{ $_setting->twitter_url }}"
                                target="_blank"
                            >
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    @endif

                    @if ( isset($_setting->instagram_url) && !empty($_setting->instagram_url) )
                        <li class="header__list-social-item">
                            <a
                                class="header__list-social-item__link"
                                href="{{ $_setting->instagram_url }}"
                                target="_blank"
                            >
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    @endif

                    @if ( isset($_setting->linkedin_url) && !empty($_setting->linkedin_url) )
                        <li class="header__list-social-item">
                            <a
                                class="header__list-social-item__link"
                                href="{{ $_setting->linkedin_url }}"
                                target="_blank"
                            >
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="header__content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="header-logo navbar-brand" href="/">
                    <img src="{{ asset('images/logo.png') }}" class="header-logo__img" height="30">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                {{ __('Acheter') }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Maisons à vendre</a>
                                <a class="dropdown-item" href="#">Terrains à vendre</a>
                                <a class="dropdown-item" href="#">Appartements à vendre</a>
                                <a class="dropdown-item" href="#">Propriétés commerciales à vendre</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown">
                                {{ __('Louer') }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                <a class="dropdown-item" href="#">Maisons de vacances</a>
                                <a class="dropdown-item" href="#">Chambres à louer</a>
                                <a class="dropdown-item" href="#">Chambres vide</a>
                                <a class="dropdown-item" href="#">Appartements meublés</a>
                                <a class="dropdown-item" href="#">Propriétés commerciales à louer</a>
                                <a class="dropdown-item" href="#">Maisons à louer</a>
                                <a class="dropdown-item" href="#">Appartements à louer</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="tel:{{ isset($_setting->phone_number) && !empty($_setting->phone_number) ?
                                    $_setting->phone_number :
                                    config('core.contact.default-customer-service') }}"
                            >
                                <i class="fas fa-phone"></i>
                                {{ __('Appelez nous') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            @hasSection('header-section')
                @yield('header-section')
            @else
                @include('layouts.partials._header._carousel')
            @endif
        </div>
    </div>
</div>
