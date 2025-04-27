<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tours And Travel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <style>
    body {
      background-color: #1a202c;
      color: white;
      font-family: sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Hero Section */
    .hero {
      position: relative;
      height: 90vh;
      width: 100%;
    }

    .swiper {
      height: 100%;
      width: 100%;
    }

    .swiper-slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
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
      z-index: 10;
      text-align: right;
    }

    .hero-overlay h1 {
      font-size: 3rem;
      font-weight: bold;
      margin: 0;
    }

    .hero-overlay p {
      margin-top: 1rem;
      font-size: 1.25rem;
    }

    .hero-overlay a {
      margin-top: 1.5rem;
      background-color: #2d3748;
      color: white;
      padding: 0.5rem 1.5rem;
      border-radius: 0.375rem;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .hero-overlay a:hover {
      background-color: #4a5568;
    }

    /* Other Sections (unchanged) */
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

    .section-icons {
    background-image: url('{{ asset('images/new5.jpg') }}'); /* Use your desired image here */
    background-size: cover;
    background-position: center;
    padding: 4rem 0;
    color: #fff; /* Ensure text is white for contrast */
    position: relative;
    }

    .section-icons .container {
    position: relative;
    z-index: 1; /* Ensure the text is on top of the background */
    }

    .section-icons:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Dark overlay for better text readability */
    z-index: 0; /* Make sure overlay is behind the text */
    }

    .card-panel {
    background-color: rgba(0, 0, 0, 0.5);
    padding: 3rem 2rem; /* Increased padding */
    border-radius: 0.5rem;
    box-shadow: 0 8px 12px rgba(0,0,0,0.2); /* Bigger shadow for more depth */
    color: white;
    backdrop-filter: blur(5px);
    text-align: center; /* Center the text and icon */
    transition: transform 0.3s ease; /* Smooth hover effect */
    }

    .card-panel:hover {
    transform: scale(1.05); /* Slight zoom on hover */
    }

    .material-icons {
      font-size: 3rem;
    }

    h4 {
      margin-top: 1rem;
      margin-bottom: 0.5rem;
    }

    p {
      margin: 0;
    }

    .section-popular {
      background-color: #2d3748;
      padding: 4rem 0;
    }

    .section-popular h4 {
      color: #fff;
      font-size: 2rem;
      margin-bottom: 2rem;
    }

    .popular-card {
      background-color: white;
      padding: 2rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .popular-card:hover {
      transform: scale(1.03);
    }

    .popular-card h4 {
      margin-top: 1rem;
      margin-bottom: 0.5rem;
      color: #1a202c;
    }

    .popular-card p {
      margin: 0;
      color: #4a5568;
    }

    .custom-contact-btn {
    background-color: #2d3748;
    color: white;
    padding: 0.5rem 1.5rem;
    border-radius: 0.375rem;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    transition: background-color 0.3s ease;
    display: inline-block;
    }

    .custom-contact-btn:hover {
    background-color: #4a5568;
    }

  </style>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

  <!-- Navbar -->
  @include('components.navbar')

  <!-- Hero Section -->
  <section class="hero">
    <div class="swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="{{ asset('images/goa.jpg') }}" alt="Goa" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/manali.jpg') }}" alt="Manali" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/rameshwaram.jpg') }}" alt="Rameshwaram" />
        </div>
      </div>
    </div>
    <div class="hero-overlay">
      <h1>Group & Individual Getaways</h1>
      <p>Experience. Tourism. These are as education in themselves.</p>
      <a href="#contact">CONTACT US</a>
    </div>
  </section>

  <!-- Search Section -->
  <section class="search-section">
    <h2>Search Destinations</h2>
    <form class="search-form">
      <input type="text" name="search" placeholder="Agra, Delhi, Jaipur, Haridwar, Mathura, Varanasi, Vrindavan">
      <button type="submit">SEARCH</button>
    </form>
  </section>

  <!-- Icon Section -->
  <section class="section section-icons center">
    <div class="container">
      <div class="row" style="display: flex; flex-wrap: wrap; gap: 2rem; justify-content: center;">
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large green-text">room</i>
            <h4>Pick Where</h4>
            <p>Feed your wanderlust.</p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large green-text">store</i>
            <h4>Travel Shop</h4>
            <p>Answer it Royally.</p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large green-text">airplanemode_active</i>
            <h4>Fly Cheap</h4>
            <p>Dream. Explore. Discover.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Popular Places -->
  <section id="popular" class="section section-popular scrollspy">
    <div class="container">
      <h4 class="center" style="text-align: center; margin-bottom: 3rem;">
        <span class="green-text">Popular</span> Places
      </h4>

      <div class="row" style="display: flex; flex-wrap: wrap; gap: 2rem; justify-content: center;">
        <div class="col s12 m4">
          <div class="popular-card">
            <img src="{{ asset('images/goa.jpg') }}" alt="goa image" style="width: 100%; height: 240px; object-fit: cover; border-radius: 0.5rem; margin-bottom: 1rem;">
            <h4>GOA</h4>
            <p>Sandy beaches, warm sunsets, beautiful villages and joy.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="popular-card">
            <img src="{{ asset('images/new2.png') }}" alt="goa image" style="width: 100%; height: 240px; object-fit: cover;">
            <h4>Rameshwaram</h4>
            <p>A holy place on a serene island with divine vibes.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="popular-card">
            <img src="{{ asset('images/new3.jpg') }}" alt="goa image" style="width: 100%; height: 240px; object-fit: cover;">
            <h4>Manali</h4>
            <p>Manali is nestled in the Beas Valley of Himachal Pradesh.</p>
          </div>
        </div>
      </div>

      <div style="text-align: center; margin-top: 3rem;">
        <a href="HTML/login.html" class="custom-contact-btn">
            Contact for Booking
        </a>
      </div>
 
    </div>
  </section>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    const swiper = new Swiper('.swiper', {
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      speed: 800,
      effect: 'slide',
    });
  </script>

</body>
</html>
