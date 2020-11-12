<?php 
class DbUtil {
    private static $conn;

    public static getConnection() {
        if ($this->conn == null) {
            $this->conn = openNewConnection();
        }

        return $this->conn;
    }

    private static openNewConnection() {
        $c = mysqli_connect("localhost", "admin", "admin", "hotel");
        // Check connection
        if (!$c) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $c;
    }
}
?>