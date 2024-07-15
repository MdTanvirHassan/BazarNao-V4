

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Chart Of Account Create')); ?></h5>
            </div>

            <form class="form-horizontal" action="<?php echo e(route('accounts.insert_coa2')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="coahead"><?php echo e(translate('COA Head')); ?></label>
                        <div class="col-sm-3">
                            <select name="coahead" class="form-control" onchange="selectparenthead()" id="coahead">
                                <option value=""><?php echo e(translate('Select Option')); ?></option>
                                <?php $__currentLoopData = $coa_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($acc->HeadCode); ?>"><?php echo e($acc->HeadName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <label class="col-sm-3 col-form-label" for="Parentcategory"><?php echo e(translate('Sub COA Head')); ?></label>
                        <div class="col-sm-3">
                            <select name="headcode" class="form-control" id="Parentcategory" onchange="selectsubparenthead()">
                                <option value=""><?php echo e(translate('Select Option')); ?></option>
                                
                            </select>
                        </div>
                    </div>
                    
                  
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="ParentSubcategory"><?php echo e(translate('Sub-Sub COA Head')); ?></label>
                        <div class="col-sm-3">
                            <select name="pheadcode" class="form-control" id="ParentSubcategory">
                                <option value=""><?php echo e(translate('Select Option')); ?></option>
                                
                            </select>
                        </div>

                        <label class="col-sm-2 col-from-label" for="head_name"><?php echo e(translate('Head Name')); ?></label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="<?php echo e(translate('Head Name')); ?>" id="head_name" name="headname" class="form-control">
                        </div>
                    </div>
                    


                    <div class="d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="transaction" value="1" id="flexCheckTransaction">
                            <label class="form-check-label" for="flexCheckTransaction">
                                Transaction
                            </label>
                        </div>
                        <div class="form-check mx-2">
                            <input class="form-check-input" type="checkbox" name="active" value="1" id="flexCheckActive">
                            <label class="form-check-label" for="flexCheckActive">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="gl_head" value="1" id="flexCheckGLHead">
                            <label class="form-check-label" for="flexCheckGLHead">
                                GL Head
                            </label>
                        </div>
                    </div>                    
                   
                    <div class="form-group mb-0 text-right">
                        <button type="reset" class="btn btn-sm btn-secondary"><?php echo e(translate('Reset')); ?></button>
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                       
                    </div>
                </div>
            </form>
        </div>
    </div>
  

<script>

function selectparenthead() {
        var coaheadValue = document.getElementById('coahead').value;
        var parentCategorySelect = document.getElementById('Parentcategory');

        parentCategorySelect.innerHTML = '<option value=""><?php echo e(translate('Select Option')); ?></option>';

        <?php $__currentLoopData = $sub_coa_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            if ('<?php echo e($sub_acc->PHeadCode); ?>' == coaheadValue) {
                var option = document.createElement('option');
                option.value = '<?php echo e($sub_acc->HeadCode); ?>';
                option.textContent = '<?php echo e($sub_acc->HeadName); ?>';
                parentCategorySelect.appendChild(option);
            }
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    }

    function selectsubparenthead() {
        var parentCategoryValue = document.getElementById('Parentcategory').value;
        var parentSubcategorySelect = document.getElementById('ParentSubcategory');

        parentSubcategorySelect.innerHTML = '<option value=""><?php echo e(translate('Select Option')); ?></option>';

        <?php $__currentLoopData = $sub_coa_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            if ('<?php echo e($sub_acc->PHeadCode); ?>' == parentCategoryValue) {
                var option = document.createElement('option');
                option.value = '<?php echo e($sub_acc->HeadCode); ?>';
                option.textContent = '<?php echo e($sub_acc->HeadName); ?>(<?php echo e($sub_acc->HeadLevel); ?>)';
                parentSubcategorySelect.appendChild(option);
                <?php $__currentLoopData = $sub_coa_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    if ('<?php echo e($sub->PHeadCode); ?>' == option.value) {
                        var options = document.createElement('option');
                        options.value = '<?php echo e($sub->HeadCode); ?>';
                        options.textContent = '-<?php echo e($sub->HeadName); ?>(<?php echo e($sub->HeadLevel); ?>)';
                        parentSubcategorySelect.appendChild(options);

                        <?php $__currentLoopData = $sub_coa_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            if ('<?php echo e($sub_sub->PHeadCode); ?>' == options.value) {
                                var suboption = document.createElement('option');
                                option2.value = '<?php echo e($sub_sub->HeadCode); ?>';
                                option2.textContent = '--<?php echo e($sub_sub->HeadName); ?>(<?php echo e($sub_sub->HeadLevel); ?>)';
                                parentSubcategorySelect.appendChild(option2);
                                
                            }
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    }
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/accounting/chartofaccount/create.blade.php ENDPATH**/ ?>