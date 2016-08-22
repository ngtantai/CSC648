<?php

/**
 * Class users
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Users extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://../users/index
     */
    public function index()
    {
        // getting all users
        $users = $this->model->getAllUsers();
        $categories = $this->model->getProductCategory();

        // load views. within the views we can echo out $users
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: signUp
     * This method handles what happens when you move to http://../users/registerUser
     */
    public function registerUser()
    {
        // if we have POST data to create a new user entry
        $categories = $this->model->getProductCategory();
        if (isset($_POST["submit"])) {
            $pass = $_POST["password"];
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            
            // do createUser() in model/model.php
            $this->model->createUser($_POST["email"],  $hash, $_POST["firstname"], $_POST["lastname"]);
        }
        // where to go after user has been added
        header('location: ' . URL . 'login/index');
    }

    

    public function deleteUser($user_id)
    {
        // if we have an id of a user that should be deleted
        if (isset($user_id)) {
            // do deleteUser() in model/model.php
            $this->model->deleteUser($user_id);
        }

        // where to go after user has been deleted
        header('location: ' . URL . 'users/index');
    }
}