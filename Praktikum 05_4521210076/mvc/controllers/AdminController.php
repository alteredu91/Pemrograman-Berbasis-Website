<?php
class AdminController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'index.php?url=login/index');
            exit;
        }
    }

    public function index() {
        $data['title'] = 'Admin';
        $data['items'] = $this->model('ItemModel')->getAllItems();
        $this->view('templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }

    public function add() {
        $data['title'] = 'Tambah Barang';
        $this->view('templates/header', $data);
        $this->view('admin/add');
        $this->view('templates/footer');
    }

    public function store() {
        if ($this->model('ItemModel')->addItem($_POST) > 0) {
            header('Location: ' . BASEURL . 'index.php?url=admin/index');
        } else {
            echo "Gagal menambahkan data.";
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Barang';
        $data['item'] = $this->model('ItemModel')->getItemById($id);
        $this->view('templates/header', $data);
        $this->view('admin/edit', $data);
        $this->view('templates/footer');
    }

    public function update() {
        if ($this->model('ItemModel')->updateItem($_POST) > 0) {
            header('Location: ' . BASEURL . 'index.php?url=admin/index');
        } else {
            echo "Gagal mengubah data.";
        }
    }

    public function delete($id) {
        if ($this->model('ItemModel')->deleteItem($id) > 0) {
            header('Location: ' . BASEURL . 'index.php?url=admin/index');
        } else {
            echo "Gagal menghapus data.";
        }
    }
}