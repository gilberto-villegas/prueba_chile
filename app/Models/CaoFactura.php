<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CaoFactura extends Model
{
 
    protected $table = 'cao_fatura';

     protected $fillable = [

             'co_factura',
             'co_cliente',
             'co_sistema',
             'co_os',
             'num_nf',
             'total',
             'valor',
             'data_emissao',
             'corpo_nf',
             'comissao_cn',
             'total_imp_inc'

    ];
    
    public function rCoos(){

        return $this->hasOne('App\Models\CaoOs','co_os','co_os');
    }

    

}
