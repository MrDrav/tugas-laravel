<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">

</head>
<body>
    
@include('admin_header')

<section class="orders">

    <h1 class="title">Placed Orders</h1>

    <div class="box-container">
        @if($orders->count() > 0)
            @foreach($orders as $order)
            <div class="box">
                <p> user id : <span>{{ $order->user_id }}</span> </p>
                <p> placed on : <span>{{ $order->placed_on }}</span> </p>
                <p> name : <span>{{ $order->name }}</span> </p>
                <p> number : <span>{{ $order->number }}</span> </p>
                <p> email : <span>{{ $order->email }}</span> </p>
                <p> address : <span>{{ $order->address }}</span> </p>
                <p> total products : <span>{{ $order->total_products }}</span> </p>
                <p> total price : <span>${{ $order->total_price }}/-</span> </p>
                <p> payment method : <span>{{ $order->method }}</span> </p>
                <form action="{{ url('admin_orders/update') }}" method="post">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <select name="update_payment">
                        <option value="" selected disabled>{{ $order->payment_status }}</option>
                        <option value="pending">pending</option>
                        <option value="completed">completed</option>
                    </select>
                    <input type="submit" value="update" name="update_order" class="option-btn">
                    <a href="{{ url('admin_orders/delete/'.$order->id) }}" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
                </form>
            </div>
            @endforeach
        @else
            <p class="empty">No orders placed yet!</p>
        @endif
    </div>

</section>

<!-- custom admin js file link  -->
<script src="{{ asset('js/admin_script.js') }}"></script>

</body>
</html>