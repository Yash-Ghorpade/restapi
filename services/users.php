
<?php
    class users
    {
        private $conn;
        private $user_srno;
        private $name;
        private $contact;
        private $email;
        private $face_value;
        private $user_role; 


        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function getUser($user_srno)
        {
            if($user_srno == null)
            {
                $sql = "select * from users;";
            }
            else
            {
                $this->user_srno = $user_srno;
                $sql = "select * from users where user_srno = $this->user_srno;";
            }
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result; 
        }

        public function insertUser($arr)
        {
            $this->name = $arr['name'];
            $this->contact = $arr['contact'];
            $this->email = $arr['email'];
            $this->face_value = $arr['face_value'];
            $this->user_role = $arr['user_role'];
            $sql = "INSERT INTO `users` (`user_srno`, `contact`, `email`, `face_value`, `user_role`, `name`) VALUES (NULL, '$this->contact', '$this->email', '$this->face_value', '$this->user_role', '$this->name');";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            http_response_code(201);
        }
        
        public function updateUser($arr)
        {
            $this->user_srno = $arr['user_srno'];
            $this->name = $arr['name'];
            $this->contact = $arr['contact'];
            $this->email = $arr['email'];
            $this->face_value = $arr['face_value'];
            $this->user_role = $arr['user_role'];
            $sql = "update users set name = '$this->name', contact = '$this->contact', email = '$this->email', face_value = '$this->face_value', user_role = '$this->user_role' where user_srno = '$this->user_srno';";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            http_response_code(201);
        }
        
        public function deleteUser($user_srno)
        {
            $this->user_srno = $user_srno;
            $sql = "delete from users where user_srno = $this->user_srno;";
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>