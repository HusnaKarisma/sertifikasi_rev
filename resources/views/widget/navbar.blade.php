@foreach($data as $m)
<li class="menu-item menu-item-type-custom">
  <a title="{{$m->title}}" href="/page/{{$m->slug}}">{{$m->title}}</a>
</li>
@endforeach