
        <!--Begin nav-->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <!-- Begin .nav-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><?=$applicationName;?></a>
                </div>
                <!-- End .nav-header -->
                <!-- Begin .nav-collapse -->
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li<?php if ($pageName == 'Home'):?> class="active"<?php endif;?>><a href="/">Home</a></li>
                        <li<?php if ($pageName == 'Contacts'):?> class="active"<?php endif;?>><a href="/contacts">Contacts</a></li>
                    </ul>
                </div>
                <!-- End .nav-collapse -->
            </div>
        </nav> 
        <!-- End .nav -->