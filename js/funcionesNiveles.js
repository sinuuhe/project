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

function guardar_nivel(data){
  $.ajax({
    type:"POST",
    url:"data/insert_nivel.php",
    data:{"data":data},
    success:function(res){
      if(res!=""){
        Materialize.toast('Los datos no se insertaron correctamente, intentelo de nuevo', 2000, 'center-align red rounded');
      }else{
        Materialize.toast('Nivel guardado correctamente', 2000, 'center-align blue rounded');
        $('#modal1').modal('close');
        $("#precarga").show();
        table_update();
      }
    }
  });

}

function buscar_HTML(){
  $('#buscar_html').keyup(function(){
     var nivel = $('.nivel');
     var nombre = $('.nombre');
     var buscando = $(this).val().toLowerCase();
     var item_nivel='';
     var item_nombre='';
     var cambio_busqueda=false;
     for( var i = 0; i < nivel.length; i++ ){
         item_nivel = $(nivel[i]).html().toLowerCase();
         item_nombre = $(nombre[i]).html().toLowerCase();
         $(nivel[i]).parents('.myCollapse').next().hide();
        if( buscando.length == 0 || item_nivel.indexOf( buscando ) > -1){
            $(nivel[i]).parents('.myCollapse').show();
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

function update_nivel(id,data){
  $.ajax({
    type:"POST",
    url:"data/update_nivel.php",
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
    url:"data/obtener_niveles.php",
    dataType  : 'html',
    success:function(res){
      $("#precarga").hide();
      $('#main-tabla').html(res);
      $(".contentCollapsed").hide();

      $(".myCollapse").click(function(){
        $(this).next().toggle().is(":visible");
      });
      buscar_HTML();   

      $(".actualizar_nivel").click(function(){
        var sure = confirm("¿Seguro que quieres actualizar las modificaciones hechas?");
        if(sure){
          update_nivel($(this).parents("tr").attr("id"),$("#"+$(this).parents("tr").attr("id")+"nivel_data").serializeObject());
        }
      });
    }
  });
}


$(document).ready(function(){

  $('#sidemenu').sideNav();
  $('.modal').modal();
  table_update();
  

  $("#guardar_nivel").click(function(){
    if($("#nivel_data").find(".invalid").length!=false){
      alert("Datos incorrectos, corrigelos para continuar");
    }else{
      var data = $("#nivel_data").serializeObject();
      guardar_nivel(data);
    }
  });

});