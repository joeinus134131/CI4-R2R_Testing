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
                        <form method="post" enctype="multipart/form-data">
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
                                            <input type="file" class="form-control" name="berkas" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <nav class="nav-tabmenu">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Refer Documents</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Attachments</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Import Master Data</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="content">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title
                                                ">
                                                        Data
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>