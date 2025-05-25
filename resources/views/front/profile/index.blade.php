@extends('front.master.master')

@section('title')
    {{ trans('first_info.profile')}} | {{ trans('header.ngo_ab')}}
@endsection

@push('custom_css')

@endpush

@section('body')

    @include('translate')

    <section>

        <div class="container-fluid">
            <div class="row vh-100">
                <!-- Sidebar -->
                <!-- HTML -->
                <div class="col-md-2 sidebar" style="padding: 0;">
                    <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard')  ? 'active' : '' }}" >
                        <i
                            class="fa fa-home pe-2 dashboard_icon" aria-hidden="true"></i>
                        {{ trans('first_info.dash')}}</a>

                    <!-- এনজিও প্রোফাইল Dropdown -->
                    <a href="javascript:void(0);" class="dropdown-toggle {{ Route::is('profile')  ? 'active' : '' }}">
                        <i class="fa fa-user pe-2" aria-hidden="true"></i>
                        {{ trans('first_info.profile')}}</a>
                    <div class="submenu">
                        <a class="{{ Route::is('profile')  ? 'active2' : '' }}" href="{{ route('profile') }}"> {{ trans('first_info.ngo_profile')}}</a>
                        <a href="#">{{ trans('first_info.bank_info')}}</a>
                    </div>

                    <a href="#"><img src="Organization.png" class="icon" alt="icon"> ওয়ার্ক পারমিট</a>
                </div>




                <!-- Right Content -->
                <div class="col-md-10">
                    <!-- Profile Section -->
                    <div class="profile-card">
                        <div class="d-flex justify-content-between align-items-start mb-3 profile-header">
                            <p>নিউ পরীক্ষামূলক কমিটি<p>
                                <button class="btn btn-success btn-sm edit-btn">✏️ এডিট করুন</button>
                        </div>


                        <div class="row profile-secondary">
                            <!-- Image -->
                            <div class="col-md-3 text-center">
                                <img src="ngo_image.jpg" class="profile-photo" alt="No photo">
                            </div>

                            <!-- Table -->
                            <div class="col-md-8">
                                <table class="table custom-table">
                                    <tbody>
                                    <tr>
                                        <td><strong>এনজিওর নাম</strong></td>
                                        <td>: নিউ পরীক্ষামূলক কমিটি</td>
                                    </tr>
                                    <tr>
                                        <td><strong>ইমেইল</strong></td>
                                        <td>: sample@test.com</td>
                                    </tr>
                                    <tr>
                                        <td><strong>মোবাইল নাম্বার</strong></td>
                                        <td>: +880 1XX0000000</td>
                                    </tr>
                                    <tr>
                                        <td><strong>ঠিকানা</strong></td>
                                        <td>: Khilkhet, Dhaka.</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Status Section -->
                    <div class="profile-card">
                        <div class="d-flex justify-content-between align-items-start profile-header">
                            <p>এনজিও নিবন্ধন এর অবস্থা<p>
                        </div>
                        <table class="table custom-table2">
                            <tbody>
                            <tr>
                                <td>এনজিও -১ ফরম</td>
                                <td class="text-end"><span class="status-complete">সম্পূর্ণ</span></td>
                            </tr>
                            <tr>
                                <td>অন্যান্য নথি</td>
                                <td class="text-end"><span class="status-incomplete">অসম্পূর্ণ</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>


    </section>

@endsection

@push('custom_scripts')

    <script>
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.addEventListener('click', () => {
                const tab = button.dataset.tab;

                // Tab button active class
                document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                // Tab content toggle
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById(tab).classList.add('active');
            });
        });
    </script>

@endpush
