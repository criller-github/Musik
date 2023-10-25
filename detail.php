<?php
require "settings/init.php";
?>


<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title> Sang </title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<header>
</header>


<body style="background-color: #fafafa">


<div class="container-fluid">
    <?php
    // Retrieve the product ID
    $product_id = $_GET['musID'];

    // Check the ID
    if (!empty($product_id) && is_numeric($product_id)) {
    $musik = $db->sql("SELECT * FROM musik WHERE musID = $product_id");

    if (!empty($musik)) {
    $musik = $musik[0]; // only expect one result
    ?>

        <div class="row d-flex justify-content-center align-items-center">

                <div class="col-sm-10 col-md-8 col-lg-6 mt-5 mb-5">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Hjem</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $musik->musSangTitel; ?></li>
                        </ol>
                    </nav>
                    <div class="card border-light w-100">
                        <div class="card-header d-flex align-items-center" style="background-image: url('uploads/<?php echo $musik->musOmslag; ?>'); background-size: cover; background-position: center; height: 200px;">
                                <h1 class="text-white align-self-center text-light bg-dark-transparent">&nbsp;<?php echo $musik->musSangTitel; ?>&nbsp;</h1>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row text-muted">
                                    <div>
                                        Kunstner:
                                    </div>
                                    <div>
                                        <h5>
                                        <?php
                                        echo $musik->musKunstnerNavn;
                                        ?>
                                        </h5>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row text-muted">
                                    <div>
                                        Album:
                                    </div>
                                    <div>
                                        <h5>
                                        <?php
                                        echo $musik->musAlbumTitel;
                                        ?>
                                        </h5>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row text-muted">
                                    <div>
                                        Udgivelsesdato:
                                    </div>
                                    <div>
                                        <h5>
                                        <?php
                                        echo $musik->musUdgivelsesdato;
                                        ?>
                                        </h5>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row text-muted">
                                    <div>
                                        Producent:
                                    </div>
                                    <div>
                                        <h5>
                                        <?php
                                        echo $musik->musProducent;
                                        ?>
                                        </h5>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row text-muted">
                                    <div>
                                        Genre:
                                    </div>
                                    <div>
                                        <h5>
                                        <?php
                                        echo $musik->musGenre;
                                        ?>
                                        </h5>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row text-muted">
                                    <div>
                                        Label:
                                    </div>
                                    <div>
                                        <h5>
                                        <?php
                                        echo $musik->musOmslagKunstner;
                                        ?>
                                        </h5>
                                    </div>
                                </div>
                            </li>
                        </ul>


                        <div class="card-body text-muted">
                            <button class="btn btn-outline-dark btn-lg" id="showLyricsBtn">Lyrikken</button>
                            <div id="lyrics" style="display: none;">
                                <?php echo $musik->musTekster; ?>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: #2e323e">
                            <h4 class="text-white">
                                <?php
                                echo $musik->musPris;
                                ?> DKK
                            </h4>

                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('showLyricsBtn').addEventListener('click', function() {
                        var lyricsDiv = document.getElementById('lyrics');
                        if (lyricsDiv.style.display === 'none') {
                            lyricsDiv.style.display = 'block';
                        } else {
                            lyricsDiv.style.display = 'none';
                        }
                    });
                </script>

        </div>
            <?php
            } else {
                echo "Product not found";
            }
            } else {
                echo "Invalid product ID";
            }
            ?>
</div>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>