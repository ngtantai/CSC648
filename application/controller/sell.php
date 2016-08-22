<?php
if(!isset($_SESSION)) {
    session_start();
}

?>

<?php
include 'resize.php';
/**
 * Class item
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Sell extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://../register/index
     */
    public function index()
    {

        // load views. within the views we can echo out $users
        $categories = $this->model->getProductCategory();

        if (isset($_SESSION['loggedInUser_id'])) {

            require APP . 'view/_templates/header.php';
            require APP . 'view/sell/index.php';
            require APP . 'view/_templates/footer.php';
            
        }else {

            require APP . 'view/_templates/header.php';
            require APP . 'view/users/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    /**
     * ACTION: createItem -- add product with image
     */
    public function createItem()
    {
        $categories = $this->model->getProductCategory();
        
        $image1 = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);

        if(($_FILES['fileToUpload2']['tmp_name']) != ""){
            $image2 = file_get_contents($_FILES['fileToUpload2']['tmp_name']);
        }else{
            $image2 = NULL;
        }

        if(($_FILES['fileToUpload3']['tmp_name']) != ""){
            $image3 = file_get_contents($_FILES['fileToUpload3']['tmp_name']);
        }else{
            $image3 = NULL;
        }

        if(($_FILES['fileToUpload4']['tmp_name']) != ""){
            $image4 = file_get_contents($_FILES['fileToUpload4']['tmp_name']);
        }else{
            $image4 = NULL;
        }

        $date = date("Y-m-d H:i:s");
        $seller_id =  $_SESSION['loggedInUser_id'];
        $this->model->createItem($seller_id,$_POST["Title"], $_POST["Description"], $_POST["Price"], $_POST["Condition"],$date, $_POST["Category_Id"],$image1,$image2,$image3,$image4);

        header('location: ' . URL . 'sell/added');
    }

    public function editItem()
    {
        $image1 = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);

        if(($_FILES['fileToUpload2']['tmp_name']) != ""){
            $image2 = file_get_contents($_FILES['fileToUpload2']['tmp_name']);
        }else{
            $image2 = NULL;
        }

        if(($_FILES['fileToUpload3']['tmp_name']) != ""){
            $image3 = file_get_contents($_FILES['fileToUpload3']['tmp_name']);
        }else{
            $image3 = NULL;
        }

        if(($_FILES['fileToUpload4']['tmp_name']) != ""){
            $image4 = file_get_contents($_FILES['fileToUpload4']['tmp_name']);
        }else{
            $image4 = NULL;
        }

        $date = date("Y-m-d");
        $product_id =$_SESSION['product_id'];
//        $seller_id =  $_SESSION['loggedInUser_id'];
        $this->model->editItem($product_id,$_POST["Title"], $_POST["Description"], $_POST["Price"], $_POST["Condition"],$date, $_POST["Category_Id"],$image1,$image2,$image3,$image4);

        // where to go after user has been deleted
         header('location: ' . URL . 'useraccount/index');

    }

    public function getItem()
    {
        
        // get all items from user
        $seller_id =  $_SESSION['loggedInUser_id'];
            
        $this->model->getItem($seller_id);
        
        // where to go after user has been deleted
//        header('location: ' . URL . 'item/index');
    }

    public function added()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/sell/added.php';
        require APP . 'view/_templates/footer.php';
    }
    
}
