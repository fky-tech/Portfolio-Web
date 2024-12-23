<?php

require_once 'db.php';

class User extends DB {
    public function login($userName, $password) {
        $this->connect();
    
        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $userName);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if($row = $result->fetch_assoc()) {
          // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          $pwdCheck = password_verify($password, $row['password']);

          // echo $hashedPwd . "<br>";
          // echo $row['password'];
    
          if($pwdCheck) {
            $stmt->close();
            $this->closeConnection();
            return true;
          }
        }
        
        $stmt->close();
        $this->closeConnection();
        return false;
    } 
}

?>