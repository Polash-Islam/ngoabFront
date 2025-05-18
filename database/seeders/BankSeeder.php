<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    public function run()
    {
        $banks = [
            ['name_en' => 'AB Bank Ltd.', 'name_bn' => 'এবি ব্যাংক লিমিটেড'],
            ['name_en' => 'Agrani Bank', 'name_bn' => 'অগ্রণী ব্যাংক'],
            ['name_en' => 'Al-Arafah Islami Bank Ltd.', 'name_bn' => 'আল-আরাফাহ ইসলামি ব্যাংক লিমিটেড'],
            ['name_en' => 'Ansar VDP Unnayan Bank', 'name_bn' => 'আনসার ভিডিপি উন্নয়ন ব্যাংক'],
            ['name_en' => 'BASIC Bank', 'name_bn' => 'বেসিক ব্যাংক'],
            ['name_en' => 'BRAC Bank Ltd.', 'name_bn' => 'ব্র্যাক ব্যাংক লিমিটেড'],
            ['name_en' => 'Bangladesh Commerce Bank Ltd.', 'name_bn' => 'বাংলাদেশ কমার্স ব্যাংক লিমিটেড'],
            ['name_en' => 'Bangladesh Development Bank', 'name_bn' => 'বাংলাদেশ ডেভেলপমেন্ট ব্যাংক'],
            ['name_en' => 'Bangladesh Krishi Bank', 'name_bn' => 'বাংলাদেশ কৃষি ব্যাংক'],
            ['name_en' => 'Bank Al-Falah', 'name_bn' => 'ব্যাংক আল-ফালাহ'],
            ['name_en' => 'Bank Asia Ltd.', 'name_bn' => 'ব্যাংক এশিয়া লিমিটেড'],
            ['name_en' => 'CITI Bank NA', 'name_bn' => 'সিটি ব্যাংক এনএ'],
            ['name_en' => 'Commercial Bank of Ceylon', 'name_bn' => 'কমার্শিয়াল ব্যাংক অফ সিলন'],
            ['name_en' => 'Community Bank Bangladesh Limited', 'name_bn' => 'কমিউনিটি ব্যাংক বাংলাদেশ লিমিটেড'],
            ['name_en' => 'Dhaka Bank Ltd.', 'name_bn' => 'ঢাকা ব্যাংক লিমিটেড'],
            ['name_en' => 'Dutch Bangla Bank Ltd.', 'name_bn' => 'ডাচ-বাংলা ব্যাংক লিমিটেড'],
            ['name_en' => 'EXIM Bank Ltd.', 'name_bn' => 'এক্সিম ব্যাংক লিমিটেড'],
            ['name_en' => 'Eastern Bank Ltd.', 'name_bn' => 'ইস্টার্ন ব্যাংক লিমিটেড'],
            ['name_en' => 'First Security Islami Bank Ltd.', 'name_bn' => 'ফার্স্ট সিকিউরিটি ইসলামী ব্যাংক লিমিটেড'],
            ['name_en' => 'Global Islamic Bank Ltd.', 'name_bn' => 'গ্লোবাল ইসলামিক ব্যাংক লিমিটেড'],
            ['name_en' => 'Grameen Bank', 'name_bn' => 'গ্রামীণ ব্যাংক'],
            ['name_en' => 'HSBC', 'name_bn' => 'এইচএসবিসি'],
            ['name_en' => 'Habib Bank Ltd.', 'name_bn' => 'হাবিব ব্যাংক লিমিটেড'],
            ['name_en' => 'ICB Islamic Bank', 'name_bn' => 'আইসিবি ইসলামিক ব্যাংক'],
            ['name_en' => 'IFIC Bank Ltd.', 'name_bn' => 'আইএফআইসি ব্যাংক লিমিটেড'],
            ['name_en' => 'Islami Bank Bangladesh Ltd.', 'name_bn' => 'ইসলামী ব্যাংক বাংলাদেশ লিমিটেড'],
            ['name_en' => 'Jamuna Bank Ltd.', 'name_bn' => 'যমুনা ব্যাংক লিমিটেড'],
            ['name_en' => 'Janata Bank', 'name_bn' => 'জনতা ব্যাংক'],
            ['name_en' => 'Jubilee Bank', 'name_bn' => 'জুবিলি ব্যাংক'],
            ['name_en' => 'Karmashangosthan Bank', 'name_bn' => 'কর্মসংস্থান ব্যাংক'],
            ['name_en' => 'Meghna Bank Ltd.', 'name_bn' => 'মেঘনা ব্যাংক লিমিটেড'],
            ['name_en' => 'Mercantile Bank Ltd.', 'name_bn' => 'মার্কেন্টাইল ব্যাংক লিমিটেড'],
            ['name_en' => 'Midland Bank Ltd.', 'name_bn' => 'মিডল্যান্ড ব্যাংক লিমিটেড'],
            ['name_en' => 'Modhumoti Bank Ltd.', 'name_bn' => 'মধুমতি ব্যাংক লিমিটেড'],
            ['name_en' => 'Mutual Trust Bank Ltd.', 'name_bn' => 'মিউচুয়াল ট্রাস্ট ব্যাংক লিমিটেড'],
            ['name_en' => 'NCC Bank Ltd.', 'name_bn' => 'এনসিসি ব্যাংক লিমিটেড'],
            ['name_en' => 'NRB Bank Ltd.', 'name_bn' => 'এনআরবি ব্যাংক লিমিটেড'],
            ['name_en' => 'NRB Commercial Bank Ltd.', 'name_bn' => 'এনআরবি কমার্শিয়াল ব্যাংক লিমিটেড'],
            ['name_en' => 'National Bank Ltd.', 'name_bn' => 'ন্যাশনাল ব্যাংক লিমিটেড'],
            ['name_en' => 'National Bank of Pakistan', 'name_bn' => 'ন্যাশনাল ব্যাংক অফ পাকিস্তান'],
            ['name_en' => 'One Bank Ltd.', 'name_bn' => 'ওয়ান ব্যাংক লিমিটেড'],
            ['name_en' => 'Padma Bank Ltd.', 'name_bn' => 'পদ্মা ব্যাংক লিমিটেড'],
            ['name_en' => 'Palli Sanchay Bank', 'name_bn' => 'পল্লী সঞ্চয় ব্যাংক'],
            ['name_en' => 'Premier Bank Ltd.', 'name_bn' => 'প্রিমিয়ার ব্যাংক লিমিটেড'],
            ['name_en' => 'Prime Bank Ltd.', 'name_bn' => 'প্রাইম ব্যাংক লিমিটেড'],
            ['name_en' => 'Pubali Bank Ltd.', 'name_bn' => 'পূবালী ব্যাংক লিমিটেড'],
            ['name_en' => 'Rajshahi Krishi Unnayan Bank', 'name_bn' => 'রাজশাহী কৃষি উন্নয়ন ব্যাংক'],
            ['name_en' => 'Rupali Bank', 'name_bn' => 'রূপালী ব্যাংক'],
            ['name_en' => 'SBAC Bank Ltd.', 'name_bn' => 'এসবিএসি ব্যাংক লিমিটেড'],
            ['name_en' => 'Shahjalal Islami Bank Ltd.', 'name_bn' => 'শাহজালাল ইসলামি ব্যাংক লিমিটেড'],
            ['name_en' => 'Shimanto Bank Ltd.', 'name_bn' => 'শিমান্তো ব্যাংক লিমিটেড'],
            ['name_en' => 'Social Islami Bank Ltd.', 'name_bn' => 'সোশ্যাল ইসলামী ব্যাংক লিমিটেড'],
            ['name_en' => 'Sonali Bank', 'name_bn' => 'সোনালী ব্যাংক'],
            ['name_en' => 'Southeast Bank Ltd.', 'name_bn' => 'সাউথইস্ট ব্যাংক লিমিটেড'],
            ['name_en' => 'Standard Bank Ltd.', 'name_bn' => 'স্ট্যান্ডার্ড ব্যাংক লিমিটেড'],
            ['name_en' => 'Standard Chartered Bank', 'name_bn' => 'স্ট্যান্ডার্ড চার্টার্ড ব্যাংক'],
            ['name_en' => 'State Bank of India', 'name_bn' => 'স্টেট ব্যাংক অফ ইন্ডিয়া'],
            ['name_en' => 'The City Bank Ltd.', 'name_bn' => 'দ্য সিটি ব্যাংক লিমিটেড'],
            ['name_en' => 'Trust Bank Ltd.', 'name_bn' => 'ট্রাস্ট ব্যাংক লিমিটেড'],
            ['name_en' => 'Union Bank Ltd.', 'name_bn' => 'ইউনিয়ন ব্যাংক লিমিটেড'],
            ['name_en' => 'United Commercial Bank Ltd.', 'name_bn' => 'ইউনাইটেড কমার্শিয়াল ব্যাংক লিমিটেড'],
            ['name_en' => 'Uttara Bank Ltd.', 'name_bn' => 'উত্তরা ব্যাংক লিমিটেড'],
            ['name_en' => 'Woori Bank Ltd.', 'name_bn' => 'উরি ব্যাংক লিমিটেড'],
        ];

        DB::table('banks')->insert($banks);
    }
}
