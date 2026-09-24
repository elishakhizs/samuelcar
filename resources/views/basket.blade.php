@vite(entrypoints: 'resources/css/app.css')
@vite(entrypoints: 'resources/js/app.js')
@vite(entrypoints: 'resources/css/home.css')
@vite(entrypoints: 'resources/css/checkout.css')
@extends('layout.Default')

@section('content')
    <section class="pay"><br><br>
        <h2> Cart</h2>
    </section><br><br><br>

    <div class="container-Basket">

        @if((session('basket') && count(session('basket')) > 0) || session('free_tickets'))

            @php 
                $grandTotal = 0; 
            @endphp

            {{-- ✅ PAID ITEMS --}}
            @foreach(session('basket', []) as $index => $item)

                @php
                    $type = $item['type'] ?? 'shop';
                    $price = $item['price'] ?? 0;
                    $qty = $item['quantity'] ?? 1;

                    if ($type === 'bundle') {
                        $total = $price;
                    } else {
                        $total = $price * $qty;
                    }

                    $grandTotal += $total;
                @endphp

                

                <div class="basket-card">
                    <div class="item-image">
                        @if(!empty($item['image']))
                            <img src="{{ asset('storage/'.$item['image']) }}" alt="{{ $item['name'] }}">
                         @else
                            <img src="{{ asset('images/no-image.png') }}" alt="Item">
                        @endif
                    </div>

                    <div class="item-info">
                        <h4>{{ $item['name'] ?? 'Unnamed Item' }}</h4>

                        @if($type === 'ticket')
                            <p><strong>🎟 Ticket Item</strong></p>
                        @elseif($type === 'bundle')
                            <p><strong>🎁 Bundle Deal</strong></p>
                        @else
                            <p><strong>🛒 Shop Item</strong></p>
                        @endif

                        <p>Price: ${{ $price }}</p>
                        <p>Qty: {{ $qty }}</p>
                        <p><strong>Total: ${{ $total }}</strong></p>
                    </div>

                    <div class="actions">

                        {{-- Only bundle is locked --}}
                        @if($type !== 'bundle')
                            <form action="{{ route('basket.update', $index) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $qty }}" min="1">
                                <button class="btn-update">Update</button>
                            </form>
                        @else
                            <p>Fixed Bundle</p>
                        @endif

                        <form action="{{ route('basket.remove', $index) }}" method="POST">
                            @csrf
                            <button class="btn-danger">Remove</button>
                        </form>

                    </div>

                </div>

            @endforeach


            {{-- ✅ FREE TICKETS --}}
            @php
                $freeTickets = session('free_tickets', []);
            @endphp

            @foreach($freeTickets as $compId => $free)
                <div class="basket-card free">

                    <div class="item-info">
                        <h4>🎁 Free Entry Bonus</h4>
                        <p>Qty: {{ $free['quantity'] }}</p>
                        <p>Total: $0</p>
                    </div>

                    <div class="actions">
                        <p>Auto Applied</p>
                    </div>

                </div>
            @endforeach


            {{-- ✅ SUMMARY --}}
            <div class="summary">
                <h3>Order Summary</h3>
                <p class="total">Total: ${{ $grandTotal }}</p>

                <button class="checkout-btn">Proceed to Checkout</button><br><br>

                <a href="{{ url('/Pay') }}" id="emptyy">← Continue to competitions</a>
                <a href="{{ url('/shop') }}" id="emptyyy"> Continue Shopping  →</a><br>
            </div>

        @else

            <div class="empty">
                <h1>Your basket is empty</h1><br><br>
                <a href="{{ url('/Pay') }}" id="emptyy">Go to competitions</a>
                <a href="{{ url('/shop') }}" id="emptyyy"> Continue Shopping</a><br>
            </div>

        @endif

    </div>
@endsection