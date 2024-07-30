<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
    <style>
        /* Modal CSS */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Our Products</h1>
            <nav>
                <a href="{{ route('user.products') }}" class="nav-link">Home</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="product-container">
                @foreach ($products as $product)
                    <div class="product-card">
                        <div class="product-header">
                            <h2 class="product-title">{{ $product->name }}</h2>
                            <p class="product-price">${{ number_format($product->price, 2) }}</p>
                        </div>
                        <div class="product-body">
                            <p class="product-description">{{ $product->description }}</p>
                        </div>
                        <div class="product-footer">
                            <button class="order-button" onclick="showOrderForm({{ $product->id }}, '{{ $product->name }}')">Order Now</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Your E-Commerce Site. All rights reserved.</p>
        </div>
    </footer>

    <!-- Order Form Modal -->
    <div id="order-form-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="hideOrderForm()">&times;</span>
            <h2>Order Form</h2>
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" id="product-id">
                <p>Product: <span id="product-name"></span></p>
                <div class="form-group">
                    <label for="customer_name">Name</label>
                    <input type="text" name="customer_name" id="customer_name" required>
                </div>
                <div class="form-group">
                    <label for="customer_email">Email</label>
                    <input type="email" name="customer_email" id="customer_email" required>
                </div>
                <div class="form-group">
                    <label for="customer_phone">Phone</label>
                    <input type="text" name="customer_phone" id="customer_phone" required>
                </div>
                <button type="submit" class="order-button">Submit Order</button>
            </form>
        </div>
    </div>

    <script>
        function showOrderForm(productId, productName) {
            document.getElementById('product-id').value = productId;
            document.getElementById('product-name').innerText = productName;
            document.getElementById('order-form-modal').style.display = 'block';
        }

        function hideOrderForm() {
            document.getElementById('order-form-modal').style.display = 'none';
        }

        // Close the modal if the user clicks outside of it
        window.onclick = function(event) {
            if (event.target == document.getElementById('order-form-modal')) {
                hideOrderForm();
            }
        }
    </script>
</body>
</html>
