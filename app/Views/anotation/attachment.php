<?php
$db = \Config\Database::connect();
$query = $db->query('SELECT * FROM attachment');
// $result = $query->getResult();
// echo ($result);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.card -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <!-- Tambah attachment -->
                            <button class="btn" id="btn" data-toggle="modal" data-target="#addModal">
                                <i class="nav-icon fa fa-plus-square"></i>
                                Add Attachment
                            </button>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <!-- Add Attachment Modal -->
                            <form action="<?php echo base_url('/pdf/attachment/upload'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Attachment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Document Type</label>
                                                    <input type="text" class="form-control" name="document_type" placeholder="Document Type">
                                                </div>
                                                <div class="form-group">
                                                    <label>Upload Document</label>
                                                    <input type="file" class="form-control" name="file" accept="" />
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="20000" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Note</label>
                                                    <input type="text" class="form-control" name="note" placeholder="Note">
                                                </div>
                                                <div class="form-group">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn" id="btn">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End attachment added -->

                        <!-- Anotasi modal -->
                        <!-- <form action="/pdf/attachment/save" method="post"> -->
                        <div class="modal fade bd-example-modal-lg" id="anotateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden=" true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <!-- PSPDFKit  preview -->
                                        <div id="pspdfkit" style="width: 100%; height: 100vh;"></div>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="attach_id" class="attachID">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="export">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </form> -->
                        <!-- End Anotasi -->

                        <!-- Data Table -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="width:auto;">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Document</th>
                                        <th>Nama</th>
                                        <th>Nama Nodes</th>
                                        <th>Size</th>
                                        <th>Attachment ID</th>
                                        <th>Version Document</th>
                                        <th>Note</th>
                                        <th>Upload by</th>
                                        <th>Upload at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php
                                    foreach ($query->getResult() as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->document_type; ?></td>
                                            <td><?php echo $row->name; ?></td>
                                            <td><?php echo $row->node_name; ?></td>
                                            <td><?php echo $row->size; ?></td>
                                            <td><?php echo $row->attach_id; ?></td>
                                            <td><?php echo $row->version_document; ?></td>
                                            <td><?php echo $row->note; ?></td>
                                            <td><?php echo $row->upload_by; ?></td>
                                            <td><?php echo $row->upload_at; ?></td>
                                            <td>
                                                <!-- Preview Anotasi -->
                                                <a href="" class="btn" id="btn" data-toggle="modal" data-target="#anotateModal"><i class="nav-icon fa fa-<?= $iconset; ?>"></i></a>
                                                <a href="" class="btn" id="btn"><i class="nav-icon fa fa-download"></i></a>
                                                <a href="" data-toggle="modal" data-target="#deleteModal" class="btn" id="btn"><i class="nav-icon fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php ?>
                                </tbody>
                            </table>

                            <!-- Modal Delete Product-->
                            <form action="/pdf/attachment/delete" method="post">
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Document</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <h4>Are you sure want to delete this "<?= $row->name; ?>"?</h4>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="attach_id" class="attachID">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Modal Delete Product-->

                        </div>
                    </div>
                    <!-- <a type="button" id="btn" class="btn btn-save" onclick="download()"><i class="nav-icon fa fa-save"></i> save</a> -->
                    <!-- /.card -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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