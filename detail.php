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



<body>


<div class="container-fluid">


    <div class="row d-flex justify-content-center align-items-center">
        <form method="post" class="col-sm-8 col-md-6 col-lg-4 mt-5">
            <label class=" fs-4" for="song_id">Sang ID: </label>
            <br>
            <div class="input-group mt-2 mb-3">
                <input type="text" class="form-control" placeholder="Sang ID (80-99)" aria-label="Recipient's username" aria-describedby="button-addon2" name="song_id" id="song_id">
                <button class="btn btn-outline-secondary" type="submit" value="Vis Sang">Tryk</button>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['song_id'])) {
    $songId = $_POST['song_id'];
    $query = "SELECT * FROM musik WHERE musID = $songId";
    $musik = $db->sql($query);

    if (!empty($musik)) {
    $musikItem = $musik[0];
    ?>

        <div class="row d-flex justify-content-center align-items-center">
                <div class="col-sm-10 col-md-8 col-lg-6 mt-5 mb-5">
                    <div class="card w-100">
                        <div class="card-header d-flex align-items-center" style="background-image: url('uploads/<?php echo $musikItem->musOmslag; ?>'); background-size: cover; background-position: center; height: 200px;">
                                <h3 class="text-white align-self-center"><?php echo $musikItem->musSangTitel; ?></h3>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div>
                                        <h5>Kunstner:</h5>
                                    </div>
                                    <div>
                                        <?php
                                        echo $musikItem->musKunstnerNavn;
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div>
                                        <h5>Album:</h5>
                                    </div>
                                    <div>
                                        <?php
                                        echo $musikItem->musAlbumTitel;
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div>
                                        <h5>Udgivelsesdato:</h5>
                                    </div>
                                    <div>
                                        <?php
                                        echo $musikItem->musUdgivelsesdato;
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div>
                                        <h5>Producent:</h5>
                                    </div>
                                    <div>
                                        <?php
                                        echo $musikItem->musProducent;
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div>
                                        <h5>Genre:</h5>
                                    </div>
                                    <div>
                                        <?php
                                        echo $musikItem->musGenre;
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div>
                                        <h5>Label:</h5>
                                    </div>
                                    <div>
                                        <?php
                                        echo $musikItem->musOmslagKunstner;
                                        ?>
                                    </div>
                                </div>
                            </li>
                        </ul>


                        <div class="card-body text-muted">
                            <button class="btn btn-outline-dark btn-lg" id="showLyricsBtn">Lyrikken</button>
                            <div id="lyrics" style="display: none;">
                                <?php echo $musikItem->musTekster; ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <h4>
                                <?php
                                echo $musikItem->musPris;
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

                <?php
            } else {
                echo "Song not found.";
            }
        }
        ?>

    </div>
</div>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>