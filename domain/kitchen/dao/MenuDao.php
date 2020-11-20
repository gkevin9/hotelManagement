<?php
namespace domain\kitchen\dao;
$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/entity/Menu.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/support/db/DbUtil.php";

require_once($tempA);
require_once($tempB);

use domain\kitchen\entity as Entity;
use domain\kitchen\model as Model;
use domain\support\db as DbUtil;

class MenuDao {
    public function getAll() {
        $conn = DbUtil\DbUtil::getConnection();

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
        $conn = DbUtil\DbUtil::getConnection();

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

    public function getIDMenu($menu , $id) {
 
        $conn = DbUtil\DbUtil::getConnection();

        //taro di variable
        $sql = $conn->prepare("select * from menu where nama = ? or id = ?");
        $sql->bind_param("ss", $menu , $id);
        
        // $sql->execute();

        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        if (!($res = $sql->get_result())) {
            echo "Getting result set failed: (" . $sql->errno . ") " . $sql->error;
        }
        $count = count($res->fetch_all());
        $res->close();
        
        if ($count > 0) {
            return False;
        }else {
            return True;
        }
    }
}
?>