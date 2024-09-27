<?php
include_once 'config/Database.php';
include_once 'models/Guest.php';

class GuestController {
    private $guest;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->guest = new Guest($db);
    }

    // Fungsi untuk menambahkan tamu baru
    public function create($name, $comment) {
        $this->guest->name = $name;
        $this->guest->comment = $comment;
        return $this->guest->create();
    }

    // Fungsi untuk mendapatkan semua data tamu
    public function readAll() {
        return $this->guest->readAll();
    }

    // Fungsi untuk menghapus tamu
    public function delete($id) {
        $this->guest->id = $id;
        return $this->guest->delete();
    }

    // Fungsi untuk mengupdate tamu
    public function update($id, $name, $comment) {
        $this->guest->id = $id;
        $this->guest->name = $name;
        $this->guest->comment = $comment;
        return $this->guest->update();
    }
}
?>