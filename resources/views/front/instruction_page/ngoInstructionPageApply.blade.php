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
                        <a class="nav-link active" data-bs-toggle="tab" href="#tof01">তফসিল ০২</a>
                    </li>

                </ul>
                @else

                <div class="others_inner_section pb-4">
                    <h1>Instructions</h1>
                    <div class="notice_underline"></div>
                </div>
                <ul class="nav nav-tabs custom_tab">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tof01">Schedule 02</a>
                    </li>

                </ul>
                @endif

                <!-- Tab panes -->
                <div class="tab-content custom_tab_content">
                    <div class="tab-pane container active" id="tof01">
                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h5>২.১ বৈদেশিক অনুদান গ্রহণক্রমে স্বেচ্ছাসেবামূলক কার্যক্রম পরিচালনার জন্য নিবন্ধনের
                            আবেদনপত্রের সাথে
                            প্রযোজ্য কাগজপত্র এবং তথ্যাদি (দেশী এনজিও'র ক্ষেত্রে)</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>(ক)</td>
                                <td>পূরণকৃত এফডি-১ ফরম</td>
                            </tr>
                            <tr>
                                <td>(খ)</td>
                                <td> ফরম-৮ অনুযায়ী সংস্থার কার্যনির্বাহী কমিটির সদস্যদের তালিকা</td>
                            </tr>
                            <tr>
                                <td>(গ)</td>
                                <td>নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবি ও জাতীয় পরিচয়পত্রের সত্যায়িত
                                    অনুলিপি
                                </td>
                            </tr>
                            <tr>
                                <td>(ঘ)</td>
                                <td>প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকা ও
                                    নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি
                                </td>
                            </tr>
                            <tr>
                                <td>(ঙ)</td>
                                <td>গঠনতন্ত্রের (প্রাথমিক নিবন্ধন কর্তৃপক্ষ কর্তৃক অনুমোদিত) সত্যায়িত
                                    অনুলিপি
                                </td>
                            </tr>
                            <tr>
                                <td>(চ)</td>
                                <td>সংস্থার কার্যক্রম প্রতিবেদন</td>
                            </tr>
                            <tr>
                                <td>(ছ)</td>
                                <td>প্ল্যান অব অপারেশন (কর্ম পদ্ধতি, অর্গানোগ্রাম, সভাপতি কর্তৃক
                                    স্বাক্ষরিত)
                                </td>
                            </tr>
                            <tr>
                                <td>(জ)</td>
                                <td>দাতা সংস্থার প্রতিশ্রুতিপত্র (সংস্থা প্রধান কর্তৃক সত্যায়িত)</td>
                            </tr>
                            <tr>
                                <td>(ঝ)</td>
                                <td>কোড নং- ১-০৩২৩-০০০০-১৮৩৬-এ তফসিল-১ এ নির্ধারিত ফি জমা
                                    প্রদান করে ট্রেজারি চালানের মূল কপিসহ
                                </td>
                            </tr>
                            <tr>
                                <td>(ঞ)</td>
                                <td> প্রদেয় ফি এর উপর জাতীয় রাজস্ব বোর্ডের নির্ধারিত কোড নং-  ১১১৩৩-০০৩৫-০৩১১ এ ১৫% ভ্যাট বাবদ অর্থ জমা প্রদান করে ট্রেজারি
                                    চালানের মূলকপিসহ
                                </td>
                            </tr>
                            <tr>
                                <td>(ট)</td>
                                <td>সংস্থার নির্বাহী কমিটি গঠন সংক্রান্ত সাধারণ সভার কার্যবিবরণীর
                                    সত্যায়িত অনুলিপি (উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত
                                    তালিকাসহ)
                                </td>
                            </tr>
                            <tr>
                                <td>(ঠ)</td>
                                <td>সংস্থার সাধারণ সদস্যদের নামের তালিকা (প্রত্যেক সদস্যের স্বাক্ষরসহ নাম, পিতা/মাতা, স্বামী স্ত্রী'র নাম ও ঠিকানা, জাতীয় পরিচয়পত্র নম্বর)
                                </td>
                            </tr>
                        </table>
                        @else
                        <h5>2.1 Documents and information as applicable with application for registration for conducting voluntary activities by accepting foreign donations (in case of domestic NGOs)</h5>


                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>(01)</td>
                                <td>Filled FD-1 form</td>
                            </tr>
                            <tr>
                                <td>(02)</td>
                                <td> List of Executive Committee members of the organization as per Form-8</td>
                            </tr>
                            <tr>
                                <td>(03)</td>
                                <td>Attested copy of passport size photograph and national identity card of executive committee members
                                </td>
                            </tr>
                            <tr>
                                <td>(04)</td>
                                <td>List of authorized executive committee of primary registering authority and
                                    Attested copy of registration certificate
                                </td>
                            </tr>
                            <tr>
                                <td>(05)</td>
                                <td>Attestation of the constitution (approved by the primary registration authority).
                                    copy
                                </td>
                            </tr>
                            <tr>
                                <td>(06)</td>
                                <td>Activity report of the organization</td>
                            </tr>
                            <tr>
                                <td>(07)</td>
                                <td>Plan of Operation (Working Procedure, Organogram, by President
                                    signed)
                                </td>
                            </tr>
                            <tr>
                                <td>(08)</td>
                                <td>Affidavit of Donor Organization (Attested by Head of Organization)</td>
                            </tr>
                            <tr>
                                <td>(09)</td>
                                <td>Deposit of Fee prescribed in Schedule-1 in Code No. 1-0323-0000-1836
                                    along with the original copy of the treasury challan provided
                                </td>
                            </tr>
                            <tr>
                                <td>(10)</td>
                                <td> Treasury deposits 15% VAT on fees payable to National Board of Revenue Code No. 11133-0035-0311
                                    Along with the original copy of the invoice
                                </td>
                            </tr>
                            <tr>
                                <td>(11)</td>
                                <td>Minutes of the general meeting regarding the formation of the executive committee of the organization
                                    Attested copy (signed in presence of ordinary members present
                                    with list)
                                </td>
                            </tr>
                            <tr>
                                <td>(12)</td>
                                <td>List of names of general members of the organization (name with signature of each member, father/mother, name and address of husband and wife, national identity card number)
                                </td>
                            </tr>
                        </table>
                        @endif

                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h5 class="pt-4">২.২ বৈদেশিক অনুদান গ্রহণক্রমে স্বেচ্ছাসেবামূলক কার্যক্রম পরিচালনার জন্য
                            নিবন্ধনের আবেদনপত্রের সাথে
                            সংযুক্ত প্রযোজ্য কাগজপত্র এবং তথ্যাদি (বিদেশি এনজিও'র ক্ষেত্রে):</h5>
                        <p>বিদেশী অনুদান (স্বেচ্ছাসেবী কার্যক্রম) প্রবিধান: আইন, ২০১৬</p>

                        <table class="table table-borderless pt-4 instruction_table">
                            <tr>
                                <td>(01)</td>
                                <td>FD-1 Form (Signed by Chief Executive in Bangladesh)</td>
                            </tr>
                            <tr>
                                <td>(02)</td>
                                <td>Certificate of Incorporation in the Country of Origin</td>
                            </tr>
                            <tr>
                                <td>(03)</td>
                                <td>Constitution</td>
                            </tr>
                            <tr>
                                <td>(04)</td>
                                <td>Activities Report</td>
                            </tr>
                            <tr>
                                <td>(05)</td>
                                <td>Plan of Operation (Work/Organogram)</td>
                            </tr>
                            <tr>
                                <td>(06)</td>
                                <td>Decision of the Committee/ Board to open office in
                                    Bangladesh
                                </td>
                            </tr>
                            <tr>
                                <td>(07)</td>
                                <td>Letter of Appointment of the Country Representative</td>
                            </tr>
                            <tr>
                                <td>(08)</td>
                                <td>Copy of Treasury Chalan in support of depositing US$ 9,000 or Equivalent TK amount in
                                    the Code 1-0323-0000-1836 and 15% Vat Code No (1-1133-0035-0311)
                                </td>
                            </tr>
                            <tr>
                                <td>(09)</td>
                                <td>Deed of agreement Stamp of TK.300/-with the landlord in Support of opening the
                                    office in Banladesh
                                </td>
                            </tr>
                            <tr>
                                <td>(10)</td>
                                <td>List of Executive Committee (foreign)</td>
                            </tr>
                            <tr>
                                <td>(11)</td>
                                <td>Letter of Intent</td>
                            </tr>

                            <tr>
                                <td colspan="2">Note: All documents from aboard should be notarized by Peace of Justice or attested by Concern Embassy of Bangladesh</td>

                            </tr>

                        </table>


                        @else
                        <h5 class="pt-4">2.2 For carrying out voluntary activities by accepting foreign donations
                            Along with the application for registration
                            Attached applicable documents and information (in case of foreign NGOs):</h5>
                        <p>Foreign Donations (Voluntary Activities) Regulations :Act, 2016</p>
                        <table class="table table-borderless pt-4 instruction_table">
                            <tr>
                                <td>(01)</td>
                                <td>FD-1 Form (Signed by Chief Executive in Bangladesh)</td>
                            </tr>
                            <tr>
                                <td>(02)</td>
                                <td>Certificate of Incorporation in the Country of Origin</td>
                            </tr>
                            <tr>
                                <td>(03)</td>
                                <td>Constitution</td>
                            </tr>
                            <tr>
                                <td>(04)</td>
                                <td>Activities Report</td>
                            </tr>
                            <tr>
                                <td>(05)</td>
                                <td>Plan of Operation (Work/Organogram)</td>
                            </tr>
                            <tr>
                                <td>(06)</td>
                                <td>Decision of the Committee/ Board to open office in
                                    Bangladesh
                                </td>
                            </tr>
                            <tr>
                                <td>(07)</td>
                                <td>Letter of Appointment of the Country Representative</td>
                            </tr>
                            <tr>
                                <td>(08)</td>
                                <td>Copy of Treasury Chalan in support of depositing US$ 9,000 or Equivalent TK amount in
                                    the Code 1-0323-0000-1836 and 15% Vat Code No (1-1133-0035-0311)
                                </td>
                            </tr>
                            <tr>
                                <td>(09)</td>
                                <td>Deed of agreement Stamp of TK.300/-with the landlord in Support of opening the
                                    office in Banladesh
                                </td>
                            </tr>
                            <tr>
                                <td>(10)</td>
                                <td>List of Executive Committee (foreign)</td>
                            </tr>
                            <tr>
                                <td>(11)</td>
                                <td>Letter of Intent</td>
                            </tr>

                            <tr>
                                <td colspan="2">Note: All documents from aboard should be notarized by Peace of Justice or attested by Concern Embassy of Bangladesh</td>

                            </tr>

                        </table>
                        @endif
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
