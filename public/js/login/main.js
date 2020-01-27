(function () {
	"use strict";

	var treeviewMenu = $('.app-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});

	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

})();
$(document).ready(function() {
    $('#sampleTable,#clientes,#cargos').DataTable();
    $('#todos').show();

    
     $('#demoDate').datepicker({
        format: "yy/mm/dd",
        autoclose: true,
        todayHighlight: true
      });

      $('#demoDate1').datepicker({
        format: "yy/mm/dd",
        autoclose: true,
        todayHighlight: true
      });

      $('#demoDate2').datepicker({
        format: "yy/mm/dd",
        autoclose: true,
        todayHighlight: true
      });

      var gen_cliente_sistema_id = $('#gen_cliente_sistema_id').val();
        var ruta ='/superadmin/ColorClienteSistemaAdmin';


        $.ajax({
                url: ruta,
                type: 'GET',
            })
            .done(function(data) {
                //alert(data);
                $(".app-header__logo").css('background-color',data);
                $(".app-header").css('background-color',data);
            })
            .fail(function(jqXHR, textStatus, thrownError) {
                errorAjax(jqXHR,textStatus)
            })

} );

//Validar boton de envio login
$("#password").keyup(function(event){
	var cantidad = $("#password").val();
	if (cantidad.length == 6) {
		$("#enviarForm").attr('disabled', false);
	}
	if (cantidad.length < 6) {
		$("#enviarForm").attr('disabled', true);
	}
		
		
	}); 


//$(window).load(function(){

 $(function() {
  $('#logo').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida').attr("src",result);
     }
    });
  /*Collapce del index*/
  $(function(){
 $('.btn-circle').on('click',function(){
   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
   $(this).addClass('btn-info').removeClass('btn-default').blur();
 });

 $('.next-step, .prev-step').on('click', function (e){
   var $activeTab = $('.tab-pane.active');

   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');

   if ( $(e.target).hasClass('next-step') )
   {
      var nextTab = $activeTab.next('.tab-pane').attr('id');
      $('[href="#'+ nextTab +'"]').addClass('btn-info').removeClass('btn-default');
      $('[href="#'+ nextTab +'"]').tab('show');
   }
   else
   {
      var prevTab = $activeTab.prev('.tab-pane').attr('id');
      $('[href="#'+ prevTab +'"]').addClass('btn-info').removeClass('btn-default');
      $('[href="#'+ prevTab +'"]').tab('show');
   }
 });
});

function todos() {
  $('#todos').show();
  $('#activos').hide();
  $('#inactivos').hide();
}

function activos() {
  $('#todos').hide();
  $('#activos').show();
  $('#inactivos').hide();
}

function inactivos() {
  $('#todos').hide();
  $('#activos').hide();
  $('#inactivos').show();
}

function soloNumeros(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "+0123456789";
   especiales = "8-37-39-46";

   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}

function soloLetras(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "-abcdefghijklmnñopqrstuvwxyz. ";
   especiales = "8-37-39-46";

   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}


/* Validación Registro Usuarios*/
function enviarusuarios() {

var mens=[
    'Estimado usuario. Debe ingresar el Primer Nombre para completar el registro',
    'Estimado usuario. Debe ingresar el Segundo Nombre para completar el registro',
    'Estimado usuario. Debe seleccionar el Primer Apellido para completar el registro',
    'Estimado usuario. Debe ingresar el Numero de Cedula para completar el registro',
    'Estimado usuario. Debe ingresar la Fecha de Nacimiento para completar el registro',
    'Estimado usuario. Debe Cargar su Foto para completar el registro',
    'Estimado usuario. Debe seleccionar un Cargo para completar el registro',
    'Estimado usuario. Debe seleccionar el Tipo de Usuario para completar el registro',
    'Estimado usuario. Debe seleccionar un Estatus para completar el registro',
    'Estimado usuario. Debe ingresar la Fecha de Ingreso para completar el registro',
    'Estimado usuario. Debe ingresar la Fecha de Egreso para completar el registro',
    'Estimado usuario. Debe ingresar el Correo Electronico para completar el registro',
    'Estimado usuario. Debe ingresar una Contraseña para completar el registro',
    'Estimado usuario. Debe Confirmar su Contraseña completar el registro',
    'Estimado usuario. Debe seleccionar una Pregunta de Seguridad para completar el registro',
    'Estimado usuario. Debe ingresar una Respuesta de Seguridad para completar el registro',
]

function validaregisterusers(input, mensaje,num) {
    if ($("#"+input).val()=="") {
        swal("Por Favor!", mensaje, "warning")
        $("#"+input).focus();
        key=1;
        $('#ok'+num).remove()
        $("#"+input).css('border', '1px solid red').after('<span id="ok'+num+'" style="color:red" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>');
        return 1;
    }else{
        $('#ok'+num).remove()
        $("#"+input).css('border', '1px solid green').after('<span id="ok'+num+'" style="color:green" class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>');
        return 0;
    }
}

    var key=0;
$("#registerusers").submit(function() {
    key = validaregisterusers('primer_nombre', mens[0],0)
    if(key == 1){return false}
    key = validaregisterusers('segundo_nombre', mens[1],1)
    if(key == 1){return false}
    key = validaregisterusers('primer_apellido', mens[2],2)
    if(key == 1){return false}
    key = validaregisterusers('numero_documento', mens[3],3)
    if(key == 1){return false}
    key = validaregisterusers('fecha_nacimiento', mens[4],4)
    if(key == 1){return false}
    key = validaregisterusers('foto', mens[5],5)
    if(key == 1){return false}
    key = validaregisterusers('gen_cargo_id', mens[6],6)
    if(key == 1){return false}
    key = validaregisterusers('cat_tipo_usuario_id', mens[7],7)
    if(key == 1){return false}
    key = validaregisterusers('gen_status_id', mens[8],8)
    if(key == 1){return false}
    key = validaregisterusers('fecha_ingreso', mens[9],9)
    if(key == 1){return false}
    key = validaregisterusers('fecha_egreso', mens[10],10)
    if(key == 1){return false}
    key = validaregisterusers('email', mens[11],11)
    if(key == 1){return false}
    key = validaregisterusers('password', mens[12],12)
    if(key == 1){return false}
    key = validaregisterusers('password_confirm', mens[13],13)
    if(key == 1){return false}
    key = validaregisterusers('cat_pregunta_seg_id', mens[14],14)
    if(key == 1){return false}
    key = validaregisterusers('respuesta_seg', mens[15],15)
    if(key == 1){return false}

    if (key==0) {
        return true;
    }
});
}




function enviarNivel(){

var mens=[
    'Estimado usuario. Debe ingresar el Nombre del Nivel para completar el registro',
    'Estimado usuario. Debe ingresar la Descripción del Nivel para completar el registro',
    'Estimado usuario. Debe seleccionar un Cargo para completar el registro',
    
    
]

function registerCliente(input, mensaje,num) {
    if ($("#"+input).val()=="") {
        swal("Por Favor!", mensaje, "warning")
        $("#"+input).focus();
        key=1;
        $('#ok'+num).remove()
        $("#"+input).css('border', '1px solid red').after('<span id="ok'+num+'" style="color:red" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>');
        return 1;
    }else{
        $('#ok'+num).remove()
        $("#"+input).css('border', '1px solid green').after('<span id="ok'+num+'" style="color:green" class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>');
        return 0;
    }
}

    var key=0;
$("#registerNivel").submit(function() {
    key = registerCliente('nombre_nivel', mens[0],0)
    if(key == 1){return false}
    key = registerCliente('descripcion_nivel', mens[1],1)
    if(key == 1){return false}
    key = registerCliente('gen_cargo_id', mens[2],2)
    if(key == 1){return false}
    
    

    if (key==0) {
        return true;
    }
});
}

function enviarcliente(){

var mens=[
    'Estimado usuario. Debe ingresar el Nombre para completar el registro',
    'Estimado usuario. Debe ingresar el Número telefonico para completar el registro',
    'Estimado usuario. Debe ingresar el correo para completar el registro',
    'Estimado usuario. Debe subir una imagen para completar el registro',
    'Estimado usuario. Debe ingresar una contraseña para completar el registro',
    
]

function registerCliente(input, mensaje,num) {
    if ($("#"+input).val()=="") {
        swal("Por Favor!", mensaje, "warning")
        $("#"+input).focus();
        key=1;
        $('#ok'+num).remove()
        $("#"+input).css('border', '1px solid red').after('<span id="ok'+num+'" style="color:red" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>');
        return 1;
    }else{
        $('#ok'+num).remove()
        $("#"+input).css('border', '1px solid green').after('<span id="ok'+num+'" style="color:green" class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>');
        return 0;
    }
}

    var key=0;
$("#registerNewCliente").submit(function() {
    key = registerCliente('nombre_cliente', mens[0],0)
    if(key == 1){return false}
    key = registerCliente('telefono_cliente', mens[1],1)
    if(key == 1){return false}
    key = registerCliente('email', mens[2],2)
    if(key == 1){return false}
    key = registerCliente('logo_cliente', mens[3],3)
    if(key == 1){return false}
    key = registerCliente('password', mens[4],4)
    if(key == 1){return false}
    

    if (key==0) {
        return true;
    }
});
}

function enviarCargo(){

var mens=[
    'Estimado usuario. Debe ingresar el Nombre del Cargo para completar el registro',
    'Estimado usuario. Debe ingresar la Descripción del Cargo para completar el registro',
    
    
    
]

function registerCargo(input, mensaje,num) {
    if ($("#"+input).val()=="") {
        swal("Por Favor!", mensaje, "warning")
        $("#"+input).focus();
        key=1;
        $('#ok'+num).remove()
        $("#"+input).css('border', '1px solid red').after('<span id="ok'+num+'" style="color:red" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>');
        return 1;
    }else{
        $('#ok'+num).remove()
        $("#"+input).css('border', '1px solid green').after('<span id="ok'+num+'" style="color:green" class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>');
        return 0;
    }
}

    var key=0;
$("#registerCargo").submit(function() {
    key = registerCargo('nombre_cargo', mens[0],0)
    if(key == 1){return false}
    key = registerCargo('descripcion_cargo', mens[1],1)
    if(key == 1){return false}
    
    
    

    if (key==0) {
        return true;
    }
});
}

function Ocultar1(){ 
  $('#activos').hide();
  $('#inactivos').hide();
  $('#todos').show();
}

function Ocultar2(){ 
  $('#activos').show();
  $('#inactivos').hide();
  $('#todos').hide();
}

function Ocultar3(){ 
  $('#activos').hide();
  $('#inactivos').show();
  $('#todos').hide();
}

