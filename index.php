<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain CRUD Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="crud.js"></script>
   
</head>
<body>

<!-- Toast Container (Upper Right Corner) -->
<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container position-absolute top-0 end-0 p-3">
        <div id="customToast" class="toast align-items-center text-white bg-success border-1" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header mt-3 mb-3">
                <strong class="me-auto">Localhost says</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="d-flex">
                    <div class="toast-body" id="toastMessage">

                    </div>
            </div>
        </div>
    </div>
</div>
    
<div class="container mt-4 text-danger bg-light">
    <center><h2>Domain Information</h2></center>
    <div class="container mb-4 mt-4">
        <div class="row align-items-center"> 

        <!-- Add Record Button -->
         <div class="col-md-4 col-12 text-md-start">
            <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addFormModal">Add Record</button>
         </div>

        <!-- Search Input -->
          <div class="col-md-4 col-12">
            <div class="form-floating bg-danger text-dark">
                <input type="text" class="form-control" id="searchInput" placeholder="Search Domain" onkeyup="searchDomain()">
                <label for="searchInput">Search Domain Name</label>
            </div>
          </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-light table-striped" id="recordTable">

            <thead class="table-primary">
                <tr>
                <th><a href="#" onclick="fetchData('dmn_no')">Number<span id="dmn_no_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_name')">Name<span id="dmn_name_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_reg_date')">Reg Date <span id="dmn_reg_date_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_exp_date')">Exp Date <span id="dmn_exp_date_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_renew_cost')">Renew Cost <span id="dmn_renew_cost_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_dns_info')">Dns Info <span id="dmn_dns_info_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_register')">Register <span id="dmn_register_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_last_updated')">Last Updated <span id="dmn_last_updated_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_host_IPV4')">Host IPV4 <span id="dmn_host_IPV4_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_host_IPV6')">Host IPV6 <span id="dmn_host_IPV6_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_status')">Status <span id="dmn_status_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_remarks')">Remarks <span id="dmn_remarks_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_label_csv')">Label CSV <span id="dmn_label_csv_icon"></span></a></th>
                <th><a href="#" onclick="fetchData('dmn_related_projs')">Related Projects <span id="dmn_related_projs_icon"></span></a></th>
                <th><a href="#">Actions</a></th>
                    <!-- <th>Number</th>
                    <th>Name</th>
                    <th>Reg Date</th>
                    <th>Exp Date</th>
                    <th>Renew Cost</th>
                    <th>Dns Info</th>
                    <th>Register</th>
                    <th>Last Updated</th>
                    <th>Host IPV4</th>
                    <th>Host IPV6</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Label CSV</th>
                    <th>Related Projects</th>
                    <th>Actions</th> -->
                </tr>
            </thead>

            <tbody id="table-data">
                <!-- Data will be loaded here -->
            </tbody>
        </table>

        <nav>
            <ul class="pagination justify-content-center" id="pagination">
                <!-- Pagination buttons will be populated here -->
            </ul>
        </nav>


    </div>
</div>  

<!-- Add Modal -->
<div class="modal fade" id="addFormModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <form id="addForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <!-- Domain Name -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="dmn_name" placeholder="Enter Domain Name" class="form-control" required>
                                    <label for="dmn_name">Domain Name</label>
                                </div>
                            </div>
                            <!-- Domain Register Date -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" name="dmn_reg_date" placeholder="Select Domain Register Date" class="form-control" required>
                                    <label for="dmn_reg_date">Domain Register Date</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Domain Expiry Date -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" name="dmn_exp_date" placeholder="Select Domain Expiry Date" class="form-control" required>
                                    <label for="dmn_exp_date">Domain Expiry Date</label>
                                </div>
                            </div>
                            <!-- Domain Last Updated -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" name="dmn_last_updated" placeholder="Select Domain Last Updated Date" class="form-control" required>
                                    <label for="dmn_last_updated">Domain Last Updated Date</label>
                                </div>
                            </div>
                         </div>

                         <div class="row">
                            <!-- Domain Renew Cost -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="number" name="dmn_renew_cost" placeholder="Enter Domain Renew Cost" class="form-control" required>
                                    <label for="dmn_renew_cost">Domain Renew Cost</label>
                                </div>
                            </div>
                            <!-- Domain Register -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="dmn_register" placeholder="Select Domain Registrar" class="form-control">
                                    <label for="dmn_register">Domain Register</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Domain Host IPv4 -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="dmn_host_IPV4" placeholder="Enter Domain Host IPV4" class="form-control">
                                    <label for="dmn_host_IPV4">Domain Host IPV4</label>
                                </div>
                            </div>
                            <!-- Domain Host IPv6 -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="dmn_host_IPV6" placeholder="Enter Domain Host IPV6" class="form-control">
                                    <label for="dmn_host_IPV6">Domain Host IPV6</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Domain Status -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <select name="dmn_status" class="form-control" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="expired">Expired</option>
                                    </select>
                                    <label for="dmn_status">Domain Status</label>
                                </div>
                            </div>

                            <!-- Domain DNS Info  -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <textarea name="dmn_dns_info" placeholder="Enter Domain DNS Information" class="form-control"></textarea>
                                    <label for="dmn_dns_info">Domain DNS Information</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Domain Remarks  -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <textarea name="dmn_remarks" placeholder="Domain Remarks" class="form-control"></textarea>
                                    <label for="dmn_remarks">Enter Domain Remarks</label>
                                </div>
                            </div>

                            <!-- Domain Label  -->
                            <div class="col-md-6 col-12">
                                <div class="form-floating mb-3">
                                    <textarea name="dmn_label_csv" placeholder="Domain Label CSV" class="form-control"></textarea>
                                    <label for="dmn_label_csv">Enter Domain Label CSV</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Domain Projects (Full Width) -->
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <textarea name="dmn_related_projs" placeholder="Domain Related Projects" class="form-control"></textarea>
                                    <label for="dmn_related_projs">Enter Domain Related Projects</label>
                                </div>
                            </div>
                        </div> 

                    </div> <!-- End Container -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Record</button>
                </div>
                
            </div>
        </form>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="updateModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Hidden Field for Primary Key -->
                <input type="hidden" id="edit-dmn_no">

                <div class="row">
                    <!-- Domain Name -->
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" id="edit-dmn_name" class="form-control" required>
                            <label for="edit-dmn_name">Domain Name</label>
                        </div>
                    </div>

                    <!-- Registration Date -->
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="datetime-local" id="edit-dmn_reg_date" class="form-control" required>
                            <label for="edit-dmn_reg_date">Domain Register Date</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Expiry Date -->
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="datetime-local" id="edit-dmn_exp_date" class="form-control" required>
                            <label for="edit-dmn_exp_date">Domain Expiry Date</label>
                        </div>
                    </div>

                    <!-- Domain Last Update -->
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="datetime-local" id="edit-dmn_last_updated" class="form-control" required>
                            <label for="edit-dmn_last_updated">Last Update Date</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Renew Cost -->
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="number" id="edit-dmn_renew_cost" class="form-control" min="0" required>
                            <label for="edit-dmn_renew_cost">Renew Cost</label>
                        </div>
                    </div>

                    <!-- DNS Info -->
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" id="edit-dmn_dns_info" class="form-control">
                            <label for="edit-dmn_dns_info">DNS Information</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Host IPV4 -->
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" id="edit-dmn_host_IPV4" class="form-control">
                            <label for="edit-dmn_host_IPV4">Host IPV4</label>
                        </div>
                    </div>
                    <!-- Host IPV6 -->

                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" id="edit-dmn_host_IPV6" class="form-control">
                            <label for="edit-dmn_host_IPV6">Host IPV6</label>
                        </div>
                    </div>
                </div>
                <!-- Registrar -->

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" id="edit-dmn_register" class="form-control">
                            <label for="edit-dmn_register">Registrar</label>
                        </div>
                    </div>

                    <!-- Domain Status -->
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <select id="edit-dmn_status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="expired">Expired</option>
                            </select>
                            <label for="edit-dmn_status">Status</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Remarks -->
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <textarea id="edit-dmn_remarks" class="form-control"></textarea>
                            <label for="edit-dmn_remarks">Remarks</label>
                        </div>
                    </div>

                    <!-- Domain Label -->
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <textarea id="edit-dmn_label_csv" class="form-control"></textarea>
                            <label for="edit-dmn_label_csv">Domain Labels</label>
                        </div>
                    </div>
                </div>

                <!-- Related Projects (Full Width) -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea id="edit-dmn_related_projs" class="form-control"></textarea>
                            <label for="edit-dmn_related_projs">Related Projects</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button id="updateRecord" class="btn btn-primary">Update Record</button>
            </div>
        </div>
    </div>
</div>

<script> 

 // For Ascending or descending
 let currentOrder = 'asc';
 function fetchData(column) {
    let icon = currentOrder === 'asc' ? '🔼' : '🔽';
    $(`#${column}_icon`).text(icon);

    $.ajax({
        url: "fetch_asc_dsc.php",
        type: "GET",
        data: { column: column, order: currentOrder },
        dataType: "json",
        success: function (formData) {
            let rows = "";
            formData.forEach(row => {
                rows += `<tr>
                             <td>${row.dmn_no}</td>
                             <td>${row.dmn_name}</td>
                             <td>${row.dmn_reg_date}</td>
                             <td>${row.dmn_exp_date}</td>
                             <td>${row.dmn_renew_cost}</td>
                             <td>${row.dmn_dns_info}</td>
                             <td>${row.dmn_register}</td>
                             <td>${row.dmn_last_updated}</td>
                             <td>${row.dmn_host_IPV4}</td>
                             <td>${row.dmn_host_IPV6}</td>
                             <td>${row.dmn_status}</td>
                             <td>${row.dmn_remarks}</td>
                             <td>${row.dmn_label_csv}</td>
                             <td>${row.dmn_related_projs}</td>
                             <td>
                               <button class="btn btn-warning btn-sm editBtn mb-2" data-dmn_no='${row.dmn_no}'> 
                                   <i class='fa-solid fa-pen'></i> Edit
                               </button>
                               <button class="btn btn-danger btn-sm deleteBtn" data-dmn_no='${row.dmn_no}'> 
                                   <i class='fa-solid fa-trash'></i> Delete
                               </button>
                             </td>
                         </tr>`;
            });

            // Update the table with new sorted data
            $("#table-data").html(rows);

            // Toggle sorting order
            currentOrder = (currentOrder === 'asc') ? 'desc' : 'asc';
        },
        error: function (error) {
            console.error("Error fetching data:", error);
        }
    });
}

// Load initial data when the page loads
$(document).ready(function() {
    fetchData('dmn_no'); 
});




// For search according to domain name
function searchDomain() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("recordTable");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {  // Start from 1 to skip the header row
        td = tr[i].getElementsByTagName("td")[1];  // Domain name is in the second column (index 1)
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}



// For Pagination

function fetchDomains(page = 1) {
        $.ajax({
        url: "fetch_pagination.php",
        type: "GET",
        data: { page: page },
        dataType: "json",
        success: function(response) {
            let tbody = ""; 
                response.data.forEach(domain => {
                    tbody += `<tr>
                        <td>${domain.dmn_no}</td>
                        <td>${domain.dmn_name}</td>
                        <td>${domain.dmn_reg_date}</td>
                        <td>${domain.dmn_exp_date}</td>
                        <td>${domain.dmn_renew_cost}</td>
                        <td>${domain.dmn_dns_info}</td>
                        <td>${domain.dmn_register}</td>
                        <td>${domain.dmn_last_updated}</td>
                        <td>${domain.dmn_host_IPV4}</td>
                        <td>${domain.dmn_host_IPV6}</td>
                        <td>${domain.dmn_status}</td>
                        <td>${domain.dmn_remarks}</td>
                        <td>${domain.dmn_label_csv}</td>
                        <td>${domain.dmn_related_projs}</td>
                        <td>
                            <button class="btn btn-warning btn-sm editBtn mb-2" data-dmn_no='${domain.dmn_no}'> 
                                <i class='fa-solid fa-pen'></i> Edit
                            </button>

                            <button class="btn btn-danger btn-sm deleteBtn" data-dmn_no='${domain.dmn_no}'> 
                                <i class='fa-solid fa-trash'></i> Delete
                            </button>
                        </td>                        
                    </tr>`;
                });
                $("#table-data").html(tbody);

                // Pagination buttons
                let pagination = "";
                let currentPage = response.current_page;
                let totalPages = response.total_pages;

                // Previous button
                pagination += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <button class="page-link" onclick="fetchDomains(${currentPage - 1})">
                    Previous
                </button> </li>`;

                    // Page number buttons
                for (let i = 1; i <= totalPages; i++) {
                    pagination += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                    <button class="page-link" onclick="fetchDomains(${i})">${i}</button>
                    </li>`;
                }

                    // Next button
                pagination += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                    <button class="page-link" onclick="fetchDomains(${currentPage + 1})">
                        Next
                    </button>
                </li>`;

                // Append the pagination to the DOM
                $("#pagination").html(pagination);
            }
        });
    }

    // Call fetchDomains function when the page loads
    $(document).ready(function() {
        fetchDomains(1); // Load first page of domains
});


</script>
</body>
</html>