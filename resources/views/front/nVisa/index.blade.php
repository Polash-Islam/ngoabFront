@extends('front.master.master')

@section('title')
{{ trans('fd9.nvisa')}} | {{ trans('header.ngo_ab')}}
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
                                <p class="{{ Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
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
                <div class="card">
                    <div class="card-body">
                        <div class="name_change_box">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>{{ trans('fd9.nvisa')}}</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="d-grid d-md-flex justify-content-end">
                                        <button type="button" class="btn btn-registration"
                                                onclick="location.href = '{{ route('nVisa.create') }}';">নতুন ভিসার আবেদন  যুক্ত করুন
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @if(count($nVisaList) == 0)
                            <div class="no_name_change">
                                <div class="d-flex justify-content-center pt-5">
                                    <img src="{{ asset('/') }}public/noresult.png" alt="" width="120" height="120">
                                </div>
                                <div class="text-center">
                                    <h5>কোনো এন-ভিসা আবেদনের তালিকা নেই</h5>
                                </div>
                            </div>
                            @else
                            <div class="no_name_change pt-4">
                                <h5 class="pb-3">ভিসার তালিকা</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ক্র:নং:</th>
                                        <th>আবেদনকারীর ছবি</th>
                                        <th>জারি করা ওয়ার্ক পারমিট এর রেফারেন্স নং</th>
                                        <th>ওয়ার্ক পারমিটের ধরন</th>
                                        <th>ভিসার কার্যকর এর  তারিখ</th>
                                        <th>Status</th>
                                        <th>কার্যকলাপ</th>
                                    </tr>
                                    @foreach($nVisaList as $key=>$allnVisaList)
                                    <tr>

                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ asset('/') }}{{ $allnVisaList->applicant_photo }}" style="height: 40px;"/></td>
                                        <td>{{ $allnVisaList->visa_ref_no }}</td>
                                        <td>{{ $allnVisaList->visa_category }}</td>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($allnVisaList->permit_efct_date) }}</td>
                                        <td>
                                            @if(empty($allnVisaList->status))
                                             <span class="text-success">Ongoing</span>
 @else
 <span class="text-success">Accepted</span>
 @endif
                                         </td>
                                        <td>
                                            <a  href="{{ route('nVisa.edit',$allnVisaList->id) }}" class="btn btn-sm btn-outline-primary"> <i class="fa fa-pencil"></i> </a>
                                            <a  href="{{ route('nVisa.show',base64_encode($allnVisaList->id)) }}" class="btn btn-sm btn-outline-success"> <i class="fa fa-eye"></i> </a>
                                            <button type="button" onclick="deleteTag({{ $allnVisaList->id}})" class="btn btn-sm btn-outline-danger"><i
                                                class="bi bi-trash"></i></button>

                                                <form id="delete-form-{{ $allnVisaList->id }}" action="{{ route('nVisa.destroy',$allnVisaList->id) }}" method="POST" style="display: none;">

                                                    @csrf
                                                    @method('DELETE')

                                                </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
