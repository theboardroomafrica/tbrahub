<?php

function json2Html($jsonContent)
{
    $content = '<div class="text-sm">';
    foreach ($jsonContent as $item) {
        if (empty($item["value"])) continue;
        $content .= "<p><b>{$item['title']}</b><br/>" . array2Html($item["value"]) . "</p><br/>";
    }
    $content .= "</div>";

    return $content;
}

function array2Html($v)
{
    if (is_array($v)) {
        $v = join(", ", array_map(fn($value) => filter_var($value, FILTER_VALIDATE_URL) ? "<a href='$value' class='underline' target='_blank'>$value</a>" : $value, $v));
    }
    return $v;
}
