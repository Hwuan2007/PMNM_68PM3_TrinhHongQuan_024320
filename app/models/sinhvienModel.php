<?php
    require_once '../app/core/DB.php';
    class sinhvienModel {
        private $conn;
        public function __construct() {
            $this -> conn = ConnectDB::Connect();
        }

        public function getAllSinhvien() {
            $query = "SELECT * FROM sinhvien";
            $stmt = $this -> conn -> prepare($query);
            $stmt -> execute();
            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }

             public function getSinhvienById($id) {
            $query = "SELECT * FROM sinhvien WHERE id = :id";
            $stmt = $this -> conn -> prepare($query);
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetch(PDO::FETCH_ASSOC);
        }

        public function createSinhvien($mssv, $hoten, $gioitinh) {
            $query = "INSERT INTO sinhvien (mssv, hoten, gioitinh) VALUES (:mssv, :hoten, :gioitinh)";
            $stmt = $this -> conn -> prepare($query);
            $stmt -> bindParam(':mssv', $mssv);
            $stmt -> bindParam(':hoten', $hoten);
            $stmt -> bindParam(':gioitinh', $gioitinh);
            return $stmt -> execute();
        }
    }
?>