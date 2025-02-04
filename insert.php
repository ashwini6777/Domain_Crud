<?php
header('Content-Type: application/text');

include 'db.php';
$input = file_get_contents('php://input');

//for debugging purpose
//echo ($input); return;

$data = json_decode($input,true);  //convert JSON-STRING to PHP-ARRAY 

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dmn_name = $data['dmn_name'];
    $dmn_reg_date = $data['dmn_reg_date'];
    $dmn_exp_date = $data['dmn_exp_date']; 
    $dmn_renew_cost = $data['dmn_renew_cost'];
    $dmn_dns_info = $data['dmn_dns_info'];
    $dmn_register = $data['dmn_register'];
    $dmn_last_updated = $data['dmn_last_updated'];
    $dmn_host_IPV4 = $data['dmn_host_IPV4'];
    $dmn_host_IPV6 = $data['dmn_host_IPV6'];
    $dmn_status = $data['dmn_status'];
    $dmn_remarks = $data['dmn_remarks'];
    $dmn_label_csv = $data['dmn_label_csv'];
    $dmn_related_projs = $data['dmn_related_projs'];
    
    $sql = "INSERT INTO DOMAIN (`dmn_name`, `dmn_reg_date`, `dmn_exp_date`, `dmn_renew_cost`, `dmn_dns_info`, `dmn_register`, `dmn_last_updated`, `dmn_host_IPV4`, `dmn_host_IPV6`, `dmn_status`, `dmn_remarks`,`dmn_label_csv`,`dmn_related_projs`) VALUES ('$dmn_name', '$dmn_reg_date', '$dmn_exp_date', '$dmn_renew_cost', '$dmn_dns_info', '$dmn_register', '$dmn_last_updated', '$dmn_host_IPV4', '$dmn_host_IPV6', '$dmn_status', '$dmn_remarks','$dmn_label_csv','$dmn_related_projs')";

    //$response[] = array("status"=>"debuging","message"=>"$sql");

    if (mysqli_query($conn, $sql)) {
        $response = array("status"=>"success","message"=>"Record inserted successfully!");

    } else {
        $response = array("status"=>"error","message"=>$sql . "<br>" . mysqli_error($conn));
    }
    echo json_encode($response);
//}
?>