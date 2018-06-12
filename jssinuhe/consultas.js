function buscar(selectElemento) {   
    var valorSelect = document.getElementById(selectElemento).value;
    
    var params = {
        "elemento": valorSelect,
        "tipoBusqueda":"busqueda"
    };
    $.ajax({
        data: params, //datos que se envian a traves de ajax
        url: 'crudManager.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#resultado").html(response);
           
        }
    });
};

function selectEspecificoAlumnos(id, tabla) {
  
    params = {
        "id": id,
        "tipoBusqueda":"busquedaEspecifica",
        "tabla":tabla
    };
    console.log(params);
    $.ajax({
        data: params, //datos que se envian a traves de ajax
        url: 'crudManager.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#resultadoEspecifico").html("Cargando...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#resultadoEspecifico").html(response);
            //ir arriba
            document.documentElement.scrollTop = 0;
        }
    });
    
}

function bajaEspecifica(id, tabla) {
  
    params = {
        "id": id,
        "tipoBusqueda":"baja",
        "tabla":tabla
    };
    $.ajax({
        data: params, //datos que se envian a traves de ajax
        url: 'crudManager.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#resultadoEspecifico").html("Cargando...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#resultadoEspecifico").html(response);
            buscar('selectElemento');
        }
    });

}


function actualizar(id, tabla, form,selectElemento){
    
    var unindexed_array = $('#' + form).serializeArray();
var indexed_array = {};

$.map(unindexed_array, function(n, i){
    indexed_array[n['name']] = n['value'];
});

console.dir(indexed_array);
    params = {
        "id": id,
        "tipoBusqueda":"actualizar",
        "tabla":tabla,
        "form":form,
        "jsonForm":indexed_array
    };

console.log(params)
    $.ajax({
        data: params, //datos que se envian a traves de ajax
        url: 'crudManager.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#resultadoEspecifico").html("Cargando...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#resultadoEspecifico").html(response);
            buscar('selectElemento');
        },
        error: function(error) { // if error occured
            alert("Error: " + error);
            
        }
    });
}

function registrarAlumno(formularioId){
    var unindexed_array = $('#' + formularioId).serializeArray();
    var indexed_array = {};
    
    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    params = {
        "jsonForm":indexed_array,
        "registrar_alumno":"yes"
    };

    $.ajax({
        data: params, //datos que se envian a traves de ajax
        url: 'crudManager.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#mensaje").html("Cargando...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#mensaje").html(response);
            //$("#mensaje").html('<h5>Registro Correcto!</h5><h6>Para otro registro, vuelve a llenar los datos.</h6>');
            document.documentElement.scrollTop = 0;
            $("#nombre").val("");
            $("#apellidoP").val("");
            $("#apellidoM").val("");
            $("#calle").val("");
            $("#colonia").val("");
            $("#numero").val("");
            $("#municipio").val("");
            $("#telefono").val("");
            $("#celular").val("");
            $("#email").val("");
            $("#fecha_nacimiento").val("");
            $("#fecha_ingreso").val("");
            $("#foto").val("");
            $("#beca").val("0");
            $("#empresa").val("");
            $("#sede").val("1");
        },
        error: function(error) { // if error occured
            alert("Error: " + error);
            
        }
    });
    
};


function registrarMaestro(formularioId){
    var unindexed_array = $('#' + formularioId).serializeArray();
    var indexed_array = {};
    
    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });
    params = {
        "jsonForm":indexed_array,
        "registrar_maestro":"yes"
    };

    $.ajax({
        data: params, //datos que se envian a traves de ajax
        url: 'crudManager.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#mensaje").html("Cargando...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            //$("#mensaje").html(response);
            $("#mensaje").html('<h5>Registro Correcto!</h5><h6>Para otro registro, vuelve a llenar los datos.</h6>');
            document.documentElement.scrollTop = 0;
            $("#nombre").val("");
            $("#apellidoP").val("");
            $("#apellidoM").val("");
            $("#telefono").val("");
            $("#celular").val("");
            $("#email").val("");
            $("#fecha_nacimiento").val("");
            $("#fecha_ingreso").val("");
            $("#foto").val("");
            $("#puesto").val("");
        },
        error: function(error) { // if error occured
            alert("Error: " + error);
            
        }
    });
    
};

function registrarPersonal(formularioId){
    var unindexed_array = $('#' + formularioId).serializeArray();
    var indexed_array = {};
    
    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });
    params = {
        "jsonForm":indexed_array,
        "registrar_personal":"yes"
    };

    $.ajax({
        data: params, //datos que se envian a traves de ajax
        url: 'crudManager.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#mensaje").html("Cargando...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            //$("#mensaje").html(response);
            $("#mensaje").html('<h5>Registro Correcto!</h5><h6>Para otro registro, vuelve a llenar los datos.</h6>');
            document.documentElement.scrollTop = 0;
            $("#nombre").val("");
            $("#apellidoP").val("");
            $("#apellidoM").val("");
            $("#telefono").val("");
            $("#celular").val("");
            $("#email").val("");
            $("#fecha_nacimiento").val("");
            $("#fecha_ingreso").val("");
            $("#foto").val("");
            $("#puesto").val("");
        },
        error: function(error) { // if error occured
            alert("Error: " + error);
            
        }
    });
    
};

function registrarAdministrativos(formularioId){
    var unindexed_array = $('#' + formularioId).serializeArray();
    var indexed_array = {};
    
    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });
    params = {
        "jsonForm":indexed_array,
        "registrar_administrativo":"yes"
    };
console.log(params)
    $.ajax({
        data: params, //datos que se envian a traves de ajax
        url: 'crudManager.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#mensaje").html("Cargando...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            //$("#mensaje").html(response);
            $("#mensaje").html('<h5>Registro Correcto!</h5><h6>Para otro registro, vuelve a llenar los datos.</h6>');
            document.documentElement.scrollTop = 0;
            $("#nombre").val("");
            $("#apellidoP").val("");
            $("#apellidoM").val("");
            $("#telefono").val("");
            $("#celular").val("");
            $("#email").val("");
            $("#fecha_nacimiento").val("");
            $("#fecha_ingreso").val("");
            $("#foto").val("");
            $("#puesto").val("");
        },
        error: function(error) { // if error occured
            alert("Error: " + error);
            
        }
    });
    
};