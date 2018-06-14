//Crear JSON para los datos del formulario que se envian por ajax
$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

function buscar_HTML(){
  $('#buscar_html').keyup(function(){
     var convenio = $('.convenio');
     var nombre = $('.nombre');
     var buscando = $(this).val().toLowerCase();
     var item_convenio='';
     var item_nombre='';
     var cambio_busqueda=false;
     for( var i = 0; i < convenio.length; i++ ){
         item_convenio = $(convenio[i]).html().toLowerCase();
         item_nombre = $(nombre[i]).html().toLowerCase();
         $(convenio[i]).parents('.myCollapse').next().hide();
        if( buscando.length == 0 || item_convenio.indexOf( buscando ) > -1){
            $(convenio[i]).parents('.myCollapse').show();
        }else{
            if(item_nombre.indexOf( buscando ) > -1){
              $(nombre[i]).parents('.myCollapse').show();

            }else{
              $(nombre[i]).parents('.myCollapse').hide();
            }
        }
     }
  });
}

function guardar_convenio(data){
  $.ajax({
    type:"POST",
    url:"data/insert_convenio.php",
    data:{"data":data},
    success:function(res){
      if(res!=""){
        Materialize.toast('Los datos no se insertaron correctamente, intentelo de nuevo', 2000, 'center-align red rounded');
      }else{
        Materialize.toast('Convenio guardado correctamente', 2000, 'center-align blue rounded');
        $('#modal1').modal('close');
        $("#precarga").show();
        table_update();
      }
    }
  });
}

function update_convenio(id,data){
  $.ajax({
    type:"POST",
    url:"data/update_convenio.php",
    data:{"id":id, "data":data},
    success:function(res){
      if(res!=""){
        Materialize.toast('Los datos no se actualizaron correctamente, intentelo de nuevo', 2000, 'center-align red rounded');
      }else{
        Materialize.toast('Datos actualizados correctamente', 2000, 'center-align blue rounded');
        $("#precarga").show();
        table_update();
      }
    }
  });
}

function table_update(){
  $.ajax({
    type:"POST",
    url:"data/obtener_convenios.php",
    dataType  : 'html',
    success:function(res){
      $("#precarga").hide();
      $('#main-tabla').html(res);
      $(".contentCollapsed").hide();

      $(".myCollapse").click(function(){
        $(this).next().toggle().is(":visible");
      });
      buscar_HTML();   

      $(".actualizar_convenio").click(function(){
        var sure = confirm("¿Seguro que quieres actualizar las modificaciones hechas?");
        if(sure){
          update_convenio($(this).parents("tr").attr("id"),$("#"+$(this).parents("tr").attr("id")+"convenio_data").serializeObject());
        }
      });
    }
  });
}

$(document).ready(function(){
  table_update();

  $('#sidemenu').sideNav();
  $('.modal').modal();
  $("#guardar_convenio").click(function(){
    if($("#convenio_data").find(".invalid").length!=false){
      alert("Datos incorrectos, corrigelos para continuar");
    }else{
      var data = $("#convenio_data").serializeObject();
      guardar_convenio(data);
    }
  });
});