<?php

class Controller {

    private $layouts_path;
    private $partials_path;
    private $pages_path;
    private $engine;
    
    public function __construct() {
        $this->views_path = __DIR__ . "/../views";
        $this->layouts_path = "{$this->views_path}/layouts";
        $this->pages_path = "{$this->views_path}/pages";
        $this->partials_path = "{$this->views_path}/partials";

        $this->engine = new Mustache_Engine([
            'loader'            => new Mustache_Loader_FilesystemLoader($this->views_path, array('extension' => '.html')),
            'partials_loader'   => new Mustache_Loader_FilesystemLoader($this->partials_path, array('extension' => '.html'))
        ]);
    }
    
    public function render_view($view, $pageTitle, $data = [], $layout = "layouts/default") {
        
        $page = $this->engine->render($view, $data);

        return $this->engine->render($layout, [
            "pageTitle" => $pageTitle,
            "page"      => $page
        ]);
    }

    public function render_json($data) {
        
        $page = $this->engine->render($view, $data);

        return $this->engine->render($layout, [
            "pageTitle" => $pageTitle,
            "page"      => $page
        ]);
    }

}