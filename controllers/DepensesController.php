<?php

class DepensesController extends Controller {

    public function getDetails($urlParams) {
        if (isset($urlParams["query"]["id"])) {
            $id = $urlParams["query"]["id"];
            $Depense = new DepenseModel();
            $Depense->hydrate($id);
            
            echo $this->render_view('testVariables', 'Test Variables', [ "activity" => $Depense ], "layouts/dev");
        }

        echo $this->render_view('testVariables', 'Test Variables', [ ], "layouts/dev");
    }

    public function getList($urlParams) {
        $Depense = new DepenseModel();
        $Depenses = $Depense->findAll();
        
        echo $this->render_view('testVariables', 'Test Variables', [ "activities" => $Depenses ], "layouts/dev");
    }

    public function postEdit($urlParams, $post) {
        if (isset($post["id"])) {
            $id = $post["id"];
            $Depense = new DepenseModel();
            $Depense->hydrate($id);
    
            foreach($post as $colonne => $value) {
                if ($colonne !== "id") {
                    $setter = "set" . ucfirst($colonne);
                    $Depense->{$setter}($value);
                }
            }
            
            echo $this->render_view('testVariables', 'Test Variables', [ "activity" => $Depense ], "layouts/dev");
        }

        echo $this->render_view('testVariables', 'Test Variables', [ "activity" => $Depense ], "layouts/dev");
    }

}