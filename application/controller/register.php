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
class Register extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://../register/index
     */
    public function index()
    {
        // getting all users
        $users = $this->model->getAllUsers();

        // load views. within the views we can echo out $users
        require APP . 'view/_templates/header.php';
        require APP . 'view/register/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: signUp
     * This method handles what happens when you move to http://../register/signup
     */
    public function signUp()
    {
        // if we have POST data to create a new user entry
        if (isset($_POST["submit"])) {
            // do createUser() in model/model.php
            $this->model->createUser($_POST["email"], $_POST["username"],  $_POST["password"], $_POST["firstname"], $_POST["lastname"]);
        }
        // where to go after user has been added
        header('location: ' . URL . 'register/index');
    }

    public function deleteUser($user_id)
    {
        // if we have an id of a user that should be deleted
        if (isset($user_id)) {
            // do deleteUser() in model/model.php
            $this->model->deleteUser($user_id);
        }

        // where to go after user has been deleted
        header('location: ' . URL . 'register/index');
    }
}
