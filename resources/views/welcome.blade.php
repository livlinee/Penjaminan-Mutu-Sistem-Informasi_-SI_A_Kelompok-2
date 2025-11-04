<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Cafe</title>
    <link rel="stylesheet" href="icon/fontawesome/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="header">
        <div class="header-top">
            <div class="left-group">
                <div class="header-title">
                    <h1>Cyber Cafe</h1>
                    <p>Dashboard</p>
                </div>
            </div>
            <div class="user-icon"><i class="fa-regular fa-circle-user"></i></div>
        </div>

        <div class="search-container">
            <div class="search-wrapper">
                <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="search-input" placeholder="Makanan dan Minuman">
            </div>
        </div>

        <div class="event-card">
            <img src="/images/banner.PNG" alt="Cyber Class Event">
            <div class="event-text">
                <p>Rabu, 3 Februari 2026</p>
                <h2>Cyber Class Event</h2>
                <span>Mentor oleh <b>Wenny Amelia</b></span>
            </div>
        </div>
    </div>



    <!-- Category Buttons -->
    <div class="categories">
        <button class="active">Makanan</button>
        <button>Minuman</button>
    </div>

    <!-- Product Sections -->
    <section class="section">
        <div class="section-header">
            <h3>Exclusive Offer</h3>
            <a href="#" class="see-all">See all</a>
        </div>
        <div class="products">
            <div class="product-card">
                <img src="{{ asset('images/strawberry.PNG') }}" alt="Strawberry Vanilla">
                <h4>Strawberry Vanilla</h4>
                <p>Cyber Caffe Food</p>
                <div class="price-row">
                    <span class="price">Rp. 120.000</span>
                    <button class="add-btn">+</button>
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/matcha.PNG') }}" alt="Matcha Vanilla">
                <h4>Matcha Vanilla</h4>
                <p>Cyber Caffe Food</p>
                <div class="price-row">
                    <span class="price">Rp. 50.000</span>
                    <button class="add-btn">+</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-header">
            <h3>Best Selling</h3>
            <a href="#" class="see-all">See all</a>
        </div>
        <div class="products">
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/coffee.PNG') }}" alt="Spaghetti Chicken">
                    <div class="rating">
                        <span>⭐ 4.8</span>
                    </div>
                </div>
                <h4>Coffee Ice</h4>
                <p>Cyber Caffe Food</p>
                <div class="price-row">
                    <span class="price">Rp. 50.000</span>
                    <button class="add-btn">+</button>
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/vanilla.PNG') }}" alt="Vanilla Coffee">
                <h4>Vanilla Coffee</h4>
                <p>Cyber Caffe Food</p>
                <div class="price-row">
                    <span class="price">Rp. 50.000</span>
                    <button class="add-btn">+</button>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
