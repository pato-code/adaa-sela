 <?php $__env->startSection('content'); ?>

<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div> 
<?php endif; ?>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4><?php echo e(trans('file.add')); ?> <?php echo e(trans('file.payments_category')); ?></h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                        <?php echo Form::open(['route' => 'payments_category.store', 'method' => 'post', ]); ?>

                            <div class="row">

                                <div class="col-md-4 form-group">
                                    <label><strong><?php echo e(trans('file.name')); ?> *</strong> </label>
                                    <input type="text" name="name" required class="form-control">
                                    <?php if($errors->has('name')): ?>
                                   <span>
                                       <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label><strong><?php echo e(trans('file.role')); ?> *</strong></label>
                                    <select name="role_id" required class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Role...">
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>


                                <div class="col-md-4 form-group">
                                    <label><strong><?php echo e(trans('file.fees')); ?> *</strong></label>
                                    <input class="form-control" type="number" name="fees" value="5000">
                                </div>



                            </div>

                            <div class="row">
                                <div class="form-group text-center">
                                    
                                    <div class="col-md-3">
                                        <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
                                    </div>

                                </div>
                            </div>



                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

    $("ul#people").siblings('a').attr('aria-expanded','true');
    $("ul#people").addClass("show");
    $("ul#people #user-create-menu").addClass("active");

    $('#warehouseId').hide();
    $('#biller-id').hide();
    $('.customer-section').hide();

    $('.selectpicker').selectpicker({
      style: 'btn-link',
    });
    
    $('#genbutton').on("click", function(){
      $.get('genpass', function(data){
        $("input[name='password']").val(data);
      });
    });

    $('select[name="role_id"]').on('change', function() {
        if($(this).val() == 5) {
            $('#biller-id').hide(300);
            $('#warehouseId').hide(300);
            $('.customer-section').show(300);
            $('.customer-input').prop('required',true);
            $('select[name="warehouse_id"]').prop('required',false);
            $('select[name="biller_id"]').prop('required',false);
        }
        else if($(this).val() > 2 && $(this).val() < 5) {
            $('select[name="warehouse_id"]').prop('required',true);
            $('select[name="biller_id"]').prop('required',true);
            $('#biller-id').show(300);
            $('#warehouseId').show(300);
            $('.customer-section').hide(300);
            $('.customer-input').prop('required',false);
        }
        else {
            $('select[name="warehouse_id"]').prop('required',false);
            $('select[name="biller_id"]').prop('required',false);
            $('#biller-id').hide(300);
            $('#warehouseId').hide(300);
            $('.customer-section').hide(300);
            $('.customer-input').prop('required',false);
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/albraa/myProjects/bk/adaa-sela/resources/views/payments_category/create.blade.php ENDPATH**/ ?>