<?php

@include 'connection.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($mysqli, "SELECT * FROM cart WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($mysqli, "INSERT INTO cart(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	
	<title>search</title>
 <link rel="stylesheet" href="css/adminstyle.css">
	
</head>
<body>

<?php include 'header.php'; ?> 


    <div class="container">
        
 
<form action="" method="GET">
</br></br></br></br></br></br></br></br>
<div class="input-group mb-3">
<input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data" style="width:500px; height:40px;">
<button type="submit" class="btn btn-primary">Search</button>
</div>
</form>


   
<?php 
	$mysqli = mysqli_connect("localhost","root","","icecream");

	if(isset($_GET['search']))
	{
		$filtervalues = $_GET['search'];
		$query = "SELECT * FROM products WHERE CONCAT(name,price,image) LIKE '%$filtervalues%' ";
		$query_run = mysqli_query($mysqli, $query);

		if(mysqli_num_rows($query_run) > 0)
		{
			foreach($query_run as $items)
			{
				?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $items['image']; ?>" alt=""; style="width:250px; height:250px;">
            <h3><?php echo $items['name']; ?></h3>
            <div class="price">Rs<?php echo $items['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $items['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $items['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $items['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart" style="width:250px; height:40px;">
         </div>
      </form>

 
				<?php
			}
		}
		else
		{
			?>
				
					 <h3>No Record Found</h3>
				
			<?php
		}
	}
?>
                           
                        
                
        
    </div>
     
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/adminscript.js"></script>
</body>
</html>