<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CaoUsuario extends Authenticatable
{
	use Notifiable;
    //
    protected $table = 'cao_usuario';

		protected $fillable = [

        		
				'co_usuario',
				'no_usuario',
				'ds_senha',
				'co_usuario_autorizacao',
				'nu_matricula',
				'dt_nascimento',
				'dt_admissao_empresa',
				'dt_desligamento',
				'dt_inclusao',
				'dt_expiracao',
				'nu_cpf',
				'nu_rg',
				'no_orgao_emissor',
				'uf_orgao_emissor',
				'ds_endereco',
				'no_email',
				'no_email_pessoal',
				'nu_telefone',
				'dt_alteracao',
				'url_foto',
				'instant_messenger',
				'icq',
				'msn',
				'yms',
				'ds_comp_end',
				'ds_bairro',	
				'nu_cep',
				'no_cidade',
				'uf_cidade',
				'dt_expedicao'
				

    ];


    public function rPermissaoSistema(){

     	return $this->hasMany('App\Models\PermissaoSistema','co_usuario','co_usuario');

    }

    public function rCaoos(){

     	return $this->hasMany('App\Models\CaoOs','co_usuario','co_usuario');

    }

    public function rCaoSalario(){

     	return $this->hasOne('App\Models\CaoSalario','co_usuario','co_usuario');

    }


}
