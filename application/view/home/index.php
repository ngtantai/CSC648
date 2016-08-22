<div class="container " style="width:80%; margin-left:10%; margin-top:1%;border: 2px solid #EC971F;border-radius: 10px;background:#f7f7f7">
     <div class="panel panel-default" style="background:#f7f7f7">
        <div class="panel-heading" style="background:#d0d0d0;font-size:18px">Recently Added Items</div>
            <div class="row panel-body " style="background:;width:100%;margin-left:4%">
                <div class="col-lg-3" style="background:;padding-left:1vw;padding-right:1vw">
                    <?php foreach ($newestBook as $product) { ?>
                        <div class="col-lg-12" style="background:;padding-bottom:0"><a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><img  <?php if (isset($product->Image_blob1) && $product->Image_blob1 != "")
                                                        echo 'src="data:image/jpeg;base64,'.base64_encode($product->Image_blob1).'" height="150" width="150"';
                                                        else echo 'src="http://placehold.it/150x80?text=IMAGE" ' ?>class=" " style="width:100%;height:272px;" alt="Image"></a>
                        </div>
                        <div class="col-lg-12" style="float:left;  background:">
                                <div class="col-lg-12 col-lg-offset-0" style="background:#FFFFFF;font-size:17px;font-weight:bold;padding-bottom:1vh;padding-top:1vh;margin-right:1vw"> <?php if (isset($product->Title)) echo htmlspecialchars($product->Title, ENT_QUOTES, 'UTF-8'); ?></div>
                                <div class="row panel-body" style="margin-top:3vh">
                                     <div class="col-lg-7 " style="background:#FFFFFF;float:left;font-size:14px; height:5vh;padding:auto">Date Upload : </br><?php if (isset($product->Postdate)) echo htmlspecialchars(date("Y-m-d", strtotime($product->Postdate)), ENT_QUOTES, 'UTF-8'); ?></div>
                                     <div class="col-lg-5 sansserif float-right" style="background:#FFFFFF;height:5vh;font-size:24px; font-weight:bolder;padding-top:.5vh;"> $<?php if (isset($product->Price)) echo htmlspecialchars($product->Price, ENT_QUOTES, 'UTF-8'); ?></div>
                                </div>
                                     
                                <div class="row col-lg-12" style="width:100%;">                               
                                     <div class="col-lg-offset-3" style="float:left;padding-right:0"><form action="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><button class="view-item-button" >View Item</button></div></form>
                                     <div class="col-lg-offset-0" style="float:left;padding-left:0;" id="contact"><form action="<?php echo URL.'confirm/showitem/'. htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?> "><button class="contact-seller-button">Buy Now</button></div></form>
                                 </div>
                        <?php } ?>
                         </div>
                         

                </div>
                
                <div class="col-lg-3 col-lg-offset-1" style="background:;padding-left:1vw;padding-right:1vw">
                    <?php foreach ($newestFurniture as $product) { ?>
                        <div class="col-lg-12" style="background:;padding-bottom:0"><a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><img  <?php if (isset($product->Image_blob1) && $product->Image_blob1 != "")
                                                        echo 'src="data:image/jpeg;base64,'.base64_encode($product->Image_blob1).'" height="150" width="150"';
                                                        else echo 'src="http://placehold.it/150x80?text=IMAGE" ' ?>class="" style="width:100%;height:272px;" alt="Image"></a>
                        </div>
                        <div class="col-lg-12" style="float:left;  background:">
                                <div class="col-lg-12 col-lg-offset-0" style="background:#FFFFFF;font-size:18px;font-weight:bold;padding-bottom:1vh;padding-top:1vh;margin-right:1vw"> <?php if (isset($product->Title)) echo htmlspecialchars($product->Title, ENT_QUOTES, 'UTF-8'); ?></div>
                                <div class="row panel-body" style="margin-top:3vh">
                                     <div class="col-lg-7 " style="background:#FFFFFF;float:left;font-size:14px; height:5vh;padding:auto">Date Upload : </br><?php if (isset($product->Postdate)) echo htmlspecialchars(date("Y-m-d", strtotime($product->Postdate)), ENT_QUOTES, 'UTF-8'); ?></div>
                                     <div class="col-lg-5 sansserif float-right" style="background:#FFFFFF;height:5vh;font-size:24px; font-weight:bolder;padding-top:.5vh;"> $<?php if (isset($product->Price)) echo htmlspecialchars($product->Price, ENT_QUOTES, 'UTF-8'); ?></div>
                                </div>
                                     
                                 <div class="row col-lg-12" style="width:100%;">                               
                                     <div class="col-lg-offset-3" style="float:left;padding-right:0"><form action="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><button class="view-item-button" >View Item</button></div></form>
                                     <div class="col-lg-offset-0" style="float:left;padding-left:0;" id="contact"><form action="<?php echo URL.'confirm/showitem/'. htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?> "><button class="contact-seller-button">Buy Now</button></div></form>
                                 </div>
                        <?php } ?>
                         </div>
                </div>
                
                <div class="col-lg-3 col-lg-offset-1" style="background:;padding-left:1vw;padding-right:1vw">
                    <?php foreach ($newestElectronics as $product) { ?>
                        <div class="col-lg-12" style="background:;padding-bottom:0"><a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><img  <?php if (isset($product->Image_blob1) && $product->Image_blob1 != "")
                                                        echo 'src="data:image/jpeg;base64,'.base64_encode($product->Image_blob1).'" height="150" width="150"';
                                                        else echo 'src="http://placehold.it/150x80?text=IMAGE" ' ?> style="width:100%;height:272px;" alt="Image"></a>
                        </div>
                        <div class="col-lg-12" style="float:left;  background:">
                                <div class="col-lg-12 col-lg-offset-0" style="background:#FFFFFF;font-size:18px;font-weight:bold;padding-bottom:1vh;padding-top:1vh;margin-right:1vw"> <?php if (isset($product->Title)) echo htmlspecialchars($product->Title, ENT_QUOTES, 'UTF-8'); ?></div>
                                <div class="row panel-body" style="margin-top:3vh">
                                     <div class="col-lg-7 " style="background:#FFFFFF;float:left;font-size:14px; height:5vh;padding:auto">Date Upload : </br><?php if (isset($product->Postdate)) echo htmlspecialchars(date("Y-m-d", strtotime($product->Postdate)), ENT_QUOTES, 'UTF-8'); ?></div>
                                     <div class="col-lg-5 sansserif float-right" style="background:#FFFFFF;height:5vh;font-size:24px; font-weight:bolder;padding-top:.5vh;"> $<?php if (isset($product->Price)) echo htmlspecialchars($product->Price, ENT_QUOTES, 'UTF-8'); ?></div>
                                </div>
                                     
                                <div class="row col-lg-12" style="width:100%;">                               
                                     <div class="col-lg-offset-3" style="float:left;padding-right:0"><form action="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><button class="view-item-button" >View Item</button></div></form>
                                     <div class="col-lg-offset-0" style="float:left;padding-left:0;" id="contact"><form action="<?php echo URL.'confirm/showitem/'. htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?> "><button class="contact-seller-button">Buy Now</button></div></form>
                                 </div>
                        <?php } ?>
                         </div>

                </div>
                
               </div>
               
               
               
               
               <div class="row panel-body " style="background:;width:100%;margin-left:4%">
                <div class="col-lg-3" style="background:;padding-left:1vw;padding-right:1vw">
                    <?php foreach ($newestClothing as $product) { ?>
                        <div class="col-lg-12" style="background:;padding-bottom:0"><a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><img  <?php if (isset($product->Image_blob1) && $product->Image_blob1 != "")
                                                        echo 'src="data:image/jpeg;base64,'.base64_encode($product->Image_blob1).'" height="150" width="150"';
                                                        else echo 'src="http://placehold.it/150x80?text=IMAGE" ' ?>class=" " style="width:100%;height:272px;" alt="Image"></a>
                        </div>
                        <div class="col-lg-12" style="float:left;  background:">
                                <div class="col-lg-12 col-lg-offset-0" style="background:#FFFFFF;font-size:18px;font-weight:bold;padding-bottom:1vh;padding-top:1vh;margin-right:1vw"> <?php if (isset($product->Title)) echo htmlspecialchars($product->Title, ENT_QUOTES, 'UTF-8'); ?></div>
                                <div class="row panel-body" style="margin-top:3vh">
                                     <div class="col-lg-7 " style="background:#FFFFFF;float:left;font-size:14px; height:5vh;padding:auto">Date Upload : </br><?php if (isset($product->Postdate)) echo htmlspecialchars(date("Y-m-d", strtotime($product->Postdate)), ENT_QUOTES, 'UTF-8'); ?></div>
                                     <div class="col-lg-5 sansserif float-right" style="background:#FFFFFF;height:5vh;font-size:24px; font-weight:bolder;padding-top:.5vh;"> $<?php if (isset($product->Price)) echo htmlspecialchars($product->Price, ENT_QUOTES, 'UTF-8'); ?></div>
                                </div>
                                     
                                <div class="row col-lg-12" style="width:100%;">                               
                                     <div class="col-lg-offset-3" style="float:left;padding-right:0"><form action="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><button class="view-item-button" >View Item</button></div></form>
                                     <div class="col-lg-offset-0" style="float:left;padding-left:0;" id="contact"><form action="<?php echo URL.'confirm/showitem/'. htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?> "><button class="contact-seller-button">Buy Now</button></div></form>
                                 </div>
                        <?php } ?>
                         </div>

                </div>
                
                <div class="col-lg-3 col-lg-offset-1" style="background:;padding-left:1vw;padding-right:1vw">
                    <?php foreach ($newestOfficeSupply as $product) { ?>
                        <div class="col-lg-12" style="background:;padding-bottom:0"><a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><img  <?php if (isset($product->Image_blob1) && $product->Image_blob1 != "")
                                                        echo 'src="data:image/jpeg;base64,'.base64_encode($product->Image_blob1).'" height="150" width="150"';
                                                        else echo 'src="http://placehold.it/150x80?text=IMAGE" ' ?>class="" style="width:304px;height:272px;" alt="Image"></a>
                        </div>
                        <div class="col-lg-12" style="float:left;  background:">
                                <div class="col-lg-12 col-lg-offset-0" style="background:#FFFFFF;font-size:18px;font-weight:bold;padding-top:1vh;padding-bottom:1vh;margin-right:1vw"> <?php if (isset($product->Title)) echo htmlspecialchars($product->Title, ENT_QUOTES, 'UTF-8'); ?></div>
                                <div class="row panel-body" style="margin-top:3vh">
                                     <div class="col-lg-7 " style="background:#FFFFFF;float:left;font-size:14px; height:5vh;padding:auto">Date Upload : </br><?php if (isset($product->Postdate)) echo htmlspecialchars(date("Y-m-d", strtotime($product->Postdate)), ENT_QUOTES, 'UTF-8'); ?></div>
                                     <div class="col-lg-5 sansserif float-right" style="background:#FFFFFF;height:5vh;font-size:24px; font-weight:bolder;padding-top:.5vh;"> $<?php if (isset($product->Price)) echo htmlspecialchars($product->Price, ENT_QUOTES, 'UTF-8'); ?></div>
                                </div>
                                     
                                <div class="row col-lg-12" style="width:100%;">                               
                                     <div class="col-lg-offset-3" style="float:left;padding-right:0"><form action="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><button class="view-item-button" >View Item</button></div></form>
                                     <div class="col-lg-offset-0" style="float:left;padding-left:0;" id="contact"><form action="<?php echo URL.'confirm/showitem/'. htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?> "><button class="contact-seller-button">Buy Now</button></div></form>
                                 </div>
                        <?php } ?>
                         </div>
                </div>
                
                <div class="col-lg-3 col-lg-offset-1" style="background:;padding-left:1vw;padding-right:1vw">
                    <?php foreach ($newestOther as $product) { ?>
                        <div class="col-lg-12" style="background:;padding-bottom:0"><a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><img  <?php if (isset($product->Image_blob1) && $product->Image_blob1 != "")
                                                        echo 'src="data:image/jpeg;base64,'.base64_encode($product->Image_blob1).'" height="150" width="150"';
                                                        else echo 'src="http://placehold.it/150x80?text=IMAGE" ' ?> style="width:100%;height:272px;" alt="Image"></a>
                        </div>
                        <div class="col-lg-12" style="float:left;  background:">
                                <div class="col-lg-12 col-lg-offset-0" style="background:#FFFFFF;font-size:18px;font-weight:bold;padding-top:1vh;padding-bottom:1vh;margin-right:1vw"> <?php if (isset($product->Title)) echo htmlspecialchars($product->Title, ENT_QUOTES, 'UTF-8'); ?></div>
                                <div class="row panel-body" style="margin-top:3vh">
                                     <div class="col-lg-7 " style="background:#FFFFFF;float:left;font-size:14px; height:5vh;padding:auto">Date Upload : </br><?php if (isset($product->Postdate)) echo htmlspecialchars(date("Y-m-d", strtotime($product->Postdate)), ENT_QUOTES, 'UTF-8'); ?></div>
                                     <div class="col-lg-5 sansserif float-right" style="background:#FFFFFF;height:5vh;font-size:24px; font-weight:bolder;padding-top:.5vh;"> $<?php if (isset($product->Price)) echo htmlspecialchars($product->Price, ENT_QUOTES, 'UTF-8'); ?></div>
                                </div>
                                     
                                <div class="row col-lg-12" style="width:100%;">                               
                                     <div class="col-lg-offset-3" style="float:left;padding-right:0"><form action="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?>"><button class="view-item-button" >View Item</button></div></form>
                                     <div class="col-lg-offset-0" style="float:left;padding-left:0;" id="contact"><form action="<?php echo URL.'confirm/showitem/'. htmlspecialchars($product->Product_id, ENT_QUOTES, 'UTF-8'); ?> "><button class="contact-seller-button">Buy Now</button></div></form>
                                 </div>
                        <?php } ?>
                         </div>

                </div>
                
               </div>

           
            </div>
          
</div><br>
