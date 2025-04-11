<?php
require_once 'db_functions.php';
$pdo = getPdo();

$tab = $_GET['tab'] ?? 'salary';

switch ($tab) {
    case 'salary':
        $query = 'SELECT name, department, salary, ';
        $query .=  'ROW_NUMBER() OVER (partition by department ORDER BY salary DESC) as rank ';
        $query .= 'FROM employees';
        $columns = ['name', 'department', 'salary', 'rank'];
        $header = 'Зарплаты';
        break;
    case 'revenue':;
        $query = 'SELECT product, month, revenue, ';
        $query .= ' SUM(revenue) OVER (PARTITION BY product ORDER BY month) sale_stat ';
        $query  .= ' FROM sales';
        $columns = ['product', 'month', 'revenue', 'sale_stat'];
        $header = 'Пример 2: Нарастающий итог продаж';
        break;
    case 'rank';
        $query  = file_get_contents(ROOT_PATH . '/db/sql/rank.sql');
        $columns = ['name', 'group_name', 'avg_grade', 'overral_rank', 'group_rank'];
        $header = 'Ранжироване по успеваемости';
        break;
    default:
        redirect('/db/window.php?tab=salary');
}

$result = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
addCss('/db/main.css');

?>
    <div class="tabs">
        <a href="/db/window?tab=salary">Ранжирование по зарплате</a>
        <a href="/db/window?tab=revenue">Нарастающий итог продаж</a>
        <a href="/db/window?tab=rank">Ранжироване по успеваемости</a>
    </div>

<?php

echo "<h2>$header</h2>";

echo tableRows(
   $columns,
    $result
);
