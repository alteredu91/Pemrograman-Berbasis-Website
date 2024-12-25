<<<<<<< HEAD
<?php
class HomeController extends Controller {
    public function index() {
        $data['title'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
=======
<?php
class HomeController extends Controller {
    public function index() {
        $data['title'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
>>>>>>> 2301cd0 (initial commit)
}