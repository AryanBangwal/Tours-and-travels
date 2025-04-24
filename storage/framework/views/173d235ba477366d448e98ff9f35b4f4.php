<!DOCTYPE html>
<html>
<head>
    <title>Bookings</title>
</head>
<body style="font-family: Arial; padding: 20px; background: #f0f0f0;">

    <h2 style="text-align: center;">Bookings</h2>

    <form method="GET" action="<?php echo e(route('bookings.index')); ?>" style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap;">
        <select name="status" style="padding: 8px;">
            <option value="">All Status</option>
            <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
            <option value="confirmed" <?php echo e(request('status') == 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
            <option value="cancelled" <?php echo e(request('status') == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
        </select>

        <input type="text" name="user_id" placeholder="User ID" value="<?php echo e(request('user_id')); ?>" style="padding: 8px;">
        <input type="text" name="place_id" placeholder="Place ID" value="<?php echo e(request('place_id')); ?>" style="padding: 8px;">

        <input type="date" name="start_date" value="<?php echo e(request('start_date')); ?>" style="padding: 8px;">
        <input type="date" name="end_date" value="<?php echo e(request('end_date')); ?>" style="padding: 8px;">

        <button type="submit" style="padding: 8px 16px; background: #3490dc; color: #fff; border: none;">Filter</button>
    </form>

    <table style="width: 100%; border-collapse: collapse; background: #fff;">
        <thead>
            <tr style="background: #eee;">
                <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
                <th style="padding: 10px; border: 1px solid #ccc;">User</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Place</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Start Date</th>
                <th style="padding: 10px; border: 1px solid #ccc;">End Date</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Guests</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Status</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;"><?php echo e($booking->id); ?></td>
                    <td style="padding: 10px; border: 1px solid #ccc;"><?php echo e($booking->user->name ?? 'N/A'); ?></td>
                    <td style="padding: 10px; border: 1px solid #ccc;"><?php echo e($booking->place->name ?? 'N/A'); ?></td>
                    <td style="padding: 10px; border: 1px solid #ccc;"><?php echo e($booking->start_date); ?></td>
                    <td style="padding: 10px; border: 1px solid #ccc;"><?php echo e($booking->end_date); ?></td>
                    <td style="padding: 10px; border: 1px solid #ccc;"><?php echo e($booking->no_of_guests); ?></td>
                    <td style="padding: 10px; border: 1px solid #ccc;"><?php echo e(ucfirst($booking->status)); ?></td>
                    <td style="padding: 10px; border: 1px solid #ccc;">
                        <a href="<?php echo e(route('bookings.edit', $booking->id)); ?>" style="margin-right: 10px; color: green;">✏️</a>
                        <form action="<?php echo e(route('bookings.destroy', $booking->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" style="border: none; background: none; color: red;" onclick="return confirm('Are you sure?')">🗑️</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <?php echo e($bookings->withQueryString()->links()); ?>

    </div>

</body>
</html>
<?php /**PATH C:\Users\aryan\Git-Projects\tours-and-travels\resources\views/bookings/index.blade.php ENDPATH**/ ?>