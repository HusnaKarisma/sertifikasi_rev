<div class="box box-widget widget-user">
  <div class="widget-user-header bg-black" style="background: url('{{asset("images/bg-footer.png")}}') center center;">
    <h3 class="widget-user-username">Galeri</h3>
    <h5 class="widget-user-desc"></h5>
  </div>
  <div class="box-body">
    <div class="row">

      @foreach($data['contents'] as $content)
      <div class="col-sm-4 border-right">
        <div class="description-block">
          <a href="#"><img src="{{asset("$content->images")}}" class="img-thumbnail"></a>
        </div>
      </div>
      @endforeach

    </div>

  </div>
  <div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
      <li><a href="#">More.. »</a></li>
    </ul>
  </div>
</div>