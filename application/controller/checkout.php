<?php
if(!isset($_SESSION)) {
    session_start();
}
?>

<?php

/**
 * Class checkout
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Checkout extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $categories = $this->model->getProductCategory();
        // load views
        if (isset($_SESSION['loggedInUser_id'])) {

            require APP . 'view/_templates/header.php';
            require APP . 'view/checkout/index.php';
            require APP . 'view/_templates/footer.php';

        }else {

            require APP . 'view/_templates/header.php';
            require APP . 'view/users/index.php';
            require APP . 'view/_templates/footer.php';
        }

    }

    public function purchase($product_id)
    {
        $categories = $this->model->getProductCategory();
        
        $buyer_id =  $_SESSION['loggedInUser_id'];

        $date = date("Y-m-d H:i:s");
        $status = "In process";

        $this->model->createOrder($product_id, $buyer_id, $date,$status);

        require APP . 'view/_templates/header.php';
        require APP . 'view/checkout/thankyou.php';
        require APP . 'view/_templates/footer.php';
        // where to go after user has been added
//        header('location: ' . URL . 'confirm/thankyou.php');
    }
    
}
