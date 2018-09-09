<?php

class Controller {

    private $layouts_path;
    private $partials_path;
    private $pages_path;
    private $engine;
    
    public function __construct() {
        $this->layouts_path = __DIR__ . "/../views/layouts/";
        $this->partials_path = __DIR__ . "/../views/partials/";
        $this->pages_path = __DIR__ . "/../views/pages/";
    }
    
    public function render_view($view, $pageTitle, $data = []) {
        $layout = file_get_contents($this->layouts_path . "default.mustache");
        $head = file_get_contents($this->partials_path . "head.mustache");
        $header = file_get_contents($this->partials_path . "header.mustache");
        $footer = file_get_contents($this->partials_path . "footer.mustache");
        $page = file_get_contents($this->pages_path . $view . ".mustache");
        $partials = [
            "head" =>$head,
            "header" =>$header,
            "footer" =>$footer
        ];
        
        $this->engine = new Mustache_Engine([
            'partials' => $partials
        ]);
        
        $page = $this->engine->render($page, $data);

        return $this->engine->render($layout, [
            "pageTitle" => $pageTitle,
            "page" => $page
        ]);
    }

}