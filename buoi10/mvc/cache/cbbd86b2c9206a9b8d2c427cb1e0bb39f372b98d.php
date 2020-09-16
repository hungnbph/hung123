
<?php $__env->startSection('content'); ?>
    <form action=""method="get" class="form-inline mb-2">
        <div class="form-group">
            <label for=""> Tìm kiếm Từ Khóa</label>
            <input type="text" name="keyword" class="form-control">

        </div>

        <button type="submit" class="btn btn-primary btn-sm">Tìm kiếm</button>

    </form>
    <table class="table table-dark">
        <thead>
        <tr>
           
            <th>id</th>   
            <th>name</th>
            <th>show_menu</th>
            <th>
                <a href="<?php echo e(getClientUrl('add-category')); ?>" class="btn btn-sm btn-danger">Thêm Mới</a>
            </th>      
            

        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($showcate->id); ?></td>
            <td><?php echo e($showcate->cate_name); ?></td>
            <td><?php echo e($showcate->show_menu); ?></td>
            <td>
                <a href="<?php echo e(getClientUrl('delete-category', ['id'=>$showcate->id])); ?>" class="btn btn-sm btn-danger">Xóa</a>
                <a href="<?php echo e(getClientUrl('edit-category', ['id'=>$showcate->id])); ?>" class="btn btn-sm btn-danger">Sửa</a>
           </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\php2\buoi10\mvc\app\views/home/category.blade.php ENDPATH**/ ?>