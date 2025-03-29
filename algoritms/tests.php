<div>
    <a href="/algoritms/index">Назад</a>
</div>

<?php
$alg = $_GET["alg"] ?? null;

$list = [64, 34, 25, 12, 64, 22, 11, 90];
function bubbleSort(array $list): array
{
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

function quickSort(array $list): array
{
    /**
     * $first =   [64, 34, 25, 12, 64, 22, 11, 90];
     * $left = [34,12, 22, 11];
     * $middle = [64];
     * $right = [64,90];
     */

    if (count($list) <= 1) {
        return $list;
    }

    $left = $right = [];
    $pivot = $list[0];

    for ($i = 1; $i < count($list); $i++) {
        if ($list[$i] < $pivot) {
            $left[] = $list[$i];
        } else {
            $right[] = $list[$i];
        }
    }
   // vde(compact('left', 'pivot','right', ));
    return array_merge(
            quickSort($left),
            [$pivot],
            quickSort($right)
    );
}

switch ($alg) {
    case 'bubbleSort':
        $sort = bubbleSort($list);
        vde($sort);
        break;
    case 'quickSort':
        $sort = quickSort($list);
        vde($sort);
        break;
}