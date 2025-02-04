<?php

include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dmn_no = $_POST['dmn_no'];
    $dmn_name = $_POST['dmn_name'];
    $dmn_reg_date = $_POST['dmn_reg_date'];
    $dmn_exp_date = $_POST['dmn_exp_date'];
    $dmn_renew_cost = $_POST['dmn_renew_cost'];
    $dmn_dns_info = $_POST['dmn_dns_info'];
    $dmn_register = $_POST['dmn_register'];
    $dmn_last_updated = $_POST['dmn_last_updated'];
    $dmn_status = $_POST['dmn_status'];
    $dmn_remarks = $_POST['dmn_remarks'];
    $dmn_host_IPV4 = $_POST['dmn_host_IPV4'];
    $dmn_host_IPV6 = $_POST['dmn_host_IPV6'];
    $dmn_label_csv = $_POST['dmn_label_csv'];
    $dmn_related_projs = $_POST['dmn_related_projs'];


    $sql = "UPDATE DOMAIN SET 
            dmn_no='$dmn_no',
            dmn_name='$dmn_name', 
            dmn_reg_date='$dmn_reg_date', 
            dmn_exp_date='$dmn_exp_date', 
            dmn_renew_cost='$dmn_renew_cost', 
            dmn_dns_info='$dmn_dns_info', 
            dmn_register='$dmn_register',
            dmn_last_updated='$dmn_last_updated', 
            dmn_status='$dmn_status', 
            dmn_remarks='$dmn_remarks',
            dmn_host_IPV4='$dmn_host_IPV4', 
            dmn_host_IPV6='$dmn_host_IPV6', 
            dmn_label_csv='$dmn_label_csv',
            dmn_related_projs='$dmn_related_projs'
            WHERE dmn_no=$dmn_no";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>