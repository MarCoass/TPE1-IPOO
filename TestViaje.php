<?php
include "Viaje.php";

/**
 * Menu
 *      Cargar informacion del viaje
 *      Modificar sus datos
 *      Ver sus datos
 */

$pasajeros = [
    ["nombre" => "Mar", "apellido" => "Coass", "documento" => 42969186],
    ["nombre" => "Pedro", "apellido" => "Perez", "documento" => 22349753],
    ["nombre" => "Laura", "apellido" => "Gomez", "documento" => 31794186],
    ["nombre" => "Sol", "apellido" => "Fernandez", "documento" => 49148531],
    ["nombre" => "Jorge", "apellido" => "Muñoz", "documento" => 20486153],
    ["nombre" => "Vale", "apellido" => "Fernandez", "documento" => 46750275]
];

$viaje = new Viaje(1, "Mendoza", 10, $pasajeros);
echo $viaje->__toString();



