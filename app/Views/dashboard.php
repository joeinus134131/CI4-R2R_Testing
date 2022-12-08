<?php
$db = \Config\Database::connect();
$query = $db->query('SELECT * FROM interco');
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
                    <h1>R2R Finance Management</h1>
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
        <!-- /.card -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- Default box -->
                            <div class="card">
                                <div class="cara-header">
                                    <!-- Tambah data -->
                                    <button class="btn" id="btn" data-toggle="modal" data-target="#myModal">
                                        <i class="nav-icon fa fa-plus-square"></i>
                                        Tambah Data
                                    </button>

                                    <!-- Modal popup form -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <?php
                                        $db = \Config\Database::connect();
                                        $query->getResult();
                                        ?>
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #3F3192; color: white;">
                                                    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">ID Flow</label>
                                                                <input type="text" class="form-control" name="id_flow">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">Flow Name</label>
                                                                <input type="text" class="form-control" name="flow_name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Status</label>
                                                                <input type="text" class="form-control" name="status">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputFile">File input</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                    </div>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Upload</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn" id="btn" name="Submit">Save
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        // echo "<script>alert('Data berhasil akses!');</script>";
                                        if (isset($_POST['Submit'])) {
                                            echo "<script>alert('Data berhasil ditambahkan!');</script>";
                                            $id_flow = $_POST['id_flow'];
                                            $flow_name = $_POST['flow_name'];
                                            $status = $_POST['status'];
                                            if ($id_flow == "" || $flow_name == "" || $status == "") {
                                                echo "<script>alert('data tidak boleh kosong')</script>";
                                            } else {

                                                $result = $db->query('INSERT INTO `interco`(`id_flow`,`flow_name`, `status`) VALUES ("$id_flow", "$flow_name","$status")');
                                            }
                                        }
                                        ?>

                                    </div>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datatable1" class="table table-bordered table-striped">
                                        <thead style="background-color: #3F3192; color: white;">
                                            <tr>
                                                <th>No</th>
                                                <th>ID Flow</th>
                                                <th>Flow Name</th>
                                                <th>Status</th>
                                                <th>Create at</th>
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
                                                    <td><?php echo $row->id_flow; ?></td>
                                                    <td><?php echo $row->flow_name; ?></td>
                                                    <td><?php echo $row->status; ?></td>
                                                    <td><?php echo $row->create_at; ?></td>
                                                    <td>
                                                        <button class="btn" id="btn" data-toggle="modal" data-target="#modal<?php echo $row->id_flow; ?>">
                                                            <i class="nav-icon fa fa-cog"></i>
                                                        </button>
                                                        <?php
                                                        $db = \Config\Database::connect();
                                                        $query = $db->query("SELECT * FROM interco WHERE id_flow = '$row->id_flow'");
                                                        ?>
                                                        <div class="modal fade" id="modal<?php echo $row->id_flow; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: #3F3192; color: white;">
                                                                        <h4 class="modal-title" id="myModalLabel">Edit Process</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    </div>
                                                                    <!-- isi form popup -->
                                                                    <div class="modal-body">
                                                                        <!-- Small button groups (default and split) -->
                                                                        <form>
                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlInput1">Flow Name</label>
                                                                                <input type="text" class="form-control" value="<?php echo $row->flow_name; ?>">
                                                                            </div>
                                                                            <!-- Date dd/mm/yyyy -->
                                                                            <!-- <div class="form-group">
                                                                                <label>Date masks:</label>

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                                                </div>
                                                                                /.input group
                                                                            </div> -->
                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlInput1">Status</label>
                                                                                <input type="text" class="form-control" value="<?php echo $row->status; ?>">
                                                                            </div>
                                                                            <div class="btn-group" style="color: #3F3192;">
                                                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    Plugin Choice
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <button class="dropdown-item" type="button" value="rules">Simple Rules Decision</button>
                                                                                    <button class="dropdown-item" type="button" value="ai">Simple AI Decision</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn" id="btn">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php $data = $row->id_flow; ?>
                                                        <a href=" /delete" class=" btn" id="btn"><i class="nav-icon fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->