<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px 12px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn {
            padding: 6px 10px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 4px;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #000;
        }
    </style>
</head>
<body>

<h2>User List</h2>

<a href="<?php echo e(route('users.create')); ?>" class="btn">Create User</a>

<?php if(session('success')): ?>
    <p style="color: green;"><?php echo e(session('success')); ?></p>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Email Verified At</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($user->id); ?></td>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e($user->email_verified_at); ?></td>
            <td><?php echo e($user->created_at); ?></td>
            <td><?php echo e($user->updated_at); ?></td>
            <td class="actions">
                <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning">Edit</a>
                <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="7">No users found.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

</body>
</html>
<?php /**PATH C:\Users\aryan\Git-Projects\tours-and-travels\resources\views/users/index.blade.php ENDPATH**/ ?>