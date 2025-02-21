<x-layout>
    <x-slot name="titolo">
        Dashboard revisore
    </x-slot>
    {{-- Etichetta --}}
    <div class="container mt-5 pt-5 pb-2">
        <div class="row">
            <div class="col-12">
                <h2 class="pb-2 c-section-title">{{ __('ui.revisor_dashboard') }}</h2>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
    <div class="row align-items-center justify-content-center">
        <div class="col-12 d-flex align-items-center justify-content-center alert alert-success">
            {{ session('message') }}
        </div>
    </div>
    @endif

    {{-- Sezione da revisionare --}}
    <div class="container">
        <div class="row justify-content-center rounded-3 shadow p-3 pb-4">
            @if ($article_to_check && $article_to_check->images->count())
            <div class="col-12 col-md-6 d-flex flex-wrap">
                @foreach ($article_to_check->images as $key => $image)
                <div class="{{ $article_to_check->images->count() == 1 ? 'col-12' : 'col-12 col-md-4 p-3' }}">
                    <img src="{{ Storage::url($image->path) }}" class="c-img rounded-4"
                    alt="Immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}">
                </div>
                <div class="col-12 ps-3">
                    <div class="card-body c-show-category">
                        <h5 class="c-card-title pt-4">Labels</h5>
                        @if($image->labels)
                            @foreach ($image->labels as $label)
                                #{{$label}},
                            @endforeach
                            @else
                                <p class="fst-italic">No labels</p>
                            @endif
                    </div>
                    <hr>
                </div>
                <div class="row ps-3">
                    <h5 class="c-card-title">Ratings</h5>
                </div>
                <div class="col-12 ps-3 pt-1 pb-3 d-flex">
                    <div class="card-body d-flex justify-content-start c-show-category">
                        <div class="col-2">
                            <div class="col-3">Adult</div>
                            <div class="col-3">
                                <div class="text-center mx-auto {{ $image->adult }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-3 col-md-2">
                            <div class="col-3">violence</div>
                            <div class="col-3">
                                <div class="text-center mx-auto {{ $image->violence }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="col-3">spoof</div>
                            <div class="col-3">
                                <div class="text-center mx-auto {{ $image->spoof }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="col-3">racy</div>
                            <div class="col-3">
                                <div class="text-center mx-auto {{ $image->racy }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="col-3">medical</div>
                            <div class="col-3">
                                <div class="text-center mx-auto {{ $image->medical }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if ($article_to_check)
            <div class="col-12 col-md-6 pt-1 d-flex flex-column justify-content-start align-items-start ps-4">
                <div class="col-12 d-flex flex-column justify-content-between">
                    {{-- Titoli e descrizioni dell'articolo --}}
                    <div>
                    {{-- Pulsanti di azione --}}
                    <div class="d-flex align-items-center justify-content-start">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="bg-transparent border-0"><i
                                class="bi bi-x-circle-fill fs-2 c-text-lightBlack"
                                id="btnX"></i>
                            </button>
                        </form>

                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="bg-transparent border-0"><i
                                class="bi bi-check-circle-fill fs-2 c-text-lightBlack"
                                id="btnV"></i>
                            </button>
                        </form>
                    </div>
                        <hr>
                        <h3 class="c-show-title">{{ $article_to_check->title }}</h3>
                        <hr>
                        <h3 class="c-show-description pb-1">{{ __('ui.author') }}{{ $article_to_check->user->name }}</h3>
                        <h4 class="c-show-category text-muted">#{{ $article_to_check->category->name }}</h4>
                        <hr>
                        <h4 class="c-revisor-price">{{ $article_to_check->price }}€</h4>
                        <hr>
                        <p class="c-revisor-description">{{ $article_to_check->description }}</p>
                    {{-- </div> --}}
                        </div>
                    </div>
                    @else
                    <div class="row justify-content-center align-items-center height-custom text-center">
                        <div class="col-12">
                            <h2 class="c-show-category">{{ __('ui.no_article_to_review') }}</h2>
                            <a href="{{ route('homepage') }}" class="c-button-main rounded-5">{{ __('ui.go_home') }}</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Sezione articoli rifiutati --}}
            <div class="container my-5">
                <div class="row align-items-center justify-content-center pt-5">
                    <div class="col-12">
                        <h3 class="c-section-title">{{ __('ui.rejected_articles') }}</h3>
                    </div>

                    @if ($rejected_articles->isNotEmpty())
                    <div class="row">
                        @foreach ($rejected_articles as $rejected_article)
                        <div class="col-6 col-md-4 col-lg-3 p-3">
                            <a href="{{ route('article.show', ['article' => $rejected_article]) }}" class="d-block">
                                @if ($rejected_article->images->count())
                                <img class="c-img rounded-5 w-100"
                                src="{{ Storage::url($rejected_article->images->first()->path) }}"
                                alt="{{ $rejected_article->title }} - Immagine dell'articolo">
                                @else
                                <img class="c-img rounded-5 w-100" src="/media/img-placeholder.jpg"
                                alt="{{ $rejected_article->title }} - Immagine dell'articolo">
                                @endif
                                <div class="ps-2">
                                    <h5 class="c-card-title w-100 pt-3 text-capitalize">{{ $rejected_article->title }}
                                    </h5>
                                    <a class="c-card-category w-100 pt-3 text-capitalize"
                                    href="{{ route('byCategory', ['category' => $rejected_article->category]) }}">{{ $rejected_article->category->name }}</a>
                                    <p class="c-card-price w-100 pt-2 text-capitalize">{{ $rejected_article->price }}€
                                    </p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="col-12 text-center">
                        <h4>{{ __('ui.no_rejected_articles') }}</h4>
                    </div>
                    @endif
                </div>
            </div>
        </x-layout>
