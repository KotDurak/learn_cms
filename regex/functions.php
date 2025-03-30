<?php

addJs('/regex/assets/main.js');
addCss('/regex/assets/main.css');
addCss('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css');
addCss('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/dracula.min.css');

array_map('addJs', [
        'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/htmlmixed/htmlmixed.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/xml/xml.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/javascript/javascript.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/css/css.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/clike/clike.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/php/php.min.js',
]);

addJs('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js');
addCss('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/atom-one-dark.min.css');

?>

<div>
    <div id="result" class="json-results">

    </div>

    <form action="" id="regex-form" method="POST" class="form" style="width: 700px">
        <div class="width-50">
            <div class="form_input">
                <label for="">Регулярное выражение</label>
                <textarea name="regex" id="regex-input" cols="30" rows="10"><?php echo getPostVal('regex') ?></textarea>
            </div>

            <div class="form_input">
                <label for="">Строка</label>
                <textarea name="subject" id="subject_string" cols="30" rows="10"><?php echo getPostVal('subject') ?></textarea>
            </div>


            <div class="form_input">
                <label for="">Строка замены (replacement)</label>
                <textarea id="replacement"  name="replacement"></textarea>
            </div>
        </div>
        <div class="width-50">
            <div class="form_input">
                <label for="">Функция</label>
                <select name="function" id="function">
                    <option value="preg_match">preg_match</option>
                    <option value="preg_replace">preg_replace</option>
                    <option value="preg_match_all">preg_match_all</option>
                    <option value="preg_replace_callback">preg_replace_callback</option>
                </select>
            </div>

            <div class="form_input">
                <label for="">Флаги</label>
                <div class="checkbox_list">
                    <div class="checkbox_list_item">
                        <label for="">PREG_OFFSET_CAPTURE</label>
                        <input type="checkbox" name="flag[]" value="PREG_OFFSET_CAPTURE">
                    </div>
                    <div class="checkbox_list_item">
                        <label for="">PREG_UNMATCHED_AS_NULL</label>
                        <input type="checkbox" name="flag[]" value="PREG_UNMATCHED_AS_NULL">
                    </div>
                    <div class="checkbox_list_item">
                        <label title="Элементы, упороядоченные по номеру открывающией скобки">PREG_PATTERN_ORDER</label>
                        <input type="checkbox" name="flag[]" value="PREG_PATTERN_ORDER">
                    </div>

                    <div class="checkbox_list_item">
                        <label for="">PREG_SET_ORDER</label>
                        <input type="checkbox" value="PREG_SET_ORDER">
                    </div>
                </div>
            </div>

            <div class="form_input">
                <label for="">Callback</label>
                <textarea id="php-code" name="callback" cols="30" rows="10"><?php echo getPostVal('callback')?> </textarea>
            </div>

            <div>
                <button type="button" name="button" id="submit_btn" type="submit">Отправить</button>
            </div>
        </div>
    </form>
</div>