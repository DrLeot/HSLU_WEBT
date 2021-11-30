<?php
error_reporting(E_ERROR | E_PARSE);
define('COOKIENAME', 'MenuCounter');

function printSuccess($msg){
    echo "<p style='color:green;'>Success: ".$msg."</p>";
}
function printWarning($msg){
    echo "<p style='color:yellow;'>Warning: " .$msg."</p>";
}
function printError($msg){
    die("<p style='color:red;'>Error: " .$msg."</p>");
}
function printCookie(){
    if(isset($_COOKIE[COOKIENAME])){
        echo "<p>Sie haben in den letzten 24 Stunden bereits ".$_COOKIE[COOKIENAME]." Menüs hinzugefügt oder geändert!</p>";
    }
}
function incrementCookie(){
    $currentcount = 0;
    if(isset($_COOKIE[COOKIENAME])){
        $currentcount = intval($_COOKIE[COOKIENAME]);
    }
    setcookie(COOKIENAME, $currentcount+1, time() + 3600*24, "/");
}

function connectDB(){
    $connection = new mysqli("localhost","root","", "menus");
    if($connection->connect_error){
        printError($connection->connect_error);
    }
    return $connection;
}
function closeDB($conn){
    $conn->close();
}

function upsertMenuData($connection, $values){

    // data Quality Checks
    $ret = false;
    foreach($values as $key=> $value){
        if(!isset($value) or empty($value)){
            printWarning($key." als POST Variable scheint nicht gesetzt zu sein. Die Datenbank wird nicht aktualisiert.");
            $ret = true;
        }
    }
    if($ret){
        return;
    }

    // check if menu already exists
    $sql_menu_exists = $connection->prepare("SELECT menu_name FROM menu WHERE menu_name=?");
    $sql_menu_exists->bind_param("s", $values["menuname"]);
    $sql_menu_exists->execute();
    $sql_menu_exists->store_result();
    $number_of_existing = $sql_menu_exists->num_rows;
    $sql_menu_exists->close();


    if($number_of_existing > 0){
        // the menu already exists: update ingredients
        $sql_menu_update = $connection->prepare("UPDATE menu SET menu_category=?,menu_ingredients=?,menu_servesfor=?,menu_author=? WHERE menu_name=?");
        $sql_menu_update->bind_param("ssiss", $values["category"], $values["ingredients"], $values["servesfor"], $values["author"], $values["menuname"]);
        if(!$sql_menu_update->execute()){
            printError("Das gewünschte Menü konnte nicht aktualisiert werden.");
        }
        incrementCookie();
        printSuccess("Das Menü ".$values["menuname"]." wurde erfolgreich aktualisiert.");

    }else{
        // the menu doesn't exists: insert
        $sql_menu_insert = $connection->prepare("INSERT INTO menu VALUES (?, ?, ?, ?, ?)");
        if(!$sql_menu_insert){
            printError($connection->error);
        }

        $sql_menu_insert->bind_param("ssssi", $values["menuname"], $values["category"], $values["ingredients"], $values["author"], $values["servesfor"]);
        if(!$sql_menu_insert->execute()){
            printError("Das gewünschte Menü konnte nicht eingefügt werden.");
        }
        incrementCookie();
        printSuccess("Das Menü ".$values["menuname"]." wurde erfolgreich eingefügt.");
    }
}

function printAllMenus($connection){
    // show all maintained menus
    $sql_menu_all = $connection->prepare("SELECT * FROM menu order by menu_name ASC;");
    $sql_menu_all->execute();
    $result = $sql_menu_all->get_result();
    while ($row = $result->fetch_assoc()) {
        echo "<h1>".$row['menu_name']."</h1>";
        echo "<h5> Berechnet für ".$row['menu_servesfor']." Personen als ".$row['menu_category']."</h5>";
        echo "<p>".$row['menu_ingredients']."</p></br>";
        echo "<p> Autor: ".$row['menu_author']."</p></br>";

    }
}

$DBConnection = connectDB();
echo upsertMenuData(
    $DBConnection,
    array(
        "menuname" => $_POST['menuname'],
        "ingredients" => $_POST['ingredients'],
        "author" => $_POST['email'],
        "category" => $_POST['category'],
        "servesfor" => intval($_POST['amountpeople'])
    )
);
printCookie();
echo "<a href='index.html'>Zurück zur Webseite</a>";
printAllMenus($DBConnection);
closeDB($DBConnection);

?>
