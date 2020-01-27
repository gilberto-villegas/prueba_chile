$(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
});


function GraficoDeBarras(idForm) {
    var formData = $("#" + idForm).serialize(); 
    $.ajax({
        data: formData,
        type: "GET",
        url: "/admin/GraficoBarras",
        success: function (points) {

        	$('#pie-chart').hide();
        	$('#resultado').hide();
        	$('#chartdiv').show();

        	am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart3D);

// Add data

var chart = am4core.create("chartdiv", am4charts.XYChart);
    chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect
    $.each(points, function( index, value ) {
        //alert(value.no_usuario);
        chart.data.push({
            "country": value.no_usuario,
            "visits": value.liquido
        });
    });


// Create axes
let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.renderer.labels.template.hideOversized = false;
categoryAxis.renderer.minGridDistance = 20;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.tooltip.label.rotation = 270;
categoryAxis.tooltip.label.horizontalCenter = "right";
categoryAxis.tooltip.label.verticalCenter = "middle";

let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "Countries";
valueAxis.title.fontWeight = "bold";

// Create series
var series = chart.series.push(new am4charts.ColumnSeries3D());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
columnTemplate.stroke = am4core.color("#FFFFFF");

columnTemplate.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

columnTemplate.adapter.add("stroke", function(stroke, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

chart.cursor = new am4charts.XYCursor();
chart.cursor.lineX.strokeOpacity = 0;
chart.cursor.lineY.strokeOpacity = 0;

}); // end am4core.ready()

        }
    });
    return false;
}

function GraficoDeTorta(idForm) {
    var formData = $("#" + idForm).serialize(); 
    $.ajax({
        data: formData,
        type: "GET",
        url: "/admin/GraficoDone",
        success: function (points) {


        	$('#resultado').hide();
        	$('#chartdiv').hide();
        	$('#pie-chart').show();
        	am4core.ready(function() {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Create chart instance
            var chart = am4core.create("pie-chart", am4charts.PieChart);

            $.each(points, function( index, value ) {
                
                chart.data.push({
                    "curso": value.no_usuario,
                    "cantidad": value.liquido
                });
            });
            
                // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "cantidad";
            pieSeries.dataFields.category = "curso";
            pieSeries.innerRadius = am4core.percent(50);
            pieSeries.ticks.template.disabled = true;
            pieSeries.labels.template.disabled = true;

            var rgm = new am4core.RadialGradientModifier();
            rgm.brightnesses.push(-0.8, -0.8, -0.5, 0, - 0.5);
            pieSeries.slices.template.fillModifier = rgm;
            pieSeries.slices.template.strokeModifier = rgm;
            pieSeries.slices.template.strokeOpacity = 0.4;
            pieSeries.slices.template.strokeWidth = 0;

            chart.legend = new am4charts.Legend();
            chart.legend.position = "right";

            
            }); // end am4core.ready()
        }
    });
    return false;
}
function Relatorio(idForm) 
{
		var formData = $("#" + idForm).serialize();

		   	// paticion ajax
        var request = $.ajax({                        
					           type: "GET",                 
					           url: "/admin/comercial/relatorio",                     
					           data: formData,
					           //dataType: "html"
						      });
        // validando respuesta 
        request.done(function( data ) {
			
        	$('#chartdiv').hide();
        	$('#pie-chart').hide();
			  	$('#resultado').html(data)
			  	$('#resultado').show();
		});

        // falla la respuesta
        request.fail(function( jqXHR, textStatus ) {
			  data="<div class='col-md-12 text-danger'> No se Encontro Resultados...</div>";
			  $('#resultado').html(data);
		});

	return false;
}