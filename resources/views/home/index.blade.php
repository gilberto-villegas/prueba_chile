@extends('templates/layoutlte')
@section('content')
@include('home.modal')
<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4>
					<i class="icon-dots mr-2"></i> 
					<span class="font-weight-semibold">Evaluación Practica Agence</span>
				</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none">
					<i class="icon-more"></i>
				</a>
			</div>

			<div class="header-elements d-none py-0 mb-3 mb-md-0">
				<div class="breadcrumb">
					<span class="breadcrumb-item active">
						<i class="icon-clipboard3 mr-2"></i><a href="#"></a>Por Consultores
					</span>
					<span class="breadcrumb-item ">
						<i class="icon-users2 mr-2"></i><a href="#"></a> Por Clientes
					</span>
				</div>
			</div>
		</div>
	</div>
	<!-- /page header -->
	
<table>
	<tr><td colspan=""></td></tr>
</table>
	<div class="row">
		<div class="col-md-12">

			<!-- Basic layout-->
			<div class="card">
				<div class="card-header header-elements-inline">
				
					<h5 class="card-title" style="font-style: oblique;">Consultas:</h5>
					<div class="header-elements">
						<div class="list-icons">
						<button type="button" class="btn btn-sm" data-action="reload" style="background-color: #009688;"></button>
						
	                		
	                	</div>
                	</div>
				
				</div>
				
				<div class="card-body">

					<form id="comercial"> 

						<div class="row d-flex justify-content-around">
							<div class="col-md-8">
								<div class="form-group row">
									<label class="col-lg-3 col-form-label"><b>Consultores</b> <span class="text-danger">*</span></label>
									<div class="col-lg-9"><span><i class="icon-user"></i></span>
		                            <select data-placeholder="Seleccione Consultores..." id="co_usuario" name="co_usuario[]" class="form-control select-search" multiple="multiple" data-fouc required>
		                            	@foreach ($listaConsultores as $key => $consultores) 
		                            	
											<option ></option>
											
											<option value="{{ @$consultores->rCousuario->co_usuario }}">{{ @$consultores->rCousuario->no_usuario }}</option>
										
										@endforeach 
										<span><i class="icon-user"></i></span>
		                            </select>
									</div>
								</div><br><br><br><br>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label"><b>Periodo</b> <span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<div class="input-daterange input-group" id="datepicker">

								          	<i class="icon-calendar"></i><span>&nbsp; </span><b> Desde:</b> 
								          	
								          	<input type="text" class="form-control" id="desde" name="desde" placeholder="Ingresar Fecha" />
								          	<i class="icon-calendar"></i><span>&nbsp; </span><b> Hasta:</b> 
								          	<input type="text" class="form-control" id="hasta" name="hasta" placeholder="Ingresar Fecha" />
								          
								        </div><br><br><br><br>
								        <div class="input-group date">
											 
										</div>
									</div>
								</div>
															
							</div>
							
							
						</div>
						<br><br>
						<!-- Seccion relatorio -->
						<div class="row">
							<div class="col-md-4">
									
								<a href="#" title="Relatorio" class="btn btn-primary" id="relatorio" onclick="Relatorio('comercial');"> <b>R</b></a>
									
									
								
							
								<a href="#" title="Grafico de Barra" class="btn btn-info " id="grafico1" onclick="GraficoDeBarras('comercial');"><b>G</b></a>
							
								<a href="#" title=" Grafico de Pizza" class="btn btn-warning" onclick="GraficoDeTorta('comercial');"><b>P</b></a>
							</div>
						</div><br><br>
						<div class="row">
							<div class="col-md-12" id="resultado">
								<!-- imprimiendo resultado -->
							</div>
						</div>

						<!-- fin sccion relatorio-->							
	
						<div class="row">
							<div id="chartdiv"></div>
						</div>

						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div id="pie-chart" style="width: 100%; height: 400px;"></div>
								
								
							</div>
							<div class="col-md-2"></div>
						</div>	

					</form>
				</div>
			</div>
		</div>
	</div>
@stop



