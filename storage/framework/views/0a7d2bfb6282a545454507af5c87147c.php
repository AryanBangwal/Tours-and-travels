<!DOCTYPE html>
<html>
<head>
    <title>Create Place</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 40px;">

    <h2 style="text-align: center; margin-bottom: 30px;">Create New Place</h2>

    <?php if($errors->any()): ?>
        <div style="max-width: 600px; margin: 0 auto 20px; padding: 15px; background-color: #ffe0e0; border-left: 5px solid #f44336; border-radius: 4px;">
            <ul style="margin: 0; padding-left: 20px; color: #b71c1c;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('places.store')); ?>" method="POST" enctype="multipart/form-data"
          style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
        <?php echo csrf_field(); ?>

        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; margin-bottom: 6px;">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="description" style="display: block; margin-bottom: 6px;">Description:</label>
            <textarea name="description" id="description" rows="4"
                      style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required><?php echo e(old('description')); ?></textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="price" style="display: block; margin-bottom: 6px;">Price:</label>
            <input type="text" name="price" id="price" value="<?php echo e(old('price')); ?>"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="rating" style="display: block; margin-bottom: 6px;">Rating:</label>
            <input type="text" name="rating" id="rating" value="<?php echo e(old('rating')); ?>"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="image" style="display: block; margin-bottom: 6px;">Image:</label>
            <input type="file" name="image" id="image" accept="image/*"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="text-align: center;">
            <button type="submit"
                    style="background-color: #4CAF50; color: white; padding: 12px 24px; border: none; border-radius: 4px; cursor: pointer;">
                Create Place
            </button>
        </div>
    </form>

</body>
</html>
<?php /**PATH C:\Users\aryan\Git-Projects\tours-and-travels\resources\views/places/create.blade.php ENDPATH**/ ?>