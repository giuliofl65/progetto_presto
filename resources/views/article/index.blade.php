<x-layout>
    <x-slot name="titolo">
        {{__('ui.catalog')}}
    </x-slot>
    <div class="container my-5 py-5">
        <div class="row">
            @forelse ($articles as $article)
            <div class="col-6 col-md-3 d-flex align-items-center" id="new2">
                <x-card :article="$article" />
            </div>
                @empty
                    <div class="col-12">
                        <h3 class="text-center">{{__('ui.no_articles_created')}}</h3>
                    </div>
                @endforelse
        </div>
    </div>
</x-layout>