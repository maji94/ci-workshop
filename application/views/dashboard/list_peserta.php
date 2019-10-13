<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Workshop</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="clearfix"></div>
            <a class="btn btn-success" href="<?php echo site_url('dashboard/workshop/cetak/'.$this->uri->segment(4)); ?>" target="_blank"><i class="fa fa-print"></i> Cetak Daftar Hadir</a>
            <a href="<?php echo site_url('dashboard/workshop/detail/'.$this->uri->segment(4)); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
  
            <h2 style="margin: 0px;"><small>Daftar/List Peserta Workshop : <?php if ($peserta) {echo $peserta[0]->nm_kegiatan;} ?></small></h2>
            <div class="ln_solid"></div>
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="5%">No.</th>
                  <th width="12%">Foto</th>
                  <th width="18%">Nama</th>
                  <th width="15%">NIP</th>
                  <th width="40%">Asal Instansi/Organisasi</th>
                  <th width="10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($peserta as $d) { ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td align="center"><img width="60" height="80" src="<?php echo base_url('assets/back/images/peserta/'.str_replace('.', '_thumb.', $d->foto)) ?>" alt="gambar narasumber"></td>
                    <td><?php echo $d->nama; ?></td>
                    <td><?php echo $d->nip; ?></td>
                    <td><?php echo $d->unker; ?></td>
                    <td align="center">
                      <button type="button" class="btn btn-warning" style="width: 80px;" 
                        data-toggle="modal" data-target="#detail" 
                        data-foto="<?php echo base_url('assets/back/images/peserta/'.str_replace('.', '_thumb.', $d->foto)) ?>"
                        data-nip="<?php echo $d->nip; ?>"
                        data-nama="<?php echo $d->nama; ?>"
                        data-ktp="<?php echo $d->ktp ?>"
                        data-tmp_lahir="<?php echo $d->tmp_lahir; ?>"
                        data-tgl_lahir="<?php echo tgl_indo(date($d->tgl_lahir)); ?>"
                        data-jns_kelamin="<?php echo $d->jns_kelamin; ?>"
                        data-agama="<?php echo $d->agama; ?>"
                        data-pendidikan="<?php echo $d->pendidikan; ?>"
                        data-alamat_rm="<?php echo $d->alamat_rm; ?>"
                        data-email="<?php echo $d->email; ?>"
                        data-nohp="<?php echo $d->nohp; ?>"
                        data-jabatan="<?php echo $d->jabatan; ?>"
                        data-golongan="<?php echo $d->golongan; ?>"
                        data-unker="<?php echo $d->unker; ?>"
                        data-kab="<?php echo $d->kab; ?>"
                        data-alamat_kt="<?php echo $d->alamat_kt; ?>"
                        data-npwp="<?php echo $d->npwp; ?>"
                        data-norek="<?php echo $d->norek; ?>" >
                        <i class="fa fa-search"></i> Detail
                      </button><br>
                      <a style="width: 80px" class="btn btn-default" href="<?php echo site_url('dashboard/workshop/delete_peserta/'.$d->id_peserta); ?>" onclick="return confirm('Data ini akan terhapus. Lanjutkan ?');"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                <?php $no++; } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <img id="foto" alt="img" style="width: 50%;margin: 0 auto 20px;display: block;border: 1px solid grey;">
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12" style="padding-left: 30px;">
            <span>NIP : <br></span><label id="nip"></label><br>
            <span>Nama : <br><label style="text-transform: capitalize;" id="nama"></label></span><br>
            <span>KTP : <br><label id="ktp"></label></span><br>
            <span>Tempat, Tanggal Lahir : <br><label style="text-transform: capitalize;" id="ttl"></label></span><br>
            <span>Jenis Kelamin : <br><label style="text-transform: capitalize;" id="jns_kelamin"></label></span><br>
            <span>Agama : <br><label style="text-transform: capitalize;" id="agama"></label></span><br>
            <span>Pendidikan : <br><label style="text-transform: capitalize;" id="pendidikan"></label></span><br>
            <span>Alamat Rumah : <br><label id="alamat_rm"></label></span><br>
          </div>
            <div class="col-md-6 col-sm-12 col-xs-12" style="padding-left: 30px;">
            <span>Email/Hp : <br><label id="emailhp"></label></span><br>
            <span>Unit Kerja : <br><label style="text-transform: capitalize;" id="unkerkab"></label></span><br>
            <span>Alamat Kantor : <br><label id="alamat_kt"></label></span><br>
            <span>Jabatan/Golongan : <br><label style="text-transform: capitalize;" id="jabgol"></label></span><br>
            <span>NPWP : <br><label id="npwp"></label></span><br>
            <span>No. Rekening : <br><label id="norek"></label></span><br>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>