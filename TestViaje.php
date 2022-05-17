<?php
include "Viaje.php";
include "Pasajero.php";
include "ResponsableV.php";


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
        4) Cambiar importe.
        5) Cambiar si tiene ida y vuelta.
        6) Cambiar informacion de pasajeros.
        7) Cambiar informacion del responsable.
        // Opciones solo disponibles para viajes aereos:
        8) Cambiar numero de vuelo.
        9) Cambiar categoria de asiento.
        10) Cambiar nombre de aerolinea.
        11) Cambiar cantidad de escalas.
        //Opciones solo disponibles para viajes terrestres:
        12) Cambiar tipo de comodidad.
        //
        0) Volver a menu principal.
    Elija una opcion: ";
}

function modificaciones($viaje)
{
    $esAereo = is_a($viaje, 'Aereo');
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
                echo "1) Cambiar todos los pasajeros.
                2)Cambiar la informacion de un pasajero segun su documento.
                Elija una opcion: ";
                $rta = trim(fgets(STDIN));
                if ($rta == 1) { //Modifica todo el array de pasajeros
                    $viaje->setPasajeros([]);
                    $nuevoArrayPasajeros = cargarPasajeros($viaje->getCantMaxPasajeros(), $viaje);
                    $viaje->setPasajeros($nuevoArrayPasajeros);
                } elseif ($rta == 2) { //Modifica un pasajero especifico
                    $viaje->modificarUnPasajero();
                } else {
                    echo "Opcion incorrecta.\n";
                }
                break;
            case 5:
                break;
            case 6:
                break;
            case 7:
                break;
            case 8:
                break;
            case 9:
                break;
            case 10:
                break;
            case 11:
                break;
            case 12:
                break;
            case 0;
                break;
            default:
                echo "Opcion incorrecta.\n";
        }
    } while ($opcion != 0);
}



/**
 * Funcion que pide el documento de un pasajero a modificar, en caso de que exista en el array se ofrecen opciones para cambiar sus datos,
 * se pide el nuevo valor a asignar y se actualiza el dato, en caso de que no exista se muestra un mensaje de error.
 */
function modificarUnPasajero($viaje)
{
    echo "Ingrese el documento del pasajero que desea modificar: ";
    $doc = trim(fgets(STDIN));
    $posPasajero = $viaje->buscarPasajeroPorDocumento($doc);
    if ($doc == -1) {
        echo "No se ha encontrado un pasajero con el documento n°: " . $doc . ".\n";
    } else {
        $pasajero = $viaje->getPasajeros()[$posPasajero];
        do {
            echo "Dato a modificar: 
                    1) Nombre.
                    2) Apellido. 
                    3) Nro Documento.
                    4) Nro Telefono.
                    0) Volver atras.
                Elija una opcion: ";
            $opcion = trim(fgets(STDIN));
            switch ($opcion) {
                case 1:
                    echo "Ingrese el nuevo nombre: ";
                    $nuevoNombre = trim(fgets(STDIN));
                    $pasajero->setNombre($nuevoNombre);
                    break;
                case 2:
                    echo "Ingrese el nuevo apellido: ";
                    $nuevoApellido = trim(fgets(STDIN));
                    $pasajero->setApellido($nuevoApellido);
                    break;
                case 3:
                    echo "Ingrese el nuevo nro de documento: ";
                    $nuevoDoc = trim(fgets(STDIN));
                    $pasajero->setNroDocumento($nuevoDoc);
                    break;
                case 4:
                    echo "Ingrese el nuevo nro de telefono: ";
                    $nuevoNum = trim(fgets(STDIN));
                    $pasajero->setNroTelefono($nuevoNum);
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
 * Funcion que muestra un menu de opciones y segun la elegida modifica un dato del responsable.
 */
function modificarResponsable($viaje)
{
    do {
        $responsable = $viaje->getObjResponsableV();
        echo "Dato a modificar: 
                1) Nombre.
                2) Apellido.
                3) Nro Empleado.
                4) Nro Licencia.
                Elija una opcion: ";
        $opcion = trim(fgets(STDIN));
        switch ($opcion) {
            case 1:
                echo "Ingrese el nuevo nombre: ";
                $nuevoNombre = trim(fgets(STDIN));
                $responsable->setNombre($nuevoNombre);
                break;
            case 2:
                echo "Ingrese el nuevo apellido: ";
                $nuevoApellido = trim(fgets(STDIN));
                $responsable->setApellido($nuevoApellido);
                break;
            case 3:
                echo "Ingrese el nuevo nro de empleado: ";
                $nuevoNroEmpleado = trim(fgets(STDIN));
                $responsable->setNroEmpleado($nuevoNroEmpleado);
                break;
            case 4:
                echo "Ingrese el nuevo nro de licencia: ";
                $nuevoNroLicencia = trim(fgets(STDIN));
                $responsable->setNroLicencia($nuevoNroLicencia);
                break;
            case 0:
                break;
            default:
                echo "Opcion incorrecta.\n";
        }
    } while ($opcion != 0);
}

function cargarDatosViaje()
{
    echo "Ingrese el codigo del viaje: ";
    $codigo = trim(fgets(STDIN));
    echo "Ingrese el destino: ";
    $destino = trim(fgets(STDIN));
    $responsable = cargarDatosResponsable();
    echo "Ingrese la cantidad maxima de pasajeros: ";
    $cantMax = trim(fgets(STDIN));
    echo "Es ida y vuelta? (s/n): ";
    $rta = trim(fgets(STDIN));
    echo "Ingrese el importe: ";
    $importe = trim(fgets(STDIN));
    echo "Tipo de viaje: 'a'->aereo, 't'->terrestre";
    $tipo = trim(fgets(STDIN));
    $pasajeros = [];
    if ($tipo == 'a') {
        echo "Ingrese el numero de vuelo: ";
        $nrovuelo = trim(fgets(STDIN));
        echo "Ingrese la categoria de asiento:";
        $categoria = trim(fgets(STDIN));
        echo "Ingrese el nombre de la aerolineas:";
        $aerolinea = trim(fgets(STDIN));
        echo "Ingrese la cantidad de escalas: ";
        $escalas = trim(fgets(STDIN));
        $viaje = new Aereo($codigo, $destino, $cantMax, $pasajeros, $responsable, $rta == "s", $importe, $nrovuelo, $categoria, $aerolinea, $escalas);
    } elseif ($tipo == 't') {
        echo "Ingrese el tipo de comodidad: ";
        $comodidad = trim(fgets(STDIN));
        $viaje = new Terreste($codigo, $destino, $cantMax, $pasajeros, $responsable, $rta == "s", $importe, $comodidad);
    }
    cargarPasajeros($cantMax, $viaje);
    return $viaje;
}

function cargarDatosResponsable()
{
    echo "Ingrese el nombre del responsable: ";
    $nombre = trim(fgets(STDIN));
    echo "Ingrese el apellido: ";
    $apellido = trim(fgets(STDIN));
    echo "Ingrese el nro de licencia: ";
    $nroLicencia = trim(fgets(STDIN));
    echo "Ingrese el nro de empleado: ";
    $nroEmpleado = trim(fgets(STDIN));
    $responsable = new ResponsableV($nroEmpleado, $nroLicencia, $nombre, $apellido);
    return $responsable;
}

/**
 * Funcion que pide los datos de los pasajeros hasta que el usuario quiera parar o se llegue a la cantidad maxima de pasajeros
 * y retorna un arreglo multidimensional que contiene los datos ingresados.
 * @param int $cantMax
 * @return array
 */
function cargarPasajeros($cantMax, $viaje)
{
    $i = 0;
    $array = [];
    $seguir = true;
    do {
        $array[$i] = cargarDatosPasajero($viaje);
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

function cargarDatosPasajero($viaje)
{
    echo "Ingrese el numero de documento: ";
    $dni = trim(fgets(STDIN));
    if ($viaje->buscarDni($dni) == -1) { //Si == -1, no existe un pasajero con este dni 
        echo "Ingrese el nombre: ";
        $nombre = trim(fgets(STDIN));
        echo "Ingrese el apellido: ";
        $apellido = trim(fgets(STDIN));
        echo "Ingrese el numero de telefono: ";
        $nroTelefono = trim(fgets(STDIN));
        $nuevoPasajero = new Pasajero($nombre, $apellido, $dni, $nroTelefono);
        $viaje->agregarPasajero($nuevoPasajero);
    } else {
        echo "Ya existe un pasajero con este dni.";
    }
}

function crearArrayPasajerosDePrueba()
{
    $p1 = new Pasajero("Mar", "Coass", 42969186, 42969186);
    $p2 = new Pasajero("Pedro", "Perez", 22349753, 22349753);
    $p3 = new Pasajero("Laura", "Gomez", 31794186, 31794186);
    $p4 = new Pasajero("Sol", "Fernandez", 49148531, 49148531);
    $p5 = new Pasajero("Jorge", "Muñoz", 20486153, 20486153);
    $p6 = new Pasajero("Vale", "Fernandez", 46750275, 46750275);
    $array = [$p1, $p2, $p3, $p4, $p5, $p6];
    return $array;
}

do {

    mostrarMenuPrincipal();
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1: //Cargar datos del viaje
            $viaje = cargarDatosViaje();
            break;
        case 2: //Modificar datos
            if (isset($viaje)) {
                modificaciones($viaje);
            } else {
                echo "Todavia no se han cargado datos al viaje.\n";
            }

            break;
        case 3:
            if (isset($viaje)) {
                echo $viaje->__toString();
            } else {
                echo "Todavia no se han cargado datos al viaje.\n";
            }
            break;
        case 4:
            $responsable = [1, 2, "Juan", "Pedro"];
            $arrayPasajerosPrueba = crearArrayPasajerosDePrueba();
            $viajeTerrestre = new Terreste(1, "Mendoza", 10, $arrayPasajerosPrueba, $responsable, true, 1000, "cama");
            echo "Datos de prueba cargados.\n";
            break;
        case 0:
            break;
        default:
            echo "Opcion incorrecta.\n";
    }
} while ($opcion != 0);
