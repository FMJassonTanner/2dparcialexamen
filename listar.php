


<?php 

session_start();


 if( $_SESSION['login']) {
  // echo "si estoy logueado";
   
 
 }else{
   echo "No estoy logueado";
  header('Location: login.php');
 }




include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("
SELECT*FROM 
 	productos
 		LEFT JOIN categoria ON fk_categoria = id_categoria
		LEFT JOIN colores ON fk_colores = id_color

");

$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>




	<div class="col-xs-12">
		<h1>Productos</h1>
		<div>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>categoria</th>
					<th>color</th>
					<th>Precio de compra</th>
					<th>Precio de venta</th>
					<th>Existencia</th>

				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->nombre_categoria ?></td>
					<td><?php echo $producto->nombre_color ?></td>
					<td><?php echo $producto->precioCompra ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->existencia ?></td>

				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>