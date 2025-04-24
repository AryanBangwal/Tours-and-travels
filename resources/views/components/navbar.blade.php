<!-- resources/views/components/navbar.blade.php -->

<nav class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <!-- Logo / Brand -->
        <div class="text-2xl font-extrabold font-serif tracking-wide">
            Tours And Travel
        </div>

        <!-- Navigation Links -->
        <div class="space-x-8 text-white text-base font-medium">
            <a href="{{ route('popular') }}" class="hover:text-gray-300">Popular Places</a>
            <a href="{{ route('gallery') }}" class="hover:text-gray-300">Gallery</a>
            <a href="{{ route('login') }}" class="hover:text-gray-300">Sign up / Login</a>
            <a href="{{ route('contact') }}" class="hover:text-gray-300">Contact</a>
        </div>
    </div>
</nav>
