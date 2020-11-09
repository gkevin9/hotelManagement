<?php
namespace domain\humanresource\service;
$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/humanresource/dao/StaffDao.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/humanresource/model/StaffLoginModel.php";
$tempC = $_SERVER['DOCUMENT_ROOT']."/domain/humanresource/entity/Staff.php";

include $tempA;
include $tempC;

use domain\humanresource\entity as Entity; 
use domain\humanresource\model as Model;
use domain\humanresource\dao as Dao; 

// Menyediakan fungsi sesuai use-case terkait customer.
class StaffService {
    
    // private $dao;

    // function __construct() {
    //     $dao = new Dao\StaffDao();
    //     echo "5.5.6";
    // }

    public function validateCredential(Model\StaffLoginModel $staffLogin) {
        // var_dump(file_exists($_SERVER['DOCUMENT_ROOT']."/domain/humanresource/dao/StaffDao.php"));
        // echo $_SERVER['DOCUMENT_ROOT'];
        //echo getcwd()

        
        $dao = new Dao\StaffDao();
        
        $staff = new Entity\Staff();
        $staff->setEmail($staffLogin->getEmail());
        $staff->setPassword($staffLogin->getPassword());

        $result = $dao->getStaff($staff);

        //true ato false
        return $result;
    }
}
?>