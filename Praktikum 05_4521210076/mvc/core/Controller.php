<<<<<<< HEAD
<?php
class Controller {
    public function model($model) {
        require_once 'models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        require_once 'views/' . $view . '.php';
    }
=======
<?php
class Controller {
    public function model($model) {
        require_once 'models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        require_once 'views/' . $view . '.php';
    }
>>>>>>> 2301cd0 (initial commit)
}