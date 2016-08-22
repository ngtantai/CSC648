<?php

/**
 * Class Logout
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
session_start(); 

class Logout extends Controller {
    
    /**
     * PAGE: index
     * This method handles what happens when you move to http://../logout/index
     */
    public function index() {

        $categories = $this->model->getProductCategory();
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/logout/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function destroySession() {
         // deletes the current session
        session_unset();
        session_destroy();
        header('location: ' . URL . 'logout');
    }
}
