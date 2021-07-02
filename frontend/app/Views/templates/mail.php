<?php 
	$tableContent = "";
	$subTotalTotal = 0;
	$ivaTotal = 0;
	$totalFinal = 0;
	//$code
	for ($i=0; $i < count($code) ; $i++) 
	{ 
		$article = $code[$i];
		$unidades = (int) $article->articulos;
		$precioUnitario = (float) $article->precio;
		$precioMultiple = $unidades * $precioUnitario;
		$ivaMultiple = ($precioMultiple*.16);

		$tableContent .= "<tr>";
		$tableContent .= "<td>".$article->id."</td>";
		$tableContent .= "<td>".$article->nombre."</td>";
		$tableContent .= "<td>".$unidades."</td>";
		$tableContent .= "<td>".number_format($precioUnitario, 2)."$</td>";
		$tableContent .= "<td>".number_format($precioMultiple, 2)."$</td>";
		$tableContent .= "<td>".number_format($ivaMultiple, 2)."$</td>";
		$tableContent .= "</tr>";

		$subTotalTotal += $precioMultiple;
		$ivaTotal += $ivaMultiple;
		$totalFinal = $subTotalTotal+$ivaTotal;
	}
	$subTotalTotal += 150;
?>

<div class="top-block" style="width: 100%; height: 2vw; background-color: rgb(221,40,109); margin-top: 5vw;">
	
</div>

<div class="title">
	<h1 style="color: rgb(221,40,109); text-align: center;"><b>Recibo de compra</b></h1>
</div>

<div class="content" style="text-align: center;">
	<p>
		Se ha realizado un pedido a Diente Sonriente.
	</p>
	<p>
		Los siguientes articulos se procesaran al efectuarse el pago:
	</p>
</div>

<div class="table-container">
	<table class="table-contenido">
		<thead>
			<th class="small-col">
				Cod.
			</th>
			<th>
				Producto
			</th>
			<th class="small-col">
				Unidades
			</th>
			<th class="small-col">
				Costo unitario
			</th>
			<th class="small-col">
				Costo Subtotal
			</th>
			<th class="small-col">
				IVA
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
				<td>
					
				</td>
			</tr>
			<tr>
				<td colspan="2" rowspan="3">
					<b>Fecha de compra:</b> <?php echo  date("d") . "/" . date("m") . "/" . date("Y"); ?>
				</td>
				<td colspan="2">
					Subtotal
				</td>
				<td colspan="2">
					<?php
						echo number_format($subTotalTotal, 2)."$";
					?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					IVA
				</td>
				<td colspan="2">
					<?php
						echo number_format($ivaTotal, 2)."$";
					?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					Total
				</td>
				<td colspan="2">
					<?php
						echo number_format($totalFinal, 2)."$";
					?>
				</td>
			</tr>
		</tbody>
	</table>

</div>

<?php 
	var_dump($send);
 ?>
<div class="sendingData" style="width: 40%; margin-left: auto; margin-right: auto; ">
	<p><b>Nombre:</b>  <?php echo $send->nombre; ?></p>
	<p><b>Email:</b>  <?php echo $send->email; ?></p>
	<p><b>Calle:</b>  <?php echo $send->calle; ?></p>
	<p><b>NE:</b>  <?php echo $send->ne; ?>		<b>NI:</b>  <?php echo $send->ni; ?></p>
	<p><b>Colonia:</b>  <?php echo $send->colonia; ?>		<b>CP:</b>  <?php echo $send->cp; ?></p>
	<p><b>Municipio:</b>  <?php echo $send->municipio; ?></p>
	<p><b>Estado:</b>  <?php echo $send->estado; ?></p>
	<p><b>Pais:</b>  <?php echo $send->pais; ?></p>
</div>