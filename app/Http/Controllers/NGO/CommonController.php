<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App;
use Auth;
use Image;
use App\Models\NgoTypeAndLanguage;

class CommonController extends Controller
{


    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function storeBasePdf64($imageBase64)
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64) = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $imageName = date('Y-d-m') . time() . mt_rand(1000000000, 9999999999) . '.pdf';
        $path = public_path() . "/newPdf/" . $imageName;

        file_put_contents($path, $imageBase64);


        $finalFile = 'newPdf/' . $imageName;

        return $finalFile;
    }

    public static function storeBase64($imageBase64)
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64) = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $imageName = date('Y-d-m') . time() . mt_rand(1000000000, 9999999999) . '.png';
        $path = public_path() . "/uploads/" . $imageName;

        file_put_contents($path, $imageBase64);


        $finalFile = 'public/uploads/' . $imageName;

        return $finalFile;
    }


    public static function imageUpload($request, $file, $filePath)
    {


        $path = public_path('uploads/' . $filePath);

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $extension = date('Y-d-m') . time() . mt_rand(1000000000, 9999999999) . "." . $file->getClientOriginalExtension();
        $filename = $extension;
        $file->move('public/uploads/' . $filePath . '/', $filename);
        $imageUrl = 'public/uploads/' . $filePath . '/' . $filename;


        return $imageUrl;

    }


    public static function pdfUpload($request, $file, $filePath)
    {


        $path = public_path('uploads/' . $filePath);

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }


        $extension = date('Y-d-m') . time() . mt_rand(1000000000, 9999999999) . "." . $file->getClientOriginalExtension();
        $filename = $extension;
        $file->move('public/uploads/' . $filePath . '/', $filename);
        $imageUrl = 'uploads/' . $filePath . '/' . $filename;


        return $imageUrl;

    }


    public static function englishToBangla($data)
    {


        $engDATE = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday',
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

        $bangDATE = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে',
            'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', '
        বুধবার', 'বৃহস্পতিবার', 'শুক্রবার'
        );


        $finalResult = str_replace($engDATE, $bangDATE, $data);

        return $finalResult;
    }

    public static function newLineCode($data)
    {


        $engDATE = array(',');

        $bangDATE = array('</br>');


        $finalResult = str_replace($engDATE, $bangDATE, $data);

        return $finalResult;
    }


    public static function checkNgotype($status)
    {

        $mainSession = session()->get('locale');

        if (!empty($mainSession)) {

            App::setLocale($mainSession);
            session()->put('locale', $mainSession);

            return session()->put('locale', $mainSession);

        } else {

            if ($status == 1) {

                $first_form_check = NgoTypeAndLanguage::where('user_id', Auth::user()->id)->value('ngo_language');

                if (empty($first_form_check)) {
                    App::setLocale('en');
                    session()->put('locale', 'en');

                    return session()->put('locale', 'en');

                } else {

                    App::setLocale($first_form_check);
                    session()->put('locale', $first_form_check);

                    return session()->put('locale', $first_form_check);

                }

            } else {

                App::setLocale($status);
                session()->put('locale', $status);

                return session()->put('locale', $status);

            }

        }

    }

    public static function changeView()
    {
        $mainNgoType = NgoTypeAndLanguage::where('user_id', Auth::user()->id)->value('ngo_type');
        return $mainNgoType;
    }


    public static function newOldNgo()
    {

        $newOldNgo = NgoTypeAndLanguage::where('user_id', Auth::user()->id)->value('ngo_type_new_old');
        return $newOldNgo;

    }

}
