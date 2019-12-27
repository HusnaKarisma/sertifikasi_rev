@extends('crudbooster::admin_template')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Formulir Pengajuan a.n {{$peserta->nama}} [NIP: {{$peserta->nip}}]</h3>
            </div>
            <div class="box-body">
                <div class="row">
                  <div class="col-md-12"> 
                    <table class="table table-bordered">
                        <tr>
                            <th colspan="3">
                                <span>a. Data Pribadi</span>
                            </th>
                        </tr>
                        @widget('DataPribadi',['id'=>$peserta->id])
                        <tr>
                            <th colspan="3">
                                <span>b. Data Pekerjaan</span>
                            </th>
                        @widget('DataPekerjaan',['id'=>$peserta->id])
                        </tr>
                        <tr>
                            <th colspan="3">
                                <span>c. Data Permohonan Sertifikasi</span>
                            </th>
                        </tr>
                        <tr>
                            <td>Tujuan Asesmen</td>
                            <td>@if (empty($peserta->tujuan_lainnya))
                                    {{$peserta->tujuan_sertifikasi}}
                                @else
                                    {{$peserta->tujuan_lainnya}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Kode Sertifikasi Kompetensi</td>
                            <td>{{$peserta->kluster_code}}</td>
                        </tr>
                        <tr>
                            <td>Skema Sertifikasi Kompetensi</td>
                            <td>{{$peserta->kluster_name}}</td>
                        </tr>
                        <tr>
                            <th colspan="3">
                                <span>Dokumen Wajib</span>
                            </th>
                        </tr>
                        @if(empty($peserta->photo))
                        <tr>
                            <td colspan="3">
                                <a href='{{CRUDBooster::adminpath("dokumen_sertifikasi/edit/$peserta->document_id")}}'>Upload Dokumen</a>
                            </td>
                        <tr>
                        @else
                        <tr>
                            <td>KTP</td>
                            <td colspan="2">
                                <a data-lightbox="roadtrip" href='{{url("/$peserta->scan_ktp")}}'>
                                <img width="40px" height="40px" src='{{url("/$peserta->scan_ktp")}}'/>
                                </a>
                            <td>
                        </tr>
                        <tr>
                            <td>Ijazah</td>
                            <td colspan="2">
                            <a data-lightbox="roadtrip" href='{{url("/$peserta->scan_ijazah")}}'>
                                <img width="40px" height="40px" src='{{url("/$peserta->scan_ijazah")}}'/>
                            </a>  
                            <td>
                        </tr>
                        <tr>
                            <td>SK / Surat Keterangan Bekerja</td>
                            <td colspan="2">
                            <a data-lightbox="roadtrip" href='{{url("/$peserta->scan_sk")}}'>
                                <img width="40px" height="40px" src='{{url("/$peserta->scan_sk")}}'/>
                            </a>
                            <td>
                        </tr>
                        @endif
                        <tr>
                            <th colspan="3">
                                <span>Daftar Unit Kompetensi</span>
                            </th>
                        </tr>
                        <tr>
                           
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Unit</th>
                                        <th>Judul Unit</th>
                                        <th>Jenis Standar</th>
                                        <th>Dokumen</th>
                                    </tr>
                                    @foreach($units as $unit)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$unit->unit_code}}</td>
                                        <td>{{$unit->unit_title}}</td>
                                        <td>{{$unit->standard_type}}</td>
                                        @if(empty($unit->dokumen_pendukung))
                                        <td><a href='{{CRUDBooster::adminpath("dokumen_pendukung/edit/$unit->id_dokumen_pendukung")}}'>Upload Dokumen</a></td>
                                        @else
                                        <td align="center">
                                            <a class="dokumen" href='{{url("/$unit->dokumen_pendukung")}}' target="_blank" >
                                            <img width="30px" height="30px" src='{{url("/icon_pdf.png")}}'/>
                                            </a>
                                        </td>
                                        @endif
                                        
                                    </tr>
                                    @endforeach
                                </table>
                        </tr>
                    </table>
                  </div>
                </div>
             </div>
             @if($peserta->submit_status < 2)
            <div class="box-footer text-center">
                <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action="{{ Route('sertifikasi.submit')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden"  name="sertifikasi_id" value= "{{$peserta->id}}" />
                <input type="hidden"  name="nama_peserta" value= "{{$peserta->nama}}" />
                <button type="submit" class="btn btn-default btn-md">Submit<i class="fa fa-disk"></i></button>
                </form>
            </div>
            @endif
            @if($peserta->submit_status == 2 && (CRUDBooster::myPrivilegeId() == 1 || CRUDBooster::myPrivilegeId() == 4))
            <div class="box-footer text-center">
            <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action="{{ Route('sertifikasi.approve')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden"  name="sertifikasi_id" value= "{{$peserta->id}}" />
                <input type="hidden"  name="peserta_id" value= "{{$peserta->user_id}}" />
                <input type="text"  class="col-sm-8" placeholder="Masukkan catatan...." name="note"/>
                <button type="submit" class="btn btn-default btn-md" name="status" value="4">Tolak<i class="fa fa-disk"></i></button>
                <button type="submit" class="btn btn-default btn-md" name="status" value="3">Terima<i class="fa fa-disk"></i></button>
            </form>
            </div>
            @endif

            @if($peserta->submit_status == 5 && empty($peserta->jadwal_id) && (CRUDBooster::myPrivilegeId() == 1 || CRUDBooster::myPrivilegeId() == 4))
            <div class="row">
            <div class="box-body">
            <div class="col-md-12">
            <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Jadwal Asesmen</h3>
                </div>
            </div>
            <div class="box-body">
                <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action="{{ Route('sertifikasi.jadwal')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden"  name="sertifikasi_id" value= "{{$peserta->id}}" />
                <input type="hidden"  name="peserta_id" value= "{{$peserta->user_id}}" />
                <div class="form-group" id="jadwal">
                <label class="col-sm-3 control-label">Jadwal Asesmen</label>
                <div class="col-sm-5">
                    <select name="jadwal_id" id="jadwal_id" class="form-control">
                    <option value="pilih">Pilih Jadwal Asesmen</option>
                    @foreach($jadwal as $k)
                    <option value="{{$k->id}}">{{date('d-M-Y', strtotime($k->tanggal_mulai))}} s.d {{date('d-M-Y', strtotime($k->tanggal_selesai))}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-block btn-primary btn-flat" name="status" >Buat Jadwal<i class="fa fa-disk"></i></button>
                </div>
                </div>
                </form>
            </div>
            </div>
            </div>
            </div>
            </div>
            @endif
   </div>
    <div class="col-md-4">
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Log Sertifikasi</h3>
            </div>
            <div class="box-body">
               @foreach($logs as $log)
                <ul class="timeline">
                    <li class="time-label">
                        <span class="bg-red">
                        {{date('d M Y', strtotime($log->created_at))}}
                        </span>
                    </li>
                    <!-- timeline item -->
                    <li>
                        <!-- timeline icon -->
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{date('G:s', strtotime($log->created_at))}}</span>
                            <h3 class="timeline-header">{{$log->message}}</h3>
                        </div>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection