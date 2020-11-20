<?php
namespace domain\kitchen\service;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/dao/MenuDao.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/entity/Menu.php";
$tempC = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/model/NewMenuModel.php";

require_once($tempA);
require_once($tempB);
require_once($tempC);

use domain\kitchen\dao as Dao;
use domain\kitchen\entity as Entity;
use domain\kitchen\model as Model;

class MenuService {
  public function getAllMenu(){
    $dao = new Dao\MenuDao();
    $listMenu= $dao->getAll();

    return $listMenu;
  }

  public function createNew(Model\NewMenuModel $menuModel) {
    $menu = new Entity\Menu();
    $menu->setId($menuModel->getId());
    $menu->setNama($menuModel->getNama());
    $menu->setJenis($menuModel->getNama());
    $menu->setHarga($menuModel->getHarga());
    
    $dao = new Dao\MenuDao();
    $dao->createNew($menu);
  }

  public function validateCredential($menu , $id) {

    $dao = new Dao\MenuDao();
    $result = $dao->getIDMenu($menu,$id);

    //true ato false
    return $result;
}
}
?>
