<?php include './_block/_hosts.php' ?>

<?php include './_block_entete.php' ?>

<body>

<?php include './_block_header.php' ?>

    <section class="Contact flex spaceCenter">
        <div class="headAll flex flexCol">
            <div class="HeadContact itemCenter">
                <h1>Nous Contacter</h1>
                <p>Vous pouvez nous contacter pour toutes questions ou demande d'information.</p>
            </div>
            <div class="ReseauContact flex flexrow">
                <div class="mail">
                    <div class="nousContacter">
                        <i class='bx bx-envelope'></i>
                        <p><strong>Email</strong></p>
                    </div>
                    <div class="descmail">
                        <p>giteenfolie@gmail.com</p>
                    </div>
                </div>
                <div class="mail">
                    <div class="nousContacter">
                        <i class='bx bx-phone'></i>
                        <p><strong>Téléphone</strong></p>
                    </div>
                    <div class="descmail">
                        <p>+33 (0)1 23 45 67 89</p>
                    </div>
                </div>
                <div class="mail">
                    <div class="nousContacter">
                        <i class='bx bx-location-plus'></i>
                        <p><strong>Bureau</strong></p>
                    </div>
                    <div class="descmail">
                        <p>123 Rue de la paix, Paris 75000, France</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="formulaire generalContainer">
        <div class="allFormulaire">
            <h2>Contactez-nous</h2>
            <p>Nous serions ravis de recevoir votre message.</p>
            <form method="POST">
                <div class="identifiant">
                    <div class="test">
                        <label for="firstname">Prénom: </label>
                        <input type="text" name="firstname" id="firstname" required />
                    </div>
                    <div class="test">
                        <label for="name">Nom:</label>
                        <input type="text" name="name" id="name" required />
                    </div>
                </div>
                <div class="ContactForm">
                    <div class="test">
                        <label for="mail">Email: </label>
                        <input type="text" name="mail" id="mail" required />
                    </div>
                    <div class="test">
                        <label for="tel">Téléphone:</label>
                        <input type="text" name="tel" id="tel" required />
                    </div>
                </div>
                <div class="selectForm">

                    <label for="Info">Choisissez un sujet:</label>

                    <select name="Info" id="Info">
                        <option value="">Sélectionnez un sujet</option>
                        <option value="prix">Prix</option>
                        <option value="Remboursement">Remboursement</option>
                        <option value="Ajout">Ajouter un gîte</option>
                    </select>
                    <label for="Description">Message</label>

                    <textarea id="Description" name="Description" rows="5" cols="33"
                        placeholder="Tapez votre message..."></textarea>
                </div>
                <div class="btnForm">
                    <button>Envoyer</button>
                </div>
            </form>
        </div>
    </section>

    <?php include './_block/_footer.php' ?>

    <script src="https://kit.fontawesome.com/9efd7effdc.js" crossorigin="anonymous"></script>
</body>

</html>