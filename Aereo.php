<?php
include "Viaje.php";
class Aereo extends Viaje
{
    private $nroVuelo;
    private $categoriaAsiento;
    private $nombreAerolinea;
    private $cantEscalas;

    public function __construct($codigo, $destino, $cantMaximaPasajeros, $pasajeros, $objResponsableV, $idaYvuelta, $importe, $nroVuelo, $categoriaAsiento, $nombreAerolinea, $cantEscalas)
    {
        parent::__construct($codigo, $destino, $cantMaximaPasajeros, $pasajeros, $objResponsableV, $idaYvuelta, $importe);
        $this->nroVuelo = $nroVuelo;
        $this->categoriaAsiento = $categoriaAsiento;
        $this->nombreAerolinea = $nombreAerolinea;
        $this->cantEscalas = $cantEscalas;
    }

    public function getNroVuelo()
    {
        return $this->nroVuelo;
    }

    public function setNroVuelo($nroVuelo)
    {
        $this->nroVuelo = $nroVuelo;
    }

    public function getCantEscalas()
    {
        return $this->cantEscalas;
    }

    public function setCantEscalas($cantEscalas)
    {
        $this->cantEscalas = $cantEscalas;
    }

    public function getCategoriaAsiento()
    {
        return $this->categoriaAsiento;
    }

    public function setCategoriaAsiento($categoriaAsiento)
    {
        $this->categoriaAsiento = $categoriaAsiento;
    }

    public function getNombreAerolinea()
    {
        return $this->nombreAerolinea;
    }

    public function setNombreAerolinea($nombreAerolinea)
    {
        $this->nombreAerolinea = $nombreAerolinea;
    }

    public function __toString()
    {
        $texto = parent::__toString();
        $texto += "Numero vuelo: " . $this->getNroVuelo() .
            "\nCantidad de escalas: " . $this->getCantEscalas() .
            "\nCategoria asiento: " . $this->getCategoriaAsiento() .
            "\nNombre aerolinea: " . $this->getNombreAerolinea() . "\n";
    }

    public function venderPasaje($pasajero)
    {
        if ($this->hayPasajesDisponibles()) {
            $importe = $this->getImporte();
            $valor = $importe;
            if ($this->getCategoriaAsiento() == "primera clase") {
                if ($this->getCantEscalas() == 0) {
                    $porcentaje = ($importe * 100) / 40;
                    $valor += $porcentaje;
                } else {
                    $porcentaje = ($importe * 100) / 60;
                    $valor += $porcentaje;
                }
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
