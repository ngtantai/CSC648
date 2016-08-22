<?php
if(!isset($_SESSION)) {
    session_start();
}

/**
 * Class useraccount
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Useraccount extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views

        $categories = $this->model->getProductCategory();
        $user_id =  $_SESSION['loggedInUser_id'];
        

        if (isset($_SESSION['loggedInUser_id'])) {

            $user = $this->model->getUserInfo($user_id);
            $userproducts = $this->model->getUserProdcuts($user_id);
            
        }
            require APP . 'view/_templates/header.php';
            require APP . 'view/useraccount/index.php';
            require APP . 'view/_templates/footer.php';
        
    }

    public function editItem($product_id)
    {
        $categories = $this->model->getProductCategory();

        if (isset($product_id)) {
            $product = $this->model->getItemDetail($product_id);
            $productionCategory = $product->Category_Id;
            $condition = $product->ItemCondition;
            $description = $product->Description;
            $img1 = $product->Image_blob1;
            $img2 = $product->Image_blob2;
            $img3 = $product->Image_blob3;
            $img4 = $product->Image_blob4;
            $_SESSION['product_id'] = $product_id;
            
        }
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/useraccount/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function deleteItem($product_id)
    {
        // check the the userid if the userid == seller's id in DB execute, else return

        // if we have an id of a user that should be deleted
        if (isset($product_id)) {
            // do deleteUser() in model/model.php
            $this->model->deleteItem($product_id);
        }

        // where to go after user has been deleted
            header('location: ' . URL . 'useraccount/index');
    }
    
}