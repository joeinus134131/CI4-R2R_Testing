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
                          <li class="breadcrumb-item active">Consolidation</li>
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
                  <button class="btn" id="btn" data-toggle="modal" data-target="#myModal">
                      Tambah Data
                  </button>

                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
                              <div class="modal-body">
                                  <form>
                                      <div class="form-group">
                                          <label for="exampleFormControlInput1">ID Process</label>
                                          <input type="text" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleFormControlTextarea1">Nama Proses</label>
                                          <textarea class="form-control" rows="5"></textarea>
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleFormControlInput1">Jenis Berkas</label>
                                          <input type="text" class="form-control" value="">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleFormControlInput1">Besaran Data</label>
                                          <input type="text" class="form-control" value="">
                                      </div>
                                  </form>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn" id="btn">Save
                                  </button>
                              </div>
                          </div>
                      </div>
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

              <!-- Table -->
              <table class="table">
                  <thead style="background-color: #3F3192; color: white;">
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Transaction</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <th scope="row">1</th>
                          <td>R2R Reuest Sign</td>
                          <td>Infomedia</td>
                          <td>
                              <button class="btn" id="btn" data-toggle="modal" data-target="#edit1">
                                  Edit
                              </button>

                              <div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title" id="myModalLabel">Edit Process</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                          </div>
                                          <div class="modal-body">
                                              <form>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlInput1">Nama Barang</label>
                                                      <input type="text" class="form-control">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Deskripsi Barang</label>
                                                      <textarea class="form-control" rows="5"></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlInput1">Jenis Barang</label>
                                                      <input type="text" class="form-control" value="">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlInput1">Harga Barang</label>
                                                      <input type="text" class="form-control" value="">
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
                              <button class="btn" id="btn" data-toggle="modal">
                                  Delete
                              </button>
                          </td>
                      </tr>
                      <tr>
                          <th scope=" row">2</th>
                          <td>R2R Telkom Infomedia</td>
                          <td>Infomedia</td>
                          <td>
                              <button class="btn" id="btn" data-toggle="modal" data-target="#edit2">
                                  Edit
                              </button>

                              <div class="modal fade" id="edit2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title" id="myModalLabel">Edit Process</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          </div>
                                          <!-- isi form popup -->
                                          <div class="modal-body">
                                              <!-- Small button groups (default and split) -->
                                              <form>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlInput1">Nama Barang</label>
                                                      <input type="text" class="form-control">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Deskripsi Barang</label>
                                                      <textarea class="form-control" rows="5"></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlInput1">Jenis Barang</label>
                                                      <input type="text" class="form-control" value="">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlInput1">Harga Barang</label>
                                                      <input type="text" class="form-control" value="">
                                                  </div>
                                                  <div class="btn-group" style="color: #3F3192;">
                                                      <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          Plugin Choice
                                                      </button>
                                                      <div class="dropdown-menu">
                                                          <button class="dropdown-item" type="button">Simple Rules</button>
                                                          <button class="dropdown-item" type="button">Simple AI Decision</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <button type="button" class="btn" id="btn"">Save</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <button class=" btn" id="btn" data-toggle="modal">
                                                  Delete
                                              </button>
                          </td>
                      </tr>
                  </tbody>
              </table>
              <!-- End Table -->

          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->