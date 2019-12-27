<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-newspaper-o"></i> Index Berita</h3>
  </div>

  <div class="box-body">
      
    <?php $__currentLoopData = $data['contents']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h3><a href="#"><?php echo e($content->title); ?></a></h3>
    <p><?php echo $content->content; ?></p>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </div>
  <div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
      <li><a href="#">More.. »</a></li>
    </ul>
  </div>

</div>