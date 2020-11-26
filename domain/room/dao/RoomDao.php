<?php
namespace domain\room\dao;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/support/db/DbUtil.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/room/entity/Kamar.php";
$tempC = $_SERVER['DOCUMENT_ROOT']."/domain/room/entity/KategoriKamar.php";

require_once($tempA);
require_once($tempB);
require_once($tempC);

use domain\support\db as Db;
use domain\room\entity as Entity;

class RoomDao {
    public function getRooms() {
        $conn = Db\DbUtil::getConnection();

        $sql = "select * from kamar inner join kategoriKamar on kamar.kategori = kategoriKamar.id";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $listKamar = array();
        
        while ($row = mysqli_fetch_array($result)) {
            // echo var_dump($row);
            $kategori = new Entity\KategoriKamar();
            $kategori->setId($row[1]);
            $kategori->setNama($row['nama']);
            
            $kamar = new Entity\Kamar();
            $kamar->setHarga($row['harga']);
            $kamar->setKategori($kategori);
            $kamar->setNoKamar($row['nomor_kamar']);
            $kamar->setStatus($row['status']);
            $kamar->setJmlhOrg($row['jumlah_orang']);
            
            array_push($listKamar, $kamar);
        }

        return $listKamar;
    }
}
?>