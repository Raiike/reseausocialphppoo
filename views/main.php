<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facebook</title>
  <style>
    /* Réinitialisation des styles de base */
  /* Réinitialisation des styles de base */
body, html {
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Helvetica Neue', Arial, sans-serif;
  background-color: #f0f2f5;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.container {
  width: 100%;
  max-width: 800px;
  padding: 20px;
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  color: #1877f2;
  margin-bottom: 20px;
}

#butOff {
  display: block;
  text-align: right;
  color: #1877f2;
  text-decoration: none;
  font-weight: bold;
  transition: color 0.3s ease;
}

#butOff:hover {
  color: #1558c1;
}

/* Réorganiser le placement du message de bienvenue */
#helloThere {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
  font-size: 18px;
}

#helloThere p {
  margin: 0;
}

#username {
  font-weight: bold;
  color: #1877f2;
  margin-left: 5px;
}

.form-container {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.input-text {
  width: 100%;
  padding: 12px;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
  box-sizing: border-box;
}

.submit-button {
  width: 100%;
  background-color: #1877f2;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  padding: 12px;
  cursor: pointer;
  font-size: 16px;
  text-transform: uppercase;
  transition: background-color 0.3s ease;
}

.submit-button:hover {
  background-color: #166fe5;
}

.user-list {
  margin-top: 20px;
}

.post {
  border: 1px solid #ddd;
  background-color: #ffffff;
  border-radius: 5px;
  padding: 20px;
  margin-bottom: 20px;
}

.post-title {
  font-size: 20px;
  color: #1c1e21;
  margin-bottom: 10px;
}

.post-content {
  color: #4b4f56;
  margin-bottom: 15px;
}

.action-button {
  padding: 8px 16px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
  text-transform: uppercase;
  transition: background-color 0.3s ease;
}

.modify-button {
  background-color: #1877f2;
  color: #ffffff;
}

.delete-button {
  background-color: #dc3545;
  color: #ffffff;
}

.action-button:hover {
  opacity: 0.8;
}

  </style>
</head>
<body>
<div class="container">
  <h1>Facebook</h1>
  <a href="/logout" id="butOff">Déconnexion</a>
  <div id="helloThere">
  <p>Bonjour,<span id="username"><?php echo $username ?></span>!</p>
  </div>

  
  <!-- Formulaire d'ajout de post -->
  <form class="form-container" action="/" method="post">
    <input class="input-text" name="addTitle" type="text" placeholder="Titre du post">
    <input class="input-text" name="addContent" type="text" placeholder="Contenu du post">
    <input class="submit-button" type="submit" name="Publier" value="Publier">
  </form>
  
  <!-- Liste des posts -->
  <div class="user-list">
    <?php foreach ($posts as $post): ?>
      <?php if(isset($_POST["modify"]) && $_POST["modify"] == $post->getId()): ?>
        <form class="form-container" action="/" method="post">
          <div class="post">
            <input class="input-text" name="new-post-title" value="<?= $post->getTitle() ?>">
            <input class="input-text" name="new-post-content" value="<?= $post->getContent() ?>">
            <button class="action-button modify-button" type="submit" name="confirm" value="<?= $post->getId() ?>">Confirmer</button>
          </div>
        </form>
      <?php else: ?>
        <div class="post">
          <div class="post-title"><?= $post->getTitle() ?></div>
          <div class="post-content"><?= $post->getContent() ?></div>
          <?php if ($post->getid_user() == $_SESSION["id"]): ?>
            <form class="form-container" action="" method="post">
              <button class="action-button modify-button" type="submit" name="modify" value="<?= $post->getId() ?>">Modifier</button>
              <button class="action-button delete-button" type="submit" name="delete" value="<?= $post->getId() ?>">Supprimer</button>
            </form>
          <?php endif ?>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>
</body>
</html>
