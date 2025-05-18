<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use Carbon\Carbon;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data =[[
            'country_iso_code' => 'AF',
            'country_name_english' => 'Afghanistan',
            'country_name_bangla' =>'আফগানিস্তান',
            'country_people_english' => 'Afghanistan',
            'country_people_bangla' => 'আফগান'

        ],
        [

            'country_iso_code' => "AL",
            'country_name_english' => "Albania",
            'country_name_bangla' => "আলবেনিয়া",
            'country_people_english' =>"Albanian",
            'country_people_bangla' =>"আলবেনিয়ান"
        ],
        [

            'country_iso_code' => "DZ",
            'country_name_english' => "Algeria",
            'country_name_bangla' =>"আলজেরিয়া",
            'country_people_english' => "Algerian",
            'country_people_bangla' => "আলজেরিয়ান"
        ],
        [

            'country_iso_code' =>  "AD",
            'country_name_english' =>  "Andorra",
            'country_name_bangla' =>"অ্যান্ডোরা",
            'country_people_english' =>"Andorran",
            'country_people_bangla' =>"অ্যান্ডোরান"
        ],
        [

            'country_iso_code' =>  "AO",
            'country_name_english' => "Angola",
            'country_name_bangla' => "অ্যাঙ্গোলা",
            'country_people_english' => "Angolan",
           'country_people_bangla' => "অ্যাঙ্গোলান"
        ],
        [

            'country_iso_code' =>  "AG",
            'country_name_english' => "Antigua and Barbuda",
            'country_name_bangla' =>"অ্যান্টিগুয়া ও বার্বুডা",
            'country_people_english' =>  "Antiguan and Barbudan",
            'country_people_bangla' =>"অ্যান্টিগুয়ান এবং বারবুডান"
        ],
        [

            'country_iso_code' =>  "AR",
            'country_name_english' => "Argentina",
            'country_name_bangla' =>"আর্জেন্টিনা",
            'country_people_english' => "Argentinian",
            'country_people_bangla' =>"আর্জেন্টিনীয়"
        ],
        [

            'country_iso_code' =>  "AM",
            'country_name_english' => "Armenia",
            'country_name_bangla' =>"আর্মেনিয়া",
            'country_people_english' =>"Armenian",
            'country_people_bangla' =>"আর্মেনিয়ান"
        ],
        [

            'country_iso_code' =>  "AW",
            'country_name_english' => "Aruba",
            'country_name_bangla' =>"আরুবা",
            'country_people_english' =>"Aruban",
            'country_people_bangla' =>"আরুবান"
        ],
        [

            'country_iso_code' =>  "AU",
            'country_name_english' => "Australia",
            'country_name_bangla' =>"অস্ট্রেলিয়া",
            'country_people_english' =>"Australian",
            'country_people_bangla' =>"অস্ট্রেলিয়ান"
        ],
        [

            'country_iso_code' =>  "AT",
            'country_name_english' => "Austria",
            'country_name_bangla' =>"অস্ট্রিয়া",
            'country_people_english' =>"Austrian",
            'country_people_bangla' =>"অস্ট্রিয়ান"
        ],
        [

            'country_iso_code' =>  "AZ",
            'country_name_english' => "Azerbaijan",
            'country_name_bangla' =>"আজারবাইজান",
            'country_people_english' =>"Azerbaijani",
            'country_people_bangla' =>"আজারবাইজানি"
        ],
        [

            'country_iso_code' =>  "BS",
            'country_name_english' => "Bahamas",
            'country_name_bangla' =>"বাহামাস",
            'country_people_english' =>"Bahamian",
            'country_people_bangla' =>"বাহামিয়ান"
        ],
        [

            'country_iso_code' => "BH",
            'country_name_english' => "Bahrain",
            'country_name_bangla' =>"বাহরাইন",
            'country_people_english' =>"Bahraini",
           'country_people_bangla' => "বাহরাইনি"
        ],
        [

            'country_iso_code' => "BD",
            'country_name_english' => "Bangladesh",
            'country_name_bangla' =>"বাংলাদেশ",
            'country_people_english' =>"Bangladeshi",
            'country_people_bangla' =>"বাংলাদেশী"
        ],
        [

            'country_iso_code' =>  "BB",
            'country_name_english' => "Barbados",
            'country_name_bangla' =>"বার্বাডোস",
            'country_people_english' =>"Barbadian",
            'country_people_bangla' =>"বার্বাডিয়ান"
        ],
        [

            'country_iso_code' => "BY",
            'country_name_english' => "Belarus",
            'country_name_bangla' =>"বেলারুস",
            'country_people_english' =>"Belarusian",
            'country_people_bangla' =>"বেলারুশিয়ান"
        ],
        [

            'country_iso_code' => "BE",
            'country_name_english' => "Belgium",
            'country_name_bangla' =>"বেলজিয়াম",
            'country_people_english' =>"Belgian",
           'country_people_bangla' => "বেলজিয়ান"
        ],
        [

            'country_iso_code' => "BZ",
            'country_name_english' => "Belize",
            'country_name_bangla' =>"বেলিজ",
            'country_people_english' =>"Belizean",
           'country_people_bangla' => "বেলিজিয়ান"
        ],
        [

            'country_iso_code' =>  "BJ",
            'country_name_english' => "Benin",
            'country_name_bangla' =>"বেনিন",
            'country_people_english' =>"Beninese",
            'country_people_bangla' =>"বেনিনীজ"
        ],
        [

            'country_iso_code' => "BT",
            'country_name_english' => "Bhutan",
            'country_name_bangla' =>"ভুটান",
            'country_people_english' =>"Bhutanese",
            'country_people_bangla' =>"ভুটানিজ"
        ],
        [

            'country_iso_code' => "BO",
            'country_name_english' => "Bolivia",
            'country_name_bangla' =>"বলিভিয়া",
            'country_people_english' =>"Bolivian",
            'country_people_bangla' =>"বলিভিয়ান"
        ],
        [

            'country_iso_code' =>  "BW",
            'country_name_english' => "Botswana",
            'country_name_bangla' => "বতসোয়ানা",
            'country_people_english' => "Batswana",
            'country_people_bangla' =>"বাতসোয়ানা"
        ],
        [

            'country_iso_code' => "BR",
            'country_name_english' => "Brazil",
            'country_name_bangla' =>"ব্রাজিল",
            'country_people_english' =>"Brazilian",
           'country_people_bangla' => "ব্রাজিলিয়ান"
        ],

        [

            'country_iso_code' => "BG",
            'country_name_english' => "Bulgaria",
            'country_name_bangla' =>"বুলগেরিয়া",
            'country_people_english' =>"Bulgarian",
           'country_people_bangla' => "বুলগেরিয়ান"

        ],

        [

            'country_iso_code' => "BI",
            'country_name_english' => "Burundi",
            'country_name_bangla' =>"বুরুন্ডি",
            'country_people_english' => "Umurundi",
            'country_people_bangla' =>"উমুরুন্ডি"
        ],
        [

            'country_iso_code' => "KH",
            'country_name_english' => "Cambodia",
            'country_name_bangla' => "কাম্বোডিয়া",
            'country_people_english' =>"Cambodian",
            'country_people_bangla' =>"কম্বোডিয়ান"
        ],
        [

            'country_iso_code' => "CM",
            'country_name_english' => "Cameroon",
            'country_name_bangla' => "ক্যামেরুন",
            'country_people_english' =>"Cameroonian",
            'country_people_bangla' =>"ক্যামেরুনিয়ান"

        ],
        [

            'country_iso_code' => "CA",
            'country_name_english' => "Canada",
            'country_name_bangla' =>"কানাডা",
            'country_people_english' =>"Canadian",
            'country_people_bangla' => "কানাডিয়ান"
        ],


        [

            'country_iso_code' => "CF",
            'country_name_english' => "CENTRAL AFRICAN REPUBLIC",
            'country_name_bangla' => "মধ্য আফ্রিকান প্রজাতন্ত্র",
            'country_people_english' =>"",
            'country_people_bangla' => ""
        ],
        [

            'country_iso_code' => "TD",
            'country_name_english' => "Chad",
            'country_name_bangla' => "চাদ",
            'country_people_english' =>"Chadian",
            'country_people_bangla' =>"চাদিয়ান"
        ],
        [

            'country_iso_code' => "CL",
            'country_name_english' => "Chile",
            'country_name_bangla' => "চিলি",
            'country_people_english' =>"Chilean",
            'country_people_bangla' =>"চিলিয়ান"
        ],
        [

            'country_iso_code' => "CN",
            'country_name_english' => "China",
            'country_name_bangla' =>"চীন",
            'country_people_english' =>"Chinese",
            'country_people_bangla' =>"চাইনিজ"
        ],


        [

            'country_iso_code' =>  "CO",
            'country_name_english' => "Colombia",
            'country_name_bangla' =>"কলম্বিয়া",
            'country_people_english' =>"Colombian",
            'country_people_bangla' =>"কলম্বিয়ান"
        ],
        [

            'country_iso_code' => "CG",
            'country_name_english' => "CONGO",
            'country_name_bangla' => "কঙ্গো",
            'country_people_english' =>"Congolese",
            'country_people_bangla' =>"কঙ্গোলিজ"
        ],

        [

            'country_iso_code' => "CR",
            'country_name_english' => "Costa Rica",
            'country_name_bangla' => "কোস্টারিকা",
           'country_people_english' => "Costa Rican",
           'country_people_bangla' =>"কোস্টারিকান"
        ],
        [

            'country_iso_code' => "HR",
            'country_name_english' => "Croatia",
            'country_name_bangla' =>"ক্রোয়েশিয়া",
            'country_people_english' =>"Croatian",
            'country_people_bangla' =>"ক্রোয়েশিয়ান"
        ],
        [

            'country_iso_code' => "CU",
            'country_name_english' => "Cuba",
            'country_name_bangla' => "কিউবা",
           'country_people_english' => "Cuban",
           'country_people_bangla' =>"কিউবান"
        ],
        [

            'country_iso_code' => "CY",
            'country_name_english' => "CYPRUS",
            'country_name_bangla' => "সাইপ্রাস",
            'country_people_english' =>"",
            'country_people_bangla' =>"",
        ],
        [

            'country_iso_code' => "CZ",
            'country_name_english' => "Czech Republic",
            'country_name_bangla' => "চেক প্রজাতন্ত্র",
            'country_people_english' =>"Czech",
            'country_people_bangla' =>"চেক"
        ],
        [

            'country_iso_code' => "DK",
            'country_name_english' => "Denmark",
            'country_name_bangla' =>"ডেনমার্ক",
           'country_people_english' => "Danish",
           'country_people_bangla' =>"ড্যানিশ"
        ],
        [

            'country_iso_code' => "DJ",
            'country_name_english' => "Djibouti",
            'country_name_bangla' =>"জিবুতি",
            'country_people_english' =>"Djiboutian",
            'country_people_bangla' =>"জিবুতিয়ান"
        ],
        [

            'country_iso_code' => "DM",
            'country_name_english' => "Dominica",
            'country_name_bangla' => "ডোমিনিকা",
            'country_people_english' =>"Dominican",
            'country_people_bangla' =>"ডোমিনিকান"
        ],
        [

            'country_iso_code' => "DO",
            'country_name_english' => "Dominican Republic",
            'country_name_bangla' =>"ডোমিনিকান রিপাবলিক",
           'country_people_english' => "Dominican",
           'country_people_bangla' =>"ডোমিনিকান"
        ],
        [

            'country_iso_code' => "EC",
            'country_name_english' => "Ecuador",
            'country_name_bangla' =>"ইকুয়েডর",
           'country_people_english' => "Ecuadorian",
           'country_people_bangla' =>"ইকুয়েডরিয়ান"
        ],
        [

            'country_iso_code' => "EG",
            'country_name_english' => "Egypt",
            'country_name_bangla' => "মিশর",
            'country_people_english' =>"Egyptian",
            'country_people_bangla' =>"মিশরীয়"
        ],
        [

            'country_iso_code' => "SV",
            'country_name_english' =>  "El Salvador",
            'country_name_bangla' => "এল সালভাদর",
            'country_people_english' =>"Salvadorian",
            "সালভাডোরিয়ান"
        ],
        [

            'country_iso_code' => "GQ",
            'country_name_english' =>  "Equatorial Guinea",
            'country_name_bangla' =>"বিষুবীয় গিনি",
            'country_people_english' =>"Equatoguinean",
            'country_people_bangla' => "বিষুবীযয়ান"
        ],
        [

            'country_iso_code' => "ER",
            'country_name_english' => "Eritrea",
            'country_name_bangla' => "ইরিত্রিয়া",
            'country_people_english' =>"Eritrean",
            'country_people_bangla' => "ইরিত্রিয়ান"
        ],
        [

            'country_iso_code' =>  "EE",
            'country_name_english' => "Estonia",
            'country_name_bangla' => "এস্তোনিয়া",
            'country_people_english' =>"Estonian",
             'country_people_bangla' =>"এস্তোনিয়ান"
        ],
        [

            'country_iso_code' => "ET",
            'country_name_english' =>  "Ethiopia",
            'country_name_bangla' => "ইথিওপিয়া",
            'country_people_english' =>"Ethiopian",
             'country_people_bangla' =>"ইথিওপিয়ান"
        ],
        [

            'country_iso_code' => "FJ",
            'country_name_english' => "Fiji",
            'country_name_bangla' => "ফিজি",
           'country_people_english' => "Fijian",
             'country_people_bangla' =>"ফিজিয়ান"
        ],
        [

            'country_iso_code' => "FI",
            'country_name_english' =>  "Finland",
            'country_name_bangla' => "ফিনল্যান্ড",
            'country_people_english' =>"Finnish",
             'country_people_bangla' =>"ফিনিশ"
        ],
        [

            'country_iso_code' => "FR",
            'country_name_english' => "France",
            'country_name_bangla' =>"ফ্রান্স",
            'country_people_english' =>"French",
             'country_people_bangla' =>"ফরাসি"
        ],
        [

            'country_iso_code' =>  "GA",
            'country_name_english' => "Gabon",
            'country_name_bangla' => "গ্যাবন",
            'country_people_english' =>"Gabonese",
            'country_people_bangla' => "গ্যাবোনিজ"
        ],
        [

            'country_iso_code' => "GM",
            'country_name_english' => "Gambia",
            'country_name_bangla' =>"গাম্বিয়া",
            'country_people_english' =>"Gambian",
             'country_people_bangla' =>"গাম্বিয়ান"

        ],
        [

            'country_iso_code' => "GE",
            'country_name_english' => "Georgia",
            'country_name_bangla' =>"জর্জিয়া",
            'country_people_english' =>"Georgian",
             'country_people_bangla' =>"জর্জিয়ান"
        ],
        [

            'country_iso_code' => "DE",
            'country_name_english' => "Germany",
            'country_name_bangla' => "জার্মানি",
            'country_people_english' =>"German",
             'country_people_bangla' =>"জার্মান"
        ],
        [

            'country_iso_code' =>  "GH",
            'country_name_english' => "Ghana",
            'country_name_bangla' =>"ঘানা",
            'country_people_english' =>"Ghanaian",
             'country_people_bangla' =>"ঘানাইয়ান"
        ],
        [

            'country_iso_code' => "GR",
            'country_name_english' => "Greece",
            'country_name_bangla' =>"গ্রীস",
            'country_people_english' =>"Greek",
             'country_people_bangla' =>"গ্রীক"
        ],
        [

            'country_iso_code' => "GL",
            'country_name_english' => "Greenland",
            'country_name_bangla' =>"গ্রীনল্যান্ড",
            'country_people_english' =>"Greenlander",
            'country_people_bangla' => "গ্রীনল্যান্ডার"
        ],
        [

            'country_iso_code' => "GD",
            'country_name_english' => "Grenada",
            'country_name_bangla' =>"গ্রেনাডা",
            'country_people_english' =>"Grenadian",
             'country_people_bangla' =>"গ্রেনাডিয়ান"
        ],
        [

            'country_iso_code' => "GT",
            'country_name_english' => "Guatemala",
            'country_name_bangla' => "গুয়াতেমালা",
            'country_people_english' =>"Guatemalan",
             'country_people_bangla' =>"গুয়াতেমালান"
        ],
        [

            'country_iso_code' => "GN",
            'country_name_english' => "Guinea",
            'country_name_bangla' =>"গিনি",
            'country_people_english' =>"Guinean",
             'country_people_bangla' =>"গিনিয়ান"
        ],
        [

            'country_iso_code' => "GW",
            'country_name_english' => "Guinea-Bissau",
            'country_name_bangla' => "গিনি-বিসাউ",
            'country_people_english' =>"Bissau-Guinean",
             'country_people_bangla' =>"বিসাউ-গুইনিয়ান"
        ],
        [

            'country_iso_code' => "GY",
            'country_name_english' => "Guyana",
            'country_name_bangla' => "গায়ানা",
            'country_people_english' =>"Guyanese",
             'country_people_bangla' =>"গায়ানিজ"
        ],
        [

            'country_iso_code' => "HT",
            'country_name_english' => "Haiti",
            'country_name_bangla' => "হাইতি",
            'country_people_english' =>"Haitian",
             'country_people_bangla' =>"হাইতিয়ান"
        ],
        [

            'country_iso_code' => "VA",
            'country_name_english' => "Vatican City",
            'country_name_bangla' =>"ভ্যাটিকান সিটি",
            'country_people_english' =>"Vaticanian",
             'country_people_bangla' =>"ভ্যাটিকানিয়ান"
        ],
        [

            'country_iso_code' => "HN",
            'country_name_english' => "Honduras",
            'country_name_bangla' =>"হন্ডুরাস",
            'country_people_english' =>"Honduran",
             'country_people_bangla' =>"হন্ডুরান"
        ],
        [

            'country_iso_code' => "HK",
            'country_name_english' => "Hong Kong",
            'country_name_bangla' =>"হংকং",
            'country_people_english' =>"Hongkonger",
            'country_people_bangla' => "হংকংগার"
        ],
        [

            'country_iso_code' => "HU",
            'country_name_english' => "Hungary",
            'country_name_bangla' =>"হাঙ্গেরি",
            'country_people_english' =>"Hungarian",
             'country_people_bangla' =>"হাঙ্গেরিয়ান"
        ],
        [

            'country_iso_code' => "IS",
            'country_name_english' => "Iceland",
            'country_name_bangla' =>"আইসল্যান্ড",
            'country_people_english' =>"Icelandic",
            'country_people_bangla' => "আইসল্যান্ডিক"
        ],
        [

            'country_iso_code' => "IN",
            'country_name_english' => "India",
            'country_name_bangla' => "ভারত",
            'country_people_english' =>"Indian",
            'country_people_bangla' => "ভারতীয়"
        ],
        [

            'country_iso_code' => "ID",
            'country_name_english' => "Indonesia",
            'country_name_bangla' =>"ইন্দোনেশিয়া",
            'country_people_english' =>"Indonesian",
             'country_people_bangla' =>"ইন্দোনেশিয়ান"

        ],
        [

            'country_iso_code' => "IR",
            'country_name_english' => "Iran",
            'country_name_bangla' =>"ইরান (ইসলামি প্রজাতন্ত্র)",
            'country_people_english' =>"Iranian",
             'country_people_bangla' =>"ইরানি"
        ],
        [

            'country_iso_code' => "IQ",
            'country_name_english' => "Iraq",
            'country_name_bangla' => "ইরাক",
            'country_people_english' =>"Iraqi",
             'country_people_bangla' =>"ইরাকি"
        ],
        [

            'country_iso_code' => "IE",
            'country_name_english' => "Ireland",
            'country_name_bangla' => "আয়ারল্যান্ড",
            'country_people_english' => "Irish",
            'country_people_bangla' => "আইরিশ"
        ],
        [

            'country_iso_code' => "IT",
            'country_name_english' => "Italy",
            'country_name_bangla' => "ইতালি",
            'country_people_english' =>"Italian",
            'country_people_bangla' =>"ইতালীয়"
        ],
        [

            'country_iso_code' => "JM",
            'country_name_english' => "Jamaica",
            'country_name_bangla' => "জামাইকা",
            'country_people_english' =>"Jamaican",
             'country_people_bangla' =>"জ্যামাইকান"
        ],
        [

            'country_iso_code' => "JP",
            'country_name_english' => "Japan",
            'country_name_bangla' => "জাপান",
            'country_people_english' => "Japanese",
            'country_people_bangla' => "জাপানিজ"
        ],
        [

            'country_iso_code' => "JO",
            'country_name_english' => "Jordan",
            'country_name_bangla' =>"জর্ডান",
            'country_people_english' => "Jordanian",
            'country_people_bangla' => "জর্ডানিয়ান"
        ],
        [

            'country_iso_code' => "KZ",
            'country_name_english' => "Kazakhstan",
            'country_name_bangla' =>"কাজাখস্তান",
            'country_people_english' =>"Kazakhstani",
            'country_people_bangla' => "কাজাখস্তানি"
        ],
        [

            'country_iso_code' => "KE",
            'country_name_english' => "Kenya",
            'country_name_bangla' =>"কেনিয়া",
            'country_people_english' =>"Kenyan",
            'country_people_bangla' => "কেনিয়ান"
        ],
        [

            'country_iso_code' => "KI",
            'country_name_english' => "Kiribati",
            'country_name_bangla' => "কিরিবাতি",
            'country_people_english' =>"I-Kiribati",
            'country_people_bangla' => "আই-কিরিবাতি"
        ],
        [

            'country_iso_code' => "KP",
            'country_name_english' => "South Korea",
            'country_name_bangla' =>"দক্ষিণ কোরিয়া",
            'country_people_english' =>"Korean",
            'country_people_bangla' => "কোরিয়ান"
        ],
        [

            'country_iso_code' => "NK",
            'country_name_english' => "North Korea",
            'country_name_bangla' => "উত্তর কোরিয়া",
            'country_people_english' => "Korean",
            'country_people_bangla' => "কোরিয়ান"
        ],
        [

            'country_iso_code' => "KR",
            'country_name_english' => "South Korea",
            'country_name_bangla' =>"দক্ষিণ কোরিয়া",
            'country_people_english' =>"South Korean",
            'country_people_bangla' =>"দক্ষিণ কোরীয়"
        ],
        [

            'country_iso_code' => "KW",
            'country_name_english' => "Kuwait",
            'country_name_bangla' => "কুয়েত",
            'country_people_english' =>"Kuwaiti",
            'country_people_bangla' => "কুয়েতি"
        ],
        [

            'country_iso_code' => "KG",
            'country_name_english' => "Kyrgyzstan",
            'country_name_bangla' =>"কিরগিজস্তান",
            'country_people_english' =>"Kyrgyz",
           'country_people_bangla' => "কিরগিজ"

        ],
        [

            'country_iso_code' => "LV",
            'country_name_english' => "Latvia",
            'country_name_bangla' =>"লাটভিয়া",
            'country_people_english' =>"Latvian",
            'country_people_bangla' =>"লাটভিয়ান"
        ],
        [

            'country_iso_code' => "LB",
            'country_name_english' =>  "Lebanon",
            'country_name_bangla' =>"লেবানন",
           'country_people_english' =>"Lebanese",
            'country_people_bangla' =>"লেবানিজ"

        ],
        [

            'country_iso_code' => "LS",
            'country_name_english' => "Lesotho",
            'country_name_bangla' =>"লেসোথো",
           'country_people_english' =>"Basotho",
            'country_people_bangla' =>"বাসোথো"
        ],
        [

            'country_iso_code' => "LR",
            'country_name_english' => "Liberia",
            'country_name_bangla' =>"লাইবেরিয়া",
            'country_people_english' =>"Liberian",
            'country_people_bangla' =>"লাইবেরিয়ান"
        ],
        [

            'country_iso_code' => "LY",
            'country_name_english' => "Libya",
            'country_name_bangla' =>"লিবিয়া",
            'country_people_english' =>"Libyan",
            'country_people_bangla' =>"লিবিয়ান"
        ],
        [

            'country_iso_code' => "LI",
            'country_name_english' => "Liechtenstein",
            'country_name_bangla' =>"লিচেনস্টেইন",
            'country_people_english' =>"Liechtensteiner",
            'country_people_bangla' =>"লিচেনস্টাইনার"
        ],
        [

            'country_iso_code' => "LT",
            'country_name_english' => "Lithuania",
            'country_name_bangla' =>"লিথুয়ানিয়া",
            'country_people_english' =>"Lithuanian",
            'country_people_bangla' =>"লিথুয়ানিয়ান"
        ],
        [

            'country_iso_code' => "LU",
            'country_name_english' => "Luxembourg",
            'country_name_bangla' =>"লুক্সেমবার্গ",
            'country_people_english' =>"Luxembourger",
            'country_people_bangla' =>"লুক্সেমবার্গার"
        ],
        [

            'country_iso_code' => "MK",
            'country_name_english' => "North Macedonia",
            'country_name_bangla' =>"উত্তর মেসিডোনিয়া",
            'country_people_english' =>"Macedonian",
            'country_people_bangla' =>"ম্যাসেডোনিয়ান"
        ],
        [

            'country_iso_code' => "MG",
            'country_name_english' => "Madagascar",
            'country_name_bangla' =>"মাদাগাস্কার",
            'country_people_english' =>"Malagasy",
            'country_people_bangla' =>"মালাগাসি"
        ],
        [

            'country_iso_code' => "MW",
            'country_name_english' => "Malawi",
            'country_name_bangla' =>"মালাউই",
            'country_people_english' =>"Malawian",
            'country_people_bangla' =>"মালাউইয়ান"
        ],[

            'country_iso_code' => "MY",
            'country_name_english' => "Malaysia",
            'country_name_bangla' =>"মালয়েশিয়া",
           'country_people_english' => "Malaysian",
            'country_people_bangla' =>"মালয়েশিয়ান"
        ],
        [

            'country_iso_code' => "MV",
            'country_name_english' => "Maldives",
            'country_name_bangla' =>"মালদ্বীপ",
           'country_people_english' => "Maldivian",
           'country_people_bangla' => "মালদ্বীপীয়"
        ],
        [

            'country_iso_code' => "ML",
            'country_name_english' => "Mali",
            'country_name_bangla' =>"মালি",
           'country_people_english' => "Malian",
           'country_people_bangla' =>"মালিয়ান"
        ],
        [

            'country_iso_code' => "MT",
            'country_name_english' => "Malta",
            'country_name_bangla' =>"মাল্টা",
           'country_people_english' => "Maltese",
           'country_people_bangla' => "মাল্টিজ"
        ],
        [

            'country_iso_code' => "MH",
            'country_name_english' => "Marshall Islands",
            'country_name_bangla' =>"মার্শাল দ্বীপপুঞ্জ",
            'country_people_english' =>"Marshallese",
           'country_people_bangla' => "মার্শালিজ"
        ],
        [

            'country_iso_code' => "MR",
            'country_name_english' => "Mauritania",
            'country_name_bangla' =>"মৌরিতানিয়া",
            'country_people_english' =>"Mauritanian",
            'country_people_bangla' =>"মৌরিতানিয়ান"
        ],
        [

            'country_iso_code' => "MU",
            'country_name_english' => "Mauritian",
            'country_name_bangla' =>"মরিশাস",
            'country_people_english' =>"Mauritian",
            'country_people_bangla' =>"মৌরিশিয়ান"
        ],
        [

            'country_iso_code' => "MX",
            'country_name_english' => "Mexico",
            'country_name_bangla' =>"মেক্সিকো",
            'country_people_english' =>"Mexican",
            'country_people_bangla' =>"মেক্সিকান"
        ],
        [

            'country_iso_code' => "MD",
            'country_name_english' => "Moldova",
            'country_name_bangla' =>"মলডোভা",
           'country_people_english' => "Moldovan",
            'country_people_bangla' =>"মলডোভান"
        ],
        [

            'country_iso_code' => "MC",
            'country_name_english' => "Monaco",
            'country_name_bangla' =>"মোনাকো",
            'country_people_english' =>"Monacan",
            'country_people_bangla' =>"মোনাকান"
        ],
        [

            'country_iso_code' => "MN",
            'country_name_english' => "Mongolia",
            'country_name_bangla' =>"মঙ্গোলিয়া",
            'country_people_english' =>"Mongolian",
            'country_people_bangla' =>"মঙ্গোলিয়ান"
        ],
        [

            'country_iso_code' => "MA",
            'country_name_english' => "Morocco",
            'country_name_bangla' =>"মরক্কো",
            'country_people_english' =>"Moroccan",
            'country_people_bangla' =>"মরক্কান"
        ],
        [

            'country_iso_code' => "MZ",
            'country_name_english' => "Mozambique",
            'country_name_bangla' =>"মোজাম্বিক",
            'country_people_english' =>"Mozambican",
            'country_people_bangla' =>"মোজাম্বিকান"

        ],
        [

            'country_iso_code' => "MM",
            'country_name_english' => "Myanmar",
            'country_name_bangla' =>"মায়ানমার",
            'country_people_english' =>"Myanma",
            'country_people_bangla' =>"মায়ানমা"
        ],
        [

            'country_iso_code' => "NA",
            'country_name_english' => "Namibia",
            'country_name_bangla' =>"নামিবিয়া",
            'country_people_english' =>"Namibian",
            'country_people_bangla' =>"নামিবিয়ান"
        ],
        [

            'country_iso_code' => "NR",
            'country_name_english' => "Nauru",
            'country_name_bangla' =>"নাউরু",
            'country_people_english' =>"Nauruan",
            'country_people_bangla' =>"নাউরুয়ান"
        ],
        [

            'country_iso_code' => "NP",
            'country_name_english' => "Nepal",
            'country_name_bangla' =>"নেপাল",
            'country_people_english' =>"Nepalese",
            'country_people_bangla' =>"নেপালি"
        ],
        [

            'country_iso_code' => "NL",
            'country_name_english' => "Netherlands",
            'country_name_bangla' =>"নেদারল্যান্ডস",
            'country_people_english' =>"Dutch",
            'country_people_bangla' =>"ডাচ"
        ],
        [

            'country_iso_code' => "AN",
            'country_name_english' => "Netherlands Antilles",
            'country_name_bangla' =>"নেদারল্যান্ডস এন্টিলস",
            'country_people_english' =>"Netherlands Antillean",
            'country_people_bangla' =>"নেদারল্যান্ডস এন্টিলয়ান"
        ],
        [

            'country_iso_code' => "NZ",
            'country_name_english' => "New Zealand",
            'country_name_bangla' =>"নিউজিল্যান্ড",
            'country_people_english' =>"New Zealander",
            'country_people_bangla' =>"নিউজিল্যান্ডীয়"
        ],
        [

            'country_iso_code' => "NI",
            'country_name_english' => "Nicaragua",
            'country_name_bangla' =>"নিকারাগুয়া",
            'country_people_english' =>"Nicaraguan",
            'country_people_bangla' =>"নিকারাগুয়ান"
        ],
        [

            'country_iso_code' => "NE",
            'country_name_english' => "Niger",
            'country_name_bangla' =>"নাইগার",
            'country_people_english' =>"Nigerien",
            'country_people_bangla' => "নাইগেরিয়ান"
        ],
        [

            'country_iso_code' => "NG",
            'country_name_english' => "Nigeria",
            'country_name_bangla' =>"নাইজেরিয়া",
            'country_people_english' =>"Nigerian",
            'country_people_bangla' =>"নাইজেরিয়ান"
        ],
        [

            'country_iso_code' => "NU",
            'country_name_english' => "Niue",
            'country_name_bangla' =>"নিউই",
            'country_people_english' =>"Niuean",
            'country_people_bangla' =>"নিউইয়ান"
        ],
        [

            'country_iso_code' => "NO",
            'country_name_english' => "Norway",
            'country_name_bangla' =>"নরওয়ে",
            'country_people_english' =>"Norwegian",
            'country_people_bangla' =>"নরওয়েজিয়ান"
        ],
        [

            'country_iso_code' => "OM",
            'country_name_english' => "Oman",
            'country_name_bangla' =>"ওমান",
            'country_people_english' =>"Omani",
            'country_people_bangla' =>"ওমানি"
        ],
        [

            'country_iso_code' => "PK",
            'country_name_english' => "Pakistan",
            'country_name_bangla' =>"পাকিস্তান",
            'country_people_english' =>"Pakistani",
            'country_people_bangla' =>"পাকিস্তানি"
        ],
        [

            'country_iso_code' => "PW",
            'country_name_english' => "Palau",
            'country_name_bangla' =>"পালাউ",
            'country_people_english' =>"Palauan",
            'country_people_bangla' =>"পালাউয়ান"
        ],
        [

            'country_iso_code' => "PS",
            'country_name_english' => "State of Palestine",
            'country_name_bangla' =>"ফিলিস্তিন",
            'country_people_english' =>"Palestinian",
            'country_people_bangla' =>"ফিলিস্তিনি"
        ],
        [

            'country_iso_code' => "PA",
            'country_name_english' => "Panama",
            'country_name_bangla' =>"পানামা",
            'country_people_english' =>"Panamanian",
            'country_people_bangla' =>"পানামানিয়ান"
        ],
        [

            'country_iso_code' => "PG",
            'country_name_english' => "Papua New Guinea",
            'country_name_bangla' =>"পাপুয়া নিউ গিনি",
            'country_people_english' =>"Papua New Guinean",
            'country_people_bangla' =>"পাপুয়া নিউ গিনিয়ান"
        ],
        [

            'country_iso_code' => "PY",
            'country_name_english' => "Paraguay",
            'country_name_bangla' =>"প্যারাগুয়ে",
           'country_people_english' => "Paraguayan",
           'country_people_bangla' =>"প্যারাগুইয়ান"
        ],
        [

           'country_iso_code' =>  "PE",
             'country_name_english' => "Peru",
            'country_name_bangla' =>"পেরু",
            'country_people_english' => "Peruvian",
            'country_people_bangla' =>  "পেরুভিয়ান"
        ],
        [

            'country_iso_code' => "PH",
             'country_name_english' => "Philippines",
            'country_name_bangla' =>"ফিলিপাইনস",
            'country_people_english' =>"Philippine",
             'country_people_bangla' =>"ফিলিপিনো"
        ],
        [

            'country_iso_code' => "PL",
             'country_name_english' => "Poland",
            'country_name_bangla' =>"পোল্যান্ড",
           'country_people_english' => "Polish",
             'country_people_bangla' => "পোলিশ"
        ],
        [

            'country_iso_code' => "PT",
             'country_name_english' => "Portugal",
            'country_name_bangla' =>"পর্তুগাল",
            'country_people_english' =>"Portuguese",
            'country_people_bangla' => "পর্তুগীজ"
        ],
        [

            'country_iso_code' => "QA",
             'country_name_english' => "Qatar",
            'country_name_bangla' =>"কাতার",
           'country_people_english' => "Qatari",
            'country_people_bangla' =>"কাতারি"
        ],
        [

            'country_iso_code' => "RO",
             'country_name_english' => "Romania",
            'country_name_bangla' =>"রোমানিয়া",
            'country_people_english' =>"Romanian",
             'country_people_bangla' =>"রোমানিয়ান"
        ],
        [

            'country_iso_code' => "RU",
             'country_name_english' => "Russia",
            'country_name_bangla' =>"রাশিয়ান",
            'country_people_english' =>"Russian",
             'country_people_bangla' =>"রাশিয়ান"
        ],
        [

            'country_iso_code' => "RW",
             'country_name_english' => "Rwanda",
            'country_name_bangla' =>"রুয়ান্ডা",
            'country_people_english' =>"Rwandan",
             'country_people_bangla' =>"রুয়ান্ডান"
        ],
        [

            'country_iso_code' => "KN",
             'country_name_english' => "Saint Kitts and Nevis",
            'country_name_bangla' =>"সেন্ট কিটস ও নেভিস",
           'country_people_english' => "Nevisian",
             'country_people_bangla' =>"নেভিসিয়ান"
        ],
        [

            'country_iso_code' => "LC",
             'country_name_english' => "Saint Lucia",
            'country_name_bangla' =>"সেন্ট লুসিয়া",
            'country_people_english' =>"Saint Lucian",
             'country_people_bangla' =>"সেন্ট লুসিয়ান"
        ],
        [

            'country_iso_code' => "VC",
             'country_name_english' => "Saint Vincent and the Grenadines",
            'country_name_bangla' =>"ভিনসেন্ট এবং গ্রেনাডাইনস",
            'country_people_english' =>"Vincentian and Grenadinian",
             'country_people_bangla' =>"ভিনসেন্টিয়ান এবং গ্রেনাডিনিয়ান"
        ],
        [

            'country_iso_code' => "WS",
             'country_name_english' => "Samoa",
            'country_name_bangla' =>"সামোয়া",
           'country_people_english' => "Samoan",
             'country_people_bangla' =>"সামোয়ান"
        ],
        [

            'country_iso_code' => "SM",
             'country_name_english' => "San Marino",
            'country_name_bangla' =>"সান মারিনো",
            'country_people_english' =>"Sammarinese",
             'country_people_bangla' =>"সামারিনিজ"
        ],
        [

            'country_iso_code' => "ST",
             'country_name_english' => "Sao Tome & Principe",
            'country_name_bangla' =>"সাও টোমে এবং প্রিনসিপে",
            'country_people_english' =>"Santomean",
             'country_people_bangla' =>"সান্টোমিয়ান"
        ],
        [

            'country_iso_code' => "SA",
             'country_name_english' => "Saudi Arabia",
            'country_name_bangla' =>"সৌদি আরব",
            'country_people_english' =>"Saudi",
             'country_people_bangla' =>"সৌদি"
        ],
        [

            'country_iso_code' => "SN",
              'country_name_english' => "Senegal",
            'country_name_bangla' =>"সেনেগাল",
            'country_people_english' =>"Senegalese",
             'country_people_bangla' =>"সেনেগালিজ"
        ],
        [

            'country_iso_code' => "CS",
             'country_name_english' => "Serbia",
            'country_name_bangla' =>"সার্বিয়া",
            'country_people_english' =>"Serbian",
             'country_people_bangla' =>"সার্বিয়ান"
        ],
        [

            'country_iso_code' => "SC",
             'country_name_english' => "Seychelles",
            'country_name_bangla' =>"সেচেলস",
           'country_people_english' => "Seychellois",
             'country_people_bangla' =>"সেচেলোইস"
        ],
        [

            'country_iso_code' => "SL",
             'country_name_english' => "Sierra Leone",
            'country_name_bangla' =>"সিয়েরা লিওন",
            'country_people_english' =>"Sierra Leonean",
             'country_people_bangla' =>"সিয়েরা লিওনিয়ান"
        ],
        [

            'country_iso_code' => "SG",
             'country_name_english' => "Singapore",
            'country_name_bangla' =>"সিঙ্গাপুর",
            'country_people_english' =>"Singaporean",
             'country_people_bangla' =>"সিঙ্গাপুরিয়ান"
        ],
        [

            'country_iso_code' => "SK",
             'country_name_english' => "Slovakia",
            'country_name_bangla' =>"স্লোভাকিয়া",
            'country_people_english' =>"Slovak",
            'country_people_bangla' => "স্লোভাক"
        ],
        [

            'country_iso_code' => "SI",
             'country_name_english' => "Slovenia",
            'country_name_bangla' =>"স্লোভেনিয়া",
           'country_people_english' => "Slovenian",
           'country_people_bangla' => "স্লোভেনিয়ান"
        ],
        [

            'country_iso_code' => "SB",
             'country_name_english' => "SOLOMON ISLANDS",
            'country_name_bangla' =>"সলোমান দ্বীপপুঞ্জ",
            'country_people_english' =>"Solomon Islander",
            'country_people_bangla' => "সলোমন দ্বীপবাসী"
        ],
        [

            'country_iso_code' => "SO",
             'country_name_english' => "SOMALIA",
            'country_name_bangla' =>"সোমালিয়া",
            'country_people_english' =>"Somali",
            'country_people_bangla' => "সোমালি"
        ],
        [

            'country_iso_code' => "ZA",
             'country_name_english' => "South Africa",
            'country_name_bangla' =>"দক্ষিন আফ্রিকা",
            'country_people_english' =>"South African",
            'country_people_bangla' => "দক্ষিণ আফ্রিকান"
        ],
        [

            'country_iso_code' => "ES",
             'country_name_english' => "Spain",
            'country_name_bangla' =>"স্পেন",
            'country_people_english' =>"Spanish",
            'country_people_bangla' => "স্প্যানিশ"
        ],
        [

            'country_iso_code' => "LK",
             'country_name_english' => "Sri Lanka",
            'country_name_bangla' =>"শ্রীলংকা",
            'country_people_english' =>"Sri Lankan",
            'country_people_bangla' => "শ্রীলঙ্কান"

        ],
        [

            'country_iso_code' => "SD",
             'country_name_english' => "Sudan",
            'country_name_bangla' =>"সুদান",
            'country_people_english' =>"Sudanese",
            'country_people_bangla' =>  "সুদানিজ"
        ],
        [

            'country_iso_code' => "SR",
             'country_name_english' => "Suriname",
            'country_name_bangla' =>"সুরিনাম",
           'country_people_english' => "Surinamese",
           'country_people_bangla' => "সুরিনামিজ"
        ],
        [

            'country_iso_code' => "SZ",
             'country_name_english' => "Eswatini",
           'country_name_bangla' => "এস্বাতিনী",
           'country_people_english' => "Emaswati",
           'country_people_bangla' => "এমস্বতী"
        ],
        [

            'country_iso_code' => "SE",
             'country_name_english' => "Sweden",
           'country_name_bangla' => "সুইডেন",
           'country_people_english' => "Swedish",
           'country_people_bangla' =>  "সুইডিশ"
        ],
        [

            'country_iso_code' => "CH",
             'country_name_english' => "Switzerland",
            'country_name_bangla' =>"সুইজারল্যান্ড",
           'country_people_english' => "Swiss",
           'country_people_bangla' =>  "সুইস"
        ],
        [

            'country_iso_code' => "SY",
             'country_name_english' => "Syria",
            'country_name_bangla' =>"সিরিয়া",
            'country_people_english' =>"Syrian",
            'country_people_bangla' =>  "সিরিয়ান"

        ],
        [

            'country_iso_code' => "TW",
            'country_name_english' => "TAIWAN",
            'country_name_bangla' =>"তাইওয়ান",
            'country_people_english' =>"Taiwanese",
            'country_people_bangla' =>  "তাইওয়ানিজ"
        ],
        [

            'country_iso_code' => "TJ",
             'country_name_english' => "Tajikistan",
            'country_name_bangla' =>"তাজিকিস্তান",
           'country_people_english' => "Tajikistani",
           'country_people_bangla' =>  "তাজিকিস্তানি"
        ],
        [

            'country_iso_code' => "TZ",
             'country_name_english' => "Tanzania",
            'country_name_bangla' =>"তানজানিয়া",
           'country_people_english' => "Tanzanian",
           'country_people_bangla' =>  "তানজানিয়ান"

        ],
        [

            'country_iso_code' => "TH",
             'country_name_english' => "Thailand",
            'country_name_bangla' =>"থাইল্যান্ড",
           'country_people_english' => "Thai",
           'country_people_bangla' =>  "থাই"
        ],
        [

            'country_iso_code' => "TL",
             'country_name_english' => "TIMOR-LESTE",
            'country_name_bangla' =>"টিমোর-লেস্টে",
            'country_people_english' =>"Timorese",
            'country_people_bangla' =>   "তিমোরিজ"
        ],
        [

            'country_iso_code' => "TG",
             'country_name_english' => "Togo",
            'country_name_bangla' =>"টোগো",
           'country_people_english' => "Togolese",
           'country_people_bangla' =>  "টোগোলিজ"
        ],
        [

            'country_iso_code' => "TO",
             'country_name_english' => "Tonga",
            'country_name_bangla' =>"টোঙ্গা",
            'country_people_english' =>"Tongan",
            'country_people_bangla' =>  "টোঙ্গান"
        ],
        [

            'country_iso_code' => "TT",
             'country_name_english' => "TRINIDAD AND TOBAGO",
            'country_name_bangla' =>"ত্রিনিদাদ ও টোবাগো",
            'country_people_english' =>"Trinidadian and Tobagonian",
            'country_people_bangla' =>  "ত্রিনিদাদীয় এবং টোবাগোনিয়ান"
        ],
        [

            'country_iso_code' => "TN",
             'country_name_english' => "Tunisia",
            'country_name_bangla' =>"তিউনিসিয়া",
            'country_people_english' =>"Tunisian",
            'country_people_bangla' =>  "তিউনিসিয়ান"
        ],
        [

            'country_iso_code' => "TR",
             'country_name_english' => "Turkey",
            'country_name_bangla' =>"তুরস্ক",
           'country_people_english' => "Turkish",
           'country_people_bangla' =>  "তুর্কি"
        ],
        [

            'country_iso_code' => "TM",
             'country_name_english' => "Turkmenistan",
            'country_name_bangla' =>"তুর্কমেনিস্তান",
            'country_people_english' =>"Turkmenistani",
            'country_people_bangla' =>   "তুর্কমেনিস্তানি"
        ],
        [

            'country_iso_code' => "TV",
             'country_name_english' => "Tuvalu",
            'country_name_bangla' =>"টুভালু",
            'country_people_english' =>"Tuvaluan",
            'country_people_bangla' => "টুভালুয়ান"
        ],
        [

            'country_iso_code' => "UG",
             'country_name_english' => "Uganda",
            'country_name_bangla' =>"উগান্ডা",
           'country_people_english' => "Ugandan",
           'country_people_bangla' =>  "উগান্ডান"
        ],
        [

            'country_iso_code' => "UA",
             'country_name_english' => "Ukraine",
           'country_name_bangla' => "ইউক্রেন",
           'country_people_english' => "Ukrainian",
           'country_people_bangla' =>  "ইউক্রেনীয়"
        ],
        [

            'country_iso_code' => "AE",
             'country_name_english' => "United Arab Emirates",
            'country_name_bangla' =>"সংযুক্ত আরব আমিরাত",
           'country_people_english' => "Emirati",
            'country_people_bangla' =>  "আমিরাতি"
        ],
        [

            'country_iso_code' => "GB",
             'country_name_english' => "United Kingdom",
            'country_name_bangla' =>"যুক্তরাজ্য",
            'country_people_english' =>"British",
            'country_people_bangla' =>  "ব্রিটিশ"
        ],
        [

            'country_iso_code' => "US",
             'country_name_english' => "United States",
            'country_name_bangla' =>"যুক্তরাষ্ট্র",
            'country_people_english' =>"American",
            'country_people_bangla' =>  "আমেরিকান"
        ],
        [

             'country_iso_code' =>"Vi",
             'country_name_english' => "Vietnam",
            'country_name_bangla' =>"ভিয়েতনাম",
           'country_people_english' => "Vietnamese",
             'country_people_bangla' => "ভিয়েতনামী"
        ],
        [

            'country_iso_code' => "UY",
             'country_name_english' => "Uruguay",
            'country_name_bangla' =>"উরুগুয়ে",
            'country_people_english' =>"Uruguayan",
             'country_people_bangla' => "উরুগুইয়ান"
        ],
        [

            'country_iso_code' => "UZ",
             'country_name_english' => "Uzbekistan",
            'country_name_bangla' =>"উজবেকিস্তান",
           'country_people_english' => "Uzbekistani",
            'country_people_bangla' =>  "উজবেকিস্তানী"
        ],
        [

            'country_iso_code' => "VU",
             'country_name_english' => "Vanuatu",
            'country_name_bangla' =>"ভানুয়াটু",
            'country_people_english' =>"Vanuatuan",
             'country_people_bangla' => "ভানুয়াটুয়ান"
        ],
        [

            'country_iso_code' => "VE",
             'country_name_english' => "Venezuela",
            'country_name_bangla' =>"ভেনেজুয়েলা",
            'country_people_english' =>"Venezuelan",
             'country_people_bangla' => "ভেনেজুয়েলান"

        ],
        [

            'country_iso_code' => "YE",
             'country_name_english' => "Yemen",
            'country_name_bangla' =>"ইয়েমেন",
            'country_people_english' =>"Yemeni",
             'country_people_bangla' => "ইয়েমেনি"
        ],
        [

            'country_iso_code' => "ZM",
             'country_name_english' => "Zambia",
           'country_name_bangla' => "জাম্বিয়া",
           'country_people_english' => "Zambian",
             'country_people_bangla' => "জাম্বিয়ান"
        ],
        [

            'country_iso_code' => "ZW",
             'country_name_english' => "Zimbabwe",
            'country_name_bangla' =>"জিম্বাবুয়ে",
            'country_people_english' =>"Zimbabwean",
             'country_people_bangla' => "জিম্বাবুইয়ান"
        ],
        [

            'country_iso_code' => "La",
             'country_name_english' => "Laos",
           'country_name_bangla' => "লাওস",
            'country_people_english' =>"Lao",
             'country_people_bangla' => "লাও"
        ],
        [

            'country_iso_code' => "Sc",
             'country_name_english' => "Scotland",
            'country_name_bangla' =>"স্কটল্যান্ড",
            'country_people_english' =>"Scottish",
             'country_people_bangla' => "স্কটিশ"
        ],
        [

            'country_iso_code' => "Wa",
             'country_name_english' => "Wales",
           'country_name_bangla' => "ওয়েলস",
            'country_people_english' =>"Welsh",
             'country_people_bangla' => "ওয়েলশ"
        ],
    ];
        Country::insert($data);

        $countryFirstValue = Country::first();
        $countryFirstId = $countryFirstValue->id;

        Country::where('id','>=',$countryFirstId)
       ->update([
           'created_at' =>Carbon::now() ,
           'updated_at'=>Carbon::now()
        ]);



    }
}
