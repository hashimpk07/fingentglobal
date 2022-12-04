
<?php $__env->startSection('content'); ?>

<!-- /.card-header -->
<div class="card-header">
    <button type="button" class="btn btn-info" style="float: right"; onclick="window.location='<?php echo e(URL::route('product.add')); ?>'" ><i class="fa fa-plus"></i> Add Products </button>
</div>
<div class="card-body">
    <h5> Products Table</h5>
    <?php
    if( 0  != $products->total() ){?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th >Product Image </th>
                <th> Product Name </th>
                <th> Product Color </th>
                <th> Product Size </th>
                <th style="width: 170px">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = ($products->perPage() * ($products->currentPage() - 1)) + 1; ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
            <tr>
                <td ><?php echo e($i++); ?></td>
                <td style="width: 10px" > 
                <?php 
                    if( '' == $product->productimage ){?>
                    <img src="<?php echo e(asset('images/avatar.png')); ?>" alt="tag"  height="50" width="50"> 
                <?php }else{ ?>
                    <img src="<?php echo e(asset('images/').'/'.$product->productimage); ?>" alt="tag"  height="50" width="50" >
                    <?php     } ?>
                </td>
                <td > <?php echo e($product->productName); ?> </td>
                <td > <?php echo e($product->colorName); ?> </td>
                <td > <?php echo e($product->sizeName); ?> </td>
                 <td>
                    <a class="btn"  title="edit" href="<?php echo e(route('product.edit', ['id' => $product->productId])); ?>"  ><i class="fas fa-edit"></i></a>
                    <a class="btn" title="view" href="<?php echo e(route('product.show', ['id' => $product->productId])); ?>" ><i class="fas fa-eye"></i></a>
                    <a class="btn" title="delete" onclick="return confirm('Are you sure to detete Product <?php echo e($product->productName); ?> ?')"  href="<?php echo e(route('product.delete', ['id' => $product->productId])); ?>" ><i class="fas fa-times"></i></a>
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
        <?php echo $products->links('pagination::bootstrap-4'); ?>

    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\TimesworldTechnology\resources\views/product/product-list.blade.php ENDPATH**/ ?>