<?php
require_once 'Controlador.php';

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ControleRemoto
 *
 * @author AAAA
 */
class ControleRemoto implements Controlador {
    //Atributos
    private $volume;
    private $ligado;
    private $tocando;
    
    //Métodos Especiais
    
    public function __construct() {
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }
    

    private function getVolume() {
        return $this->volume;
    }

    private function getLigado() {
        return $this->ligado;
    }

    private function getTocando() {
        return $this->tocando;
    }

    private function setVolume($volume) {
        $this->volume = $volume;
    }

    private function setLigado($ligado) {
        $this->ligado = $ligado;
    }

    private function setTocando($tocando) {
        $this->tocando = $tocando;
    }
    
    //Métodos Abstratos
    
    public function ligar() {
        $this->setLigado(true);
    }

    public function desligar() {
        $this->setLigado(false);
    }
    
    public function abrirMenu() {
        echo "<p>----- Menu -----</p>";
        echo "</br>Está ligado ? : ". ($this->getLigado()?"SIM":"NÃO");
        echo "</br>Está tocando ? : ". ($this->getTocando()?"SIM":"NÃO");
        echo "</br>Volume : ". $this->getVolume();
        for($i=0; $i<= $this->getVolume(); $i+= 10) {
            echo "|";
        }
        echo "</br>";
    }

    public function fecharMenu() {
        echo "</br>Fechando Menu...";
    }

    public function maisVolume() {
        if ($this->getVolume()) {
            $this->setVolume($this->getVolume() + 10);
        } else {
            echo "<p>ERRO! Não posso aumentar o volume</p>";
        }
    }

    public function menosVolume() {
        if ($this->getVolume()) {
            $this->setVolume($this->getVolume() - 10);
        } else {
            echo "<p>ERRO! Não posso diminuir o volume</p>";
        }
    }
    
    public function ligarMudo() {
        if ($this->getLigado() && $this->getVolume() > 0) {
            $this->setVolume(0);
        }
    }
    
    public function desligarMudo() {
        if ($this->getLigado() && $this->getVolume() == 0) {
            $this->setVolume(50);
        }
    }
    
    public function play() {
        if ($this->getLigado() && !($this->getTocando())) {
            $this->setTocando(true);
        }
    }

    public function pause() {
        if ($this->getLigado() && $this->getTocando()) {
            $this->setTocando(false);
        }
    }

}
