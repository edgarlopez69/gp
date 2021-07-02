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

<div style="margin-right: auto;
		margin-left: auto;
		display: block;
		width: 80%;">
	<table border="1" style="border-color: rgb(221,40,109);width: 100%;
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
			<th style="width: 10%">
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
