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
                <!-- left column-->
                <div class="col-md-8">
                    <!-- Horizontal Form-->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Kategori</h3>
                        </div>
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="<?php echo site_url('kategori/edit');?>">
                        <input type="hidden" name="id" value="<?php echo $kategori->id_kategori; ?>">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Kategori</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_kategori" value="<?php echo $kategori->nama_kategori; ?>" class="form-control" id="inputEmail3" placeholder="Nama Kategori">
                                    <?php echo form_error('nama_kategori', '<small class="text-danger pl-0">', '</small>'); ?>
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
        </div>
    </section>
            
            <!-- /.col-->
          <!-- </div> -->
          <!-- /.row-->
          
                       
          </div>
          <!-- /.row-->
        </div>
      </div>