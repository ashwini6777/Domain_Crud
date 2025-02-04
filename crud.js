$(document).ready(function () {

    loadRecords();

    // Function to show Bootstrap Toast
    function showToast(message, type = 'success') {
        let toastElement = $('#customToast');
        let toastBody = $('#toastMessage');

        // Set message
        toastBody.text(message);

        // Change toast color based on type
        if (type === 'success') {
            toastElement.removeClass('bg-danger').addClass('bg-success');
        } else {
            toastElement.removeClass('bg-success').addClass('bg-danger');
        }

        // Show the toast
        var toast = new bootstrap.Toast(toastElement[0]);
        toast.show();
    }

    // Function to load records
    function loadRecords() {
        $.ajax({
            url: 'load.php',
            type: 'GET',
            success: function (data) {
                $('#recordTable tbody').html(data);
            },
            error: function (err) {
                console.error('Failed to load records:', err);
                showToast('Error loading records. Please try again.', 'error');
            }
        });
    }



    // Add record
    $('#addForm').on('submit', function (e) {
        e.preventDefault();

        // Collect form field values
        const formData = $(this).serializeArray();
        //console.log(formData);
        //return;
        var fdata = {}
        formData.forEach(function (item) {
            fdata[item.name] = item.value;
        });

        fdata = JSON.stringify(fdata);

        //for debugging
        //console.log(fdata);

        $.ajax({
            url: 'insert.php',
            type: 'POST',
            data: fdata,
            contentType: 'application/json',
            success: function (resp) {

                //for debugging
                // console.log("\n------Server Response : ---MUST BE IN JSON FORMAT--------\n\n" + resp + "\n\n----------End of Server Response ------------\n\n");

                resp = JSON.parse(resp);

                //for debugging
                //console.log(resp);return;

                if (resp.status === "success") {
                    showToast('Record added successfully!', 'success');
                    loadRecords();
                    $('#addForm')[0].reset();
                    $('#addFormModal').modal('hide');
                }
            },
            error: function (err) {
                console.error('Error adding record:', err);
                showToast('Failed to add the record.', 'error');
            }
        });
    });

    // Edit record 
    $(document).on('click', '.editBtn', function () {
        const dmn_no = $(this).data('dmn_no');
        $('#edit-dmn_no').val(dmn_no);
        $('#edit-dmn_name').val($(this).data('dmn_name'));
        $('#edit-dmn_reg_date').val($(this).data('dmn_reg_date'));
        $('#edit-dmn_exp_date').val($(this).data('dmn_exp_date'));
        $('#edit-dmn_renew_cost').val($(this).data('dmn_renew_cost'));
        $('#edit-dmn_register').val($(this).data('dmn_register'));
        $('#edit-dmn_dns_info').val($(this).data('dmn_dns_info'));
        $('#edit-dmn_last_updated').val($(this).data('dmn_last_updated'));
        $('#edit-dmn_host_IPV4').val($(this).data('dmn_host_ipv4'));
        $('#edit-dmn_host_IPV6').val($(this).data('dmn_host_ipv6'));
        $('#edit-dmn_status').val($(this).data('dmn_status'));
        $('#edit-dmn_remarks').val($(this).data('dmn_remarks'));
        $('#edit-dmn_label_csv').val($(this).data('dmn_label_csv'));
        $('#edit-dmn_related_projs').val($(this).data('dmn_related_projs'));
        $('#updateModal').modal('show');
    });

    // Update record
    $('#updateRecord').on('click', function () {
        const formData = {
            dmn_no: $('#edit-dmn_no').val(),
            dmn_name: $('#edit-dmn_name').val(),
            dmn_reg_date: $('#edit-dmn_reg_date').val(),
            dmn_exp_date: $('#edit-dmn_exp_date').val(),
            dmn_renew_cost: $('#edit-dmn_renew_cost').val(),
            dmn_dns_info: $('#edit-dmn_dns_info').val(),
            dmn_register: $('#edit-dmn_register').val(),
            dmn_last_updated: $('#edit-dmn_last_updated').val(),
            dmn_host_IPV4: $('#edit-dmn_host_IPV4').val(),
            dmn_host_IPV6: $('#edit-dmn_host_IPV6').val(),
            dmn_status: $('#edit-dmn_status').val(),
            dmn_remarks: $('#edit-dmn_remarks').val(),
            dmn_label_csv: $('#edit-dmn_label_csv').val(),
            dmn_related_projs: $('#edit-dmn_related_projs').val()
        };

        $.ajax({
            url: 'update.php',
            type: 'POST',
            data: formData,
            success: function () {
                showToast('Record updated successfully!', 'success');
                loadRecords();
                $('#updateModal').modal('hide');
            },
            error: function (err) {
                console.error('Error updating record:', err);
                showToast('Failed to update the record.', 'error');
            }
        });
    });

    // Delete record
    $(document).on('click', '.deleteBtn', function () {
        if (confirm('Are you sure you want to delete this record?')) {
            const dmn_no = $(this).data('dmn_no');

            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: { dmn_no },
                success: function () {
                    showToast('Record deleted successfully!', 'success');
                    loadRecords();
                },
                error: function (err) {
                    console.error('Error deleting record:', err);
                    showToast('Failed to delete the record.', 'error');
                }
            });
        }
    });

});
    