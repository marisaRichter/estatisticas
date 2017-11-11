$(document).ready(function(){

   console.log('Funcionando');



});
function showForm(id) {
  console.log(id + $('#'+id+':visible'));

  if($('#'+id).css("display") == "none"){
    console.log("TESTE:");
    $('#'+id).show();
  }else{
    $('#'+id).hide();
  }

}
