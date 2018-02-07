<html>
    <head>
        <title>Zamówienia</title>
        <meta charset="UTF-8">
        <link href="css/zamowienia.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="container">
            <div class="formularz">
                <form action="zamowienia.php" method="post">
                    Imię: <input class="form-control" type="text" name="name"><br>
                    Nazwisko: <input class="form-control" type="text" name="surname"><br>
                    Miejscowośc: <input class="form-control" type="text" name="city"><br>
                    Ulica: <input class="form-control" type="text" name="street"><br>
                    Nr domu: <input class="form-control" type="text" name="house">
                    Data zamówienia : <input class="form-control" type="date" name="date">
                    <button class="btn btn-primary" type="submit">Prześlij zamówienia</button>

                </form>
            </div>

            <?php
            $conn = mysqli_connect('nowk.pl', 'nowk', 'wq5wceyC', 'nowk_loguj', '3306');
            if (!$conn) {
                die('Could not connect to MySQL: ' . mysqli_connect_error());
            }
            mysqli_query($conn, 'SET NAMES \'utf8\'');
            if (isset($_POST['name'])) {
                $imie = $_POST['name'];
                $nazwisko = $_POST['surname'];
                $miejscowosc = $_POST['city'];
                $ulica = $_POST['street'];
                $nrdomu = $_POST['house'];
                $asortyment = $_POST['items'];
                $ilosc = $_POST['value'];
                $data = $_POST['date'];

                $query = "INSERT INTO zamówienia ( imie,nazwisko,miejscowosc, ulica, nr_domu, Asortyment, data_zamowienia)"
                        . " VALUES ( '$imie','$nazwisko','$miejscowosc','$ulica','$nrdomu','$asortyment','$data')";

                $result = mysqli_query($conn, $query);
            }
            echo '<div class="tabelka">';
            echo '<table class="table">';
            echo '<tr><thead class="thead-dark">';
            echo '<th>Imie</th>';
            echo '<th>Nazwisko</th>';
            echo '<th>Miejscowosc</th>';
            echo '<th>Ulica</th>';
            echo '<th>Nr domu</th>';
            echo '<th>Asortyment</th>';
            echo '<th>Ilość</th>';
            echo '<th>Data Zamowienia</th>';
            echo '</thead></tr>';
            $result = mysqli_query($conn, 'SELECT imie, nazwisko, miejscowosc, ulica, nr_domu, Asortyment, ilosc, data_zamowienia FROM `zamówienia`');

            while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                echo '<tr>';
                echo '<td>' . $row['imie'] . '</td>';
                echo '<td>' . $row['nazwisko'] . '</td>';
                echo '<td>' . $row['miejscowosc'] . '</td>';
                echo '<td>' . $row['ulica'] . '</td>';
                echo '<td>' . $row['nr_domu'] . '</td>';
                echo '<td>' . $row['Asortyment'] . '</td>';
                echo '<td>' . $row['ilosc'] . '</td>';
                echo '<td>' . $row['data_zamowienia'] . '</td>';
                echo '</tr>';
            }

            mysqli_free_result($result);
            echo '</table>';
            echo '</div>';
            mysqli_close($conn);
            ?>


        </div>
    </body>
</html>
