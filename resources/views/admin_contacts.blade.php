<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">

</head>
<body>
    
@include('admin_header')

<section class="messages">

    <h1 class="title">Messages</h1>

    <div class="box-container">
    @if($messages->count() > 0)
        @foreach($messages as $message)
        <div class="box">
            <p> user id : <span>{{ $message->user_id }}</span> </p>
            <p> name : <span>{{ $message->name }}</span> </p>
            <p> number : <span>{{ $message->number }}</span> </p>
            <p> email : <span>{{ $message->email }}</span> </p>
            <p> message : <span>{{ $message->message }}</span> </p>
            <a href="{{ url('admin_contacts/delete/'.$message->id) }}" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>
        </div>
        @endforeach
    @else
        <p class="empty">you have no messages!</p>
    @endif
    </div>

</section>

<!-- custom admin js file link  -->
<script src="{{ asset('js/admin_script.js') }}"></script>

</body>
</html>