    <?php
    class LoginController extends Controller
    {
        public function index()
        {

            $error = "";

            try {

                if (isset($_POST["username"]) && isset($_POST["password"])) {
                    $usernames = $_POST["username"];
                    $passwords = $_POST["password"];
                    $dataDb = User::getUserByUsernameAndPassword($usernames, $passwords);
                    $patternx = "/^[a-zA-Z0-9_-]{3,16}$/";

                    if (!preg_match($patternx, $_POST["username"]) && !preg_match($patternx, $_POST["password"])) {
                        $error = 'champs invalide !';
                    } else {
                        if ($dataDb != 0) {
                            $_SESSION["id"] = $dataDb["id"];
                            var_dump($dataDb);
                            header("location:/main");
                            exit();
                        } else {
                            $error = "Incorrect";
                        }
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            require(__DIR__ . "/../../views/login.php");
        }
    }
    ?>