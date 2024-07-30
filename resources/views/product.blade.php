<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
</head>
<body>
    <div class="container">
        <div class="product">
            <div class="product-details">
                <h1 class="product-title">{{ $product->name }}</h1>
                <p class="product-description">{{ $product->description }}</p>
                <p class="product-price">${{ number_format($product->price, 2) }}</p>
                <form action="{{ route('order') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="order-button">Order Now</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
