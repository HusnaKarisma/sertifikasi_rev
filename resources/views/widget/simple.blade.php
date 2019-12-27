<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-newspaper-o"></i> Index Berita</h3>
  </div>

  <div class="box-body">
      
    @foreach($data['contents'] as $content)
    <h3><a href="#">{{$content->title}}</a></h3>
    <p>{!! $content->content !!}</p>
    
    @endforeach

  </div>
  <div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
      <li><a href="#">More.. »</a></li>
    </ul>
  </div>

</div>