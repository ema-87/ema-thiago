<?php

// Coordinador entre vista y modelo
include_once 'app/models/clubes.model.php';
include_once 'app/models/jugador.model.php';
include_once 'app/views/jugador.view.php';
require_once 'app/views/clubes.view.php';

class jugadorController
{

    private $modelJugadores;
    private $modelClubes;
    private $viewJugadores;

    function __construct()
    {

        // instancio las clases en model y view para utilizar sus metodos dentro de la clase
        $this->modelJugadores = new jugadorModel();
        $this->modelClubes = new clubModel();
        $this->viewJugadores = new jugadorView();
    }

    function showJugadores()
    {
        $jugadores = $this->modelJugadores->getAll();
        $this->viewJugadores->showJugadores($jugadores);
    }

    function getAll()
    {
        $jugadores = $this->modelJugadores->getAll();
        return $jugadores;
    }


    function addJugador()
    {
        if (!empty($_POST['nombre']) && !empty($_POST['posicion']) && !empty($_POST['nacimiento']) && !empty($_POST['club']) && !empty($_POST['nacionalidad'])) {
            $nombre = $_POST['nombre'];
            $posicion = $_POST['posicion'];
            $nacimiento = $_POST['nacimiento'];
            $clubNombre = $_POST['club'];
            $nacionalidad = $_POST['nacionalidad'];

            $clubModel = new clubModel();
            $clubId = $clubModel->getClubIdByName($clubNombre);

            if ($clubId) {
                $id = $this->modelJugadores->insert($nombre, $posicion, $nacimiento, $clubId, $nacionalidad);

                if ($id) {
                    header('Location: ' . BASE_URL);
                } else {
                    echo "No se pudo agregar el jugador.";
                }
            } else {
                echo "El club especificado no existe.";
            }
        } else {
            $this->viewJugadores->showError();
            die();
        }
    }


    function verMas($id)
    {
        $dataJugadores = $this->modelJugadores->getDetallesJugadores($id);
        if ($dataJugadores) {
            $this->viewJugadores->verJugador($dataJugadores);
        } else {
            echo 'error';
        }
    }
    function editarJugador($id)
    {
        if (!empty($_POST['editClub']) && !empty($_POST['editPosicion']) && !empty($_POST['editLiga'])) {
            $clubEditado = $_POST['editClub'];
            $posicionEditada = $_POST['editPosicion'];
            $ligaEditada = $_POST['editLiga'];

            $this->modelJugadores->editJugador($clubEditado, $posicionEditada, $ligaEditada, $id);


            header('Location: ' . BASE_URL . 'vermas/' . $id);
            exit;
        } else {
            $this->viewJugadores->showError();
        }
    }

    function removeJugador($id)
    {
        $this->modelJugadores->remove($id);
        header('Location: ' . BASE_URL);
    }
}
