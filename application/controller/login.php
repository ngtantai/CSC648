<?php
if(!isset($_SESSION)) {
    session_start();
}
?>

<?php

/**
 * Class login
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Login extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://../login/index
     */
    public function index()
    {
        // getting all users
//        $users = $this->model->getAllUsers();
        $categories = $this->model->getProductCategory();

//        $user = $this->model->getUserInfo($_SESSION['loggedInUser_id']);
//        $userproducts = $this->model->getUserProdcuts($_SESSION['loggedInUser_id']);
        
        // load views. within the views we can echo out $users
        require APP . 'view/_templates/header.php';
        require APP . 'view/login/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function loginUser() {

        $categories = $this->model->getProductCategory();
        
        if (isset($_GET["loginuser"])) {
//            $email = $_POST["email"];
//            $password = $_GET["password"];
//            $salt = "saltedpass4team4";
//            $saltedpassword = md5($salt . $password);
            
            $users=$this->model->loginUser($_GET["email"],  $_GET["password"]);

            if (($users->Email) == ($_GET["email"])) {
                $_SESSION['loggedInUser_id'] = $users->User_id;
                $_SESSION['Email'] = $users->Email;
                header('location: ' . URL . 'home');

//                require APP . 'view/_templates/header.php';
//                require APP . 'view/useraccount/index.php';
//                require APP . 'view/_templates/footer.php';
            } 
        }
    }
    /**
     * ACTION: signUp
     * This method handles what happens when you move to http://../login/login
     */
	

}
