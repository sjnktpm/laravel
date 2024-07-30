<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <h1>All Orders</h1>
            <nav>
                <a href="{{ route('admin.orders.index') }}" class="nav-link">Orders</a>
                <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <table class="order-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Phone</th>
                        <th>Product Name</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_email }}</td>
                            <td>{{ $order->customer_phone }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Your E-Commerce Site. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
