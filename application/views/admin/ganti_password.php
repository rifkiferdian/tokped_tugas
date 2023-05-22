  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Ubah Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Profil</a></li>
              <li class="breadcrumb-item active">Ubah Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Form Ubah Password</h3>
              </div>
              <!-- form start -->
              <form class="form-horizontal" method="post" action="<?php echo site_url('kategori/edit');?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Password Lama</label>
                    <div class="col-sm-9">
                      <input type="text" name="password" value="" class="form-control" id="inputEmail3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Password Baru</label>
                    <div class="col-sm-9">
                      <input type="text" name="password" value="" class="form-control" id="inputEmail3" placeholder="Password Baru">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Ulangi Password</label>
                    <div class="col-sm-9">
                      <input type="text" name="password" value="" class="form-control" id="inputEmail3" placeholder="Ulangi Password">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Simpan</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
