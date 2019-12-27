<tr>
  <td style="width: 25%;">Nama Lengkap</td>
  <td>{{$data->nama}}</td>
  <td rowspan="3" style="width: 20%;" class="text-center"><img src='{{url("/$data->photo")}}' class="img img-thumbnail" style="width:100px;"></td>
</tr>
<tr>
  <td>Tempat/Tanggal Lahir</td>
  <td>{{$data->tempat_lahir}}, {{date("d-M-Y", strtotime($data->tanggal_lahir))}}</td>
</tr>
<tr>
  <td>Jenis Kelamin</td>
  <td>{{$data->jk}}</td>
</tr>
<tr>
  <td>Kebangsaan</td>
  <td colspan="2">{{$data->kebangsaan}}</td>
</tr>
@if($data->province != null)
<tr>
  <td>Alamat</td>
  <td colspan="2">{{$data->alamat}} {{$data->village}} KEC. {{$data->district}} {{$data->regency}} {{$data->province}} {{$data->kodepos}}</td>
</tr>
<tr>
  <td>No. Telepon</td>
  <td colspan="2">{{$data->telp_rumah}}</td>
</tr>
<tr>
  <td>Telp Kantor</td>
  <td colspan="2">{{$data->telp_kantor}}</td>
</tr>
<tr>
  <td>HP</td>
  <td colspan="2">{{$data->telp}}</td>
</tr>
<tr>
  <td>Email</td>
  <td colspan="2">{{$data->email}}</td>
</tr>
<tr>
  <td>Pendidikan Terakhir</td>
  <td colspan="2">{{$data->pendidikan_terakhir}}</td>
</tr>
@else
<tr><td>
        <a href='{{CRUDBooster::adminPath()}}/contact/edit/{{$data->conid}}'>Add Alamat</a>
    </td>
</tr>

@endif