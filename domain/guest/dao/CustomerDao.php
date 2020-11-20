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
        $nama = $newCustomer->getNama();
        $nomorIdentitas = $newCustomer->getNomorIdentitas();
        $nomorKendaraan = $newCustomer->getNomorKendaraan();
        $nomorTelepon = $newCustomer->getNomorTelepon();

        $sql = $conn->prepare("insert into customer values(?, ?, ?, ?)");
        $sql->bind_param("ssss", $nama, $nomorIdentitas, $nomorKendaraan, $nomorTelepon);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }

    public function getSelectedCustomer($ktp) {
        $conn = Db\DbUtil::getConnection();
        
        $sql = $conn->prepare("select * from customer where nomorIdentitas = ?");
        $sql->bind_param("s", $ktp);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        if (!($res = $sql->get_result())) {
            echo "Getting result set failed: (" . $sql->errno . ") " . $sql->error;
        }
        
        $tempCustomer = $res->fetch_assoc();
        $customer = new Entity\Customer();
        $customer->setNama($tempCustomer['nama']);
        $customer->setNomorIdentitas($tempCustomer['nomorIdentitas']);
        $customer->setNomorKendaraan($tempCustomer['nomorKendaraan']);
        $customer->setNomorTelepon($tempCustomer['nomorTelepon']);

        return $customer;
    }

    public function update(Entity\Customer $customer) {
        $conn = Db\DbUtil::getConnection();

        //prepare
        // echo var_dump($customer);
        $nama = $customer->getNama();
        $nomorIdentitas = $customer->getNomorIdentitas();
        $nomorKendaraan = $customer->getNomorKendaraan();
        $nomorTelepon = $customer->getNomorTelepon();

        $sql = $conn->prepare("update customer set nama= ?, nomorKendaraan = ?, nomorTelepon = ? where nomorIdentitas = ?");
        $sql->bind_param("ssss", $nama, $nomorKendaraan, $nomorTelepon, $nomorIdentitas);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }
}
?>