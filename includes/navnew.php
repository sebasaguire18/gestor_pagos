<?php $roll=$mostrar_usu['id_roll'] ?>
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="../vistasnew/index.php">Aesthetic <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="../vistasnew/index.php">Home</a></li>
				<?php if ($roll==1 || $roll==2 || $roll==3) {
					?>
						<li><a href="../vistasnew/saldoPendiente.php">Saldo Pendiente</a>
						<li><a href="../vistasnew/mostrarPagos.php">Pagos</a>
					<?php
					}if ($roll==1 || $roll==2) {
					?>
						<li><a href="../vistasnew/usuarios.php">Usuarios</a></li>
					<?php 
					}if ($roll==2) {
					?>
						<li><a href="../vistasnew/nuevoCliente.php">Nuevo Cliente</a></li>
					<?php	
					}if ($roll==2 || $roll==3) {
					?>
						<li><a href="../vistasnew/ampliarPrestamo.php">Ampliar prestamo</a></li>
					<?php	
					}?>
					</ul>
				</div>
			</div>

				<!-- if ($roll==1) {
					?>
						<li><a href="../vistasnew/ingresos.php">Ingresos</a></li>
					
					} -->