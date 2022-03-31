<?php

/**La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
 * De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
 *Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase 
 *(incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente a los pasajeros. 
 *Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
 *Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita 
 *cargar la información del viaje, modificar y ver sus datos.
 */
class Viaje
{
    private $codigo;
    private $destino;
    private $cantMaximaPasajeros;
    private $pasajeros; //array de arrays asociativos

    //FUNCION CONSTRUCTORA
    public function __construct($codigo, $destino, $cantMax, $pasajeros)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaximaPasajeros = $cantMax;
        $this->pasajeros = $pasajeros;
    }

    //FUNCIONES DE ACCESO
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaximaPasajeros;
    }
    public function getPasajeros(){
        return $this->pasajeros;
    }

    public function setCodigo($valor){
        $this->codigo = $valor;
    }
    public function setDestino($valor){
        $this->destino = $valor;
    }
    public function setCantMaxPasajeros($valor){
        $this->cantMaximaPasajeros = $valor;
    }
    public function setPasajeros($valor){
        $this->pasajeros = $valor;
    }

    public function __toString()
    {
        $cadena = "Codigo: " . $this->getCodigo() . 
        "\nDestino: " . $this->getDestino() .
        "\nCantidad maxima de pasajeros: " . $this->getCantMaxPasajeros() . 
        "\nPasajeros: \n";
        foreach($this->getPasajeros() as $pasajero){
            $infoPasajero = "Nombre: " . $pasajero["nombre"] . ". Apellido: " . $pasajero["apellido"] . ". Nro Documento: " . $pasajero["documento"] . "\n";
            $cadena = $cadena . $infoPasajero;
        }
        return $cadena;
    }
    
}
