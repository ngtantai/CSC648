
<div class="container" id="sell" onpageshow="scrollWin()">
    <!-- register form -->
    <div class="box">
        <div class="col-lg-6 col-lg-offset-3" style="margin-top:1%" >
        	<!-- Panel container -->
            <div class="panel panel-default ">
            	<!-- panel head-->
            	<div class="panel-heading" style="text-align:center; font-weight:800; font-size:20px">Enter your item info</div>
				<!-- panel body -->                
                <form class="panel-body col-lg-offset-0" style="font-size: 16px;background-color: #87CEFA"  role="form" action="<?php echo URL; ?>sell/createitem" method="POST" enctype="multipart/form-data">
                      
                      <div class="form-group">
                          <div class="row" >
                            <label class=" col-lg-7" for="item title" >Item title:</label>
                            <label class=" col-lg-5" for="price" >Price: </label>
                            
                          </div>

                          <div class="row">  
                            <div class="col-lg-5">
                              <input type="text" class="form-control input-md" name='Title' id="item_title" style="font-size:14px" maxlength="50" placeholder="Enter item name">
                            </div>
                            <div class="col-lg-5 col-lg-offset-2">
                              <input type="number" class="form-control input-md " name='Price' id="item_price" style="font-size:14px" maxlength="20" placeholder="">
                            </div>
                           </div>
                      </div>

                          <div class="form-group">
                          	  <label class="" for="categories" >Choose Categories:</label>
                              <div class=""  id="categories">                              
                                  <select name="Category_Id" class="form-control  ">
                                      <option value="">All Categories</option>
                                      <option value="1">Books</option>
                                      <option value="2">Furniture</option>
                                      <option value="3">Electronics</option>
                                      <option value="4">Office Supplies</option>
                                      <option value="5">Clothing</option>
                                      <option value="6">Other</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                          	  <label class="" for="condition" >Choose Condition:</label>
                              <div class="" id="item_condition" style="margin-left:0%">                              	  
                                  <select name="Condition" class="form-control ">
                                      <option value="">All Kinds</option>
                                      <option value="new">New</option>
                                      <option value="used">Used</option>
                                  </select>
                              </div>  
                          </div> 
                      <div class="form-group">
                          <label class="" for="condition">Description: </label>
                          <textarea class="form-control" rows="5"  name='Description' id="description" maxlength="1000" placeholder="Describe your item here..."></textarea>
                      </div>

                    <div class="form-group">
                        <label for='image' >Select image to upload:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload" />
                    </div>

                    <div class="form-group">
                        <label for='image' >Select image to upload:</label>
                        <input type="file" name="fileToUpload2" id="fileToUpload2" />
                    </div>

                    <div class="form-group">
                        <label for='image' >Select image to upload:</label>
                        <input type="file" name="fileToUpload3" id="fileToUpload3" />
                    </div>

                    <div class="form-group">
                        <label for='image' >Select image to upload:</label>
                        <input type="file" name="fileToUpload4" id="fileToUpload4" />
                    </div>

                    <div class="form-group" >

                          <button type="submit" class="btn btn-default col-lg-offset-4" name="submit" value="submit" id="submit">Submit</button>

                      </div>
              </form>
            </div>
         </div>
    </div>
</div>

