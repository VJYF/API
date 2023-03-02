<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div style="display:flex;">
        <form action="" method="post">
        <h2 class="titre-ls">SE CONNECTER</h2>
        <div class="container">
                <label for="uname"><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
            
                <label for="psw"><b>Mot de passe</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            
                <button type="submit">Se connecter</button>
                <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <span class="psw"><a href="#" style="padding-right:5px;">Mot de passe</a> oublié ?</span>
            </div>
        </form>
        <form action="" method="post">
            <h2 class="titre-ls">S'INSCRIRE</h2>
            <div class="container">
                <label for="uname"><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
        
                <label for="psw"><b>Mot de passe</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
        
                <button type="submit">S'inscrire</button>
                <label>
                <input type="checkbox" checked="checked" name="remember"> S'inscrire à la Newsletters
                </label>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <span class="psw"><a href="#" style="padding-right:5px;">Mot de passe</a> oublié ?</span>
            </div>
        </form>
    </div>
</body>
</html>