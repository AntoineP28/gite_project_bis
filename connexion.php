<?php 

    include($_SERVER["DOCUMENT_ROOT"]. '../gite_project2/_blocks/_hosts.php');


 ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../gite_project2/_styles/connexion.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Connexion</title>
</head>
<body>
    <div class="try">
        <a href="index.php"><i class='bx bx-left-arrow-alt'></i></a>
    </div>
    <div class="container">
        <div class="form-box login">
            <form action="">
                <h1>Se Connecter</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Mot de passe oublié ?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <!-- <p>Vous pouvez vous connecter avec:</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google' ></i></a>
                    <a href="#"><i class='bx bxl-facebook' ></i></a>
                    <a href="#"><i class='bx bxl-github' ></i></a>
                    <a href="#"><i class='bx bxl-linkedin' ></i></a>
                </div> -->
            </form>
        </div>

        <div class="form-box register">
            <form action="">
                <h1>S'enregistrer</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" placeholder="Email" required>
                    <i class='bx bxs-envelope' ></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <button type="submit" class="btn">S'enregistrer</button>
                <!-- <p>Ou s'enregistrer avec:</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google' ></i></a>
                    <a href="#"><i class='bx bxl-facebook' ></i></a>
                    <a href="#"><i class='bx bxl-github' ></i></a>
                    <a href="#"><i class='bx bxl-linkedin' ></i></a>
                </div> -->
            </form>
        </div>
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <a href="contact.html"><img src="../gite_project2/_imgs/logo_blanc.png" alt=""></a>
                <h1>Bienvenue !</h1>
                <p>Vous n'avez pas de compte?</p>
                <button class="btn register-btn">S'enregistrer</button>
            </div>
            <div class="toggle-panel toggle-right">
                <a href="contact.html"><img src="../gite_project2/_imgs/logo_blanc.png" alt=""></a>
                <h1>Bienvenue !</h1>
                <p>Vous avez déjà un compte?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>


    <script src="../_scripts/vue.js"></script>
</body>
</html>