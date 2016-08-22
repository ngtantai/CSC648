<?php
/**
 * Created by PhpStorm.
 * User: guoyiruan
 * Date: 7/13/16
 * Time: 10:21 PM
 */

class Dao {
    /**
     * @var null Database Connection
     */
    public $db = null;

    function __construct()
    {
        $this->openDatabaseConnection();
    }
    
    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        try {
            $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    // CRUD create read update and delete to database
    public function create($parameters, $target) {
        if ($target == "user") {
            $sql = "INSERT INTO user (Email, Password, Firstname, Lastname) VALUES (:email, :password, :firstname, :lastname)";
            $query = $this->db->prepare($sql);
            try {
                if ($query->execute($parameters)) {
                    return true;
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        else if($target == "item"){
            $seller_id = $parameters[":seller_id"];
            $title = $parameters[":title"];
            $description = $parameters[":description"];
            $price = $parameters[":price"];
            $condition = $parameters[":condition"];
            $postdate = $parameters[":date"];
            $category_Id =  $parameters[":category_Id"];
            $image1 =  $parameters[":image1"];
            $image2 =  $parameters[":image2"];
            $image3 =  $parameters[":image3"];
            $image4 =  $parameters[":image4"];


            $sql1 = "INSERT INTO image (Image_blob1,Image_blob2,Image_blob3,Image_blob4) VALUES (:image1, :image2, :image3, :image4)";
            $query1 = $this->db->prepare($sql1);
            $parameters1 = array(':image1' => $image1, ':image2' => $image2, ':image3' => $image3, ':image4' => $image4 );
            try {
                if ($query1->execute($parameters1)) {

                    $sql = "INSERT INTO product (Seller_id, Title, Description, Price, ItemCondition, Postdate, Category_Id,Image_id)
                    VALUES ('".$seller_id."','".$title."' , '".$description."', '".$price."', '".$condition."','".$postdate."' , '".$category_Id."','".$this->db->lastInsertId()."')";
                    $query = $this->db->prepare($sql);
                    try {
                        if ($query->execute()) {
                            return true;
                        } else {
                            return false;
                        }
                    } catch(PDOException $e) {
                        echo $e->getMessage();
                    }
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }


        }
        else if ($target == "order") {
            $product_id = $parameters[":product_id"];
            $buyer_id = $parameters[":buyer_id"];
            $date = $parameters[":date"];
            $status = $parameters[":status"];

            $sql = "SELECT Price FROM product WHERE Product_id = '".$product_id."' ";
//            echo $sql;
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            $price = $result->Price;
//            echo $price;

            $sql1 ="INSERT INTO confirmation (Product_id, Buyer_id, OrderDate,Price, Status) VALUES('".$product_id."', '".$buyer_id."', '".$date."','".$price."', '".$status."')";

            $query = $this->db->prepare($sql1);
            try {
                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

    }

    public function get($parameters, $target)
    {
        if ($target == "allUsers") {
            $sql = "SELECT User_id, Email, Firstname, Lastname FROM user";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }
        
        else if ($target == "user") {
            $email = $parameters[":email"];
            $password = $parameters[":password"];
            $sql1 = "SELECT Password FROM user WHERE Email = '" . $email . "'";
            $query = $this->db->prepare($sql1);
            $query->execute();
            $result = $query->fetch();
            $hashed_pass = $result->Password;

            if (password_verify($password, $hashed_pass)) {

                $sql = "SELECT User_id, Email FROM user WHERE Email = '" . $email . "'";
                $query = $this->db->prepare($sql);
                try {
                    if ($query->execute()) {
                        return $query->fetch();
                    } else {
                        return false;
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                echo "wrong password";
            }
        }

        else if ($target == "userInfo") {
            $user_id = $parameters[":user_id"];
            $sql = "SELECT Firstname, Lastname, Email FROM user WHERE User_id = '".$user_id."' ";
            $query = $this->db->prepare($sql);
            try {
                if ($query->execute()) {
                    return $query->fetchAll();
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        else if ($target == "userProducts") {
            $user_id = $parameters[":user_id"];
            $sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE i.Image_id = p. Image_id AND p. Seller_id = '".$user_id."' ";
            $query = $this->db->prepare($sql);
            try {
                if ($query->execute()) {
                    $result = $query->fetchAll();
                    return $result;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        else if ($target == "allProducts") {
           $searchinput = $parameters[":searchinput"];
           $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND (p1.Title LIKE '%".$searchinput."%'OR p1.Description LIKE '%".$searchinput."%')"; 
	   $query = $this->db->prepare($sql);
            try {
                if ($query->execute()) {
                    return $query->fetchAll();
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        else if ($target == "allHomeProducts") {
            $category = $parameters[":category"];
	        $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') ORDER BY Postdate DESC LIMIT 1";
            $query = $this->db->prepare($sql);

	    try {
                if ($query->execute()) {
                    return $query->fetchAll();
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        else if ($target == "allHighProducts") {

	   if(isset($parameters[":filterinput"])&&($parameters[":filterinput"]!=""))
	   	$filter = $parameters[":filterinput"];
	   if(isset($parameters[":filterinput2"])&&($parameters[":filterinput2"]!=""))
	    	$filter2 = $parameters[":filterinput2"];
           if(isset($parameters[":filterinput3"])&&($parameters[":filterinput3"]!=""))
                $filter3 = $parameters[":filterinput3"];
	   if(isset($parameters[":filtertype"]))
	   	$filtering= $parameters[":filtertype"];	
	   
	    $keyword = $parameters[":searchinput"];	  
  
	        if(isset($parameters[":category"])) {
	    	    	$category = $parameters[":category"];
			if(isset($filter2)){
				if($filtering=="condition"){
            				$sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') AND (ItemCondition = '".$filter."') ORDER BY cast(Price as SIGNED) DESC"; }
			
				else if($filtering=="both") {
                                        $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') AND (ItemCondition = '".$filter."') AND (p1.Price BETWEEN $filter2 AND $filter3) ORDER BY cast(Price as SIGNED) DESC";	}
		
				else if($filtering=="price"){
					$sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') AND (p1.Price BETWEEN $filter AND $filter2) ORDER BY cast(Price as SIGNED) DESC";
				}
			}

			else{
				$sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') ORDER BY cast(Price as SIGNED) DESC";}
            	}
	 
		else {
			if(isset($filter)){
				if($filtering=="condition")
            				$sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) AND (p.ItemCondition = '".$filter."') ORDER BY cast(Price as SIGNED) DESC";	
				
				else if($filtering=="both")
					$sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) AND (p.ItemCondition = '".$filter."') AND (p.Price BETWEEN $filter2 AND $filter3) ORDER BY cast(Price as SIGNED) DESC";

				else
					$sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) AND (p.Price BETWEEN $filter AND $filter2) ORDER BY cast(Price as SIGNED) DESC";
				
			}
			else {
				$sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) ORDER BY cast(Price as SIGNED) DESC";
			}
		}	  	    
	    $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();	
	    
	}
	
	   
	else if ($target == "allLowProducts") {
	   if(isset($parameters[":filterinput"])&&($parameters[":filterinput"]!==""))
                $filter = $parameters[":filterinput"];
           if(isset($parameters[":filterinput2"])&&($parameters[":filterinput2"]!=""))
                $filter2 = $parameters[":filterinput2"];
           if(isset($parameters[":filterinput3"])&&($parameters[":filterinput3"]!=""))
                $filter3 = $parameters[":filterinput3"];
           if(isset($parameters[":filtertype"]))
                $filtering= $parameters[":filtertype"];
            $keyword = $parameters[":searchinput"];
                if(isset($parameters[":category"])) {
                        $category = $parameters[":category"];
                        if(isset($filter)){
                                if($filtering=="condition")
                                        $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') AND (ItemCondition = '".$filter."') ORDER BY cast(Price as SIGNED) ASC";

                                else if($filtering=="both")
                                        $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') AND (ItemCondition = '".$filter."') AND (p1.Price BETWEEN $filter2 AND $filter3) ORDER BY cast(Price as SIGNED) ASC";

                                else { echo "here?";
                                        $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') AND (p1.Price BETWEEN $filter AND $filter2) ORDER BY cast(Price as SIGNED) ASC";}
                        }
                        else
                                $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') ORDER BY cast(Price as SIGNED) ASC";
            }
                else {
                        if(isset($filter)){
                                if($filtering=="condition")
                                        $sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) AND (p.ItemCondition = '".$filter."') ORDER BY cast(Price as SIGNED) ASC";

                                else if($filtering=="both")
                                        $sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) AND (p.ItemCondition = '".$filter."') AND (p.Price BETWEEN $filter2 AND $filter3) ORDER BY cast(Price as SIGNED) ASC";

                                else
                                        $sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) AND (p.Price BETWEEN $filter AND $filter2) ORDER BY cast(Price as SIGNED) ASC";

                        }
                        else {
                                $sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) ORDER BY cast(Price as SIGNED) ASC";
                        }
                            
          
                }                   
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(); 
	}

	    else if ($target == "allNewestProducts") {
           if(isset($parameters[":filterinput"])&&($parameters[":filterinput"]!=""))
                $filter = $parameters[":filterinput"];
           if(isset($parameters[":filterinput2"])&&($parameters[":filterinput2"]!=""))
                $filter2 = $parameters[":filterinput2"];
           if(isset($parameters[":filterinput3"])&&($parameters[":filterinput3"]!=""))
                $filter3 = $parameters[":filterinput3"];
           if(isset($parameters[":filtertype"]))
                $filtering= $parameters[":filtertype"];
                        $keyword = $parameters[":searchinput"];
                if(isset($parameters[":category"])) {
                        $category = $parameters[":category"];
                        if(isset($filter)){
                                if($filtering=="condition")
                                        $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') AND (ItemCondition = '".$filter."') ORDER BY Postdate DESC";

                                else if($filtering=="both")
                                        $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') AND (ItemCondition = '".$filter."') AND (p1.Price BETWEEN $filter2 AND $filter3) ORDER BY Postdate DESC";

                                else
                                        $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') AND (p1.Price BETWEEN $filter AND $filter2) ORDER BY Postdate DESC";
                        }
                        else
                                $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%') ORDER BY Postdate DESC";
            }
                else {
                        if(isset($filter)){
                                if($filtering=="condition")
                                        $sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) AND (p.ItemCondition = '".$filter."') ORDER BY Postdate DESC";

                                else if($filtering=="both")
                                        $sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) AND (p.ItemCondition = '".$filter."') AND (p.Price BETWEEN $filter2 AND $filter3) ORDER BY Postdate DESC";

                                else
                                        $sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) AND (p.Price BETWEEN $filter AND $filter2) ORDER BY Postdate DESC";

                        }
                        else {
                                $sql = "SELECT i.Image_blob1,p.Title,p.ItemCondition, p.Description, p.Price, p.Postdate, p.Product_id FROM product p, image i  WHERE ((i.Image_id = p. Image_id AND p.Title LIKE '%" . $keyword . "%') or (i.Image_id = p. Image_id AND Description LIKE '%." . $keyword . "%')) ORDER BY Postdate DESC";
                        }
                } 
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
	    }
       
	    else if ($target == "allFilterPriceProducts") {
            $minprice = $parameters[":minprice"];
	    $maxprice = $parameters[":maxprice"];
            $searchinput = $parameters[":searchinput"];
	        if(isset($parameters[":category"])) {
		        $category = $parameters[":category"];
	    	    	$sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Price BETWEEN $minprice AND $maxprice ) AND (p1.Title LIKE '%" . $searchinput . "%' or Description LIKE '%." . $searchinput . "%')";
            	} 	
		else {
	    		$sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND (p1.Price BETWEEN $minprice AND $maxprice ) AND (p1.Title LIKE '%" . $searchinput . "%' or Description LIKE '%." . $searchinput . "%')";
            	}
	        $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }
        
	    else if ($target == "allFilterConditionProducts") {
            $itemcondition = $parameters[":itemcondition"];
            $searchinput = $parameters[":searchinput"];
	        if(isset($parameters[":category"])) {
                $category = $parameters[":category"];
            $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$searchinput."%'OR p1.Description LIKE '%".$searchinput."%') AND (ItemCondition = '".$itemcondition."')";

	        } else {
	    $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND (p1.Title LIKE '%".$searchinput."%'OR p1.Description LIKE '%".$searchinput."%') AND (ItemCondition = '".$itemcondition."')";
	        }

	        $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }  

            else if ($target == "allFilterBothProducts") {
            $itemcondition = $parameters[":itemcondition"];
	    $minprice = $parameters[":minprice"];
	    $maxprice = $parameters[":maxprice"];
            $searchinput = $parameters[":searchinput"];
                if(isset($parameters[":category"])) {
                $category = $parameters[":category"];
            $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$searchinput."%'OR p1.Description LIKE '%".$searchinput."%') AND (ItemCondition = '".$itemcondition."') AND (p1.Price BETWEEN $minprice AND $maxprice )";

                } else {
            $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND (p1.Title LIKE '%".$searchinput."%'OR p1.Description LIKE '%".$searchinput."%') AND (ItemCondition = '".$itemcondition."') AND (p1.Price BETWEEN $minprice AND $maxprice )";
                }

                $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }
 
        
        else if ($target == "ProductsByCategory") {
            $keyword = $parameters[":searchinput"];
            $category =  $parameters[":category"];
            $sql = "SELECT i.Image_blob1,p1.Title,p1.ItemCondition, p1.Description, p1.Price, p1.Postdate, p1.Product_id FROM product p1,image i WHERE i.Image_id = p1. Image_id AND p1.Category_Id = (SELECT pc.Category_id FROM productCategory pc WHERE pc.Category_name = '".$category."') AND (p1.Title LIKE '%".$keyword."%'OR p1.Description LIKE '%".$keyword."%')";

            $query = $this->db->prepare($sql);
            try {
                if ($query->execute()) {
                    return $query->fetchAll();
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        
        else if ($target == "itemDetail") {
            $pid = $parameters[":product_id"];
            $sql ="SELECT i.Image_blob1, i.Image_blob2, i.Image_blob3, i.Image_blob4, u.Email, p.Seller_id, p.Title, p.Description, p.Price, p.ItemCondition, p.Postdate, p.Product_id, p.Category_Id, p.ItemCondition FROM product p,image i, user u  WHERE p.Image_id = i.Image_id AND p.Product_id = ".$pid." AND u.User_id = p.Seller_id ";
//            echo $sql;
            $query = $this->db->prepare($sql);
            try {
                if ($query->execute()) {
                    $result = $query->fetch();
//                    echo $result->Title;
                    return $result;
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        else if ($target == "userItems") {
//            $pid = $parameters[":product_id"];
            $id = $parameters[":seller_id"];
            $sql ="SELECT i.Image_blob1, p.Seller_id, p.Title, p.Description, p.Price, p.ItemCondition, p.Postdate, p.Product_id FROM product p,image i  WHERE p.Image_id = i.Image_id AND p.Seller_id = '".$id."' ";
            $query = $this->db->prepare($sql);
            try {
                if ($query->execute()) {
                    return $query->fetchAll();
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        else if ($target == "order") {
            $order_id = $parameters[":order_id"];
            $sql ="SELECT *FROM confirmation WHERE Order_id = '".$order_id."' ";
            $query = $this->db->prepare($sql);
            try {
                if ($query->execute()) {
                    return $query->fetchAll();
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        else if ($target == "productCategory") {
            $sql = "SELECT * FROM productCategory;";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }
    }

    public function update($parameters, $target) {
        if ($target == "item") {
            $pid = $parameters[":product_id"];
            $title = $parameters[":title"];
            $description = $parameters[":description"];
            $price = $parameters[":price"];
            $condition = $parameters[":condition"];
            $postdate = $parameters[":date"];
            $category_Id =  $parameters[":category_Id"];
            $image1 =  $parameters[":image1"];
            $image2 =  $parameters[":image2"];
            $image3 =  $parameters[":image3"];
            $image4 =  $parameters[":image4"];

            $sql = "UPDATE product SET Price = '".$price."', Title = '".$title."' , Description = '".$description."' , ItemCondition = '".$condition."' , Postdate = '".$postdate."', Category_Id = '".$category_Id."'WHERE Product_id = '".$pid. "'";
            $query = $this->db->prepare($sql);
            try {
                if ($query->execute()) {
                
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $sql = "SELECT Image_id FROM product WHERE Product_id = '".$pid."' ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            $imageID = $result->Image_id;

            $sql1 = "UPDATE image SET Image_blob1 = :image1 ,Image_blob2 = :image2,Image_blob3 = :image3,Image_blob4 = :image4 WHERE Image_id = '".$imageID."'";
            $query1 = $this->db->prepare($sql1);
            $parameters1 = array(':image1' => $image1, ':image2' => $image2, ':image3' => $image3, ':image4' => $image4 );

            try {
                if ($query1->execute($parameters1)) {
                    return true;
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }
        else if ($target == "editStatus") {
            $order_id =  $parameters[":order_id"];
            $status =  $parameters[":status"];
            $sql = "UPDATE confirmation SET Status = '".$status."' WHERE Order_id = '".$order_id. "'";
            try {
                if ($sql->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    public function delete ($parameters, $target) {
        if($target == "user") {
            $sql = "DELETE FROM user WHERE (User_id) = (:user_id)";
            $query = $this->db->prepare($sql);
            try {
                if ($query->execute($parameters)) {
                    return true;
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        else if($target == "item") {
            $sql = "DELETE FROM product WHERE (Product_id) = (:product_id)";
            $query = $this->db->prepare($sql);
            try {
                if ($query->execute($parameters)) {
                    return true;
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

    }
}
