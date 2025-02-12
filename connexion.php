<?php 

    include($_SERVER["DOCUMENT_ROOT"]. '../gite_project2/_blocks/_hosts.php');

    $selectRoles = $db->prepare('SELECT * FROM gef_roles ORDER BY id_role ASC');
    $selectRoles->execute();

    $selectUser = $db->prepare('SELECT * FROM gef_users ORDER BY id_user ASC');
    $selectUser->execute();


    if(isset($_POST['add_user'])){
        $errors = array();

        if(empty($_POST['gef_username']) || !preg_match('/^[a-aZ-Z - ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]+$/', $_POST['gef_username'])){
            $errors['gef_username'] = "L'username n'est pas valide.";
        }else{
            $req = $db->prepare('SELECT id_user FROM gef_users WHERE gef_username = ?');
            $req->execute([$_POST['gef_username']]);
            $username = $req->fetch();

            if($username){
                $username['gef_username'] = "Cet identifiant est déjà utilisé.";
            }
        }

        if(empty($_POST['gef_nom']) || !preg_match('/^[a-aZ-Z - ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]+$/', $_POST['gef_nom'])){
            $errors['gef_nom'] = "Le champs 'Nom' n'est pas valide.";
        }

        if(empty($_POST['gef_prenom']) || !preg_match('/^[a-aZ-Z - ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]+$/', $_POST['gef_prenom'])){
            $errors['gef_prenom'] = "Le champs 'Prénom' n'est pas valide.";
        }

        if(empty($_POST['gef_email']) || !filter_var($_POST['gef_email'], FILTER_VALIDATE_EMAIL)){
            $errors['gef_email'] = "Votre email n'est pas valide.";
        }else{
            $req = $db->prepare('SELECT id_user FROM gef_users WHERE gef_email = ?');
            $req->execute([$_POST['gef_email']]);
            $email = $req->fetch();

            if($email){
                $errors['gef_email'] = "Cet email est déjà utilisé pour un autre compte";
            }
        }

        if(empty($_POST['gef_pwd']) ||  $_POST['gef_pwd'] != $_POST['conf_pwd']){
            $errors['password'] = "Vos mots de passe ne sont pas identiques.";
        }

        if(empty($errors)){
            $id_user = $_POST['id_user'];
            $username = $_POST['gef_username'];
            $nom = $_POST['gef_nom'];
            $prenom = $_POST['gef_prenom'];
            $email = $_POST['gef_email'];
            $pwd = $_POST['gef_pwd'];
            $insert_user = $db->prepare('INSERT INTO gef_users SET 

                id_user = ?,
                gef_username = ?,
                gef_nom = ?,
                gef_prenom = ?,
                gef_email = ?,
                gef_pwd = ?
            ');

            $password = password_hash($pwd, PASSWORD_BCRYPT);
            $insert_user->execute([$id_user, $username, $nom, $prenom, $email, $password]);

            echo "<script language='javascript'>document.location.replace(../gite_project2/index.php);</script>";
        }
    }

    if(isset($_POST['login'])){
        if(!empty($_POST['gef_email']) && !empty($_POST['gef_pwd'])){
            $username = $_POST['gef_username'];
            $pwd = $_POST['gef_pwd'];

            $req = $db->prepare('SELECT * FROM gef_users

                NATURAL JOIN gef_roles
                WHERE gef_username = ?
            ');

            $req->execute([$username]);
            $user = $req->fetch();

            if(password_verify($pwd, $user['gef_pwd'])){
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
                    <input type="text" placeholder="Username" name="gef_username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Prénom" name="gef_prenom" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Nom" name="gef_nom" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" placeholder="Email" name="gef_email" required>
                    <i class='bx bxs-envelope' ></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="gef_pwd" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Répétez votre Mot de Passe" name="conf_pwd" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <button type="submit" name="add_user" class="btn">S'enregistrer</button>
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


    <script src="../gite_project2/_scripts/vue.js"></script>
</body>
</html>