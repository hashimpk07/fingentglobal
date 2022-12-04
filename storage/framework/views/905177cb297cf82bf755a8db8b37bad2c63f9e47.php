
<?php $__env->startSection('content'); ?>

<!-- /.card-header -->
<div class="card-header">
    <button type="button" class="btn btn-info" style="float: right"; onclick="window.location='<?php echo e(URL::route('teachers.add')); ?>'" ><i class="fa fa-plus"></i> Add Teachers </button>
</div>
<div class="card-body">
    <h5> Teachers Table</h5>
    <?php
    if( 0  != $teachers->total() ){?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th style="width: 250px">Name</th>
                <th style="width: 30px">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = ($teachers->perPage() * ($teachers->currentPage() - 1)) + 1; ?>
            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td ><?php echo e($i++); ?></td>
                <td > <?php echo e($teacher->name); ?> </td>
                <td>
                    <a class="btn"  title="edit" href="<?php echo e(route('teachers.edit', ['id' => $teacher->id])); ?>"  ><i class="fas fa-edit"></i></a>
                    <a class="btn" title="view" href="<?php echo e(route('teachers.show', ['id' => $teacher->id])); ?>" ><i class="fas fa-eye"></i></a>
                    <a class="btn" title="delete" onclick="return confirm('Are you sure to detete plan <?php echo e($teacher->name); ?> ?')"  href="<?php echo e(route('teachers.delete', ['id' => $teacher->id])); ?>" ><i class="fas fa-times"></i></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </tbody>
    </table>
</div>
<?php } else{?> 
<img src="<?php echo e(url('/images/norecordfound.png')); ?>" class="no-data-found" style="width: 100%;" />
    <?php } ?>
</div>
<!-- /.card-body -->
<div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        <?php echo $teachers->links('pagination::bootstrap-4'); ?>

    </ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\Fingent\resources\views/teachers/teachers-list.blade.php ENDPATH**/ ?>