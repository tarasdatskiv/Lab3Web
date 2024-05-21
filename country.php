<!DOCTYPE html>
<html>
<head>
    <title>Країни</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
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
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Country</th>
            <th>People</th>
            <th>Capital</th>
        </tr>
        <?php
        class Country {
            public $name;
            public $population;
            public $capital;

            public function __construct($name, $population, $capital) {
                $this->name = $name;
                $this->population = $population;
                $this->capital = $capital;
            }
        }

        $countries = array(
            new Country("Ukraine", "45 million", "Kyiv"),
            new Country("United States", "331 million", "Washington, D.C."),
            new Country("China", "1.4 billion", "Beijing"),
            new Country("India", "1.3 billion", "New Delhi"),
            new Country("Brazil", "212 million", "Brasília"),
            new Country("Russia", "146 million", "Moscow"),
            new Country("Japan", "126 million", "Tokyo"),
            new Country("Mexico", "126 million", "Mexico City"),
            new Country("Germany", "83 million", "Berlin"),
            new Country("France", "67 million", "Paris"),
            new Country("United Kingdom", "67 million", "London"),
            new Country("Italy", "60 million", "Rome"),
            new Country("South Korea", "51 million", "Seoul"),
            new Country("Spain", "47 million", "Madrid"),
            new Country("Canada", "38 million", "Ottawa"),
            new Country("Argentina", "45 million", "Buenos Aires"),
            new Country("Australia", "25 million", "Canberra"),
            new Country("Netherlands", "17 million", "Amsterdam"),
            new Country("Saudi Arabia", "35 million", "Riyadh"),
            new Country("Switzerland", "8 million", "Bern"),
            new Country("Sweden", "10 million", "Stockholm"),
            new Country("Belgium", "11 million", "Brussels"),
            new Country("Austria", "9 million", "Vienna"),
            new Country("Norway", "5 million", "Oslo"),
            new Country("Denmark", "6 million", "Copenhagen"),
            new Country("Finland", "5 million", "Helsinki"),
            new Country("Poland", "38 million", "Warsaw"),
            new Country("Czech Republic", "10 million", "Prague"),
            new Country("Portugal", "10 million", "Lisbon"),
            new Country("Ireland", "5 million", "Dublin"),
            new Country("Greece", "10 million", "Athens")
        );

        foreach ($countries as $country) {
            echo "<tr>";
            echo "<td>{$country->name}</td>";
            echo "<td>{$country->population}</td>";
            echo "<td>{$country->capital}</td>";
            echo "</tr>";
        }
        ?>
    </table>
    
    <button onclick="goBack()">Назад</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
