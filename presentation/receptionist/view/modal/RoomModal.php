<?php
$temp = $_SERVER['DOCUMENT_ROOT'].'/presentation/receptionist/controller/RoomController.php';
include_once($temp);

use presentation\receptionist\controller as Ctrl;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$ctrl = new Ctrl\RoomController();
$listKamar = $ctrl->getUnusedRoom();
?>
<div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choose Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Standard</h5>
                <div class="row row-cols-1 row-cols-md-3">
                    <?php
                    foreach ($listKamar as $kamar) {
                        $jenisKamar = $kamar->getKategori();
                        if($jenisKamar->getNama() == "standard") {
                            echo '<div class="col mb-2">
                                <div class="card h-100 w-50 text-center">
                                <div class="card-body">';
                            echo '<h5 class="card-title">'.$kamar->getNoKamar().'</h5>';
                            echo '<p class="card-text">';
                            echo '<input type="radio" name="radioRoom" value="'.$kamar->getNoKamar().'">';
                            echo '</p></div></div></div>';
                        }
                    }
                    ?>
                </div>
                <hr>
                <h5>Deluxe</h5>
                <div class="row row-cols-1 row-cols-md-3">
                    <?php
                    foreach ($listKamar as $kamar) {
                        $jenisKamar = $kamar->getKategori();
                        if($jenisKamar->getNama() == "deluxe") {
                            echo '<div class="col mb-2">
                                <div class="card h-100 w-50 text-center">
                                <div class="card-body">';
                            echo '<h5 class="card-title">'.$kamar->getNoKamar().'</h5>';
                            echo '<p class="card-text">';
                            echo '<input type="radio" name="radioRoom" value="'.$kamar->getNoKamar().'">';
                            echo '</p></div></div></div>';
                        }
                    }
                    ?>
                </div>
                <hr>
                <h5>Suite</h5>
                <div class="row row-cols-1 row-cols-md-3">
                    <?php
                    foreach ($listKamar as $kamar) {
                        $jenisKamar = $kamar->getKategori();
                        if($jenisKamar->getNama() == "suite") {
                            echo '<div class="col mb-2">
                                <div class="card h-100 w-50 text-center">
                                <div class="card-body">';
                            echo '<h5 class="card-title">'.$kamar->getNoKamar().'</h5>';
                            echo '<p class="card-text">';
                            echo '<input type="radio" name="radioRoom" value="'.$kamar->getNoKamar().'">';
                            echo '</p></div></div></div>';
                        }
                    }
                    ?>
                </div>
                <hr>
                <h5>President</h5>
                <div class="row row-cols-1 row-cols-md-3">
                    <?php
                    foreach ($listKamar as $kamar) {
                        $jenisKamar = $kamar->getKategori();
                        if($jenisKamar->getNama() == "president") {
                            echo '<div class="col mb-2">
                                <div class="card h-100 w-50 text-center">
                                <div class="card-body">';
                            echo '<h5 class="card-title">'.$kamar->getNoKamar().'</h5>';
                            echo '<p class="card-text">';
                            echo '<input type="radio" name="radioRoom" value="'.$kamar->getNoKamar().'">';
                            echo '</p></div></div></div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="chooseRoom">Choose</button>
            </div>
        </div>
    </div>
</div>