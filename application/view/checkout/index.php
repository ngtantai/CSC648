<div class="panel" style="margin-left:20%;margin-right:20%;">
	<h1 class="text-center panel-heading">Checkout</h1>

    <div class="jumbotron panel-body" style="background-color:#cfebfd" >  
      <div class="container" style="margin-top:-20px" >
      <h3>Billing Information:</h3>
      <div class="col-lg-offset-1">
          <div class="form-group row">
              <label for="example-text-input" class="col-xs-2 col-form-label">First Name</label>
              <div class="col-xs-3">
                 <input class="form-control" type="text" value="" id="example-text-input">
              </div>
          </div>
          <div class="form-group row">
              <label for="example-search-input" class="col-xs-2 col-form-label">Last Name</label>
              <div class="col-xs-3">
                <input class="form-control" type="search" value="" id="example-search-input">
              </div>
          </div>
            <div class="form-group row">
              <label for="example-email-input" class="col-xs-2 col-form-label">Address</label>
              <div class="col-xs-4">
                <input class="form-control" type="email" value="" id="example-email-input">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-url-input" class="col-xs-2 col-form-label">City</label>
              <div class="col-xs-4">
                <input class="form-control" type="url" value="" id="example-url-input">
              </div>
            </div>
            <div class="form-group row">
                  <label for="example-tel-input" class="col-xs-2 col-form-label">State</label>
                  <div class="col-xs-1">
                    <input class="form-control" type="" value="" id="example-tel-input">
                </div>
        	</div>
            <div class="form-group row">
              <label for="example-password-input" class="col-xs-2 col-form-label">Zip Code</label>
              <div class="col-xs-2">
                <input class="form-control" type="" value="" id="example-password-input">
              </div>
            </div>
    </div>
      <h3>Credit Card Information:</h3>
      <div class="col-lg-offset-1">
        <div class="form-group row">
          <label for="example-number-input" class="col-xs-2 col-form-label">Credit Card Number</label>
          <div class="col-xs-5">
            <input class="form-control" type="number" value="" id="example-number-input">
          </div>
        </div>     
        <div class="form-group row">
          <label for="example-date-input" class="col-xs-2 col-form-label">Expiration Date</label>
          <div class="col-xs-5">
            <input class="form-control" type="date" value="" id="example-date-input">
          </div>
        </div>
        <div class="form-group row">
          <label for="securitycode" class="col-xs-2 col-form-label">Security Code</label>
          <div class="col-xs-2">
            <input class="form-control" type="number" value="" id="securitycode">
          </div>
         </div>
      </div>
    <h4><b>Contact the seller to arrange a meeting:</b></h4>
    <form class="col-lg-10">
        <label for="exampleTextarea">Message to "Seller"</label>
        <textarea class="form-control " id="exampleTextarea" rows="3"></textarea>
    </form>

    </br>
    
    
    <!--    <h2>Item Title:  --><?php //if (isset($productDetail->Product_id)) echo htmlspecialchars($productDetail->Product_id, ENT_QUOTES, 'UTF-8'); ?>
      <p><a class="btn btn-warning btn-lg col-lg-offset-5" href="<?php echo URL. 'checkout/purchase/'. htmlspecialchars($productDetail->Product_id, ENT_QUOTES, 'UTF-8'); ?>" style="border:2px solid #EC971F;margin-top:10px" role="button">Place Order</a></p>
      </div>
    </div>
</div>