<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Font Awesome CDN link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS file link  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="message">
            <span>{{ $error }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="message">
        <span>{{ session('success') }}</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
@endif

<div class="form-container">
    <form action="{{ route('register') }}" method="post">
        @csrf
        <h3>Register Now</h3>
        <input type="text" name="name" placeholder="Enter your name" required class="box" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Enter your email" required class="box" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Enter your password" required class="box">
        <input type="password" name="password_confirmation" placeholder="Confirm your password" required class="box">
        <select name="user_type" class="box">
            <option value="user" {{ old('user_type') == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        <input type="submit" name="submit" value="Register Now" class="btn">
        <p>Already have an account? <a href="{{ url('login') }}">Login now</a></p>
    </form>
</div>

</body>
</html>