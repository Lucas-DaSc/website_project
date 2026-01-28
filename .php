<?php
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    $to = "destinataire@example.com"; // <- remplace par ton e-mail
    $subject = "Nouveau message de contact";
    $body = "Nom: $nom\nPrénom: $prenom\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $success = "Message envoyé avec succès !";
    } else {
        $error = "Erreur lors de l'envoi du message.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Studio Pilates Reformer</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <header>
        <div id="header-placeholder"></div>
    </header>

    <section class="hero-section hero-contact">
        <div class="overlay"></div>
        <div class="hero-text">
            <h1 style="font-size: 100px; color: white;">CONTACT</h1>
        </div>
    </section>

    <form class="contact-form" method="POST" action="">
        <input type="text" name="nom" placeholder="Votre nom" required>
        <input type="text" name="prenom" placeholder="Votre prénom" required>
        <input type="email" name="email" placeholder="Votre mail" required>

        <textarea name="message" placeholder="Votre message" rows="5" required></textarea>

        <label class="privacy">
            <input type="checkbox" required>
            En cochant cette case, j’accepte la politique de confidentialité de ce site
        </label>

        <button type="submit">ENVOYER</button>
    </form>

    <?php if ($success): ?>
        <p class="form-message success"><?php echo $success; ?></p>
    <?php elseif ($error): ?>
        <p class="form-message error"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- FOOTER -->
    <div id="footer"></div>

    <!-- Script-->
    <script src="js/script.js"></script>

</body>

</html>
