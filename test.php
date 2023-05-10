<?php
echo "true";
include('../restapi/includes/config.php');
$sql = "select * from users where user_srno = 1";
$stmt = $db->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$usrarr = array();
$usrarr['users'] = array();
foreach($result as $res)
{
    $useritm = array('user_srno' => $res['user_srno'], 'contact' => $res['contact'], 'email' => $res['email'], 'user_role' => $res['user_role'], 'face_value' => $res['face_value'], 'name' => $res['name']);
    array_push($usrarr['users'], $useritm);
}
echo json_encode($usrarr);
echo "false";
?>