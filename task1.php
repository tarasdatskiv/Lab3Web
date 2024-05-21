<!DOCTYPE html>
<html>
<head>
    <title>Таблиця множення</title>
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
        h3 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        p {
            font-size: 16px;
            color: red;
            margin-bottom: 10px;
        }
        a {
            display: block;
            text-align: center;
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

        $num3Inserted = $_POST['num3Inserted'];

        if (!is_numeric($num3Inserted)) {
            echo "<p>Введіть дійсне число!</p>";
            exit;
        }

        class TableMultiplication
        {
            private $number;

            public function __construct(int $number)
            {
                $this->number = $number;
            }

            public function calculate(): array
            {
                $result = [];
                for ($i = 1; $i <= 10; $i++) {
                    $result[$i] = $this->number * $i;
                }
                return $result;
            }

            public function printTable(): void
            {
                echo "<h3>Таблиця множення для числа {$this->number}</h3>";
                echo "<table>";
                echo "<tr><th>Число</th><th>Результат</th></tr>";
                foreach ($this->calculate() as $key => $value) {
                    echo "<tr><td>{$key}</td><td>{$value}</td></tr>";
                }
                echo "</table>";
            }
        }

        $table = new TableMultiplication($num3Inserted);
        $table->printTable();

        ?>
        <a href='index.html'>Назад</a>
    </div>
</body>
</html>
