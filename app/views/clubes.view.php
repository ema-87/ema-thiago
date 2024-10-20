<?php

class clubView {   

    /*function showClubes($clubes){
        require'app/templates/layout/header.phtml';
        require'app/templates/layout/formClubes.phtml';
        require'app/templates/layout/listaClubes.phtml';
        require'app/templates/layout/footer.phtml';
        
    }*/

    function showClubes($clubes) {
        require'app/templates/layout/header.phtml';
        require'app/templates/layout/listaClubes.phtml';
    
        // Verificar si el usuario está logueado
        if (session_status() == PHP_SESSION_NONE) {
            session_start();  // Solo inicia la sesión si aún no está activa
        }
        if (isset($_SESSION['ID_USER'])) {
            require'app/templates/layout/formClubes.phtml';
        } else {
            echo "<p>No tienes permiso para agregar, editar o eliminar clubes.</p>";
        }
    
        require'app/templates/layout/footer.phtml';
    }
    
    function showError() {
        echo "<h1>Error! Hay campos vacíos</h1>"; // Agregado cierre de <h1>
    }

}
?>                      