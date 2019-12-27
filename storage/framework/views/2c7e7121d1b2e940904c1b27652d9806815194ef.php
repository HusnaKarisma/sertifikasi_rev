

<?php $__env->startSection('content'); ?>
<div class="container post">
  <form class='form-horizontal' method='post' id="form-register" enctype="multipart/form-data" action='<?php echo e($action); ?>'>
    
    
    <h1 class="animated hiding" data-animation="bounceInUp" delay="200">Registration Form</h1>
    <div class="alert alert-danger" id="alert-box">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Warning!</h4>
        <b><span id="alert-msg">The data has been added !</span></b><br />
        Forgot password? <a href="<?php echo e(url('forgot')); ?>">click here!</a>
    </div>
    
    <?php if(@$alerts): ?>
      <?php $__currentLoopData = @$alerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class='callout callout-<?php echo e($alert[type]); ?>'>                
            <?php echo $alert['message']; ?>

        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
$(function() {

  $('#alert-box').hide();
  $('#loading').hide();

  $('#register').click(function( e ) {
    var data = $('#form-register').serializeArray();
    $('#loading').show();
     $.ajax({
        url: "<?php echo e(url('api/post_pustakawan')); ?>",
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
            window.location = "<?php echo e(url('success')); ?>";
          }
        }
      });  

    e.preventDefault();
  });
  $('#loading').hide();


  
});
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>