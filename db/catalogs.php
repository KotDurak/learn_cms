<?php

$pdo = getPdo();
$page = $_GET['page'] ?? 1;
$count = $_GET['count'] ?? 20;
$offset = ($page - 1) * $count;

if (isPost()) {
    $name = $_POST['name'];

    if (empty($name)) {
        throw new DomainException('Empty name');
    }

    $sql = 'INSERT INTO catalogs (name) VALUES (:name)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name]);
    $lastInsertId = $pdo->lastInsertId();

    redirect('/db/catalogs?lastId=' . $lastInsertId);
}

$sql = "SELECT * FROM catalogs ORDER BY id DESC LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
$stmt->execute([
        ':limit' => $count,
        ':offset' => $offset
]);

$allCount = 'SELECT COUNT(*) as cnt FROM catalogs';

$catalogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
$allRecords = $pdo->query($allCount)->fetchColumn();
$pagesCount = ceil($allRecords / $count);

$pages = [];
$startPage =  $page - 5;
while ($startPage < 1) {
    $startPage++;
}

$endPage = $startPage  + 10;

while ($endPage > $pagesCount) {
    $endPage--;
}

for ($i = $startPage; $i <= $endPage; $i++) {
    $pages[] = $i;
}



?>


<form method="POST" class="form">
    <div class="form_input">
        <label for="">Название</label>
        <input type="text" name="name">
    </div>

    <div class="form_input">
        <button type="submit">Создать</button>
    </div>
</form>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($catalogs as $catalog): ?>
            <tr>
                <td>
                    <?php echo $catalog['id'] ?>
                </td>
                <td>
                    <?php echo $catalog['name'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="pagination">
    <?php foreach ($pages as $page): ?>
        <a href="/db/catalogs.php?page=<?php echo $page ?>&count=<?php echo $count ?>"><?php echo  $page?></a>
    <?php endforeach; ?>
</div>