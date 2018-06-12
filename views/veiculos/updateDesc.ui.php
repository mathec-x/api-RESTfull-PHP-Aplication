<?php include "../../models/services.bll.php"; ?>

<?php 

$obj = new service;
$obj->setId($_GET['uid']);
$model = $obj->desc(); ?>

 <form class="col s12" id="updateDesc">
       <div class="input-field col s12">
        <input placeholder="Placeholder" name="newmarca" value="<?php echo $model['descMarca'] ?>" id="first_name" type="text" class="validate">
       </div>
        <div class="input-field col s6">
          <input placeholder="Placeholder" name="newano" value="<?php echo $model['ano'] ?>" id="first_name" type="text" class="validate">
        </div>
        <div class="input-field col s12">
          <textarea id="textarea1" name="newdesc" class="materialize-textarea" style="min-height: 125px"><?php echo $model['descObs'];?></textarea>
        </div>
 </form>
</form>
        <footer>
        	<div class="col s12">
             	<button onclick="updateText(<?php echo $_GET['uid']?>)" class="btn">
             		<i class="material-icons left">save</i>salvar
             	</button>
	       	</div>
        </footer>
<script>
  //usando metodo ajax como exemplo de consumo da api
	function updateText(val){
		let formData = $("#updateDesc").serialize();
		$.ajax({
			url: 'services/put/veiculos/?id='+val,
			type: 'GET',
			data: formData,
			success: function(data){
				$("#partialDesc").load("views/veiculos/partialDesc.ui.php?uid="+val);		
			}
		});
		
	}
</script>	