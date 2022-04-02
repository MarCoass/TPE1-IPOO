<?php
include "Viaje.php";

/**
 * Menu
 *      Cargar informacion del viaje
 *      Modificar sus datos
 *      Ver sus datos
 */

 /**
  * Muestra por pantalla las opciones del menu principal
  */
function mostrarMenuPrincipal()
{
    echo "Menu:
        1) Cargar informacion del viaje.
        2) Modificar datos del viaje.
        3) Ver datos del viaje.
        4) Cargar informacion de prueba.
        0) Salir.
    Elija una opcion: ";
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
        case 2:
            break;
        case 3:
            echo $viaje->__toString();
            break;
        case 4:
            $viaje = new Viaje(1, "Mendoza", 10, $arrayPasajerosPrueba);
            break;
        case 0:
            break;
        default:
            echo "Opcion incorrecta.\n";
    }
} while ($opcion != 0);
