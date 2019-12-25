
<?php $__env->startSection('content'); ?>
    <style>
        .wrapper {
            display: none !important;
        }
    </style>
    <div class="login-box">
        <div class="login-logo">

            <?php if(empty($web_setting[15]->value) or !file_exists(asset('').$web_setting[15]->value)): ?>
                <?php if($web_setting[66]->value=='1' and $web_setting[67]->value=='0'): ?>
                    <img src="<?php echo e(asset('/resources/views/admin/images/admin_logo/scart-mid.png')); ?>"
                         class="ionic-hide">
                    <img src="<?php echo e(asset('/resources/views/admin/images/admin_logo/scart-mid.png')); ?>"
                         class="android-hide">
                <?php elseif($web_setting[66]->value=='1' and $web_setting[67]->value=='1' or $web_setting[66]->value=='0' and $web_setting[67]->value=='1'): ?>
                    <img src="<?php echo e(asset('/resources/views/admin/images/admin_logo/scart-mid.png')); ?>"
                         class="website-hide">
                <?php endif; ?>
            <?php else: ?>
                <img style="width: 60%" src="<?php echo e(asset('').$web_setting[15]->value); ?>">
            <?php endif; ?>
                <div class="login-title-des col-md-12 p-b-41">
                    <a><b> <?php echo e(trans('labels.welcome_message')); ?></b><?php echo e(trans('labels.welcome_message_to')); ?></a>
                </div>
        </div>
        <!-- /.login-logo -->
        <div class="wrap-login100 main-login">
            <p class="login-box-msg"><?php echo e(trans('labels.login_text')); ?></p>

            <!-- if email or password are not correct -->
            <?php if( count($errors) > 0): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only"><?php echo e(trans('labels.Error')); ?>:</span>
                        <?php echo e($error); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if(Session::has('loginError')): ?>
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only"><?php echo e(trans('labels.Error')); ?>:</span>
                    <?php echo session('loginError'); ?>

                </div>
            <?php endif; ?>

            <?php echo Form::open(array('url' =>'admin/checkLogin', 'method'=>'post', 'class'=>'form-validate')); ?>


            <div class=" wrap-input100 form-group has-feedback">
                <?php echo Form::email('email', '', array('class'=>'form-control input100 email-validate', 'id'=>'email')); ?>

                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                     <?php echo e(trans('labels.AdminEmailText')); ?></span>
                <span class="help-block hidden"> <?php echo e(trans('labels.AdminEmailText')); ?></span>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="wrap-input100 form-group has-feedback">
                <input type="password" name='password' class='form-control field-validate input100' value="">
                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                   <?php echo e(trans('labels.AdminPasswordText')); ?></span>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>

            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-xs-4 container-login-btn">
                    <?php echo Form::submit(trans('labels.login'), array('id'=>'login', 'class'=>'btn login-btn btn-primary btn-block btn-flat' )); ?>

                </div>
                <!-- /.col -->
            </div>
            <?php echo Form::close(); ?>


        </div>

        <!-- /.login-box-body -->
    </div>
<?php echo $__env->make('admin.layoutLlogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>