<?php 
class lab2 {
   protected $conn;
   
   public function __construct ($conn) {
       $this->conn = $conn;
   } 
   
   public function search ($q) {
       $sql = 'select * from info344chat';
       $stmt = $this->conn->prepare ($sql);
       $success = $stmt->execute (array($q, $q));
       if (!$success) {
           trigger_error ($stmt->errorInfo());
           return false;
       } else {
           return $stmt->fetchAll ();
       }
   }
}

function getConnection () {
    
    try {
       $conn = new PDO ("mysql:host={$dbHost}; dbname={$dbDatabase}", $dbUser, $dbPassword);
       
       return $conn;
       
    } catch (PDOException $e) {
        die('Could not connect to database ' . $e);
    }
}

require_once 'connection.php';

$q = $_GET['q'];

$conn = getConnection ();
$chatModel = new info344chat ($conn);
$matches = $chatModel->search ($q);

?>

