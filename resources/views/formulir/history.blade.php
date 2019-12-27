<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Riwayat Pengajuan</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
        <tr>
          <th>Order ID</th>
          <th>Created at</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
        <tr>
          <td><a href="pages/examples/invoice.html">{{sprintf('%05d', $d->id)}}</a></td>
          <td>{{date('d-m-Y', strtotime($d->created_at))}}</td>
          <td>
            <span class="label label-primary">{{$d->status}}</span>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="box-footer text-center">
    <button class="btn btn-primary btn-lg">Ajukan permohonan</button>
  </div>
</div>