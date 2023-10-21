<?php
require "settings/init.php";

$message = '';

if (!empty($_POST["data"])) {
    $data = $_POST["data"];
    $file = $_FILES;

    if(!empty($file["musOmslag"]["tmp_name"])){
        move_uploaded_file($file["musOmslag"]["tmp_name"], "uploads/" . basename($file["musOmslag"]["name"]));
    }

    $sql = "INSERT INTO musik (musSangTitel, musKunstnerNavn, musAlbumTitel, musUdgivelsesdato, musProducent, musGenre, musTekster, musOmslag, musOmslagKunstner, musPris) VALUES(:musSangTitel, :musKunstnerNavn, :musAlbumTitel, :musUdgivelsesdato, :musProducent, :musGenre, :musTekster, :musOmslag, :musOmslagKunstner, :musPris)";
    $bind = [":musSangTitel" => $data["musSangTitel"], ":musKunstnerNavn" => $data["musKunstnerNavn"], ":musAlbumTitel" => $data["musAlbumTitel"], ":musUdgivelsesdato" => $data["musUdgivelsesdato"], ":musProducent" => $data["musProducent"], ":musGenre" => $data["musGenre"], ":musTekster" => $data["musTekster"], ":musOmslag" => (!empty($file["musOmslag"]["tmp_name"])) ? $file["musOmslag"]["name"] : NULL, ":musOmslagKunstner" => $data["musOmslagKunstner"], ":musPris" => $data["musPris"]];

    $db->sql($sql, $bind, false);

    $message = "Produktet er nu indsat! <br> <a href='insert.php'>Indsæt et produkt mere</a>";
}
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Indsæt til database</title>
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tiny.cloud/1/hi4aigzw5lskhguvpmxthy7rk6t9eqs71rjrm21o9asl4e4s/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center">
        <?php
        if (!empty($message)) {
            echo '<div class="col">';
            echo '</div>';
            echo '<div class="col d-flex justify-content-center align-items-center">';
                echo '<div class="card text-center" style="width: 20rem; top: +15vh;">';
                    echo '<img class="card-img-top" src="images/3295433.jpg" alt="">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">Produktet er nu indsat!</h5>';
                        echo '<a href="insert.php" class="btn btn-secondary">Indsæt et produkt mere</a>';
                        echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<div class="col">';
            echo '</div>';
        } else {
            ?>
            <div class="col-10 d-flex justify-content-center align-items-center">
                <form method="post" action="insert.php" enctype="multipart/form-data">
                    <!-- Sang titel -->
                    <div class="col mt-5 mt-3 fs-4">
                        <div class="form-group">
                            <label for="musSangTitel">Sang Titel</label>
                            <input class="form-control" type="text" name="data[musSangTitel]" id="musSangTitel" placeholder="Sang Titel" value="">
                        </div>
                    </div>


                    <!-- Kunstner Titel -->
                    <div class="col mt-5 fs-4">
                        <div class="form-group">
                            <label for="musKunstnerNavn">Kunstner Navn</label>
                            <input class="form-control" type="text" name="data[musKunstnerNavn]" id="musKunstnerNavn" placeholder="Kunstner Navn" value="">
                        </div>
                    </div>


                    <!-- Album Titel -->
                    <div class="col mt-5 fs-4">
                        <div class="form-group">
                            <label for="musAlbumTitel">Album Titl</label>
                            <input class="form-control" type="text" name="data[musAlbumTitel]" id="musAlbumTitel" placeholder="Album Titel" value="">
                        </div>
                    </div>

                    <!-- Release Date -->
                    <div class="col mt-5 fs-4">
                        <div class="form-group">
                            <label for="musUdgivelsesdato">Udgivelsesdato</label>
                            <input class="form-control" type="datetime-local" name="data[musUdgivelsesdato]" id="musUdgivelsesdato" placeholder="DD/MM/YYYY" value="">
                        </div>
                    </div>

                    <!-- Producent -->
                    <div class="col mt-5 fs-4">
                        <div class="form-group">
                            <label for="musProducent">Producent</label>
                            <input class="form-control" type="text" name="data[musProducent]" id="musProducent" placeholder="Producent navn" value="">
                        </div>
                    </div>

                    <!-- Genre -->
                    <div class="col mt-5 fs-4">
                        <div class="form-group">
                            <label for="musGenre">Genre</label>
                            <input class="form-control" type="text" name="data[musGenre]" id="musGenre" placeholder="Genre" value="">
                        </div>
                    </div>

                    <!-- lyrikken -->
                    <div class="col mt-5 fs-4">
                        <div class="form-group">
                            <label for="musTekster">Lyrikken</label>
                            <textarea class="form-control" name="data[musTekster]" id="musTekster"></textarea>
                        </div>
                    </div>

                    <!-- Omslag -->
                    <div class="col mt-5 fs-4">
                        <label class="form-label" for="musOmslag">Omslag Billede</label>
                        <input type="file" class="form-control" id="musOmslag" name="musOmslag">
                    </div>


                    <!-- Omslag Kunstner -->
                    <div class="col mt-5 fs-4">
                        <div class="form-group">
                            <label for="musOmslagKunstner">Omslag kunstner</label>
                            <input class="form-control" type="text" name="data[musOmslagKunstner]" id="musOmslagKunstner" placeholder="Omslag kunstneren" value="">
                        </div>
                    </div>

                    <!-- Pris -->
                    <div class="col mt-5 fs-4">
                        <div class="form-group">
                            <label for="musPris">Sang Pris</label>
                            <input class="form-control" type="number" step="0.1" name="data[musPris]" id="musPris" placeholder="Sang Pris" value="">
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="col mt-5 fs-4">
                        <div class="form-group">
                            <button class="form-control btn btn-secondary" type="submit" id="btnSubmit">Opret produkt</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>

</body>
</html>