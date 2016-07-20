<?php
if(isset($_POST['go'])) {
    $mass_in = $_POST['mass'];
    $mass = explode(" ", $mass_in);
    $ch = true;
    for($i=0; $i<=count($mass)-2; $i++){
        if ($mass[$i] < $mass[$i + 1]) {
        } else {
            $ch = false;
        }
    }
    if($ch){
        echo "Элементы массива идут по возрастанию";
    } else {echo "Элементы массива НЕ идут по возрастанию";}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Сравнение</title>
</head>
<body>
    <form method="post">
        <input type="text" name="mass" id="mass_1">
        <input type="submit" name="go" id="go_1">
    </form>
</body>
</html>
