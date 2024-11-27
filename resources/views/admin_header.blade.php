<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="flex">

      <a href="{{ url('admin_page') }}" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="{{ url('admin_page') }}">home</a>
         <a href="{{ url('admin_products') }}">products</a>
         <a href="{{ url('admin_orders') }}">orders</a>
         <a href="{{ url('admin_users') }}">users</a>
         <a href="{{ url('admin_contacts') }}">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span>{{ session('admin_name') }}</span></p>
         <p>email : <span>{{ session('admin_email') }}</span></p>
         <a href="{{ url('logout') }}" class="delete-btn">logout</a>
         <div>new <a href="{{ url('login') }}">login</a> | <a href="{{ url('register') }}">register</a></div>
      </div>

   </div>

</header>