<section class="c-bg-lBlue mb-0 mt-0">
    <footer>
        <div class="container pt-5 pb-3">
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    {{-- <h5 class="h3 fw-bold c-text-lightBlack">Presto.it</h5> --}}
                    <div class="container-logo mb-2">
                        <img src="/media/logo/logo-presto2-black.png" style="width: 96px" alt="">
                    </div>
                    <p class="c-footer-text">
                        {{ __('ui.footer_copyright') }}
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-0 c-footer-title">Presto.it</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{route('aboutUs')}}" class="c-footer-text text-decoration-none">{{ __('ui.about_us') }}</a>
                        </li>
                        <li>
                            <a href="#!" class="c-footer-text text-decoration-none">{{ __('ui.contact') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-0 c-footer-title">{{ __('ui.legal_notes') }}</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="c-footer-text text-decoration-none">{{ __('ui.privacy') }}</a>
                        </li>
                        <li>
                            <a href="#!" class="c-footer-text text-decoration-none">{{ __('ui.cookies') }}</a>
                        </li>
                        <li>
                            <a href="#!"
                                class="c-footer-text text-decoration-none">{{ __('ui.terms_conditions') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <div class="container-icons">
                        <h3 class="c-footer-title">{{ __('ui.follow_us') }}</h3>
                        <div class="col-12">
                            <a href="https://www.instagram.com/"><i
                                    class="bi bi-instagram fs-4 px-2 c-footer-text"></i></a>
                            <a href="https://www.facebook.com/"><i
                                    class="bi bi-facebook fs-4 px-2 c-footer-text"></i></a>
                            <a href="https://web.whatsapp.com/"><i
                                    class="bi bi-whatsapp fs-4 px-2 c-footer-text"></i></a>
                            <a href="https://www.messenger.com/"><i
                                    class="bi bi-messenger fs-4 px-2 c-footer-text"></i></a>
                        </div>
                    </div>
                </div>
                {{-- sezione dark mode --}}
                {{-- <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <i class="bi bi-brightness-high-fill c-text-lightBlack fs-5" id="toggleDark"></i> --}}

                </div>
            </div>
        </div>
        </div>
    </footer>
</section>
