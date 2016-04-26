<?php
class View {   
    public static function render($template) {
        $template = str_replace('.', '/', $template);
        include_once VIEWS . $template . '.php';
    }
}
