<?php
trait ManagePriceTrait {
    
    protected $db;
    
    public function addPrice($period, $price) {
        try {
            $query = "INSERT INTO tarif (period, price) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$period, $price]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function editPrice($tarif_id, $period, $price) {
        try {
            $query = "UPDATE tarif SET period = ?, price = ? WHERE tarif_id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$period, $price, $tarif_id]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deletePrice($tarif_id) {
        try {
            $query = "DELETE FROM tarif WHERE tarif_id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$tarif_id]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

class ManagePrice {
    use ManagePriceTrait;
    private array $listPrices;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

}



?>