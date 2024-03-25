<?php
include "db_conn1.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>
   
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/orderdetails.css">
   <style type="text/css">
.header1{
   position: sticky;
   top:0; left:0; right: 0;
   z-index: 1000;
   border-bottom: var(--border);
   background-color:  #ffae00;
}

.header1 .flex1{
   display: flex;
   align-items: center;
   justify-content: space-between;
   position: relative;
}

.header1 .flex1 .logo1{
   font-size: 2.5rem;
   color:var(--black);
}

.header1 .flex1 .navbar1 a{
   margin:0 1rem;
   font-size: 2rem;
   color:var(--black);
}

.header1 .flex1 .navbar1 a:hover{
   color:#a6ff00;
}



@keyframes fadeIn {
   0%{
      transform: translateY(1rem);
   }
}

.header1 .flex1 .profile1{
   width: 30rem;
   position: absolute;
   top:120%; right: 2rem;
   background-color: #ffae00;
   border:var(--border);
   padding:1.5rem;
   text-align: center;
   display: none;
   animation: fadeIn .2s linear;
}

.header1 .flex1 .profile1.active{
   display: block;
}
.header1 .flex1 .profile1 .name{
   font-size: 1.7rem;
   margin-bottom: .5rem;
}

.header1 .flex1 .profile1 .account1{
   font-size: 1.7rem;
   color:var(--light-color);
   margin-top: 1.5rem;
}

.header1 .flex1 .profile1 .account1 a{
   color:var(--black);
   text-decoration: underline;
}

.header1 .flex1 .profile1 .account1 a:hover{
   color:#a6ff00;
}

.bg {
   animation:slide 3s ease-in-out infinite alternate;
   background-image: linear-gradient(-20deg, #ffd689 50%, rgb(255, 157, 11) 50%);
   bottom:0;
   left:-100%;
   opacity:.5;
   position:fixed;
   right:-50%;
   top:0;
   z-index:-1;
 }
 
 .bg2 {
   animation-direction:alternate-reverse;
   animation-duration:4s;
 }
 
 .bg3 {
   animation-duration:5s;
 }
 
 
 h1 {
   font-family:monospace;
 }
 
 @keyframes slide {
   0% {
     transform:translateX(-25%);
   }
   100% {
     transform:translateX(25%);
   }
 }

input {
    width: 350px;
    border-radius: 5px;
    text-align: center;
    border: 1px solid #212121;
    height: 40px;
}
 
table {
    margin-top: 30px;
}
tr:nth-of-type(even) {
    background: hsl(93, 100%, 65%);
}
thead {
    background: #56ff6d;
}

</style>

</head>
<body>

<!-- order Background -->
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

<!--home header code eka--> 
  <header class="header1">

   <section class="flex1">

     <a href="home.html" class="logo1"><img src="images/image333.jpg" style="width:50px; height:50px;">Mr.Icecream </a>


      <nav class="navbar1">
         <a href="http://localhost/admin.php">home</a>
      
         <a href="order.php">orders</a>
         
      </nav>

      <div class="icons1">
         
 
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile1">
         <p class="account1"><a href="login.html">login</a> or <a href="register.html">register</a></p>
      </div>

   </section>

</header>

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <br><br>
	
	<center>
<input type="search" class="light-table-filter" data-table="table-info" placeholder="Filter/Search">
    </center>
	
    <table class="table-info table" table bgcolor = "yellow" border ="2" cellspacing = "2" cellpadding = "15">
      <thead class="table-dark">
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">number</th>
          <th scope="col">email</th>
          <th scope="col">method</th>
          <th scope="col">address</th>
		  <th scope="col">total_products</th>
		  <th scope="col">total_price</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `order`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["number"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["method"] ?></td>
			<td><?php echo $row["address"] ?></td>
			<td><?php echo $row["total_products"] ?></td>
			<td><?php echo $row["total_price"] ?></td>
            
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
  <script  src="js/order.js"></script>
	  
</body>

</html>