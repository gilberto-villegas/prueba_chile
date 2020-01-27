@php
  $date = date("A");
  if($date == 'AM') {
    $saludo='Buenos Dias';
    $tiempo= 'Día';
  }
  else{ 
    $saludo='Buenas Tardes';
    $tiempo= 'Tarde';
  }
@endphp
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <h3><b style="font-style: oblique;">Evaluación Practica Agence</b></h3>
           </div>
           <div class="modal-body">
              <h4>Bienvenido <b>{{ Session::get('nom')}}</b></h4>
              {{$saludo}}, te invito a revisar cuidadosamente cada uno de los items expuestos en el test practico. Espero sea de su agrado.<br><br><strong style="font-style: oblique;">Gilberto Villegas</strong><br><br>
              <b>Feliz {{$tiempo}}</b>
              
       </div>
           <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn" style="background-color: #009688; color:#fff;">Continuar</a>
           </div>
      </div>
   </div>
</div>