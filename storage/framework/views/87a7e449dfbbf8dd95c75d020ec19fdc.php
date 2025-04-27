<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tours And Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?> <!-- If using Laravel Vite -->
</head>
<body class="bg-gray-900 text-white font-sans">

    
    <?php echo $__env->make('homepage.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <section class="relative bg-cover bg-center h-[500px]" style="background-image: url('/images/hero.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-end pr-16">
            <h1 class="text-5xl font-bold text-white">Group & Individual Getaways</h1>
            <p class="mt-4 text-xl text-white">Experience. Tourism. These are as education in themselves.</p>
            <a href="#contact" class="mt-6 bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-700">
                CONTACT US
            </a>
        </div>
    </section>

    
    <section class="py-16 text-center">
        <h2 class="text-4xl font-bold mb-6">Search Destinations</h2>
        <form class="max-w-4xl mx-auto flex flex-col sm:flex-row items-center justify-center gap-4 px-4">
            <input type="text" name="search" placeholder="Agra, Delhi, Jaipur, Haridwar, Mathura, Varanasi, Vrindavan"
                   class="w-full px-4 py-2 text-gray-800 rounded shadow">
            <button type="submit" class="bg-teal-600 hover:bg-teal-700 px-6 py-2 rounded text-white font-semibold">
                SEARCH
            </button>
        </form>
    </section>

</body>
</html>
<?php /**PATH C:\Users\aryan\Git-Projects\tours-and-travels\resources\views/homepage/homepage.blade.php ENDPATH**/ ?>