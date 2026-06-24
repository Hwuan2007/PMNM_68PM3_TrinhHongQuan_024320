<?php
require_once '../app/core/DB.php';
class lophocModel
{
    private $conn;
    public function __construct()
    {
        $this->conn = ConnectDB::Connect();
    }

    public function getAllLopHoc()
    {
        $query = "SELECT * FROM lophoc";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLopHocById($id)
    {
        $query = "SELECT * FROM lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createLopHoc($malop, $tenlop, $ghichu)
    {
        $query = "INSERT INTO lophoc (malop, tenlop, ghichu) VALUES (:malop, :tenlop, :ghichu)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $malop);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':ghichu', $ghichu);
        return $stmt->execute();
    }

    public function updateLopHoc($id, $malop, $tenlop, $ghichu)
    {
        $query = "UPDATE lophoc SET malop = :malop, tenlop = :tenlop, ghichu = :ghichu WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $malop);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':ghichu', $ghichu);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteLopHoc($id)
    {
        $query = "DELETE FROM lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getPagingLopHoc($limit, $offset, $search = '')
    {
        $query = "SELECT * FROM lophoc WHERE tenlop LIKE :search LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $searchParam = '%' . $search . '%';
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $totalQuery = "SELECT COUNT(*) as total FROM lophoc WHERE tenlop LIKE :search";
        $totalStmt = $this->conn->prepare($totalQuery);
        $totalStmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        $totalStmt->execute();
        $total = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];
        return ['data' => $result, 'total' => $total];
    }
}
