<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RespostaTwig
 *
 * @author 1978233
 */
class RespostaTwig extends Resposta {
    
    public static $motorTwig;
    
    private $template;
    private $dados;
    
    public function __construct($template,$dados) {
        $this->template = $template;
        $this->dados = $dados;
    }

    public function executar() {
        echo self::$motorTwig->render($this->template, $this->dados);
    }

}
