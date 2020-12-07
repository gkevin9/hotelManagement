<?php
namespace domain\guest\dao;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/support/db/DbUtil.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/Payment.php");

use domain\support\db as Db;
use domain\guest\entity as Entity;

class PaymentDao {

    public function createNew(Entity\Payment $payment) {
        $conn = Db\DbUtil::getConnection();
        
        //prepare
        $jumlah = $payment->getJumlah();
        $kasir = $payment->getKasir();
        $metode = $payment->getMetode();
        $bill = $payment->getBill();
        $tgl = $payment->getTanggal();

        $sql = $conn->prepare("insert into payment(jumlah, kasir, metode, tanggal, bill) values(?, ?, ?, ?, ?)");
        $sql->bind_param("isssi", $jumlah, $kasir, $metode, $tgl, $bill);

        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }
    }
}
?>