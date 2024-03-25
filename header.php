<html>

<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/header.css">
   
   <style type="text/css">
.header{
   position: sticky;
   top:0; left:0; right: 0;
   z-index: 1000;
   border-bottom: var(--border);
   background-color: #ffae00;
}

.header .flex{
   display: flex;
   align-items: center;
   justify-content: space-between;
   position: relative;
}

.header .flex .logo{
   font-size: 2.5rem;
   color:var(--black);
}

.header .flex .navbar a{
   margin:0 1rem;
   font-size: 2rem;
   color:var(--black);
}

.header .flex .navbar a:hover{
   color:#a6ff00;
}

.header .flex .icons > *{
   font-size: 2.5rem;
   color:var(--black);
   margin-left: 1.5rem;
   cursor: pointer;
}

.header .flex .icons > *:hover{
   color:#a6ff00;
}

@keyframes fadeIn {
   0%{
      transform: translateY(1rem);
   }
}

.header .flex .profile{
   width: 30rem;
   position: absolute;
   top:120%; right: 2rem;
   background-color:  #ffae00;
   border:var(--border);
   padding:1.5rem;
   text-align: center;
   display: none;
   animation: fadeIn .2s linear;
}

.header .flex .profile.active{
   display: block;
}

.header .flex .profile .name{
   font-size: 1.7rem;
   margin-bottom: .5rem;
}

.header .flex .profile .account{
   font-size: 1.7rem;
   color:var(--light-color);
   margin-top: 1.5rem;
}

.header .flex .profile .account a{
   color:var(--black);
   text-decoration: underline;
}

.header .flex .profile .account a:hover{
   color:#a6ff00;
}

</style>

</head>

<body>

<!-- Home Background -->
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

<header class="header">

   <section class="flex">

<!--<a href="#" class="logo">foodies</a>

      <nav class="navbar">
         <a href="admin.php">add products</a>
         <a href="products.php">view products</a>
      </nav> -->

      <?php
      
      $select_rows = mysqli_query($mysqli, "SELECT * FROM cart") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="home.html" class="logo">Mr.Icecream</a>

      <nav class="navbar">
         <a href="home.html">home</a>
         <a href="About.html">about</a>
         <a href="http://localhost/products.php">menu</a>
		
         <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      </nav>

      <div class="icons">
         <a href="search.php"><i class="fas fa-search"></i></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <p class="account"><a href="login.html">LogOut</a></p>
      </div>

   </section>      

</header>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   grabCursor:true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>

</html>