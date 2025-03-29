<?php
    $name = '1';
    if (isPost()) {
        $callback = null;
        $matches = null;
        $regex = $_POST['regex'];
        $subject = $_POST['subject'] ?? '';
        $replacement = $_POST['replacement'] ?? '';
        $function = $_POST['function'];
        $flags = $_POST['flag'] ?? [];
        $cb = $_POST['callback'] ?? null;

        if ($cb) {
            '$callback = ' . $cb;
            eval('$callback = ' . $cb);
        }

        $flagOption = 0;

        if (!empty($flags)) {
            foreach ($flags as $flag) {
                $flagOption = $flagOption | constant($flag);
            }
        }

        switch ($_POST['function']) {
            case 'preg_match':
                $result = preg_match($regex, $subject, $matches, $flagOption);
                break;
            case 'preg_match_all':
                $result = preg_match_all(
                        $regex,
                        $subject,
                        $matches,
                        $flagOption
                );
                break;
            case 'preg_replace':
                $result = preg_replace($regex, $replacement. $subject);
                break;
            default:
                $result = false;
        }
    }
?>

<div>
    <?php if (isPost()): ?>
    <div class="preg_result">
        <p>Функция: <b><?php  echo $_POST['function'] ?></b></p>

        <?php if (!empty($matches)): ?>
        <pre style="background: #c5c5c5">
            <?php echo htmlspecialchars(print_r($matches, true)); ?>
        </pre>
        <?php endif ?>
    </div>
    <?php endif; ?>

    <form action="" method="POST" class="form" style="width: 700px">
        <div class="width-50">
            <div class="form_input">
                <label for="">Регулярное выражение</label>
                <textarea name="regex" cols="30" rows="10"><?php echo getPostVal('regex') ?></textarea>
            </div>

            <div class="form_input">
                <label for="">Строка</label>
                <textarea name="subject" id="" cols="30" rows="10"><?php echo getPostVal('subject') ?></textarea>
            </div>


            <div class="form_input">
                <label for="">Строка замены (replacement)</label>
                <input type="text" name="replacement">
            </div>

            <div class="form_input">
                <label for="">Функция</label>
                <select name="function" id="function">
                    <option value="preg_match">preg_match</option>
                    <option value="preg_replace">preg_replace</option>
                    <option value="preg_match_all">preg_match_all</option>
                    <option value="preg_replace_callback">preg_replace_callback</option>
                </select>
            </div>

            <div>
                <button name="submit" type="submit">Отправить</button>
            </div>
        </div>
        <div class="width-50">
            <div class="form_input">
                <label for="">Флаги</label>
                <div class="checkbox_list">
                    <label for="">PREG_OFFSET_CAPTURE</label>
                    <input type="checkbox" name="flag[]" value="PREG_OFFSET_CAPTURE">
                    <label for="">PREG_UNMATCHED_AS_NULL</label>
                    <input type="checkbox" name="flag[]" value="PREG_UNMATCHED_AS_NULL">
                    <label for="" title="Элементы, упороядоченные по номеру открывающией скобки">PREG_PATTERN_ORDER</label>
                    <input type="checkbox" name="flag[]" value="PREG_PATTERN_ORDER">
                    <label for="">PREG_OFFSET_CAPTURE</label>
                    <input type="checkbox" name="flag[]" value="PREG_OFFSET_CAPTURE">
                    <label for="">PREG_SET_ORDER</label>
                    <input type="checkbox" value="PREG_SET_ORDER">
                </div>
            </div>

            <div class="form_input">
                <label for="">Callback</label>
                <textarea name="callback"  cols="30" rows="10"></textarea>
            </div>
        </div>

    </form>
</div>