<?php

namespace attendanceinfoControl;
use attendanceinfo;

class attendanceinfoController
{
    private $conn;
    private $requestMethod;
    private $info_srno;


    function __construct($db, $requestMethod, $info_srno)
    {
        $this->conn = $db;
        $this->info_srno = $info_srno;
        $this->requestMethod = $requestMethod;
        $this->attendanceinfo = new attendanceinfo($db);
    }

    public function processRequestForAttendanceinfo()
        {
            switch($this->requestMethod)
            {
                case 'GET':
                    $response = $this->attendanceinfo->getAttendanceinfo($this->info_srno);
                    $usrarr = array();
                    $usrarr['attendanceinfos'] = array();
                    foreach($response as $res)
                    {
                        $useritm = array('info_srno' => $res['info_srno'], 'attendance_name' => $res['attendance_name'], 'info_date' => $res['info_date'], 'info_time' => $res['info_time']);
                        array_push($usrarr['attendanceinfos'], $useritm);
                    }
                    http_response_code(200);
                    return json_encode($usrarr);
                    
                    break;
                    
                case 'POST':
                    $input = (array) json_decode(file_get_contents('php://input'), TRUE);
                    $this->attendanceinfo->insertAttendanceinfo($input);
                    http_response_code(201);
                    break;
                
                case 'PUT':
                    $input = (array) json_decode(file_get_contents('php://input'), TRUE);
                    $this->attendanceinfo->updateAttendanceinfo($input);
                    http_response_code(201);
                    break;

                case 'DELETE':
                    $this->attendanceinfo->deleteAttendanceinfo($this->info_srno);
                    break;
                    
            }
        }
}
?>