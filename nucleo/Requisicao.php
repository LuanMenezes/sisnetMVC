<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Requisicao
 *
 * @author 1978233
 */
class Requisicao {
    private $parametros;
    
    public function __construct($atributos) {
        $this->parametros = $atributos;
    }
    
    public function obterParametro($chave){
        if (isset($this->parametros[$chave])){
            return $this->parametros[$chave];
        }
        throw new Exception("Chave não encontrada");
    }
    
    public function temParametro($chave){
        return isset($this->parametros[$chave]);
    }
}
