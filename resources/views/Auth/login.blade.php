<x-layout>
    <x-slot name="titolo">
        {{ __('ui.login_title') }}
    </x-slot>
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center p-5 my-5">
                <form class="form rounded-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h5 class="c-text-lightBlack c-form-title">{{__('ui.login_form_title')}}</h5>
                    <div class="input-container">
                        <input placeholder="Inserisci la mail" type="email" name="email" id="email">
                        <span>
                            <svg stroke="currentColor" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                    stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="input-container">
                        <input placeholder="Inserisci la password" type="password" name="password" id="password">

                        <span>
                            <svg stroke="currentColor" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round"
                                    stroke-linecap="round"></path>
                                <path
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                            </svg>
                        </span>
                    </div>
                    <div>
                        <label for="remember">Ricordami</label>
                        <input placeholder="Inserisci la password" type="checkbox" name="remember" id="remember">
                    </div>
                    <button class="submit" type="submit">
                    {{__('ui.login_title')}}
                    </button>
                    {{__('ui.no_account')}}

                    <p class="signup-link">

                        <a class="c-text-lBlue" href="{{ route('register') }}"> {{__('ui.register_link')}}</a>
                    </p>
                </form>
            </div>
        </div>
    </div> --}}
    <div class="pt-5 mt-5">
        <div class="container shadow rounded-3 my-5 p-2">
            <div class="row">
                {{-- colonna sx --}}
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center p-2">
                    <img src="/media/mascotte.jpg" class="img-fluid rounded-3 p-2" id="c-img-login" alt="immagine-mascotte">
                </div>
                {{-- colonna dx --}}
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <form method="POST" action="{{ route('login') }}" class="p-3">
                        @csrf
                        <h2 class="pt-1">{{ __('ui.login_form_title') }}</h2>
                        <input placeholder="{{ __('ui.email_placeholder') }}" type="email" name="email"
                            id="email" class="w-100 pt-3 rounded-2 py-2">
                        <input placeholder="{{ __('ui.password_placeholder') }}" type="password" name="password"
                            id="password" class="w-100 rounded-2 mb-4 py-2">
                        <label for="remember">{{ __('ui.remember_me') }}</label>
                        <input type="checkbox" name="remember" id="remember">
                        <button class="submit c-button-main" type="submit">
                            {{ __('ui.login_button') }}
                        </button>
                        <p class="signup-link pt-2">
                            {{ __('ui.no_account') }}
                            <a class="c-text-lBlue" href="{{ route('register') }}">{{ __('ui.register_link') }}</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
