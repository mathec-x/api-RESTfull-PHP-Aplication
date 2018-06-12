<?php include "../../classes/Veic.class.php";

if (isset($_POST['delete'])) {
	
	$delete = new Veic;
	$delete->setDelete($_POST['delete']);	
}

if (isset($_POST['venda'])) {
	
	$delete = new Veic;
	$delete->setUpdate($_POST['venda'],$_POST['uid']);	
}

foreach (Veic::getContent() as $key) { 
$created = new DateTime($key['created']);
$marca = explode(" ", $key['descMarca'])[0];
$modelo = explode($marca, $key['descMarca'])[1];
?>
<li class="collection-item" onclick="partialDesc(<?php print $key['idveiculos'] ?>)" id="trId" style="cursor:pointer">
  <span class="title"><h5><?php print $marca ?></h5></span>
  <blockquote><?php print $modelo ?> </blockquote>
  <blockquote><?php print $key['ano'] ?></blockquote>
  
  <a class="btn-floating right secondary-content" onclick="remove(<?php print $key['idveiculos'] ?>)">
    <i class="material-icons" onmouseover="M.toast({html: "excluir"})">close</i>
  </a>

  <p class="switch">Vendido
    <label>
      N
      <input type="checkbox" <?php Veic::specVenda($key['vendido']); ?> id="venda" data-uid="<?php print $key['idveiculos'] ?>">
      <span class="lever"></span>
      S
    </label>
  </p>
 </li>

<?php  } ?>

<script>
  
$("input[id^=venda]").on('change',function() {
    let uid = $(this).attr("data-uid");
    let onOff = $(this).attr("checked") ? "N" : "S";
    
    $.ajax({
      url: 'views/veiculos/partialView.ui.php',
      type: 'POST',
      data: {
        venda : onOff,
        uid : uid,
      },
      success: function(data){
        $("#listaPartial").html(data);
      }
    })
});
partialDesc = function(data){
  $("#partialDesc").load("views/veiculos/partialDesc.ui.php?uid="+data);
}

$("[id^=trId]").click(function() {
  $("[id^=trId]").removeClass('blue lighten-4');
  $(this).addClass('blue lighten-4');
});

</script>