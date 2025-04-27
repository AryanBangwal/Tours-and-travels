<!-- resources/views/bookings/edit.blade.php (same for create.blade.php) -->

<!DOCTYPE html>
<html>
<head>
    <title><?php echo e(isset($booking) ? 'Edit' : 'Create'); ?> Booking</title>
</head>
<body style="font-family: Arial; padding: 40px; background-color: #f5f5f5;">

    <h2 style="text-align: center;"><?php echo e(isset($booking) ? 'Edit' : 'Create'); ?> Booking</h2>
    <?php if($errors->any()): ?>
        <div style="max-width: 600px; margin: 0 auto 20px; padding: 15px; background-color: #ffe0e0; border-left: 5px solid #f44336; border-radius: 4px;">
            <ul style="margin: 0; padding-left: 20px; color: #b71c1c;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(isset($booking) ? route('bookings.update', $booking->id) : route('bookings.store')); ?>" method="POST" style="max-width: 600px; margin: auto; background: #fff; padding: 30px;">
        <?php echo csrf_field(); ?>
        <?php if(isset($booking)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div style="margin-bottom: 20px;">
            <label>User:</label>
            <select name="user_id" style="width: 100%; padding: 10px;">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" <?php echo e((isset($booking) && $booking->user_id == $user->id) ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label>Place:</label>
            <select name="place_id" style="width: 100%; padding: 10px;">
                <?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($place->id); ?>" <?php echo e((isset($booking) && $booking->place_id == $place->id) ? 'selected' : ''); ?>><?php echo e($place->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label>Start Date:</label>
            <input type="date" name="start_date" value="<?php echo e($booking->start_date ?? ''); ?>" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>End Date:</label>
            <input type="date" name="end_date" value="<?php echo e($booking->end_date ?? ''); ?>" style="width: 100%; padding: 10px;">
        </div>


        <div style="margin-bottom: 20px;">
            <label>No. of Guests:</label>
            <input type="number" name="no_of_guests" value="<?php echo e($booking->no_of_guests ?? 1); ?>" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>Status:</label>
            <select name="status" style="width: 100%; padding: 10px;">
                <?php $__currentLoopData = ['pending', 'confirmed', 'cancelled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($status); ?>" <?php echo e((isset($booking) && $booking->status === $status) ? 'selected' : ''); ?>>
                        <?php echo e(ucfirst($status)); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div style="text-align: center;">
            <button type="submit" style="padding: 12px 24px; background-color: #38b2ac; color: #fff; border: none;"><?php echo e(isset($booking) ? 'Update' : 'Create'); ?> Booking</button>
        </div>
    </form>

</body>
</html>
<?php /**PATH C:\Users\aryan\Git-Projects\tours-and-travels\resources\views/bookings/create.blade.php ENDPATH**/ ?>