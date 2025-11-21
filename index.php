<link rel="stylesheet" href="./user/assets/css/style.css">
<?php
    session_start();
    include "./user/view/header.php";
    include("./user/model/user_model.php");
?>


<section class="background" id="home">
      <div class="content" >
        <h1 class="title">Beleaf - Believe in the power of the leaf</h1>
        <p class="subtitle">Pure, eco-friendly products crafted from the heart of nature.</p>
        <div class="btn-group">
            <a href="#cat">
                <button class="btn-primary">
                    Shop Now
                    <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
          </a>
           <a href="#about">
                <button class="btn-secondary" aria-label="Learn more about Beleaf natural cosmetics">
                    Learn More
                    <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <circle cx="12" cy="12" r="10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16v-4m0-4h.01" />
                    </svg>
                </button>
          </a>
        </div>
      </div>
</section>
    
<section class="about" id="about">
    <div class="about-container" >
        <img src="/beleaf/user/assets/images/about.jpg" class="about-image" />
        <h2 class="about-title">About Beleaf</h2>
        <p class="about-subtitle">Natural beauty, naturally you.</p>
        <p class="about-text">
            At Beleaf, we believe in harnessing the power of nature to help you embrace your natural beauty.
            Our products are carefully crafted with pure, eco-friendly ingredients sourced sustainably 
            from around the world. We are committed to transparency, quality, and environmental responsibility.
        </p>
        <p class="about-text">
            Our mission is to provide cosmetics that nourish your skin, protect the earth, and inspire confidence.
            Join us on our journey to make natural beauty accessible, sustainable, and joyful for everyone.
        </p>
      <div class="about-values">
            <div class="value-item">
                <h3 class="value-title">Eco-Friendly</h3>
                <p class="value-text">We use sustainable and natural ingredients that are gentle on you and the planet.</p>
            </div>
            <div class="value-item" >
                <h3 class="value-title">Cruelty Free</h3>
                <p class="value-text">Our products are never tested on animals — kindness is part of our core.</p>
            </div>
            <div class="value-item">
                <h3 class="value-title">Premium Quality</h3>
                <p class="value-text">We maintain strict quality standards to deliver effective and safe cosmetics.</p>
            </div>
            <div class="value-item" >
                <h3 class="value-title">Customer First</h3>
                <p class="value-text">Your satisfaction is our priority. We are here to support you every step of the way.</p>
            </div>
      </div>
    </div>
</section>


<?php 
    $all_categories = $user_model->get_categories();
    if(count($all_categories) > 0){ ?>
        
        <section class="categories" id="cat">
            <h2>Beleaf product categories</h2>
            <div class="cards">
                <div class="card1">
                    <div class="card1-1">
                        <div class="category">
                            <div class="cat1">
                                <img src="./admin/assets//images/<?=$all_categories[0]['image']?>" >
                                <div class="card-content">
                                    <h3><?= $all_categories[0]['name'] ?></h3>
                                </div>
                                <div class="arrow">
                                    <a href="./user/view/products.php?cat_id=<?= $all_categories[0]['id']?>">↗</a>
                                </div>
                            </div>
                        </div>

                        <div class="category">
                            <div class="cat2">
                                <img src="./admin/assets//images/<?=$all_categories[1]['image']?>" >
                                <div class="card-content">
                                    <h3><?= $all_categories[1]['name'] ?></h3>
                                </div>
                                <div class="arrow">
                                    <a href="./user/view/products.php?cat_id=<?= $all_categories[1]['id']?>">↗</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card1-2">
                        <div class="category">
                            <div class="cat3">
                                <img src="./admin/assets//images/<?=$all_categories[2]['image']?>" >
                                <div class="card-content">
                                    <h3><?= $all_categories[2]['name'] ?></h3>
                                </div>
                                <div class="arrow">
                                    <a href="./user/view/products.php?cat_id=<?= $all_categories[2]['id']?>">↗</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card2">
                    <div class="category">
                        <div class="cat4">
                            <img src="./admin/assets//images/<?=$all_categories[3]['image']?>" >
                            <div class="card-content">
                                <h3><?= $all_categories[3]['name'] ?></h3>
                            </div>
                            <div class="arrow">
                                <a href="./user/view/products.php?cat_id=<?= $all_categories[3]['id']?>">↗</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    <?php }else{
        echo "<p>kategorianer chkan</p>";
    }?>

<section class="advertisement" id="ads">
    <video src="./user/assets/videos/1.mp4" muted loop onmouseover="this.play()" onmouseout="this.pause()"></video>
    <video src="./user/assets/videos/2.mp4" muted loop onmouseover="this.play()" onmouseout="this.pause()"></video>
    <video src="./user/assets/videos/3.mp4" muted loop onmouseover="this.play()" onmouseout="this.pause()"></video>
    <video src="./user/assets/videos/4.mp4" muted loop onmouseover="this.play()" onmouseout="this.pause()"></video>
</section>

<?php 
include("./user/view/footer.php");
?>
