<?php  include 'include/header.php'; ?>

<body>
    <link rel="stylesheet" href="assets/checkout.css" />
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
<?php  include 'include/footer.php'; ?>

</html>