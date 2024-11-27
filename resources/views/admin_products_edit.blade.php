<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">

</head>
<body>
    
@include('admin_header')

<section class="edit-product-form">
    <form action="{{ url('admin_products/update/'.$product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="update_p_id" value="{{ $product->id }}">
        <input type="hidden" name="update_old_image" value="{{ $product->image }}">
        <img src="{{ asset('storage/'.$product->image) }}" alt="">
        <input type="text" name="name" value="{{ $product->name }}" class="box" required placeholder="Enter product name">
        <input type="number" name="price" value="{{ $product->price }}" min="0" class="box" required placeholder="Enter product price">
        <input type="file" class="box" name="image" accept="image/jpg, image/jpeg, image/png">
        <input type="submit" value="Update" name="update_product" class="btn">
        <input type="reset" value="Cancel" id="close-update" class="option-btn">
    </form>
</section>

<!-- custom admin js file link  -->
<script src="{{ asset('js/admin_script.js') }}"></script>

</body>
</html>