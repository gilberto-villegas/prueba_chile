<?php

namespace App\Http\Controllers;

use App\Models\CaoFactura;
use App\Models\CaoUsuario;
use App\Models\PermissaoSistema;
use App\Models\CaoOs;
use Illuminate\Http\Request;
use Session;
use Auth;
use Laracasts\Flash\Flash;
use Alert;
use Illuminate\Support\Facades\DB;

class ComercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $listaConsultores=PermissaoSistema::where('co_sistema',1)
                            ->where('in_ativo','S')
                            ->whereIn('co_tipo_usuario',[0,1,2])
                            ->with('rCousuario')
                            ->get();
            
        $title="Chile";
        $descripcion="Consultores";
            
        return view('home.index', compact('title','descripcion','listaConsultores'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function relatorio(Request $request)
    {
        $fdesde=strtotime(date('Y-m',strtotime($request->desde)));
        $fhasta=strtotime(date('Y-m',strtotime($request->hasta)));
        //dd(1);
        
        $resultRelatorio=CaoUsuario::whereIn('co_usuario',$request->co_usuario)
        ->with('rCaoos.rCaoFactura')
        ->with('rCaoSalario')
        ->get();

        // inicio de tabla html 
        $html='<table class="col-md-12 table table-striped table-bordered">';
           
            // iterando consultores   
            foreach ($resultRelatorio as $key1 => $consultor) 
            {
                // imprimir fila con el nombre consultor html
                $html.="<tr><td colspan='5' bgcolor='#009688'> Consultor: <b>".$consultor->no_usuario."</b></td></tr>";
                 
                 // imprimir fila con titulos tabla html
                 $html.="<tr><b><td>Periodo</td><td>Receita Líquida</td><td>Custo Fixo</td><td>Comissão</td><td>Lucro</td></b></tr>";

                    // iterando ordenes de servicios para extraer las facturas    
                    foreach ($consultor->rCaoos as $key2 => $ordenServicio) 
                    {

                            // validar solo las ordenes de servicios con facturas
                            if (!empty($ordenServicio->rCaoFactura->get(0)->valor)) 
                            { 
//dump($ordenServicio);
//echo "valor-->".$ordenServicio->rCaoFactura->get(0)->valor."-==-";
//echo "imp-->".$ordenServicio->rCaoFactura->get(0)->total_imp_inc."-==-";
//echo "total-->".$ordenServicio->rCaoFactura->get(0)->total."-==-";
//echo "fecha-->".$ordenServicio->rCaoFactura->get(0)->data_emissao."<br>";
                                // almacena, ordena la colecion de facturas y transforma las fechas
                                $facturas[]= $ordenServicio->rCaoFactura->transform(function ($item){
                                            return [                                            
                                                        'data_emissao'  => date('Y-m',strtotime($item['data_emissao'])),
                                                        'co_fatura'     => $item['co_fatura'],
                                                        'co_cliente'    => $item['co_cliente'],
                                                        'co_sistema'    => $item['co_sistema'],
                                                        'co_os'         => $item['co_os'],
                                                        'total'         => $item['total'],
                                                        'valor'         => $item['valor'],
                                                        'comissao_cn'   => $item['comissao_cn'],
                                                        'total_imp_inc' => $item['total_imp_inc'] 
                                                    ];
                                            });
                            }
                    }

                    // variables para almacenar el balance total por periodo 
                    $saldo_ingreso_neto=0;  
                    $saldo_comision=0;
                    $saldo_lucro=0;
                    $saldo_costo_fijo=0;

                    // agrupa la coleccion de facturas y ordena por fechas y aplana la coleccion
                    $facturas=collect(@$facturas)->flatten(1)->sortBy('data_emissao')->groupBy('data_emissao');
                    
                    // iterando las facturas por mes
                    foreach ($facturas as $fecha => $factura) 
                    {

                        $cantidadFacturasMes=count($factura);// se obtiene cantidad de facturas existente por mes
                       
                        //variables para almacenar totales por mes
                        $suma_ingreso_neto=0;  
                        $suma_comision=0;
                        $suma_lucro=0;

                        // filtrar la fecha del periodo
                        if (strtotime($fecha)>=$fdesde && strtotime($fecha)<=$fhasta) 
                        {

                            for ($i=0; $i<$cantidadFacturasMes ; $i++) 
                            {
                                $fecha=$factura[$i]['data_emissao'];
                                
                                //variables de Factura
                                $porcentaje          = $factura[$i]['total_imp_inc'] * $factura[$i]['valor']/100;
                                $porcentaje_comision = $factura[$i]['comissao_cn'] / 100;
                                $neto      = $factura[$i]['valor'] - $porcentaje;
                                $costoFijo = @$consultor->rCaoSalario->brut_salario;
                                $comision  = ($factura[$i]['valor'] - $porcentaje)*$porcentaje_comision;
                                $lucro     = $neto-(@$consultor->rCaoSalario->brut_salario-@$comision);
                                
                                $suma_ingreso_neto+=$neto;
                                $suma_comision+=$comision;
                                $suma_lucro+=$lucro;  

                            }

                            //variables de saldo 
                            $saldo_ingreso_neto+=$suma_ingreso_neto;
                            $saldo_comision+=$suma_comision;
                            $saldo_lucro+=$suma_lucro;
                            $saldo_costo_fijo+=$costoFijo;

                            //impresion de filas con la sumatoria por mes html    
                            $html.="<tr>";
                                $html.="<td>".$fecha."</td>";
                                $html.="<td> R$ ".number_format( $suma_ingreso_neto, 2, ',', '.' )."</td>";
                                $html.="<td> R$ ".number_format( $costoFijo, 2, ',', '.' )."</td>";
                                $html.="<td> R$ ".number_format( $suma_comision, 2, ',', '.' )."</td>";
                                $html.="<td> R$ ".number_format( $suma_lucro, 2, ',', '.' )."</td></tr>";
                            $html.="</tr>";

                        }
                    }

                //impresion de filas con el balance por periodo html  
               $html.="<tr bgcolor='#F7B9B9'>";
                    $html.="<td >SAlDO</td>";
                    $html.="<td> R$ ".number_format( $saldo_ingreso_neto, 2, ',', '.' )."</td>";
                    $html.="<td> R$ ".number_format( $saldo_costo_fijo, 2, ',', '.' )."</td>";
                    $html.="<td> R$ ".number_format( $saldo_comision, 2, ',', '.' )."</td>";
                    $html.="<td> R$ ".number_format( $saldo_lucro, 2, ',', '.' )."</td></tr>";
                $html.="</tr>";
            }
//dd(1);
        // finalizando tabla
        $html.="</table>";

        // retornando html
        return $html;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CaoFactura  $caoFactura
     * @return \Illuminate\Http\Response
     */
    public function show(CaoFactura $caoFactura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CaoFactura  $caoFactura
     * @return \Illuminate\Http\Response
     */
    public function edit(CaoFactura $caoFactura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CaoFactura  $caoFactura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaoFactura $caoFactura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CaoFactura  $caoFactura
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaoFactura $caoFactura)
    {
        //
    }


    public function GraficoBarras (Request $request, CaoFactura $caoFactura){

         //grafico1
        $grafico1=DB::table('cao_fatura AS cf')
            ->join('cao_os AS co','cf.co_os','=','co.co_os')
            ->join('cao_usuario AS cu','co.co_usuario','=','cu.co_usuario')


            ->select(
                DB::raw('sum(cf.valor-(cf.total_imp_inc/100)*cf.valor) AS liquido'), 
                DB::raw('MONTH(cf.data_emissao) AS mes'),
                DB::raw('cu.no_usuario')
                
                )
            ->whereBetween('cf.data_emissao',[$request->desde,$request->hasta])
            ->whereIn('co.co_usuario',$request->co_usuario)
            ->groupBy('mes','no_usuario')
            ->get();
 //dd($grafico1);
            //$grafico1=collect($grafico1)->groupBy('mes');
           
        return response()->json($grafico1);
        //dd($grafico1);
        
        

    }


    public function GraficoDone (Request $request, CaoFactura $caoFactura){

        $grafico2=DB::table('cao_fatura AS cf')
            ->join('cao_os AS co','cf.co_os','=','co.co_os')
            ->join('cao_usuario AS cu','co.co_usuario','=','cu.co_usuario')


            ->select(
                DB::raw('sum(cf.valor-(cf.total_imp_inc/100)*cf.valor) AS liquido'), 
                DB::raw('cu.no_usuario' )
                
                )
            ->whereBetween('cf.data_emissao',[$request->desde,$request->hasta])
            ->whereIn('co.co_usuario',$request->co_usuario)
            ->groupBy('no_usuario')
            ->get();

        return response()->json($grafico2);
        //dd($grafico2);

    }
}
