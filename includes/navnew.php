<?php $roll=$mostrar_usu['id_roll'] ?>
<div class="row">
        <div class="col-md-12 text-right gtco-contact">
          <ul class="">
            <!-- <li><a href="#"><i class="icon-phone"></i> +1 (0)123 456 7890 </a></li>
            <li><a href="#"><i class="ti-twitter-alt"></i> </a></li>
            <li><a href="#"><i class="ti-facebook"></i></a></li> -->
            <li id="btn-abrir-popup"><a href="#" ><i class="ti-user"></i> <?php echo $mostrar_usu['name']; ?> </a><?php if ($mostrar_usu['id_roll']==1) { if($solicitudesTotal>0){?><span class="label label-warning"><?php echo $solicitudesTotal;?></span><?php } } ?></li>
          </ul>
        </div>
      </div>
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="../vistasnew/index.php">Home</a></li>
						<li><a href="../vistasnew/saldoPendiente.php">Saldo Pendiente</a>
						<li><a href="../vistasnew/mostrarPagos.php">Pagos</a>
						<li><a href="../vistasnew/usuarios.php">Usuarios</a></li>
					</ul>
				</div>
			</div>

				<!-- if ($roll==1) {
					?>
						<li><a href="../vistasnew/ingresos.php">Ingresos</a></li>
					
					} -->