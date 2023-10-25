<?php
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
	<meta charset="utf-8">
	
	<title>Musik</title>
	
	<meta name="robots" content="All">
	<meta name="author" content="Udgiver">
	<meta name="copyright" content="Information om copyright">
	
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/styles.css" rel="stylesheet" type="text/css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<header>
    <nav class="navbar navbar-light pb-4 align-items-center">
        <div class="container-fluid align-items-center">
            <i class="fa-brands fa-itunes-note fa-2x white-icon align-items-center pt-3 px-3"></i>
        </div>
    </nav>
</header>


<body style="background-color: #fafafa">
    <div class="products">
        <div class="filter">
            <div class="row">
                <div class="col-4 offset-4 mb-5">
                    <input type="search" class="form-control nameSearch custom-search-bar" placeholder="Søg og du skal finde">

                </div>

            </div>

        </div>

        <div class="container mb-5">
            <div class="items">


            </div>
        </div>


    </div>



<script type="module">
    import Products from "./js/products.js";
    const products = new Products();
    products.init();
</script>


<script src="https://kit.fontawesome.com/a188e3149f.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
