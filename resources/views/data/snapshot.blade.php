<div class="row">
  <div class="col-md-12">
  <table class="table table-bordered">
    <tr>
      <th colspan="3">
        <span>1. Data Pribadi</span>
        <span class="pull-right"><a href='{{Route("AdminDataPeroranganControllerGetEdit")}}'><button class="btn btn-xs btn-warning">Edit Detail</button></a></span>
      </th>
    </tr>
    @widget('DataPribadi')

    <tr>
      <th colspan="3">
        <span>2. Data Pendidikan</span>
        <span class="pull-right"><a href='{{Route("AdminDataPendidikanControllerGetIndex")}}'><button class="btn btn-xs btn-warning">Edit Detail</button></a></span>
      </th>
    </tr>
    @widget('DataPendidikan')

    <tr>
      <th colspan="3">
        <span>3. Data Jabatan</span>
        <span class="pull-right"><a href='{{Route("AdminDataJabatanControllerGetIndex")}}'><button class="btn btn-xs btn-warning">Edit Detail</button></a></span>
      </th>
    </tr>
    @widget('DataJabatan')

    <tr>
      <th colspan="3">
        <span>4. Data Instansi Bekerja</span>
        <span class="pull-right"><a href='{{Route("AdminDataPendidikanControllerGetIndex")}}'><button class="btn btn-xs btn-warning">Edit Detail</button></a></span>
      </th>
    </tr>
    
    <tr>
      <th colspan="3">
        <span>5. Data Permohonan Sertifikasi</span>
        <span class="pull-right"><a href='{{Route("AdminDataPendidikanControllerGetIndex", 'id=1')}}'><button class="btn btn-xs btn-warning">Edit Detail</button></a></span>
      </th>
    </tr>
    <tr>
      <td>Tujuan Uji Kompetensi</td>
      <td colspan="2">Naik jenjang jabatan setingkat lebih tinggi</td>
    </tr>
    <tr>
      <td>Acuan Pembanding</td>
      <td colspan="2">
        <ul>
          <li>Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Republik Indonesia Nomor 9 Tahun 2014 tentang Jabatan Fungsional Pustakawan dan Angka Kreditnya</li>
          <li>Peraturan Kepala Perpustakaan Nasional Republik Indonesia Nomor 11 Tahun 2015 tentang Petunjuk Teknis Jabatan Fungsional Pustakawan dan Angka Kreditnya</li>
          <li>Standard Kompetensi Kerja Jabatan Fungsional Pustakawan</li>
        </ul>
      </td>
    </tr>
    <tr>
      <th colspan="3">
        <span>6. Dokumen Penunjang</span>
        <span class="badge bg-red">10%</span>
        <span class="pull-right"><a href='{{Route("AdminDataDokumenControllerGetEdit", ['id' => 'someslug'])}}'><button class="btn btn-xs btn-warning">Edit Detail</button></a></span>
      </th>
    </tr>
  </table>
  </div>
</div>
<div class="box-footer clearfix">
  <?php $action = (@$row)?CRUDBooster::mainpath("edit-save/$row->id"):CRUDBooster::mainpath("add-save"); ?>
  <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{$action}}'>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <button type="button" class="btn btn-default btn-md">Full Preview <i class="fa fa-search"></i></button>
  <input type="submit" name="submit" value='{{trans("crudbooster.button_save")}}' class='btn btn-success btn-md'>
  </form>
</div>