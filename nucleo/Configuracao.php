<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Configuracao
 *
 * @author 1978233
 */
class Configuracao {
    //put your code here
    private $configuracao;
    
    public function __construct($configuracao = array()) {
        $this->configuracao = $configuracao;
    }
    
    public function adicionarConfiguracao($chave,$valor){
        $this->configuracao[$chave] = $valor;
    }
    
    public function obterConfiguracao($chave){
        if (isset($this->configuracao[$chave])){
            return $this->configuracao[$chave];
        }
        throw new Exception("Chave não encontrada");
    }
    
}
