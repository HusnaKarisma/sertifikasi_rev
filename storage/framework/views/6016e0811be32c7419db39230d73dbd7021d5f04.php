<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="menu-item menu-item-type-custom">
  <a title="<?php echo e($m->title); ?>" href="/page/<?php echo e($m->slug); ?>"><?php echo e($m->title); ?></a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>