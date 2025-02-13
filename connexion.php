<?php 

    include($_SERVER["DOCUMENT_ROOT"]. '../gite_project2/_blocks/_hosts.php');

    $selectRoles = $db->prepare('SELECT * FROM gef_roles ORDER BY id_role ASC');
    $selectRoles->execute();

    $selectUser = $db->prepare('SELECT * FROM gef_users ORDER BY id_user ASC');
    $selectUser->execute();


    if(isset($_POST['add_user'])){
        $errors = array();

        if(empty($_POST['gite_username']) || !preg_match('/^[a-zA-ZÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ -]+$/', $_POST['gite_username'])){
            $errors['gite_username'] = "L'username n'est pas valide.";
        }else{
            $req = $db->prepare('SELECT id_user FROM gef_users WHERE gite_username = ?');
            $req->execute([$_POST['gite_username']]);
            $username = $req->fetch();

            if($username){
                $errors['gite_username'] = "Cet identifiant est déjà utilisé.";
            }
        }

        if(empty($_POST['gite_nom']) || !preg_match('/^[a-zA-ZÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ -]+$/', $_POST['gite_nom'])){
            $errors['gite_nom'] = "Le champs 'Nom' n'est pas valide.";
        }

        if(empty($_POST['gite_prenom']) || !preg_match('/^[a-zA-ZÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ -]+$/', $_POST['gite_prenom'])){
            $errors['gite_prenom'] = "Le champs 'Prénom' n'est pas valide.";
        }

        if(empty($_POST['gite_email']) || !filter_var($_POST['gite_email'], FILTER_VALIDATE_EMAIL)){
            $errors['gite_email'] = "Votre email n'est pas valide.";
        }else{
            $req = $db->prepare('SELECT id_user FROM gef_users WHERE gite_email = ?');
            $req->execute([$_POST['gite_email']]);
            $email = $req->fetch();

            if($email){
                $errors['gite_email'] = "Cet email est déjà utilisé pour un autre compte";
            }
        }

        if(empty($_POST['gite_pwd']) ||  $_POST['gite_pwd'] != $_POST['conf_pwd']){
            $errors['password'] = "Vos mots de passe ne sont pas identiques.";
        }

        if(empty($errors)){
            $username = $_POST['gite_username'];
            $nom = $_POST['gite_nom'];
            $prenom = $_POST['gite_prenom'];
            $email = $_POST['gite_email'];
            $pwd = $_POST['gite_pwd'];
            $insert_user = $db->prepare('INSERT INTO gef_users SET 

                gite_username = ?,
                gite_nom = ?,
                gite_prenom = ?,
                gite_email = ?,
                gite_pwd = ?
            ');

            $password = password_hash($pwd, PASSWORD_BCRYPT);
            $insert_user->execute([$username, $nom, $prenom, $email, $password]);

            echo "<script language='javascript'>document.location.replace(../gite_project2/index.php);</script>";
        }
    }

    if(isset($_POST['login'])){
        if(!empty($_POST['gite_email']) && !empty($_POST['gite_pwd'])){
            $username = $_POST['gite_username'];
            $pwd = $_POST['gite_pwd'];

            $req = $db->prepare('SELECT * FROM gef_users

                NATURAL JOIN gef_roles
                WHERE gite_username = ?
            ');

            $req->execute([$username]);
            $user = $req->fetch();

            if(password_verify($pwd, $user['gite_pwd'])){
                $_SESSION['auth'] = $user;

                echo "<script language='javascript'>document.location.replace(../gite_project2/index.php);</script>";
            }
        }
    }

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
            <form method='POST'>
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
            <form method="POST" action="">
                <h1>S'enregistrer</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" name="gite_username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Prénom" name="gite_prenom" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Nom" name="gite_nom" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" placeholder="Email" name="gite_email" required>
                    <i class='bx bxs-envelope' ></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="gite_pwd" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Répétez votre Mot de Passe" name="conf_pwd" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <button type="submit" name="add_user" class="btn">S'enregistrer</button>
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


    <script src="../gite_project2/_scripts/vue.js"></script>
</body>
</html>