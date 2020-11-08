<?php
namespace domain\humanresource\service;

include "../model/StaffLoginModel.php";
include '../dao/StaffDao.php';
include '../entity/Staff.php';

use domain\humanresource\entity as Entity; 
use domain\humanresource\dao as Dao; 
use domain\humanresource\model as Model;

// Menyediakan fungsi sesuai use-case terkait customer.
class StaffService {
    
    // private $dao;

    // function __construct() {
    //     $dao = new Dao\StaffDao();
    //     echo "5.5.6";
    // }

    public function validateCredential(Model\StaffLoginModel $staffLogin)
    {
        echo "5.5.6";
        $dao = new Dao\StaffDao();
        echo "5.5.7";
        $staff = new Entity\Staff();
        $staff->setEmail($staffLogin->email);
        $staff->setPassword($staffLogin->password);

        $result = $dao->get($staff);

        //true ato false
        return $result;
    }
}
?>