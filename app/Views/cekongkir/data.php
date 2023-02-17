<div class="content-wrapper">
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
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card">
                        <form method="post" action="<?php echo site_url('CekOngkir/cekongkir') ?>">
                            <div class="card-header ungu float-center mt-3">
                                <h3 class="card-title"><i class="fa fa-file"></i> Cek Ongkos Kirim</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Berat Paket</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-terminal"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Berat Barang" name="berat" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Jenis kurir</label>
                                        <div class="input-group mb-3">
                                            <select class="form-control auto_search" style="width: 100%;" name="kurir">
                                                <option value="">Pilih kurir</option>
                                                <option value="jne">JNE</option>
                                                <option value="tiki">TIKI</option>
                                                <option value="pos">POS INDONESIA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" form-group col-md-6">
                                        <label>Nama Kota asal</label>
                                        <div class="input-group mb-3">
                                            <select class="form-control auto_search" style="width: 100%;" name="asal">
                                                <option value="">Pilih kota</option>
                                                <?php if ($hasil) : ?>
                                                    <?php foreach ($hasil->rajaongkir->results as $kota) : ?>
                                                        <option value="<?php echo $kota->city_id; ?>"><?php echo $kota->city_name; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" form-group col-md-6">
                                        <label>Nama Kota Tujuan</label>
                                        <div class="input-group mb-3">
                                            <select class="form-control auto_search" style="width: 100%;" name="tujuan">
                                                <option value="">Pilih kota</option>
                                                <?php if ($hasil) : ?>
                                                    <?php foreach ($hasil->rajaongkir->results as $kota) : ?>
                                                        <option value="<?php echo $kota->city_id; ?>"><?php echo $kota->city_name; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn ungu btn-block btn-success btn-md"><i class="fas fa-save"></i> Cek Ongkir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content datatable-view" style="display: ;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header ungu float-center mt-3">
                            <h3 class="card-title"><i class="fa fa-map"></i> Hasil cek ongkos kirim</h3>
                        </div>
                        <div class="card-body">
                            <div id="trial_balance_table">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Perusahaan</th>
                                            <th>Kode Account</th>
                                            <th>Nama Account</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>PT. Infomedia Nusantara</td>
                                            <td>1000</td>
                                            <td>Administrator</td>
                                        </tr>
                                        <tr>
                                            <td>PT. Infomedia Nusantara</td>
                                            <td>1001</td>
                                            <td>Pembelian Pajak</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>