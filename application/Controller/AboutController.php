<?php

namespace Controller;

use Summer\View;

class AboutController {

    public function index() {
        View::render('includes.header');
        View::render('about');
        View::render('includes.footer');
    }

}
