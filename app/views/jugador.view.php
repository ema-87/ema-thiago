    <?php

    class jugadorView {
        

        function showJugadores($jugadores) {
            require 'app/templates/layout/header.phtml';
            require 'app/templates/layout/listaJugadores.phtml';
        
            // Verificar si el usuario está logueado    
            if (session_status() == PHP_SESSION_NONE) {
                session_start();  // Solo inicia la sesión si aún no está activa
            }
            if (isset($_SESSION['ID_USER'])) {
                require 'app/templates/layout/formJugador.phtml';
                // Si el usuario está logueado, mostrar opciones de agregar, editar o eliminar
                // Si no está logueado, no mostrar las opciones
            }
        
            require'app/templates/layout/footer.phtml';
        }
        
       /* function showJugadores($jugadores) {
            require'app/templates/layout/header.phtml';
            require'app/templates/layout/formJugador.phtml';
            require 'app/templates/layout/listaJugadores.phtml';
            require'app/templates/layout/footer.phtml';
        }*/

        function showError() {
            echo "<h1>Error! Hay campos vacíos</h1>"; // Agregado cierre de <h1>
        }

        function verJugador($dataJugadores) {
            
            require 'app/templates/layout/header.phtml';
            require 'app/templates/layout/detallesJugador.phtml';
            require_once 'app/templates/layout/editarJugador.phtml';
        }
    }
    ?>