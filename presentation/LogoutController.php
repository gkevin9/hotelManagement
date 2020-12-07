<?php 
    namespace presentation;

    $ctrl = new LogoutController();
    $ctrl->logout();
    class LogoutController {
        public function logout(){
            session_start();
            session_unset();
            session_destroy();
            header("Location: /");
        }
    }
?>