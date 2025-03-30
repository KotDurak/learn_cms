document.addEventListener('DOMContentLoaded', function() {
    // Инициализация редактора для регулярного выражения
    const regexEditor = CodeMirror.fromTextArea(document.getElementById('regex-input'), {
        mode: {
            name: "javascript",
            regexp: true,
            pcre: true, // Включаем поддержку PCRE (PHP-стиль)
        },
        theme: "dracula",
        lineNumbers: false,
        lineWrapping: true,
        indentUnit: 2,
        matchBrackets: true,
    });


    // Инициализация редактора для PHP кода
    const phpEditor = CodeMirror.fromTextArea(document.getElementById('php-code'), {
        mode: 'application/x-httpd-php',
        theme: 'dracula',
        lineNumbers: true,
        lineWrapping: true,
        indentUnit: 4,
        matchBrackets: true,
        extraKeys: {
            "Ctrl-Space": "autocomplete"
        }
    });

    const subjectEditor = CodeMirror.fromTextArea(document.getElementById('subject_string'), {
        lineNumbers: true,
        lineWrapping: true,
    });

    const replacement = CodeMirror.fromTextArea(document.getElementById('replacement'), {
        lineNumbers: true,
        lineWrapping: true,
    });

    document.getElementById('submit_btn').addEventListener('click', function() {
        regexEditor.save();
        phpEditor.save();
        subjectEditor.save();
        replacement.save();
        const formData = new FormData(
            document.getElementById('regex-form')
        );

        fetch('/regex/functions/process', {
           method: 'POST',
           body: formData
        }).then(response => response.json())
            .then(result => {
                document.getElementById('result').textContent = '';
                const pre = document.createElement('pre');
                const code = document.createElement('code');
                code.className = 'language-json';
                code.textContent = JSON.stringify(result, null, 2);
                pre.appendChild(code);
                document.getElementById('result').appendChild(pre);
                hljs.highlightElement(code);
            });
    });

});