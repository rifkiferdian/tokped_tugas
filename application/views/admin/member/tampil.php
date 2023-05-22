<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manajemen Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manajemen Member</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Member</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Username</th>                  
                      <th>Nama Konsumen</th>                  
                      <th>Email</th>                  
                      <th>Tlp</th>                  
                      <th>Alamat</th>                  
                      <th>Status</th>                  
                      <th style="width: 150px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php $no=1; foreach($member as $val){?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $val->username; ?></td>
                      <td><?php echo $val->namaKonsumen; ?></td>
                      <td><?php echo $val->email; ?></td>
                      <td><?php echo $val->tlpn; ?></td>
                      <td><?php echo $val->alamat; ?></td>
                      <td><?php echo $retVal = ($val->statusAktif == 'Y') ? 'Aktif' : 'Non Aktif' ; ?></td>
                      <td>
                        <div class="btn-group">
                          <a href="<?php echo site_url('Member/get_by_id/'.$val->idKonsumen);?>" class="btn btn-warning">Edit</a>
                          <a href="<?php echo site_url('Member/delete/'.$val->idKonsumen);?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger">Hapus</a>
                        </div>
                      </td>
                    </tr>
					<?php $no++; } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
			  <!-- <a href="<?php echo site_url('Member/add');?>" class="btn btn-sm btn-info float-left">Tambah Member</a> -->
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
