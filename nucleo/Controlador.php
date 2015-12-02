<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controlador
 *
 * @author 1978233
 */
class Controlador {
    
    /**
     *
     * @var Requisicao 
     */
    protected $requisicao;
    protected $configuracao;
    
    public function __construct(Configuracao $configuracao, Requisicao $requisicao) {
        if ($configuracao instanceof Configuracao){
            $this->configuracao = $configuracao;
        }
        
        if ($requisicao instanceof Requisicao){
            $this->requisicao = $requisicao;
        }
    }
    
    
}
