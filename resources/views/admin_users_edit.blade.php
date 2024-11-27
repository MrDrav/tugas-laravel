<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">

</head>
<body>
    
@include('admin_header')

<section class="form-container">
    <form action="{{ url('admin_users/update/'.$user->id) }}" method="post">
        @csrf
        <h3>Edit User</h3>
        <input type="text" name="name" value="{{ $user->name }}" class="box" required>
        <input type="email" name="email" value="{{ $user->email }}" class="box" required>
        <input type="password" name="password" placeholder="Enter new password" class="box" required>
        <input type="submit" value="Update User" name="update_user" class="btn">
    </form>
</section>

<!-- custom admin js file link  -->
<script src="{{ asset('js/admin_script.js') }}"></script>

</body>
</html>