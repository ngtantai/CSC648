<?php
if(!isset($_SESSION)) {
    session_start();
}
?>

<?php
/**
 * Created by PhpStorm.
 * User: guoyiruan
 * Date: 7/23/16
 * Time: 10:10 PM
 */
class Order extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://../register/index
     */
    public function index()
    {
        // getting all users
//        $users = $this->model->getAllUsers();

        // load views. within the views we can echo out $users
        require APP . 'view/_templates/header.php';
        require APP . 'view/order/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: purchase
     */
    public function purchase($product_id)
    {
        $buyer_id =  $_SESSION['loggedInUser_id'];
        $date = date("Y-m-d H:i:s");
        $status = "In process";
        
        if (isset($_POST["submit"])) {
            
            $this->model->createOrder($product_id, $buyer_id, $date,$status);
        }
        // where to go after user has been added
//        header('location: ' . URL . 'order/index');
    }


    public function editStatus($order_id, $status){
        if (isset($order_id)) {
            // do deleteUser() in model/model.php
            $this->model->editStatus($order_id, $status);
        }
        //        header('location: ' . URL . 'register/index');
    }

    public function getOrder($order_id)
    {
        // if we have an id of a user that should be deleted
        if (isset($order_id)) {
            // do deleteUser() in model/model.php
            $this->model->getOrder($order_id);
        }

        // where to go after user has been deleted
//        header('location: ' . URL . 'register/index');
    }
}
