<div class="" style="margin-left:10%;margin-right:10%;;border: 2px solid #EC971F;border-radius: 10px">
	<div class="panel-heading shadow" style="background:#d0d0d0"><h1 class="text-center" style="color:#000000;">Order Confirmation</h1></div>
    <div class=" panel-body" style="height: 55vh; background:#f2f2f2;" >         
    	<div class="row" style="padding-top:2vh;">
            <div class="col-lg-5 col-lg-offset-1">
                          <img style="height: 45vh; width: 30vw;" <?php if (isset($productDetail->Image_blob1) && $productDetail->Image_blob1 != "")
                          echo 'src="data:image/jpeg;base64,'.base64_encode($productDetail->Image_blob1).'" height="350" width="300"';?>>
            </div>

            <div class="col-lg-5 col-lg-offset-0 text-center panel-body">
            <h4 style="font-size:50px"><b><?php if (isset($productDetail->Title)) echo htmlspecialchars($productDetail->Title, ENT_QUOTES, 'UTF-8'); ?> - $<?php if (isset($productDetail->Price)) echo htmlspecialchars($productDetail->Price, ENT_QUOTES, 'UTF-8'); ?></b></h4><hr>
            <p><a class="btn btn-warning btn-lg" href="<?php echo URL; ?>contact/index" role="button"><b>Contact Seller</b></a></p>
            <p style="font-size:18px">"Contact the seller to arrange a time to meet up and purchase the item."</p>
            <p style="font-size:18px">-Or-</p>
          <p><a class="btn btn-warning btn-lg" href="<?php echo URL . 'confirm/reConfirm/' . htmlspecialchars($productDetail->Product_id, ENT_QUOTES, 'UTF-8'); ?>" role="button"><b>Pay in Advance</b></a></p>
          <p style="font-size:18px">"Pay in advance and get in touch with the seller to arrange a time and pick up the item."</p>
          </div>
      </div>
    </div>
    <div class="panel-footer" style="background:#c68428;"></div>
</div>