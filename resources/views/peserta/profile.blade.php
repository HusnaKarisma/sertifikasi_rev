<div class="box box-widget widget-user-2">
  <div class="widget-user-header bg-aqua">
    <div class="widget-user-image">
      <img src="{{ CRUDBooster::myPhoto() }}" class="img-circle" alt="{{ trans('crudbooster.user_image') }}" />
    </div>
    <h3 class="widget-user-username"><p>{{ CRUDBooster::myName() }}</p></h3>
    <h5 class="widget-user-desc">NIP: {{ CRUDBooster::myNip() }}</h5>
  </div>

  <div class="box-header with-border">
    <h3 class="box-title">Riwayat Pengajuan</h3>
  </div>

  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
        <tr>
          <th>Proposal ID</th>
          <th>Created at</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
        <tr>
          <td><a href="bla.bla/{{$d->id}}">#{{sprintf("%05d", $d->id)}}</a></td>
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

</div>