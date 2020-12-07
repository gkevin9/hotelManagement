<?php
namespace domain\guest\dao;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/CustomerStay.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/support/db/DbUtil.php");

use domain\support\db as Db;
use domain\guest\entity as Entity;

class CustomerStayDao {
    public function creatNew(Entity\CustomerStay $customerStay) {
        $conn = Db\DbUtil::getConnection();

        //prepare
        $id = $customerStay->getId();
        $nominalUangMuka = $customerStay->getNominalUangMuka();

        $sql = $conn->prepare("insert into customerStay(id, nominalUangMuka) values(?, ?)");
        $sql->bind_param("ii", $id, $nominalUangMuka);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }

    public function updateWaktuCheckout($id) {
        $conn = Db\DbUtil::getConnection();

        $sql = $conn->prepare("update customerStay set waktuCheckOut = CURRENT_TIMESTAMP where id = ?");
        $sql->bind_param("i", $id);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }
}
?>