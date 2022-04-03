<?php
include "Viaje.php";


/**
 * Muestra por pantalla las opciones del menu principal
 */
function mostrarMenuPrincipal()
{
    echo "------------Menu-------------:
        1) Cargar informacion del viaje.
        2) Modificar datos del viaje.
        3) Ver datos del viaje.
        4) Cargar informacion de prueba.
        0) Salir.
    Elija una opcion: ";
}

/**
 * Muestra por pantalla las opciones del menu de modificaciones
 */
function mostrarMenuModificaciones()
{
    echo "------------Modificaciones-------------:
        1) Cambiar codigo.
        2) Cambiar destino.
        3) Cambiar cantidad maxima de pasajeros.
        4) Cambiar informacion de pasajeros.
        0) Volver a menu principal.
    Elija una opcion: ";
}

function modificaciones($viaje)
{
    do {
        mostrarMenuModificaciones();
        $opcion = trim(fgets(STDIN));
        switch ($opcion) {
            case 1: //Cambiar codigo
                echo "Ingrese el nuevo codigo: ";
                $nuevoCodigo = trim(fgets(STDIN));
                $viaje->setCodigo($nuevoCodigo);
                break;
            case 2: //Cambiar destino
                echo "Ingrese el nuevo destino: ";
                $nuevoDestino = trim(fgets(STDIN));
                $viaje->setDestino($nuevoDestino);
                break;
            case 3: //Cambiar cantidad maxima de pasajeros
                echo "Ingrese la nueva cantidad maxima: ";
                $nuevaCant = trim(fgets(STDIN));
                $viaje->setCantMaxPasajeros($nuevaCant);
                break;
            case 4: //Cambiar informacion de pasajeros
                echo "    1) Cambiar todos los pasajeros.
                2)Cambiar la informacion de un pasajero segun su documento.
                Elija una opcion: ";
                $rta = trim(fgets(STDIN));
                if($rta==1){//Modifica todo el array de pasajeros
                    $nuevoArrayPasajeros = cargarPasajeros($viaje->getCantMaxPasajeros());
                    $viaje->setPasajeros($nuevoArrayPasajeros);
                } elseif ($rta == 2){ //Modifica un pasajero especifico
                    $viaje->modificarUnPasajero();
                } else {
                    echo "Opcion incorrecta.\n";
                }
                break;
            case 0;
                break;
            default:
                echo "Opcion incorrecta.\n";
        }
    } while ($opcion != 0);
}

/**
 * Funcion que pide los datos de los pasajeros hasta que el usuario quiera parar o se llegue a la cantidad maxima de pasajeros
 * y retorna un arreglo multidimensional que contiene los datos ingresados.
 * @param int $cantMax
 * @return array
 */
function cargarPasajeros($cantMax)
{
    $i = 0;
    $array = [];
    $seguir = true;
    do {
        echo "Ingrese los datos de los pasajeros:\n";
        echo "Nombre: ";
        $nombre = trim(fgets(STDIN));
        echo "Apellido: ";
        $apellido = trim(fgets(STDIN));
        echo "Documento: ";
        $doc = trim(fgets(STDIN));
        $array[$i] = [
            "nombre" => $nombre,
            "apellido" => $apellido,
            "documento" => $doc
        ];
        $i++;
        echo "Desea insertar otro pasajero? (s/n): ";
        $rta = trim(fgets(STDIN));
        if ($rta == "n") {
            $seguir = false;
        }
        if ($i == $cantMax) {
            echo "Limite de pasajeros alcanzado, no se pueden agregar mas.\n";
            $seguir = false;
        }
    } while ($seguir);
    return $array;
}

$arrayPasajerosPrueba = [
    ["nombre" => "Mar", "apellido" => "Coass", "documento" => 42969186],
    ["nombre" => "Pedro", "apellido" => "Perez", "documento" => 22349753],
    ["nombre" => "Laura", "apellido" => "Gomez", "documento" => 31794186],
    ["nombre" => "Sol", "apellido" => "Fernandez", "documento" => 49148531],
    ["nombre" => "Jorge", "apellido" => "Muñoz", "documento" => 20486153],
    ["nombre" => "Vale", "apellido" => "Fernandez", "documento" => 46750275]
];


do {

    mostrarMenuPrincipal();
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1: //Cargar datos del viaje
            echo "Ingrese el codigo del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la cantidad maxima de pasajeros: ";
            $cantMax = trim(fgets(STDIN));
            $pasajeros = cargarPasajeros($cantMax);
            $viaje = new Viaje($codigo, $destino, $cantMax, $pasajeros);
            break;
        case 2: //Modificar datos
            if(isset($viaje)){
                modificaciones($viaje);
            } else {
                echo "Todavia no se han cargado datos al viaje.\n";
            }
            
            break;
        case 3:
            if(isset($viaje)){
                echo $viaje->__toString();
            } else {
                echo "Todavia no se han cargado datos al viaje.\n";
            }
            break;
        case 4:
            $viaje = new Viaje(1, "Mendoza", 10, $arrayPasajerosPrueba);
            echo "Datos de prueba cargados.\n";
            break;
        case 0:
            break;
        default:
            echo "Opcion incorrecta.\n";
    }
} while ($opcion != 0);
