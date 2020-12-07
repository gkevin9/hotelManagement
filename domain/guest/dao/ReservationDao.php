<?php
namespace domain\guest\dao;
$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/Reservation.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/support/db/DbUtil.php";

require_once($tempA);
require_once($tempB);

use domain\guest\entity as Entity;
use domain\support\db as Db;

class ReservationDao {
    public function getAll() {
        
        $conn = Db\DbUtil::getConnection();
        
        $sql = "select * from reservation";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $listReservation = array();

        while ($row = mysqli_fetch_array($result)) {
            $reservation = new Entity\Reservation();
            $reservation->setId( $row['id'] );
            $reservation->setBykOrang( $row['bykOrang'] );
            $reservation->setKamar( $row['kamar'] );
            $reservation->setLama( $row['lama'] );
            $reservation->setNama( $row['nama'] );
            $reservation->setNamaPemesan( $row['namaPemesan'] );
            $reservation->setNomorTelepon( $row['nomorTelepon'] );
            $reservation->setStatus( $row['status'] );
            $reservation->setTanggalCheckIn( $row['tanggalCheckin'] );
            
            array_push($listReservation, $reservation);
        }
        
        return $listReservation;
    }

    public function createNew(Entity\Reservation $newReservation) {
        $conn = Db\DbUtil::getConnection();

        //prepare
        $bykOrang = $newReservation->getBykOrang();
        $kamar = $newReservation->getKamar();
        $lama = $newReservation->getLama();
        $namaPemesan = $newReservation->getNamaPemesan();
        $nama = $newReservation->getNama();
        $nomorTelepon = $newReservation->getNomorTelepon();
        $status = 'ACTIVE';
        $tglCheckin = $newReservation->getTanggalCheckIn();

        $sql = $conn->prepare("insert into reservation(
            bykOrang, 
            kamar, 
            lama, 
            nama, 
            namaPemesan, 
            nomorTelepon, 
            status, 
            tanggalcheckin) 
            values(?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("iiisssss", $bykOrang, $kamar, $lama, $nama, $namaPemesan, $nomorTelepon, $status, $tglCheckin);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }

    public function getSelectedReservationWithRoom($id) {
        $conn = Db\DbUtil::getConnection();
        
        $sql = "select * from reservation r inner join kamar k on r.kamar = k.nomor_kamar where r.id = $id";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $row = mysqli_fetch_array($result);
        $harga = $row['harga'];

        return $harga;
    }

    public function getSelectedReservationWithLama($id) {
        $conn = Db\DbUtil::getConnection();
        
        $sql = "select * from reservation r where r.id = $id";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $row = mysqli_fetch_array($result);
        $lama = $row['lama'];

        return $lama;
    }

    public function changeReservationStatus($id) {
        $conn = Db\DbUtil::getConnection();
        $sql = "update reservation set status='DONE' where id=$id";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }

    public function getAllWithCustomerStay() {
        
        $conn = Db\DbUtil::getConnection();
        
        $sql = "select * from reservation inner join customerStay on reservation.id = customerStay.id";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $list = array();

        while ($row = mysqli_fetch_array($result)) {
            $array = array();
            $array['id'] = $row['id'];
            $array['custId'] = $row['nama'];
            $array['custName'] = $row['namaPemesan'];
            $array['orang'] = $row['bykOrang'];
            $array['checkin'] = $row['tanggalCheckin'];
            $array['lama'] = $row['lama'];
            $array['room'] = $row['kamar'];
            $array['hp'] = $row['nomorTelepon'];
            $array['waktuCheckOut'] = $row['waktuCheckOut'];
            $array['status'] = $row['status'];

            array_push($list, $array);
        }
        
        return $list;
    }
}
?>