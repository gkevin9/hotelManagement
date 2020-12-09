<?php
namespace presentation\kitchen\view;
use domain\kitchen\model as Model;
use domain\kitchen\service as Service;

require_once('../controller/MenuController.php');
require_once('../../../domain/kitchen/model/NewMenuModel.php');
require_once('../../../domain/kitchen/service/MenuService.php');

$ctrl = new NewMenuController();

$menu = $_POST['name'];
$id = $_POST['id'];
$bahan = $_POST['bahan'];

$isValid = $ctrl->validateMenu($menu , $id);

if ($isValid){
    $newMenu = new Model\NewMenuModel();
	$newMenu->setId($_POST['id']);
	$newMenu->setNama($_POST['name']);
	$newMenu->setJenis($_POST['jenis']);
	$newMenu->setHarga(floatval(str_replace(",", "", $_POST['harga'])));

    $service = new Service\MenuService();
    $service->createNew($newMenu , $bahan);

    print "../view/ListMenu.php";
} else {
    print "failed";
}

class NewMenuController {
    public function validateMenu($menu, $id) {
        
        $service = new Service\MenuService();
        $isValidate = $service->validateCredential($menu , $id);
        
        return $isValidate;
    }
}

?>