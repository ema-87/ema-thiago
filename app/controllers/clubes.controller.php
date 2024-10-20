<?php
include_once 'app/models/clubes.model.php';

class clubController{

    private $modelClubes;
    private $modelJugadores;
    private $viewClubes;

    function __construct(){

        // instancio las clases en model y view para utilizar sus metodos dentro de la clase
        $this->modelClubes = new clubModel();
        $this->modelJugadores = new jugadorModel();
        $this->viewClubes = new clubView();

    }
    function showClubes(){
            // obtiene las tareas del modelo
            $clubes = $this->modelClubes->getAll();

            // actualizo la vista
            $this->viewClubes->showClubes($clubes);         
            }

            

    function getAll() {
        $clubes = $this->modelClubes->getAll();
        return $clubes;
    }
    function addClub(){
        if(!empty($_POST['liga']) && !empty($_POST['club'])){
            $liga = $_POST['liga'];
            $club = $_POST['club'];
        }else{
            $this->viewClubes->showError();
            die();
        }
        
      $id=$this->modelClubes->insert($liga,$club);
    
        if($id){
            // Redirigo al usuario a la pantalla principal
            header('Location: ' . 'clubes');
        }else{
            echo "No se pudo agregar el parcial!";
        }
    }

    function removeClub($id){
        $jugadoresByClub = $this->modelJugadores->getJugadoresByClub($id);

        if(count($jugadoresByClub) > 0) {
            echo 'No se puede eliminar el club porque tiene jugadores asociados';
        } else {
            $this->modelClubes->remove($id);
            header('Location: ' . 'clubes');
        }
    }

    function editarClub($id) {
        if (!empty($_POST['editLiga']) && !empty($_POST['editClub'])) {
            $clubEditado = $_POST['editLiga'];
            $ligaEditada = $_POST['editClub'];
         
    
            $this->modelClubes->editClub($ligaEditada,$clubEditado, $id);
    
            // Redirigir a la vista del jugador editado
            header('Location: ' . BASE_URL . 'clubes');
            exit;
        } else {
            $this->viewClubes->showError(); // Mostrar un error si los campos están vacíos
        }
    }


}

?>