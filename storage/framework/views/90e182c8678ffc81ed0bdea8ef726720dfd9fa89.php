<?php $__env->startSection('content'); ?>

    <?php if($errors->has('name')): ?>
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e($errors->first('name')); ?></div>
    <?php endif; ?>
    <?php if($errors->has('image')): ?>
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e($errors->first('image')); ?></div>
    <?php endif; ?>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('message')); ?></div>
    <?php endif; ?>
    <?php if(session()->has('not_permitted')): ?>
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
    <?php endif; ?>

    <section>
        <div class="container-fluid">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModal"><i class="dripicons-plus"></i> <?php echo e(trans("file.Add Category")); ?></button>&nbsp;
            <button class="btn btn-primary" data-toggle="modal" data-target="#importCategory"><i class="dripicons-copy"></i> <?php echo e(trans('file.Import Category')); ?></button>
        </div>
        <div class="table-responsive">
            <table class="table" style="width: 100%">
                <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th><?php echo e(trans('file.organization_name')); ?></th>
                    <th><?php echo e(trans('file.organization_phone')); ?></th>
                    <th><?php echo e(trans('file.organization_location')); ?></th>
                    
                    
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($organization->id); ?></td>
                            <td><?php echo e($organization->name); ?></td>
                            <td><?php echo e($organization->phone); ?></td>
                            <td><?php echo e($organization->location); ?></td>

                            
                            
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">

                                            <li>
                                                <a href="<?php echo e(route('organization.edit', $organization->id)); ?>" class="btn btn-link"><i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></a>
                                            </li>
                                        
                                        <li class="divider"></li>



                                        <a href="<?php echo e(route('organization.users', $organization->id)); ?>" class="btn btn-link"><i class="dripicons-document-edit"></i> <?php echo e(trans('file.orgnaztion_users')); ?></a>
                                            
                                            
                                                
                                            
                                            
                                        
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Create Modal -->
    <div id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <?php echo Form::open(['route' => 'organization.store', 'method' => 'post', 'files' => true]); ?>

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.organization_add')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                    <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.organization_name')); ?> *</label>
                            <?php echo e(Form::text('name',null,array('required' => 'required', 'class' => 'form-control', 'placeholder' => 'Type name...'))); ?>

                        </div>

                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.organization_phone')); ?> *</label>
                            <?php echo e(Form::text('phone',null,array('required' => 'required', 'class' => 'form-control', 'placeholder' => 'Type org phone...'))); ?>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.organization_location')); ?> *</label>
                            <input type="text" name="location" class="form-control" required="required" placeholder="Type org location...">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    
        
            
                
                
                    
                    
                
                
                    
                    
                        
                            
                            
                        
                        
                        
                            
                            
                        
                        
                            
                            
                                
                                
                                    
                                
                            
                        
                    

                    
                        
                    
                
                
            
        
    
    <!-- Import Modal -->
    
        
            
                
                
                    
                    
                
                
                    
                    
                    
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                    
                    
                
                
            
        
    

    <script type="text/javascript">
        $("ul#product").siblings('a').attr('aria-expanded','true');
        $("ul#product").addClass("show");
        $("ul#product #category-menu").addClass("active");

        function confirmDelete() {
            if (confirm("If you delete category all products under this category will also be deleted. Are you sure want to delete?")) {
                return true;
            }
            return false;
        }

        var category_id = [];
        var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on("click", ".open-EditCategoryDialog", function(){
            var url ="category/";
            var id = $(this).data('id').toString();
            url = url.concat(id).concat("/edit");

            $.get(url, function(data){
                $("#editModal input[name='name']").val(data['name']);
                $("#editModal select[name='parent_id']").val(data['parent_id']);
                $("#editModal input[name='category_id']").val(data['id']);
                $('.selectpicker').selectpicker('refresh');
            });
        });

        $('#category-table').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":{
                url:"category/category-data",
                dataType: "json",
                type:"post"
            },
            "createdRow": function( row, data, dataIndex ) {
                $(row).attr('data-id', data['id']);
            },
            "columns": [
                {"data": "key"},
                {"data": "image"},
                {"data": "name"},
                {"data": "parent_id"},
                {"data": "number_of_product"},
                {"data": "stock_qty"},
                {"data": "stock_worth"},
                {"data": "options"},
            ],
            'language': {
                'lengthMenu': '_MENU_ <?php echo e(trans("file.records per page")); ?>',
                "info":      '<small><?php echo e(trans("file.Showing")); ?> _START_ - _END_ (_TOTAL_)</small>',
                "search":  '<?php echo e(trans("file.Search")); ?>',
                'paginate': {
                    'previous': '<i class="dripicons-chevron-left"></i>',
                    'next': '<i class="dripicons-chevron-right"></i>'
                }
            },
            order:[['2', 'asc']],
            'columnDefs': [
                {
                    "orderable": false,
                    'targets': [0, 1, 3, 4, 5, 6, 7]
                },
                {
                    'render': function(data, type, row, meta){
                        if(type === 'display'){
                            data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                        }

                        return data;
                    },
                    'checkboxes': {
                        'selectRow': true,
                        'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                    },
                    'targets': [0]
                }
            ],
            'select': { style: 'multi',  selector: 'td:first-child'},
            'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],

            dom: '<"row"lfB>rtip',
            buttons: [
                {
                    extend: 'pdf',
                    text: '<?php echo e(trans("file.PDF")); ?>',
                    exportOptions: {
                        columns: ':visible:Not(.not-exported)',
                        rows: ':visible'
                    },
                    footer:true
                },
                {
                    extend: 'csv',
                    text: '<?php echo e(trans("file.CSV")); ?>',
                    exportOptions: {
                        columns: ':visible:Not(.not-exported)',
                        rows: ':visible'
                    },
                    footer:true
                },
                {
                    extend: 'print',
                    text: '<?php echo e(trans("file.Print")); ?>',
                    exportOptions: {
                        columns: ':visible:Not(.not-exported)',
                        rows: ':visible'
                    },
                    footer:true
                },
                {
                    text: '<?php echo e(trans("file.delete")); ?>',
                    className: 'buttons-delete',
                    action: function ( e, dt, node, config ) {
                        if(user_verified == '1') {
                            category_id.length = 0;
                            $(':checkbox:checked').each(function(i){
                                if(i){
                                    category_id[i-1] = $(this).closest('tr').data('id');
                                }
                            });
                            if(category_id.length && confirm("If you delete category all products under this category will also be deleted. Are you sure want to delete?")) {
                                $.ajax({
                                    type:'POST',
                                    url:'category/deletebyselection',
                                    data:{
                                        categoryIdArray: category_id
                                    },
                                    success:function(data){
                                        dt.rows({ page: 'current', selected: true }).deselect();
                                        dt.rows({ page: 'current', selected: true }).remove().draw(false);
                                    }
                                });
                            }
                            else if(!category_id.length)
                                alert('No category is selected!');
                        }
                        else
                            alert('This feature is disable for demo!');
                    }
                },
                {
                    extend: 'colvis',
                    text: '<?php echo e(trans("file.Column visibility")); ?>',
                    columns: ':gt(0)'
                },
            ],
        } );

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/albraa/myProjects/bk/adaa-sela/resources/views/organization/index.blade.php ENDPATH**/ ?>