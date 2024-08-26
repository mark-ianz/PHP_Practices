<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Forms</title>
</head>
<body>
  <form action="index.php" method="post">
    <label for="food">
      What do you want to order?
    </label>
    <select class="food-selection" name="food-selection">
      <option value="">
        --- Select food ---
      </option>
      <option value="Box of Pizza">
        Box of Pizza
      </option>
      <option value="Donut">
        Donut
      </option>
      <option value="French Fries">
        French Fries
      </option>
      <option value="Hamburger">
        Hamburger
      </option>
      <option value="Salad">
        Salad
      </option>
      <option value="Milk">
        Milk
      </option>
      <option value="Bottle of Water">
        Bottle of Water
      </option>
    </select>
    <br>
    <label for="quantity">
      Amount you want to order:
    </label>
    <br>
    <input type="number" name="quantity" class="quantity-input">
    <br>
    <input type="submit" value="Order now!">
  </form>
</body>
</html>
<?php
  $selectedFood = $_POST ["food-selection"];
  $foodQuantity = $_POST ["quantity"];
  if ($foodQuantity === '' || $selectedFood === '') {
    echo "Please fill in the requirements.";
    return;
  }
  $foodPrice = null;
  $total = null;
  $transactionMessage = "You successfully ordered {$foodQuantity}x amount of {$selectedFood}/s.<br>";
  

  if ($selectedFood === 'Box of Pizza') {
    $foodPrice = 99;
    $total = $foodPrice * $foodQuantity;
    $totalPrice = "Your total amout is P{$total}.";
    echo $transactionMessage;
    echo $totalPrice;
  }
  else if ($selectedFood === 'Donut') {
    $foodPrice = 22;
    $total = $foodPrice * $foodQuantity;
    $totalPrice = "Your total amout is P{$total}.";
    echo $transactionMessage;
    echo $totalPrice;
  }
  else if ($selectedFood === 'French Fries') {
    $foodPrice = 25;
    $total = $foodPrice * $foodQuantity;
    $totalPrice = "Your total amout is P{$total}.";
    echo $transactionMessage;
    echo $totalPrice;
  }
  else if ($selectedFood === 'Hamburger') {
    $foodPrice = 45;
    $total = $foodPrice * $foodQuantity;
    $totalPrice = "Your total amout is P{$total}.";
    echo $transactionMessage;
    echo $totalPrice;
  }
  else if ($selectedFood === 'Salad') {
    $foodPrice = 120;
    $total = $foodPrice * $foodQuantity;
    $totalPrice = "Your total amout is P{$total}.";
    echo $transactionMessage;
    echo $totalPrice;
  }
  else if ($selectedFood === 'Milk') {
    $foodPrice = 79;
    $total = $foodPrice * $foodQuantity;
    $totalPrice = "Your total amout is P{$total}.";
    echo $transactionMessage;
    echo $totalPrice;
  }
  else if ($selectedFood === 'Bottle of Water') {
    $foodPrice = 10;
    $total = $foodPrice * $foodQuantity;
    $totalPrice = "Your total amout is P{$total}.";
    echo $transactionMessage;
    echo $totalPrice;
  }
?>