<!DOCTYPE html><html lang="en">
	<head>  
	<title>Tienda</title>  
	<meta charset="utf-8">
	<meta name="description" content="Tienda de zapatillas">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	  <link href=" href="\Prog web\bootstrap.css rel="stylesheet">
	  <link href="\Prog web\css\reset.css" rel="stylesheet">
	  <link href="\Prog web\css\style.css" rel="stylesheet">
	  <link href="\Prog web\css\carrito.css" rel="stylesheet">
		<link rel="shortcut icon" href="resources/logo.png">
	</head>
	
	<body>
		<header>
			
		<section class="navbar">
				<a href="\Prog web\html\inicio.html"><img src="\Prog web\resources/logo.png" id="logo"></a>
				<a href="\Prog web\html\inicio.html">Inicio</a>
				<a href="\carrito\index.php">Productos</a>
				<a href="\Prog web\html\contacto.html">Contacto</a>
				<a href="\Prog web\html\calendario.html">Calendario de eventos</a>
				<a href="\Prog web\html\localizacion.html">Nuestras tiendas</a>
				<a href="\Prog web\html\perfil.html">Perfil</a>
				<button id="btnbuscar" class="buscador">Buscar</button>
				<input type="text" id="buscador" class="buscador">
				
			</section>
			
		</header><br><br>

<?php 
session_start();
include('C:\xampp\htdocs\Prog web\php\db2.php');

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>window.location="index.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<article class="container">
			<?php
				$query = "SELECT * FROM tbl_product ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<section class="col-md-4">
				<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
					<section class="carrito">
						<img class="carrito" src="source/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">€ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />
						
						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input  type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Añadir al carrito" />
					</section>
				</form>
			</section>
			<?php
					}
				}
			?>
			<ol style="clear:both"></ol>
			<br />
			<h3>Carrito de la Compra</h3>
			<span class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Producto</th>
						<th width="10%">Cantidad</th>
						<th width="20%">Precio</th>
						<th width="15%">Total</th>
						<th width="5%">Accion</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>€ <?php echo $values["item_price"]; ?></td>
						<td>€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Borrar</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" >Total</td>
						<td>€ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</span>
		</article>
	 </body>
</html>

<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
?>
<footer class="bg-light text-center text-white">
		<!-- Grid container -->
		<span class="container p-4 pb-0">
		  <!-- Section: Social media -->
		  <section class="mb-4">
			<!-- Facebook -->
			<a href="https://www.facebook.com" 
			  class="btn btn-primary btn-floating m-1 colorfacebook" 
			  
			  role="button"
			  ><i class="fab fa-facebook-f"></i
			></a>
	  
			<!-- Twitter -->
			<a href="https://twitter.com/?lang=es"
			  class="btn btn-primary btn-floating m-1 colortwitter"

			  role="button"
			  ><i class="fab fa-twitter"></i
			></a>
			<!-- Instagram -->
			<a href="https://www.instagram.com/sneake_shoe/"
			  class="btn btn-primary btn-floating m-1 colorinstagram"		  
			  role="button"
			  ><i class="fab fa-instagram"></i
			></a>
		  </section>
		  <!-- Section: Social media -->
		</span>
		<!-- Grid container -->
	  
		<!-- Copyright -->
		<span class="text-center p-3 colorfooter" >
		  © 2020 Copyright:
		  <a class="text-white">LuisCabelloRiquelme.com</a>
		</span>
		<!-- Copyright -->
	  </footer>