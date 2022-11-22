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
              <!-- Table -->
              <table class="table">
                  <thead style="background-color: #3F3192; color: white;">
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Status</th>
                          <th scope="col">Create at</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <th scope="row">1</th>
                          <td>R2R Process</td>
                          <td>Proposal Request</td>
                          <td>2021-01-01</td>
                          <td>
                              <!-- Small button groups (default and split) -->
                              <div class="btn-group">
                                  <button class="btn" style="background-color: #3F3192; color: white;" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Condition
                                  </button>
                                  <div class="dropdown-menu">
                                      <button class="dropdown-item" type="button">IF</button>
                                      <button class="dropdown-item" type="button">IF ELSE</button>
                                      <button class="dropdown-item" type="button">ELSE</button>
                                  </div>
                              </div>
                          </td>
                      </tr>
                  </tbody>
              </table>
              <!-- End Table -->

          </div>
          <!-- /.card -->

      </section>
  </div>