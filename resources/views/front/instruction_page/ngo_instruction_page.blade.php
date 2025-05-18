@extends('front.master.master')

@section('title')
{{ trans('main.ngow')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<!-- End Header -->
<section>
    <div class="container">
        <div class="card">
            <div class="card-body p-5">

                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                <div class="others_inner_section pb-4">
                    <h1>নির্দেশনা</h1>
                    <div class="notice_underline"></div>
                </div>
                <ul class="nav nav-tabs custom_tab">

                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tof03">তফসিল ০৪</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tof04">তফসিল ০৫</a>
                    </li> --}}
                </ul>
                @else

                <div class="others_inner_section pb-4">
                    <h1>Instructions</h1>
                    <div class="notice_underline"></div>
                </div>
                <ul class="nav nav-tabs custom_tab">

                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tof03">Schedule 04</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tof04">তফসিল ০৫</a>
                    </li> --}}
                </ul>
                @endif

                <!-- Tab panes -->
                <div class="tab-content custom_tab_content">

                    <div class="tab-pane container active" id="tof03">

                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h5>নিবন্ধন /নিবদ্ধন নবায়নের ক্ষেতে প্রযোজা শর্তসমূহ</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>০১)</td>
                                <td>এনজিও বিষয়ক ব্যুয়োর সাথে সকল প্রকার যোগাযোগের ক্ষেত্রে সংস্থার নামের সাথে নিবন্ধন
                                    নম্বর এবং মেয়াদ উল্লেখ করতে হবে।
                                </td>
                            </tr>
                            <tr>
                                <td>০২)</td>
                                <td>নিবদ্ধিত সংস্থা কর্তৃক “বৈদেশিক অনুদান (স্বেচছাসেবাসূলক কার্যক্রম) রেগুলেশন আইন,
                                    ২০১৬' এর আইন, বিধি , পরিপত্র,
                                    আদেশ এবং নিবন্ধন ও নবায়নের ক্ষেত্রে প্রদত্ত আদেশ ও শর্তাবলী আবশ্যিকভাবে প্রতিপালন
                                    করতে হবে ৷ অন্যথায়
                                    আইনের ১৪ ও ১৫ ধারা মোতাবেক সংশ্লিষ্ট সংস্থার বিরুদ্ধ ব্যবস্থা গ্রহণ করা হবে।
                                </td>
                            </tr>
                            <tr>
                                <td>০৩)</td>
                                <td>যদি অন্য কোন কারণে নিবন্ধন বাতিল না হয় তবে এই নিবন্ধন ১০(দশ) বছরের জন্য বলবৎ থাকবে
                                    এবং নিবন্ধনের
                                    মেয়াদ উর্তীন্ন ০৬(ছয়) মাস পুর্বে নিবন্ধন নবায়নের জন্য আবেদন করতে হবে। উক্ত সময়ের
                                    মধ্যে নিবন্ধন নবায়নের
                                    জন্য আবেদন করা না হলে সংস্থার নিবন্ধন বাতিলের প্রক্রিয়া প্রহণ করা হবে।
                                </td>
                            </tr>
                            <tr>
                                <td>০৪)</td>
                                <td>সংশ্লিষ্ট জেলা প্রশাসক/ডপজেলা নির্বাহী অফিসারের প্রত্যক্ষ তত্ত্বাবধানে প্রকল্পের
                                    কার্যক্রম পরিচালিত হবে। প্রযোজ্য ক্ষেত্রে
                                    সংশ্লিষ্ট মন্ত্রণালয়/বিভাগ এবং মন্তণালয়/বিভাগের মাঠ পর্যায়ের কর্মকর্তাদের পরামর্শ
                                    ও সহযোগিতা গ্রহণপূর্বক কার্যক্রম
                                    পরিচালনা করা যাবে। প্রতি প্রকল্প /প্রকল্প বছর শেষে সংশ্লিষ্ট জেলা প্রশাসক/ নিরাহী
                                    অফিসারের প্রত্যয়ন প্রেরণে সংশ্লিষ্ট
                                    কর্তৃপক্ষের সাথে নিবিড় যোগযোগক্রমে সহায়ক ভূমিকা পালন করতে হবে।
                                </td>
                            </tr>
                            <tr>
                                <td>০৫)</td>
                                <td>এনজিও বিষয়ক বযরোর পূর্ব অনুমোদন ব্যতিরেকে কোন প্রকল্প গ্রহণ/বাস্তবায়ন, বিদেশি
                                    পরামর্শক নিয়োগ ও বৈদেশিক
                                    অনুদান গ্রহণ ও বায় করা যাবে না।
                                </td>
                            </tr>
                            <tr>
                                <td>০৬)</td>
                                <td>নিবন্ধনের সময় দাখিলকৃত ও অনুমোদিত নির্বাহী কমিটি, গঠনতন্ন এবং সংস্থার ঠিকানার কোন
                                    রদবদল হলে তা সংশ্লিষ্ট
                                    জেলা প্রশাসক/ব্যুরোকে অবহিত করতে হবে। অন্যথায়, রদবদলকৃত নির্বাহী কমিটি, ঠিকানা ও
                                    গঠনতন্ত্র এবং উদ্ধ কমিটি
                                    কর্তৃক গৃহিত যে কোন সিদ্ধান্ত অবৈধ বলে গণ্য হবে।
                                </td>
                            </tr>
                            <tr>
                                <td>০৭)</td>
                                <td>প্রতি প্রকল্প/প্রকল্পবর্ষ শেষে ব্যুরো কর্তৃক তালিকাভুক্ত চার্টার্ড একাউন্টেন্ট ফার্ম
                                    দ্বারা সমস্ত হিসাবপত্র অডিট করাতে হবে
                                    এবং অডিট রিপোর্টের ০৩(তিন]টি অনুলিপি ও বার্ষিক প্রতিবেদন প্রকল্প/প্রকল্পবর্ষ
                                    সমাপ্তির ০২(দুই) মাসের মধ্যে ব্যুরোতে
                                    'দাখিল করতে হবে।
                                </td>
                            </tr>
                            <tr>
                                <td>০৮)</td>
                                <td>সংস্থার নিবন্ধনের সময় দাখিলকৃত বিদেশি দাতা বা দাতা সংস্থার প্রতিশ্রুতিপত্র মোতাবেক
                                    বিদেশি অনুদান দ্বারা
                                    প্রকল্প/কর্মসূচি বাস্তবায়ন শুরু করে তা নিবন্ধন প্রাপ্তি ০৬(ছয়) মাসের মধ্য ব্যুরোর
                                    নিবন্ধন শাখাকে অবহিত করতে হবে।
                                    অন্যথায়, মিথ্যা প্রতিশ্রুতিপত্র দাখিলের মাধ্যমে নিবন্ধন গ্রহণের কারণে প্রতারণার
                                    অভিযোগে আইন মোতাবেক সংস্থার
                                    নিবন্ধন ৰাতিলের কার্যক্রম গ্রহণ করা হবে।
                                </td>
                            </tr>
                            <tr>
                                <td>০৯)</td>
                                <td>সংস্থার অনুকূলে প্রাপ্ত সকল বৈদেশিক অনুদান (মাদার একাউন্টধারী ব্যাংকের নাম ও
                                    ঠিকানা)-এর হিসাৰ নং. ব্যাংক
                                    হিসাব নম্বর উল্লেখ করতে হবে)- এর মাধ্যমে গ্রহণ করতে হবে এবং এনজিও বিষয়ক ব্যুরো
                                    পুর্বানুমোদন ব্যতিত সংস্থার
                                    মাদার একাউন্ট পরিবর্তন/স্থানান্তর করা যাবে না।
                                </td>
                            </tr>
                            <tr>
                                <td>১০)</td>
                                <td>
                                    নিম্নবর্তীত বিষয়সমূহ অবশ্যই প্রতিপালন করতে হবেঃ
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>(০১)</td>
                                            <td>উপজাতীয় ও অ-উপজাতীয় বাসিন্দাদের মধ্যে সম্প্রীতির বিঘ্ন ঘটায় এমন কোন
                                                কার্যক্রম গ্রহণ করা যাবে না
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(০২)</td>
                                            <td>ধর্মীয় অনুভূতি বিরোধী কর্মকান্ড পরিচালনা এবং ধর্মান্তরিত করা যাবে না।
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(০৩)</td>
                                            <td>সাম্প্রদায়িক কাজে উস্কানি প্রদান করে এমন কোন কাজ করা যাবে না।</td>
                                        </tr>
                                        <tr>
                                            <td>(০৪)</td>
                                            <td>জাতীয় বা আঞ্চলিক নিরাপত্তা বিস্নিত করে এমন কোন কাজ করা যাবে না।</td>
                                        </tr>
                                        <tr>
                                            <td>(০৫)</td>
                                            <td>প্রত্যক্ষ বা পরোক্ষভাবে এমন কোন কার্মকান্ড করা যাবে না ঐ এলাকার
                                                অধিবাসীদের বিচ্ছিনতাবাদ বা গোষ্ঠীগত
                                                আন্দোলনে উৎসাহিত করে।
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(০৬)</td>
                                            <td>প্রত্যক্ষ বা পরোক্ষভাবে কোন রাজনৈতিক কর্মকান্ডে সম্পৃক্ত হতে পারবে না।
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(০৭)</td>
                                            <td>দেশী/বিদেশি বিচ্ছিন্নতাবাদী আন্দোলনরত কোন ব্যাক্তি/সংগঠন বা রাজনৈতিক
                                                দলের সাথে সংশ্লিষ্ট থেকে কোন
                                                উস্কানিমূলক কর্মকান্ড পরিচালনা করা যাবে না।
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>১১)</td>
                                <td>এনজিও বিষয়ক ব্যুরোর পূর্বানুমোদন ব্যতীত মাদার একাউন্ট হতে কোন অর্থ উত্তোলন করা হলে
                                    সংস্থা ও সংশ্লিষ্ট
                                    ব্যাংকের বিরুদ্ধে প্রয়োজনীয় আইনানুগ ব্যবস্থা গ্রহণ করা হবে।
                                </td>
                            </tr>
                            <tr>
                                <td>১২)</td>
                                <td>নিবন্ধন কর্তৃপক্ষ সময় সময় যে কোন শর্ত বা অনুশাসন জারী করলে তা মেনে চলতে হবে।</td>
                            </tr>
                        </table>
                        @else


                        <h5>Conditions applicable in the field of registration / renewal of registration</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>01)</td>
                                <td>Registration with the name of the organization in all communications with NGO affairs bureau
                                    Number and duration to be mentioned.
                                </td>
                            </tr>
                            <tr>
                                <td>02)</td>
                                <td>“Foreign Grants (Voluntary Activities) Regulation Act, by the concerned body.
                                    Laws, Rules, Circulars of 2016,
                                    Mandatory compliance with the terms and conditions given in respect of orders and registrations and renewals
                                    Must do Otherwise
                                    As per section 14 and 15 of the Act, action will be taken against the concerned organization.
                                </td>
                            </tr>
                            <tr>
                                <td>03)</td>
                                <td>This registration shall remain in force for 10 (ten) years unless the registration is canceled for any other reason
                                    and registration
                                    Application for renewal of registration should be made 06 (six) months prior to expiry. of that time
                                    Renewal of registration in
                                    If not applied for, the process of deregistration of the organization will be initiated.
                                </td>
                            </tr>
                            <tr>
                                <td>04)</td>
                                <td>of the project under the direct supervision of the concerned District Commissioner/DopZela Executive Officer
                                    Activities will be conducted. Where applicable
                                    Advice to the field level officers of concerned Ministries/Departments and Mantanalayas/Departments
                                    and cooperative activities
                                    can be managed. At the end of each project / project year concerned District Commissioner / Nirahi
                                    Officer's attestation concerned
                                    A supportive role should be played in close liaison with the authorities.
                                </td>
                            </tr>
                            <tr>
                                <td>05)</td>
                                <td>Taking up/implementing any project without prior approval of the Bureau of NGO Affairs, Foreign
                                    Recruiting consultants and overseas
                                    Donations cannot be accepted or exchanged.
                                </td>
                            </tr>
                            <tr>
                                <td>06)</td>
                                <td>No of the executive committee, constitution and address of the organization submitted and approved at the time of registration
                                    If there is a change, it is related
                                    District Commissioner/Bureau to be informed. Otherwise, the revised Executive Committee, address &
                                    Constitution and Standing Committee
                                    Any decision taken by it shall be considered invalid.
                                </td>
                            </tr>
                            <tr>
                                <td>07)</td>
                                <td>Chartered Accountant firm registered by the Bureau at the end of each project/project year
                                    All accounts should be audited by
                                    and 03(three) copies of Audit Report and Annual Report for the project/project year
                                    Bureau within 02 (two) months of completion
                                    Must submit.
                                </td>
                            </tr>
                            <tr>
                                <td>08)</td>
                                <td>As per the commitment letter of the foreign donor or donor organization submitted at the time of registration of the organization
                                    by foreign grants
                                    The Bureau within 06 (six) months of receipt of registration from the commencement of project/programme implementation
                                    Registration Branch should be informed.
                                    Otherwise, fraud by reason of obtaining registration by filing false affidavit
                                    Complaints to the agency as per law
                                    Registration process will be taken up.
                                </td>
                            </tr>
                            <tr>
                                <td>09)</td>
                                <td>All foreign grants received in favor of the organization (name of mother account holder bank and
                                    Address) Account No. Bank
                                    account number to be mentioned)- to be received through and Bureau of NGO Affairs
                                    Organizations without prior approval
                                    Mother account cannot be changed/transferred.
                                </td>
                            </tr>
                            <tr>
                                <td>10)</td>
                                <td>
                                    The following points must be observed:
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>(01)</td>
                                            <td>Any that disturb harmony between tribal and non-tribal residents
                                                Actions cannot be accepted.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(02)</td>
                                            <td>Conduct activities against religious sentiments and proselytize.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(03)</td>
                                            <td>No act shall be done which incites communal activities.</td>
                                        </tr>
                                        <tr>
                                            <td>(04)</td>
                                            <td>No action shall be taken which endangers national or regional security.</td>
                                        </tr>
                                        <tr>
                                            <td>(05)</td>
                                            <td>No such activities can be done directly or indirectly in that area
                                                Separatism or sectarianism of residents
                                                Encourages movement.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(06)</td>
                                            <td>Cannot be involved in any political activities directly or indirectly.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(07)</td>
                                            <td>Any person/organization or political person involved in domestic/foreign separatist movement
                                                Any from associated with the party
                                                Provocative activities cannot be conducted.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>11)</td>
                                <td>Any withdrawal of money from mother account without prior approval of Bureau of NGO Affairs
                                    Organizations and related
                                    Necessary legal action will be taken against the bank.
                                </td>
                            </tr>
                            <tr>
                                <td>12)</td>
                                <td>Any conditions or regulations issued by the Registration Authority from time to time shall be complied with.</td>
                            </tr>
                        </table>


                        @endif
                    </div>
                    <div class="tab-pane container fade" id="tof04">

                        <h5 class="pt-3">৫.৩ ডুপ্লিকেট সনদপত্রের জন্য প্রয়োজনীয় কাগজপত্রাদিঃ</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>ক)</td>
                                <td>'নিবদ্ধন/নবায়নের 'ডুপ্লিকেট' সনদ প্রাপ্তির জন্য আবেদন ফি বাবদ-১৩,০০০/-(তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০-১৮৩৬) চালানের কপি এবং ১৫%
                                    ভ্যাট (কোড নং-১-১১৩৩-০০৩৫-০৩১১)-প্রদানপূর্বক চালানের মুলকপিসহ</td>
                            </tr>
                            <tr>
                                <td>খ)</td>
                                <td>০২টি জাতীয় পত্রিকায় (হারানো বা চুরি হওয়ার ক্ষেত্রে) বিজ্ঞাপনের (মূলকপিসহ) কপি</td>
                            </tr>
                            <tr>
                                <td>গ)</td>
                                <td>হারানো বা চুরি হওয়ার ক্ষেত্রে সংশ্লিষ্ট জেলা/উপজেলার থানায় দাখিলকৃত ডায়েরির (জিডি'র) কপি</td>
                            </tr>
                            <tr>
                                <td>ঘ)</td>
                                <td>সনদপত্রের 'ডুপ্লিকেট' কপির জন্য নির্বাহী কমিটির সভার সত্যায়িত কার্যবিবরণীর (উপস্থিত সদস্যদের হাজিরাসহ) কপি।</td>
                            </tr>
                        </table>
                        <h5 class="pt-3">৫.৪ গঠনতন্ত্র পরিবর্তন/অনুমোদনের জন্য প্রয়োজনীয় কাগজপত্রাদিঃ</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>ক)</td>
                                <td>প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত গঠনতন্ত্রের সত্যায়িত কপি</td>
                            </tr>
                            <tr>
                                <td>খ)</td>
                                <td>সংস্থার চেয়ারম্যান ও সেক্রেটারী কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্রের পরিচ্ছন্ন কপি</td>
                            </tr>
                            <tr>
                                <td>গ)</td>
                                <td>গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ফি জমা প্রদানের চালানের মূলকপিসহ</td>
                            </tr>
                            <tr>
                                <td>ঘ)</td>
                                <td>গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ও সংযোজনের বিষয়ে সাধারণ</td>
                            </tr>
                            <tr>
                                <td>ঙ)</td>
                                <td>পূর্ববর্তী গঠনতন্ত্র ও বর্তমান গঠনতন্ত্রের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও
                                    সম্পাদকের যৌথ স্বাক্ষরসহ)</td>
                            </tr>
                        </table>
                        <h5 class="pt-3">৫.৫ নির্বাহী কমিটি অনুমোদনের জন্য প্রয়োজনীয় কাগজপত্রাদি:</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>ক)</td>
                                <td>ফরম নং-৮ মোতাবেক নির্বাহী কমিটির তালিকা (সভাপতি ও সম্পাদকের যৌথ স্বাক্ষরিত)</td>
                            </tr>
                            <tr>
                                <td>খ)</td>
                                <td>নির্বাহী কমিটির সদস্যদের জাতীয় পরিচয়পত্রের সত্যায়িত কপি ও পাসপোর্ট সাইজের
                                    সত্যায়িত ছবি</td>
                            </tr>
                            <tr>
                                <td>গ)</td>
                                <td>প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির সত্যায়িত তালিকা</td>
                            </tr>
                            <tr>
                                <td>ঘ)</td>
                                <td>নির্বাহ কমিটি গঠন সংক্রান্ত সাধারণ সভার কার্যবিবরণী (হাজিরাসহ) সত্যায়িত কপি</td>
                            </tr>
                            <tr>
                                <td>ঙ)</td>
                                <td>সর্বশেষ সাধারণ সদস্যদের স্বাক্ষরসহ নামের তালিকা (সদস্যের নাম, পিত/মাতার নাম,
                                    স্বামী/স্ত্রীর নাম, বর্তমান ও স্থায়ী ঠিকানা, জাতীয় পরিচয় পত্র নম্বর, মোবাইল নম্বর ও
                                    ইমেইল এড্রেসসহ)</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')


<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {

            email: {
                required: true
            },
            password: {
                required: true
            }


        },


               messages:
 {

            email: {
                required: " Email Field is required"
            },

            password: {
                required: "Password Field is required"
            },




 }
    });
});
</script>

@endsection
