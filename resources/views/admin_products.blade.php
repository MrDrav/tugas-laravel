<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">

</head>
<body>
    
@include('admin_header')

<!-- product CRUD section starts  -->

<section class="add-products">

    <h1 class="title">Shop Products</h1>

    <form action="{{ url('admin_products') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Add Product</h3>
        <input type="text" name="name" class="box" placeholder="Enter product name" required>
        <input type="number" min="0" name="price" class="box" placeholder="Enter product price" required>
        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
        <input type="submit" value="Add Product" name="add_product" class="btn">
    </form>

</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<section class="show-products">

    <div class="box-container">

        @if($products->count() > 0)
            @foreach($products as $product)
            <div class="box">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="name">{{ $product->name }}</div>
                <div class="price">${{ $product->price }}/-</div>
                <a href="{{ url('admin_products/edit/'.$product->id) }}" class="option-btn">Update</a>
                <a href="{{ url('admin_products/delete/'.$product->id) }}" class="delete-btn" onclick="return confirm('Delete this product?');">Delete</a>
            </div>
            @endforeach
        @else
            <p class="empty">No products added yet!</p>
        @endif
    </div>

</section>

<!-- custom admin js file link  -->
<script src="{{ asset('js/admin_script.js') }}"></script>

</body>
</html>