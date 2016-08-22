
<div class="container" id="login-section">
    <!-- register form -->
    <div class="box">
        <div class="col-lg-4 col-lg-offset-4" style="margin-top:1%" >
        	<!-- Panel container -->
            <div class="panel panel-default ">
            	<!-- panel head-->
            	<div class="panel-heading" style="text-align:center; font-weight:800; font-size:20px">Member Login</div>
				<!-- panel body -->                
                <form class="panel-body col-lg-offset-0" style="font-size: 16px;background-color: #87CEFA"  role="form" action="<?php echo URL; ?>login/loginuser" method="GET">                    
                      <div class="form-group">
                        <label class="" for="email">SFSU Email:</label>
                        <div>
                          <input type="email" name="email" value="" required class="form-control input-lg" id="username_field" style="font-size:16px" placeholder="Enter SFSU email" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="" for="password">Password:</label>
                        <div> 
                          <input type="password" name="password" value="" required class="form-control input-lg" id="password_field" style="font-size:16px" placeholder="Enter password" />
                        </div>
                      </div>                      
                      <div class="form-group" > 
                        <div class="col-lg-4 col-lg-offset-4">		                     
                          <button type="submit" name="loginuser" class="btn btn-success" id="login">Login</button>
                        </div>
                      </div>
              </form>
            </div>
         </div>
    </div>
    
</div>





