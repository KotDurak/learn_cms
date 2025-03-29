<div>
    <a href="/algoritms/index">Назад</a>
</div>

<?php


$list = [64, 34, 25, 12, 22, 11, 90];
function bubbleSort(array $list): array {
    $count = count($list);


    for ($i = 0; $i < $count; $i++) {
        for ($j = 0; $j < $count - $i - 1; $j++) {
            if ($list[$j] > $list[$j + 1]) {
                $tmp = $list[$j];
                $list[$j] = $list[$j + 1];
                $list[$j + 1] = $tmp;
            }
        }


    }

    return $list;
}



$sorted = bubbleSort($list);
vde($sorted);