<?php

$callback = null;
$matches = null;
$regex = $_POST['regex'];
$subject = $_POST['subject'] ?? '';
$replacement = $_POST['replacement'] ?? '';
$function = $_POST['function'];
$flags = $_POST['flag'] ?? [];
$cb = $_POST['callback'] ?? null;

if (empty(trim($regex))) {
    redirect('/regex/functions');
}

if ($cb) {
    $cb = preg_replace('/<\?php|\?>$/', '', $cb);
    $cb = trim($cb);
    if ($cb) {
        eval('$callback = ' . $cb . ';');
    }

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
        $result = preg_replace($regex, $replacement, $subject);
        break;
    case 'preg_replace_callback':
        $result = preg_replace_callback($regex, $callback, $subject, flags: $flagOption);
        break;
    default:
        $result = false;
}

renderJsonContent(compact('result', 'matches'));