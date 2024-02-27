<?php

$length = $_GET["length"] ?? "";

if (!empty($length)) {
    $password = generate_password($length);
}
function generate_password($length)
{
    $password = "";

    $letters = "abcdefghijklmnopqrstuvwxyz";
    $numbers = "0123456789";
    $symbols = "!?£$%&°ç#@§+-{}[]()";


    $characters = $letters . strtoupper($letters) . $numbers . $symbols;

    $total_characters = mb_strlen($characters);

    while (mb_strlen($password) > $length) {
        $random_index = rand(0, $total_characters - 1);
        $random_characters = $characters[$random_index];
        $password .= $random_characters;
    }
    return $password;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap-->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous' />
    <!--Style-->
    <link rel="stylesheet" href="css/style.css">


    <title>Strong Password Generator</title>
</head>

<body>
    <div class="container ">
        <form action="index.php">
            <div class="g-3">
                <h1>PHP Strong Password Generator</h1>
                <h3>Genera una password sicura</h3>
                <?php if (isset($password)) : ?>
                    <div>la tua password è: <?php $password ?> </div>
                <?php endif ?>
                <div class="">
                    <label for="inputPassword6" class="col-form-label">Inserisci lunghezza password</label>
                </div>
                <div class="">
                    <input type="number" name="length" id="length">
                </div>
                <button class="btn btn-primary">Genera</button>
            </div>
        </form>
    </div>
</body>

</html>