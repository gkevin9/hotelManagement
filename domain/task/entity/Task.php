<?php
namespace domain\task\entity;
Class Task{
        private $id;
        private $keterangan;
        private $status;

        /**
         * Get the value of id
         */
        public function getId() {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */
        public function setId($id) {
                $this->id = $id;
        }

        /**
         * Get the value of ket_task
         */
        public function getKeterangan() {
                return $this->keterangan;
        }

        /**
         * Set the value of ket_task
         *
         * @return  self
         */
        public function setKeterangan($keterangan) {
                $this->keterangan = $keterangan;
        }

        /**
         * Get the value of status
         */
        public function getStatus() {
                return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */
        public function setStatus($status) {
                $this->status = $status;
        }
}
?>
