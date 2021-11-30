<?php
$menuname = $_POST['menuname'];
$ingredients = $_POST['ingredients'];
$category = $_POST['category'];
$servesfor = intval($_POST['amountpeople']);

// build up connection
$connection = new mysqli("localhost","root","", "menus");
if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}

// check if menu already exists
$sql_menu_exists = $connection->prepare("SELECT menu_name FROM menu WHERE menu_name=?");
$sql_menu_exists->bind_param("s", $menuname);
$sql_menu_exists->execute();
$sql_menu_exists->store_result();
$number_of_existing = $sql_menu_exists->num_rows;
$sql_menu_exists->close();


if($number_of_existing > 0){
    // the menu already exists: update ingredients
    $sql_menu_update = $connection->prepare("UPDATE menu SET menu_category=?,menu_ingredients=?,menu_servesfor=? WHERE menu_name=?");
    $sql_menu_update->bind_param("ssis", $category, $ingredients, $servesfor, $menuname);
    if(!$sql_menu_update->execute()){
        die("Das gewünschte Menü konnte nicht aktualisiert werden.");
    }

}else{
    // the menu doesn't exists: insert
    $sql_menu_insert = $connection->prepare("INSERT INTO menu VALUES (?, ?, ?, ?)");
    if(!$sql_menu_insert){
        die($connection->error);
    }

    $sql_menu_insert->bind_param("sssi", $menuname, $category, $ingredients, $servesfor);
    if(!$sql_menu_insert->execute()){
        die("Das gewünschte Menü konnte nicht eingefügt werden.");
    }
}

// show all maintained menus
$sql_menu_all = $connection->prepare("SELECT * FROM menu;");
$sql_menu_all->execute();
$result = $sql_menu_all->get_result();
while ($row = $result->fetch_assoc()) {
    echo "<h1>".$row['menu_name']."</h1>";
    echo "<h5> Berechnet für ".$row['menu_servesfor']." Personen als ".$row['menu_category']."</h5>";
    echo "<p>".$row['menu_ingredients']."</p></br>";

}

$connection->close();
?>
