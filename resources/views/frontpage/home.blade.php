@extends('frontpage.frontpage')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3">

      <!-- @include('widget.link', ['wg_link_background' => 'bg-aqua', 'wg_link_title' => 'User terdaftar', 'wg_link_value' => '3', 'wg_link_url' => '/register'])  -->
      @include('widget.list') 

    </div>
    <div class="col-md-9">
      @widget('BlogList')
      @widget('GalleryList')
    </div>

    
  </div>
</div>
@endsection