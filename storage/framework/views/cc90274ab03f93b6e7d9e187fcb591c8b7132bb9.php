<?php $__env->startSection('content'); ?>
<?php if($done === true): ?>
<div class="callout callout-info">
<h4>Anda Sudah Melakukan Asesment Mandiri!</h4>
</div> 
<?php else: ?>
<div class="row">
    <div class="box box-info">
        <div class="box-header with-border">
            <h2 class="box-title"><?php echo e($sertifikasi->kluster_code); ?> - <?php echo e($sertifikasi->kluster_name); ?></h2>
        </div>
        <form class="form-horizontal" id="formum" method="post" onsubmit="return validateForm(this)" action="<?php echo e(Route('um.submit')); ?>">
        <?php echo e(csrf_field()); ?>

            <input type="hidden" id="sertifikasiId" name="sertifikasiId" value="<?php echo e($sertifikasi->id); ?>"/>
            <input type="hidden" id="klusterId" name="klusterId" value="<?php echo e($sertifikasi->kluster_id); ?>"/>
            <div id="form-um">
               <?php $__currentLoopData = Perpus::getUnitList($sertifikasi->kluster_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="box">
                    <div class="box-header with-border">
                      <label><?php echo e($unit->unit_code); ?> - <?php echo e($unit->unit_title); ?></label>
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
                            <?php $__currentLoopData = Perpus::getUnitDetail($unit->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                     <td colspan="4"><?php echo e($detail->unit_detail_name); ?></td>
                                </tr>
                                <?php $__currentLoopData = Perpus::getAssesment($detail->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesmen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($asesmen->kuk_number); ?></td>
                                    <td><?php echo e($asesmen->question); ?></td>
                                    <td>
                                        <input type="hidden" name="unit[]" value="<?php echo e($unit->id); ?>"/> 
                                        <input type="hidden" name="unit_detail[]" value="<?php echo e($detail->id); ?>"/>
                                        <input type="hidden" name="asesment[]" value="<?php echo e($asesmen->id); ?>"/> 
                                        <input name="kompetensi[]" id="k<?php echo e($asesmen->id); ?>" type="checkbox" value="1" onclick="validateCheckbox(this, <?php echo e($asesmen->id); ?>)"/>
                                    </td>
                                    <td><input name="bk[]" id="bk<?php echo e($asesmen->id); ?>" type="checkbox" value="0" onclick="validateCheckbox(this, <?php echo e($asesmen->id); ?>)"/></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <button type="submit" id="btn_submit_um" name="btn_submit_um" class="btn btn-block btn-primary">Simpan</button>
            </div>
            <div class="col-sm-4"></div>
        </form>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('crudbooster::admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>