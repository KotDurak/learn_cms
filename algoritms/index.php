<h1>Учебник по алгоритмам и структурам данных на PHP</h1>

<div class="section">
    <h2>Введение</h2>
    <p>Этот учебник познакомит вас с основными алгоритмами и структурами данных, реализованными на PHP. PHP - это скриптовый язык, который чаще всего используется для веб-разработки, но понимание алгоритмов и структур данных важно для написания эффективного кода в любой области.</p>
</div>

<div class="section">
    <h2>1. Базовые структуры данных</h2>

    <h3>1.1 Массивы</h3>
    <p>В PHP массивы - это универсальная структура данных, которая может выступать в роли списка или словаря.</p>
    <pre><code>// Индексированный массив (список)
$list = [1, 2, 3, 4, 5];

// Ассоциативный массив (словарь)
$dict = [
    'name' => 'John',
    'age' => 30,
    'city' => 'New York'
];</code></pre>

    <h3>1.2 Стек (LIFO)</h3>
    <p>Стек можно реализовать с помощью массива и функций array_push() и array_pop().</p>
    <pre><code>$stack = [];

// Добавление элементов
array_push($stack, 'A');
array_push($stack, 'B');
array_push($stack, 'C');

// Извлечение элементов
$last = array_pop($stack); // 'C'
$next = array_pop($stack); // 'B'</code></pre>

    <h3>1.3 Очередь (FIFO)</h3>
    <p>Очередь можно реализовать с помощью array_push() и array_shift().</p>
    <pre><code>$queue = [];

// Добавление элементов
array_push($queue, 'A');
array_push($queue, 'B');
array_push($queue, 'C');

// Извлечение элементов
$first = array_shift($queue); // 'A'
$next = array_shift($queue); // 'B'</code></pre>
</div>

<div class="section">
    <h2>2. Алгоритмы сортировки</h2>

    <h3>2.1 Сортировка пузырьком (Bubble Sort)</h3>
    <pre><code>function bubbleSort(array $arr): array {
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j+1]) {
                // Меняем элементы местами
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $temp;
            }
        }
    }
    return $arr;
}

$sorted = bubbleSort([64, 34, 25, 12, 22, 11, 90]);</code></pre>

    <h3>2.2 Быстрая сортировка (Quick Sort)</h3>
    <pre><code>function quickSort(array $arr): array {
    if (count($arr) <= 1) {
        return $arr;
    }

    $pivot = $arr[0];
    $left = $right = [];

    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $pivot) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

$sorted = quickSort([10, 5, 2, 3]);</code></pre>
</div>

<div class="section">
    <h2>3. Алгоритмы поиска</h2>

    <h3>3.1 Линейный поиск</h3>
    <pre><code>function linearSearch(array $arr, $x): int {
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === $x) {
            return $i;
        }
    }
    return -1; // Элемент не найден
}

$index = linearSearch([10, 20, 30, 40], 30); // 2</code></pre>

    <h3>3.2 Бинарный поиск (только для отсортированных массивов)</h3>
    <pre><code>function binarySearch(array $arr, $x): int {
    $left = 0;
    $right = count($arr) - 1;

    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);

        if ($arr[$mid] === $x) {
            return $mid;
        }

        if ($arr[$mid] < $x) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return -1; // Элемент не найден
}

$index = binarySearch([10, 20, 30, 40, 50], 40); // 3</code></pre>
</div>

<div class="section">
    <h2>4. Рекурсия</h2>

    <h3>4.1 Факториал</h3>
    <pre><code>function factorial(int $n): int {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo factorial(5); // 120</code></pre>

    <h3>4.2 Числа Фибоначчи</h3>
    <pre><code>function fibonacci(int $n): int {
    if ($n <= 1) {
        return $n;
    }
    return fibonacci($n - 1) + fibonacci($n - 2);
}

echo fibonacci(10); // 55</code></pre>
</div>

<div class="section">
    <h2>5. Структуры данных: связный список</h2>
    <pre><code>class ListNode {
    public $data = null;
    public $next = null;

    public function __construct($data) {
        $this->data = $data;
    }
}

class LinkedList {
    private $firstNode = null;

    public function insert($data) {
        $newNode = new ListNode($data);

        if ($this->firstNode === null) {
            $this->firstNode = $newNode;
        } else {
            $currentNode = $this->firstNode;
            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
    }

    public function display() {
        $currentNode = $this->firstNode;
        while ($currentNode !== null) {
            echo $currentNode->data . " ";
            $currentNode = $currentNode->next;
        }
    }
}

$list = new LinkedList();
$list->insert(10);
$list->insert(20);
$list->insert(30);
$list->display(); // 10 20 30</code></pre>
</div>

<div class="section">
    <h2>Заключение</h2>
    <p>Это лишь небольшая часть алгоритмов и структур данных, которые можно реализовать на PHP. Для более глубокого изучения рекомендуется:</p>
    <ol>
        <li>Изучить другие алгоритмы сортировки (слиянием, вставками)</li>
        <li>Познакомиться с деревьями и графами</li>
        <li>Изучить хеш-таблицы</li>
        <li>Рассмотреть алгоритмы обхода графов (DFS, BFS)</li>
        <li>Изучить алгоритмы динамического программирования</li>
    </ol>
    <div class="note">
        <p>Практика и реализация этих алгоритмов поможет вам стать более сильным разработчиком.</p>
    </div>
</div>
