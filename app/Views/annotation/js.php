<script type="text/javascript">
    var attr = $(".btn-preview").attr('data-name');
    var filenameku = $(".btn-preview").data("name");
    var idbtn = $("#btn-anotasi").data("name");
    const namefile = $(this).data('name');
    var fileUrl = "/uploads/" + namefile;
    var namafileDownload = "Anotasi-" + filenameku;

    // var filenameku = "Memo Dinas - Infomedia Nusantara - IOC_1.pdf";
    var id = $(".btn-preview").data("id");

    console.log("ini filename : " + filenameku, idbtn);

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
        // $('.color-tool').click(function () {
        //     $('.color-tool.active').removeClass('active');
        //     $(this).addClass('active');
        //     color = $(this).get(0).style.backgroundColor;
        //     console.log(color);
        //     pdf.setColor(color);
        // });

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

<script src="<?= base_url('assets/dist/pspdfkit.js') ?>" type="text/javascript"></script>

<script type="text/javascript">
    var filename = "databaru.pdf";
    document.getElementById("myLargeModalLabel").innerHTML = "PDF Annotation - " + filename;
    PSPDFKit.load({
            container: "#pspdfkit",
            document: "<?= base_url() . "/uploads/anotasi-edited.pdf"; ?>",
        })
        .then(function(instance) {
            console.log("PSPDFKit loaded", instance);
            // const arrayBuffer = await instance.exportPDF();
            // const blob = new Blob([arrayBuffer], {
            //     type: 'application/pdf'
            // });

            const defaultItems = PSPDFKit.defaultToolbarItems;
            console.log(defaultItems);
            const items = instance.toolbarItems;

            // menghilangkan tombol export pdf
            instance.setToolbarItems(items.filter((item) => item.type !== "export-pdf", "print"));

            instance.exportPDF().then(function(buffer) {
                const supportsDownloadAttribute = HTMLAnchorElement.prototype.hasOwnProperty(
                    "download"
                );
                const blob = new Blob([buffer], {
                    type: "application/pdf"
                });
                if (navigator.msSaveOrOpenBlob) {
                    navigator.msSaveOrOpenBlob(blob, "Anotation.pdf");
                } else {
                    const objectUrl = window.URL.createObjectURL(blob);
                    const exportButton = document.getElementById('export');
                    exportButton.addEventListener('click', () => {
                        downloadPdf(objectUrl);
                    });
                    // downloadPdf(objectUrl);
                    window.URL.revokeObjectURL(objectUrl);
                }
            });

            // const downloadButton = {
            //     type: "custom",
            //     id: "download-pdf",
            //     icon: "/download.svg",
            //     title: "Download",
            //     onPress: () => {
            //         pspdfkitInstance.exportPDF().then((buffer) => {
            //             const blob = new Blob([buffer], {
            //                 type: "application/pdf"
            //             });
            //             const fileName = "document.pdf";
            //             if (window.navigator.msSaveOrOpenBlob) {
            //                 window.navigator.msSaveOrOpenBlob(blob, fileName);
            //             } else {
            //                 const objectUrl = window.URL.createObjectURL(blob);
            //                 const a = document.createElement("a");
            //                 a.href = objectUrl;
            //                 a.style = "display: none";
            //                 a.download = fileName;
            //                 document.body.appendChild(a);
            //                 a.click();
            //                 window.URL.revokeObjectURL(objectUrl);
            //                 document.body.removeChild(a);
            //             }
            //         });
            //     }
            // };
            // toolbarItems: PSPDFKit.defaultToolbarItems.concat([downloadButton])
        })
        .catch(function(error) {
            console.error(error.message);
        });


    function downloadPdf(objectUrl) {
        const a = document.createElement("a");
        a.href = objectUrl;
        a.style.display = "none";
        a.download = "Anotation.pdf";
        a.setAttribute("download", "anotation.pdf");
        document.body.appendChild(a);
        a.dispatchEvent(
            new MouseEvent('click', {
                bubbles: true,
                cancelable: true,
                view: window
            })
        );
        document.body.removeChild(a);
        alert("File Downloaded");
    }


    // async function saveServer(blob){
    //     const formData = new FormData();
    //     formData.append("file", blob);
    //     console.log(formData);
    //     await fetch("/pdf/attachment/upload", {
    //         method: "POST",
    //         body: formData
    //     });
    //     alert("File saved!");
    //     console.log("File saved!");
    // }
</script>