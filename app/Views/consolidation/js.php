<script type="text/javascript">
    // mengambil elemen input file dari Upload trial Balance
    var inputFile = document.getElementById("fileInput");

    // Membaca data dari file excel atau database MySQL
    let parentCompanyData = [{
        account: 'Cash',
        balance: 5000
    }, {
        account: 'Accounts Receivable',
        balance: 10000
    }, {
        account: 'Inventory',
        balance: 15000
    }];

    let subsidiaryCompanyData = [{
            account: 'Cash',
            balance: 6000
        }, {
            account: 'Accounts Receivable',
            balance: 9000
        },
        // {
        //     account: 'Inventory',
        //     balance: 0
        // }
    ];

    // Inisialisasi array untuk menyimpan data yang tidak sesuai
    let invalidData = [];

    // Melakukan validasi data antara induk perusahaan dan anak perusahaan
    for (let i = 0; i < parentCompanyData.length; i++) {
        let parentAccount = parentCompanyData[i];
        let subsidiaryAccount = subsidiaryCompanyData.find(
            data => data.account === parentAccount.account
        );

        if (subsidiaryAccount === undefined) {
            invalidData.push({
                account: parentAccount.account,
                parentBalance: parentAccount.balance,
                subsidiaryBalance: 'N/A',
            });
        } else if (parentAccount.balance !== subsidiaryAccount.balance) {
            invalidData.push({
                account: parentAccount.account,
                parentBalance: parentAccount.balance,
                subsidiaryBalance: subsidiaryAccount.balance
            });
        }
    }
    $(".datatable-view").css('display', '');
    // Menampilkan data yang tidak sesuai dalam tabel
    if (invalidData.length > 0) {
        let table = '<table><tr><th>Account</th><th>Parent Balance</th><th>Subsidiary Balance</th></tr>';
        invalidData.forEach(data => {
            table += `<tr><td>${data.account}</td><td>${data.parentBalance}</td><td>${data.subsidiaryBalance}</td></tr>`;
        });
        table += '</table>';
        document.getElementById('consolidation-table').innerHTML = table;
    }

    // menambahkan event listener pada input file
    inputFile.addEventListener("change", function(event) {
        // membaca file yang diunggah
        var reader = new FileReader();
        reader.onload = function(event) {
            var data = event.target.result;
            var workbook = XLSX.read(data, {
                type: "binary"
            });

            // mengambil data dari sheet pertama dalam workbook
            var firstSheet = workbook.SheetNames[0];
            var sheetData = XLSX.utils.sheet_to_json(workbook.Sheets[firstSheet]);

            // melakukan validasi data sesuai dengan kriteria yang dibutuhkan
            // console.log(sheetData);
            validateData(sheetData);
        };
        reader.readAsBinaryString(event.target.files[0]);
    });

    function validateData(data) {
        var requiredColumns = ["namaperusahaan", "kodeaccount", "namaaccount"];

        // menentukan pesan error untuk setiap kolom
        var errorMessages = {
            "namaperusahaan": "Kolom 'namaperusahaan' tidak ditemukan",
            "kodeaccount": "Kolom 'kodeaccount' tidak ditemukan",
            "namaaccount": "Kolom 'namaaccount' tidak ditemukan"
        };

        // Create a table to display the invalid rows
        var table = $("<table></table>").addClass("table table-striped");
        var headerRow = $("<tr></tr>");
        headerRow.append($("<th>Nama Perusahaan</th>"));
        headerRow.append($("<th>Kode Account</th>"));
        headerRow.append($("<th>Nama Account</th>"));
        table.append(headerRow);

        var invalidRows = [];
        data.forEach(function(row, index) {
            var isValid = true;
            requiredColumns.forEach(function(column) {
                console.log(column);
                // if (!row.hasOwnProperty(column)) {
                //     invalidRows.push({
                //         "index": index,
                //         "message": errorMessages[column]
                //     });
                //     isValid = false;
                // }
            });
        });

        // If there are no invalid rows, display a confirmation message
        // if (invalidRows.length === 0) {
        //     Swal.fire(
        //         'Tidak ada data yang salah!',
        //         data.message,
        //         'success'
        //     ).then(function() {
        //         $(".datatable-view").css('display', 'none');
        //     });
        //     return;
        // }

        // Add a row for each invalid row
        invalidRows.forEach(function(row) {
            var tableRow = $("<tr></tr>");
            tableRow.append($("<td>" + (row.index + 1) + "</td>"));
            tableRow.append($("<td>" + row.message + "</td>"));
            tableRow.append($("<td>" + row.message + "</td>"));
            table.append(tableRow);
        });

        // Display the table
        // console.log("Data berhasil di load");
        $(".datatable-view").css('display', '');
        $("#consolidation-table").empty().append(table);
        // $("#dataConsolidation_modal").modal("show");
    }
</script>

<script type="text/javascript">
    var attr = $(".btn-preview").attr('data-name');
    var filenameku = $(".btn-preview").data("name");
    var idbtn = $("#btn-anotasi").data("name");
    const namefile = $(this).data('name');
    var fileUrl = "/uploads/" + namefile;
    var namafileDownload = "Anotasi-" + filenameku;

    var id = $(".btn-preview").data("id");

    var fileUrl = "/uploads/" + filenameku;
    var pdf = new PDFAnnotate("pdf-container", fileUrl, {
        onPageUpdated(page, oldData, newData) {
            console.log(page, oldData, newData);
        },
        ready() {
            console.log("Plugin initialized successfully");
        },
        scale: 1.25,
        pageImageCompression: "FAST", // FAST, MEDIUM, SLOW(Helps to control the new PDF file size)
    });

    function changeActiveTool(event) {
        var element = $(event.target).hasClass("tool-button") ?
            $(event.target) :
            $(event.target).parents(".tool-button").first();
        $(".tool-button.active").removeClass("active");
        $(element).addClass("active");
    }

    function enableSelector(event) {
        event.preventDefault();
        changeActiveTool(event);
        pdf.enableSelector();
    }

    function enablePencil(event) {
        event.preventDefault();
        changeActiveTool(event);
        pdf.enablePencil();
    }

    function enableAddText(event) {
        event.preventDefault();
        changeActiveTool(event);
        pdf.enableAddText();
    }

    function enableAddArrow(event) {
        event.preventDefault();
        changeActiveTool(event);
        pdf.enableAddArrow();
    }

    function addImage(event) {
        event.preventDefault();
        pdf.addImageToCanvas()
    }

    function enableRectangle(event) {
        event.preventDefault();
        changeActiveTool(event);
        pdf.setColor('rgba(255, 0, 0, 0.3)');
        pdf.setBorderColor('blue');
        pdf.enableRectangle();
    }

    function deleteSelectedObject(event) {
        event.preventDefault();
        pdf.deleteSelectedObject();
    }

    // PDF save to cloud
    PDFAnnotate.prototype.savePdf2cloud = function(fileName) {
        var inst = this;
        var doc = new jspdf.jsPDF();
        if (typeof fileName === 'undefined') {
            fileName = `${new Date().getTime()}.pdf`;
        }

        inst.fabricObjects.forEach(function(fabricObj, index) {
            if (index != 0) {
                doc.addPage();
                doc.setPage(index + 1);
            }
            doc.addImage(
                fabricObj.toDataURL({
                    format: 'png'
                }),
                inst.pageImageCompression == "NONE" ? "PNG" : "JPEG",
                0,
                0,
                doc.internal.pageSize.getWidth(),
                doc.internal.pageSize.getHeight(),
                `page-${index + 1}`,
                ["FAST", "MEDIUM", "SLOW"].indexOf(inst.pageImageCompression) >= 0 ?
                inst.pageImageCompression :
                undefined
            );
            if (index === inst.fabricObjects.length - 1) {
                var blob = doc.output('blob');
                var formData = new FormData();
                formData.append('pdf', blob);

                var xhr = new XMLHttpRequest();

                xhr.open('POST', baseurl + "wo/replaceFile", true);
                xhr.send('pdf');
                doc.save(fileName);
            }
        })
    }

    function savePDF() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Your data will be saved!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, saved it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Success',
                    'Successfully add data.',
                    'success'
                )
            }
            $pdf = pdf.savePdf(namafileDownload);
        })
    }

    function clearPage() {
        pdf.clearActivePage();
    }

    function showPdfData() {
        var string = pdf.serializePdf();
        $('#dataModal .modal-body pre').first().text(string);
        PR.prettyPrint();
        $('#dataModal').modal('show');
    }

    $(function() {
        $('#colorselector').change(function() {
            var color = $(this).val()
            console.log(color);
            pdf.setColor(color);
        });


        $('#brush-size').change(function() {
            var width = $(this).val();
            pdf.setBrushSize(width);
        });

        $('#font-size').change(function() {
            var font_size = $(this).val();
            pdf.setFontSize(font_size);
        });
    });
</script>