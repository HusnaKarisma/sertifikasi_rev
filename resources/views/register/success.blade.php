@extends('frontpage_template')

@section('content')
<div class="container post">  
    <h1 class="animated hiding" data-animation="bounceInUp" delay="200">Registration Form</h1>
    
    <div class="alert alert-success" id="alert-box">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-info"></i> Success!</h4>
      <b><span id="alert-msg">Password sent via email!</span></b><br />
      <a href="{{url('admin')}}">click here to login!</a>
    </div>

</div>
@endsection
