<?php
namespace domain\kitchen\dao;
$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/kicthen/entity/Menu.php";

require_once($tempA);

use domain\kitchen\entity as Entity;
use domain\support\db\DbUtil;

class MenuDao {
    public function getAll() {
        $conn = DbUtil::getConnection();

        $sql = "select * from menu";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $listMenu = array();

        while ($row = mysqli_fetch_array($result)) {
            $menu = new Entity\Menu();
            $menu->setId( $row['id'] );
            $menu->setNama( $row['nama'] );
            $menu->setJenis( $row['jenis'] );
            $menu->setHarga( $row['harga'] );
            
            array_push($listMenu, $menu);
        }

        return $listMenu;
    }

    public function createNew(Entity\Menu $newMenu) {
        $conn = DbUtil::getConnection();

        //prepare
        $id = $newMenu->getId();
        $nama = $newMenu->getNama();
        $jenis = $newMenu->getJenis();
        $harga = $newMenu->getHarga();
        
        $sql = $conn->prepare("insert into menu values(?, ?, ?, ?)");
        $sql->bind_param("ssss", $id, $nama, $jenis, $harga);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }
}
?>