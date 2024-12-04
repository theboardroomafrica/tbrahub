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
    return "MTN \n\nGroup Chief Commercial Officer (GCCO)\n\nGroup Chief Commercial Officer (GCCO)\n\nMTN · Full-timeMTN · Full-time\n\nApr 2024 - Present · 9 mosApr 2024 to Present · 9 mos\n\nSouth Africa · On-siteSouth Africa · On-site\n\nDigital Impact Alliance \n\nMember of the Board of Directors\n\nMember of the Board of Directors\n\nDigital Impact Alliance (DIAL) at the United Nations FoundationDigital Impact Alliance (DIAL) at the United Nations Foundation\n\nOct 2016 - Present · 8 yrs 3 mosOct 2016 to Present · 8 yrs 3 mos\n\nWashington DCWashington DC\n\nMember of the Board of Directors\n\nMember of the Board of Directors\n\nSahel Grains Ghana Ltd.Sahel Grains Ghana Ltd.\n\nJul 2012 - Present · 12 yrs 6 mosJul 2012 to Present · 12 yrs 6 mos\n\nAccra, GhanaAccra, Ghana\n\nMTN Ghana \n\nChief Executive Officer (CEO)\n\nChief Executive Officer (CEO)\n\nMTN GhanaMTN Ghana\n\nJun 2018 - Mar 2024 · 5 yrs 10 mosJun 2018 to Mar 2024 · 5 yrs 10 mos\n\nGhanaGhana\n\nWomen's World Banking Ghana \n\nMember of the Board of Directors\n\nMember of the Board of Directors\n\nWomen's World Banking GhanaWomen's World Banking Ghana\n\nNov 2012 - Oct 2019 · 7 yrsNov 2012 to Oct 2019 · 7 yrs\n\nAccra, GhanaAccra, Ghana\n\nDigicel Group \n\nDigicel Group\n\nDigicel Group\n\n3 yrs 4 mos3 yrs 4 mos\n\nChief Executive Officer (CEO)\n\nChief Executive Officer (CEO)\n\nMar 2016 - Mar 2018 · 2 yrs 1 moMar 2016 to Mar 2018 · 2 yrs 1 mo\n\nResponsible for executing on a Growth Strategy to continue the turnaround of the current business. Commercial portfolio includes Legacy (Voice and SMS), Data, VAS, MFS, Business / Enterprise Solutions, and Cable TV.\n\nResponsible for executing on a Growth Strategy to continue the turnaround of the current business. Commercial portfolio includes Legacy (Voice and SMS), Data, VAS, MFS, Business / Enterprise Solutions, and Cable TV.\n\nChief Operations Officer (COO)\n\nChief Operations Officer (COO)\n\nMay 2015 - Feb 2016 · 10 mosMay 2015 to Feb 2016 · 10 mos\n\nP&L Responsibility for Mobile (Prepaid, Postpaid and Data), Mobile Financial Services (MFS), Value-Added Services (VAS), Marketing, Sales and Distribution. Also responsible for Commercial BI, Commercial Operations and Customer Care, with a total team size of 650.\n\nP&L Responsibility for Mobile (Prepaid, Postpaid and Data), Mobile Financial Services (MFS), Value-Added Services (VAS), Marketing, Sales and Distribution. Also responsible for Commercial BI, Commercial Operations and Customer Care, with a total team size of 650.\n\nGlobal Director for Mobile Financial Services (MFS)\n\nGlobal Director for Mobile Financial Services (MFS)\n\nDec 2014 - May 2015 · 6 mosDec 2014 to May 2015 · 6 mos\n\nResponsible for the Mobile Financial Services (MFS) business P&L across Digicel’s 30+ markets in the Caribbean, Central America and Southern Pacific regions.\n\nRole involves establishing a new global BU, developing and executing the global MFS strategy, launching of new markets, and developing innovations to drive the mobile payments ecosystem in the Caribbean, Central America and Southern Pacific regions.\n\nResponsible for the Mobile Financial Services (MFS) business P&L across Digicel’s 30+ markets in the Caribbean, Central America and Southern Pacific regions. Role involves establishing a new global BU, developing and executing the global MFS strategy, launching of new markets, and developing innovations to drive the mobile payments ecosystem in the Caribbean, Central America and Southern Pacific regions.\n\nMillicom (Tigo) \n\nMillicom International Cellular (MICC / Tigo)\n\nMillicom International Cellular (MICC / Tigo)\n\n3 yrs 10 mos3 yrs 10 mos\n\nChief Commercial Officer and Head of Mobile Financial Services (MFS)\n\nChief Commercial Officer and Head of Mobile Financial Services (MFS)\n\nJun 2014 - Nov 2014 · 6 mosJun 2014 to Nov 2014 · 6 mos\n\nResponsible for the Product P&L for Tigo / Millicom, Ghana. Portfolio includes Voice, SMS, Data, Content, Solutions and Mobile Financial Services (MFS) / Tigo Cash.\n\nSpecific responsibilities include Strategic Planning, Product Lifecycle Management, Product Innovation, Design and Development and Product Portfolio Management (i.e., Product P&L Responsibility).\n\nResponsible for the Product P&L for Tigo / Millicom, Ghana. Portfolio includes Voice, SMS, Data, Content, Solutions and Mobile Financial Services (MFS) / Tigo Cash. Specific responsibilities include Strategic Planning, Product Lifecycle Management, Product Innovation, Design and Development and Product Portfolio Management (i.e., Product P&L Responsibility).\n\nHead of Mobile Financial Services (MFS)\n\nHead of Mobile Financial Services (MFS)\n\nJul 2011 - Jun 2014 · 3 yrsJul 2011 to Jun 2014 · 3 yrs\n\nGhanaGhana\n\nResponsible for the establishment of a new business unit and for the development of all financial services related products at Tigo / Millicom, Ghana. \n\nThe portfolio of MFS products currently includes Tigo Cash (our mobile money product); Tigo Family Care Insurance (Ghana's first mobile insurance product), and our Zero Balance Product Portfolio etc.\n\nResponsible for the establishment of a new business unit and for the development of all financial services related products at Tigo / Millicom, Ghana. The portfolio of MFS products currently includes Tigo Cash (our mobile money product); Tigo Family Care Insurance (Ghana's first mobile insurance product), and our Zero Balance Product Portfolio etc.\n\nHead of Product Innovation / Product Innovation Mgr.\n\nHead of Product Innovation / Product Innovation Mgr.\n\nFeb 2011 - Jul 2011 · 6 mosFeb 2011 to Jul 2011 · 6 mos\n\nGhanaGhana\n\nResponsible for the development of incremental and transformational growth initiatives through product innovation to provide alternative avenues of revenue for Millicom / Tigo's Ghana operation beyond its current core business.\n\nResponsible for the development of incremental and transformational growth initiatives through product innovation to provide alternative avenues of revenue for Millicom / Tigo's Ghana operation beyond its current core business.\n\nL.E.K. Consulting \n\nManager\n\nManager\n\nL.E.K. ConsultingL.E.K. Consulting\n\nAug 2007 - Mar 2011 · 3 yrs 8 mosAug 2007 to Mar 2011 · 3 yrs 8 mos\n\nProvide transaction support services on Private Equity and M&amp;A deals as well as develop strategic solutions for Fortune 500 companies across several industries such as Biotechnology, Transportation, Manufacturing, Financial Services etc.\n\nProvide transaction support services on Private Equity and M&amp;A deals as well as develop strategic solutions for Fortune 500 companies across several industries such as Biotechnology, Transportation, Manufacturing, Financial Services etc.\n\nTechnoServe \n\nVolunteer Consultant\n\nVolunteer Consultant\n\nTechnoServeTechnoServe\n\nJun 2007 - Aug 2007 · 3 mosJun 2007 to Aug 2007 · 3 mos\n\nPerformed due diligence on the Ghana Salt industry and developed a growth investment analysis for consideration by the Ghana government.\n\nPerformed due diligence on the Ghana Salt industry and developed a growth investment analysis for consideration by the Ghana government.\n\nAvaya \n\nSummer Associate\n\nSummer Associate\n\nAvaya Inc.Avaya Inc.\n\nMay 2006 - Aug 2006 · 4 mosMay 2006 to Aug 2006 · 4 mos\n\nDeveloped global R&D investment analysis and an emerging markets competitive analysis.\n\nDeveloped global R&D investment analysis and an emerging markets competitive analysis.\n\nHewlett Packard Enterprise \n\nTechnology Consultant\n\nTechnology Consultant\n\nHewlett-Packard LtdHewlett-Packard Ltd\n\nJan 2001 - Jul 2005 · 4 yrs 7 mosJan 2001 to Jul 2005 · 4 yrs 7 mos\n\nDesigned large scale telecoms and call centre solutions for Vodafone, O2, Hutchison 3G etc. as well as designed and deployed the data communications solution for the world's largest internet cafe chain.";
}
