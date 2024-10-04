<?php
class ItemModel {
    private $table = 'items';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllItems() {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function addItem($data) {
        $query = "INSERT INTO " . $this->table . " (nama, stok, harga) VALUES (:nama, :stok, :harga)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('harga', $data['harga']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getItemById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateItem($data) {
        $query = "UPDATE " . $this->table . " SET nama = :nama, stok = :stok, harga = :harga WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteItem($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}