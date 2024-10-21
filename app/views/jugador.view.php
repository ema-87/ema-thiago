    <?php

    class jugadorView {
        

        function showJugadores($jugadores) {
            require 'app/templates/layout/header.phtml';
            require 'app/templates/layout/listaJugadores.phtml';
        
            // Verificar si el usuario está logueado    
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION['ID_USER'])) {
                require 'app/templates/layout/formJugador.phtml';
                // si el usuario no se logueo muestra las opciones de agregar, editar o eliminar
            }
        
            require'app/templates/layout/footer.phtml';
        }
        
        function showError() {
            echo "<h1>Error! Hay campos vacíos</h1>";
        }

        function verJugador($dataJugadores) {
            
            require 'app/templates/layout/header.phtml';
            require 'app/templates/layout/detallesJugador.phtml';
            require_once 'app/templates/layout/editarJugador.phtml';
        }
    }
    ?>