<?php
class Guest {
    private $conn;
    private $table_name = "guests";

    public $id;
    public $name;
    public $comment;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Menambahkan data tamu baru
    public function create() {
        $query = "INSERT INTO " .$this->table_name. " SET name=:name, comment=:comment";
        $stmt = $this->conn->prepare($query);

        // Bersihkan data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->comment = htmlspecialchars(strip_tags($this->comment));

        // Bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":comment", $this->comment);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Mengambil semua data tamu
    public function readAll() {
        $query = "SELECT * FROM " .$this->table_name. " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Menghapus data tamu
    public function delete() {
        $query = "DELETE FROM " .$this->table_name. " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Mengupdate data tamu
    public function update() {
        $query = "UPDATE " .$this->table_name. " SET name=:name, comment=:comment WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        // Bersihkan data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->comment = htmlspecialchars(strip_tags($this->comment));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":comment", $this->comment);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>