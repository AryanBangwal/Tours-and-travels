<!-- resources/views/places/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Places List</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <h2 style="text-align: center;">Places</h2>

    <form method="GET" action="<?php echo e(route('places.index')); ?>" style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap;">
        <input type="text" name="name" placeholder="Name" value="<?php echo e(request('name')); ?>" style="padding: 8px; width: 150px;">
        <input type="text" name="price" placeholder="Price" value="<?php echo e(request('price')); ?>" style="padding: 8px; width: 100px;">
        <input type="text" name="rating" placeholder="Rating" value="<?php echo e(request('rating')); ?>" style="padding: 8px; width: 100px;">
        <select name="status" style="padding: 8px;">
            <option value="">--Status--</option>
            <option value="active" <?php echo e(request('status') == 'active' ? 'selected' : ''); ?>>Active</option>
            <option value="deleted" <?php echo e(request('status') == 'deleted' ? 'selected' : ''); ?>>Deleted</option>
        </select>
        <button type="submit" style="padding: 8px 16px; background-color: #3490dc; color: white; border: none;">Filter</button>
    </form>

    <table style="width: 100%; border-collapse: collapse; background-color: white;">
        <thead>
            <tr style="background-color: #e2e8f0;">
                <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Name</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Price</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Rating</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Image</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;"><?php echo e($place->id); ?></td>
                    <td style="padding: 10px; border: 1px solid #ccc;"><?php echo e($place->name); ?></td>
                    <td style="padding: 10px; border: 1px solid #ccc;"><?php echo e($place->price); ?></td>
                    <td style="padding: 10px; border: 1px solid #ccc;"><?php echo e($place->rating); ?></td>
                    <td style="padding: 10px; border: 1px solid #ccc;">
    <?php if($place->files->isNotEmpty()): ?>
        <img src="<?php echo e(asset($place->files->first()->file_path)); ?>" alt="Place image" style="height: 60px;">
    <?php else: ?>
        N/A
    <?php endif; ?>
</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">
                        <a href="<?php echo e(route('places.edit', $place->id)); ?>" style="margin-right: 10px; color: green; text-decoration: none;">✏️</a>
                        <form action="<?php echo e(route('places.destroy', $place->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" onclick="return confirm('Delete this place?')" style="border: none; background: none; cursor: pointer; color: red;">🗑️</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <?php echo e($places->withQueryString()->links()); ?>

    </div>

</body>
</html>
<?php /**PATH C:\Users\aryan\Git-Projects\tours-and-travels\resources\views/places/index.blade.php ENDPATH**/ ?>