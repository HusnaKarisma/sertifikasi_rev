<div class='form-group <?php echo e($header_group_class); ?> <?php echo e(($errors->first($name))?"has-error":""); ?>' id='form-group-<?php echo e($name); ?>' style='<?php echo e(@$form["style"]); ?>'>
				<label class='control-label col-sm-2'><?php echo e($form['label']); ?> <?php echo ($required)?"<span class='text-danger' title='This field is required'>*</span>":""; ?></label>

				<div class="<?php echo e($col_width?:'col-sm-10'); ?>">

				<?php if($value==''): ?>
				<div class="input-group">	
					<input id="thumbnail-<?php echo e($name); ?>" class="form-control" type="text" readonly value='<?php echo e($value); ?>' name="<?php echo e($name); ?>">
			      <span class="input-group-btn">
			        <a id="lfm-<?php echo e($name); ?>" data-input="thumbnail-<?php echo e($name); ?>" data-preview="holder-<?php echo e($name); ?>" class="btn btn-primary">
			          <?php if(@$form['filemanager_type'] == 'file'): ?>
			          	<i class="fa fa-file-o"></i> <?php echo e(trans("crudbooster.chose_an_file")); ?>

			          <?php else: ?>
			          	<i class='fa fa-picture-o'></i> <?php echo e(trans("crudbooster.chose_an_image")); ?>

			          <?php endif; ?>
			        </a>
			      </span>
			      
			    </div>
			    <?php endif; ?>
			    
			    <?php if($value): ?>
			    	<input id="thumbnail-<?php echo e($name); ?>" class="form-control" type="hidden" value='<?php echo e($value); ?>' name="<?php echo e($name); ?>">
				    <?php if(@$form['filemanager_type'] == 'file'): ?>
			          	<?php if($value): ?> <div style='margin-top:15px'><a id='holder-<?php echo e($name); ?>' href='<?php echo e(asset($value)); ?>' target='_blank' title=' <?php echo e(trans("crudbooster.button_download_file")); ?> <?php echo e(basename($value)); ?>'><i class='fa fa-download'></i> <?php echo e(trans("crudbooster.button_download_file")); ?>  <?php echo e(basename($value)); ?></a> 
			          	&nbsp;<a class='btn btn-danger btn-delete btn-xs' onclick='swal({   title: "<?php echo e(trans("crudbooster.delete_title_confirm")); ?>",   text: "<?php echo e(trans("crudbooster.delete_description_confirm")); ?>",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "<?php echo e(trans("crudbooster.confirmation_yes")); ?>",cancelButtonText: "<?php echo e(trans('crudbooster.button_cancel')); ?>",   closeOnConfirm: false }, function(){  location.href="<?php echo e(url($mainpath."/delete-filemanager?file=".$row->{$name}."&id=".$row->id."&column=".$name)); ?>" });' href='javascript:void(0)' title='<?php echo e(trans('crudbooster.text_delete')); ?>'><i class='fa fa-ban'></i></a>
			          	</div><?php endif; ?>
			        <?php else: ?>
			          	<p><a data-lightbox="roadtrip" href="<?php echo e(($value)?asset($value):''); ?>"><img id='holder-<?php echo e($name); ?>' <?php echo e(($value)?'src='.asset($value):''); ?> style="margin-top:15px;max-height:100px;"></a></p>
			        <?php endif; ?>

			        <?php if(!$readonly || !$disabled): ?>
					<p><a class='btn btn-danger btn-delete btn-sm' onclick='swal({   title: "<?php echo e(trans("crudbooster.delete_title_confirm")); ?>",   text: "<?php echo e(trans("crudbooster.delete_description_confirm")); ?>",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "<?php echo e(trans("crudbooster.confirmation_yes")); ?>", cancelButtonText: "<?php echo e(trans('crudbooster.button_cancel')); ?>",   closeOnConfirm: false }, function(){  location.href="<?php echo e(url(CRUDBooster::mainpath("update-single?table=$table&column=$name&value=&id=$id"))); ?>" });'><i class='fa fa-ban'></i> <?php echo e(trans('crudbooster.text_delete')); ?> </a></p>
					<?php endif; ?>
				<?php endif; ?>
			    

				<div class='help-block'><?php echo e(@$form['help']); ?></div>
				<div class="text-danger"><?php echo $errors->first($name)?"<i class='fa fa-info-circle'></i> ".$errors->first($name):""; ?></div>
				</div>
			</div>
			<?php if(@$form['filemanager_type']): ?>
				<?php $__env->startPush('bottom'); ?>
				<script type="text/javascript">$('#lfm-<?php echo e($name); ?>').filemanager('file','<?php echo e(url("/")); ?>');</script>
				<?php $__env->stopPush(); ?>
			<?php else: ?>
				<?php $__env->startPush('bottom'); ?>
				<script type="text/javascript">$('#lfm-<?php echo e($name); ?>').filemanager('images','<?php echo e(url("/")); ?>');</script>
				<?php $__env->stopPush(); ?>
			<?php endif; ?>
