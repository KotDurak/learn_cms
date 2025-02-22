<?php

setTitle('Фильтрация');

$value = filter_input(
        INPUT_POST,
    'search',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
);

$result = filter_input(
  INPUT_POST,
  'search',
  FILTER_CALLBACK,
  [
          'options' => function($value) {
                $value = (strlen($value) > 3) ? $value : '';
                return strip_tags($value);
          }
  ]
);

?>

<form action="" method="POST">
    <input type="text" name="search" value="<?php echo $value ?>">
    <br>
    <input type="submit" value="Фильтровать">
</form>

<?= $result ?>