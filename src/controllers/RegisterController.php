<?php
class RegisterController extends Controller
{
    public function index()
    {
        $error = "";

        try {
            if (isset($_POST["newUsername"]) && isset($_POST["newPassword"])) {
                $username = $_POST["newUsername"];
                $password = $_POST["newPassword"];

                // Validation des champs username et password
                $pattern = "/^[a-zA-Z0-9_-]{3,16}$/";
                if (!preg_match($pattern, $username) || !preg_match($pattern, $password)) {
                    $error = 'Format invalide pour le nom d\'utilisateur ou le mot de passe (3 à 16 caractères alphanumériques)';
                } else {
                    // Création de l'utilisateur
                    User::createUser($username, $password);
                    header("Location: /login"); // Rediriger vers la page de connexion
                    exit();
                }
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            exit();
        }

        require(__DIR__ . "/../../views/register.php");
    }
}
?>
