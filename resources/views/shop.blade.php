@vite(entrypoints: 'resources/css/app.css')
@vite(entrypoints: 'resources/js/app.js')
@vite(entrypoints: 'resources/css/home.css')
@vite(entrypoints: 'resources/css/checkout.css')
@vite(entrypoints: 'resources/css/shop.css')

@extends('layout.Default')

@section('content')
    <section class="pay"><br><br>
        <h2> MERCHS</h2>
    </section><br><br><br>
   <div class="product-grid">
        @foreach($products as $product)
            <div class="product-card">

                @php
                    $image = $product->media->first();
                @endphp

                @if($image)
                    <img src="{{ asset('storage/'.$image->path) }}">
                @else
                    <img src="{{ asset('images/no-image.png') }}">
                @endif

                <h3>{{ $product->name }}</h3>
                <p>${{ $product->price }}</p>

                <form method="POST" action="{{ route('basket.add') }}">
                    @csrf
                    <input type="hidden" name="type" value="shop">
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <button>Add to Basket</button>
                </form>

            </div>
        @endforeach
    </div>
@endsection
