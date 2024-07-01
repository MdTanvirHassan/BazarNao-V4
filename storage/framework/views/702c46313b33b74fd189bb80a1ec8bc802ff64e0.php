

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Chart Of Account Create')); ?></h5>
            </div>

            <form class="form-horizontal" action="<?php echo e(route('chart_of_accounts.store')); ?>" method="POST" enctype="multipart/form-data">
            	<?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="name"><?php echo e(translate('COA Head')); ?></label>
                        <div class="col-sm-9">
                            <select name="coa_head" id="coa_head" class="form-control">
                                <option value="">Select Option</option>
                                <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($acc->id); ?>"><?php echo e($acc->HeadName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="name"><?php echo e(translate('')); ?></label>
                        <div class="col-sm-9">
                            <select name="coa_head" id="coa_head" class="form-control">
                                <option value="">Select Option</option>
                                <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($acc->id); ?>"><?php echo e($acc->HeadName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="email"><?php echo e(translate('Head Name')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="<?php echo e(translate('Head Name')); ?>" id="head_name" name="head_name" class="form-control">
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Transaction
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                          Active
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                          GL Head
                        </label>
                      </div>
                   

                    

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        <a href="<?php echo e(route('chart_of_accounts.index')); ?>" class="btn btn-sm btn-danger">
                            <span class="aiz-side-nav-text"><?php echo e(translate('Go Back')); ?></span>
                        </a>
                    </div>


                </div>
            </form>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/accounting/chartofaccount/create.blade.php ENDPATH**/ ?>