<?php 

abstract class Controller {

    abstract function index();
    
    protected function checkExpireSession() {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            // Last request was more than 30 minutes ago
            session_unset();     // Unset $_SESSION variable for the run-time 
            session_destroy();   // Destroy session data in storage
        } else {
            $_SESSION['LAST_ACTIVITY'] = time(); // Update last activity time
        }
    }
}

?>