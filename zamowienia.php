<html>
    <head>
        <title>Zamówienia</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div>
            <form action="zamowienia.php" method="post">
                Imię: <input type="text" name="name"><br>
                Nazwisko: <input type="text" name="surname"><br>
                Miejscowośc: <input type="text" name="city"><br>
                Ulica: <input type="text" name="street"><br>
                Nr domu: <input type="text" name="house">

            </form>
        </div>

        <?php
        $imie = $_POST['name'];
        $nazwisko = $_POST['surname'];
        $miejscowosc = $_POST['city'];
        $ulica = $_POST['street'];
        $nrdomu = $_POST['house'];
        $asortyment = $_POST['items'];
        $ilosc = $_POST['value'];
        $data = '22.12.2008';
        $conn = mysqli_connect('nowk.pl', 'nowk', 'wq5wceyC', 'nowk_loguj', '3306');
        if (!$conn) {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
        mysqli_query($conn, 'SET NAMES \'utf8\'');
        $sql = "INSERT INTO zamówienia (imie, nazwisko, miejscowosc,ulica, nr_domu, Asortyment, ilosc, data_zamowienia) VALUES ('$imie','$nazwisko','$miejscowosc','$ulica','$nrdomu',$asortyment', $ilosc, '$data')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo '<table class="table"><thead class="thead-dark">';
        echo '<tr>';
        echo '<th>Imię</th>';
        echo '<th>Nazwisko</th>';
        echo '<th>Miejscowość</th>';
        echo '<th>Ulica</th>';
        echo '<th>Numer domu</th>';
        echo '<th>Asortyment</th>';
        echo '<th>Ilość szt.</th>';
        echo '<th>Data zamówienia</th>';
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
        mysqli_close($conn);
        ?>



    </body>
</html>
