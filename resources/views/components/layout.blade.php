<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $titolo ?? 'titolo di default' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="icon" href="{{asset('/media/logo/ficon-black.webp')}}" type="image/webp">
</head>

<body>
    <x-navbar />
    {{-- <x-header /> --}}
    {{ $slot }}
    <button id="back-to-top" class="back-to-top"><i class="bi bi-arrow-up-circle"></i></button>
    <div class=" container  d-md-none fixed-bottom mb-3 d-flex justify-content-center align-items-center ">
        <div class="row ">
            <div class="col-12 ">
                <form class="d-flex align-items-center shadow rounded-5 border-0 " role="search" action="{{ route('article.search') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control m-0 rounded-start-5 border-0 py-2"
                            placeholder="Cerca un prodotto" aria-label="search">

                        <button type="submit" class="btn btn-outline-light rounded-end-5 bg-white border-0">
                            <i class="bi bi-search text-dark ps-5 pe-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<x-footer />

</body>

</html>
