
<?php
    class subevents
    {
        private $conn;	
        private $subevent_name;	
        private $subevent_date;	
        private $subevent_time;	
        private $subevent_location;	
        private $subevent_fee;	
        private $subevent_status;
        private $event_srno; 
        private $subevent_srno; 


        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function getSubevent($subevent_srno)
        {
            if($subevent_srno == null)
            {
                $sql = "select * from subevents;";
            }
            else
            {
                $this->subevent_srno = $subevent_srno;
                $sql = "select * from subevents where event_srno = $this->subevent_srno;";
            }
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result; 
        }

        public function insertSubevent($arr)
        {
            $this->subevent_name = $arr['subevent_name'];
            $this->subevent_date = $arr['subevent_date'];
            $this->subevent_time = $arr['subevent_time'];
            $this->subevent_location = $arr['subevent_location'];
            $this->subevent_fee = $arr['subevent_fee'];
            $this->subevent_status = $arr['subevent_status'];
            $sql = "INSERT INTO `subevents` (`subevent_srno`, `subevent_name`, `subevent_date`, `subevent_time`, `subevent_location`, `subevent_fee`, `subevent_status`, `event_srno`) VALUES (NULL, '$this->subevent_name', '$this->subevent_date', '$this->subevent_time', '$this->subevent_location', '$this->subevent_fee', '$this->subevent_status', '$this->event_srno');";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            http_response_code(201);
        }
        
        public function updateSubevent($arr)
        {
            $this->subevent_srno = $arr['subevent_srno'];
            $this->subevent_name = $arr['subevent_name'];
            $this->subevent_date = $arr['subevent_date'];
            $this->subevent_time = $arr['subevent_time'];
            $this->subevent_location = $arr['subevent_location'];
            $this->subevent_fee = $arr['subevent_fee'];
            $this->subevent_status = $arr['subevent_status'];
            $sql = "update subevents set subevent_name = '$this->subevent_name', subevent_date = '$this->subevent_date', subevent_time = '$this->subevent_time', event_location = '$this->subevent_location', subevent_fee = '$this->subevent_fee', subevent_status = '$this->subevent_status', event_srno = '$this->event_srno' where subevent_srno = '$this->subevent_srno';";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            http_response_code(201);
        }
        
        public function deleteSubevent($subevent_srno)
        {
            $this->subevent_srno = $subevent_srno;
            $sql = "delete from subevents where subevent_srno = $this->subevent_srno;";
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>