@extends('front.master.master')

@section('title')
{{ trans('main.info_one')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

<section>
    <div class="container">
        <div class="form-card">
            <form method="post" action="{{ route('ngoRegistrationFirstInfoPost') }}" id="form">
                @csrf
            <div class="dashboard_box">
                <div class="dashboard_left">

                            <ul>
                                @include('front.include.sidebar_dash')
                            </ul>

                </div>
                <div class="dashboard_right">

                    <div class="tofsil2_box mt-3">
{{--                        <h1>{{ trans('first_info.title_one')}}</h1>--}}
                        <div class="tofsil2_list">
                            <h3>{{ trans('first_info.title_two')}}</h3>
                            <ul class="rectangle-list">

                                <?php

$ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->first();


                        ?>


                                <!-- update code for old ngo strart -->

                                @if($ngoTypeInfo->ngo_type_new_old == 'Old')

                                @if(session()->get('locale') == 'en')

                                @if($ngoTypeInfo->ngo_type == 'দেশিও')

                                <li>পূরণকৃত এফডি-৮ ফরম</li>
                                <li>ফরম-৮ মোতাবেক কার্যনির্বাহী কমিটির সদস্যদের তালিকা</li>
                                <li>নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবি ও জাতীয় পরিচয়পত্রের সত্যায়িত অনুলিপি</li>
                                <li>প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</li>
                                <li>নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত অনুলিপি</li>
                                <li>উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ নির্বাহী কমিটি অনুমোদন সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</li>
                                <li>সংস্থার গঠনতন্ত্র পরিবর্তন হয়নি মর্মে সভাপতি এবং সাধারণ সম্পাদকের যৌথ স্বাক্ষরে প্রত্যয়নপত্র</li>
                                <li>সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ জমাদানের মূলকপিসহ তার সত্যায়িত অনুলিপি অথবা সংস্থার গঠনতন্ত্র পরিবর্তন না হয়ে থাকলে "পরিবর্তন হয়নি' মর্মে প্রত্যয়নের অনুলিপি</li>
                                <li>সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্ট এবং বার্ষিক প্রতিবেদনের সত্যায়িত অনুলিপি</li>
                                <li>অন্য কোন আইনে নিবন্ধিত হলে সংশ্লিষ্ট কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত অনুলিপি</li>
                                <li>সর্বশেষ নিবন্ধন/নবায়ন সনদের সত্যায়িত অনুলিপি</li>
                                <li>Right to Information Act-2009-এর আওতায় Focal Point নিয়োগ করত: ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি</li>
<li>সংস্থার নিকট তফফিল-১ এ বর্ণিত যেকোন ফি এর উপর কোন বকেয়া ভ্যাট থাকলে চালানমূলে জমা প্রদানের প্রমাণক</li>
<li>নিবদ্ধনকালীন দাখিলকৃত সাধারণ ও নির্বাহী কমিটির তালিকা এবং বর্তমান সাধারণ সদস্য ও নির্বাহী কমিটির তালিকা</li>

<li>বিগত ১০ বছরে বৈদেশিক অনুদানে পরিচালিত কার্যক্রমের সংক্ষিপ্ত বিবরণ (সংযুক্ত ছক অনুযায়ী)
    <table class="table table-bordered">
        <tr>
            <th>ক্রঃ নং</th>
            <th>সন[বিগত ০৫ (পাঁচ) বছরের]</th>
            <th>প্রকল্পের নাম</th>
            <th>মেয়াদ</th>
            <th>কাজের প্রকৃতি</th>
            <th>অর্থের পরিমাণ</th>
            <th>ছাড়কৃত অর্থ</th>
            <th>গৃহিত বৈদেশিক অনুদান</th>
            <th>ব্যয়</th>
            <th>অবশিষ্ট</th>
            <th>মন্তব্য</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>০১</td>
            <td>০২</td>
            <td>০৩</td>
            <td>০৪</td>
            <td>০৫</td>
            <td>০৬</td>
            <td>০৭</td>
            <td>০৮</td>
            <td>০৯</td>
            <td>১০</td>
            <td>১১</td>
        </tr>
    </table>
</li>
                                @else
                                <li>পূরণকৃত এফডি-৮ ফরম</li>
                                <li>বোর্ড অব ডিরেক্টরস/বোর্ড অব ট্রাষ্টিজ তালিকা (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত/সত্যায়িত)</li>
                                <li>সংস্থার বাই লজ (By laws)/গঠনতন্ত্র (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত/সত্যায়িত)</li>
<li>নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত অনুলিপি</li>
<li>সংস্থার বোর্ড অব ডিরেন্টরস/বোর্ড অব ট্রাষ্টিজ সভার কার্যবিবরণীর (কার্যবিবরণীতে বোর্ড গঠন সংক্রান্ত, নিবন্ধন নবায়ন করার প্রস্তাব, গঠনতন্ত্র পরিবর্তন সংক্রান্ত বিষয়াদি উল্লেখপূর্বক) (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত/সত্যায়িত)</li>
<li>সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ জমাদানের মূলকপিসহ তার সত্যায়িত অনুলিপি অথবা সংস্থার গঠনতন্ত্র পরিবর্তন না হয়ে থাকলে "পরিবর্তন হয়নি' মর্মে প্রত্যয়ন পত্রের কপি সংশ্লিষ্ট (দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত/ সত্যায়িত)</li>
<li>সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্ট এবং বার্ষিক প্রতিবেদনের সত্যায়িত অনুলিপি</li>
<li>সংস্থার মূল কার্যালয়ের নিবন্ধনপত্রের (সংশ্লিষ্ট দেশের নোটারীকৃত/সত্যায়িত) অনুলিপি</li>
<li>সর্বশেষ নিবন্ধন/নবায়ন সনদপত্রের ২টি সত্যায়িত অনুলিপি</li>
<li>Right to Information Act-২০০৯ এর আওতায় Focal Point নিয়োগ করত: ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি</li>
<li>সংস্থার নিকট তফফিল -১ বর্ণিত যেকোন ফি এর উপর কোন বকেয়া ভ্যাট থাকলে তাহা চালানমুলে জমা প্রদানের প্রমাণক</li>
<li>বিগত ১০ বছরে বৈদেশিক অনুদানে পরিচালিত কার্যক্রমের সংক্ষিপ্ত বিবরণ (সংযুক্ত ছক অনুযায়ী)
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>ক্রঃ নং</th>
                                            <th>সন[বিগত ০৫ (পাঁচ) বছরের]</th>
                                            <th>প্রকল্পের নাম</th>
                                            <th>মেয়াদ</th>
                                            <th>কাজের প্রকৃতি</th>
                                            <th>অর্থের পরিমাণ</th>
                                            <th>ছাড়কৃত অর্থ</th>
                                            <th>গৃহিত বৈদেশিক অনুদান</th>
                                            <th>ব্যয়</th>
                                            <th>অবশিষ্ট</th>
                                            <th>মন্তব্য</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>০১</td>
                                            <td>০২</td>
                                            <td>০৩</td>
                                            <td>০৪</td>
                                            <td>০৫</td>
                                            <td>০৬</td>
                                            <td>০৭</td>
                                            <td>০৮</td>
                                            <td>০৯</td>
                                            <td>১০</td>
                                            <td>১১</td>
                                        </tr>
                                    </table>
                                </li>
                                @endif
                                @else

                                @if($ngoTypeInfo->ngo_type == 'দেশিও')
                                <li>Filled FD-8 form</li>
                                <li>List of Executive Committee members as per Form-8</li>
                                <li>Attested copy of passport size photograph and national identity card of executive committee members</li>
                                <li>List of authorized executive committee of primary registering authority and attested copy of registration certificate</li>
                                <li>Attested copy of registration renewal fee deposit invoice along with original</li>
                                <li>Certified copy of minutes of general meeting regarding approval of executive committee with signed list of attendance of general members present</li>
                                <li>A certificate signed jointly by the president and general secretary stating that the constitution of the organization has not changed</li>
                                <li>Attested copy of deposit of VAT along with prescribed fee if the constitution of the company has changed or attested copy of "No change" if the constitution of the company has not changed
                                </li>
                                <li>Certified copy of audit report and annual report of the last 10 (ten) years of the organization
                                </li>
                                <li>Attested copy of list of authorized executive committee of concerned authority if registered under any other law</li>
                                <li>Attested copy of latest registration/renewal certificate</li>
                                <li>Focal Point appointed under Right to Information Act-2009: Copy of notification letter to Bureau</li>
<li>If there is any VAT due with the company on any fee mentioned in Taffil-1, proof of payment of the invoice</li>
<li>List of General and Executive Committees filed during the period and list of current General and Executive Committee members</li>
<li>Copy of registration certificate (notarized/attested in the concerned country) of the head office of the company</li>
<li>
    Summary of foreign grant funded activities in last 10 years (as per attached table)
    <table class="table table-bordered">
        <tr>
            <th>Sl: No:</th>
            <th>Year [Last 05 (Five) Years]</th>
            <th>Project name</th>
            <th>duration</th>
            <th>Nature of work</th>
            <th>Amount of money</th>
            <th>Discounted amount</th>
            <th>Foreign grants received</th>
            <th>expenditure</th>
            <th>Remaining</th>
            <th>Comment</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>01</td>
            <td>02</td>
            <td>03</td>
            <td>04</td>
            <td>05</td>
            <td>06</td>
            <td>07</td>
            <td>08</td>
            <td>09</td>
            <td>10</td>
            <td>11</td>
        </tr>
    </table>
</li>
@else
                                <li>Filled FD-8 form</li>
                                <li>List of Board of Directors/Board of Trustees (Notarized/Attested by the Peace of Justice of the concerned country)</li>
<li>By laws/Constitution of the organization (notarized/attested by the Peace of Justice of the concerned country)</li>
<li>Attested copy of registration renewal fee deposit invoice along with original</li>
<li>Minutes of Board of Directors/Board of Trustees meeting of the organization (mentioning matters related to board formation, proposal for renewal of registration, changes in constitution) (notarized/attested by the Peace of Justice of the concerned country)</li>
<li>If the constitution of the company has changed, its attested copy along with the original copy of the payment for VAT along with the prescribed fee or if the constitution of the company has not changed, a copy of the relevant certificate stating "No change" (notarized/attested by the Peace of Justice of the country)</li>
<li>Attested copy of last 10 (ten) years audit report and annual report of the company</li>
<li>Copy of registration certificate (notarized/attested in the concerned country) of the head office of the company</li>
<li>2 attested copies of latest registration/renewal certificate</li>
<li>Focal Point appointed under Right to Information Act-2009: Copy of notification letter to Bureau</li>
<li>If there is any outstanding VAT on any fee mentioned in Schedule-1 with the company, it is evidence of payment of invoice</li>
<li>
                                    Summary of foreign grant funded activities in last 10 years (as per attached table)
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Sl: No:</th>
                                            <th>Year [Last 05 (Five) Years]</th>
                                            <th>Project name</th>
                                            <th>duration</th>
                                            <th>Nature of work</th>
                                            <th>Amount of money</th>
                                            <th>Discounted amount</th>
                                            <th>Foreign grants received</th>
                                            <th>expenditure</th>
                                            <th>Remaining</th>
                                            <th>Comment</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>01</td>
                                            <td>02</td>
                                            <td>03</td>
                                            <td>04</td>
                                            <td>05</td>
                                            <td>06</td>
                                            <td>07</td>
                                            <td>08</td>
                                            <td>09</td>
                                            <td>10</td>
                                            <td>11</td>
                                        </tr>
                                    </table>
                                </li>
                                @endif
                                @endif


                                @else

                                @if(session()->get('locale') == 'en')

                                <li>পূরণকৃত এফডি-১ ফরম গত</li>
                                <li>ফরম-৮ অনুযায়ী সংস্থার কার্যনির্বাহী কমিটির সদস্যদের তালিকা</li>
                                <li>নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবি ও জাতীয় পরিচয়পত্রের সত্যায়িত অনুলিপি</li>
                                <li>প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</li>
                                <li>গঠনতন্ত্রের (প্রাথমিক নিবন্ধন কর্তৃপক্ষ কর্তৃক অনুমোদিত) সত্যায়িত অনুলিপি</li>
                                <li>সংস্থার কার্যক্রম প্রতিবেদন</li>
                                <li>প্ল্যান অব অপারেশন (কর্ম পদ্ধতি, অর্গানোগ্রাম, সভাপতি কর্তৃক স্বাক্ষরিত)</li>
                                <li>দাতা সংস্হার প্রতিশুতিপত্র (সংস্থা প্রধান কর্তৃক সত্যায়িত)</li>
                                <li>কোড নং- ১-০৩২৩-০০০০-১৮৩৬-এ তফসিল-১ এ নির্ধারিত ফি জমা প্রদান করে ট্রেজারি চালানের মূল কপিসহ</li>
                                <li>প্রদেয় ফি এর উপর জাতীয় রাজস্ব বোর্ডের নির্ধারিত কোড নং- ১-১১৩৩-০০৩৫-০৩১১ এ ১৫% ভ্যাট বাবদ অর্থ জমা প্রদান করে ট্রেজারি চালানের মূলকপিসহ</li>
                                <li>সংস্থার নির্বাহী কমিটি গঠন সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি (উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ)</li>
                                <li>সংস্থার সাধারণ সদস্যদের নামের তালিকা প্রত্যেক সদস্যের স্বাক্ষরসহ নাম, পিতা/মাতা, স্বামী/স্ত্রী'র নাম ও ঠিকানা, জাতীয় পরিচয়পত্র নম্বর</li>
                                @else
                                <li>FD-1 Form (Signed by Chief Executive in Bangladesh)</li>
                                <li>Certificate of Incorporation in the Country of Origin</li>
                                <li>Constitution</li>
                                <li>Activities Report</li>
                                <li>Plan of Operation (Work/Organogram)</li>
                                <li>Decision of the Committee/ Board to open office in Bangladesh</li>
                                <li>Letter of Appointment of the Country Representative</li>
                                <li>Copy of Treasury Chalan in support of depositing US $9,000 or Equivalent TK amount
                                    in the Code 1-0323-0000-1836 and 15% Vat Code No (1-1133-0035-0311)
                                </li>
                                <li>Deed of agreement Stamp of TK.300/-with the landlord in Support of opening the
                                    office in Bangladesh
                                </li>
                                <li>List of Executive Committee (foreign)</li>
                                <li>Letter of Intent</li>
                                @endif

                                @endif

                                <!-- update code for old ngo end --->


                            </ul>
                            <p>{{ trans('first_info.title_three')}}</p>
                            <div class="tacbox">
                                <input id="f_agree" name="f_agree" type="checkbox" value="1" />
                                <label for="f_agree">{{ trans('first_info.check_button')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                        <button id="final_button" type="submit" class="btn btn-registration" disabled>{{ trans('fd_one_step_four.Submit2')}}
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('script')

<script>

$("#f_agree").click(function() {
   // alert(33);
  $("#final_button").attr("disabled", !this.checked);
});

</script>

@endsection
