<x-layout>
    <x-slot name="titolo">
        {{ $article->title }}
    </x-slot>
    <div class="container p-4 rounded-3 my-5 shadow" id="showContainer">
        <div class="row">
            <a class="c-nav-text mb-3" href="{{ route('article.index') }}"><i
                    class="bi bi-arrow-left-circle c-text-black me-1"></i>{{ __('ui.back_to_catalog') }}</a>
            {{-- sezione sx --}}
            <div class="col-12 col-md-6 testH">
                @if ($article->images->count() > 0)
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper mySwiper2 rounded-3">
                        <div class="swiper-wrapper">
                            @foreach ($article->images as $key => $image)
                                <div class="swiper-slide @if ($loop->first) active @endif">
                                    <img src="{{ Storage::url($image->path) }}"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}" />
                                </div>
                            @endforeach
                        </div>
                        {{-- thumbnails --}}
                        <div>
                            @if ($article->images->count() > 1)
                                <div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            @endif

                            <div class="swiper mySwiper rounded-bottom-3">
                                <div class="swiper-wrapper">
                                    @foreach ($article->images as $key => $image)
                                        <div class="swiper-slide">
                                            <img src="{{ Storage::url($image->path) }}"
                                                alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- chiuso thumbnails --}}
                        </div>
                    </div>
                @endif
            </div>
            {{-- sezione dx --}}
            <div class="col-12 col-md-6">
                @if ($article->is_accepted !== null)
                    {{-- Controlla se l'utente ha il ruolo di "revisor" --}}
                    @if (auth()->check() && auth()->user()->isRevisor())
                        <form action="{{ route('revert', ['article' => $article]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="d-flex align-items-center">
                                <button type="submit"
                                    class="bg-transparent border-0 fs-5 c-show-description p-0 me-2 c-text-lightBlack"><i
                                        class="bi bi-backspace-fill fs-3"></i></button>
                                <p class="c-show-description pt-1 m-0">{{ __('ui.revert_decision') }}</p>
                            </div>
                        </form>
                    @endif
                @else
                    <p>{{ __('ui.article_waiting_review') }}/p>
                @endif
                <hr class="my-2">
                <h1 class="c-show-title text-capitalize mb-0"> {{ $article->title }}</h1>
                <a class="c-show-category text-capitalize"
                    href="{{ route('byCategory', ['category' => $article->category]) }}">{{ __('ui.' . $article->category->name) }}
                </a>
                <hr>

                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="c-show-price mb-0">{{ $article->price }} €</h4>
                        {{-- <div>
                            <button class="border-0 bg-transparent fs-4 p-0"><i class="bi bi-bookmark-heart d-flex align-items-center justify-content-center" id="c-show-icon"></i></button>
                            <button class="border-0 bg-transparent fs-4 p-0"><i class="bi bi-cart d-flex align-items-center justify-content-center" id="c-show-icon"></i></button>
                        </div> --}}
                    </div>
                    <hr>
                    <p class="c-show-description text-capitalize">{{ $article->description }}</p>
                </div>
            </div>
        </div>
    </div>





    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
</x-layout>
