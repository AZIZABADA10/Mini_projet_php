<?php

// Récupération des données du formulaire
$nom       = $_POST['nom'] ?? '';
$prenom    = $_POST['prenom'] ?? '';
$email     = $_POST['email'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$dob       = $_POST['dob'] ?? '';
$niveau    = $_POST['niveau'] ?? '';
$filiere   = $_POST['filiere'] ?? '';
$adresse   = $_POST['adresse'] ?? '';


$photoName = null;
if (!empty($_FILES['photo']['name'])) {
    $uploadDir = 'uploads/';

    // Créer le dossier s'il n'existe pas
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $photoTmp  = $_FILES['photo']['tmp_name'];
    $photoName = time() . '_' . basename($_FILES['photo']['name']);
    $uploadPath = $uploadDir . $photoName;

    if (!move_uploaded_file($photoTmp, $uploadPath)) {
        $photoName = null;
    }
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Étudiant enregistré</title>
<style>
    body{font-family:Arial;padding:20px;background:#f4f4f4}
    .card{background:#fff;padding:20px;border-radius:10px;max-width:600px;margin:auto;box-shadow:0 4px 16px rgba(0,0,0,0.1)}
    h2{margin-top:0}
    img{max-width:150px;border-radius:10px;margin-top:10px}
</style>
</head>
<body>
<div class="card">
    <h2>Étudiant enregistré avec succès !</h2>

    <p><strong>Nom :</strong> <?= $nom ?></p>
    <p><strong>Prénom :</strong> <?= $prenom ?></p>
    <p><strong>Email :</strong> <?= $email ?></p>
    <p><strong>Téléphone :</strong> <?= $telephone ?></p>
    <p><strong>Date de naissance :</strong> <?= $dob ?></p>
    <p><strong>Niveau :</strong> <?= $niveau ?></p>
    <p><strong>Filière :</strong> <?= $filiere ?></p>
    <p><strong>Adresse :</strong> <?= nl2br($adresse) ?></p>

    <?php if ($photoName): ?>
        <p><strong>Photo :</strong></p>
        <img src="uploads/<?= $photoName ?>" alt="Photo de l'étudiant">
    <?php else: ?>
        <p>Aucune photo uploadée.</p>
    <?php endif; ?>
</div>
</body>
</html>
