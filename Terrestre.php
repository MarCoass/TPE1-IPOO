<?php
include "Viaje.php";
class Terreste extends Viaje
{
    private $comodidad;

    public function __construct($codigo, $destino, $cantMaximaPasajeros, $pasajeros, $objResponsableV, $idaYvuelta, $importe, $comodidad)
    {
        parent::__construct($codigo, $destino, $cantMaximaPasajeros, $pasajeros, $objResponsableV, $idaYvuelta, $importe);
        $this->comodidad = $comodidad;
    }

    public function getComodidad()
    {
        return $this->comodidad;
    }

    public function setComodidad($comodidad)
    {
        $this->comodidad = $comodidad;
    }

    public function __toString()
    {
        $texto = parent::__toString();
        $texto += "Comodidad: " . $this->getComodidad() . "\n";
        return $texto;
    }

    public function venderPasaje($pasajero)
    {
        if ($this->hayPasajesDisponibles()) {
            $importe = $this->getImporte();
            $valor = $importe;
            if ($this->getComodidad() == "cama") {
                $porcentaje = ($importe * 100) / 25;
                $valor += $porcentaje;
            }
            if ($this->getIdaYvuelta()) {
                $porcentaje = ($importe * 100) / 50;
                $valor += $porcentaje;
            }
            $pasajeros = $this->getPasajeros();
            $pasajeros[] = $pasajero;
            $this->setPasajeros($pasajeros);
        } else { 
            $valor = -1;
        }
        return $valor;
    }
}
