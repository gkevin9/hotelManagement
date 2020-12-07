<?php
namespace domain\guest\dao;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/support/db/DbUtil.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/Bill.php");

use domain\support\db as Db;
use domain\guest\entity as Entity;

class BillDao {
    public function getFromId($id) {
        $conn = Db\DbUtil::getConnection();
        
        $sql = $conn->prepare("select * from bill where custStay = ?");
        $sql->bind_param("s", $id);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        if (!($res = $sql->get_result())) {
            echo "Getting result set failed: (" . $sql->errno . ") " . $sql->error;
        }

        $arrayBill = array();

        while($row = $res->fetch_assoc()) {
            $bill = new Entity\Bill()    ;
            $bill->setAmount($row['amount']);
            $bill->setDeskripsi($row['deskripsi']);
            $bill->setQuantity($row['quantity']);
            $bill->setDocno($row['docNo']);

            array_push($arrayBill, $bill);
        }

        return $arrayBill;
    }

    public function createNew(Entity\Bill $bill) {
        $conn = Db\DbUtil::getConnection();
        
        //prepare
        $amount = $bill->getAmount();
        $custStay = $bill->getCustStay();
        $deskripsi = $bill->getDeskripsi();
        $quantity = $bill->getQuantity();

        $sql = $conn->prepare("insert into bill(amount, custStay, deskripsi, quantity) values(?, ?, ?, ?)");
        $sql->bind_param("iisi", $amount, $custStay, $deskripsi, $quantity);

        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }
    }
}
?>