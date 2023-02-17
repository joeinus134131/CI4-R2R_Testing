<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Consolidation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Consolidation</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card">
                        <form method="post" action="<?php echo base_url('excelImport/import'); ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-block btn-warning btn-md" onclick="window.history.go(-1); return false;"><i class="fas fa-backward"></i> Back</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn ungu btn-block btn-success btn-md"><i class="fas fa-save"></i> Save Changes</button>
                                </div>
                            </div>
                            <div class="card-header ungu float-center mt-3">
                                <h3 class="card-title"><i class="fa fa-file"></i> R2R - Upload Financial Statement</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="input-group col-md-6">
                                        <label>Nama Requester</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-terminal"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nama Requester" aria-label="nama" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Request Type</label>
                                        <div class="input-group mb-3">
                                            <select class="form-control select2" style="width: 100%;">
                                                <option selected="selected">Pilih</option>
                                                <option>Consolidation</option>
                                                <option>Intercompany</option>
                                                <option>Console Package</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group col-md-6">
                                        <label>Nama Perusahaan</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-terminal"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nama Requester" aria-label="nama" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="input-group col-md-6">
                                        <label>Reference</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-terminal"></i></span>
                                            </div>
                                            <textarea class="form-control" placeholder="Tambahan Informasi"></textarea>
                                        </div>
                                    </div>
                                    <div class="input-group col-md-6">
                                        <label>Upload Trial Balance</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-terminal" id="basic-addon1"></span>
                                            </div>
                                            <input type="file" id="fileInput" class="form-control" name="berkas" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- <button>
                            <a class="btn ungu btn-block btn-success btn-md" onclick="showdatatable()"><i class="fas fa-eye"></i> Tampilkan</a>
                        </button>
                        <button>
                            <a class="btn ungu btn-block btn-primary btn-md" onclick="hidedatatable()"><i class="fas fa-eye"></i> Sembunyikan</a>
                        </button>
                        <button>
                            <a class="btn ungu btn-block btn-primary btn-md" onclick="addClass_tr()"><i class="fas fa-plus"></i> Tambah Kelas</a>
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content datatable-view" style="display: none;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header ungu float-center mt-3">
                            <h3 class="card-title"><i class="fa fa-map"></i> Mapping Master Data Trial Balance</h3>
                        </div>
                        <div class="card-body">
                            <div id="trial_balance_table">
                                <table id="consolidation-table" class="table table-bordered table-striped">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" role="tablist" id="nav-tabs-attachments">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#attachments"><i class="fas fa-file-alt"></i> Attachments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#referdocument"><i class="fas fa-file-alt"></i> Refer Documents</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#referdocument"><i class="fas fa-file-alt"></i> Refer Documents</a>
                        </li> -->
                    </ul>
                </div>
                <div class="card-body">
                    <div id="attachments" class="container tab-pane"><br>
                        <button type="button" class="btn btn-outline-info btn-md" data-toggle="modal" data-target="#modal_attachment" id="btn-add-attachment"><i class="fas fa-plus"></i> Add Attachment</button>
                        <p>
                        <div class="table-responsive">
                            <table id="attachments_draft_list" class="table table-bordered table-striped table-hover nowrap datatable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Jenis Document</th>
                                        <th width="20%">Name</th>
                                        <th width="10%">Name Nodes</th>
                                        <th width="10%">Size</th>
                                        <th width="10%">Attachment ID</th>
                                        <th width="10%">Version Document</th>
                                        <th width="10%">Note</th>
                                        <th width="10%">Upload By</th>
                                        <th width="10%">Upload At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        </p>
                    </div>
                    <!-- <div id="referdocument" class="container tab-pane">
                        <br />
                        <table id="doc_referdocument" class="table table-striped table-hover" style="cursor:pointer;">
                            <tbody>
                            </tbody>
                        </table>

                        <table id="list_doc_referdocument" class="table table-striped table-hover" style="cursor:pointer;">
                            <thead class="thead-dark" style="text-align:center;">
                                <tr>
                                    <th>List Attacment</th>
                                    <th>Download</th>
                                    <th>Check</th>
                                </tr>
                        </table>
                    </div> -->
                </div>
            </div>
    </section>
</div>