<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author 1978233
 */
class Cliente extends Controlador{
    
    public function listarClientes(){
        if (!$this->requisicao->temParametro("nome") ||
             $this->requisicao->obterParametro("nome") != 'maria'){
            return new Redirecionamento("http://www.univali.br");
        }
        $clientes[] = "joao";
        $clientes[] = "maria";
        $clientes[] = "jose";
        $clientes[] = "huguinho";
        $clientes[] = "zezinho";
        $clientes[] = "luiziho";
        return new RespostaTwig("clientes.html.twig",array("clientes"=>$clientes));
        
//        if ($this->requisicao->temParametro("nome")){
//            $mensagem = $this->requisicao->obterParametro("nome");
//        } else {
//            $mensagem = "voce é um desconhecido";
//        }
//        return new RespostaTwig("clientes.html.twig",array("mensagem"=>$mensagem));
    }
}
