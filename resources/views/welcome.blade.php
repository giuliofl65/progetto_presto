<x-layout>
    <x-slot name="titolo">
        Presto homepage
    </x-slot>
    <header>
        <div class="container-fluid c-header d-flex justify-content-center">
            {{-- <div class="row w-md-75 h-md-75 align-items-end justify-content-center justify-content-md-end">
                <div class="col-12 col-md-8 p-2 pt-5 pt-md-0">
                    <div class="c-bg-white p-5 rounded-2 shadow">
                        <h1 class="mb-4 mb-md-4">Troppe cianfrusaglie in giro per casa?</h1>
                        <a class="c-button-main rounded-5 py-3 px-4" href="{{route('article.create')}}">Vendi tutto!</a>
                    </div>
                </div>
            </div> --}}
            <div class="row h-100 align-items-center">
                <div class="col-7 ps-3 pb-3">
                    <h1 class="c-text-white animate__animated animate__fadeInLeftBig">{{ __('ui.too_much_junk') }}</h1>
                    <h2 class="c-text-white">{{ __('ui.make_space') }}</h2>
                    <a class="c-button-main rounded-5" href="{{ route('article.create') }}">{{ __('ui.sell_all') }}</a>
                </div>
            </div>
        </div>
    </header>
    @if (session()->has('message'))
        <div class="row justify-content-center">
            <div class="col-5 alert alert-success text-center shadow rounded">
                {{ session('message') }}
            </div>
        </div>
    @endif

    {{-- sezione Ultimi annunci --}}
    <section class="my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center mb-3">
                    <h2 class="c-section-title m-0 ">{{ __('ui.latest_ads') }}</h2>
                    <i class="bi bi-stars d-flex align-items-center ms-3 fs-2"></i>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @forelse ($articles as $article)
                    <div class="col-6 col-md-3 d-flex align-items-baseline justify-content-center p-4" id="new">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <h3 class="text-center">{{ __('ui.no_articles_created') }}</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <div class="container-fluid c-lavora-con-noi d-flex justify-content-center">
        <div class="row h-100 w-md-75">
            <div
                class="col-12 col-md-7 p-3 p-md-5 d-flex flex-column align-items-center align-items-md-start justify-content-center">
                <h1 class="c-text-white text-center text-md-start c-title-banner">{{ __('ui.join_team') }}</h1>
                <h2 class="c-text-white text-center text-md-start c-subtitle-banner mb-5">
                    {{ __('ui.team_description') }}</h2>
                <div>
                    <a href="{{ route('become.revisor') }}"
                        class="c-button-main rounded-5">{{ __('ui.become_revisor') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
