@extends('crudbooster::admin_template')
@section('content')
<div class="row">
   <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{$sertifikasi->kluster_code}} - {{$sertifikasi->kluster_name}}</h3>
    </div>
    <form class="form-horizontal" id="form-register" method="post" action="{{ Route('sertifikasi.register')}}">
    {{ csrf_field() }}
    
    <div class="col-xs-6">
        <div class="form-group" id="unit" name="unit">
            <label class="col-sm-2 control-label">Unit</label>
            <div class="col-sm-10">
                <select name="unitSertifikasi" id="unitSertifikasi" class="form-control">
                   <option value="">Pilih Unit Sertifikasi</option>
                @foreach($units as $unit)
                    <option value="{{$unit->id}}">{{$unit->unit_code}} - {{$unit->unit_title}}</option>
                @endforeach    
                </select>
            </div>
        </div>
       
    </div>
    
    <div class="col-xs-6">
        <div class="form-group" id="Detail" name="Detail">
            <label class="col-sm-2 control-label">Detail</label>
            <div class="col-sm-10">
                <select name="unitDetail" id="unitDetail" class="form-control">
                    <option value="pns">Pilih Unit Detail</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-xs-12" id="div_question">
     
    </div>
    
    </form>
   </div> 
</div>
@endsection

@section('script')
$(function(){
    $('#div_question').hide();

    $('#unitSertifikasi').change(function(){
        $('#div_question').hide();
        $('#div_question').empty();
        var id = $(this).val();
        var request = $.ajax({
            url: "{{url('api/unit')}}/"+id,
            type: "GET",
            success : function(data){
                var len = data.length;
                $('#unitDetail').html('<option value="pilih">Pilih Unit Detail</option>');
                for(var i=0; i < len ; i++){
                    var id = data[i]['id'];
                    var name = data[i]['unit_detail_name'];
                    $('#unitDetail').append("<option value='"+id+"'>"+name+"</option>");
                }
            }

        });

        request.fail(function( jqXHR, textStatus ) {
            $('#unitDetail').empty();
            $('#unitDetail').html('<option value="pilih">Pilih Unit Detail</option>');
        });
    });

    $('#unitDetail').change(function(){
        $('#div_question').show();
        var id_detail = $(this).val();
        var text_selected = $('#unitDetail option:selected').text();
        $.ajax({
            url: "{{url('api/assesment')}}/"+id_detail,
            type: "GET",
            success : function(data){
                var len = data.length;
                $('#div_question').append(
                    `
                    <div class="box">
                    <div box-header with-border>
                      <h2 class="box-title">Test</h2>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title" id="title_detail">`+ text_selected + `</h3>
                    </div>

                    <div class="box-body">
                    <table class="table table-bordered">
                    <tbody id="assesment`+ id_detail + `">
                    <tr>
                    <th style="width:15px">KUK</th>
                    <th style="width:70%;align:center">Pertanyaan</th>
                    <th>Kompeten</th>
                    <th>Belum Kompeten</th>
                    </tr>   
                    `
                );
                for(var i=0; i < len; i++){
                    var kuk = data[i]['kuk_number'];
                    var id = data[i]['id'];
                    
                    $("#assesment"+id_detail).append(
                        `
                        <tr>
                            <td>` + kuk + `</td>
                            <td>` + data[i]['question'] + `</td>
                            <td> <input type="hidden" name="as`+id+`" value="`+ id + `"/> <input type="checkbox"/> </td>
                            <td> <input type="checkbox"/> </td>
                        </tr>
                        `
                    );
                }
                $('#div_question').append(
                `
                </tbody>
                </table>
                </div>
                </div>
                `
                );
            }

        });

    });
});
@endsection