<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2> Multidimensional Array</h2>
    <table>
        <tr>
            <th>Judul Film</th>
            <th>Tahun</th>
            <th>Rating</th>
        </tr>
        <?php
        // Membuat array multidimensi $movie yang berisi beberapa film
        $movie = array (
                            array("Avangers: Infinity War", 2018, 8.7),
                            array("The Avangers", 2012, 8.1),
                            array("Guardian of the Galaxy", 2014, 8.1),
                            array("Iron man", 2008, 7.9)
                );
        // Menampilkan setiap baris data film dalam tabel 
        echo "<tr>";
                echo "<td>". $movie[0][0] ."</td>";
                echo "<td>". $movie[0][1] ."</td>";
                echo "<td>". $movie[0][2] ."</td>";
        echo "</tr>";
        echo "<tr>";
                echo "<td>". $movie[1][0] ."</td>";
                echo "<td>". $movie[1][1] ."</td>";
                echo "<td>". $movie[1][2] ."</td>";
        echo "</tr>";
        echo "<tr>";
                echo "<td>". $movie[2][0] ."</td>";
                echo "<td>". $movie[2][1] ."</td>";
                echo "<td>". $movie[2][2] ."</td>";
        echo "</tr>";
        echo "<tr>";
                echo "<td>". $movie[3][0] ."</td>";
                echo "<td>". $movie[3][1] ."</td>";
                echo "<td>". $movie[3][2] ."</td>";
        echo "</tr>";
?>
    </table>
</body>
</html>