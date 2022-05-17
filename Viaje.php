<?php
/** Miembros
* Martina Coassin Fernandez, FAI-2542
* Tomas Apablaza, FAI-2640
*/
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
    private $pasajeros; //array objetos Pasajero
    private $objResponsableV; //objeto ResponsableV
    private $idaYvuelta;
    private $importe;

    //FUNCION CONSTRUCTORA
    public function __construct($codigo, $destino, $cantMax, $pasajeros, $responsable, $idaYvuelta, $importe)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaximaPasajeros = $cantMax;
        $this->pasajeros = $pasajeros;
        $this->objResponsableV = $responsable;
        $this->idaYvuelta = $idaYvuelta;
        $this->importe = $importe;
    }

    //FUNCIONES DE ACCESO
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function getCantMaxPasajeros()
    {
        return $this->cantMaximaPasajeros;
    }
    public function getPasajeros()
    {
        return $this->pasajeros;
    }
    public function setCodigo($valor)
    {
        $this->codigo = $valor;
    }
    public function setDestino($valor)
    {
        $this->destino = $valor;
    }
    public function setCantMaxPasajeros($valor)
    {
        $this->cantMaximaPasajeros = $valor;
    }
    public function setPasajeros($valor)
    {
        $this->pasajeros = $valor;
    }
    public function getObjResponsableV()
    {
        return $this->objResponsableV;
    }
    public function setObjResponsableV($objResponsableV)
    {
        $this->objResponsableV = $objResponsableV;
    }
    
    public function getIdaYvuelta(){
        return $this->idaYvuelta;
    }

    public function setIdaYvuelta($idaYvuelta){
        $this->idaYvuelta = $idaYvuelta;
    }
    
    public function getImporte(){
        return $this->importe;
}

public function setImporte($importe){
        $this->importe = $importe;
}
    //Otros metodos

    /**
     * Funcion que dado un dni busca el pasajero cuyo dni coincida y retorna la posicion del array de pasajeros donde se encuentra.
     * En caso de no encontrarlo se retorna -1
     * @param int $dniPasajero
     * @return int
     */


    public function buscarDni($dniBuscado)
    {
        $indice = -1;
        $arrayPasajeros = $this->getPasajeros();
        foreach ($arrayPasajeros as $pos => $pasajero) {
            if ($pasajero->getNroDocumento() == $dniBuscado) {
                $indice = $pos;
            }
        }
        return $indice;
    }

    public function agregarPasajero($nuevoPasajero){
        $array = $this->getPasajeros();
        array_push($array, $nuevoPasajero);
        $this->setPasajeros($array);
    }

    /**
     * Funcion que retorna una cadena de texto con todos los atributos del objeto
     * @return String
     */
    public function __toString()
    {
        $esIdayVuelta = $this->getIdaYvuelta()? "Si." : "No.";
        $arrayPasajeros = $this->getPasajeros();
        $responsable = $this->getObjResponsableV();
        $cadena = "Codigo: " . $this->getCodigo() .
            "\nDestino: " . $this->getDestino() .
            "\n¿Tiene ida y vuelta?: " . $esIdayVuelta .
            "\nImporte: " . $this->getImporte() .
            "\nCantidad maxima de pasajeros: " . $this->getCantMaxPasajeros() .
            "\nResponsable: \n" . $this->getObjResponsableV() . 
            "\nPasajeros: \n" . $this->mostrarPasajeros() . "\n";
            
        return $cadena;
    }

    public function mostrarPasajeros()
    {
        $coleccion = $this->getPasajeros();
        $pasajeros = "";

        for ($i = 0; $i < count($coleccion); $i++) {
            $personas = $coleccion[$i];
            $pasajeros = $pasajeros . $personas->__toString() . "\n";
        }
        return $pasajeros;
    }

    /**
     * Funcion que retorna true o false segun si queda pasajes disponibles
     */
    public function hayPasajesDisponibles(){
        $cantPasajerosActual = count($this->getPasajeros());
        return $cantPasajerosActual<$this->getCantMaxPasajeros();
    }

    
}
