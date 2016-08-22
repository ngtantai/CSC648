<?php

/**
 * Class products
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Products extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://../products/index
     */
    public function index()
    {

       // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/products/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function searchProducts()
    {
        $categories = $this->model->getProductCategory();

        // if we have POST data to create a new product entry
        if (isset($_GET["submit_search_product"])) {
            // do getAllProducts() in model/model.php
	        $products = $this->model->getAllProducts($_GET["searchinput"], $_GET["category"]);
	    }
	
	else if (isset($_GET["highprice"])) {

		$sorttype="highprice";

		if (($_GET["itemcondition"]!="")&&($_GET["minprice"]!="")) {
			$filtertype="both";
			$filterinput=($_GET["itemcondition"]);
                        $filterinput2=($_GET["minprice"]);
                        $filterinput3=($_GET["maxprice"]);
	                $products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype, $filterinput, $filterinput2, $filterinput3);
		}

		else if (isset($_GET["itemcondition"])&&($_GET["itemcondition"]!="")) {
			$filterinput=($_GET["itemcondition"]);
			$filtertype="condition"; 
	                $products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype, $filterinput);
		}
		
		else if (isset($_GET["minprice"])&&($_GET["minprice"]!="")) {
			$filtertype="price";
			$filterinput=($_GET["minprice"]);
			$filterinput2=($_GET["maxprice"]);
	                $products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype, $filterinput, $filterinput2);
		}

		else {
			$filtertype="";
			$filterinput="";
			$products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype,$filterinput);	
		}
        }

        else if (isset($_GET["lowprice"])) {
            
	        $sorttype="lowprice";

                if (($_GET["itemcondition"]!="")&&($_GET["minprice"]!="")) {
                        $filtertype="both";
                        $filterinput=($_GET["itemcondition"]);
                        $filterinput2=($_GET["minprice"]);
                        $filterinput3=($_GET["maxprice"]);
                        $products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype, $filterinput, $filterinput2, $filterinput3);
                }

                else if (isset($_GET["itemcondition"])&&($_GET["itemcondition"]!="")) {
                        $filterinput=($_GET["itemcondition"]);
                        $filtertype="condition";
                        $products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype, $filterinput);
                }
                
                else if (isset($_GET["minprice"])&&($_GET["minprice"]!="")) {
                        $filtertype="price";
                        $filterinput=($_GET["minprice"]);
                        $filterinput2=($_GET["maxprice"]);
                        $products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype, $filterinput, $filterinput2);
                }       
                
                else {
                        $filtertype="";
			$filterinput="";
                        $products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype, $filterinput);
                }  
	}

        else if (isset($_GET["date"])) {
                $sorttype="date";

                if (($_GET["itemcondition"]!="")&&($_GET["minprice"]!="")) {
                        $filtertype="both";
                        $filterinput=($_GET["itemcondition"]);
                        $filterinput2=($_GET["minprice"]);
                        $filterinput3=($_GET["maxprice"]);
                        $products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype, $filterinput, $filterinput2, $filterinput3);
                }

                else if (isset($_GET["itemcondition"])&&($_GET["itemcondition"]!="")) {
                        $filterinput=($_GET["itemcondition"]);
                        $filtertype="condition";
                        $products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype, $filterinput);
                }

                else if (isset($_GET["minprice"])&&($_GET["minprice"]!="")) {
                        $filtertype="price";
                        $filterinput=($_GET["minprice"]);
                        $filterinput2=($_GET["maxprice"]);
                        $products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype, $filterinput, $filterinput2);
                }       
                        
                else {  
                        $filtertype="";
			$filterinput="";
                        $products = $this->model->getAllSortedProducts($_GET["searchinput"], $_GET["category"], $sorttype, $filtertype, $filterinput);
                }           
	}

        else if (isset($_GET["submit_filter_price_product"])) {

		if($_GET["itemcondition"]!=""){
			$filtertype = "both";
			$products = $this->model->getAllFilteredProducts($_GET["searchinput"], $_GET["category"], $filtertype, $_GET["itemcondition"], $_GET["minprice"], $_GET["maxprice"]);
	    	}	

		else {
			$filtertype = "price";
            		$products = $this->model->getAllFilteredProducts($_GET["searchinput"], $_GET["category"], $filtertype, $_GET["minprice"], $_GET["maxprice"]);
		}
	}

        else if (isset($_GET["submit_condition_product"])) {
	       
		if($_GET["itemcondition"]==""){
			if($_GET["minprice"]!=""){
				$filtertype="price";	
	                        $products = $this->model->getAllFilteredProducts($_GET["searchinput"], $_GET["category"], $filtertype, $_GET["minprice"], $_GET["maxprice"]);
			}
			
			else
                        	$products = $this->model->getAllProducts($_GET["searchinput"], $_GET["category"]); 
		}
		
                else if($_GET["minprice"]!="" && $_GET["itemcondition"]!=""){
                        $filtertype = "both";
                        $products = $this->model->getAllFilteredProducts($_GET["searchinput"], $_GET["category"], $filtertype, $_GET["itemcondition"], $_GET["minprice"], $_GET["maxprice"]);
                }

		else { 
		$filtertype = "condition";
            	$products = $this->model->getAllFilteredProducts($_GET["searchinput"], $_GET["category"], $filtertype, $_GET["itemcondition"]);	
        	}
	}
       
	else if (isset($_GET["reset_filter"])) {
		                $products = $this->model->getAllProducts($_GET["searchinput"], $_GET["category"]); 
	}
        // where to go after product has been added
        require APP . 'view/_templates/header.php';
        require APP . 'view/products/product.php';
        require APP . 'view/_templates/footer.php';

    }

    public function getProductCategory()
    {

        $categories = $this->model->getProductCategory();
        foreach ($categories as $category) {
            echo $category->Category_name;
        }


        // where to go after product has been added
//        require APP . 'view/_templates/header.php';
//        require APP . 'view/products/index.php';
//        require APP . 'view/_templates/footer.php';

    }

}
