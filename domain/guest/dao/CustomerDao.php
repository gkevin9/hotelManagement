<?php
namespace domain\guest\dao;
$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/Customer.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/support/db/DbUtil.php";

require_once($tempA);
require_once($tempB);

use domain\guest\entity as Entity;
use domain\support\db as Db;

class CustomerDao {
    public function getAll() {
        
        $conn = Db\DbUtil::getConnection();
        
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
        $conn = Db\DbUtil::getConnection();

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