<?php

class Pasajero{
    private $nombre;
    private $apellido;
    private $nroDocumento;
    private $nroTelefono;

    //Constructor
    public function __construct($nombre, $apellido, $documento, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nroDocumento = $documento;
        $this->nroTelefono = $telefono;
    }

    //Metodos de acceso
    
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getNroDocumento(){
        return $this->nroDocumento;
    }

    public function setNroDocumento($nroDocumento){
        $this->nroDocumento = $nroDocumento;
    }

    public function getNroTelefono(){
        return $this->nroTelefono;
    }

    public function setNroTelefono($nroTelefono){
        $this->nroTelefono = $nroTelefono;
    }

    //Otros metodos

    public function __toString()
    {
        return "Nombre: " . $this->getNombre() .
        "\nApellido: " . $this->getApellido() .
        "\nNro Documento: " . $this->getNroDocumento() . 
        "\nNro Telefono: " . $this->getNroTelefono() . "\n";
    }
}