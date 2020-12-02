<?php
namespace domain\kitchen\dao;
$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/entity/Menu.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/support/db/DbUtil.php";

require_once($tempA);
require_once($tempB);

use domain\kitchen\entity as Entity;
use domain\kitchen\model as Model;
use domain\support\db as DbUtil;
use mysqli;

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

    public function getAllDenganBahan() {
        $conn = DbUtil\DbUtil::getConnection();

        $sql = "select menu.id , menu.nama , menu.jenis , menu.harga , bahan.nama 
        from bahan 
        INNER JOIN bahan_menu
        ON bahan.id = bahan_menu.id_bahan 
        INNER JOIN menu
        ON bahan_menu.id_menu = menu.id ORDER BY menu.id";
        
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $listMenu = array();

        $temp = '';

        $count = 0;

        $temp_menu = new Entity\Menu();

        $listBahan = array();

        while ($row = mysqli_fetch_array($result)) {
            
            $menu = new Entity\Menu();
            $menu->setId( $row[0] );
            $menu->setNama( $row[1] );
            $menu->setJenis( $row[2] );
            $menu->setHarga( $row[3] );

            // echo $row[4].$row[0]."<br>";
        
            if ($count == 0){
                echo "A";
                array_push($listBahan,$row[4]);
            } else {
                if ($temp == $row[0]){
                    echo "B";
                    array_push($listBahan,$row[4]);

                    if ((mysqli_num_rows($result) - 1) == $count){
                        echo "C";
                        $menu->setBahan($listBahan);
                        array_push($listMenu , $menu);
                    }
                } else {
                    echo "D";
                    array_push($listBahan,$row[4]);
                    $temp_menu->setBahan($listBahan);
                    $listBahan = array();
    
                    array_push($listMenu , $temp_menu);
                }    
            }
            $temp_menu = $menu;
            $temp = $row[0];
            $count++;
        }
        return $listMenu;
    }

    public function createNew(Entity\Menu $newMenu , $arraybahan) {
        $conn = DbUtil\DbUtil::getConnection();

        //prepare
        $id_menu = $newMenu->getId();
        $nama = $newMenu->getNama();
        $jenis = $newMenu->getJenis();
        $harga = $newMenu->getHarga();
        
        $sql = $conn->prepare("insert into menu values(?, ?, ?, ?)");
        $sql->bind_param("ssss", $id_menu, $nama, $jenis, $harga);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $id_bahan = '';

        $sql = $conn->prepare("insert into bahan_menu values(?, ?)");
        $sql->bind_param("ss", $id_bahan, $id_menu);

        foreach ($arraybahan as $bahan){
           $id_bahan = $bahan;
           if (!$sql->execute()) {
                die(htmlspecialchars($sql->error));
            }
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