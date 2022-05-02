<aside class="main-sidebar">
	 <section class="sidebar">
		<ul class="sidebar-menu">
		<?php
		if($_SESSION["perfil"] == "Administrador"){
			echo '<li class="active">
				<a href="inicio">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>
			<li>
				<a href="usuarios">
					<i class="fa fa-user"></i>
					<span>Usuarios</span>
				</a>
			</li>';
		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){
			echo '<li>
				<a href="categorias">
					<i class="fa fa-th"></i>
					<span>Categorías</span>
				</a>
			</li>
			<li>
				<a href="productos">
					<i class="fa fa-product-hunt"></i>
					<span>Productos</span>
				</a>
			</li>';
		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){
			echo '<li>
				<a href="clientes">
					<i class="fa fa-users"></i>
					<span>Clientes</span>
				</a>
			</li>
			<li>
				<a href="ventas">
					<i class="fa fa-cubes"></i>
					<span>Ventas</span>
				</a>
			</li>';
		}
		?>
		</ul>
	 </section>
</aside>