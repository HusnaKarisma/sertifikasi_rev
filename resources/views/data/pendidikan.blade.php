<tr>
  <td colspan="3">
    <ul>
      @foreach($data as $d)
      <li>{{$d->pendidikan}}, <b>{{$d->nama_institusi}}</b> [{{$d->tahun_lulus}}]</li>
      @endforeach
    </ul>
  </td>
</tr>
