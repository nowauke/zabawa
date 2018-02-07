<html>
    <head>
        <title>Oferta</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/oferta.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="container">
            <?php
            $conn = mysqli_connect('nowk.pl', 'nowk', 'wq5wceyC', 'nowk_loguj', '3306');
            if (!$conn) {
                die('Could not connect to MySQL: ' . mysqli_connect_error());
            }
            mysqli_query($conn, 'SET NAMES \'utf8\'');
            echo '<div class="tabelka">';
            echo '<table class="table"><thead class="thead-dark">';
            echo '<tr>';
            echo '<th>Lp.</th>';
            echo '<th>Asortyment</th>';
            echo '<th>Cena za szt.</th>';
            echo '<th>Zdjęcie</th>';
            echo '</thead></tr>';
            $result = mysqli_query($conn, 'SELECT nazwa, cena, `zdjęcie` FROM OFERTA');
            while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['nazwa'] . '</td>';
                echo '<td>' . $row['cena'] . '</td>';
                echo '<td><div class="fotasor>"' . $row['zdjęcie'] . '</div></td>';
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