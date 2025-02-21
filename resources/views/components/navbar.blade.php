<nav class="navbar navbar-expand-lg c-bg-lBlue fixed-top shadow">
    <div class="container-fluid d-flex align-items-center">
        {{-- <a class="navbar-brand logo" href="#">Presto.it</a> --}}
        <a href="{{ route('homepage') }}">
            <img src="/media/logo/logo-presto2-black.png" class="me-2 mb-1" style="height: 30px" alt="logo-home">
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <div class="d-flex align-items-center" id="containerMobileMenu">
                <ul class="navbar-nav d-flex align-items-start align-items-xl-center ">
                    <li class="nav-item ">
                        <a class="nav-link c-nav-text pb-2 pb-md-0 pt-0 " aria-current="page" id="mobileMenu"
                            href="{{ route('homepage') }}">{{ __('ui.home') }}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link c-nav-text pb-2 pb-md-0 pt-0"
                            href="{{ route('article.index') }}">{{ __('ui.catalog') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle c-nav-text pb-2 pb-md-0 pt-0" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">{{ __('ui.categories') }}</a>
                        <ul class="dropdown-menu c-bg-lBlue border-0">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item c-nav-text text-capitalize"
                                        href="{{ route('byCategory', ['category' => $category]) }}">{{ __('ui.' . $category->name) }}</a>
                                </li>
                                @if (!$loop->last)
                                    <hr class="m-0 p-0">
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="containerSearch w-100 px-3 d-none d-md-block">
                <form class="d-flex align-items-center " role="search" action="{{ route('article.search') }}"
                    method="GET">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control m-0 rounded-5 border-0"
                            placeholder="{{ __('ui.search_placeholder') }}" aria-label="search">
                    </div>
                </form>
            </div>

            <div class="d-flex flex-column flex-lg-row align-items-lg-center">
                @auth
                    {{-- button revisor --}}
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item list-unstyled me-3">
                            <a class="nav-link text-decoration-none c-nav-text px-lg-2 pe-md-3 pb-2 pb-md-0 pt-0 d-flex align-items-center"
                                href="{{ route('revisor.index') }}">
                                <i
                                    class="bi bi-list-check c-text-lightBlack d-none d-lg-flex align-items-center justify-content-center fw-bold fs-5 pt-1"><span
                                        class="translate-middle badge align-items-center justify-content-center"
                                        id="notificheReview">{{ \App\Models\Article::toBeRevisedCount() }}
                                    </span></i>{{ __('ui.revisor') }}<span
                                    class="translate-middle badge align-items-center justify-content-center d-lg-none d-flex"
                                    id="notificheReview">{{ \App\Models\Article::toBeRevisedCount() }}
                                </span>
                            </a>
                        </li>
                    @endif
                    {{-- button vendi --}}
                    <li class="nav-item dropdown d-flex justify-content-start">
                        <a class="nav-link c-nav-text py-md-0 pe-lg-2 pe-md-3 d-flex align-items-center pb-1 pb-lg-0"
                            href="{{ route('article.create') }}">
                            <i
                                class="bi bi-plus-circle c-text-lightBlack fw-bold fs-5 pb-1 pe-1 d-none d-lg-flex"></i>{{ __('ui.sell') }}
                        </a>
                    </li>
                    {{-- button account --}}
                    <li class="nav-item dropdown d-flex justify-content-start">
                        <a class="nav-link dropdown-toggle c-nav-text py-md-0 pe-lg-2 px-lg-3 d-flex align-items-center mt-1 mt-md-0"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i
                                class="bi bi-person c-text-lightBlack d-none d-lg-flex align-items-center justify-content-center fw-bold fs-4"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu c-bg-lBlue border-0">
                            <li>
                                <a class="dropdown-item c-nav-text" href=""
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{ __('ui.logout') }}</a>
                            </li>
                            <form action="{{ route('logout') }}" method="POST" id="form-logout" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link dropdown-toggle c-nav-text pe-3" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('ui.guest') }}
                        </a>
                        <ul class="dropdown-menu c-bg-lBlue border-0">
                            <li><a class="dropdown-item c-nav-text" href="{{ route('login') }}">{{ __('ui.login') }}</a>
                            </li>
                            <li><a class="dropdown-item c-nav-text"
                                    href="{{ route('register') }}">{{ __('ui.register') }}</a></li>
                        </ul>
                    </li>
                @endguest

                <li class="nav-item dropdown list-unstyled">
                    <a class="nav-link dropdown-toggle c-nav-text" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- Mostra l'icona della lingua selezionata --}}
                        @if(session('locale') == 'it')
                            <x-_locale lang="it" />
                        @elseif(session('locale') == 'en')
                            <x-_locale lang="en" />
                        @elseif(session('locale') == 'es')
                            <x-_locale lang="es" />
                        @else
                            <x-_locale lang="it" /> {{-- default lingua --}}
                        @endif
                    </a>

                    <ul class="dropdown-menu c-bg-lBlue border-0 c-language" data-bs-popper="true">
                        <!-- Opzione per l'italiano -->
                        <li>
                            <a class="dropdown-item c-nav-text" href="{{ route('setLocale', 'it') }}">
                                <x-_locale lang="it" />
                                Ita
                            </a>
                        </li>

                        <!-- Opzione per l'inglese -->
                        <li>
                            <a class="dropdown-item c-nav-text" href="{{ route('setLocale', 'en') }}">
                                <x-_locale lang="en" />
                                Eng
                            </a>
                        </li>

                        <!-- Opzione per lo spagnolo -->
                        <li>
                            <a class="dropdown-item c-nav-text" href="{{ route('setLocale', 'es') }}">
                                <x-_locale lang="es" />
                                Esp
                            </a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>

</nav>
