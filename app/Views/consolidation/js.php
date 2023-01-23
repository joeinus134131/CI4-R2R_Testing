<script type="text/javascript">
    var table = $('#importData').DataTable({
        "scrollX": true,
        "scrollY": "300px",
        "scrollCollapse": true,
        "paging": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": true,
        "responsive": true,
        "columnDefs": [{
                orderable: false,
                targets: 0
            },
            {
                orderable: false,
                targets: -1
            },
        ],
        ordering: [
            [1, 'asc']
        ]
    });

    $('#upload_excelData').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>import/importData",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#fileData').val('');
                table.ajax.reload();
                response = JSON.parse(data);
            },
            error: function() {
                alert('Pastikan data yang diupload adalah excel..');
            }
        })
    });

    var dataTable = [];
    for (var i = 0; i < data.length; i++) {
        dataTable.push([data[i]['col1'], data[i]['col2'], data[i]['col3']]);
    }

    $('#trial_balance_table').DataTable({
        data: dataTabble,
        columns: [{
                title: "namaperusahaan"
            },
            {
                title: "kodeaccount"
            },
            {
                title: "namaaccount"
            },
        ]
    });
</script>