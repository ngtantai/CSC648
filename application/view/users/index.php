
<div class="container" id="register">
    <!-- register form -->
    <div class="box">
        <div class="col-lg-4 col-lg-offset-4" style="margin-top:1%" >
        	<!-- Panel container -->
            <div class="panel panel-default ">
            	<!-- panel head-->
            	<div class="panel-heading" style="text-align:center; font-weight:800; font-size:20px">Create your account</div>
				<!-- panel body -->                
                <form class="panel-body col-lg-offset-0 " style="font-size: 16px;background-color: #87CEFA"  name="user" role="form" action="<?php echo URL; ?>users/registeruser" onsubmit="return validateForm();" method="POST">
                      <div class="form-group">
                        <label class="" for="email">Email:</label>
                        <div class="">
                          <input type="email" class="form-control input-lg placeholder" name="email" id="email_field" placeholder="Enter your email here">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="" for="first name" >First Name:</label>
                        <div class="">
                          <input type="text" class="form-control input-lg placeholder" name="firstname" id="firstname" placeholder="Enter your first name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="" for="last name" >Last Name:</label>
                        <div class="">
                          <input type="text" class="form-control input-lg placeholder" name="lastname" id="lastname" placeholder="Enter your last name">
                        </div>
                      </div>
<!--                      <div class="form-group">-->
<!--                        <label class="" for="username" >Username:</label>-->
<!--                        <div class="">-->
<!--                          <input type="text" class="form-control input-lg placeholder" id="username_field" placeholder="Username">-->
<!--                        </div>-->
<!--                      </div>-->
                      <div class="form-group">
                        <label class="" for="password">Password:</label>
                        <div class=""> 
                          <input type="password" class="form-control input-lg placeholder" name= "password" id="password_field" placeholder="Enter password">
                        </div>
                      </div>
                      <div class="form-group"> 
                        <div class="">
                          <div class="checkbox">
                            <label><input type="checkbox"> I agree with term and condition</label>
                          </div>
                        </div>
                      </div>
                      <a href="<?php echo URL; ?>login/index">Already registered? Click here to login.</a>
                      <div class="form-group"> 
                        <div class="col-lg-4 col-lg-offset-4">
                          <button type="submit" class="btn btn-success " name= "submit" value='submit' id="submit">Sign Up</button>
                        </div>
                      </div>
              </form>
            </div>
         </div>
    </div>
</div>

<!--        <table>-->
<!--    	    <div class="well" ><h3>Test for DB (data from user table)</h3></div>-->
<!--            <thead style="background-color: #ddd; font-weight: bold;">-->
<!--                <tr>-->
<!--                    <td>UserID</td>-->
<!--<!--            <td>Username</td>-->
<!--                    <td>Email</td>-->
<!--                    <td>FirstName</td>-->
<!--                    <td>LastName</td>-->
<!--                    <td>DELETE</td>-->
<!---->
<!--                </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--                --><?php //foreach ($users as $user) { ?>
<!--                <tr>-->
<!--                    <td>--><?php //if (isset($user->User_id)) echo htmlspecialchars($user->User_id, ENT_QUOTES, 'UTF-8'); ?><!--</td>-->
<!--                    -->
<!--<!--                <td>--><?php ////if (isset($user->Username)) echo htmlspecialchars($user->Username, ENT_QUOTES, 'UTF-8'); ?><!--<!--</td>-->
<!--                -->
<!--                    <td>--><?php //if (isset($user->Email)) echo htmlspecialchars($user->Email, ENT_QUOTES, 'UTF-8'); ?><!--</td>-->
<!--                -->
<!--                    <td>--><?php //if (isset($user->Firstname)) echo htmlspecialchars($user->Firstname, ENT_QUOTES, 'UTF-8'); ?><!--</td>-->
<!--                -->
<!--                    <td>--><?php //if (isset($user->Lastname)) echo htmlspecialchars($user->Lastname, ENT_QUOTES, 'UTF-8'); ?><!--</td>-->
<!--                -->
<!--                    <td><a href="--><?php //echo URL . 'users/deleteUser/' . htmlspecialchars($user->User_id, ENT_QUOTES, 'UTF-8'); ?><!--">delete</a></td>-->
<!--                </tr>-->
<!--                --><?php //} ?>
<!--            </tbody>-->
<!--        </table>-->


