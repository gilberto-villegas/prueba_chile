$(document).ready(function() {
//js que configura las calendario entre dos campos, o dos fechas
    $('.input-daterange').datepicker({
        format: "yyyy/mm/dd",//formato de la fecha
        todayBtn: "linked",//al oprimir el boton hoy automaticamente te agrela la fecha actual en el campo
        clearBtn: true,//boton para limpiar el campo
        language: "es",//lenguaje del calendario
        orientation: "bottom left",//ubicacion del calendario alrededor del campo
        keyboardNavigation: true,//ni idea
        forceParse: false,
        //daysOfWeekDisabled: "0,6", //bloquea los dias que se le indiquen
        daysOfWeekHighlighted: "0,6", //resalta los dias que se le indiquen
        autoclose: true, //permite que se cierre el calendario al seleccionar la fecha
        todayHighlight: true, //resalta la fecha de hoy
        beforeShowMonth: function (date){
            if (date.getMonth() == 8) {
                return false;
            }
        },
        //defaultViewDate: { year: 1977, month: 04, day: 25 }
    });
});