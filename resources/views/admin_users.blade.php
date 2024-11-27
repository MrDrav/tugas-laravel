<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">

</head>
<body>
    
@include('admin_header')

<section class="users">

    <h1 class="title">User Accounts</h1>

    <div class="box-container">
        @foreach($users as $user)
        <div class="box">
            <p> user id : <span>{{ $user->id }}</span> </p>
            <p> username : <span>{{ $user->name }}</span> </p>
            <p> email : <span>{{ $user->email }}</span> </p>
            <p> user type : <span style="color:{{ $user->user_type == 'admin' ? 'var(--orange)' : '' }}">{{ $user->user_type }}</span> </p>
            <a href="{{ url('admin_users/edit/'.$user->id) }}" class="option-btn">Edit User</a>
            <a href="{{ url('admin_users/delete/'.$user->id) }}" onclick="return confirm('delete this user?');" class="delete-btn">Delete User</a>
        </div>
        @endforeach
    </div>

</section>

<!-- custom admin js file link  -->
<script src="{{ asset('js/admin_script.js') }}"></script>

</body>
</html>