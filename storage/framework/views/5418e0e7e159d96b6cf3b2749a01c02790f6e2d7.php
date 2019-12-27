
<?php $__env->startSection('content'); ?> 

<div class="row">
  <div class="col-md-12">
   <div class="box">
    <div class="box-body">
       <table class="table table-bordered">
       <thead>
              <tr>
                <th>Proposal ID</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Tujuan</th>
                <th>Kode Kluster</th>
                <th>Tgl Pengajuan</th>
                <th>Status</th>
                <th>Jadwal Asesmen</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="sertifikasi/view/<?php echo e($h->id); ?>">#<?php echo e(sprintf("%05d", $h->id)); ?></a></td>
                  <td><?php echo e($h->nama); ?></td>
                  <td><?php echo e(strtoupper($h->tipe)); ?></td>
                  <td><?php echo e($h->tujuan_sertifikasi); ?></td>
                  <td><?php echo e($h->kluster_code); ?></td>
                  <td><?php echo e(date('d-M-Y', strtotime($h->created_at))); ?></td>
                  <td><span class="label label-primary"><?php echo e($h->status); ?></span></td>
                  <?php if(!empty($h->tanggal_mulai)): ?>
                  <td><?php echo e(date('d-M-Y', strtotime($h->tanggal_mulai))); ?> - <?php echo e(date('d-M-Y', strtotime($h->tanggal_selesai))); ?></td>
                  <td>
                    <?php if($h->submit_status === 5): ?>
                    <form method='post' enctype="multipart/form-data" action="<?php echo e(Route('sertifikasi.sertifikat')); ?>">
                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                      <input type="hidden"  name="sertifikasi_id" value= "<?php echo e($h->id); ?>" />
                      <input type="hidden" name="nama_peserta" value="<?php echo e($h->nama); ?>" />
                      <input type="hidden" name="kluster_id" value = "<?php echo e($h->kluster_id); ?>" />
                      <button type="submit" name="hasil"  value="1" data-toggle="tooltip" data-placement="left" title="Lulus, Input Sertifikat" class="btn btn-block btn-success btn-flat btn-xs"><i class="fa fa-fw fa-check"></i></button>
                      <button type="submit"  name="hasil" value="0" data-toggle="tooltip" data-placement="left" title="Tidak Lulus" class="btn btn-block btn-danger btn-flat btn-xs"><i class="fa fa-fw fa-close"></i></button>
                    </form>
                    <?php endif; ?>  
                  </td>
                  <?php else: ?>
                  <td> - </td>
                  <td></td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
       </table>
    </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('crudbooster::admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>