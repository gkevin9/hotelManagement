<?php 
namespace domain\support\db;
class DbUtil {
    private static $conn;

    private static function openNewConnection() {
        $c = mysqli_connect("localhost", "admin", "admin", "hotel");
        // Check connection
        if (!$c) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $c;
    }

    public static function getConnection() {
        if (self::$conn == null) {
            self::$conn = self::openNewConnection();
        }

        return self::$conn;
    }
}
?>