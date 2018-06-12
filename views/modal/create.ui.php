<a href="#!aplication" class="modal-close waves-effect waves-green btn-floating"><i class="material-icons">close</i></a>
<div class="row" style="padding: 20px">
	<p>Criar novo modelo</p>
    <form class="col s12" id="create">
      <div class="row">
        <div class="input-field col m9">
          <input id="first" type="text" name="marca" class="validate" required>
          <label for="first">Marca/Modelo</label>
        </div>
        <div class="input-field col m3">
          <input id="year" type="number" name="year" class="validate" maxlength="4" minlength="4" required>
          <label for="year">Ano</label>
        </div>
        <div class="input-field col s12">
          <textarea id="input_text"  name="desc" data-length="200" required  class="materialize-textarea"></textarea>
          <label for="input_text">Descrição</label>
        </div>
      </div>
      <button type="submit" class="btn right waves-effect waves-light">Salvar</button>			
   </form>
</div>
<div class="modal-footer"></div>
<script>
$("#create").on('submit',function(e) {
  e.preventDefault();
  let formData = $(this).serialize();
  $.ajax({
  	url: 'views/modal/partialView.ui.php',
  	type:  'POST',
  	data: formData,
  	success: function(){
  		if ($("#listaPartial").is(":visible")) {$("#listaPartial").load('views/veiculos/partialView.ui.php');}
      document.getElementById("create").reset();
    }
  })
});
$(document).ready(function() {
  $('#input_text').characterCounter();
});
</script>