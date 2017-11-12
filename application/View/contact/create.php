<?php include_once PATH_VIEW . 'includes/head.php'; ?>
        <?php include_once PATH_VIEW . 'includes/header.php'; ?>  
        
        <!--Begin content-->     
        <div class="container"><?php
            if ($status['submitted'] == true) { ?>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="alert alert-danger" role="alert">
                        <?=$status['message'];?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <form class="form-horizontal" method="POST" action="/contacts/create">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?=$contact['name'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobileNumber" class="col-sm-2 control-label">Mobile No.</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" value="<?=$contact['mobileNumber'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" value="<?=$contact['address'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress" class="col-sm-2 control-label">Email Address</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" id="emailAddress" name="emailAddress" value="<?=$contact['emailAddress'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <a href="/contacts" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End content--> 
        <?php include_once PATH_VIEW . 'includes/footer.php'; ?>