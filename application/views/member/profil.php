  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Profil</a></li>
              <li class="breadcrumb-item active">Member</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="container">
              <?php if($this->session->flashdata('message')): ?>
                <?php echo '<p class="alert alert-info">'.$this->session->flashdata('message').'</p>'; ?>
              <?php endif; ?>
          </div>
          <!-- left column -->
          <div class="col-md-4"></div>
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url() ?>assets/admin/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $data->namaKonsumen ?></h3>

                <p class="text-muted text-center">Member</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>ID Member</b> <a class="float-right"><?= $data->idKonsumen ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?= $data->email ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Telp</b> <a class="float-right"><?= $data->tlpn ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right"><?= $data->alamat ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Kota</b> <a class="float-right"><?= $kota[$data->idKota] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Password</b> <a class="float-right">*****</a>
                  </li>
                </ul>

                <a href="<?= site_url('memberpanel/editMemberForm') ?>" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
