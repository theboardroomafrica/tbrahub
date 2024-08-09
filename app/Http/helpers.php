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

function statusInfo($id = null)
{
    return ['Rejected', 'Approved'][$id] ?? 'Pending';
}

function statusColors($id)
{
    return ['danger', 'success'][$id] ?? 'gray';
}

function array2Html($v)
{
    if (is_array($v)) {
        $v = join(", ", array_map(fn($value) => filter_var($value, FILTER_VALIDATE_URL) ? "<a href='$value' class='underline' target='_blank'>$value</a>" : $value, $v));
    }
    return $v;
}

function gender()
{
    return ["Male", "Female"];
}

function skills()
{
    return ['Project Management', 'Data Analysis', 'Software Development', 'Graphic Design', 'Communication', 'Problem Solving', 'Time Management', 'Leadership', 'Customer Service', 'Marketing', 'Sales', 'Financial Analysis', 'Public Speaking', 'Writing', 'Teamwork', 'Critical Thinking', 'Negotiation', 'Creativity', 'Adaptability', 'Technical Support'];
}

function industries()
{
    return ['Technology', 'Healthcare', 'Finance', 'Education', 'Retail', 'Manufacturing', 'Construction', 'Transportation', 'Energy', 'Real Estate', 'Telecommunications', 'Media', 'Entertainment', 'Hospitality', 'Agriculture', 'Pharmaceuticals', 'Automotive', 'Food and Beverage', 'Aerospace', 'Logistics'];
}
