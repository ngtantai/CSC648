<div class="container" style="">
    <!-- register form -->
    <div class="box">
        <div class="col-lg-6 col-lg-offset-3" style="margin-top:1%" >
            <!-- Panel container -->
            <div class="panel panel-default ">
                <!-- panel head-->
                <div class="panel-heading" style="text-align:center; font-weight:800; font-size:20px">Edit your item</div>
                <!-- panel body -->
                <form class="panel-body col-lg-offset-0" style="font-size: 16px;background-color: #87CEFA"  role="form" action="<?php echo URL; ?>sell/editItem" method="POST" enctype="multipart/form-data">

                    <div class="form-group form-inline">
                        <div class="form-group" >
                            <label class="" for="item title" >Item title:</label>
                            <div class="">
                                <input type="text" class="form-control input-md" name='Title' id="item_title" style="font-size:14px" value="<?php if (isset($product->Title)) echo htmlspecialchars($product->Title, ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                        </div>
                        <div class="form-group" style="margin-left:20%">
                            <label class="" for="price" >Price: </label>
                            <div class="">
                                <input type="number" class="form-control input-md " name='Price' id="item_price" style="font-size:14px" value="<?php if (isset($product->Price)) echo htmlspecialchars($product->Price, ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" for="categories" >Choose Categories:</label>
                        <div class=""  id="categories">
                            <select name="Category_Id" class="form-control  ">
                                <option value="">All Categories </option>
                                <option <?php if($productionCategory == 1){echo("selected");}?> value="1">Books</option>
                                <option <?php if($productionCategory == 2){echo("selected");}?> value="2">Furniture</option>
                                <option <?php if($productionCategory == 3){echo("selected");}?> value="3">Electronics</option>
                                <option <?php if($productionCategory == 4){echo("selected");}?> value="4">Office Supplies</option>
                                <option <?php if($productionCategory == 5){echo("selected");}?> value="5">Clothing</option>
                                <option <?php if($productionCategory == 6){echo("selected");}?> value="6">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" for="condition" >Choose Condition:</label>
                        <div class="" id="item_condition" style="margin-left:0%">
                            <select name="Condition" class="form-control ">
                                <option value="">All Kinds</option>
                                <option <?php if($condition == "new"){echo("selected");}?> value="new">New</option>
                                <option <?php if($condition == "used"){echo("selected");}?> value="used">Used</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" for="condition">Description: </label>
                        <textarea class="form-control" rows="5"  name='Description' id="description" ><?php echo $description ?></textarea>
                    </div>
                    <h5>Current images</h5>
                    <img <?php if (isset($img1) && $img1 != "")
                        echo 'src="data:image/jpeg;base64,'.base64_encode($img1).'" height="100" width="100"';?> >
                    <img <?php if (isset($img2) && $img2 != "")
                        echo 'src="data:image/jpeg;base64,'.base64_encode($img2).'" height="100" width="100"';?> >
                    <img <?php if (isset($img3) && $img3 != "")
                        echo 'src="data:image/jpeg;base64,'.base64_encode($img3).'" height="100" width="100"';?> >
                    <img <?php if (isset($img4) && $img4 != "")
                        echo 'src="data:image/jpeg;base64,'.base64_encode($img4).'" height="100" width="100"';?> >
                    <h5>Please re-upload the images (up to 4)</h5>
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
                        <div class="" >
                            <button type="submit" class="btn btn-default col-lg-offset-4" name="submit" value="submit" id="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>