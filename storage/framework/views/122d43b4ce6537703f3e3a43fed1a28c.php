<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <style>
        form { max-width: 400px; margin: 20px auto; }
        div { margin-bottom: 12px; }
        label { display: block; font-weight: bold; }
        input { width: 100%; padding: 8px; }
        .btn { padding: 8px 12px; background: #007bff; color: white; border: none; border-radius: 4px; }
        .btn-secondary { background: gray; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>

<h2>Create User</h2>

<form action="<?php echo e(route('users.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div>
        <label>Name</label>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>" required>
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo e(old('email')); ?>" required>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" required>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn">Save</button>
    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary">Cancel</a>
</form>

</body>
</html>
<?php /**PATH C:\Users\aryan\Git-Projects\tours-and-travels\resources\views/users/create.blade.php ENDPATH**/ ?>