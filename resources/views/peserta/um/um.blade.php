@extends('crudbooster::admin_template')
@section('content')
@if($done === true)
<div class="callout callout-info">
<h4>Anda Sudah Melakukan Asesment Mandiri!</h4>
</div> 
@else
<div class="row">
    <div class="box box-info">
        <div class="box-header with-border">
            <h2 class="box-title">{{$sertifikasi->kluster_code}} - {{$sertifikasi->kluster_name}}</h2>
        </div>
        <form class="form-horizontal" id="formum" method="post" onsubmit="return validateForm(this)" action="{{ Route('um.submit')}}">
        {{ csrf_field() }}
            <input type="hidden" id="sertifikasiId" name="sertifikasiId" value="{{$sertifikasi->id}}"/>
            <input type="hidden" id="klusterId" name="klusterId" value="{{$sertifikasi->kluster_id}}"/>
            <div id="form-um">
               @foreach( Perpus::getUnitList($sertifikasi->kluster_id) as $unit )
                <div class="box">
                    <div class="box-header with-border">
                      <label>{{$unit->unit_code}} - {{$unit->unit_title}}</label>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width:15px">KUK</th>
                                    <th style="width:70%;align:center">Pertanyaan</th>
                                    <th>K</th>
                                    <th>BK</th>
                                </tr>
                            @foreach( Perpus::getUnitDetail($unit->id) as $detail )
                                <tr>
                                     <td colspan="4">{{$detail->unit_detail_name}}</td>
                                </tr>
                                @foreach( Perpus::getAssesment($detail->id) as $asesmen )
                                <tr>
                                    <td>{{$asesmen->kuk_number}}</td>
                                    <td>{{$asesmen->question}}</td>
                                    <td>
                                        <input type="hidden" name="unit[]" value="{{$unit->id}}"/> 
                                        <input type="hidden" name="unit_detail[]" value="{{$detail->id}}"/>
                                        <input type="hidden" name="asesment[]" value="{{$asesmen->id}}"/> 
                                        <input name="kompetensi[]" id="k{{$asesmen->id}}" type="checkbox" value="1" onclick="validateCheckbox(this, {{$asesmen->id}})"/>
                                    </td>
                                    <td><input name="bk[]" id="bk{{$asesmen->id}}" type="checkbox" value="0" onclick="validateCheckbox(this, {{$asesmen->id}})"/></td>
                                </tr>
                                @endforeach    
                            @endforeach   
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                @endforeach
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <button type="submit" id="btn_submit_um" name="btn_submit_um" class="btn btn-block btn-primary">Simpan</button>
            </div>
            <div class="col-sm-4"></div>
        </form>
    </div>
</div>
@endif
@endsection

@section('script')

function validateCheckbox(elem, id){
    if(elem.checked){
       if ( elem.id.includes("bk") ){
           document.getElementById("k"+id).checked = false;
       } else{
           document.getElementById("bk"+id).checked = false;
       }
   }
}
function validateForm(job){
    var terus = true;
    $("[name^=kompetensi]").each(function (i, j){
        if(j.checked === false){
            terus = false;
            swal("Asesmen Mandiri", "Semua item harus kompeten!", "error");
            return false;
        }
    
    }); 
    return terus;
}


@endsection