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

    public function createSinhvien($mssv, $hoten, $gioitinh, $malop = '')
    {
        $query = "INSERT INTO sinhvien (mssv, hoten, gioitinh, malop) VALUES (:mssv, :hoten, :gioitinh, :malop)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':malop', $malop);
        return $stmt->execute();
    }

    public function updateSinhvien($id, $mssv, $hoten, $gioitinh, $malop = '')
    {
        $query = "UPDATE sinhvien SET mssv = :mssv, hoten = :hoten, gioitinh = :gioitinh, malop = :malop WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':malop', $malop);
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

    public function getPagingSinhVien($limit, $offset, $search = '', $orderBy = '', $orderDir = 'ASC')
    {
        $allowed = ['mssv', 'hoten', 'malop', 'id'];
        $orderBySql = 'id';
        if (in_array(strtolower($orderBy), $allowed)) {
            $orderBySql = strtolower($orderBy);
        }
        $orderDir = strtoupper($orderDir) === 'DESC' ? 'DESC' : 'ASC';

        $query = "SELECT * FROM sinhvien WHERE (hoten LIKE :search OR mssv LIKE :search OR malop LIKE :search) ORDER BY " . $orderBySql . " " . $orderDir . " LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $searchParam = '%' . $search . '%';
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $totalQuery = "SELECT COUNT(*) as total FROM sinhvien WHERE (hoten LIKE :search OR mssv LIKE :search OR malop LIKE :search)";
        $totalStmt = $this->conn->prepare($totalQuery);
        $totalStmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        $totalStmt->execute();
        $total = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];
        return ['data' => $result, 'total' => $total];
    }
}
