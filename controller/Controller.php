<?php

class CarroController {
    private $bancoDeDados;

    public function __construct($bancoDeDados) {
        $this->bancoDeDados = $bancoDeDados;
    }

    public function cadastrarCarro($carro) {
        $this->bancoDeDados->inserirCarro($carro);
    }

    public function visualizarCarros() {
        return $this->bancoDeDados->retornarCarros();
    }
}
?>