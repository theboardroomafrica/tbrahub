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

function memberCv()
{
    return "Digital Opportunity Trust logo\n\nPlatform Product Consultant\n\nDigital Opportunity Trust · ContractDigital Opportunity Trust · Contract\n\nJun 2024 - Present · 7 mosJun 2024 to Present · 7 mos\n\nRemoteRemote\n\nMicrosoft logo\n\nPrincipal Software Engineer\n\nMicrosoft · Full-timeMicrosoft · Full-time\n\nApr 2022 - May 2024 · 2 yrs 2 mosApr 2022 to May 2024 · 2 yrs 2 mos\n\nLogiciel Limited logo\n\nSoftware Development Consultant\n\nLogiciel Ghana LimitedLogiciel Ghana Limited\n\nFeb 2021 - Feb 2023 · 2 yrs 1 moFeb 2021 to Feb 2023 · 2 yrs 1 mo\n\nAccra, Greater Accra, Ghana · RemoteAccra, Greater Accra, Ghana · Remote\n\nGlobal Disability Innovation Hub logo\n\nConsultant\n\nGlobal Disability Innovation HubGlobal Disability Innovation Hub\n\nOct 2020 - Sep 2022 · 2 yrsOct 2020 to Sep 2022 · 2 yrs\n\nChief Executive Officer\n\nByte The Bits · Full-timeByte The Bits · Full-time\n\nMar 2021 - Apr 2022 · 1 yr 2 mosMar 2021 to Apr 2022 · 1 yr 2 mos\n\nGreater Accra, GhanaGreater Accra, Ghana\n\n At Byte The Bits, our mission is to build such solutions which would be used to fetch and analyze data in such a manner that it would be easy to understand, impactful, and like a good story, leave a lasting impression.\n\nCo-Founder and Chief Technical Officer\n\nLogicielLogiciel\n\nApr 2011 - Feb 2021 · 9 yrs 11 mosApr 2011 to Feb 2021 · 9 yrs 11 mos\n\nAccraAccra\n\nI am the architect of the gKudi Microfinance Platform, a clouded banking system for the microfinance industry, currently being used by over 60 MFI's across Ghana.\n\nBoard Member\n\nNational Communications Authority National Communications Authority \n\nFeb 2014 - Nov 2016 · 2 yrs 10 mosFeb 2014 to Nov 2016 · 2 yrs 10 mos\n\nGhanaGhana\n\nG-LIFE FINANCIAL SERVICES logo\n\nG-Life Financial Services\n\n2 yrs 11 mos2 yrs 11 mos\n\nIT Consultant\n\nMar 2011 - Jan 2013 · 1 yr 11 mosMar 2011 to Jan 2013 · 1 yr 11 mos\n\nDevelop and maintain the IT infrastructure of G-Life FSL.\n\nHead of IT\n\nMar 2010 - Jul 2011 · 1 yr 5 mosMar 2010 to Jul 2011 · 1 yr 5 mos\n\nG-Life FSL is a technology-centered microfinance institution offering banking services to the informal sector and the first institution to successfully implement mobile phone banking in the country. \n\nI manage the company's IT infrastructure and design and develop solutions to monitor the cash mobilization by the field agents across the country.\n\nG-Life FSL is a technology-centered microfinance institution offering banking services to the informal sector and the first institution to successfully implement mobile phone banking in the country. I manage the company's IT infrastructure and design and develop solutions to monitor the cash mobilization by the field agents across the country.\n\nSenior Software Architect\n\nRancard SolutionsRancard Solutions\n\nMar 2001 - Feb 2010 · 9 yrsMar 2001 to Feb 2010 · 9 yrs\n\nRancard Solutions developed and manages Rancardmobility.com - a system which interfaces with mobile operators and content providers around the world and uses a highly sophisticated platform to hide the complexity involved in creating, deploying and managing mobile value added services. Clients include Tigo Ghana, Vodafone (Ghana), Kasapa (Ghana),Zain Ghana, MTN Ghana, MTN Nigeria, etc, BBC, MTV, Google, etc...\n\nMy job there entailed:\n\n• Development and maintenance of platform for Value Added Services (VAS) for mobile phone networks (configuring short codes, etc).\n\n• Connecting Mobile Network Operators and content providers on to rancardmobility.com\n\n• Developing VAS applications\n\n• Generating monthly, quarterly and yearly reports \n\n depicting messaging statistics for both networks and content providers\n\n• Troubleshooting and resolving connectivity problems with clients\n\nRancard Solutions developed and manages Rancardmobility.com - a system which interfaces with mobile operators and content providers around the world and uses a highly sophisticated platform to hide the complexity involved in creating, deploying and managing mobile value added services. Clients include Tigo Ghana, Vodafone (Ghana), Kasapa (Ghana),Zain Ghana, MTN Ghana, MTN Nigeria, etc, BBC, MTV, Google, etc... My job there entailed: • Development and maintenance of platform for Value Added Services (VAS) for mobile phone networks (configuring short codes, etc). • Connecting Mobile Network Operators and content providers on to rancardmobility.com • Developing VAS applications • Generating monthly, quarterly and yearly reports depicting messaging statistics for both networks and content providers • Troubleshooting and resolving connectivity problems with clients\n\nprogrammer\n\nsoft companysoft company\n\n1998 - 2001 · 3 yrs\n\n";
}

function richEditorButtons()
{
    return ['bold', 'bulletList', 'italic', 'link', 'orderedList'];
}

function assistantId()
{
    return 'asst_METMOpNm0R2mRDGgWn4MQOCI';
}
