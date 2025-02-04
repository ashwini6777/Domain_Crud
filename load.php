<?php
include 'db.php'; 

$sql = "SELECT * FROM DOMAIN";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['dmn_no']}</td>
                <td>{$row['dmn_name']}</td>
                <td>{$row['dmn_reg_date']}</td>
                <td>{$row['dmn_exp_date']}</td>
                <td>{$row['dmn_renew_cost']}</td>
                <td>{$row['dmn_dns_info']}</td>
                <td>{$row['dmn_register']}</td>
                <td>{$row['dmn_last_updated']}</td>
                <td>{$row['dmn_host_IPV4']}</td>
                <td>{$row['dmn_host_IPV6']}</td>
                <td>{$row['dmn_status']}</td>
                <td>{$row['dmn_remarks']}</td>
                <td>{$row['dmn_label_csv']}</td>
                <td>{$row['dmn_related_projs']}</td>
                <td>
                    <button class='editBtn btn btn-warning mb-2 btn-sm' 
                        data-dmn_no='{$row['dmn_no']}'
                        data-dmn_name='{$row['dmn_name']}'
                        data-dmn_reg_date='{$row['dmn_reg_date']}'
                        data-dmn_exp_date='{$row['dmn_exp_date']}'
                        data-dmn_renew_cost='{$row['dmn_renew_cost']}'
                        data-dmn_dns_info='{$row['dmn_dns_info']}'
                        data-dmn_register='{$row['dmn_register']}'
                        data-dmn_last_updated='{$row['dmn_last_updated']}'
                        data-dmn_host_ipv4='{$row['dmn_host_IPV4']}'
                        data-dmn_host_ipv6='{$row['dmn_host_IPV6']}'
                        data-dmn_status='{$row['dmn_status']}'
                        data-dmn_remarks='{$row['dmn_remarks']}'
                        data-dmn_label_csv='{$row['dmn_label_csv']}'
                        data-dmn_related_projs='{$row['dmn_related_projs']}'>
                       <i class='fa-solid fa-pen'></i>Edit

                    </button>
                    <button class='deleteBtn btn btn-danger btn-sm' data-dmn_no='{$row['dmn_no']}'>
                         <i class='fa-solid fa-trash'></i>Delete 
                    </button>         
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No records found</td></tr>";
}
?>
