@extends('front.master.master')

@section('title')
{{ trans('first_info.dash')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')




<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="user_profile_dashboard_upper">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">

                                @if(empty(Auth::user()->image))
                                {{-- <img src="{{ asset('/') }}public/demo_315x315.jpg" alt="Admin"
                                     class="rounded-circle" width="100"> --}}
                                     @else
                                     {{-- <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Admin"
                                     class="rounded-circle" width="100"> --}}
                                     @endif
                                <div class="mt-3">
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <h4>{{ $ngo_list_all->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $ngo_list_all->organization_name }}</h4>
                                    @endif
                                    {{-- <p class="text-secondary mb-1">{{ $ngo_list_all->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngo_list_all->organization_address }}</p> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">

                  @include('front.include.acceptSidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-6 col-sm-12">
                @include('flash_message')
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home"
                                        type="button" role="tab" aria-controls="home" aria-selected="true">হোম
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="messages-tab" data-bs-toggle="tab"
                                        data-bs-target="#messages"
                                        type="button" role="tab" aria-controls="messages" aria-selected="false">
                                    নথিপত্র
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="settings-tab" data-bs-toggle="tab"
                                        data-bs-target="#settings"
                                        type="button" role="tab" aria-controls="settings" aria-selected="false">সেটিংস
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <!--end col-->
                                    <div class="col-xxl-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">এনজিও প্রোফাইল</h5>
                                                <div class="profile_about">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>নিবন্ধন নম্বর</td>
                                                            <td>


                                                                @if($oldOrNewStatus->ngo_type_new_old == 'Old')
{{ $oldOrNewStatus->registration }}
                                                                @else
                                                                {{ $ngo_list_all->registration_number }}
                                                                @endif


                                                            </td>
                                                        </tr>

                                                      <?php

                                                      $allEnglishCountry = DB::table('countries')->where('country_name_bangla',$ngo_list_all->country_of_origin)->value('country_name_english');

                                                      ?>
                                                        <tr>
                                                            <td>দেশ</td>
                                                            <td>{{ $ngo_list_all->country_of_origin}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>সংস্থা প্রধান এর  তথ্য</td>
                                                            <td>Name: {{ $ngo_list_all->name_of_head_in_bd }} <br> Address: {{ $ngo_list_all->address_of_head_office }} <br> Phone Number: {{ $ngo_list_all->phone }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>মোবাইল নম্বর</td>
                                                            <td>{{ $ngo_list_all->tele_phone_number }}</td>
                                                        </tr>


                                                        <tr>
                                                            <td>এনজিও'র ঠিকানা</td>
                                                            <td>{{ $ngo_list_all->organization_address }}</td>
                                                        </tr>


                                                        <tr>
                                                            <td>ইমেইল </td>
                                                            <td>{{ $ngo_list_all->email }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <?php



$fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');


$renew_list_all = DB::table('ngo_renews')->where('fd_one_form_id',$fdOneFormId)->get();

//dd($renew_list_all);

                                        ?>

                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header align-items-center d-flex">
                                                        <h4 class="card-title mb-0  me-2">সাম্প্রতিক কার্যকলাপ</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="profile-timeline">
                                                            <div class="d-flex">

                                                                @if(count($name_change_list) == 0   && count($name_change_list_r) == 0)

                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-1">
                                                                  কোন কার্যকলাপ নেই
                                                                    </h6>

                                                                </div>
                                                                @else
                                                                @foreach($name_change_list as $all_name_change_list)
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-1">
                                                             নাম পরিবর্তনের অনুরোধ
                                                                    </h6>
                                                                    <small class="text-muted">তারিখ: {{ $all_name_change_list->created_at->format('d-M-Y')}} &
                                                                        সময়: {{ $all_name_change_list->time_for_api }}</small>
                                                                </div>
                                                                @endforeach

                                                                @foreach($name_change_list_r as $all_name_change_list)
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-1">
রিনিউ রিকুয়েস্ট
                                                                    </h6>
                                                                    <small class="text-muted">তারিখ:{{ $all_name_change_list->created_at->format('d-M-Y')}} &
                                                                        সময়:{{ $all_name_change_list->time_for_api }}</small>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!--end col-->
                                </div>
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <h5 class="card-title flex-grow-1 mb-0">নথিপত্র</h5>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless align-middle mb-0">
                                                        <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">ফাইলের নাম</th>
                                                            <th scope="col">টাইপ</th>

                                                            <th scope="col">আপলোড এর তারিখ </th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($oldOrNewStatus->ngo_type_new_old == 'Old')


                                                            <tr>


                                                               <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0">
                                                                            <a target="_blank" href="{{ route('renewFileDownloadFromView', ['title' =>'foregin_pdf', 'id' =>$ngo_list_all->id] )}}" >বিগত ১০ (দশ) বছরে বিদেশী অনুদান ব্যবস্থাপনা কার্যক্রমের বিশদ বিবরণ (প্রকল্প অনুযায়ী সারসংক্ষেপ সংযুক্ত করা হবে)</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>



                                                               <td>Pdf File</td>

                                                               <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>
                                                            </tr>



                                                            <tr>


                                                                <td>
                                                                 <div class="d-flex align-items-center">
                                                                     <div class="avatar-sm">
                                                                         <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                             <i class="ri-file-zip-fill"></i>
                                                                         </div>
                                                                     </div>
                                                                     <div class="ms-3 flex-grow-1">
                                                                         <h6 class="fs-15 mb-0">
                                                                             <a target="_blank" href="{{ route('renewFileDownloadFromView', ['title' =>'annual_file', 'id' =>$ngo_list_all->id] )}}" >সংস্থার সম্ভাব্য/প্রত্যাশিত বার্ষিক বাজেট (উৎসসহ)</a>
                                                                         </h6>
                                                                     </div>
                                                                 </div>
                                                             </td>



                                                                <td>Pdf File</td>

                                                                <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>
                                                             </tr>



                                                             <tr>


                                                                <td>
                                                                 <div class="d-flex align-items-center">
                                                                     <div class="avatar-sm">
                                                                         <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                             <i class="ri-file-zip-fill"></i>
                                                                         </div>
                                                                     </div>
                                                                     <div class="ms-3 flex-grow-1">
                                                                         <h6 class="fs-15 mb-0">
                                                                             <a target="_blank" href="{{ route('renewFileDownloadFromView', ['title' =>'copy_of_chalan', 'id' =>$ngo_list_all->id] )}}" >নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে
                                                                    কিনা (চালানের কপি সংযুক্ত করতে
                                                                    হবে)</a>
                                                                         </h6>
                                                                     </div>
                                                                 </div>
                                                             </td>



                                                                <td>Pdf File</td>

                                                                <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>
                                                             </tr>



                                                             <tr>


                                                                <td>
                                                                 <div class="d-flex align-items-center">
                                                                     <div class="avatar-sm">
                                                                         <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                             <i class="ri-file-zip-fill"></i>
                                                                         </div>
                                                                     </div>
                                                                     <div class="ms-3 flex-grow-1">
                                                                         <h6 class="fs-15 mb-0">
                                                                             <a target="_blank" href="{{ route('renewFileDownloadFromView', ['title' =>'due_vat_pdf', 'id' =>$ngo_list_all->id] )}}" >তফসিল -১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে)</a>
                                                                         </h6>
                                                                     </div>
                                                                 </div>
                                                             </td>



                                                                <td>Pdf File</td>

                                                                <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>
                                                             </tr>



                                                             @if(empty($ngo_list_all->change_ac_number))


                                                             @else
                                                             <tr>


                                                                <td>
                                                                 <div class="d-flex align-items-center">
                                                                     <div class="avatar-sm">
                                                                         <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                             <i class="ri-file-zip-fill"></i>
                                                                         </div>
                                                                     </div>
                                                                     <div class="ms-3 flex-grow-1">
                                                                         <h6 class="fs-15 mb-0">
                                                                             <a target="_blank" href="{{ route('renewFileDownloadFromView', ['title' =>'change_ac_number', 'id' =>$ngo_list_all->id] )}}" >ব্যাংক হিসাব নম্বর পরিবর্তন হয়ে থাকলে ব্যুরোর অনুমোদনপত্রের কপি </a>
                                                                         </h6>
                                                                     </div>
                                                                 </div>
                                                             </td>



                                                                <td>Pdf File</td>

                                                                <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>
                                                             </tr>

@endif







@foreach($ngoOtherDocLists as $ngoOtherDocListsFirst)
<!--new start -->
@if(empty($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees))

@else
<?php

  $file_path = url($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees);
  $filename  = pathinfo($file_path, PATHINFO_FILENAME);


  ?>



<tr>

   <td>
    <div class="d-flex align-items-center">
        <div class="avatar-sm">
            <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                <i class="ri-file-zip-fill"></i>
            </div>
        </div>
        <div class="ms-3 flex-grow-1">
            <h6 class="fs-15 mb-0">
    <a target="_blank" href="{{ route('deleteRenewalFileDownload', ['title' =>'trustees', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টিজ তালিকা (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত /সত্যায়িত )
   </a>
</h6>
</div>
</div>

</td>
<td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>


      @endif

      <!--end if -->





<!--new start -->
@if(empty($ngoOtherDocListsFirst->organization_by_laws_or_constitution))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->organization_by_laws_or_constitution);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>

   <td>
    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">
    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'laws_or_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    সংস্থার বাই লজ (By laws)/গঠনতন্ত্র  (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত /সত্যায়িত )
   </a>
        </h6>
    </div>
</td>

<td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>

</tr>


@endif

<!--end if -->




<!--new start -->
@if(empty($ngoOtherDocListsFirst->work_procedure_of_organization))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->work_procedure_of_organization);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>

<tr>

   <td>

    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">

    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'work_procedure', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    সংস্থার বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টিজ সভার কার্যবিবরণী (কার্যবিবরনীতে বোর্ড গঠন সংক্রান্ত ,নিবন্ধন নবায়ন করার প্রস্তাব,গঠনতন্ত্র পরিবর্তন সংক্রান্ত বিষয়াদি উল্লেখপূর্বক ) (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত /সত্যায়িত )
   </a>

</h6>
</div>
</td>



   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>



@endif

<!--end if -->




<!--new start -->
@if(empty($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>

<tr>

   <td>
    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">
    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'last_ten_years', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    সংস্থার বিগত ১০(দশ ) বছরের অডিট রিপোর্ট  এবং বার্ষিক প্রতিবেদনের সত্যায়িত অনুলিপি
   </a>
</h6>
</div>
</td>

   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>


@endif

<!--end if -->



<!--new start -->
@if(empty($ngoOtherDocListsFirst->registration_certificate))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->registration_certificate);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>

   <td>
    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">
    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'registration_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    সংস্থার মূল কার্যালয়ের নিবন্ধনপত্রের (সংশ্লিষ্ট দেশের নোটারীকৃত /সত্যায়িত ) অনুলিপি
   </a>
</h6>
</div>
</td>

   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>



@endif

<!--end if -->



    <!--new start -->
@if(empty($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>

   <td>
    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">
    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'registration_or_renewal_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    সর্বশেষ নিবন্ধন /নবায়ন সনদপত্রের সত্যায়িত অনুলিপি
   </a>
</h6>
</div>
</td>

   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>



@endif

<!--end if -->



              <!--new start -->
@if(empty($ngoOtherDocListsFirst->right_to_information_act))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->right_to_information_act);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>

<tr>

   <td>
    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">
    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'right_to_information_act', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    Right To Information Act- ২০০৯ - এর আওতায় - Focal Point নিয়োগ করত:ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি
   </a>
</h6>
</div>
</td>

   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>



@endif

<!--end if -->


@if($ngoOtherDocListsFirst->constitution_of_the_organization_has_changed == 'Yes')



<!--new start -->
@if(empty($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed))

@else
<?php

  $file_path = url($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed);
  $filename  = pathinfo($file_path, PATHINFO_FILENAME);


  ?>


<tr>

   <td>
    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">

    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'fee_if_changed', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফি সহ তার সত্যায়িত অনুলিপি
   </a>
</h6>
</div>
</td>

   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>




      @endif

      <!--end if -->



<!--new start -->
@if(empty($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>

   <td>

    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">
    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'primary_registering_authority', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিতো গঠনতন্ত্রের সত্যায়িত কপি
   </a>
</h6>
</div>
</td>

   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>



@endif

<!--end if -->



<!--new start -->
@if(empty($ngoOtherDocListsFirst->clean_copy_of_the_constitution))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->clean_copy_of_the_constitution);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>

   <td>
    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">
    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'clean_copy_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    সংস্থার চেয়ারম্যান ও সেক্রেটারি কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্র পরিচ্ছন্ন কপি
   </a>
</h6>
</div>
</td>

   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>




@endif

<!--end if -->



<!--new start -->
@if(empty($ngoOtherDocListsFirst->payment_of_change_fee))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->payment_of_change_fee);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>

   <td>
    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">

    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'payment_of_change_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ফি জমা প্রদানের চালানের মূলকপি
   </a>
</h6>
</div>
</td>

   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>



@endif

<!--end if -->


<!--new start -->
@if(empty($ngoOtherDocListsFirst->section_sub_section_of_the_constitution))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->section_sub_section_of_the_constitution);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>

   <td>
    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">

    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'section_sub_section_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি
   </a>
</h6>
</div>
</td>

   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>



@endif

<!--end if -->

<!--new start -->
@if(empty($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>

   <td>
    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">
    <a target="_blank"  href="{{ route('deleteRenewalFileDownload', ['title' =>'previous_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    পূর্ব গঠনতন্ত্র ও বর্তমান গঠনতন্ত্রের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষরসহ)
   </a>
</h6>
</div>
</td>

   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>



@endif

<!--end if -->


@else

<!--new start -->
@if(empty($ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>

   <td>

    <div class="ms-3 flex-grow-1">
        <h6 class="fs-15 mb-0">
    <a target="_blank" href="{{ route('deleteRenewalFileDownload', ['title' =>'organization_if_unchanged', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
    সংস্থার গঠনতন্ত্র পরিবর্তন না হয়ে থাকলে 'পরিবর্তন হয়নি' মর্মে  প্রত্যয়ন কপি (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত /সত্যায়িত )
   </a>
        </h6>
    </div>

</td>

   <td>Pdf File</td>

<td>{{ $ngoOtherDocListsFirst->created_at->format('d-M-Y')}}</td>
</tr>




@endif

<!--end if -->
@endif

@endforeach







                                                            @else
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0">
                                                                            <a target="_blank" href="{{ route('formOnePdf',['main_id'=>$ngo_list_all->user_id,'id'=>'plan']) }}" >পরিচালন পরিকল্পনা</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>

                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a
                                                                            target="_blank" href="{{ route('formOnePdf',['main_id'=>$ngo_list_all->user_id,'id'=>'treasury_bill']) }}">চালানের কপি</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>

                                                        </tr>


                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a
                                                                            target="_blank" href="{{ route('formOnePdf',['main_id'=>$ngo_list_all->user_id,'id'=>'treasury_bill']) }}">ট্রেজারি চালানের মূলকপি</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>

                                                        </tr>







                                                        @foreach($all_source_of_fund as $all_get_all_source_of_fund_data)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('sourceOfFund',$all_get_all_source_of_fund_data->id ) }}">সম্ভাব্য দাতার কাছ থেকে প্রতিশ্রুতির চিঠি(দাতা সংস্থার নাম)</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach



                                                        @foreach($form_ngo_data_doc as $key=>$all_get_all_source_of_fund_data)

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        @if($key+1 == 1)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                                     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                                    <h6>কর্মকর্তার স্বাক্ষর ও তারিখ সহ এফডি -১ এর ফাইনাল কপি</h6>
                                                                                    @else

                                                                                    <h6>Executive committee of primary registering authority and attested copy</h6>
                                                                                    @endif
                                                                                </a>
                                                                        </h6>
                                                                        @elseif($key+1 == 2)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                                     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                                    <h6>কর্মকর্তার স্বাক্ষর ও তারিখ সহ ফরম নং - ৮ এর ফাইনাল কপি</h6>
                                                                                    @else

                                                                                    <h6>Executive committee of primary registering authority and attested copy</h6>
                                                                                    @endif
                                                                                </a>
                                                                        </h6>
                                                                        @elseif($key+1 == 3)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                                     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                                    <h6>কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</h6>
                                                                                    @else

                                                                                    <h6>Executive committee of primary registering authority and attested copy</h6>
                                                                                    @endif
                                                                                </a>
                                                                        </h6>
                                                                        @elseif($key+1 == 4)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                            href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                    <h6>গঠনতন্ত্রের সত্যায়িত অনুলিপি</h6>
                    @else

                    <h6>Attested copy of constitution</h6>
                    @endif
                                                                        </a>
                                                                </h6>
                                                                        @elseif($key+1 == 5)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                            href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                            <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                                                                            @else

                                                                            <h6>Activity report of the organization</h6>
                                                                            @endif
                                                                        </a>
                                                                </h6>
                                                                        @elseif($key+1 == 6)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                            href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                            <h6>দাতা সংস্হার প্রতিশুতিপত্র</h6>
                                                                            @else

                                                                            <h6>Donors Receipt</h6>
                                                                            @endif
                                                                        </a>
                                                                </h6>
                                                                        @elseif($key+1 == 7)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                            href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                            <h6>সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</h6>
                                                                            @else

                                                                            <h6>Attested copy of the minutes of the general meeting regarding</h6>
                                                                            @endif
                                                                        </a>
                                                                </h6>

                                                                        @elseif($key+1 == 8)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                            href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">

                                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                            <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                                                            @else

                                                                            <h6>LIST OF NAMES OF GENERAL MEMBERS OF THE ORGANIZATION</h6>
                                                                            @endif

                                                                        </a>
                                                                </h6>
                                                                @elseif($key+1 == 9)
                                                                <h6 class="fs-15 mb-0"><a target="_blank"
                                                                    href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">

                                                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                    <h6>Letter Of Intent</h6>
                                                                    @else

                                                                    <h6>LIST OF NAMES OF GENERAL MEMBERS OF THE ORGANIZATION</h6>
                                                                    @endif

                                                                </a>
                                                        </h6>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach


                                                        @foreach($form_member_data_doc as $key=>$all_get_all_source_of_fund_data)

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('ngoMemberDocument',$all_get_all_source_of_fund_data->id ) }}">সাধারণ সদস্যদের নথি  {{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach


                                                        @foreach($get_all_data_other as $key=>$all_get_all_source_of_fund_data)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('otherPdfFromFDOneForm',$all_get_all_source_of_fund_data->id ) }}">অন্যান্য পিডিএফ কপি {{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach

                                                        @endif

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="{{ route('register.update') }}"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">{{ trans('header.person_name')}}</label>
                                                <input type="text" value="{{ Auth::user()->user_name }}" class="form-control" name="name" id="">

                                                <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="id" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">{{ trans('header.email')}}</label>
                                                <input type="email" value="{{ Auth::user()->user_email }}" class="form-control" name="email" id="" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">{{ trans('header.password')}}</label>
                                                <input type="password" class="form-control" name="password" id="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">প্রোফাইল ছবি</label>
                                                <input type="file" class="form-control" name="user_image"  id="">
                                                @if(!empty(Auth::user()->user_image))

                                                <img src="{{asset('/')}}{{ Auth::user()->user_image }}" height="70px;"/>

                                                @endif
                                            </div>


                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">{{ trans('header.phone_number')}}</label>
                                                <input type="text" value="{{ Auth::user()->user_phone }}" class="form-control" name="phone" id="">
                                                {{-- <div id="" class="form-text">Must be use valid phone number for varification</div> --}}
                                            </div>
                                            <div class="d-grid d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-registration">{{ trans('first_info.update1')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('script')

@endsection
