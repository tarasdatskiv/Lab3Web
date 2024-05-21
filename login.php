<!DOCTYPE html>
<html>
<head>
    <title>Дані користувачів</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];

        $user = new User($surname, $name, $age, $email);
        $user->saveData();
        $userInfo = $user->showData();

        echo $userInfo;

        class User
        {
            private $surname;
            private $name;
            private $age;
            private $email;

            public function __construct($surname, $name, $age, $email)
            {
                $this->surname = $surname;
                $this->name = $name;
                $this->age = $age;
                $this->email = $email;
            }

            public function saveData($filename = 'data.txt')
            {
                $data = "Прізвище: $this->surname\nIм'я: $this->name\nВiк: $this->age\nE-mail: $this->email\n\n";
                file_put_contents($filename, $data, FILE_APPEND);
            }

            public function showData($filename = 'data.txt')
            {
                $data = file_get_contents($filename);

                if (empty($data)) {
                    return "<h2>Немає даних для відображення</h2>";
                }

                $userInfo = "<h2>Дані користувачів</h2>";
                $userInfo .= nl2br($data);

                return $userInfo;
            }
        }
        ?>
        <br>
        <a href='index.html'>Назад</a>
    </div>
</body>
</html>
