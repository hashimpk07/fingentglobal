
<?php $__env->startSection('content'); ?>
<!-- /.card-header -->
<div class="card-header">
    <button type="button" class="btn btn-info" style="float: right"; onclick="window.location='<?php echo e(URL::route('mark-list.add')); ?>'" ><i class="fa fa-plus"></i> Add Mark List </button>
</div>
<div class="card-body">
    <h5> Students Mark List Table</h5>
    <?php
    if( 0  != $markLists->total() ){?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Maths</th>
                <th>Science</th>
                <th>History</th>
                <th>Term</th>
                <th>Total Marks</th>
                <th>Created On</th>
                <th style="width:166px">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = ($markLists->perPage() * ($markLists->currentPage() - 1)) + 1; ?>
            <?php $__currentLoopData = $markLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $markList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($i++); ?></td>
                <td><?php echo e($markList->students->name); ?></td>
                <td><?php echo e($markList->maths); ?></td>
                <td><?php echo e($markList->science); ?></td>
                <td><?php echo e($markList->history); ?></td>
                <td><?php echo e($markList->terms); ?></td>
                <td><?php echo e($markList->total_marks); ?></td>
                <td><?php echo e($markList->created); ?></td>
                <td>
                    <a class="btn"  title="edit" href="<?php echo e(route('mark-list.edit', ['id' => $markList->id])); ?>"  ><i class="fas fa-edit"></i></a>
                    <a class="btn" title="delete" onclick="return confirm('Are you sure to detete this mark list ?')"  href="<?php echo e(route('mark-list.delete', ['id' => $markList->id])); ?>" ><i class="fas fa-times"></i></a>
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
        <?php echo $markLists->links('pagination::bootstrap-4'); ?>

    </ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\Fingent\resources\views/mark-list/mark-list.blade.php ENDPATH**/ ?>