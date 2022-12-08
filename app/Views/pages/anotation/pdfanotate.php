<?php

use LDAP\Result;

$db = \Config\Database::connect();
$query = $db->query('SELECT * FROM attachment, user_upload');
$rowquery = $query->getResult();
// echo ($result);
?>
<style>
    html,
    body {
        height: 100%;
    }

    #pdfContainer {
        height: 90%;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PDF Anotasi</h1>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Modal Json data -->
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
                                            <input type="file" class="form-control" name="berkas" />
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

                <!-- succes upload attachment -->
                <div class="modal fade" id="succesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Save Anotasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <h4>Succes</h4>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="attach_id" class="attachID">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Table -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
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
                            <?php ?>
                            <?php if ($query->getResult() > 0) { ?>
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
                                        <td><?php echo $row->upload_by ?></td>
                                        <td><?php echo $row->upload_at; ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Button">
                                                <a class="btn btn-preview" id="btn"><i class="nav-icon fa fa-<?= $iconset; ?>" data-id="<?= $row->attach_id; ?>" data-name="<?= $row->name; ?>"></i></a>

                                                <a href="" class="btn" id="btn"><i class="nav-icon fa fa-download"></i></a>
                                                <!-- Delete -->
                                                <a class="btn btn-secondary btn-delete" id="btn-del" data-id="<?= $row->attach_id; ?>"><i class="nav-icon fa fa-trash"></i></a>
                                            </div>
                                            <!-- Preview -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="11" class="text-center">No Data</td>
                                </tr>
                            <?php } ?>
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
                                        <!-- Preview Anotasi -->
                                        <?php $data = $db->query("SELECT * FROM attachment WHERE attach_id = '$row->attach_id'"); ?>
                                        <?php $result = $data->getResult(); ?>
                                        <?php foreach ($result as $baris) { ?>
                                            <?php $filename = $baris->name ?>
                                        <?php } ?>
                                        <h4>Are you sure want to delete this "<?= $filename; ?>"?</h4>

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

                <!-- Json modal -->
                <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="dataModalLabel">PDF annotation JSON data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <pre class="prettyprint lang-json linenums"></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- PDF View Modal -->
    <div class="modal fade bd-example-modal-lg" id="anotateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">PDF Anotation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden=" true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="containter-fluid">
                        <div class="row">
                            <div class="toolbar">
                                <div class="tool">
                                    <label for="">Brush size</label>
                                    <select id="brush-size" class="form-control text-right">
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="tool">
                                    <label for="">Font size</label>
                                    <select id="font-size" class="form-control">
                                        <option value="10">10</option>
                                        <option value="12">12</option>
                                        <option value="16" selected>16</option>
                                        <option value="18">18</option>
                                        <option value="24">24</option>
                                        <option value="32">32</option>
                                        <option value="48">48</option>
                                        <option value="64">64</option>
                                        <option value="72">72</option>
                                        <option value="108">108</option>
                                    </select>
                                </div>
                                <!-- <select id="colorselector">
                                    <option value="106" data-color="#A0522D">sienna</option>
                                    <option value="47" data-color="#CD5C5C" selected="selected">indianred</option>
                                    <option value="87" data-color="#FF4500">orangered</option>
                                    <option value="17" data-color="#008B8B">darkcyan</option>
                                    <option value="18" data-color="#B8860B">darkgoldenrod</option>
                                    <option value="68" data-color="#32CD32">limegreen</option>
                                    <option value="42" data-color="#FFD700">gold</option>
                                    <option value="77" data-color="#48D1CC">mediumturquoise</option>
                                    <option value="107" data-color="#87CEEB">skyblue</option>
                                    <option value="46" data-color="#FF69B4">hotpink</option>
                                    <option value="47" data-color="#CD5C5C">indianred</option>
                                    <option value="64" data-color="#87CEFA">lightskyblue</option>
                                    <option value="13" data-color="#6495ED">cornflowerblue</option>
                                    <option value="15" data-color="#DC143C">crimson</option>
                                    <option value="24" data-color="#FF8C00">darkorange</option>
                                    <option value="78" data-color="#C71585">mediumvioletred</option>
                                    <option value="123" data-color="#000000">black</option>
                                </select> -->
                                <div class="tool">
                                    <button class="color-tool active" style="background-color: #212121;"></button>
                                    <button class="color-tool" style="background-color: red;"></button>
                                    <button class="color-tool" style="background-color: blue;"></button>
                                    <button class="color-tool" style="background-color: green;"></button>
                                    <button class="color-tool" style="background-color: yellow;"></button>
                                </div>
                                <div class="tool">
                                    <button class="tool-button active"><i class="fa fa-pen" style="color: white;" title="Pencil" onclick="enablePencil(event)"></i></button>
                                </div>
                                <div class="tool">
                                    <button class="tool-button"><i class=" fa fa-hand-paper-o" title="Free Hand" onclick="enableSelector(event)"></i></button>
                                </div>
                                <div class="tool">
                                    <button class="tool-button"><i class="fa fa-font" title="Add Text" onclick="enableAddText(event)"></i></button>
                                </div>
                                <div class="tool">
                                    <button class="tool-button"><i class="fa fa-arrow-right" title="Add Arrow" onclick="enableAddArrow(event)"></i></button>
                                </div>
                                <div class="tool">
                                    <button class="tool-button"><i class="fa fa-object-group" title="Add rectangle" onclick="enableRectangle(event)"></i></button>
                                </div>
                                <div class="tool">
                                    <button class="tool-button"><i class="fa fa-picture-o" title="Add an Image" onclick="addImage(event)"></i></button>
                                </div>
                                <div class="tool">
                                    <button class="btn btn-danger btn-sm" id="btn" onclick="deleteSelectedObject(event)"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <div id="pdf-container"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="attach_id" class="attachID">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn" id="btn" onclick="clearPage()">Clear Page</button>
                    <button class="btn" id="btn" onclick="showPdfData()"><i class="fa fa-download"></i> JSON Data</button>
                    <button type="submit" class="btn" id="btn" onclick="savePDF()"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript">
    
</script> -->