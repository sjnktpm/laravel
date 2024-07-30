<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Products</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="product-list">
            <!-- Products will be loaded here via AJAX -->
        </tbody>
    </table>
    <nav>
        <ul class="pagination" id="pagination">
            <!-- Pagination links will be loaded here via AJAX -->
        </ul>
    </nav>
</div>

<script>
    $(document).ready(function() {
        function fetchProducts(page = 1) {
            $.ajax({
                url: '/api/products?page=' + page,
                method: 'GET',
                success: function(response) {
                    let products = response.data;
                    let productHtml = '';
                    products.forEach(function(product) {
                        productHtml += `<tr>
                            <td>${product.name}</td>
                            <td>${product.description}</td>
                            <td>${product.price}</td>
                            <td>
                                <form action="/customer/products/order/${product.id}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Order</button>
                                </form>
                            </td>
                        </tr>`;
                    });
                    $('#product-list').html(productHtml);

                    let paginationHtml = '';
                    for (let i = 1; i <= response.last_page; i++) {
                        paginationHtml += `<li class="page-item ${i === response.current_page ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>`;
                    }
                    $('#pagination').html(paginationHtml);
                }
            });
        }

        $(document).on('click', '#pagination a', function(e) {
            e.preventDefault();
            let page = $(this).data('page');
            fetchProducts(page);
        });

        fetchProducts();
    });
</script>
</body>
</html>
