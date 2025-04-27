<!DOCTYPE html>
<html>
<head>
    <title>Create Payment</title>
</head>
<body>

<h2>Create Payment</h2>

<form action="<?php echo e(route('payments.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <label>Booking</label>
    <select name="booking_id" required>
        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($booking->id); ?>"><?php echo e($booking->id); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select><br><br>

    <label>Amount</label>
    <input type="number" name="amount" step="0.01" required><br><br>

    <label>Status</label>
    <input type="text" name="status" value="pending" required><br><br>

    <label>Payment At</label>
    <input type="datetime-local" name="payment_at" required><br><br>

    <label>Third Party Ref ID</label>
    <input type="text" name="third_party_ref_id" required><br><br>

    <button type="submit">Create</button>
    <a href="<?php echo e(route('payments.index')); ?>">Cancel</a>
</form>

</body>
</html>
<?php /**PATH C:\Users\aryan\Git-Projects\tours-and-travels\resources\views/payments/create.blade.php ENDPATH**/ ?>