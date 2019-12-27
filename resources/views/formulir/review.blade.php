@extends('crudbooster::admin_template')
@section('content') 
  
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Formulir Pengajuan a.n {{$peserta->full_name}} [NIP: {{$peserta->nip}}]</h3>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <table class="table table-bordered">
                <tr>
                  <th colspan="3">
                    <span>1. Data Pribadi</span>
                  </th>
                </tr>
                @widget('DataPribadi')
                <tr>
                  <th colspan="3">
                    <span>2. Data Pendidikan</span>
                  </th>
                </tr>
                @widget('DataPendidikan')

                <tr>
                  <th colspan="3">
                    <span>3. Data Jabatan</span>
                  </th>
                </tr>
                @widget('DataJabatan')

              </table>
            </div>
            <div class="col-md-6">
              <table class="table table-bordered">
                <tr>
                  <th colspan="3">
                    <span>4. Data Instansi Bekerja</span>
                  </th>
                </tr>
                
                <tr>
                  <th colspan="3">
                    <span>5. Data Permohonan Sertifikasi</span>
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
                    <span class="badge bg-red">{{$data->dok_pct*100}}%</span>
                  </th>
                </tr>
                @widget('DataDokumen')
              </table>
            </div>
          </div>
          
        </div>

        <div class="box-footer text-center">
          <?php $action = (@$row)?CRUDBooster::mainpath("edit-save/$row->id"):CRUDBooster::mainpath("add-save"); ?>
          <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{$action}}'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="button" class="btn btn-default btn-md">Submit<i class="fa fa-disk"></i></button>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>

@endsection