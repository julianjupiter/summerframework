<?php include_once PATH_VIEW . 'includes/head.php'; ?>
        <?php include_once PATH_VIEW . 'includes/header.php'; ?>   
           
        <!--Begin content--> 
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" value="<?=$contact['id'];?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" value="<?=$contact['name'];?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Mobile No.</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" value="<?=$contact['mobileNumber'];?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" value="<?=$contact['address'];?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Email Address</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputPassword3" value="<?=$contact['emailAddress'];?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <a href="/contacts" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
                            <a href="/contacts/update/<?=$contact['id'];?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            <a href="/contacts/delete/<?=$contact['id'];?>" class="btn btn-default"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End content--> 
        <?php include_once PATH_VIEW . 'includes/footer.php'; ?>