@extends('front.master.master')

@section('title')
{{ trans('main.ngo_fee')}}| {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="card">
            <div class="card-body p-5">
                <div class="others_inner_section pb-4">
                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                    <h1 >এনজিও নিবন্ধন ফি</h1>
                    @else
                    <h1 >NGO Registration Fee's</h1>
                    @endif
                    <div class="notice_underline"></div>
                </div>
                @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))


                <table class="table table-bordered">
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>বিষয় </th>
                        <th>ফি'র পরিমাণ (টাকায়)</th>
                    </tr>
                    <tr>
                        <td>০১</td>
                        <td>এনজিও'র নিবন্ধন ফি</td>
                        <td>
                            <ul class="list-unstyled">
                                <li>ক) দেশী-৫০,০০০/-(পঞ্চাশ হাজার) টাকা</li>
                                <li>খ) বিদেশি-৯,০০০ (নয় হাজার) ইউএস ডলারের সমপরিমাণ
                                    টাকা।</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>০২</td>
                        <td>এনজিও'র নিবন্ধন নবায়ন ফি</td>
                        <td>
                            <ul class="list-unstyled">
                                <li>ক) দেশী-৩০,০০০/-(তিরিশ হাজার) টাকা</li>
                                <li>খ) বিদেশি-৬,০০০ (ছয় হাজার) ইউএস ডলারের সমপরিমাণ টাকা</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>০৩</td>
                        <td>এনজিও'র নাম পরিবর্তন/ ডুপ্লিকেট নিবন্ধন সনদ/ গঠনতন্ত্র পরিবর্তন ফি </td>
                        <td>
                            <ul class="list-unstyled">
                                <li>ক) নাম পরিবর্তন-২৬,০০০/-(ছাব্বিশ হাজার) টাকা</li>
                                <li>খ) ডুপ্লিকেট নিবন্ধন সনদ ফি- ১৩,০০০/- (তের হাজার) টাকা</li>
                                <li>গ) গঠনতন্ত্র পরিবর্তন/সংশোধন/সংযোজন/বিয়োজন ফি-
                                    ১৩,০০০/-(তের হাজার) টাকা।</li>
                            </ul>
                        </td>
                    </tr>
                </table>
                @else
                <table class="table table-bordered">
                    <tr>
                        <th>Serial No</th>
                        <th>Subject </th>
                        <th>Fee Amount (in BDT)</th>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td>Registration fee of NGO</td>
                        <td>
                            <ul class="list-unstyled">
                                <li>a)Local- 50,000/-(fifty thousand) BDT</li>
                                <li>b) Foreign - 9,000 (nine thousand) US dollars equivalent of BDT</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Registration Renewal fee of NGOs</td>
                        <td>
                            <ul class="list-unstyled">
                                <li>a) Local-30,000/-(thirty thousand) BDT</li>
                                <li>b) Foreign - 6,000 (six thousand) US dollars equivalent of BDT</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>NGO Name Change/ Duplicate Registration Certificate/ Constitution Change Fee</td>
                        <td>
                            <ul class="list-unstyled">
                                <li>a) Name Change-26,000/-(twenty six thousand) BDT</li>
                                <li>b) Duplicate Registration Certificate Fee- 13,000/- (thirteen thousand) BDT</li>
                                <li>c)Constitution Alteration/Amendment/Addition/Detachment Fee-
                                    13,000/-(thirteen thousand) BDT</li>
                            </ul>
                        </td>
                    </tr>
                </table>

                @endif
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
