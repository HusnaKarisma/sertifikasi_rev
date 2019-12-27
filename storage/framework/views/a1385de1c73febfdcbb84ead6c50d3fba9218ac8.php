<?php if($value): ?>
	<?php if($form['filemanager_type'] == 'file'): ?>
	<a target="_blank" href="<?php echo e(asset($value)); ?>">
		<?php echo e(basename($value)); ?>

	</a>
	<?php else: ?>
	<a data-lightbox="roadtrip" href="<?php echo e(asset($value)); ?>">
	<img src="<?php echo e(asset($value)); ?>" style="max-width: 150px">	
	</a>
	<?php endif; ?>
<?php endif; ?>