<?php require RUTA_APP . '/vistas/inc/Header.php'; ?>
<p><?php echo $datos['titulo']; ?></p>
<ul>
	<?php foreach ($datos['articulos']as $articulo): ?>
		<li><?php echo $articulo->titulo; ?></li>
	<?php endforeach; ?>
</ul>
<p><?php echo AUTOR; ?></p>
<?php require RUTA_APP . '/vistas/inc/Footer.php'; ?>
