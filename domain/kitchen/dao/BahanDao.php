<?php
namespace domain\kitchen\dao;
$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/entity/Bahan.php";

require_once($tempA);

use domain\kitchen\entity as Entity;
use domain\kitchen\model as Model;
use domain\support\db\DbUtil;

class BahanDao {
    public function getAll() {
        $conn = DbUtil::getConnection();

        $sql = "select * from bahan";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $listBahan = array();

        while ($row = mysqli_fetch_array($result)) {
            $bahan = new Entity\Bahan();
            $bahan->setId( $row['id'] );
            $bahan->setNama( $row['nama'] );
            $bahan->setJumlah( $row['jumlah'] );
            $bahan->setHarga( $row['harga'] );
            $bahan->setExp_date( $row['exp_date'] );
            
            array_push($listBahan, $bahan);
        }

        return $listBahan;
    }

    public function createNew(Entity\Bahan $newBahan) {
        $conn = DbUtil::getConnection();

        //prepare
        $id = $newBahan->getId();
        $nama = $newBahan->getNama();
        $jumlah = $newBahan->getJumlah();
        $harga = $newBahan->getHarga();
        $exp_date = $newBahan->getExp_date();

        $sql = $conn->prepare("insert into bahan values(?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $id, $nama, $jumlah, $harga, $exp_date);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }

    public function updateBahan(Entity\Bahan $Bahan , Model\NewBahanModel $BahanNew) {
        $conn = DbUtil::getConnection();

        //prepare
        $id = $Bahan->getId();

        $new_nama = $BahanNew->getNama();
        $new_jumlah = $BahanNew->getJumlah();
        $new_harga = $BahanNew->getHarga();
        $new_exp_date = $BahanNew->getExp_date();

        $sql = $conn->prepare("update Bahan SET nama = ' ".$new_nama." ' , jumlah = ' ".$new_jumlah." ' , harga = ' ".$new_harga." ' , exp_date = ' ".$new_exp_date." ' WHERE id=".$id."'");
        $sql->bind_param("ssss", $nama, $jumlah, $harga, $exp_date);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }
}
?>