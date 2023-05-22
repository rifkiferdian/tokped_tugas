<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Tambah Toko</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Member</a></li>
              <li class="breadcrumb-item active">Toko</li>
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
                <h3 class="card-title">Form Tambah Toko</h3>
              </div>
              <!-- form start -->
              <div class="container">
                  <?php if($this->session->flashdata('message')): ?>
                    <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('message').'</p>'; ?>
                  <?php endif; ?>
              </div>
              <?php if (!empty(validation_errors())): ?>
                <?php echo validation_errors('<p class="alert alert-warning">', '</p>'); ?>
              <?php endif ?>
              <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('kelolatoko/add');?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Toko</label>
                    <div class="col-sm-9">
                      <input type="text" name="namaToko" value="" class="form-control" id="inputEmail3" placeholder="Nama Toko">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi ..."></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Logo</label>
                    <div class="col-sm-9">
                      <input type="file" name="logo" value="" class="form-control" id="inputEmail3" placeholder="Logo">
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
