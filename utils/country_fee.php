<?php  

/**
 *  NULL -> FREE
 */

use function PHPSTORM_META\map;

 define("ADMIN_PORTAL_FEE", 30);
 define("BIOMETRICS_FEE", 90);
 define("IMMIGRATION_FEE", 200);
 define("VAT", 7.5);
 define("TAX_US", 1.9914);

$country_fee = [
    'afghanistan' => null,
    'albania' => 60,
    'algeria' => 50,
    'andorra' => 68,
    'angola' => 2,
    'antigua and barbuda' => 148,
    'argentina' => 60,
    'armenia' => 60,
    'australia' => 141,
    'austria' => 88,
    'azerbaijan' => 78,
    'bahamas' => 19,
    'bahrain' => 45,
    'bangladesh' => 253,
    'barbados' => null,
    'belarus' => 68,
    'belgium' => 88,
    'belize' => 200,
    'benin' => 0,
    'bhutan' => 68,
    'bolivia' => 2,
    'bosnia and herzegovina' => 50,
    'botswana' => 114,
    'brazil' => 20,
    'brunei' => 45,
    'bulgaria' => 50,
    'burkina faso ' => 0,
    'burundi' => 100,
    'cambodia' => 68,
    'cameroon' => 3,
    'canada' => 75,
    'cape verde' => 0,
    'central african republic' => 67,
    'chad' => 3,
    'chile' => 200,
    'china' => 64,
    'colombia' => 3,
    'comoros' => 20,
    'congo' => 111,
    'israel' => 169,
    'italy' => 88,
    'jamaica' => 20,
    'japan' => 36,
    'jordan' => 50,
    'kazakhstan' => 60,
    'kiribati' => 3,
    'kosovo' => 50,
    'kuwait' => 3,
    'kyrgyzstan' => 60,
    'laos' => 4,
    'latvia' => 60,
    'lebanon' => 100,
    'lesotho' => 64,
    'liberia' => null,
    'libya' => 26,
    'liechtenstein' => 68,
    'lithuania' => 60,
    'luxembourg' => 88,
    'macedonia' => null,
    'madagascar' => 3,
    'malawi' => 39,
    'malaysia' => 6,
    'maldives' => 2,
    'mali' => 0,
    'marshall islands' => 65,
    'mauritania' => 58,
    'mexico' => 32,
    'moldova' => 60,
    'monaco' => 2,
    'mongolia' => 26,
    'morocco' => 89,
    'mozambique' => 50,
    'myanmar' => 2,
    'namibia' => 66,
    'nauru' => 4,
    'nepal' => 39,
    'netherlands' => 88,
    'new zealand' => 2,
    'nicaragua' => 2,
    'niger' => 0,
    'north korea' => 46,
    'norway' => 4,
    'oman' => 46,
    'pakistan' => 68,
    'palau' => 3,
    'panama' => 2,
    'papua new guinea' => 2,
    'paraguay' => 2,
    'peru' => 2,
    'philippines' => 39,
    'poland' => 51,
    'portugal' => 73,
    'qatar' => 4,
    'romania' => 100,
    'russia' => 84,
    'rwanda' => 4,
    'saint kitts and nevis' => 19,
    'saint lucia' => 19,
    'saint vincent and the grenadines' => 19,
    'samoa' => 3,
    'san marino' => 3,
    'sao tome and principe' => 50,
    'saudi arabia' => 46,
    'senegal' => 0,
    'serbia' => 50,
    'seychelles' => 4,
    'sierra leone' => null,
    'singapore' => null,
    'slovakia' => 50,
    'slovania' => 50,
    'solomon islands' => 2,
    'somalia' => 3,
    'south africa' => 58,
    'south korea' => 30,
    'spain' => 95,
    'sri lanka' => 40,
    'sudan' => 2,
    'suriname' => 40,
    'swaziland' => 58,
    'sweden' => 78,
    'switzerland' => 68,
    'syria' => 46,
    'taiwan' => 50,
    'tajikistan' => 68,
    'tanzania' => 29,
    'thailand' => 14,
    'timor-leste' => 68,
    'togo' => 0,
    'tonga' => 64,
    'trinidad and tobago' => null,
    'tunisia' => 32,
    'turkey' => 32,
    'turkmenistan' => 60,
    'tuvalu' => 3,
    'uganda' => 2,
    'ukraine' => 52,
    'united arab emirates' => 150,
    'uruguay' => 60,
    'uzbekistan' => 60,
    'vanuatu' => 3,
    'vatican' => 88,
    'venezuela' => 50,
    'vietnam' => 68,
    'western sahara' => 2,
    'yemen' => 46,
    'zambia' => 6,
    'zimbabwe' => 50,
    'united kingdom' => 144,
    'united states' => 160,
    'kenya' => 25
];

ksort($country_fee);

$titles = ["Master", "Mr", "Miss", "Mrs"];


function get_visa_price($country) {
    global $country_fee;

    if($country){
        return $country_fee[strtolower($country)];
    }
    return null;
}


function get_share_price($shares) {
    $def_price = 800;
    $price = ($shares * $def_price) / 10000000;
    return $price;
}


function get_bi_price ($shares = 10000000) {
    $price = get_share_price($shares);
    $taxes =  $price * ((VAT + TAX_US) / 100);
    $total = $price + $taxes;

    return [
        'tax' => $taxes,
        'total' => $total,
        'price' => $price
    ];
}

function get_twp () {
    $taxes = IMMIGRATION_FEE * ((VAT + TAX_US) / 100);
    $total = IMMIGRATION_FEE + $taxes;

    return [
        "approval" => IMMIGRATION_FEE,
        "tax" => $taxes,
        "total" => $total
    ];
}

function get_total_price($country) {
    $FREE_BIOMETRIC = ['usa'];
    $visa_price = get_visa_price($country);
    
    if(!$visa_price) return;
    
    $fees_total = 0;
    
    if(in_array($country, $FREE_BIOMETRIC)){
        $fees_total = $visa_price + ADMIN_PORTAL_FEE + IMMIGRATION_FEE;
    }
    else{
        $fees_total = $visa_price + BIOMETRICS_FEE + ADMIN_PORTAL_FEE + IMMIGRATION_FEE;
    }
    
    $taxes = $fees_total * ((VAT + TAX_US) / 100);
    $total_price = $fees_total + $taxes;

    $bio = in_array($country, $FREE_BIOMETRIC) ? 0 : BIOMETRICS_FEE;
    
    return [
        'bio' => $bio,
        'visa' => $visa_price,
        'vat' => VAT,
        'Immgration' => IMMIGRATION_FEE,
        'admin' => ADMIN_PORTAL_FEE,
        'total_price' => $total_price,
        'taxes' => $taxes,
        'fees_total' => $fees_total
    ];
}