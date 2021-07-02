<?php 
	$tableContent = "";
	$subTotalTotal = 0;
	$ivaTotal = 0;
	$totalFinal = 0;
	
	for ($i=0; $i < count($code) ; $i++) 
	{ 
		$article = $code[$i];

		$unidades = (int) $article["articulos"];
		$precioUnitario = (float) $article["precio"];
		$precioMultiple = $unidades * $precioUnitario;
		$ivaMultiple = ($precioMultiple*.16);
		
		$tableContent .= "<tr>";
		$tableContent .= "<td>".$article["id"]."</td>";
		$tableContent .= "<td>".$article["nombre"]."</td>";
		$tableContent .= "<td>".$unidades."</td>";
		$tableContent .= "<td>".number_format($precioUnitario, 2)."$</td>";
		$tableContent .= "<td>".number_format($precioMultiple, 2)."$</td>";
		$tableContent .= "</tr>";

		$subTotalTotal += $precioMultiple;
		$ivaTotal += $ivaMultiple;
		$totalFinal = $subTotalTotal+$ivaTotal;
	}
	$subTotalTotal += 150;
	$totalFinal += 150;
?>

<div class="top-block" style="width: 100%; height: 2vw; background-color: rgb(110,52,74); margin-top: 5vw;">
	
</div>

<div class="title">
	<h1 style="color: rgb(110,52,74); text-align: center;"><b>Recibo de compra</b></h1>
</div>

<div class="content" style="text-align: center;">
	<p>
		Se ha realizado un pedido a Glass Protech.
	</p>
	<p>
		Esta pendiente un pago en Oxxo.
	</p>
	<p>
		Los siguientes articulos se procesaran al efectuarse el pago:
	</p>
</div>

<div style="margin-right: auto;
		margin-left: auto;
		display: block;
		width: 80%;">
	<table border="1" style="border-color: rgb(110,52,74);width: 100%;
		border: solid 2px;
		border-collapse: collapse;">
		<thead>
			<th style="width: 10%">
				Cod.
			</th>
			<th>
				Producto
			</th>
			<th style="width: 10%">
				Unidades
			</th>
			<th style="width: 10%">
				Costo unitario
			</th>
			<th style="width: 10%">
				Costo Subtotal
			</th>
		</thead>
		<tbody>
			<?php
				echo $tableContent;
			?>
			<tr>
				<td>
					
				</td>
				<td>
					Envío
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					150.00$
				</td>
			</tr>
			<tr>
				<td colspan="2" rowspan="3">
					<b>Fecha de compra:</b> <?php echo  date("d") . "/" . date("m") . "/" . date("Y"); ?>
				</td>
				<td rowspan="3" colspan="2">
					Total
				</td>
				<td rowspan="3">
					<?php
						echo number_format($subTotalTotal, 2)."$";
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<p>
		<b>Estatus de envio:</b> Pendiente
	</p>
	<p>
		Recibirá un correo cuando el estado del envio cambie.
	</p>
</div>
<div class="sendingData" style="width: 40%; margin-left: auto; margin-right: auto; ">

	<h1>Datos de envío</h1>
	<p><b>Nombre:</b>  <?php echo $send["nombre"]; ?></p>
	<p><b>Email:</b>  <?php echo $send["email"]; ?></p>
	<p><b>Calle:</b>  <?php echo $send["calle"]; ?></p>
	<p><b>NE:</b>  <?php echo $send["ne"]; ?>		<b>NI:</b>  <?php echo $send["ni"]; ?></p>
	<p><b>Colonia:</b>  <?php echo $send["colonia"]; ?>		<b>CP:</b>  <?php echo $send["cp"]; ?></p>
	<p><b>Municipio:</b>  <?php echo $send["municipio"]; ?></p>
	<p><b>Estado:</b>  <?php echo $send["estado"]; ?></p>
	<p><b>Pais:</b>  <?php echo $send["pais"]; ?></p>
</div>

<br>
<br>
<br>
<?php 
	if ($fact["nombre"] != "") 
	{
		echo'<div class="facturingData" style="width: 40%; margin-left: auto; margin-right: auto; ">';
		echo'<h1>Datos de facturación</h1>';
		echo'	<p><b>Nombre:</b>'.$fact["nombre"].'</p>';
		echo'	<p><b>Email:</b>'.$fact["email"].'</p>';
		echo'	<p><b>R.F.C:</b>'.$fact["rfc"].'</p>';
		echo'	<p><b>Razón social:</b>'.$fact["rs"].'</p>';
		echo'	<p><b>Calle:</b>'.$fact["calle"].'</p>';
		echo'	<p><b>NE:</b>'.$fact["ne"].'<b>NI:</b>'.$fact["ni"].'</p>';
		echo'	<p><b>Colonia:</b>'.$fact["colonia"].'<b>CP:</b>'.$fact["cp"].'</p>';
		echo'	<p><b>Municipio:</b>'.$fact["municipio"].'</p>';
		echo'	<p><b>Estado:</b>'.$fact["estado"].'</p>';
		echo'	<p><b>Pais:</b>'.$fact["pais"].'</p>';
		echo'</div>';
	}
?>
