<?php
$currencies = [
    "USD", "AED", "AFN", "ALL", "AMD", "ANG", "AOA", "ARS", "AUD", "AWG",
    "AZN", "BAM", "BBD", "BDT", "BGN", "BIF", "BMD", "BND", "BOB", "BRL",
    "BSD", "BWP", "BYN", "BZD", "CAD", "CDF", "CHF", "CLP", "CNY", "COP",
    "CRC", "CVE", "CZK", "DJF", "DKK", "DOP", "DZD", "EGP", "ETB", "EUR",
    "FJD", "FKP", "GBP", "GEL", "GIP", "GMD", "GNF", "GTQ", "GYD", "HKD",
    "HNL", "HTG", "HUF", "IDR", "ILS", "INR", "ISK", "JMD", "JPY", "KES",
    "KGS", "KHR", "KMF", "KRW", "KYD", "KZT", "LAK", "LBP", "LKR", "LRD",
    "LSL", "MAD", "MDL", "MGA", "MKD", "MMK", "MNT", "MOP", "MUR", "MVR",
    "MWK", "MXN", "MYR", "MZN", "NAD", "NGN", "NIO", "NOK", "NPR", "NZD",
    "PAB", "PEN", "PGK", "PHP", "PKR", "PLN", "PYG", "QAR", "RON", "RSD",
    "RUB", "RWF", "SAR", "SBD", "SCR", "SEK", "SGD", "SHP", "SLE", "SOS",
    "SRD", "STD", "SZL", "THB", "TJS", "TOP", "TRY", "TTD", "TWD", "TZS",
    "UAH", "UGX", "UYU", "UZS", "VND", "VUV", "WST", "XAF", "XCD", "XOF",
    "XPF", "YER", "ZAR", "ZMW"
];

$currencies_text = [
    "USD" => "United States Dollar",
    "AED" => "United Arab Emirates Dirham",
    "AFN" => "Afghan Afghani",
    "ALL" => "Albanian Lek",
    "AMD" => "Armenian Dram",
    "ANG" => "Netherlands Antillean Guilder",
    "AOA" => "Angolan Kwanza",
    "ARS" => "Argentine Peso",
    "AUD" => "Australian Dollar",
    "AWG" => "Aruban Florin",
    "AZN" => "Azerbaijani Manat",
    "BAM" => "Bosnia-Herzegovina Convertible Mark",
    "BBD" => "Barbadian Dollar",
    "BDT" => "Bangladeshi Taka",
    "BGN" => "Bulgarian Lev",
    "BIF" => "Burundian Franc",
    "BMD" => "Bermudian Dollar",
    "BND" => "Brunei Dollar",
    "BOB" => "Bolivian Boliviano",
    "BRL" => "Brazilian Real",
    "BSD" => "Bahamian Dollar",
    "BWP" => "Botswana Pula",
    "BYN" => "Belarusian Ruble",
    "BZD" => "Belize Dollar",
    "CAD" => "Canadian Dollar",
    "CDF" => "Congolese Franc",
    "CHF" => "Swiss Franc",
    "CLP" => "Chilean Peso",
    "CNY" => "Chinese Yuan",
    "COP" => "Colombian Peso",
    "CRC" => "Costa Rican Colón",
    "CVE" => "Cape Verdean Escudo",
    "CZK" => "Czech Koruna",
    "DJF" => "Djiboutian Franc",
    "DKK" => "Danish Krone",
    "DOP" => "Dominican Peso",
    "DZD" => "Algerian Dinar",
    "EGP" => "Egyptian Pound",
    "ETB" => "Ethiopian Birr",
    "EUR" => "Euro",
    "FJD" => "Fijian Dollar",
    "FKP" => "Falkland Islands Pound",
    "GBP" => "British Pound Sterling",
    "GEL" => "Georgian Lari",
    "GIP" => "Gibraltar Pound",
    "GMD" => "Gambian Dalasi",
    "GNF" => "Guinean Franc",
    "GTQ" => "Guatemalan Quetzal",
    "GYD" => "Guyanese Dollar",
    "HKD" => "Hong Kong Dollar",
    "HNL" => "Honduran Lempira",
    "HTG" => "Haitian Gourde",
    "HUF" => "Hungarian Forint",
    "IDR" => "Indonesian Rupiah",
    "ILS" => "Israeli New Shekel",
    "INR" => "Indian Rupee",
    "ISK" => "Icelandic Króna",
    "JMD" => "Jamaican Dollar",
    "JPY" => "Japanese Yen",
    "KES" => "Kenyan Shilling",
    "KGS" => "Kyrgyzstani Som",
    "KHR" => "Cambodian Riel",
    "KMF" => "Comorian Franc",
    "KRW" => "South Korean Won",
    "KYD" => "Cayman Islands Dollar",
    "KZT" => "Kazakhstani Tenge",
    "LAK" => "Lao Kip",
    "LBP" => "Lebanese Pound",
    "LKR" => "Sri Lankan Rupee",
    "LRD" => "Liberian Dollar",
    "LSL" => "Lesotho Loti",
    "MAD" => "Moroccan Dirham",
    "MDL" => "Moldovan Leu",
    "MGA" => "Malagasy Ariary",
    "MKD" => "Macedonian Denar",
    "MMK" => "Burmese Kyat",
    "MNT" => "Mongolian Tögrög",
    "MOP" => "Macanese Pataca",
    "MUR" => "Mauritian Rupee",
    "MVR" => "Maldivian Rufiyaa",
    "MWK" => "Malawian Kwacha",
    "MXN" => "Mexican Peso",
    "MYR" => "Malaysian Ringgit",
    "MZN" => "Mozambican Metical",
    "NAD" => "Namibian Dollar",
    "NGN" => "Nigerian Naira",
    "NIO" => "Nicaraguan Córdoba",
    "NOK" => "Norwegian Krone",
    "NPR" => "Nepalese Rupee",
    "NZD" => "New Zealand Dollar",
    "PAB" => "Panamanian Balboa",
    "PEN" => "Peruvian Sol",
    "PGK" => "Papua New Guinean Kina",
    "PHP" => "Philippine Peso",
    "PKR" => "Pakistani Rupee",
    "PLN" => "Polish Złoty",
    "PYG" => "Paraguayan Guarani",
    "QAR" => "Qatari Riyal",
    "RON" => "Romanian Leu",
    "RSD" => "Serbian Dinar",
    "RUB" => "Russian Ruble",
    "RWF" => "Rwandan Franc",
    "SAR" => "Saudi Riyal",
    "SBD" => "Solomon Islands Dollar",
    "SCR" => "Seychellois Rupee",
    "SEK" => "Swedish Krona",
    "SGD" => "Singapore Dollar",
    "SHP" => "Saint Helena Pound",
    "SLE" => "Sierra Leonean Leone",
    "SOS" => "Somali Shilling",
    "SRD" => "Surinamese Dollar",
    "STD" => "São Tomé and Príncipe Dobra",
    "SZL" => "Eswatini Lilangeni",
    "THB" => "Thai Baht",
    "TJS" => "Tajikistani Somoni",
    "TOP" => "Tongan Paʻanga",
    "TRY" => "Turkish Lira",
    "TTD" => "Trinidad and Tobago Dollar",
    "TWD" => "New Taiwan Dollar",
    "TZS" => "Tanzanian Shilling",
    "UAH" => "Ukrainian Hryvnia",
    "UGX" => "Ugandan Shilling",
    "UYU" => "Uruguayan Peso",
    "UZS" => "Uzbekistani Soʻm",
    "VND" => "Vietnamese đồng",
    "VUV" => "Vanuatu Vatu",
    "WST" => "Samoan Tala",
    "XAF" => "Central African CFA Franc",
    "XCD" => "East Caribbean Dollar",
    "XOF" => "West African CFA Franc",
    "XPF" => "CFP Franc",
    "YER" => "Yemeni Rial",
    "ZAR" => "South African Rand",
    "ZMW" => "Zambian Kwacha"
];