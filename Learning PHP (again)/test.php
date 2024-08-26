<?php
  $first_name = 'Mark Ian';
  $age = 19;
  $ageMessage = '';
  $money = 2391231285.22356;
  ;

  if ($age > 18) {
    $ageMessage = 'You are at the legal age!';
  } else {
    $ageMessage = 'You are still a minor!';
  };

  $colors = ["Red", "Orange", "Black", "Green", "Blue"];

  foreach ($colors as $key => $value) {
    if ($value === "Black") {
      echo ("I loveee color $value".'<br>');
    } else {
      echo ("I don't like color $value".'<br>');
    }
  };

  $colors[123] = "Purple";
  echo $colors[123];
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p>
    <?php
      echo $first_name;
    ?>
  </p>
  <p>
    <?php
      echo $ageMessage;
    ?>
  </p>
  <p>
    <?php
      echo "Your money is ".number_format($money, 2, '.', ',')."<br>";
      
      $i = 1;
      $result = 0;
      do {
        echo $i."<br>";
        $result += $i;
        $i++;
      }
      while ($i <= 20);
      echo "Total sum is: $result";
    ?>
  </p>
  <p>
    How many numbers do you want to input?
  </p>
  <input type="number" class="js-input" placeholder="Input a number">

  <?php
    $cars = ["Lambo", "Tesla", "Ford", "Bugatti"];

    foreach ($cars as $car) {
      echo "<br>".$car;
    };

    $numbers = [1,2,3,4,5,6];
    $result = 0;

    foreach ($numbers as $index => $number) {
      $result += $number;

      echo "Index #".$index;
      echo "<br>".$number;
    };
    echo "<br>".$result;
  ?>
  <script>
    const NUMBER_INPUT_ELEMENT = document.querySelector ('.js-input');

    NUMBER_INPUT_ELEMENT.addEventListener ('keydown', (event) => {
      if (event.key === 'Enter') {
        run ();
      }
    });

    function run () {
      const input_value = NUMBER_INPUT_ELEMENT.value;
      let loop_counter = 1;
      let even_counter = 0;
      let odd_counter = 0;
      let sum = 0;

      do {
        const random_number = Math.round(Math.random () * 100);

        if (random_number%2 === 0) {
          document.body.innerHTML += `<p>[${loop_counter}] ${random_number} - <span style="color: red;">EVEN NUMBER</span></p>`;
          even_counter++;
        } else {
          document.body.innerHTML += `<p>[${loop_counter}] ${random_number} - <span style="color: green;">ODD NUMBER</span></p>`;
          odd_counter++;
        }
        sum += random_number;
        loop_counter++;
      }
      while (loop_counter <= input_value);

      document.body.innerHTML += `<p>There are ${even_counter} even numbers and ${odd_counter} odd numbers.</p>`;
      document.body.innerHTML += `<p>The total sum of all numbers are ${sum}</p>`;
    }
  </script>
</body>
</html>