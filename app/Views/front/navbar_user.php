<?php $session = \Config\Services::session(); ?>
<nav class="navbar navbar-expand-sm navbar-dark justify-content-center">
  		<div class="d-flex">
				<a class="navbar-brand" href="<?php echo base_url('pedi_ya');?>">Pedi YA!</a>
				<!-- <a class="nav-link active" aria-current="page">Te esperamos..<?= $session->get('nombre'); ?> </a> -->
				<!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button> -->
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('ver_carrito');?>">Mi Carrito</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('quienes_somos_user');?>">Quienes somos?</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="nav3" href="<?php echo base_url('comercializacion_user');?>">Comercialización</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="nav3" href="<?php echo base_url('contacto');?>">Contacto</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('logout');?>">Cerrar Sesion</a>
				</li>
			</ul>
			</div>
  		</div>
	</nav>
