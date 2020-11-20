<?php
namespace domain\task\model;

Class NewScheduleModel {
        private $hari;
        private $jamAwal;
        private $jamAkhir;
        private $lokasi;
        private $staff;

        /**
         * Get the value of hari
         */
        public function getHari() {
                return $this->hari;
        }

        /**
         * Set the value of hari
         *
         * @return  self
         */
        public function setHari($hari) {
                $this->hari = $hari;
        }

        /**
         * Get the value of jam awal
         */
        public function getJamAwal() {
                return $this->jamAwal;
        }

        /**
         * Set the value of jam awal
         *
         * @return  self
         */
        public function setJamAwal($jamAwal) {
                $this->jamAwal = $jamAwal;
        }
        
        /**
         * Get the value of jam akhir
         */
        public function getJamAkhir() {
            return $this->jamAkhir;
        }

        /**
         * Set the value of jam awal
         *
         * @return  self
         */
        public function setJamAkhir($jamAkhir) {
                $this->jamAkhir = $jamAkhir;
        }

        /**
         * Get the value of lokasi
         */
        public function getLokasi() {
                return $this->lokasi;
        }

        /**
         * Set the value of lokasi
         *
         * @return  self
         */
        public function setLokasi($lokasi) {
                $this->lokasi = $lokasi;
        }

        /**
         * Get the value of staff
         */
        public function getStaff() {
            return $this->staff;
        }

        /**
         * Set the value of staff
         *
         * @return  self
         */
        public function setStaff($staff) {
                $this->staff = $staff;
        }
}
?>
