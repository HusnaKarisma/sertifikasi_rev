@extends('crudbooster::admin_template')
@section('content') 

<div class="row">
  <div class="col-md-12">
   <div class="box">
    <div class="box-body">
       <table class="table table-bordered">
       <thead>
              <tr>
                <th>Proposal ID</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Tujuan</th>
                <th>Kode Kluster</th>
                <th>Tgl Pengajuan</th>
                <th>Status</th>
                <th>Jadwal Asesmen</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach($data as $h)
                <tr>
                  <td><a href="sertifikasi/view/{{$h->id}}">#{{sprintf("%05d", $h->id)}}</a></td>
                  <td>{{$h->nama}}</td>
                  <td>{{strtoupper($h->tipe)}}</td>
                  <td>{{$h->tujuan_sertifikasi}}</td>
                  <td>{{$h->kluster_code}}</td>
                  <td>{{date('d-M-Y', strtotime($h->created_at))}}</td>
                  <td><span class="label label-primary">{{$h->status}}</span></td>
                  @if(!empty($h->tanggal_mulai))
                  <td>{{date('d-M-Y', strtotime($h->tanggal_mulai))}} - {{date('d-M-Y', strtotime($h->tanggal_selesai))}}</td>
                  <td>
                    @if($h->submit_status === 5)
                    <form method='post' enctype="multipart/form-data" action="{{ Route('sertifikasi.sertifikat')}}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden"  name="sertifikasi_id" value= "{{$h->id}}" />
                      <input type="hidden" name="nama_peserta" value="{{$h->nama}}" />
                      <input type="hidden" name="kluster_id" value = "{{$h->kluster_id}}" />
                      <button type="submit" name="hasil"  value="1" data-toggle="tooltip" data-placement="left" title="Lulus, Input Sertifikat" class="btn btn-block btn-success btn-flat btn-xs"><i class="fa fa-fw fa-check"></i></button>
                      <button type="submit"  name="hasil" value="0" data-toggle="tooltip" data-placement="left" title="Tidak Lulus" class="btn btn-block btn-danger btn-flat btn-xs"><i class="fa fa-fw fa-close"></i></button>
                    </form>
                    @endif  
                  </td>
                  @else
                  <td> - </td>
                  <td></td>
                  @endif
                </tr>
                @endforeach
              </tbody>
       </table>
    </div>
    </div>
  </div>
</div>

@endsection

