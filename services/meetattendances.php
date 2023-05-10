
<?php
    class meetingattendances
    {
        private $conn;
        private $user_srno;
        private $meeting_srno;
        private $meet_srno; 


        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function getMeetattendance($meet_srno)
        {
            if($meet_srno == null)
            {
                $sql = "select * from meetattendances;";
            }
            else
            {
                $this->meet_srno = $meet_srno;
                $sql = "select * from meetattendances where meet_srno = $this->meet_srno;";
            }
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result; 
        }

        public function insertMeetattendance($arr)
        {
            $this->meet_srno = $arr['meet_srno'];
            $this->meeting_srno = $arr['meeting_srno'];
            $this->user_srno = $arr['user_srno'];
            $sql = "INSERT INTO `meetattendances` (`meet_srno`, `meeting_srno`, `user_srno`) VALUES (NULL, '$this->meeting_srno', '$this->user_srno');";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            http_response_code(201);
        }
        
        public function updateMeetattendance($arr)
        {
            $this->meet_srno = $arr['meet_srno'];
            $this->meeting_srno = $arr['meeting_srno'];
            $this->user_srno = $arr['user_srno'];
            $sql = "update users set meeting_srno = '$this->meeting_srno', user_srno = '$this->user_srno' where meet_srno = '$this->meet_srno';";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            http_response_code(201);
        }
        
        public function deleteMeetattendance($meet_srno)
        {
            $this->meet_srno = $meet_srno;
            $sql = "delete from meetattendances where meet_srno = $this->meet_srno;";
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>