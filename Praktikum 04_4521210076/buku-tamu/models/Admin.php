<?php
class Admin {
    private $conn;
    private $table_name = "admins";

    public $id;
    public $username;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fungsi login admin
    public function login() {
        $query = "SELECT * FROM " .$this->table_name. " WHERE username = :username LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        // Bersihkan data
        $this->username = htmlspecialchars(strip_tags($this->username));

        // Bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            if(password_verify($this->password, $row['password'])) {
                $this->id = $row['id'];
                return true;
            }
        }
        return false;
    }
}
?>