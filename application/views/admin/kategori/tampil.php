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
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Kategori</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama Kategori</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kategori as $val) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $val->nama_kategori; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo site_url('kategori/get_by_id/' . $val->id_kategori); ?>" class="btn btn-warning">Edit</a>
                                                    <a href="<?php echo site_url('kategori/delete/' . $val->id_kategori); ?>" onclick="return confirm('Yakin Akan Menghapus Data ini?')" class="btn btn-danger">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="<?php echo site_url('kategori/add'); ?>" class="btn btn-sm btn-info float-left">Tambah Kategori</a>
                            <!-- <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
            
            <!-- /.col-->
          <!-- </div> -->
          <!-- /.row-->
          
                       
          </div>
          <!-- /.row-->
        </div>
      </div>