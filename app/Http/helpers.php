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

function interests()
{
    return ["Executive Programmes", "Networking", "Board Opportunities", "Personal Brand & Professional Presence", "Thought Leadership",];
}

function industries()
{
    return ['Technology', 'Healthcare', 'Finance', 'Education', 'Retail', 'Manufacturing', 'Construction', 'Transportation', 'Energy', 'Real Estate', 'Telecommunications', 'Media', 'Entertainment', 'Hospitality', 'Agriculture', 'Pharmaceuticals', 'Automotive', 'Food and Beverage', 'Aerospace', 'Logistics'];
}

function languageProfiencies()
{
    return ["Native", "Fluent", "Advanced", "Intermediate", "Beginner/basic command"];
}

function languages()
{
    return ["Mandarin Chinese", "Spanish", "English", "Hindi", "Arabic", "Bengali", "Portuguese", "Russian", "Japanese", "Punjabi", "German", "Javanese", "Korean", "Vietnamese", "French", "Telugu", "Marathi", "Turkish", "Tamil", "Urdu", "Italian", "Thai", "Gujarati", "Swahili", "Polish"];
}

function boardPositions()
{
    return ["Executive Director", "Non-Executive Director", "Chairperson", "Vice-Chairperson", "Board Observer", "Board Secretary", "Member - Board of Governance", "Member - Board of Trustees"];
}

function committees()
{
    return ["Audit", "Compensation (or Remuneration)", "Nominating (or Governance)", "Finance", "Risk Management.", "Strategy", "Executive", "Compliance", "Ethics", "Investment", "Technology", "Human Resources", "Public Relations/Communications", "Sustainability", "Legal", "Health and Safety", "Audit and Risk", "Charitable Giving", "Real Estate", "Diversity, Equity, and Inclusion (DEI)", "Crisis Management", "Learning and Development", "Customer/Client Relations", "Product Development", "Community Relations"];
}
