<!DOCTYPE html>
<html>

<head>
    <title>Übung 4: Zufallszahl</title>
    <meta charset="utf8">
    <style>
        .rot   { color: red; }
        .gruen { color: green; }
    </style>
</head>

<body>
    <form action="zufallszahl.php">
        <?php
        $zahl = random_int(1, 100);

        // TODO: Paragraph mit Zahl ($zahl) ausgeben. Klasse gruen, falls < 50 sonst Klasse rot.
        if($zahl > 50){
            echo "<p class='rot'>{$zahl}</p>";
        }else{
            echo "<p class='gruen'>{$zahl}</p>";
        }

        ?>
        <button type="submit">berechne Zufallszahl</button>
    </form>
</body>

</html>
