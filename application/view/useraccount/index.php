<div class="container" id="account-overview" style="margin-bottom: 50px;">
    <div class="box">
        <div class="col-lg-8 col-lg-offset-2" style="margin-top:1%;" >
            <div class="panel-heading" style="text-align:center;color:#ffdf80;"><h2>Account overview</h2></div>
            <ul class="nav nav-justified nav-pills" id="account-tab" style="border-radius:0px">
                <li class="active" style="border-radius:0px; background:#EEEEEE;"><a data-toggle="tab" href="#home" >Account profile</a></li>
                <li id="selling-item" style="background: #EEEEEE;"><a data-toggle="tab" href="#menu1">Selling items</a></li>
            </ul>

            <div class="tab-content" style="border-radius:0px">
                <div id="home" class="tab-pane fade in active well" style="width:100%">
                	<div class="panel-body">
                    	<h5 class="col-lg-3 col-lg-offset-1"><i>First name   </i></h5><h5 class="float-left">: <?php if (isset($user[0]->Firstname)) echo htmlspecialchars($user[0]->Firstname, ENT_QUOTES, 'UTF-8'); ?></h5></br></br></br>
                    	<h5 class="col-lg-3 col-lg-offset-1  float-left"><i>Last name     </i></h5><h5 class="float-left">: <?php if (isset($user[0]->Lastname)) echo htmlspecialchars($user[0]->Lastname, ENT_QUOTES, 'UTF-8'); ?></h5></br></br></br>
                    	<h5 class="col-lg-3 col-lg-offset-1 float-left"><i>Email </i></h5><h5>: <?php if (isset($user[0]->Email)) echo htmlspecialchars($user[0]->Email, ENT_QUOTES, 'UTF-8'); ?></h5></br>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade" style="background-color:#B3B3B3; margin-bottom:50px">
                    <table>
                        <thead style="background: linear-gradient(grey,white,white,white,grey); font-weight: bold;height: 15px">
                        <tr>
                            <td>Image</td>
                            <td>Title</td>
                            <td>ItemCondition</td>
                            <td>Description</td>
                            <td>Price</td>
                            <td>Edit<b style="float:right;margin-right:25%">|</b> </td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($userproducts as $userproduct) { ?>
                            <tr>
                                <td id="table-image" ><img style="padding:5px;" <?php if (isset($userproduct->Image_blob1) && $userproduct->Image_blob1 != "") echo 'src="data:image/jpeg;base64,'.base64_encode($userproduct->Image_blob1).'" height="50" width="50"';?> ></td>

                                <td><?php if (isset($userproduct->Title)) echo htmlspecialchars($userproduct->Title, ENT_QUOTES, 'UTF-8'); ?></td>

                                <td><?php if (isset($userproduct->ItemCondition)) echo htmlspecialchars($userproduct->ItemCondition, ENT_QUOTES, 'UTF-8'); ?></td>

                                <td><?php if (isset($userproduct->Description)) echo htmlspecialchars($userproduct->Description, ENT_QUOTES, 'UTF-8'); ?></td>

                                <td>$<?php if (isset($userproduct->Price)) echo htmlspecialchars($userproduct->Price, ENT_QUOTES, 'UTF-8'); ?></td>

                                <td><a href="<?php echo URL . 'useraccount/editItem/' . htmlspecialchars($userproduct->Product_id, ENT_QUOTES, 'UTF-8'); ?>">EDIT</a></td>
 
                                 <td><a onclick="return confirm('This will permanantly delete your item.')" href="<?php echo URL . 'useraccount/deleteItem/' . htmlspecialchars($userproduct->Product_id, ENT_QUOTES, 'UTF-8'); ?>">DELETE</a></td>
                                
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>