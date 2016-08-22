<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Item extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/item/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function showItem($product_id)
    {
        $categories = $this->model->getProductCategory();
        // if we have an id of a product that should be edited
        if (isset($product_id)) {
            // do getProduct() in model.php
            $productDetail = $this->model->getItemDetail($product_id);
            
            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $customer easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/item/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            
            // redirect user to products index page (as we don't have a customer_id)
//            header('location: ' . URL . 'item/index');
        }
    }
}
