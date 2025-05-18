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
                        <a class="nav-link active" data-bs-toggle="tab" href="#tof04">তফসিল ০৫</a>
                    </li>
                </ul>
                @else
                <div class="others_inner_section pb-4">
                    <h1>Instructions</h1>
                    <div class="notice_underline"></div>
                </div>
                <ul class="nav nav-tabs custom_tab">

                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tof04">Schedule 05</a>
                    </li>
                </ul>

                @endif

                <!-- Tab panes -->
                <div class="tab-content custom_tab_content">

                    <div class="tab-pane container active" id="tof04">

                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h5>৫.১ দেশী এনজিও'র নাম পরিবর্তনের জন্য প্রয়োজনীয় তথ্যাবলী :</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>ক)</td>
                                <td>০২টি জাতীয় পত্রিকায় ( বাংলা ও ইংরেজী পত্রিকায় "নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের
                                    মূলকপি
                                </td>
                            </tr>
                            <tr>
                                <td>খ)</td>
                                <td>নাম পরিবর্তন ফি বাবদ-২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০-
                                    ১৮৩৬) চালানের মূলকপিসহ অনুলিপি
                                </td>
                            </tr>
                            <tr>
                                <td>গ)</td>
                                <td>গঠনতন্ত্র পরিবর্তন ফি বাবদ-১৩,০০০/ (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০-
                                    ১৮৩৬) চালানের মূলকপিসহ
                                </td>
                            </tr>
                            <tr>
                                <td>ঘ)</td>
                                <td>ফরম-৮ মোতাবেক নির্বাহী কমিটির তালিকা</td>
                            </tr>
                            <tr>
                                <td>ঙ)</td>
                                <td>নির্বাহী কমিটির সদস্যদের ভোটার আইডি কার্ডের ফটোকপিসহ সত্যায়িত পাসপোর্ট
                                    সাইজের ছবি
                                </td>
                            </tr>
                            <tr>
                                <td>চ)</td>
                                <td>৩০০/তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি</td>
                            </tr>
                            <tr>
                                <td>ছ)</td>
                                <td>এনজিও বিষয়ক ব্যুরোর মুল সনদপত্র</td>
                            </tr>
                            <tr>
                                <td>জ)</td>
                                <td>পরিবর্তিত নামে প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের সত্যায়িত সনদপত্রের কপি</td>
                            </tr>
                            <tr>
                                <td>ঝ)</td>
                                <td>প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত
                                    কপি
                                </td>
                            </tr>
                            <tr>
                                <td>ঞ)</td>
                                <td>সর্বশেষ সাধারণ সদস্যদের তালিকা</td>
                            </tr>
                            <tr>
                                <td>ট)</td>
                                <td>নাম পরিবর্তন সংক্রান্ত বিষয়ে সাধারণ সভার কা্যবিবরণীর (উপস্থিত সদস্যদের
                                    তালিকাসহ) সত্যায়িত কপি
                                </td>
                            </tr>
                            <tr>
                                <td>ঠ)</td>
                                <td>পূর্ববর্তী নামের সকল দায়-দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে
                                    মর্মে
                                    অংগীকার নামা (সভাপতি ও সাধারণ সম্পাদক কর্তৃক স্বাক্ষরিত)।
                                </td>
                            </tr>
                            <tr>
                                <td>ড)</td>
                                <td>দাখিলকৃত চালানের ডপর ১৫% ভ্যাট নির্ধারিত কোডে জমাপূর্বক চালানের মূলকলিসহ (কোড
                                    নং-১-১১৩৩-০০৩৫-০৩১১)
                                </td>
                            </tr>
                            <tr>
                                <td>ঢ)</td>
                                <td>২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন/নাম
                                    পরিবর্তন/গঠনতন্ত্রের যে কোন ধারা পরিবর্তনের বিষয়ে দাখিলকৃত ফি এর উপর ১৫%
                                    বকেয়া ভ্যাট (যদি ইতোমধ্যে প্রদান না করা হয়ে থাকে) সংশ্লিষ্ট কোডে জমাপূর্বক চালানের
                                    মুলকপিসহ
                                </td>
                            </tr>
                        </table>
                        @else


                        <h5>5.1 Information required for changing the name of a local NGO:</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>a)</td>
                                <td>02 national newspapers (Bengali and English newspapers) "Ad about name change
                                    original copy
                                </td>
                            </tr>
                            <tr>
                                <td>b)</td>
                                <td>Name Change Fee- 26,000/- (Twenty Six Thousand) Rupees (Code No-1-0323-0000-
                                    1836) copy with original of invoice
                                </td>
                            </tr>
                            <tr>
                                <td>c)</td>
                                <td>13,000/ (thirteen thousand) Taka (Code No.-1-0323-0000-
                                    1836) with original copy of invoice
                                </td>
                            </tr>
                            <tr>
                                <td>d)</td>
                                <td>List of Executive Committee as per Form-8</td>
                            </tr>
                            <tr>
                                <td>e)</td>
                                <td>Attested passport with photocopy of voter ID card of executive committee members
                                    size picture
                                </td>
                            </tr>
                            <tr>
                                <td>f)</td>
                                <td>300/-(Three Hundred) Copy of Affidavit regarding change of name on stamp of Rs</td>
                            </tr>
                            <tr>
                                <td>g)</td>
                                <td>Original Certificate of Bureau of NGO Affairs</td>
                            </tr>
                            <tr>
                                <td>h)</td>
                                <td>Copy of attested certificate from authority issuing primary registration in changed name</td>
                            </tr>
                            <tr>
                                <td>i)</td>
                                <td>Attestation of the list of authorized executive committee of the primary registering authority
                                    copy
                                </td>
                            </tr>
                            <tr>
                                <td>j)</td>
                                <td>List of Latest General Members</td>
                            </tr>
                            <tr>
                                <td>k)</td>
                                <td>Minutes of General Meeting (members present) regarding change of name
                                    with list) attested copy
                                </td>
                            </tr>
                            <tr>
                                <td>l)</td>
                                <td>All liabilities of the former name shall now be transferred to the company under the changed name
                                    in the sense
                                    Signature (signed by President and General Secretary).
                                </td>
                            </tr>
                            <tr>
                                <td>m)</td>
                                <td>15% VAT on submitted invoices including originals of invoices deposited in the prescribed code (Code
                                    No-1-1133-0035-0311)
                                </td>
                            </tr>
                            <tr>
                                <td>n)</td>
                                <td>Registration/renewal of registration/name of organization from FY 2010-2011 till date
                                    15% on filing fee in respect of alteration/alteration of any clause of constitution
                                    Due VAT (if not already paid) on the invoice credited to the relevant code
                                    With cabbage
                                </td>
                            </tr>
                        </table>


                        @endif

                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                        <h5 class="pt-4">৫.২ বিদেশি এনজিও'র নাম পরিবর্তনের জন্য প্রয়োজনীয় তথ্যাবলী</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>ক)</td>
                                <td>২টি জাতীয় পত্রিকায় ( বাংলা ও ইংরেজী পত্রিকায় ) নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের
                                    মূলকপিসহ
                                </td>
                            </tr>
                            <tr>
                                <td>খ)</td>
                                <td>নাম পরিবর্তন ফি বাবদ-২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩- ০০০০-১৮৩৬)
                                    চালানের মূলকপি এবং ১৫% ভ্যাট (কোড নং-১-১১৩৩-০০৩৫-০৩১১) প্রদানপূর্বক চালানের মূলকপিসহ
                                </td>
                            </tr>
                            <tr>
                                <td>গ)</td>
                                <td>গঠনতন্ত্র পরিবর্তন ফি বাবদ-১৩,০০০/-(তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০-১৮৩৬)
                                    চালানের মুলকপি এবং ১৫% ভ্যাট (কোড নং-১-১১৩৩-০০৩৫-০৩১১)জমাপূর্বক চালানের মূলকপিসহ
                                </td>
                            </tr>
                            <tr>
                                <td>ঘ)</td>
                                <td>সংশ্লিষ্ট দেশের বোর্ড অব ডিরেক্টরস/বোর্ড অব ট্রাষ্টির তালিকা (সংশ্লিষ্ট দেশের পিস
                                    অৰ জাস্টিস কর্তৃক নোটারীকৃত)
                                </td>
                            </tr>
                            <tr>
                                <td>ঙ)</td>
                                <td>নাম পরিবর্তন বিষয়ে সংশ্লিষ্ট দেশের বোর্ড অব ডিরেন্টরস/বোর্ড অব ট্রাস্টির সিদ্ধান্তের কপি (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত মূলকপিসহ)
                                </td>
                            </tr>
                            <tr>
                                <td>চ)</td>
                                <td>৩০০/(তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর মুলকপিসহ</td>
                            </tr>
                            <tr>
                                <td>ছ)</td>
                                <td>এনজিও বিষয়ক ব্যুরোর মূল সনদপত্র</td>
                            </tr>
                            <tr>
                                <td>জ)</td>
                                <td>সংস্থার পরিবর্তিত নামের সনদপত্রইনকর্পোরেট সার্টিফিকেট (সংশ্লিষ্ট দেশের নোটারীকৃত মূলকপি)</td>
                            </tr>
                            <tr>
                                <td>ঝ)</td>
                                <td>সংস্থার পরিবর্তিত নামের বাই লজ(By laws)/গঠনতন্ত্রের কপি (সংশ্লিষ্ট দেশের
                                    পিস অব জাস্টিস কর্তৃক নোটারীকৃত মূলকপিসহ)</td>
                            </tr>
                            <tr>
                                <td>ঞ)</td>
                                <td>সংস্থার পূর্ববর্তী নামের সকল দায়-দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার
                                    উপর বর্তাইবে মর্মে অংগীকার নামা (সংস্থা প্রধান কর্তৃক স্বাক্ষরিত)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবদ্ধন নবায়ন/নাম পরিবর্তন/গঠনতন্ত্রের যে কোন ধারা পরিবর্তনের বিষয়ে দাখিলকৃত ফি এর উপর
                                    ১৫% বকেয়া ভ্যাট (যদি ইতোমধ্যে প্রদান না করা হয়ে থাকে) সংশ্লিষ্ট কোডে জমাপূর্বক চালানের মূলকপিসহ</td>
                            </tr>
                        </table>
                        @else

                        <h5 class="pt-4">5.2 Information required for change of name of foreign NGO</h5>
                        <table class="table table-borderless instruction_table">
                            <tr>
                                <td>a)</td>
                                <td>Advertisement about name change in 2 national newspapers (Bengali and English).
                                    With original copy
                                </td>
                            </tr>
                            <tr>
                                <td>b)</td>
                                <td>Name Change Fee- 26,000/- (Twenty Six Thousand) (Code No-1-0323-0000-1836)
                                    Along with original copy of invoice and payment of 15% VAT (Code No-1-1133-0035-0311)
                                </td>
                            </tr>
                            <tr>
                                <td>c)</td>
                                <td>Constitution Change Fee-13,000/-(thirteen thousand) (Code No-1-0323-0000-1836)
                                    Original copy of invoice and deposit of 15% VAT (Code No-1-1133-0035-0311) including original copy of invoice
                                </td>
                            </tr>
                            <tr>
                                <td>d)</td>
                                <td>List of Boards of Directors/Boards of Trustees of the concerned country (Pic
                                    or Notarized by Justice)
                                </td>
                            </tr>
                            <tr>
                                <td>e)</td>
                                <td>Copy of the decision of the Board of Directors/Board of Trustees of the concerned country regarding change of name (with original copy notarized by the Peace of Justice of the concerned country)
                                </td>
                            </tr>
                            <tr>
                                <td>f)</td>
                                <td>300/(Three Hundred) rupees along with a copy of affidavit regarding change of name</td>
                            </tr>
                            <tr>
                                <td>g)</td>
                                <td>Original Certificate from Bureau of NGO Affairs</td>
                            </tr>
                            <tr>
                                <td>h)</td>
                                <td>Certificate of Change of Company Name Incorporated Certificate (Notarized original copy of concerned country)</td>
                            </tr>
                            <tr>
                                <td>i)</td>
                                <td>Copy of the by laws/constitution of the changed name of the organization (of the concerned country
                                    with original copy notarized by Peace of Justice)</td>
                            </tr>
                            <tr>
                                <td>j)</td>
                                <td>All the liabilities of the former name of the company now belong to the company under the changed name
                                    Undertaking to the above (Signed by Head of Institution)</td>
                            </tr>
                            <tr>
                                <td>k)</td>
                                <td>On fees filed in respect of registration/renewal of articles/change of name/amendment of any article of constitution from FY 2010-2011 till date
                                    15% VAT due (if not already paid) along with invoice original deposited in respective code</td>
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
