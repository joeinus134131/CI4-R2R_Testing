  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Ai Decision</h1>
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

          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Simple AI Decision Plugin Configuration</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                          <i class="fas fa-times"></i>
                      </button>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="card card-default">
                          <div class="card-body p-0">
                              <div class="bs-stepper">
                                  <div class="bs-stepper-header" role="tablist">
                                      <!-- your steps here -->
                                      <div class="step" data-target="#logins-part">
                                          <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                              <span class="bs-stepper-circle">1</span>
                                              <span class="bs-stepper-label">Configure</span>
                                          </button>
                                      </div>
                                      <div class="line"></div>
                                      <div class="step" data-target="#information-part">
                                          <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                              <span class="bs-stepper-circle">2</span>
                                              <span class="bs-stepper-label">Model Upload</span>
                                          </button>
                                      </div>
                                  </div>
                                  <div class="bs-stepper-content">
                                      <!-- your steps content here -->
                                      <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>Field Input</label>
                                                      <select class="form-control select2" style="width: 100%;">
                                                          <option selected="selected">Alabama</option>
                                                          <option>Alaska</option>
                                                          <option>California</option>
                                                          <option>Delaware</option>
                                                          <option>Tennessee</option>
                                                          <option>Texas</option>
                                                          <option>Washington</option>
                                                      </select>
                                                  </div>
                                                  <!-- /.form-group -->
                                                  <div class="form-group">
                                                      <label>Output</label>
                                                      <select class="form-control select2" style="width: 100%;">
                                                          <option selected="selected">Alabama</option>
                                                          <option>Alaska</option>
                                                          <option>California</option>
                                                          <option>Delaware</option>
                                                          <option>Tennessee</option>
                                                          <option>Texas</option>
                                                          <option>Washington</option>
                                                      </select>
                                                  </div>
                                                  <!-- /.form-group -->
                                              </div>
                                              <!-- /.col -->
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>Multiple</label>
                                                      <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                                          <option>Alabama</option>
                                                          <option>Alaska</option>
                                                          <option>California</option>
                                                          <option>Delaware</option>
                                                          <option>Tennessee</option>
                                                          <option>Texas</option>
                                                          <option>Washington</option>
                                                      </select>
                                                  </div>
                                                  <!-- /.form-group -->
                                                  <div class="form-group">
                                                      <label>Disabled Result</label>
                                                      <select class="form-control select2" style="width: 100%;">
                                                          <option selected="selected">Alabama</option>
                                                          <option>Alaska</option>
                                                          <option disabled="disabled">California (disabled)</option>
                                                          <option>Delaware</option>
                                                          <option>Tennessee</option>
                                                          <option>Texas</option>
                                                          <option>Washington</option>
                                                      </select>
                                                  </div>
                                                  <!-- /.form-group -->
                                              </div>
                                              <!-- /.col -->
                                          </div>
                                          <!-- /.row -->

                                          <h5>Custom Color Variants</h5>
                                          <div class="row">
                                              <div class="col-12 col-sm-6">
                                                  <div class="form-group">
                                                      <label>Minimal (.select2-danger)</label>
                                                      <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                          <option selected="selected">Alabama</option>
                                                          <option>Alaska</option>
                                                          <option>California</option>
                                                          <option>Delaware</option>
                                                          <option>Tennessee</option>
                                                          <option>Texas</option>
                                                          <option>Washington</option>
                                                      </select>
                                                  </div>
                                                  <!-- /.form-group -->
                                              </div>
                                              <!-- /.col -->
                                              <div class="col-12 col-sm-6">
                                                  <div class="form-group">
                                                      <label>Multiple (.select2-purple)</label>
                                                      <div class="select2-purple">
                                                          <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                              <option>Alabama</option>
                                                              <option>Alaska</option>
                                                              <option>California</option>
                                                              <option>Delaware</option>
                                                              <option>Tennessee</option>
                                                              <option>Texas</option>
                                                              <option>Washington</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <!-- /.form-group -->
                                              </div>
                                              <!-- /.col -->
                                          </div>
                                          <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                      </div>
                                      <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                          <div class="form-group">
                                              <label for="exampleInputFile">Input ML Model</label>
                                              <div class="input-group">
                                                  <div class="custom-file">
                                                      <input type="file" class="custom-file-input" id="exampleInputFile">
                                                      <label class="custom-file-label" for="exampleInputFile">Choose model file</label>
                                                  </div>
                                                  <div class="input-group-append">
                                                      <span class="input-group-text">Upload</span>
                                                  </div>
                                              </div>
                                          </div>
                                          <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
          </div>
          <!-- /.card -->
      </section>
  </div>
  <script>
      // BS-Stepper Init
      document.addEventListener('DOMContentLoaded', function() {
          window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      })
  </script>