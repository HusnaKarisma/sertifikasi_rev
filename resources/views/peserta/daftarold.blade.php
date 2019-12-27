@extends('crudbooster::admin_template')
@section('content')
<div class="container post">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-body">
      
      <form class="form-horizontal" id="form-register" method="post" action="{{ Route('sertifikasi.register')}}">
      {{ csrf_field() }}
        <div class="box-header with-border">
          <h3 class="box-title">Pendaftaran Sertifikasi</h3>
        </div>
        <div class="form-group" id="tipe" name="tipe">
          <label class="col-sm-2 control-label">Tipe Sertifikasi</label>
          <div class="col-sm-10">
            <select name="tipeSertifikasi" id="tipeSertifikasi" class="form-control">
                  <option value="pns">PNS</option>
             	  <option value="nonpns">Non PNS</option>
              </select>
          </div>
        </div>
        <div class="box-header with-border">
            <h3 class="box-title">Data Pribadi</h3>
        </div>
        <div class="form-group" id="nip" name="nip">
          <label class="col-sm-2 control-label">NIP</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Masukan NIP" name="inputNip" id="inputNip"/>
          </div>
        </div>
        <div class="form-group" id="ktp" name="ktp">
          <label class="col-sm-2 control-label">No. KTP</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Masukan Nomor KTP" name="inputKtp" id="inputKtp"/>
          </div>
        </div>
        <div class="form-group" id="nama" name="nama">
          <label class="col-sm-2 control-label">Nama Lengkap</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Masunkan Nama Lengkap" name="inputNama" id="inputNama"/>
          </div>
        </div>
        <div class="form-group" id="nama" name="nama">
          <label class="col-sm-2 control-label">Tempat Lahir</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Masunkan Kota Tempat Lahir" name="inputTempatLahir" id="inputTempatLahir"/>
          </div>
        </div>
        <div class="form-group" id="tanggalLahir" name="tanggalLahir">
          <label class="col-sm-2 control-label">Tanggal Lahir</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" placeholder="Tanggal Lahir" name="inputTanggalLahir" id="inputTanggalLahir"/>
          </div>
        </div>
        <div class="form-group" id="jk" name="jk">
          <label class="col-sm-2 control-label">Jenis Kelamin</label>
          <div class="col-sm-10">
            <select name="jkSelect" id="jkSelect" class="form-control">
                  <option value="Laki-Laki">Laki-Laki</option>
             	  <option value="Perempuan">Perempuan</option>
              </select>
          </div>
        </div>
        <div class="form-group" id="kebangsaan" name="kebangsaan">
          <label class="col-sm-2 control-label">Kebangsaan</label>
          <div class="col-sm-10">
            <select name="kebangsaanInput" id="kebangsaanInput" class="form-control">
                  <option value="WNI">WNI</option>
             	  <option value="WNA">WNA</option>
              </select>
          </div>
        </div>
        <div class="form-group" id="propinsi">
          <label class="col-sm-2 control-label">Propinsi</label>
          <div class="col-sm-10">
            <select name="propinsi_id" id="propinsi_id" class="form-control">
            <option value="pilih">Pilih Propinsi</option>
            @foreach($propinsi as $k)
                <option value="{{$k->id}}">{{$k->name}}</option>
            @endforeach
            </select>
          </div>
        </div>
        <div class="form-group" id="kabupaten">
          <label class="col-sm-2 control-label">Kabupaten/Kota</label>
          <div class="col-sm-10">
            <select name="kabupaten_id" id="kabupaten_id" class="form-control">
            <option value="pilih">Pilih Kabupaten</option>
            </select>
          </div>
        </div>
        <div class="form-group" id="kecataman">
          <label class="col-sm-2 control-label">Kecamatan</label>
          <div class="col-sm-10">
            <select name="kecamatan_id" id="kecamatan_id" class="form-control">
            <option value="pilih">Pilih Kecamatan</option>
            </select>
          </div>
        </div>
        <div class="form-group" id="desa">
          <label class="col-sm-2 control-label">Desa/Kelurahan</label>
          <div class="col-sm-10">
            <select name="desa_id" id="desa_id" class="form-control">
            <option value="pilih">Pilih Kelurahan/Desa</option>
            </select>
          </div>
        </div>
        <div class="form-group" id="alamat" name="alamat">
          <label class="col-sm-2 control-label">Alamat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Isi Alamat" name="inputAlamat" id="inputAlamat"/>
          </div>
        </div>
        <div class="form-group" id="kodePos" name="kodePos">
          <label class="col-sm-2 control-label">Kode Pos</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Kode POS" name="inputPos" id="inputPos"/>
          </div>
        </div>
        <div class="form-group" id="noTelp" name="noTelp">
          <label class="col-sm-2 control-label">No Telp Rumah</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="No Telp Rumah" name="noTelp" id="noTelp"/>
          </div>
        </div>
        <div class="form-group" id="noTelpKantor" name="noTelpKantor">
          <label class="col-sm-2 control-label">No Telp Kantor</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="No Telp Kantor" name="inputTelpKantor" id="inputTelpKantor"/>
          </div>
        </div>
        <div class="form-group" id="noHP" name="noHp">
          <label class="col-sm-2 control-label">No HP</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="No HP" name="inputHP" id="inputHP"/>
          </div>
        </div>
        <div class="form-group" id="desa">
          <label class="col-sm-2 control-label">Pendidikan Terakhir</label>
          <div class="col-sm-10">
            <select name="desa_id" id="desa_id" class="form-control">
            <option value="pilih">Pilih Pendidikan Terakhir</option>
            @foreach($pendidikan as $k)
                <option value="{{$k->Pendidikan}}">{{$k->Pendidikan}}</option>
            @endforeach
            </select>
          </div>
        </div>
        <div class="form-group" id="kluster">
          <label class="col-sm-2 control-label">Kluster</label>
          <div class="col-sm-10">
            <select name="kluster_id" id="" class="form-control">
            @foreach($klusters as $k)
                <option value="{{$k->id}}">{{$k->kluster_code}} - {{$k->kluster_name}}</option>
            @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tujuan Assesment</label>
          <div class="col-sm-10">
          <select name="tujuan_id" id="tujuan_id" class="form-control">
            @foreach($tujuan as $t)
                <option value="{{$t}}">{{$t}}</option>
            @endforeach
            </select>
          </div>
        </div>
        <div class="form-group" id="tujuanLainnya" name="tujuanLainnya">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Isi dengan tujuan assestment" name="inputTujuan" id="inputTujuan"/>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" id="register">Daftar</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
</div>

</div>

@endsection

@section('script')
$(function() {
  $('#tujuanLainnya').val("");
  $('#tujuanLainnya').hide();
  $('#ktp').hide();
  
  $('#inputNip').blur(function(){
    var nip = $(this).val();
    
    $.ajax({
        url: "{{url('api/pustakawan')}}/"+nip,
        type: "GET",
        success: function(data) {
          $('#inputNip').val(data.NIP);
          $('#inputNama').val(data.Nama);
          $('#inputTanggalLahir').val(data.TanggalLahir);
          $('#inputTempatLahir').val(data.TempatLahir);
          $('#jkSelect').val(data.JenisKelamin);
        }
      });  
  });

  $('#propinsi_id').change(function(){
    var prop = $(this).val();
    $.ajax({
        url: "{{url('api/kabupatens')}}/"+prop,
        type: "GET",
        success: function(data) {
          var len = data.length;
          $('#kabupaten_id').html('<option value="pilih">Pilih Kabupaten</option>');
          for( var i = 0; i<len; i++){
              var id = data[i]['id'];
              var name = data[i]['name'];
              $("#kabupaten_id").append("<option value='"+id+"'>"+name+"</option>");
          }
        }
      });  
  });

  $('#kabupaten_id').change(function(){
    var kab = $(this).val();
    $.ajax({
        url: "{{url('api/kecamatans')}}/"+kab,
        type: "GET",
        success: function(data) {
          var len = data.length;
          $('#kecamatan_id').html('<option value="pilih">Pilih Kecamatan</option>');
          for( var i = 0; i<len; i++){
              var id = data[i]['id'];
              var name = data[i]['name'];
              $("#kecamatan_id").append("<option value='"+id+"'>"+name+"</option>");
          }
        }
      });  
  });

  $('#kecamatan_id').change(function(){
    var kec = $(this).val();
    $.ajax({
        url: "{{url('api/kelurahans')}}/"+kec,
        type: "GET",
        success: function(data) {
          var len = data.length;
          $('#desa_id').html('<option value="pilih">Pilih Desa/Kelurahan</option>');
          for( var i = 0; i<len; i++){
              var id = data[i]['id'];
              var name = data[i]['name'];
              $("#desa_id").append("<option value='"+id+"'>"+name+"</option>");
          }
        }
      });  
  })

  $('#tujuan_id').change(function(){
   if($('#tujuan_id').val() === 'Lainnya'){
    $('#tujuanLainnya').show();
   }else{
    $('#inputTujuan').val("");
    $('#tujuanLainnya').hide();
   }
  });
  
  $('#tipeSertifikasi').change(function(){
	  if($('#tipeSertifikasi').val() === "pns"){
      $('#ktp').val("");
		  $('#ktp').hide();
		  $('#nip').show();
	  }else{
      $('#ktp').val("");
		  $('#ktp').show();
		  $('#nip').hide();
	  }
  });
  
});
@endsection