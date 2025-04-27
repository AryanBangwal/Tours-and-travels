<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tours And Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Global Styles */
        body {
            background-color: #1a202c; /* Tailwind's gray-900 */
            color: white;
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #1a202c;
            color: white;
            padding: 0.75rem 0;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            font-family: serif;
            letter-spacing: 0.05em;
        }

        .navbar-links {
            display: flex;
            gap: 2rem;
            font-size: 1rem;
            font-weight: 500;
        }

        .navbar-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .navbar-links a:hover {
            color: #d1d5db; /* Tailwind's gray-300 */
        }

        /* Hero Section */
        .hero {
            position: relative;
            background-image: url('/images/hero.jpg');
            background-size: cover;
            background-position: center;
            height: 500px;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-end;
            padding-right: 4rem;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            margin: 0;
        }

        .hero p {
            margin-top: 1rem;
            font-size: 1.25rem;
        }

        .hero a {
            margin-top: 1.5rem;
            background-color: #2d3748;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .hero a:hover {
            background-color: #4a5568;
        }

        /* Search Section */
        .search-section {
            padding: 4rem 1rem;
            text-align: center;
        }

        .search-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .search-form {
            max-width: 64rem;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        @media (min-width: 640px) {
            .search-form {
                flex-direction: row;
                align-items: center;
                justify-content: center;
            }
        }

        .search-form input {
            flex: 1;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: none;
            color: #1a202c;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .search-form button {
            background-color: #319795;
            color: white;
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-form button:hover {
            background-color: #2c7a7b;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                Tours And Travel
            </div>

            {{-- 
            <div class="navbar-links">
                <a href="{{ route('popular') }}">Popular Places</a>
                <a href="{{ route('gallery') }}">Gallery</a>
                <a href="{{ route('login') }}">Sign up / Login</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
            --}}
        </div>
    </nav>

</body>
</html>
