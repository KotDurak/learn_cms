<?php
    if (isPost()) {
        $callback = null;
        $matches = null;

        if ($_POST['callback']) {
            $cb = $_POST['callback'];
            '$callback = ' . $cb;
            eval('$callback = ' . $cb);
        }

        switch ($_POST['function']) {
            case 'preg_match':
                $result = preg_match($_POST['regex'], $_POST['subject'], $matches);
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
            <?php print_r($matches); ?>
        </pre>
        <?php endif ?>
    </div>
    <?php endif; ?>

    <form action="" method="POST" class="form" style="width: 700px">
        <div class="width-50">
            <div class="form_input">
                <label for=" ">Регулярное выражение</label>
                <input type="text" name="regex"/>
            </div>

            <div class="form_input">
                <label for="">Строка</label>
                <input type="text" name="subject">
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
                </div>
            </div>

            <div class="form_input">
                <label for="">Callback</label>
                <textarea name="callback" id="" cols="30" rows="10"></textarea>
            </div>
        </div>

    </form>
</div>