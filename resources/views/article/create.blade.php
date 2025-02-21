<x-layout>
    <x-slot name="titolo">
        {{__('ui.insert_article')}}
    </x-slot>
    <div class="mt-5">
        <div class="container pt-5 heightPage">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-8 ">
                    <h2 class="pt-5">
                        {{__('ui.publish_article')}}
                    </h2>
                    <div class="row justify-content-center alingn-items-center height-custom">
                        <div class="col-12">
                            <livewire:create-article-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>