@extends('front.master.master')

@section('title')
{{ trans('fd9.nvisa')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<style>

.nav-link.active{

    background-color: #075E24 !important;
color:white !important;
}
.nav-link {

    color:black;
}
    </style>
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
                    <div class="card-body">
                        <div class="profile_link_box">
                            <a href="{{ route('dashboard') }}">
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>{{ trans('fd9.m1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nameChange') }}">
                                <p class="{{ Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew') }}">
                                <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m3')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdNineForm.index') }}">
                                <p class="{{ Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('nVisa.show') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineOneForm.index') }}">
                                <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd6Form.index') }}">
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd7Form.index') }}">
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.view') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('logout') }}">
                                <p class=""><i class="fa fa-cog pe-2"></i>{{ trans('fd9.l')}}</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-6 col-sm-12">

                <!--download pdf -->
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <td>PDF Download (পিডিএফ ডাউনলোড )</td>
                                <td>PDF Upload (পিডিএফ আপলোড)</td>
                                <td>Update Information (তথ্য সংশোধন করুন)</td>
                            </tr>
                            <tr>
                                <td>
                                    {{-- <a class="btn btn-sm btn-success" target="_blank" href = "{{ route('mainFd9PdfDownload',$nVisaEdit->id) }}">
                                        {{ trans('form 8_bn.download_pdf')}}
                                    </a> --}}


                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal234">
                                        {{ trans('form 8_bn.download_pdf')}}
                                    </button>

                                    <div class="modal fade" id="exampleModal234" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">

                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>প্রধান নির্বাহীর নাম ও পদবি প্রদান করুন </h5>
                                                    <div class=" mt-3 mb-3">
                                                        <label for="" class="form-label">প্রধান নির্বাহীর নাম:</label>
                                                        <input type="text" data-parsley-required  name="নাম" value="{{ $nVisaEdit->fd9Form->chief_name }}"  class="form-control" id="mainName" placeholder="নাম">
                                                        <label for="" class="form-label mt-3">প্রধান নির্বাহীর পদবি:</label>
                                                        <input type="text" data-parsley-required  name="পদবি" value="{{ $nVisaEdit->fd9Form->chief_desi }}"  class="form-control" id="mainDesignation" placeholder="পদবী">
                                                        <input type="hidden" data-parsley-required  name="id"  value="{{ $nVisaEdit->fd9Form->id }}" class="form-control" id="mainId">
                                                    </div>

                                                    <button class="btn btn-sm btn-success" id="downloadButton">
                                                        {{ trans('form 8_bn.download_pdf')}}
                                                    </button>

                                            </div>

                                          </div>
                                        </div>
                                      </div>

                                </td>
                                <td>

                                    @if(empty($nVisaEdit->fd9Form->verified_fd_nine_form))
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ trans('form 8_bn.upload_pdf')}}
                                    </button>
                                    @else

                                    <?php

                                    $file_path = url($nVisaEdit->fd9Form->verified_fd_nine_form);
                                    $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                    ?>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        @if(session()->get('locale') == 'en')
                                        পুনরায় আপলোড করুন
                                        @else
                                        Re-upload
                                        @endif
                                    </button><br>
                                    <p class="badge bg-success rounded">{{ $filename.'.'.$extension }}</p>
                                    @endif
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('mainFd9PdfUpload') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf

                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.pdf')}}:</label>
                                <input type="file" data-parsley-required accept=".pdf" name="verified_fd_nine_form"  class="form-control" id="">
                                <input type="hidden" data-parsley-required  name="id"  value="{{ $nVisaEdit->fd9Form->id }}" class="form-control" id="">
                            </div>

                            <button class="btn btn-sm btn-success" type="submit">
                                {{ trans('form 8_bn.upload_pdf')}}
                            </button>
                        </form>
                    </div>

                  </div>
                </div>
              </div>

                                </td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="location.href = '{{ route('nVisa.edit',$nVisaEdit->id) }}';">
                                    আপডেট করুন
                 </button>
                             </td>
                         </tr>

                        </table>

                    </div>
                </div>
<!--end download pdf -->


                <div class="card">
                    <div class="card-body">


                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Security Clearance</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">এফডি -৯ ফরম</button>
                            </li>

                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                                    <div class="row mt-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="others_inner_section">
                                                <h1>Application for Security Clearance</h1>
                                                <div class="notice_underline"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            Basic Information
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-9 col-sm-12">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td>Approved permission period</td>
                                                            <td>:{{ $nVisaEdit->period_validity }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Effective Date</td>
                                                            <td>:{{ date('d-m-Y', strtotime($nVisaEdit->permit_efct_date)) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ref no. of issued work permit</td>
                                                            <td>:{{ $nVisaEdit->visa_ref_no }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Received Visa Recommendation Lette</td>
                                                            <td>:{{ $nVisaEdit->visa_recomendation_letter_received_way	 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ref no. of Visa Recommendation Letter</td>
                                                            <td>:{{ $nVisaEdit->visa_recomendation_letter_ref_no	 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Department in</td>
                                                            <td>:{{ $nVisaEdit->department_in	 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Work Permit type</td>
                                                            <td>:{{ $nVisaEdit->visa_category	 }}</td>
                                                        </tr>

                                                    </table>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <div class="nvisa-avatar">
                                                        @if(!$nVisaEdit->applicant_photo)
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                                        @else
                                                        <img src="{{ asset('/') }}{{ $nVisaEdit->applicant_photo }}"  alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            A. PARTICULAR OF SPONSOR/EMPLOYER
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td colspan="2">Name of the enterprise (organization/company)  : {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="background-color: #d4d4d4">Address of the enterprise (Bangladesh Only)</td>
                                                </tr>
                                                <tr>
                                                    <td>House/Plot/Holding/Village: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_house_no }}  </td>
                                                    <td>Flat/Apartment/Floor: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_flat_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Road Number: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_road_no }}</td>
                                                    <td>Post/Zip Code: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_post_code }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Post Office: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_post_office }}</td>
                                                    <td>Telephone Number: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>City/District {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_district }}</td>
                                                    <td>Thana/Upazilla: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_thana }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Fax Number: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_fax_no }}</td>
                                                    <td>Email: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_email }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Type of the Organization: NGO</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Nature of buisness: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->nature_of_business }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Authorized Capital: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->authorized_capital }}</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2">Paid up capital: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->paid_up_capital }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Remittance received during last 12 months: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->remittance_received }}</td>
                                                    <td>Type of Industry:NGO </td>
                                                </tr>
                                                <tr>
                                                    <td>Recommendation of Company Boards: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->recommendation_of_company_board }}</td>
                                                    <td>Whether local, foreign or joint venture company (if joint venture, percentage of local and foreign investment is to be shown): {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->company_share }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            B. PARTICULARS OF FOREIGN INCUMBENT
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td colspan="2">Name of the foreign national: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->name_of_the_foreign_national }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nationality: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->nationality  }}</td>
                                                    <td>Passport Number: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Date of Issue: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_issue_date }}</td>
                                                    <td>Place of Issue: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_issue_place }} </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Expiry Date: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_expiry_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="background-color: #d4d4d4">Permanent Address</td>
                                                </tr>
                                                <tr>
                                                    <td>Country: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->home_country }}</td>
                                                    <td>House/Plot/Holding Number: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->house_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Flat/Apartment/Floor Number: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->flat_no }}</td>
                                                    <td>Street Name/Street Number: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->road_no }} </td>
                                                </tr>
                                                <tr>
                                                    <td><b></b> </td>
                                                    <td><b></b> </td>
                                                </tr>
                                                <tr>
                                                    <td>Post/Zip Code: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->post_code }}</td>
                                                    <td>State/Province: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->state }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Telephone Number: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->phone }}</td>
                                                    <td>City: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->city }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Fax Number:  {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->fax_no }}</td>
                                                    <td>Email: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Date of Birth: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->date_of_birth }}</td>
                                                    <td>Marital Status: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->martial_status }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            C. EMPLOYMENT INFORMATION
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>Name of the post employed for (Designation): {{ $nVisaEdit->nVisaEmploymentInformation->employed_designation }}</td>
                                                    <td>Date of arrival in Bangladesh:  {{ $nVisaEdit->nVisaEmploymentInformation->date_of_arrival_in_bangladesh }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Type of visa: N-Visa </td>
                                                    <td>Date of first assignment: {{ $nVisaEdit->nVisaEmploymentInformation->first_appoinment_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Desired Effective Date: {{ $nVisaEdit->nVisaEmploymentInformation->desired_effective_date }}</td>
                                                    <td>Desired End Date: {{ $nVisaEdit->nVisaEmploymentInformation->desired_end_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Desired Duration: {{ $nVisaEdit->nVisaEmploymentInformation->visa_validity }}</td>
                                                    <td>Brief job description: {{ $nVisaEdit->nVisaEmploymentInformation->brief_job_description }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Employee Justification: {{ $nVisaEdit->nVisaEmploymentInformation->employee_justification }} </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            D. WORKPLACE ADDRESS
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>House/Plot/Holding/Village:  {{ $nVisaEdit->nVisaWorkPlaceAddress->work_house_no }}</td>
                                                    <td>Flat/Apartment/Floor: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_flat_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Road Number: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_road_no }} </td>
                                                    <td>City/District {{ $nVisaEdit->nVisaWorkPlaceAddress->work_district }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Thana/Upazilla: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_thana }} </td>
                                                    <td>Email: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Type of Organization: NGO</td>
                                                    <td>Contact Person Mobile Number: {{ $nVisaEdit->nVisaWorkPlaceAddress->contact_person_mobile_number }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>


                                    <?php

$annual =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Annual Bonus')->first();

$medical =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Medical Allowance')->first();

$entertainment =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Entertainment Allowance')->first();


$convoy =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Conveyance')->first();

$house =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','House Rent')->first();

$overseas =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Overseas Allowance')->first();


$basic =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Basic Salary')->first();


$mainDatac =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->first();



?>

<!--compansation --->

@if(!$mainDatac)
<div class="card mt-3 ">
    <div class="card-header custom-color">
        E.COMPENSATION AND BENIFITS
    </div>
    <div class="card-body">
       No Information Available
    </div>
</div>
@else
<div class="card mt-3 ">
    <div class="card-header custom-color">
        E.COMPENSATION AND BENIFITS
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td><b>Salary Structure</b></td>
                <td colspan="3"><b>Payble Locally</b></td>
            </tr>
            <tr>
                <td></td>
                <td>Payment</td>
                <td>Amount</td>
                <td>Currency</td>
            </tr>
            @if(!$basic)

            @else
            <tr>
                <td>a. Basic Salary</td>
                <td>{{ $basic->payment_type }}</td>
                <td>{{ $basic->amount }}</td>
                <td>{{ $basic->currency }}</td>
            </tr>
            @endif
            @if(!$overseas)

            @else
            <tr>
                <td>b. Overseas allowance</td>
                <td>{{ $overseas->payment_type }}</td>
                <td>{{ $overseas->amount }}</td>
                <td>{{ $overseas->currency }}</td>
            </tr>
            @endif

            @if(!$house)

            @else
            <tr>
                <td>c. House rent/Accommodation</td>
                <td>{{ $house->payment_type }}</td>
                <td>{{ $house->amount }}</td>
                <td>{{ $house->currency }}</td>
            </tr>
            @endif
            @if(!$convoy)

            @else
            <tr>
                <td>d. Conveyance</td>
                <td>{{ $convoy->payment_type }}</td>
                <td>{{ $convoy->amount }}</td>
                <td>{{ $convoy->currency }}</td>
            </tr>
            @endif
            @if(!$entertainment)

            @else
            <tr>
                <td>e. Entertainmemt allowance</td>
                <td>{{ $entertainment->payment_type }}</td>
                <td>{{ $entertainment->amount }}</td>
                <td>{{ $entertainment->currency }}</td>
            </tr>
            @endif
            @if(!$medical)

            @else
            <tr>
                <td>f. Medical allowance</td>
                <td>{{ $medical->payment_type }}</td>
                <td>{{ $medical->amount }}</td>
                <td>{{ $medical->currency }}</td>
            </tr>
            @endif
            @if(!$annual)

            @else
            <tr>
                <td>g. Annual Bonus</td>
                <td>{{ $annual->payment_type }}</td>
                <td>{{ $annual->amount }}</td>
                <td>{{ $annual->currency }}</td>
            </tr>
            @endif
            <tr>
                <td>h. Other fringe benefits, if any</td>
                <td colspan="3">{{ $nVisaEdit->other_benefit }}</td>
            </tr>
            <tr>
                <td>i. Any Particular Comments of remarks</td>
                <td colspan="3">{{ $nVisaEdit->salary_remarks }}</td>
            </tr>
        </table>
    </div>
</div>

@endif


<!--end compansation -->



                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            F. Manpower of the office
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td colspan="3"><b>Local (a)</b></td>
                                                    <td colspan="3"><b>Foreign  (b)</b></td>
                                                    <td rowspan="2"><b>Grand Total
                                                        (a+b)</b></td>
                                                    <td colspan="2"><b>Ratio</b></td>
                                                </tr>
                                                <tr>
                                                    <td>Executive</td>
                                                    <td>Supporting Staff </td>
                                                    <td>Total</td>
                                                    <td>Executive</td>
                                                    <td>Supporting Staff</td>
                                                    <td>Total</td>
                                                    <td>Local </td>
                                                    <td>Foreign</td>
                                                </tr>
                                                @if(!$nVisaEdit->nVisaManpowerOfTheOffice)
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
                                                </tr>
                                                @else
                                                <tr>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_executive }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_supporting_staff }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_total }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_executive }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_supporting_staff }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_total }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->gand_total }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_ratio }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_ratio }}</td>
                                                </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            G. Necessary Document for Work Permit (PDF)
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <th>#</th>
            <th>Required Attachment</th>
            <th>Action</th>
                                                </tr>
                                                @if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit)

                                                <tr>
                                                    <td>1</td>
                                                    <td>Copy of buyer's nomination letter in case of employment of buyer;s representative</td>
                                                    <td>







                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Copy of registration letter of board of investment, if not submitted earlier</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Copy of service contract/agreement/ appointment letter in case of employee</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
            <td>Decision of the board of the directors of the company regarding employment of foreign nationals (In case of limited company) showing salary & other facility only signed by directors present in the meeting</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
            <td>	Memorandum & Articles of Association of the company duly signed by shareholders along with certificate of incorporation (In case of limited company), if not sumitted earlier</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
            <td>Photocopy of passport with E-type visa for employees/PI-type visa for Investors</td>
                                                    <td></td>
                                                </tr>

                                                @else


                                                <tr>
                                                    <td>1</td>
                                                    <td>Copy of buyer's nomination letter in case of employment of buyer;s representative</td>
                                                    <td>


                                                       @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->nomination_letter_of_buyer))


                                                       @else

                                                        <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'nomination','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                        @endif


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Copy of registration letter of board of investment, if not submitted earlier</td>
                                                    <td>

                                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->registration_letter_of_board_of_investment))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'investment','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Copy of service contract/agreement/ appointment letter in case of employee</td>
                                                    <td>

                                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->employee_contract_copy))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'contract','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Decision of the board of the directors of the company regarding employment of foreign nationals (In case of limited company) showing salary & other facility only signed by directors present in the meeting</td>
                                                    <td>

                                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->board_of_the_directors_sign_lette))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'directors','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>	Memorandum & Articles of Association of the company duly signed by shareholders along with certificate of incorporation (In case of limited company), if not sumitted earlier</td>
                                                    <td>
                                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->share_holder_copy))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'shareHolder','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Photocopy of passport with E-type visa for employees/PI-type visa for Investors</td>
                                                    <td>
                                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->passport_photocopy))


                                                        @else

                                                         <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'passportCopy','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif
                                                    </td>
                                                </tr>


                                                @endif
                                                </tbody></table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                           H. Authorized Personal of the organization
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>Organization Name: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_name }}</td>
                                                    <td>Organization House No: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_house_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Organization Flat No:: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_flat_no }}</td>
                                                    <td>Organization Road No: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_road_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Organization Thana: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_thana }}</td>
                                                    <td>Organization Post Office: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_post_office }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Organization District: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_district }}</td>
                                                    <td>Organization Mobile: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_mobile }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Submission Date:  {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->submission_date }}</td>
                                                    <td>Expatriate Name: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->expatriate_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Expatriate Email: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->expatriate_email }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>



                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="form9_upper_box">
                                            <h3>এফডি-৯ ফরম</h3>
                                            <h4>বিদেশি নাগরিক নিয়োগপত্র সত্যায়ন ফরম</h4>
                                            <h5>(আবশ্যকাবে বাংলা নিকস ফন্টে পুরণ করে দাখিল করতে হবে)</h5>

                                            <div>
                                                <p>বরাবর <br>
                                                    মহাপরিচালক <br>
                                                    এনজিও বিষয় ব্যুরো, ঢাকা <br>
                                                    জনাব,</p>
                                                <p>নিম্নলখিত নিয়োগপ্রাপ্ত বিদেশি নাগরিক/নাগরিকগণকে এ সংস্থায় (নিবন্ধন নম্বরঃ {{App\Http\Controllers\NGO\CommonController::englishToBangla($ngo_list_all->registration_number)}}
                                                    তারিখঃ {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($ngoStatus->updated_at->format('d-m-Y')))) }}) বৈদেশিক
                                                    অনুদান (স্বেচ্ছাসেবামূলক কর্মকান্ড) রেগুলেশন আইন ২০১৬ অনুযায়ী নিয়োগপত্র সত্যায়ন ও
                                                    এনডিসা প্রাপ্তির সুপারিশপত্র
                                                    পাওয়ার জন্য আবেদন করছিঃ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>১.</td>
                                                <td>বিদেশি নাগরিকের নাম (ইংরেজীতে Capital Letter এ)</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_foreigner_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>২.</td>
                                                <td>(ক) পিতার নাম</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_father_name }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>(খ) স্বামী/স্ত্রীর নাম</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_husband_or_wife_name }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>(গ) মাতার নাম</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_mother_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>৩.</td>
                                                <td>জন্ম স্থান ও তারিখ</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_birth_place }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_dob))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>৪.</td>
                                                <td>পাসপোর্ট নম্বর, ইস্যু ও মেয়াদোর্ত্তীণ তারিখ</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_passport_number }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_passport_issue_date))) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_passport_expiration_date))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>৫.</td>
                                                <td>পাসপোর্টে প্রদত্ত সনাক্তকারী চিহ্ন</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_identification_mark_given_in_passport }}</td>
                                            </tr>
                                            <tr>
                                                <td>৬.</td>
                                                <td>পুরুষ/মহিলা</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_male_or_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>৭.</td>
                                                <td>বৈবাহিক অবস্থা</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_marital_status }}</td>
                                            </tr>
                                            <tr>
                                                <td>৮.</td>
                                                <td>জাতীয়তা / নাগরিকত্ব</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_nationality_or_citizenship }}</td>
                                            </tr>
                                            <tr>
                                                <td>৯.</td>
                                                <td>একাধিক নাগরিকত্ব থাকলে বিবরণ</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_details_if_multiple_citizenships }}</td>
                                            </tr>
                                            <tr>
                                                <td>১০.</td>
                                                <td>পূর্বের নাগরিকত্ব থাকলে তা বহাল না থাকার কারণ</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_previous_citizenship_is_grounds_for_non_retention }}</td>
                                            </tr>
                                            <tr>
                                                <td>১১.</td>
                                                <td>বর্তমান ঠিকানা</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_current_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>১২.</td>
                                                <td>পরিবারের সদস্য সংখ্যা</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_number_of_family_members }}</td>
                                            </tr>

                                            <?php
   $familyData = $nVisaEdit->fd9Form->fd9ForeignerEmployeeFamilyMemberList;

   //dd($familyData);
    ?>

                                            <tr>
                                                <td>১৩.</td>
                                                <td>পরিবারের সদসাদের নাম ও বয়স (যাহারা তার সাথে থাকবেন)</td>
                                                <td>: @foreach($familyData as $key=>$allFamilyData)
                                                    {{ $allFamilyData->family_member_name }},{{ $allFamilyData->family_member_age }}<br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>১৪.</td>
                                                <td>একাডেমিক যোগ্যতা (একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে</td>
                                                <td>:  @if(!$nVisaEdit->fd9Form->fd9_academic_qualification)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_academic_qualification);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                                <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'academic','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                                @else

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'academic','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                                     @endif
                                                     @endif
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td>১৫.</td>
                                                <td>কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে (প্রাসঙ্গিক সনদপত্রের কপি সংযুক্ত করতে
                                                    হবে)
                                                </td>
                                                <td>: @if(!$nVisaEdit->fd9Form->fd9_technical_and_other_qualifications_if_any)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_technical_and_other_qualifications_if_any);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'technical','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
     @else

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'technical','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
          @endif
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>১৬.</td>
                                                <td>অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)
                                                </td>
                                                <td>: @if(!$nVisaEdit->fd9Form->fd9_past_experience)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_past_experience);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'pastExperience','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
     @else

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'pastExperience','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
          @endif
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>১৭.</td>
                                                <td>যে সব দেশ ভ্রমণ করেছেন (কর্মসংস্থানের জন্য)</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_countries_that_have_traveled }}</td>
                                            </tr>
                                            <tr>
                                                <td>১৮.</td>
                                                <td>যে পদের জন্য নিয়োগ প্রস্তাব দেয়া হয়েছে : (নিয়োগপত্র কপি ও চুক্তিপত্র সংযুক্ত
                                                    করতে হবে)
                                                </td>
                                                <td>:  @if(!$nVisaEdit->fd9Form->fd9_offered_post)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_offered_post);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'offeredPost','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
     @else

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'offeredPost','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
          @endif
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>১৯.</td>
                                                <td>যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন
                                                    পত্র সংযুক্ত করতে হবে)
                                                </td>
                                                <td>: @if(!$nVisaEdit->fd9Form->fd9_name_of_proposed_project)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_name_of_proposed_project);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'proposedProject','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
     @else

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'proposedProject','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
          @endif
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>২০.</td>
                                                <td>নিয়োগের যে তারিখ নির্ধারণ করা হয়েছে</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_date_of_appointment }}</td>
                                            </tr>
                                            <tr>
                                                <td>২১.</td>
                                                <td>এক্সটেনশন হয়ে থাকলে তার সময়কাল</td>
                                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_extension_date))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>২২.</td>
                                                <td>এ প্রকল্পে কতজন বিদেশির পদের সংস্থান রয়েছে এবং কর্মরত কতজন</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_post_available_for_foreigner_and_working }}</td>
                                            </tr>
                                            <tr>
                                                <td>২৩.</td>
                                                <td>বাংলাদেশের ইতঃপূর্বে অন্যকোন সংস্থায় কাজ করেছিলেন কিনা তার বিবরণ</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_previous_work_experience_in_bangladesh }}</td>
                                            </tr>
                                            <tr>
                                                <td>২৪.</td>
                                                <td>সংস্থায় বর্তমানে কতজন বিদেশি নাগরিক কর্মরত আছেন</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_total_foreigner_working }}</td>
                                            </tr>
                                            <tr>
                                                <td>২৫.</td>
                                                <td>অন্য কোন তথ্য (যদি থাকে)</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_other_information }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>বিদেশি নাগরিকের পাসপোর্ট সাইজের ছবি</td>
                                                <td>: @if(!$nVisaEdit->fd9Form->fd9_foreigner_passport_size_photo)

                                                    @else

                                                    <img src="{{ asset('/') }}{{ $nVisaEdit->fd9Form->fd9_foreigner_passport_size_photo }}" alt="" style="height:40px;" id="output">

@endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>পাসপোর্টের কপি সংযুক্ত</td>
                                                <td>:  @if(!$nVisaEdit->fd9Form->fd9_copy_of_passport)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_copy_of_passport);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

     <a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'passportCopy','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
     @else

<a target="_blank"  href="{{ route('fd9FormExtraPdfDownload',['cat'=>'passportCopy','id'=>base64_encode($nVisaEdit->fd9Form->id)]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
          @endif
                                                     @endif</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <h5 class="text-center mt-3 mb-3">ঘোষণা</h5>
                                        <p class="mt-3">আমি এই মর্মে ঘোষণা করছি যে, আমি সংশ্লিষ্ট সকল আইন-কানুন পড়েছি এবং উল্লেখিত
                                            সকল তথ্য সত্য ও সঠিক। </p>

                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12"></div>
                                            <div class="col-lg-6 col-sm-12">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>প্রধান নির্বাহীর স্বাক্ষর ও সিল</td>
                                                    </tr>
                                                    <tr>
                                                        <td>নামঃ</td>
                                                    </tr>
                                                    <tr>
                                                        <td>পদবীঃ</td>
                                                    </tr>
                                                    <tr>
                                                        <td>তারিখঃ</td>
                                                    </tr>
                                                </table>
                                            </div>
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
<script>
$("#downloadButton").click(function(){
      var name = $('#mainName').val();
      var designation = $('#mainDesignation').val();
      var id = $('#mainId').val();

      $.ajax({
        url: "{{ route('fd9Chief') }}",
        method: 'GET',
        data: {name:name,designation:designation,id:id},
        success: function(data) {



            window.open(data);

        }
        });

  });
  </script>
@endsection
