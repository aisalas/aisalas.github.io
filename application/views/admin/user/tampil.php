<div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
              </li>
              <li class="breadcrumb-item active"><span>Dashboard</span></li>
            </ol>
          </nav>
        </div>
      </header>
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <div class="row">
<!-- Main content -->
<section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Username</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>No Telpon</th>
                                        <th>Alamat</th>
                                        <th style="width: 205px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $val) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $val->username; ?></td>
                                            <td><?php echo $val->nama_user; ?></td>
                                            <td><?php echo $val->email_user; ?></td>
                                            <td><?php echo $val->no_telepon; ?></td>
                                            <td><?php echo $val->alamat; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo site_url('data_user/delete/' . $val->id_user); ?>" onclick="return confirm('Yakin Akan Menghapus Data ini?')" class="btn btn-danger">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
            
            <!-- /.col-->
          <!-- </div> -->
          <!-- /.row-->
          
                       
          </div>
          <!-- /.row-->
        </div>
      </div>

    
