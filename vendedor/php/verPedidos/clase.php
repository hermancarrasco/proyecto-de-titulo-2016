<?php
class BaseDeDatos{

	private $ser;
	private $usu;
	private $pas;
	private $bd;
	private $id_bd;
	private $id_con;




	
	function conectarBD(){
			$this->ser="localhost"; //servidor
			$this->usu="root"; //usuario
			$this->pas=""; //contraseña
			$this->bd="proyecto"; //base de datos
			
			$this->id_con=mysql_connect($this->ser,$this->usu,$this->pas); //cineccion a la BD
			if(!$this->id_con){
				die("Error en la conexion con la BD");
			}
			$this->id_bd=mysql_select_db($this->bd,$this->id_con); //Seleccion de la BD
			if(!$this->id_bd){
				die("Error en la seleccion de la BD");
			}
			mysql_set_charset('utf8');
		}
		function desconectarBD(){
			mysql_close($this->id_con);
		}

		
/****  Funcion para mostrar pedidos en el mapa  ****/
function mostrarPedidos($zona)
{

	mysql_set_charset('utf8');
	$sql="SELECT * FROM gas_ventas,gas_producto where gas_ventas.id_prod=gas_producto.id_producto and gas_ventas.entregado=0 and zona=$zona order by gas_ventas.direccion asc;";
			$sentencia=mysql_query($sql,$this->id_con);
			

			echo '<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Dirección</th>
							<th>Tipo de Gas</th>
							<th>Fecha Pedido</th>
							<th>Hora Pedido</th>
							<th>Entregar</th>
						</tr>
					</thead>
					<tbody>';
						
					
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
					echo "<tr>							
							<td>".$rs["direccion"]."</td>
							<td>".$rs["nombre_producto"]."</td>
							<td>".$rs["fecha_venta"]."</td>
							<td>".$rs["hora"]."</td>
							<td><button type='button' class='btn btn-default' onClick='entregar(".$rs["id_venta"].")'><i class='fa fa-check fa-2x'></i></button></td>
						</tr>";
				
			}

			echo '</tbody>
				</table>
			</div>';
			
}
/****  cierre funcion de mostrar los pedidos de la zona del vendedor  ****/


/****    ****/
/****    ****/

function entregarPedido($id)
{
	$sql="UPDATE `proyecto`.`gas_ventas` SET `entregado` = b'1', `pagado` = b'1' WHERE `gas_ventas`.`id_venta` = $id;";
	$sentencia=mysql_query($sql,$this->id_con);
	echo "Pedido Entregado";
}
/****  cierre funcion de entregar el pedido de la zona  ****/
/****    ****/
/****    ****/
}//cierre BD
?>