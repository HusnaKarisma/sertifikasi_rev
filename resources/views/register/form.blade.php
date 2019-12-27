@extends('frontpage_template')

@section('content')
<div class="container post">
  <form class='form-horizontal' method='post' id="form-register" enctype="multipart/form-data" action='{{$action}}'>
    {{--
    <input type="hidden" name="_token" value="{{ csrf_token() }}">    
    <input type='hidden' name='return_url' value='{{ @$return_url }}'/>                      

    <input type='hidden' name='ref_parameter' value='{{urldecode(http_build_query(@$_GET))}}'/>
    @if($hide_form)
      <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
    @endif
    --}}
    
    <h1 class="animated hiding" data-animation="bounceInUp" delay="200">Registration Form</h1>
    <div class="alert alert-danger" id="alert-box">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Warning!</h4>
        <b><span id="alert-msg">The data has been added !</span></b><br />
        Forgot password? <a href="{{url('forgot')}}">click here!</a>
    </div>
    
    @if(@$alerts)
      @foreach(@$alerts as $alert)
        <div class='callout callout-{{$alert[type]}}'>                
            {!! $alert['message'] !!}
        </div>
      @endforeach
    @endif

    <div class="container post">
      <div class="row">
        <div class="col-xs-12">
          <div class="article">

            <form class="form-horizontal">
              <div class="form-group" id="hold_nama">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control" id="nama" placeholder="Nama Pustakawan" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                  *Selanjutnya informasi akan dikirimkan melalui email.
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" class="btn btn-default" id="register">Register</button>
                  <span id="loading"><strong>Please wait...</strong></span>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

@section('script')
$(function() {

  $('#alert-box').hide();
  $('#loading').hide();

  $('#register').click(function( e ) {
    var data = $('#form-register').serializeArray();
    $('#loading').show();
     $.ajax({
        url: "{{url('api/post_pustakawan')}}",
        data: data,
        type: "POST",
        success: function(resp) { 
          if(!resp.api_status) {
            $('#alert-box').show(function(){
              $('#alert-msg').html(resp.api_message);
              $('#loading').hide();
            });
          } else {
            $('#loading').hide();
            window.location = "{{ url('success') }}";
          }
        }
      });  

    e.preventDefault();
  });
  $('#loading').hide();


  
});
@endsection