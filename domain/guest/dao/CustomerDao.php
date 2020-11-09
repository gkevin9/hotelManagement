<?php
namespace domain\guest\dao;
$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/Customer.php";

require_once($tempA);

use domain\guest\entity as Entity;

class CustomerDao {
    public function getAll() {
        $conn = mysqli_connect("localhost", "admin", "admin", "hotel");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "select * from customer";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $listCustomer = array();

        while ($row = mysqli_fetch_array($result)) {
            $customer = new Entity\Customer();
            $customer->setId( $row['id'] );
            $customer->setNama( $row['nama'] );
            $customer->setNomorIdentitas( $row['nomorIdentitas'] );
            $customer->setNomorKendaraan( $row['nomorKendaraan'] );
            $customer->setNomorTelepon( $row['nomorTelepon'] );
            
            array_push($listCustomer, $customer);
        }

        return $listCustomer;
    }

    public function createNew(Entity\Customer $newCustomer) {
        $conn = mysqli_connect("localhost", "admin", "admin", "hotel");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        //prepare
        $id = $newCustomer->getId();
        $nama = $newCustomer->getNama();
        $nomorIdentitas = $newCustomer->getNomorIdentitas();
        $nomorKendaraan = $newCustomer->getNomorKendaraan();
        $nomorTelepon = $newCustomer->getNomorTelepon();

        $sql = $conn->prepare("insert into customer values(?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $id, $nama, $nomorIdentitas, $nomorKendaraan, $nomorTelepon);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }
}
?>