<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rota
 *
 * @author 1978233
 */
class Rota {
    private $rotas;
    
    const GET = "GET";
    const POST = "POST";
    const PUT = "PUT";
    const DELETE = "DELETE";
    
    public function __construct($rotas = array()) {
        $this->rotas = $rotas;
    }
    
    public function adicionarRota($metodo,$url,$controlador,$acao){
        $this->rotas[] = array(
            'metodo' => $metodo,
            'url' => $url,
            'controlador' => $controlador,
            'acao' => $acao
        );
    }
    
    public function buscarRota($url,$metodo = "GET"){
        foreach($this->rotas as $rota){
            if ($rota['url'] == $url && $rota['metodo'] == $metodo){
                return array(
                    'controlador'=>$rota['controlador'],
                    'acao'=>$rota['acao']
                );
            }
        }
        throw new Exception("Rota não encontrada");
    }
}
