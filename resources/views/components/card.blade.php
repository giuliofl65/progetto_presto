<div class="">
    <a href="{{ route('article.show', compact('article')) }}">
        <img class="c-img rounded-5" src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(1000, 1000) : '/media/img-placeholder.jpg'}}" alt="Immagine dell'articolo {{$article->title}}">
    </a>
    <div class="ps-2">
        <h5 class="c-card-title w-100  pt-3 text-capitalize">{{ $article->title }}</h5>
        <a class="c-card-category w-100  pt-3 text-capitalize"
            href="{{ route('byCategory', ['category' => $article->category]) }}">{{__('ui.' . $article->category->name)}}</a>
        <p class="c-card-price w-100  pt-2 text-capitalize">{{ $article->price }}€</p>
    </div>
</div>
