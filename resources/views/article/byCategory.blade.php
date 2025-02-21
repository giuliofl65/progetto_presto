<x-layout>
    <x-slot name="titolo">
        {{__('ui.' . $category->name)}}
    </x-slot>
    <div class="container mb-5 vh-100">
        <div class="row pt-5">
            <div class="col-12 d-flex align-items-center pt-5">
                <h1 class="c-section-title m-0 pb-4 text-capitalize">{{__('ui.' . $category->name)}}</h1>
            </div>

        @forelse ($articles as $article)
            <div class="col-12 col-md-3">
                <x-card :article="$article" />
            </div>
        @empty
            <div class="col-12 pt-5 text-center">
                <h2 class="c-show-category m-0 pb-5 text-capitalize">{{__('ui.no_articles_category')}}</h2>
                @guest
                <a class="c-button-main rounded-5" href="{{ route('login') }}">{{__('ui.publish_ad')}}</a>
                @endguest
                @auth
                    <a class="c-button-main rounded-5" href="{{ route('article.create') }}">{{__('ui.publish_ad')}}</a>
                @endauth

            </div>
        @endforelse
        </div>
    </div>
</x-layout>
