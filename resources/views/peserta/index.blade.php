@extends('crudbooster::admin_template')
@section('content') 
  
  <div class="row">
    <div class="col-md-8">
    {{-- history pengajuan --}}
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Proposal ID</th>
                <th>Tipe</th>
                <th>Tujuan</th>
                <th>Kode Kluster</th>
                <th>Created At</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
                @foreach($history as $h)
                <tr>
                  <td><a href="sertifikasi/view/{{$h->id}}">#{{sprintf("%05d", $h->id)}}</a></td>
                  <td>{{strtoupper($h->tipe)}}</td>
                  <td>{{$h->tujuan_sertifikasi}}</td>
                  <td>{{$h->kluster_code}}</td>
                  <td>{{date('d-M-Y', strtotime($h->created_at))}}</td>
                  <td><span class="label label-primary">{{$h->status}}</span></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {{-- end history pengajuan --}}
        @if($check['latest']->submit_status == 4 || $check['latest']->submit_status == 6 || $check['count'] == 0)
        <div class="box-footer">
          <a href='{{ Route("AdminDataSertifikasi38ControllerGetAdd")}}'><button class="btn btn-default btn-lg text-center">Pengajuan Sertifikasi <i class="fa fa-chevron-right"></i></button></a>
        </div>
        @endif
    </div>
    <div class="col-md-4">
    @if($active->jadwal_id != null)
      <div class="info-box bg-aqua">
        <span class="info-box-icon">
        <i class="fa fa-bookmark-o"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Jadwal Asesmen</span>
          <span class="info-box-number">{{date('d M Y', strtotime($active->tanggal_mulai))}} - {{date('d M Y', strtotime($active->tanggal_selesai))}}</span>
        </div>
      </div>
    @endif  
    </div>    

@endsection