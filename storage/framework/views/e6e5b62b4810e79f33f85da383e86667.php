<!DOCTYPE html>
<html>
<head>
    <title>Payments</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f5f5f5; }
        a.btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; }
        .btn-primary { background: #007bff; }
        .btn-danger { background: red; }
        .btn-warning { background: orange; }
    </style>
</head>
<body>

<h2>Payments</h2>
<a href="<?php echo e(route('payments.create')); ?>" class="btn btn-primary">Add Payment</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Booking ID</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Paid At</th>
            <th>Ref ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($payment->id); ?></td>
                <td><?php echo e($payment->booking_id); ?></td>
                <td><?php echo e($payment->amount); ?></td>
                <td><?php echo e($payment->status); ?></td>
                <td><?php echo e($payment->payment_at); ?></td>
                <td><?php echo e($payment->third_party_ref_id); ?></td>
                <td>
                    <a href="<?php echo e(route('payments.edit', $payment->id)); ?>" class="btn btn-warning">Edit</a>
                    <form action="<?php echo e(route('payments.destroy', $payment->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="7">No payments found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php echo e($payments->links()); ?>


</body>
</html>
<?php /**PATH C:\Users\aryan\Git-Projects\tours-and-travels\resources\views/payments/index.blade.php ENDPATH**/ ?>