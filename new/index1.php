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

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/adminstyle.css">

</head>
<body>
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
    <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
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

</body>

</html>