<?php  include 'include/header.php'; ?>

<body>
    <link rel="stylesheet" href="utspakhuma/assets/checkout.css" />
    <section class="checkout-section">
        <h2>Your Cart</h2>
        <ul id="cart-items"></ul>
        <button class="clear-cart-button">Clear Cart</button>
        <button class="checkout-button">Checkout</button>

        <div id="checkout-form-popup" class="form-popup">
            <form id="checkout-form" class="form-container">
                <h2>Checkout Form</h2>
                <label for="name">Name:</label>
                <input type="text" id="name" required />
                <label for="email">Email:</label>
                <input type="email" id="email" required />
                <label for="address">Address:</label>
                <input type="text" id="address" required />
                <button type="submit" class="form-submit">Submit</button>
                <button type="button" class="form-cancel" onclick="closeForm()">Cancel</button>
            </form>
        </div>
    </section>

    <script src="assets/checkout.js"></script>
</body>
<footer>
    <div class="footer-content">
        <div class="footer-section about">
            <h2>About Undiknas Hero</h2>
            <p>Experience your favorite games on the cloud. Play anytime, anywhere, with no downloads or installation
                required!</p>
            <div class="socials">
                <a
                    href="https://media.istockphoto.com/id/607884310/id/foto/nilai-sempurna-100-persen.jpg?s=612x612&w=0&k=20&c=pm4YG0KPkafG1-5c0hsJuVoUvkWNRvf5a_oGHnpH9RA="><img
                        src="twitter-icon.png" alt="Twitter" width="50" /></a>
                <a href="https://www.instagram.com/p/DCLU7KEyEAf/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><img
                        src="img/instagram-icon.png" alt="Instagram" width="50" /></a>
                <a href="https://youtu.be/ZHgyQGoeaB0?si=bZATfUxYvfVBj2xM"><img src="youtube-icon.png" alt="YouTube"
                        width="50pc" /></a>
            </div>
        </div>

        <div class="footer-section links">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="specialoffer.html">Special Offers</a></li>
                <li><a href="trending.html">Trending</a></li>
                <li><a href="newrelease.html">New Releases</a></li>
            </ul>
        </div>

        <div class="footer-section contact">
            <h2>Contact Us</h2>
            <p>Email: supportundiknashero.com</p>
            <p>Phone: +62 895320610788</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; Undiknas Hero. All Rights Reserved.</p>
    </div>
</footer>

</html>