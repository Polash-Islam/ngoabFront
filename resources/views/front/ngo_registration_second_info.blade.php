@extends('front.master.master')

@section('title')
{{ trans('main.info_two')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="form-card">
            <form id="form" action="{{ route('ngo_registration_second_info_post') }}" method="post" >
                @csrf
            <div class="dashboard_box">
                <div class="dashboard_left">
                    <ul>
                        @include('front.include.sidebar_dash')
                    </ul>
                </div>
                <div class="dashboard_right">
                    <div class="tofsil2_box mt-3">
                        <h1>{{ trans('first_info.title_one')}}</h1>
                        <div class="tofsil2_list">

                            @if(session()->get('locale') == 'en')
                            <h3>নিবন্ধন /নিবদ্ধন নবায়নের ক্ষেতে প্রযোজা শর্তসমূহ</h3>
                            <ul class="rectangle-list">
                                <li>এনজিও বিষয়ক ব্যুয়োর সাথে সকল প্রকার যোগাযোগের ক্ষেট্র সংস্থার নামের সাথে নিবন্ধন নম্বর এবং
                                    মেয়াদ উল্লেখ
                                    করতে হবে।
                                </li>

                                <li>নিবদ্ধিত সংস্থা কর্তৃক “বৈদেশিক অনুদান (স্বেচছাসেবাসূলক কার্যক্রম) রেগুলেশন আইন, ২০১৬' এর
                                    আইন, বিষি, পরিপত্র,
                                    আদেশ এবং নিবন্ধন ও নবায়নের ক্ষেত্রে ্রদন্ত আদেশ ও শর্তাবলী আবন্যিকভাবে প্রতিপালন করতে হবে৷
                                    অন্যথায়
                                    আইনের ১৪ ও ১৫ ধারা মোতাবেক সংশ্লিষ্ট সংস্থার বিরুদ্ধ ব্যবস্থা গ্রহণ করা হবে।
                                </li>
                                <li>যদি জন্য কোন কারণে নিবন্ধন বাতিল না হয় তবে এই নিবন্ধন ১০(দশ) বছরের জন্য বলবৎ থাকবে এবং
                                    নিবন্ধনের
                                    মেয়াদ উধীরের ০৬(ছয়) মাস পুর্বে নিবন্ধন নবায়নের জন্য জাবেদন করতে হবে। উদ্ত সময়ের মধ্যে
                                    নিবন্ধন নবায়নের
                                    জন্য আবেদন করা না হলে সংস্থার নিবন্ধন বাতিলের প্রক্রিয়া প্রহণ করা হবে।
                                </li>
                                <li>সংশ্লিষ্ট জেলা প্রশাসক/ডপজেলা নির্বাহী অফিসারের প্রত্যক্ষ তন্ধাবধানে প্রকল্পের কার্যক্রম
                                    পরিচালিত হবে। প্রযোজ্য ক্ষেতে
                                    সংশ্লিষ্ট মন্ত্রণালয়/বিভাগ এবং মন্ণালয/বিভাগের মাঠ পর্যায়ের কর্মকর্তাদের পরামর্শ ও
                                    সহযোগিতা গ্রহণপূর্বক কার্যক্রম
                                    পরিচালনা করা যাবে। প্রতি প্রকনত/প্রকল্র বছর শেষে সংশ্লিষ্ট জেলা প্রশাসক/ নিরাহী অফিসারের
                                    প্রত্যয়ন প্রেরণে সংশ্লিষ্ট
                                    কর্তৃপক্ষের সাথে নিবিড় যোগযোগক্রমে সহায়ক ভূমিকা পালন করতে হবে।
                                </li>
                                <li>এনজিও বিষয়ক বযরোর পূর্ব অনুমোদন ব্যতিরেকে কোন প্রকল্প গ্রহণ/বাস্তবায়ন, বিদেশি পরামর্শক
                                    নিয়োগ ও বৈদেশিক
                                    অনুদান গ্রহণ ও বায় করা যাবে না।
                                </li>
                                <li>নিবন্ধনের সময় দাখিলকৃত ও অনুমোদিত নির্বাহী কমিটি, গঠনতন্ন এবং সংস্থার ঠিকানার কোন রদবদল হলে
                                    তা সংশ্লিষ্ট
                                    জেলা প্রশাসক/ব্যুরোকে অবহিত করতে হবে। অন্যথায়, রদবদলকৃত নির্বাহী কমিটি, ঠিকানা ও গঠনতন্ এবং
                                    উদ্ধ কমিটি
                                    কর্তৃক গৃহীত যে কোন সিদ্ধান্ত অবৈধ বলে গণ্য হবে।
                                </li>
                                <li>প্রতি প্রকচ্প্রকমরব্ষ শেষে ব্যুরো কর্তৃক তালিকাভুক্ত চার্টার্ড একাউন্টেন্ট ফার্ম দ্বারা
                                    সমস্ত হিসাবপত্র অডিট করাতে হবে
                                    এবং অডিট রিপোর্টের ০৩(তিন]টি অনুলিপি ও বার্ষিক প্রতিবেদন প্রকনত/প্রকলপবর্ষ সমাপ্তির ০২(দুই)
                                    মাসের মধ্যে ব্যুরোতে
                                    'দাখিল করতে হবে।
                                </li>
                                <li>সংস্থার নিবন্ধনের সময় দাখিলকৃত বিদেশি দাতা বা দাতা সংস্থার প্রতিশ্রতিপত্র মোতাবেক বিদেশি
                                    অনুদান দ্বারা
                                    প্রকল্/করমসূচী বাস্তবায়ন শুরু করে তা নিব্ধন পরা্টির ০৬(ছ়) মাসের মধ্য ব্যুরোর নিবন্ধন
                                    শাখাকে অবহিত করতে হবে।
                                    অন্যথায়, মিথ্যা প্রতিধুতিপত্র দাখিলের মাধ্যমে নিবন্ধন গ্রহণের কারণে প্রতারণার অভিযোগে আইন
                                    মোতাবেক সংস্থার
                                    নিবন্ধন ৰাতিলের কার্যক্রম গ্রহণ করা হবে।
                                </li>
                                <li>সংস্থার অনুকূলে প্রাপ্ত সকল বৈদেশিক অনুদান (মাদার একাউন্টধাযী ব্যাংকের নাম ও ঠিকানা)-এর
                                    হিসাৰ নং. ব্যাংক হিসাব নম্বর উল্লেখ করতে হবে)-
                                    এর মাধ্যমে গ্রহণ করতে হবে এবং এনভিও বিষয়ক ব্রোর পুর্বানুমোদন ব্যতিত সংস্থার মাদার একাউন্ট
                                    পরিবর্তন/সথানা্তর করা যাবে না।
                                </li>

                                <li>নিয়বশিত বিষয়সমূহ অবশ্যই প্রতিপালন করতে হবেঃ

                                    <ul>
                                        <li>উপজাতীয় ও অ-উপজাতীয় বাসিন্দাদের মধ্যে সম্প্রীতির বিষ্ন ঘটায় এমন কোন কার্যক্রম
                                            গ্রহণ করা যাবে না
                                        </li>
                                        <li>ধর্মীয় অনুডূতি বিরোধী কর্মকান্ড পরিচালনা এবং ধর্মান্তরিত করা যাবে না।</li>
                                        <li>সাম্প্রদায়িক কাজে উদ্কানী প্রদান করে এমন কোন কাজ করা যাবে না।</li>
                                        <li>জাতীয় বা আঞ্চলিক নিরাপত্তা বিস্নিত করে এমন কোন কাজ করা যাবে না।</li>
                                        <li>প্রত্যক্ষ বা পরোক্ষভাবে এমন কোন কার্মকান্ড করা যাবে না যা পর এলাকার অধিবাসীদের
                                            বিচ্ছিনতাবাদ বা গোষ্ঠীগত
                                            আন্দোলনে উৎসাহিত করে।
                                        </li>

                                        <li>প্রত্যক্ষ বা পরোক্ষভাবে কোন রাজনৈতিক কর্মকান্ডে সম্পৃক্ত হতে পারবে না।</li>

                                        <li> দেশী/বিদেশি বিচ্ছিন্নতাবাদী আন্দোলনরত কোন বায্তি/সংগঠন বা রাজনৈতিক দলের সাথে
                                            সংশ্লিষ্ট থেকে কোন
                                            উ্কানীনূলক কর্মকান্ড পরিচালনা করা যাবে না।
                                        </li>
                                    </ul>
                                </li>

                                <li>এনজিও বিষয়ক ব্যুরোর পূরবানুমোদন ব্যতীত মাদার একাউন্ট হতে কোন অর্থ উত্তোলন করা হলে সংস্থা ও
                                    সংলিষ ব্যাংকের বিন্ুদ্ধে প্রয়োজনীয় আইনানুগ ব্যবস্থা গ্রহণ করা হবে।
                                </li>
                                <li>নিবন্ধন কর্তৃপক্ষ সময় সময় যে কোন শর্ত বা জনুশাসন জারী করলে তা মেনে চলতে হবে।</li>
                            </ul>
                            @else

                            <h3>Conditions applicable in the field of registration / renewal of registration</h3>

                            <ul class="rectangle-list">

                                <li>In all communications with the Bureau of NGO Affairs, the name of the organization along with the registration number and tenure should be mentioned.
                                </li>
                                <li>The rules, regulations, circulars, orders and the orders and conditions given in the registration and renewal of the "Foreign Grants (Voluntary Activities) Regulation Act, 2016" must be complied with by the concerned organization. Otherwise action will be taken against the concerned organization as per section 14 and 15 of the Act.</li>
                                <li>
                                    If the registration is not canceled for any other reason, this registration will be valid for 10 (ten) years and application for renewal of registration should be made 06 (six) months before the expiry of the registration period. If the application for renewal of registration is not applied within the said period, the process of canceling the registration of the organization will be initiated.
                                </li>
                                <li>
                                    The activities of the project will be conducted under the direct supervision of the concerned District Commissioner/Upazal Executive Officer. In applicable cases, the activities can be conducted by taking the advice and cooperation of the field level officers of the concerned Ministry/Department and Mantanalaya/Department. At the end of every project / project year, the concerned Deputy Commissioner / Nirahi Officer should play a supportive role in close coordination with the concerned authorities in sending the certificate.
                                </li>

                            <li>
                                No project acceptance/implementation, recruitment of foreign consultants and acceptance and payment of foreign grants shall be permitted without the prior approval of the NGO Affairs Bureau.
                            </li>

                            <li>
                                Any change in the Executive Committee, constitution and address of the organization submitted and approved at the time of registration shall be intimated to the concerned District Commissioner/Bureau. Otherwise, any decision taken by the reconstituted Executive Committee, the Address and Constitution and the Uddah Committee shall be considered invalid.
                            </li>
                        <li>
                            All accounts shall be audited by a Chartered Accountant firm registered by the Bureau at the end of every project/project year and 03(three) copies of the audit report and annual report shall be submitted to the Bureau within 02(two) months of the completion of the project/project year.
                        </li>
                        <li>
                            The foreign donor or the commitment letter of the donor organization submitted at the time of registration shall notify the registration branch of the Bureau within 06 (six) months of receipt of the registration of the project/programme implemented by the foreign grant. Otherwise, action will be taken to cancel the registration of the organization in accordance with law on charges of fraud due to obtaining registration by submitting false affidavits.
                        </li>
                        <li>All foreign donations received in favor of the organization must be accepted through (name and address of the mother account holder bank account number bank account number)- and the mother account of the organization cannot be changed/transferred without prior approval of the Bureau of NGO Affairs.</li>

                        <li>The following points must be observed:
                            <ul>
                                <li>No action shall be taken which disturbs the harmony between the tribal and non-tribal inhabitants.
                                </li>

                            <li>
                                Activities against religious sentiments and proselytizing shall not be carried out.
                            </li>
                            <li>No act which incites communal activities shall be done.</li>
                            <li>No action shall be taken which threatens national or regional security.</li>
                            <li>No action shall be taken, directly or indirectly, to encourage separatism or sectarian movements by the residents of the area.</li>

                            <li>Cannot be involved in any political activities directly or indirectly.</li>
                            <li>No provocative activities shall be conducted by any person/organization or political party associated with domestic/foreign separatist movements.</li>
                            </ul>
                        </li>
                        <li>Necessary legal action will be taken against the organization and the concerned bank if any money is withdrawn from the mother account without the prior approval of the Bureau of NGO Affairs.</li>

                        <li>Any conditions or regulations issued by the Registration Authority from time to time shall be followed.</li>
                            </ul>

                            @endif
                            <div class="tacbox">
                                <input id="f_agree" name="f_agree" type="checkbox" value="1"/>
                                <label for="f_agree">{{ trans('first_info.check_button1')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                        <button type="submit" id="final_button" class="btn btn-registration" disabled>{{ trans('first_info.next_button1')}}
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
