function guardar() {
  let parametros = {
    "_token"       : $('#token').val(),
    "producto"     : $('#producto').val(),
    "cantidad"     : $('#cantidad').val(),
    "estado"       : $('#estado').val(),
    "bodega"       : $('#bodega').val(),
    "observaciones": $('#observaciones').val(),
  };

  $.ajax({
    url     :  "/productos",
    type    :  'POST',
    dataType:  'json',
    data    :   parametros,
    success :   function (data) {
        var url = '/'; 
  		$(location).attr('href',url);
    },
    error   :   function(err) {
      console.log(err);
    }
  });
}
function cambiarEstado(id){
    if (confirm('¿Esta Seguro de querercambiar el estado?')) {
      $.ajax({
        url     :  "/productos/" + id,
        type    :  'GET',
        dataType:  'json',
        success :   function (data) {
            var url = '/'; 
          $(location).attr('href',url);
        },
        error   :   function(err) {
          console.log(err);
        }
      });
    }
    
}