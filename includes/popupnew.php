<?php 

	$roll=$mostrar_usu['id_roll']; 
	$id_user=$mostrar_usu['id_user'];


?>
			<!-----------------------------------------  Inicio de sesión overlay login ----------------------------------------->
				<div class="overlay" id="overlay">
					<div class="popup" id="popup">
						<a href="#" class="btn-cerrar-popup" id="btn-cerrar-popup"><i class="icon-cross"></i></a>
						<h3><i class="ti-user"> </i><?php echo $mostrar_usu['name']; ?> </h3>
						<div class="content_enlaces">
							<a class="btn-popup-enla" href="../vistasnew/profile.php?id_user=<?php echo $id_user;?>"><button>Perfil</button></a>
						<?php	
							if ($roll==1) {
						?>
								<a class="btn-popup-enla" href="../vistasnew/solicitudes.php"><button>Solicitudes Nuevo Cliente <?php if($solicitudes>0){ ?><span class="label label-warning"><?php echo $solicitudes;?></span><?php } ?></button></a>
								<!-- <a class="btn-popup-enla" href="reportes.php?id_user=<?php  $id_user;?>"><button>Reportes</button></a> -->
								<a class="btn-popup-enla" href="../vistasnew/ampliarPrestamo.php"><button>Solicitudes Ampliar Prestamo <?php if($solicitudesAP>0){ ?><span class="label label-warning"><?php echo $solicitudesAP;?></span><?php } ?></button></a>
								<a class="btn-popup-enla" href="../vistasnew/ciudades.php"><button>Cuidades</button></a>
						<?php	
							}else if($roll==2) {
						?>
								<a class="btn-popup-enla" href="../vistasnew/nuevoCliente.php"><button>Nuevo Cliente</button></a>
								<a class="btn-popup-enla" href="../vistasnew/ampliarPrestamo.php"><button>Ampliar prestamo</button></a>
	
						<?php
							}
						?>
							<a class="btn-popup-enla" href="../vistasnew/historial_pagos.php"><button>Historial de pagos</button></a>
							<a class="btn-popup-enla btn-closesesion" href="../php/cerrarsesion.php"><button>Cerrar Sesión</button></a>
						</div>
					</div>
				</div>
			<!----------------------------------------- / Inicio de sesión overlay login ----------------------------------------->

