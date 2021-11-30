<!DOCTYPE html>
<html>

<head>
    <title>Hallo</title>
    <meta charset="utf8">
</head>

<body>
    <?php
    // TODO: (2) Prüfen, ob Parameters 'name' gesetzt ist (ersetzen Sie true)
    if (isset($_POST['name']))  {

        // TODO: (1) Ausgabe des Parameters 'name'
        echo $_POST['name'];

    } else {
        echo "<p>Parameter 'name' nicht gesetzt</p>";
    }
    ?>
</body>

</html>
