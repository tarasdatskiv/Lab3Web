<!DOCTYPE html>
<html>
<head>
    <title>Калькулятор</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            text-align: center;
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

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"],
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #0056b3;
        }

        p {
            font-size: 16px;
            color: red;
            margin-bottom: 10px;
        }

        .result {
            font-size: 24px;
            margin-top: 20px;
        }

        .result span {
            font-weight: bold;
        }

        a {
            display: block;
            margin-top: 20px;
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

        class Calc
        {

            public $num1;
            public $num2;
            public $cal;

            public function __construct($num1Inserted, $num2Inserted, $calInserted)
            {
                $this->num1 = $num1Inserted;
                $this->num2 = $num2Inserted;
                $this->cal = $calInserted;
            }

            public function calcMethod()
            {
                switch ($this->cal) {
                    case 'add':
                        $result = $this->num1 + $this->num2; // Додавання
                        break;
                    case 'sub':
                        $result = $this->num1 - $this->num2; // Віднімання
                        break;
                    case 'mul':
                        $result = $this->num1 * $this->num2; // Множення
                        break;
                    case 'podil':
                        $result = $this->num1 / $this->num2; // Ділення
                        break;
                    case 'podilwithout':
                        $result = $this->num1 % $this->num2; // Ділення без остачі
                        break;
                    case 'corin':
                        $result = sqrt($this->num1); // Корінь
                        break;
                    case 'stepin':
                        $result = $this->num1 ** $this->num2; // Число 1 в степені числа 2
                        break;

                    default:
                        $result = "Error"; // Помилка
                        break;
                }
                return $result;
            }
        }

        $num1Inserted = $_POST['num1Inserted'];
        $num2Inserted = $_POST['num2Inserted'];
        $calInserted = $_POST['calInserted'];

        if (!is_numeric($num1Inserted) || !is_numeric($num2Inserted)) {
            echo "<p>Будь ласка, введіть дійсні числа!</p>";
        } else {
            $calc = new Calc($num1Inserted, $num2Inserted, $calInserted);
            $result = $calc->calcMethod();
            echo "<div class='result'>Результат: <span>$result</span></div>";
        }

        ?>
        <form action="calc.php" method="POST">
            <input type="text" name="num1Inserted" placeholder="Введіть перше число" required />
            <input type="text" name="num2Inserted" placeholder="Введіть друге число" required />
            <select name="calInserted">
                <option value="add">Додати</option>
                <option value="sub">Відняти</option>
                <option value="mul">Помножити</option>
                <option value="podil">Поділити</option>
                <option value="podilwithout">Поділити без остачі</option>
                <option value="corin">Корінь тільки першого числа</option>
                <option value="stepin">Перше число в степені другого</option>
            </select>
            <button type="submit">Обчислити</button>
        </form>
        <a href='index.html'>Назад</a>
    </div>
</body>

</html>
