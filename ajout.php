<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=getion_professeur', 'root', 'nouvo');

// Soumettre le formulaire
if (isset($_POST['submit_form'])) {
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $sexe = $_POST['sexe'] ?? '';
    $date_de_naissance = $_POST['date_de_naissance'] ?? '';
    $nif = $_POST['nif'] ?? '';
    $numero_d_identification = $_POST['numero_d_identification'] ?? '';
    $niveau_d_etudes = $_POST['niveau_d_etudes'] ?? '';
    $fonction = $_POST['fonction'] ?? '';
    $ppe = $_POST['ppe'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $telephone_secondaire = $_POST['telephone_secondaire'] ?? '';
    $matieres_enseignées = $_POST['matieres_enseignées'] ?? '';
    $conges = $_POST['conges'] ?? '';
    $niveau_d_enseignement = $_POST['niveau_d_enseignement'] ?? '';
    $heures_de_cours = $_POST['heures_de_cours'] ?? '';
    $langues = $_POST['langues'] ?? '';
    $competences_linguistiques = isset($_POST['competences_linguistiques']) ? json_encode($_POST['competences_linguistiques']) : '';

    // Insérer le nouveau professeur
    $stmt = $pdo->prepare('INSERT INTO professors (nom, prenom, sexe, date_de_naissance, nif, numero_d_identification, niveau_d_etudes, fonction, ppe, telephone, telephone_secondaire, matieres_enseignées, conges, niveau_d_enseignement, heures_de_cours, langues, compétences_linguistiques) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$nom, $prenom, $sexe, $date_de_naissance, $nif, $numero_d_identification, $niveau_d_etudes, $fonction, $ppe, $telephone, $telephone_secondaire, $matieres_enseignées, $conges, $niveau_d_enseignement, $heures_de_cours, $langues, $competences_linguistiques]);

    // Récupérer l'ID du dernier professeur ajouté
    $professor_id = $pdo->lastInsertId();
    
    // Rediriger vers prof3.php avec l'ID du professeur
    header('Location: prof3.php?id=' . $professor_id);
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Professeur</title>

<style>
/* Styles pour le conteneur du formulaire */
.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.input-field {
    display: flex;
    flex-direction: column;
}

input, select {
    padding: 0.8em;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    padding: 0.8em;
    background: #3e4684;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    margin-top: 20px;
    display: inline-block;
    text-align: center;
}

button:hover {
    background: #2b3a6e;
    text-align: center;
}

/* Style des boutons de retour */
.backBtn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3e4684;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    margin-top: 20px;
}

.backBtn:hover {
    background-color: #2b3a6e;
}


/* Styles généraux */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
}

.container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border-radius: 30px;
}
h1{
    color: #3e4684;
    text-align: center;
    font-family: Arial, sans-serif;
    
}

h2{
    color: #3e4684;
    text-align: center;
    font-family: Arial, sans-serif;
}   
.but{
    position: relative;
    text-align: right;
}
    



    </style>
    </head>
<body>
      <div class="container">
      <h1>COLLEGE CHRIST-ROI</h1>
        <h2>Formulaire de declaration des Professeurs</h2>
        <hr/>
        <form method="post" action="">
            <div class="form-grid">
                <div class="input-field">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Entrez le nom" required>
                </div>
                <div class="input-field">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Entrez le prénom" required>
                </div>
                <div class="input-field">
                    <label for="sexe">Sexe</label>
                    <select id="sexe" name="sexe" required>
                        <option disabled selected>Choisir le sexe</option>
                        <option value="Male">Homme</option>
                        <option value="Female">Femme</option>
                    </select>
                </div>
                <div class="input-field">
                    <label for="date_de_naissance">Date de Naissance</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" required>
                </div>
                <div class="input-field">
                    <label for="nif">NIF</label>
                    <input type="text" id="nif" name="nif" placeholder="Entrez le NIF">
                </div>
                <div class="input-field">
                    <label for="numero_d_identification">Numéro d'Identification</label>
                    <input type="text" id="numero_d_identification" name="numero_d_identification" placeholder="Entrez le numéro d'identification">
                </div>
                <div class="input-field">
                    <label for="niveau_d_etudes">Niveau d'Études</label>
                    <input type="text" id="niveau_d_etudes" name="niveau_d_etudes" placeholder="Entrez le niveau d'études">
                </div>
                <div class="input-field">
                    <label for="fonction">Fonction</label>
                    <input type="text" id="fonction" name="fonction" placeholder="Entrez la fonction">
                </div>
                <div class="input-field">
                    <label for="ppe">Permis Provisoire d'Enseignement (PPE)</label>
                    <input type="text" id="ppe" name="ppe" placeholder="Entrez le PPE">
                </div>
                <div class="input-field">
                    <label for="telephone">Téléphone</label>
                    <input type="text" id="telephone" name="telephone" placeholder="Entrez le téléphone">
                </div>
                <div class="input-field">
                    <label for="telephone_secondaire">Téléphone Secondaire</label>
                    <input type="text" id="telephone_secondaire" name="telephone_secondaire" placeholder="Entrez le téléphone secondaire">
                </div>
                <div class="input-field">
                    <label for="matieres_enseignées">Matières Enseignées</label>
                    <input type="text" id="matieres_enseignées" name="matieres_enseignées" placeholder="Entrez les matières enseignées">
                </div>
                <div class="input-field">
                    <label for="conges">Congés</label>
                    <input type="text" id="conges" name="conges" placeholder="Entrez les congés">
                </div>
                <div class="input-field">
                    <label for="niveau_d_enseignement">Niveau d'Enseignement</label>
                    <input type="text" id="niveau_d_enseignement" name="niveau_d_enseignement" placeholder="Entrez le niveau d'enseignement">
                </div>
                <div class="input-field">
                    <label for="heures_de_cours">Heures de Cours</label>
                    <input type="text" id="heures_de_cours" name="heures_de_cours" placeholder="Entrez les heures de cours">
                </div>
                <div class="input-field">
                    <label for="langues">Langues</label>
                    <input type="text" id="langues" name="langues" placeholder="Entrez les langues">
                </div>
                <div class="input-field">
                    <label for="competences_linguistiques">Compétences Linguistiques</label>
                    <input type="text" id="competences_linguistiques" name="competences_linguistiques" placeholder="Entrez les compétences linguistiques">
                </div>
            </div>
            <div class="but">
            <button type="submit" name="submit_form">Soumettre</button>
            </div>
        </form>
    </div>
</body>
</html>


