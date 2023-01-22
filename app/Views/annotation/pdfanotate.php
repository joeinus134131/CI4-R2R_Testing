<?php
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
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Modal Json data -->
            <div class="card">
                <div class="card-header">
                    <!-- Tambah attachment -->
                    <button class="btn btn-outline-success" data-toggle="modal" data-target="#addModal">
                        <i class="nav-icon fa fa-plus" style="color: green;"></i>
                        Add Attachment
                    </button>
                    <button class="btn" id="btn" data-toggle="modal" data-target="">
                        <i class="nav-icon fa fa-file-archive-o"></i>
                        Download (ZIP)
                    </button>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- PDF View Modal -->
                    <div class="modal fade bd-example-modal-lg" id="anotateModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myLargeModalLabel">PDF Anotation - <p id="filename"></p>
                                    </h5>
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
                                                <div class="tool">
                                                    <select id="colorselector">
                                                        <option value="#212121" data-color="#212121" selected>black</option>
                                                        <option value="red" data-color="red">red</option>
                                                        <option value="blue" data-color="blue">blue</option>
                                                        <option value="green" data-color="green">green</option>
                                                        <option value="yellow" data-color="yellow">yellow</option>
                                                        <option value="#A0522D" data-color="#A0522D">sienna</option>
                                                        <option value="#FF4500" data-color="#FF4500">orangered</option>
                                                        <option value="#008B8B" data-color="#008B8B">darkcyan</option>
                                                        <option value="#B8860B" data-color="#B8860B">darkgoldenrod</option>
                                                        <option value="#32CD32" data-color="#32CD32">limegreen</option>
                                                        <option value="#FFD700" data-color="#FFD700">gold</option>
                                                        <option value="#48D1CC" data-color="#48D1CC">mediumturquoise</option>
                                                        <option value="#87CEEB" data-color="#87CEEB">skyblue</option>
                                                        <option value="#FF69B4" data-color="#FF69B4">hotpink</option>
                                                        <option value="#CD5C5C" data-color="#CD5C5C">indianred</option>
                                                        <option value="#87CEFA" data-color="#87CEFA">lightskyblue</option>
                                                        <option value="#6495ED" data-color="#6495ED">cornflowerblue</option>
                                                        <option value="#DC143C" data-color="#DC143C">crimson</option>
                                                        <option value="#FF8C00" data-color="#FF8C00">darkorange</option>
                                                        <option value="#C71585" data-color="#C71585">mediumvioletred</option>
                                                    </select>
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
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
                                    <button class="btn" id="btn" onclick="clearPage()"><i class="fa fa-magic"></i> Clear Page</button>
                                    <button type="submit" class="btn" id="btn" onclick="savePDF()"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Attachment Modal -->
                    <form action="<?php echo base_url('/pdf/attachment/upload'); ?>" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" id="modal-header-add">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fa fa-lock" style="color: #212121;"></i> Add Attachment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #212121;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Document Type</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-terminal" id="basic-addon1"></span>
                                            </div>
                                            <input type="text" class="form-control" name="document_type" placeholder="Document Type">
                                        </div>
                                        <label>Upload Document</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-terminal" id="basic-addon1"></span>
                                            </div>
                                            <input type="file" class="form-control" name="berkas" />
                                        </div>
                                        <label>Note</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-terminal" id="basic-addon1"></span>
                                            </div>
                                            <input type="text" class="form-control" name="note" placeholder="Note">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="nav-icon fa fa-ban"></i> Close</button>
                                        <button type="submit" class="btn" id="btn"><i class="nav-icon fa fa-paper-plane"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- succes upload attachment -->
                <div id="successaddModal" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                        <div class="modal-content">
                            <div class="modal-header-success flex-column">
                                <div class="icon-box">
                                    <i class="fa fa-check"></i>
                                </div>
                                <h4 class=" modal-title w-100">Success</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>Succefully add attachment</p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
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
                                                <a class="btn btn-secondary btn-delete" id="btn-del" data-id="<?= $row->attach_id; ?>"><i class="nav-icon fa fa-trash"></i></a>
                                                <a href="" class="btn btn-secondary" id="btn"><i class="nav-icon fa fa-download"></i></a>
                                                <a class="btn btn-preview btn-secondary" id="btn btn-anotasi" data-id="<?= $row->attach_id; ?>" data-name="<?= $row->name; ?>" data-toggle="modal" data-target="#anotateModal"><i class="nav-icon fa fa-<?= $iconset; ?>"></i></a>
                                            </div>
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
                            <div class="modal-dialog modal-confirm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header-success flex-column">
                                        <div class="icon-box-del">
                                            <i class="fa fa-exclamation"></i>
                                        </div>
                                        <h4 class=" modal-title w-100">Warning</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
                                    <div class="modal-footer justify-content-center">
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
</div>