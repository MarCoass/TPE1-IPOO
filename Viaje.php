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

    /**
     * Funcion que dado un dni busca el pasajero cuyo dni coincida y retorna la posicion del array de pasajeros donde se encuentra.
     * En caso de no encontrarlo se retorna -1
     * @param int $dniPasajero
     * @return int
     */
    private function buscarPasajeroPorDocumento($docPasajero){
        $pos = 0;
        $largoArreglo = sizeOf($this->getPasajeros());
        $encontrado = false;
        while($pos<$largoArreglo && !$encontrado){
            if($this->getPasajeros()[$pos]["documento"] == $docPasajero){
                $encontrado = true;
            } else {
                $pos++;
            }
        }
        if(!$encontrado){
            $pos = -1;
        }
        return $pos;
    }

    /**
     * Funcion que busca un pasajero que tenga el dni ingresado por parametro y le cambia el nombre por 
     * uno nuevo tambien ingresado por parametro
     * @param int $docPasajero
     * @param String $nuevoNombre
     */
    public function modificarNombrePasajero($docPasajero, $nuevoNombre){
        $posPasajero = $this->buscarPasajeroPorDocumento($docPasajero);
        if($posPasajero == -1){
            echo "No se ha encontrado un pasajero con el documento n°: ". $docPasajero.".\n";
        } else {
            $this-> getPasajeros()[$posPasajero]["nombre"] = $nuevoNombre;
        }
    }

    /**
     * Funcion que busca un pasajero que tenga el dni ingresado por parametro y le cambia el apellido 
     * por uno nuevo tambien ingresado por parametro
     * @param int $docPasajero
     * @param String $nuevoApellido
     */
    public function modificarApellidoPasajero($docPasajero, $nuevoApellido){
        $posPasajero = $this->buscarPasajeroPorDocumento($docPasajero);
        if($posPasajero == -1){
            echo "No se ha encontrado un pasajero con el documento n°: ". $docPasajero.".\n";
        } else {
            $this-> getPasajeros()[$posPasajero]["apellido"] = $nuevoApellido;
        }
    }

    /**
     * Funcion que busca un pasajero que tenga el dni ingresado por parametro y le cambia el documento 
     * por uno nuevo tambien ingresado por parametro
     * @param int $docPasajero
     * @param String $nuevoDocumento
     */
    public function modificarDocumentoPasajero($docPasajero, $nuevoDocumento){
        $posPasajero = $this->buscarPasajeroPorDocumento($docPasajero);
        if($posPasajero == -1){
            echo "No se ha encontrado un pasajero con el documento n°: ". $docPasajero.".\n";
        } else {
            $this-> getPasajeros()[$posPasajero]["nombre"] = $nuevoDocumento;
        }
    }

    /**
     * Funcion que retorna una cadena de texto con todos los atributos del objeto
     * @return String
     */
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
