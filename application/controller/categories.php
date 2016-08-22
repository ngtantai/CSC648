<?php

/**
 * Class register
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Categories extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://../categories/index
     */
    public function index()
    {
        // getting all users
        $users = $this->model->getAllUsers();

        // load views. within the views we can echo out $users
        require APP . 'view/_templates/header.php';
        require APP . 'view/categories/index.php';
        require APP . 'view/_templates/footer.php';
    }

    
}
