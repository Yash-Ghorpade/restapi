<?php
    class attendanceinfo
    {
        private $conn;
        private $attendance_name;
        private $info_date;
        private $info_time;
        private $info_srno; 


        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function getAttendanceinfo($info_srno)
        {
            if($info_srno == null)
            {
                $sql = "select * from attendanceinfo;";
            }
            else
            {
                $this->info_srno = $info_srno;
                $sql = "select * from attendanceinfo where info_srno = $this->info_srno;";
            }
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result; 
        }

        public function insertAttendanceinfo($arr)
        {
            $this->info_date = $arr['info_date'];
            $this->info_time = $arr['info_time'];
            $this->attendance_name = $arr['attendance_name'];
            $sql = "INSERT INTO `attendanceinfo` (`info_srno`, `attendance_name`, `info_date`, `info_time`) VALUES (NULL, '$this->attendance_name', '$this->info_date', '$this->info_time');";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            http_response_code(201);
        }
        
        public function updateAttendanceinfo($arr)
        {
            $this->info_srno = $arr['info_srno'];
            $this->info_date = $arr['info_date'];
            $this->info_time = $arr['info_time'];
            $this->attendance_name = $arr['attendance_name'];
            $sql = "update users set attendance_name = '$this->attendance_name', info_date = '$this->info_date', info_time = '$this->info_time' where info_srno = '$this->info_srno';";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            http_response_code(201);
        }
        
        public function deleteAttendanceinfo($info_srno)
        {
            $this->info_srno = $info_srno;
            $sql = "delete from attendanceinfo where info_srno = $this->info_srno;";
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>