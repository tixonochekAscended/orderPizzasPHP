<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🥪 Tixonochek's Pizza Shop | 🐘 PHP Testing</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="icon.ico">
</head>
<body>
    <form action="index.php" method="get">
    <div id="ui">
        <ul class="order-buttons">
        <button type="submit" class="order" name="salami" value=0>
            🍕 Order Salami
        </button>
        <button type="submit" class="order" name="margharita" value=1>
            🍕 Order Margharita
        </button>
        <button type="submit" class="order" name="pepperoni" value=2>
            🍕 Order Pepperoni
        </button>
        <button type="submit" class="order" name="vegan" value=3>
            🍕 Order Vegan Pizza
        </button>
        <br><br><br><br>
        <button type="submit" class="clear" name="clear">
            ❌ Clear the list
        </button>
        </ul>
        <ol class="ordered-list">
            <div class="ordered-list-content">  
                <div class="title">
                    📝 Pizza(s) ordered:
                </div>
</body>
</html>
<?php
    session_start();

    if (!isset($_SESSION['orderedPizzas'])) {
        $_SESSION['orderedPizzas'] = [];
    }
    
    if (isset($_GET['salami'])) {
        array_push($_SESSION['orderedPizzas'], $_GET['salami']);
    }
    if (isset($_GET['margharita'])) {
        array_push($_SESSION['orderedPizzas'], $_GET['margharita']);
    }
    if (isset($_GET['pepperoni'])) {
        array_push($_SESSION['orderedPizzas'], $_GET['pepperoni']);
    }
    if (isset($_GET['vegan'])) {
        array_push($_SESSION['orderedPizzas'], $_GET['vegan']);
    }
    if (isset($_GET['clear'])) {
        $_SESSION['orderedPizzas'] = [];
    }
    if (!empty($_SESSION['orderedPizzas'])) {
        $countedUpPizzas = array_count_values($_SESSION['orderedPizzas']);
        foreach ($countedUpPizzas as $pizza => $amount) {
            $pizzaName = "";
            switch ($pizza) {
                case 0:
                    $pizzaName = "Salami 🥩";
                    break;
                case 1:
                    $pizzaName = "Margharita 🫓";
                    break;
                case 2:
                    $pizzaName = "Pepperoni 🥨";
                    break;
                case 3:
                    $pizzaName = "Vegan Pizza 🥦";
                    break;
                default:
                    $pizzaName = "Undefined (Error) ❔";
                    break;
            }
            echo "<li>{$pizzaName} x{$amount}</li>";
        }
    } else {
        echo '🎒 No items yet';
    }
    echo '</div></ol></div></form>';
?>