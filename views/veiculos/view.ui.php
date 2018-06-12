<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="col s4">
         <blockquote class="center-align"><h4>Aplicação</h4></blockquote>      
      </div> 
        <div class="input-field col s4 right">
          <i class="material-icons prefix">textsms</i>
          <input type="text" id="txtBusca" class="autocomplete">
          <label for="txtBusca">Busca</label>
        </div>
    <div class="col s12 m8" style="overflow-y: scroll; height: 75vh">
        <ul class="collection" id="listaPartial"></ul>
    </div>
    <div class="col s12 m4" id="partialDesc"></div>
   </div>
  </div>
</div>
<style>
#partialDesc {height: 75vh}
#partialDesc .row, #updateDesc{animation: blurIn 1s; margin: 50px auto !important;}
#partialDesc button {animation: fadeInbtn 1s;}
@keyframes blurIn{
    from {filter: blur(5px); opacity: 0}
    to {filter: blur(0); opacity: 1}
  }
@keyframes fadeInbtn{
    from {filter: blur(5px); opacity: 0;transform: translateX(50px);}
    to {filter: blur(0); opacity: 1}
  }
</style>
<script>
$(function(){
$("#txtBusca").keyup(function(){
  
  let texto = $(this).val().toUpperCase();
  
  $(".collection li").css("display", "block");
  $(".collection li").each(function(){
    if($(this).text().toUpperCase().indexOf(texto) < 0)
       $(this).css("display", "none");
  });
});
});
</script>