<?php
class authView{
    function showLogin($error = ''){
        require 'app/templates/layout/formLogin.phtml';
    }
    
    function showError($error){
        require 'app/templates/layout/formLogin.phtml';
    }
}
?>