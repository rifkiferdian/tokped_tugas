  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Ubah Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Member</li>
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
                <h3 class="card-title">Status Member</h3>
              </div>
              <!-- form start -->
              <form class="form-horizontal" method="post" action="<?php echo site_url('Member/edit');?>">
			         <input type="hidden" name="id" value="<?php echo $Member->idKonsumen; ?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Member</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="statusAktif">
                        <?php foreach ($statusArray as $key => $value): ?>
                          <?php if ($Member->statusAktif == $key): ?>
                            <option value="<?= $key ?>" selected><?= $value ?></option>
                          <?php else: ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                          <?php endif ?>
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
