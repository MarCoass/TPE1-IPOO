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

    /**
     * Funcion que dado un dni busca el pasajero cuyo dni coincida y retorna la posicion del array de pasajeros donde se encuentra.
     * En caso de no encontrarlo se retorna -1
     * @param int $dniPasajero
     * @return int
     */
    private function buscarPasajeroPorDocumento($docPasajero)
    {
        $pos = 0;
        $largoArreglo = sizeOf($this->getPasajeros());
        $encontrado = false;
        while ($pos < $largoArreglo && !$encontrado) {
            if ($this->getPasajeros()[$pos]["documento"] == $docPasajero) {
                $encontrado = true;
            } else {
                $pos++;
            }
        }
        if (!$encontrado) {
            $pos = -1;
        }
        return $pos;
    }


    /**
     * Funcion que pide el documento de un pasajero a modificar, en caso de que exista en el array se ofrecen opciones para cambiar sus datos,
     * se pide el nuevo valor a asignar y se actualiza el dato, en caso de que no exista se muestra un mensaje de error.
     */
    public function modificarUnPasajero()
    {
        echo "Ingrese el documento del pasajero que desea modificar: ";
        $doc = trim(fgets(STDIN));
        $posPasajero = $this->buscarPasajeroPorDocumento($doc);
        if ($doc == -1) {
            echo "No se ha encontrado un pasajero con el documento n°: " . $doc . ".\n";
        } else {
            do {
                echo "Dato a modificar: 
                    1) Nombre.
                    2) Apellido. 
                    3) Documento.
                    0) Volver atras.
                Elija una opcion: ";
                $opcion = trim(fgets(STDIN));
                switch ($opcion) {
                    case 1:
                        echo "Ingrese el nuevo nombre: ";
                        $nuevoNombre = trim(fgets(STDIN));
                        $this->getPasajeros()[$posPasajero]["nombre"] = $nuevoNombre;
                        break;
                    case 2:
                        echo "Ingrese el nuevo apellido: ";
                        $nuevoApellido = trim(fgets(STDIN));
                        $this->getPasajeros()[$posPasajero]["apellido"] = $nuevoApellido;
                        break;
                    case 3:
                        echo "Ingrese el nuevo documento: ";
                        $nuevoDoc = trim(fgets(STDIN));
                        $this->getPasajeros()[$posPasajero]["documento"] = $nuevoDoc;
                        break;
                    case 0:
                        break;
                    default:
                        echo "Opcion incorrecta.\n";
                }
            } while ($opcion != 0);
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
        foreach ($this->getPasajeros() as $pasajero) {
            $infoPasajero = "Nombre: " . $pasajero["nombre"] . ". Apellido: " . $pasajero["apellido"] . ". Nro Documento: " . $pasajero["documento"] . "\n";
            $cadena = $cadena . $infoPasajero;
        }
        return $cadena;
    }
}
