<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Empresa extends Entity {

    protected $_accessible = [
        'nomeempresa' => true,
        'endereco' => true,
        'numero' => true,
        'complemento' => true,
        'bairros_id' => true,
        'cidade' => true,
        'cep' => true,
        'telefone1' => true,
        'telefone2' => true,
        'site' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'categorias_id' => true,
        'facebook' => true,
        'instagram' => true,
        'twitter' => true,
        'preço' => true,
        'pagamento' => true,
        'dinheiro' => true,
        'saibamais' => true,
        'photo' => true,
        'dir' => true,
        'desccurta' => true,
        'user_id' => true,
        'nomeproprietario' => true,
        'emailproprietario' => true
    ];

}
