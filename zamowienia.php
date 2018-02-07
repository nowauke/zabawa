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
                <button type="submit">Prześlij zamówienia</button>

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
        
        mysqli_close($conn);
        ?>



    </body>
</html>
