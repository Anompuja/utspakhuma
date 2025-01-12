<?php  include 'include/header.php'; ?>
<link rel="stylesheet" href="/utspakhuma/assets/special-offers.css">
<header class="special-offers-header">
    <h1>Special Offers</h1>
    <p>Enjoy limited-time deals on your favorite games. Don't miss out!</p>
</header>
<body>
<section class="game-grid">
    <div class="game-card">
        <img src="img/nath.jpeg" alt="Game 1" />
        <h2>Uncharted 4</h2>
        <p>Special offer price: $19.99</p>
        <p>Hurry up! This offer expires in:</p>
        <div class="countdown" id="countdown1">Loading...</div>
        <button class="add-to-cart" data-title="Uncharted 4" data-price="19.99">Add to Cart</button>
    </div>
    <div class="game-card">
        <img src="img/Monster Phobia.jpeg" alt="Game 1" />
        <h2>Monster Phobia</h2>
        <p>Special offer price: $19.99</p>
        <p>Hurry up! This offer expires in:</p>
        <div class="countdown" id="countdown1">Loading...</div>
        <button class="add-to-cart" data-title="Monster Phobia" data-price="19.99">Add to Cart</button>
    </div>
    <div class="game-card">
        <img src="img/c6ecec85-46e4-4068-b61d-d404dea330d4.jpeg" alt="Game 1" />
        <h2>Call of Duty</h2>
        <p>Special offer price: $19.99</p>
        <p>Hurry up! This offer expires in:</p>
        <div class="countdown" id="countdown1">Loading...</div>
        <button class="add-to-cart" data-title="Call of Duty" data-price="19.99">Add to Cart</button>
    </div>
    <div class="game-card">
        <img src="img/CINEMAFLIX Valorant Game Poster Wall Art Measures 24 x 36 inches (unframed).jpeg" alt="Game 1" />
        <h2>Valorant</h2>
        <p>Special offer price: $19.99</p>
        <p>Hurry up! This offer expires in:</p>
        <div class="countdown" id="countdown1">Loading...</div>
        <button class="add-to-cart" data-title="Valorant" data-price="19.99">Add to Cart</button>
    </div>
    <div class="game-card">
        <img src="img/Beyond The Wall Last of Us Key Art Horror Action Survival Video Game Poster Print 24 by 36.jpeg"
            alt="Game 1" />
        <h2>The Last of Us</h2>
        <p>Special offer price: $19.99</p>
        <p>Hurry up! This offer expires in:</p>
        <div class="countdown" id="countdown1">Loading...</div>
        <button class="add-to-cart" data-title="The Last of Us" data-price="19.99">Add to Cart</button>
    </div>
    <div class="game-card">
        <img src="img/BELOW by Capy!, via Flickr.jpeg" alt="Game 1" />
        <h2>Below</h2>
        <p>Special offer price: $19.99</p>
        <p>Hurry up! This offer expires in:</p>
        <div class="countdown" id="countdown1">Loading...</div>
        <button class="add-to-cart" data-title="Below" data-price="19.99">Add to Cart</button>
    </div>
    <div class="game-card">
        <img src="img/56069492-0e39-4810-a2a9-93163bc8b614.jpeg" alt="Game 1" />
        <h2>Horizon Zero Dawn</h2>
        <p>Special offer price: $19.99</p>
        <p>Hurry up! This offer expires in:</p>
        <div class="countdown" id="countdown1">Loading...</div>
        <button class="add-to-cart" data-title="Horizon Zero Dawn" data-price="19.99">Add to Cart</button>
    </div>
</section>

<section id="cart" class="cart">
    <h2>Cart</h2>
    <ul id="cart-items"></ul>
</section>
<?php include 'include/footer.php'; ?> 
<script src="assets/special-offers.js"></script>
</body>
</html>