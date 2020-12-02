<?php
namespace presentation\kitchen\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/service/MenuService.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/model/NewMenuModel.php";

require_once($tempA);
require_once($tempB);

use domain\kitchen\service as Service;
use domain\kitchen\model as Model;

class MenuController {
    public function getAll() {
        $service = new Service\MenuService();
        $listMenu = $service->getAllMenu();
        return $listMenu;
    }

    public function createNew (Model\NewMenuModel $newMenu , $bahan){
        
        $service = new Service\MenuService();
        $service->createNew($newMenu , $bahan);
    }
}

?>