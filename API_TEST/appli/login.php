<!DOCTYPE html>
<html>
<head>
  <title>Page de connexion/inscription</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }
    
    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    
    h2 {
      text-align: center;
    }
    
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    button {
      width: 100%;
      padding: 10px;
      background-color: #000;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    
    .message {
      margin-top: 10px;
      text-align: center;
      color: red;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Connexion</h2>
    <form method="POST" action="login.php">
      <input type="text" name="username" placeholder="Nom d'utilisateur" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <button type="submit">Se connecter</button>
    </form>
    <button type="submit">S'inscrire</button>

  </div>
</body>
</html>
