<x-layout>
    <div class="heightPage ">
        <div class="container-fluid">
            <div class="row py-5 justify-content-center align-items center text-center">
                <div class="col-12">
                    <h1 class="c-section-title mt-5">{{__('ui.search_results')}}<span class="fst-italic">"{{ $query }}"</span></h1>
                </div>
            </div>
            <div class="row height-custom justify-content-center align-items-center py-5">
                @forelse ($articles as $article)
                <div class="col-6 col-md-2">
                    <x-card :article="$article" />
                </div>
                @empty
                <div class="col-12">
                    <h3 class="text-center"> {{__('ui.no_articles_created')}}</h3>
                </div>
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-layout>
