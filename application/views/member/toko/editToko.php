<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Edit Toko</h1>
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
                <h3 class="card-title">Form Edit Toko</h3>
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
              <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo site_url('kelolatoko/edit');?>">
                <input type="text" style="display: none;" name="idToko" value="<?= $data->idToko ?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Toko</label>
                    <div class="col-sm-9">
                      <input type="text" name="namaToko" class="form-control" id="inputEmail3" placeholder="Nama Toko" value="<?= $data->namaToko ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi ..."><?= $data->deskripsi ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Logo</label>
                    <div class="col-sm-9">
                      <input type="file" name="logo" class="form-control" id="inputEmail3" placeholder="Logo">
                    </div>
                  </div>
                  <?php $ArraystatusAktif = array('Y' => 'Aktif' , 'N' => 'TIdak Aktif' ); ?>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Status Aktif</label>
                    <div class="col-sm-9">
						<select class="form-control" name="statusAktif">
							<?php foreach ($ArraystatusAktif as $key => $value): ?>
								<?php if ($data->statusAktif == $key): ?>
									<?php $selected = 'selected' ?>
								<?php else: ?>
									<?php $selected = '' ?>
								<?php endif ?>

								<option value="<?= $key ?>" <?= $selected ?>><?= $value ?></option>
							<?php endforeach ?>
						</select>
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
