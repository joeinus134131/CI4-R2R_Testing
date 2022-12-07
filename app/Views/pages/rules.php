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
                    <h1>Simple Rules Plugin Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Rules</li>
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
                                <div class="card-header">
                                    <!-- Tambah data -->
                                    <button class="btn" id="btn" data-toggle="modal" data-target="#myModal">
                                        <i class="nav-icon fa fa-plus-square"></i>
                                        Tambah Data
                                    </button>

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
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                            <h2>Upload Files</h2>
                                                            <p>
                                                                Select files to upload:
                                                                <!-- name of the input fields are going to be used in our php script-->
                                                                <input type="file" name="files[]" multiple>
                                                                <br><br>
                                                                <!-- <input type="submit" name="submit" value="Upload"> -->
                                                            </p>
                                                        </form>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn" id="btn" name="Submit" value="submit">Save
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
                                    <div class="row">
                                        <label>IF</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Parameter 1</label>
                                                <select class="form-control">
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Parameter 1</label>
                                                <select class="form-control">
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label>Parameter 1</label>
                                                <select class="form-control">
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>ELSE THEN</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Parameter 1</label>
                                                <select class="form-control">
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Parameter 1</label>
                                                <select class="form-control">
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <button href="#" type="submit" class="btn" id="btn">Save
                                </button>
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