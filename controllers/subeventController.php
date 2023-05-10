<?php

namespace subeventControl;
use subevents;

class subeventController
{
    private $conn;
    private $requestMethod;
    private $subevent_srno;


    function __construct($db, $requestMethod, $subevent_srno)
    {
        $this->conn = $db;
        $this->subevent_srno = $subevent_srno;
        $this->requestMethod = $requestMethod;
        $this->subevents = new subevents($db);
    }

    public function processRequestForSubevents()
        {
            switch($this->requestMethod)
            {
                case 'GET':
                    $response = $this->subevents->getSubevent($this->subevent_srno);
                    $usrarr = array();
                    $usrarr['subevents'] = array();
                    foreach($response as $res)
                    {
                        $useritm = array('subevent_srno' => $res['subevent_srno'], 'subevent_name' => $res['subevent_name'], 'subevent_date' => $res['subevent_date'], 'subevent_time' => $res['subevent_time'], 'subevent_location' => $res['subevent_location'], 'subevent_fee' => $res['subevent_fee'], 'subevent_status' => $res['subevent_status'], 'event_srno' => $res['event_srno']);
                        array_push($usrarr['subevents'], $useritm);
                    }
                    http_response_code(200);
                    return json_encode($usrarr);
                    
                    break;
                    
                case 'POST':
                    $input = (array) json_decode(file_get_contents('php://input'), TRUE);
                    $this->subevents->insertSubevent($input);
                    http_response_code(201);
                    break;
                
                case 'PUT':
                    $input = (array) json_decode(file_get_contents('php://input'), TRUE);
                    $this->subevents->updateSubevent($input);
                    http_response_code(201);
                    break;

                case 'DELETE':
                    $this->subevents->deleteSubevent($this->subevent_srno);
                    break;
                    
            }
        }
}
?>