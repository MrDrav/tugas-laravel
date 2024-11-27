<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">

</head>
<body>
    
@include('admin_header')

<!-- admin dashboard section starts  -->

<section class="dashboard">

    <h1 class="title">Dashboard</h1>

    <div class="box-container">

        <div class="box">
            <h3>${{ $total_pendings }}/-</h3>
            <p>Total Pendings</p>
        </div>

        <div class="box">
            <h3>${{ $total_completed }}/-</h3>
            <p>Completed Payments</p>
        </div>

        <div class="box">
            <h3>{{ $number_of_orders }}</h3>
            <p>Order Placed</p>
        </div>

        <div class="box">
            <h3>{{ $number_of_products }}</h3>
            <p>Products Added</p>
        </div>

        <div class="box">
            <h3>{{ $number_of_users }}</h3>
            <p>Normal Users</p>
        </div>

        <div class="box">
            <h3>{{ $number_of_admins }}</h3>
            <p>Admin Users</p>
        </div>

        <div class="box">
            <h3>{{ $number_of_account }}</h3>
            <p>Total Accounts</p>
        </div>

        <div class="box">
            <h3>{{ $number_of_messages }}</h3>
            <p>New Messages</p>
        </div>

    </div>

</section>

<!-- admin dashboard section ends -->

<!-- custom admin js file link  -->
<script src="{{ asset('js/admin_script.js') }}"></script>

</body>
</html>