<?php
require_once '../app/core/DB.php';
class sinhvienModel
{
    private $conn;
    public function __construct()
    {
        $this->conn = ConnectDB::Connect();
    }

    public function getAllSinhvien()
    {
        $query = "SELECT * FROM sinhvien";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSinhvienById($id)
    {
        $query = "SELECT * FROM sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createSinhvien($mssv, $hoten, $gioitinh)
    {
        $query = "INSERT INTO sinhvien (mssv, hoten, gioitinh) VALUES (:mssv, :hoten, :gioitinh)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        return $stmt->execute();
    }

    public function updateSinhvien($id, $mssv, $hoten, $gioitinh)
    {
        $query = "UPDATE sinhvien SET mssv = :mssv, hoten = :hoten, gioitinh = :gioitinh WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteSinhvien($id)
    {
        $query = "DELETE FROM sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getPagingSinhVien($limit, $offset, $search = '')
    {
        $query = "SELECT * FROM sinhvien WHERE hoten LIKE :search LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $searchParam = '%' . $search . '%';
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $totalQuery = "SELECT COUNT(*) as total FROM sinhvien WHERE hoten LIKE :search";
        $totalStmt = $this->conn->prepare($totalQuery);
        $totalStmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        $totalStmt->execute();
        $total = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];
        return ['data' => $result, 'total' => $total];
    }
}
