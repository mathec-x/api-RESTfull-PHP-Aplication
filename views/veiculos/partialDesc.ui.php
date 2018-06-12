<?php include "../../models/services.bll.php"; ?>

<?php 

$obj = new service;
$obj->setId($_GET['uid']);
$model = $obj->desc(); ?>

<div class="row">
	<div class="col s12">
		<h5 class="teal-text"><?php echo $model['descMarca'] ?></h5>
		<h6>Ano: <?php echo $model['ano'] ?></h6>

		<p><?php echo $model['descObs'];?></p>
		
	</div>
</div>
        <footer>
        	<div class="col s12">
             	<button onclick="updateText(<?php echo $_GET['uid']?>)" class="btn">
             		<i class="material-icons left">add</i>editar
             	</button> 
             	<?php 
             		if ($model['updated'] != null) {
             			$up = new DateTime($model['updated']);
						echo "<small>ultima atualização ".$up->format("d/m/Y H:i:s")."<small>";              			
             		}
             	 ?>
	       	</div>
        </footer>
<script>
	function updateText(val){
		$("#partialDesc").load("views/veiculos/updateDesc.ui.php?uid="+val);
	}
</script>	