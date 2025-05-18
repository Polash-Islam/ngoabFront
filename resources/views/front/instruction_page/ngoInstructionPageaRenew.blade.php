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
                        <a class="nav-link active" data-bs-toggle="tab" href="#tof02">তফসিল ০৩</a>
                    </li>

                </ul>
                @else

                <div class="others_inner_section pb-4">
                    <h1>Instructions</h1>
                    <div class="notice_underline"></div>
                </div>
                <ul class="nav nav-tabs custom_tab">

                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tof02">Schedule 03</a>
                    </li>

                </ul>

                @endif

                <!-- Tab panes -->
                <div class="tab-content custom_tab_content">

                    <div class="tab-pane container active" id="tof02">

                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h5>৩.১ নিবন্ধন সনদ নবায়ন আবেদনের সাথে সংযোজিতব্য কাগজপত্র এবং তথ্যাদি (দেশী এনজিও'র নিবন্ধন
                            নবায়নের জন্য)</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>ক)</td>
                                <td>পূরণকৃত এফডি-৮ ফরম;</td>
                            </tr>
                            <tr>
                                <td>খ)</td>
                                <td>ফরম-৮ মোতাবেক কার্যনির্বাহী কমিটির সদস্যদের তালিকা:</td>
                            </tr>
                            <tr>
                                <td>গ)</td>
                                <td>নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ জাতীয় পরিচয়পত্রের সত্যায়িত অনুলিপি:
                                </td>
                            </tr>
                            <tr>
                                <td>ঘ)</td>
                                <td>প্রাথমিক নিবন্ধনকারী কর্তৃপক্ষের অনুমোদিত গঠনতন্ত্রের সত্যায়িত অনুলিপি;</td>
                            </tr>
                            <tr>
                                <td>ঙ)</td>
                                <td>নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত অনুলিপি;</td>
                            </tr>
                            <tr>
                                <td>চ)</td>
                                <td>উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ নির্বাহী কমিটি অনুমোদন
                                    সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি;
                                </td>
                            </tr>
                            <tr>
                                <td>ছ)</td>
                                <td>সংস্থার গঠনতন্ত্র পরিবর্তন হয়নি মর্মে সভাপতি এবং সাধারণ সম্পাদকের যৌথ স্বাক্ষরে
                                    প্রত্যয়নপত্র;
                                </td>
                            </tr>
                            <tr>
                                <td>জ)</td>
                                <td>সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ জমাদানের
                                    মূলকপিসহ তার সত্যায়িত অনুলিপি অথবা সংস্থার গঠনতন্ত্র
                                    পরিবর্তন না হয়ে থাকলে "পরিবর্তন হয়নি' মর্মে প্রত্যয়নের অনুলিপি;
                                </td>
                            </tr>
                            <tr>
                                <td>ঝ)</td>
                                <td>সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্ট এবং বার্ষিক প্রতিবেদনের
                                    সত্যায়িত অনুলিপি;
                                </td>
                            </tr>
                            <tr>
                                <td>ঞ)</td>
                                <td>অন্য কোন আইনে নিবন্ধিত হলে সংশ্লিষ্ট কর্তৃপক্ষের অনুমোদিত নির্বাহী
                                    কমিটির তালিকার সত্যায়িত অনুলিপি;
                                </td>
                            </tr>
                            <tr>
                                <td>ট)</td>
                                <td>সর্বশেষ নিবন্ধন/নবায়ন সনদের সত্যায়িত অনুলিপি;</td>
                            </tr>
                            <tr>
                                <td>ঠ)</td>
                                <td>Right to Information Act-2009-এর আওতায় Focal Point নিয়োগ করত: ব্যুরোকে অবহিতকরণ
                                    পত্রের অনুলিপি;
                                </td>
                            </tr>
                            <tr>
                                <td>ড)</td>
                                <td>সংস্থার নিকট তফফিল-১ এ বর্ণিত যেকোন ফি এর উপর কোন বকেয়া
                                    ভ্যাট থাকলে চালানমূলে জমা প্রদানের প্রমাণক;
                                </td>
                            </tr>
                            <tr>
                                <td>ঢ)</td>
                                <td>নিবদ্ধনকালীন দাখিলকৃত সাধারণ ও নির্বাহী কমিটির তালিকা এবং বর্তমান
                                    সাধারণ সদস্য ও নির্বাহী কমিটির তালিকা;
                                </td>
                            </tr>
                            <tr>
                                <td>ণ)</td>
                                <td>বিগত ১০ বছরে বৈদেশিক অনুদানে পরিচালিত কার্যক্রমের সংক্ষিপ্ত বিবরণ
                                    (সংযুক্ত ছক অনুযায়ী):
                                </td>
                            </tr>
                        </table>
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
                        @else


                        <h5>3.1 Documents and information to be attached with the application for renewal of registration certificate (for renewal of registration of indigenous NGOs)</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>a)</td>
                                <td>Filled FD-8 form;</td>
                            </tr>
                            <tr>
                                <td>b)</td>
                                <td>List of Executive Committee members as per Form-8:</td>
                            </tr>
                            <tr>
                                <td>c)</td>
                                <td>Attested copy of national identity card with passport size photograph of executive committee members:
                                </td>
                            </tr>
                            <tr>
                                <td>d)</td>
                                <td>Attested copy of constitution approved by primary registering authority;</td>
                            </tr>
                            <tr>
                                <td>e)</td>
                                <td>Attested copy of registration renewal fee deposit invoice along with original;</td>
                            </tr>
                            <tr>
                                <td>f)</td>
                                <td>Executive committee approval with signed list of attendance of general members present
                                    Certified copy of the minutes of the general meeting;
                                </td>
                            </tr>
                            <tr>
                                <td>g)</td>
                                <td>The joint signature of the president and general secretary states that the constitution of the organization has not changed
                                    Certificate;
                                </td>
                            </tr>
                            <tr>
                                <td>h)</td>
                                <td>If the constitution of the company is changed, the payment for VAT along with the prescribed fee
                                    Attested copy of the same with original or constitution of the company
                                    Copy of attestation as “Not Changed” if not changed;
                                </td>
                            </tr>
                            <tr>
                                <td>i)</td>
                                <td>Audit report and annual report of the last 10 (ten) years of the organization
                                    Attested copy;
                                </td>
                            </tr>
                            <tr>
                                <td>j)</td>
                                <td>An authorized executive of the concerned authority if registered under any other law
                                    Attested copy of committee list;
                                </td>
                            </tr>
                            <tr>
                                <td>k)</td>
                                <td>Attested copy of latest registration/renewal certificate;</td>
                            </tr>
                            <tr>
                                <td>l)</td>
                                <td>Focal Point appointed under Right to Information Act-2009: Notification to Bureau
                                    Copy of letter;
                                </td>
                            </tr>
                            <tr>
                                <td>m)</td>
                                <td>Any arrears due to the Company on any fees mentioned in Schedule-1
                                    Proof of payment on invoice if VAT is applicable;
                                </td>
                            </tr>
                            <tr>
                                <td>n)</td>
                                <td>List of General and Executive Committees filed and current
                                    List of General Members and Executive Committee;
                                </td>
                            </tr>
                            <tr>
                                <td>o)</td>
                                <td>Brief description of activities carried out with foreign grants in the last 10 years
                                    (as per attached table):
                                </td>
                            </tr>
                        </table>
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

                        @endif

                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h5 class="pt-4">নিবন্ধন সনদ নবায়ন আবেদনের সাথে সংযুক্ত প্রযোজ্য কাগজপত্র এবং তথ্যাদি (বিদেশি
                            এনজিও'র নিবন্ধন নবায়নের জন্য)</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>ক)</td>
                                <td>পূরণকৃত এফডি-৮ ফরম</td>
                            </tr>
                            <tr>
                                <td>খ)</td>
                                <td>বোর্ড অব ডিরেক্টরস/বোর্ড অব ট্রাষ্টিজ তালিকা (সংশ্লিষ্ট দেশের পিস
                                    অব জাস্টিস কর্তৃক নোটারীকৃত/সত্যায়িত)
                                </td>
                            </tr>
                            <tr>
                                <td>গ)</td>
                                <td>সংস্থার বাই লজ (By laws)/গঠনতন্ত্র (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক
                                    নোটারীকৃত/সত্যায়িত)
                                </td>
                            </tr>
                            <tr>
                                <td>ঘ)</td>
                                <td>নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত
                                    অনুলিপি
                                </td>
                            </tr>
                            <tr>
                                <td>ঙ)</td>
                                <td>সংস্থার বোর্ড অব ডিরেন্টরস/বোর্ড অব ট্রাষ্টিজ সভার কার্যবিবরণীর
                                    (কার্যবিবরণীতে বোর্ড গঠন সংক্রান্ত, নিবন্ধন নবায়ন করার প্রস্তাব, গঠনতন্ত্র পরিবর্তন
                                    সংক্রান্ত বিষয়াদি উল্লেখপূর্বক) (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক
                                    নোটারীকৃত/সত্যায়িত)
                                </td>
                            </tr>
                            <tr>
                                <td>চ)</td>
                                <td>সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ
                                    জমাদানের মূলকপিসহ তার সত্যায়িত অনুলিপি অথবা সংস্থার গঠনতন্ত্র
                                    পরিবর্তন না হয়ে থাকলে "পরিবর্তন হয়নি' মর্মে প্রত্যয়ন পত্রের কপি সংশ্লিষ্ট (দেশের
                                    পিস অব জাস্টিস কর্তৃক নোটারীকৃত/ সত্যায়িত)
                                </td>
                            </tr>
                            <tr>
                                <td>ছ)</td>
                                <td>সংস্থার বিগত ১০(দশ) বছরের অডিট রিপোর্ট এবং বার্ষিক প্রতিবেদনের সত্যায়িত অনুলিপি;</td>
                            </tr>
                            <tr>
                                <td>জ)</td>
                                <td>সংস্থার মূল কার্যালয়ের নিবন্ধনপত্রের (সংশ্লিষ্ট দেশের নোটারীকৃত/সত্যায়িত) অনুলিপি
                                </td>
                            </tr>
                            <tr>
                                <td>ঝ)</td>
                                <td>সর্বশেষ নিবন্ধন/নবায়ন সনদপত্রের ২টি সত্যায়িত অনুলিপি</td>
                            </tr>
                            <tr>
                                <td>ঞ)</td>
                                <td>Right to Information Act-২০০৯ এর আওতায়
                                    Focal Point নিয়োগ করত: ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি
                                </td>
                            </tr>
                            <tr>
                                <td>ট)</td>
                                <td>সংস্থার নিকট তফফিল -১ বর্ণিত যেকোন ফি এর উপর কোন বকেয়া
                                    ভ্যাট থাকলে তাহা চালানমুলে জমা প্রদানের প্রমাণক;
                                </td>
                            </tr>
                            <tr>
                                <td>ঠ)</td>
                                <td>সংস্থার বিগত ১০ বছরে বৈদেশিক অনুদানে পরিচালিত কার্যক্রমের
                                    সংক্ষিপ্ত বিবরণ
                                </td>
                            </tr>
                        </table>
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
                            </tr>
                        </table>
                        @else
                        <h5 class="pt-4">Applicable documents and information attached with application for renewal of registration certificate (for renewal of registration of foreign NGO)</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>a)</td>
                                <td>Filled FD-8 form</td>
                            </tr>
                            <tr>
                                <td>b)</td>
                                <td>List of Board of Directors/Board of Trustees (concerned country piece
                                    Notarized/Attested by Of Justice)
                                </td>
                            </tr>
                            <tr>
                                <td>c)</td>
                                <td>By laws/constitution of the organization (by the Peace of Justice of the concerned country)
                                    Notarized/Attested)
                                </td>
                            </tr>
                            <tr>
                                <td>d)</td>
                                <td>Attested along with original copy of registration renewal fee submission challan
                                    copy
                                </td>
                            </tr>
                            <tr>
                                <td>e)</td>
                                <td>Minutes of Board of Directors/Board of Trustees meeting of the organization
                                    (Regarding board formation in minutes, proposal to renew registration, change in constitution
                                    ) (by the Peace of Justice of the concerned country
                                    Notarized/Attested)
                                </td>
                            </tr>
                            <tr>
                                <td>f)</td>
                                <td>If the constitution of the company is changed, the amount due to VAT along with the prescribed fee
                                    Attested copy of the submission along with its original or constitution of the company
                                    If there is no change, copy of the certificate as “No Change” concerned (Country
                                    Notarized/Attested by Peace of Justice)
                                </td>
                            </tr>
                            <tr>
                                <td>g)</td>
                                <td>Attested copy of last 10 (ten) years audit report and annual report of the company;</td>
                            </tr>
                            <tr>
                                <td>h)</td>
                                <td>Copy of registration certificate (notarized/attested in the concerned country) of the head office of the company
                                </td>
                            </tr>
                            <tr>
                                <td>i)</td>
                                <td>2 attested copies of latest registration/renewal certificate</td>
                            </tr>
                            <tr>
                                <td>j)</td>
                                <td>Under Right to Information Act-2009
                                    Appointed Focal Point: Copy of notification letter to Bureau
                                </td>
                            </tr>
                            <tr>
                                <td>k)</td>
                                <td>Any arrears of any fees mentioned in Annexure-1 to the Company
                                    If there is VAT, it is proof of payment on the invoice;
                                </td>
                            </tr>
                            <tr>
                                <td>l)</td>
                                <td>Activities conducted by the organization in the last 10 years with foreign grants
                                    Brief description
                                </td>
                            </tr>
                        </table>
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
