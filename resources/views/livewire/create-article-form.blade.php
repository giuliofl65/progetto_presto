<div class="">
    @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <form class=" shadow rounded p-5 mb-5 c-bg-white"wire:submit="store">
        <div class="mb-3">
            {{-- <label for="title" class="form-label"> Titolo:</label> --}}
            <input type="text" class="form-control" id="title" placeholder="{{__('ui.title_placeholder')}}" wire:model.live="title">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            {{-- <label for="category" class="form-label">Scegli categoria:</label> --}}
            <select id="category" wire:model.live="category" class="form-control c-text-darkGrey">
                <option value="" disabled selected>{{__('ui.select_category')}}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{__('ui.' . $category->name)}}</option>
                @endforeach
            </select>
            @error('category')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">

            {{-- <label for="price" class="form-label">Prezzo:</label> --}}
            <input type="text" class="form-control" id="price" placeholder="{{__('ui.price_placeholder')}}" wire:model.live="price">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- <label for="image" --}}
        <div class="mb-3">
            <input type="file" wire:model.live="temporary_images" multiple
            class="form-control @error('temporary_images.*') is-invalid @enderror" placeholder="Img/" >
            @error('temporary_images.*')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @error('temporary_images')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    {{-- <p>Photo preview:<p> --}}
                    <div class="row border border-1 rounded-3 mb-3 px-0 mx-0">
                        @foreach ($images as $key => $image)
                            <div class="col-6 col-md-4 col-xl-3 d-flex justify-content-center align-items-center my-3">
                                <div class="img-preview rounded-3"
                                style="background-image: url({{ $image->temporaryUrl() }});">
                                {{-- bottone elimina --}}
                                    <button class="bg-transparent w-100 border-0 d-flex justify-content-end"><i class="bi bi-x-circle-fill fs-4 c-text-lightBlack" id="btnX" wire:click="removeImage({{ $key }})""></i></button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="mb-3">
            <textarea id="description" cols="30" rows="3" class="form-control" placeholder="{{__('ui.description_placeholder')}}" wire:model.live="description"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex">
            <button type="submit" class="btnAdd rounded-3" id="createButton">{{__('ui.submit_button')}}</button>
        </div>
    </form>
</div>
