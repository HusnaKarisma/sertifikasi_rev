<?php $__env->startSection('content'); ?> 
  
  <div class="row">
    <div class="col-md-8">
    
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Proposal ID</th>
                <th>Tipe</th>
                <th>Tujuan</th>
                <th>Kode Kluster</th>
                <th>Created At</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="sertifikasi/view/<?php echo e($h->id); ?>">#<?php echo e(sprintf("%05d", $h->id)); ?></a></td>
                  <td><?php echo e(strtoupper($h->tipe)); ?></td>
                  <td><?php echo e($h->tujuan_sertifikasi); ?></td>
                  <td><?php echo e($h->kluster_code); ?></td>
                  <td><?php echo e(date('d-M-Y', strtotime($h->created_at))); ?></td>
                  <td><span class="label label-primary"><?php echo e($h->status); ?></span></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
        
        <?php if($check['latest']->submit_status == 4 || $check['latest']->submit_status == 6 || $check['count'] == 0): ?>
        <div class="box-footer">
          <a href='<?php echo e(Route("AdminDataSertifikasi38ControllerGetAdd")); ?>'><button class="btn btn-default btn-lg text-center">Pengajuan Sertifikasi <i class="fa fa-chevron-right"></i></button></a>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-4">
    <?php if($active->jadwal_id != null): ?>
      <div class="info-box bg-aqua">
        <span class="info-box-icon">
        <i class="fa fa-bookmark-o"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Jadwal Asesmen</span>
          <span class="info-box-number"><?php echo e(date('d M Y', strtotime($active->tanggal_mulai))); ?> - <?php echo e(date('d M Y', strtotime($active->tanggal_selesai))); ?></span>
        </div>
      </div>
    <?php endif; ?>  
    </div>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('crudbooster::admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>