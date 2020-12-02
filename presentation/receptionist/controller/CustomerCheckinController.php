<?php
namespace presentation\receptionist\controller;
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/CustomerStayService.php");
use domain\guest\service as Service;

$id = $_GET['id'];

$service = new Service\CustomerStayService();
$service->newCustomerStay($id);

header("Location: ../view/ListReservation.php");
?>