<?php
use App\Http\Controllers\NGO\CommonController;
 //CommonController::checkNgotype();

$mainNgoType = CommonController::changeView();

?>

@if($mainNgoType== 'দেশিও')
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
        <a href="{{ route('fc1Form.index') }}">
            <p class="{{ Route::is('fc1Form.index') ||  Route::is('fc1Form.create') || Route::is('fc1Form.view') || Route::is('addFd2DetailForFc1') || Route::is('editFd2DetailForFc1') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc1')}}</p>
        </a>
    </div>


    <div class="profile_link_box">
        <a href="{{ route('fc2Form.index') }}">
            <p class="{{ Route::is('fc2Form.index') ||  Route::is('fc2Form.create') || Route::is('fc2Form.view') || Route::is('addFd2DetailForFc2') || Route::is('editFd2DetailForFc2') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc2')}}</p>
        </a>
    </div>


    <div class="profile_link_box">
        <a href="{{ route('fd3Form.index') }}">
            <p class="{{ Route::is('fd3Form.index') ||  Route::is('fd3Form.create') || Route::is('fd3Form.view') || Route::is('addFd2DetailForFd3') || Route::is('editFd2DetailForFd3') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd3')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('fdFiveForm.index') }}">
            <p class="{{ Route::is('fdFiveForm.index') ||  Route::is('fdFiveForm.create') || Route::is('fdFiveForm.view')  || Route::is('fdFiveForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd5')}}</p>
        </a>
    </div>
    <div class="profile_link_box">
        <a href="{{ route('fdFourForm.index') }}">
            <p class="{{ Route::is('fdFourForm.index') ||  Route::is('fdFourForm.create') || Route::is('fdFourForm.view')  || Route::is('fdFourForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourForm.fdFourForm')}}</p>
        </a>
    </div>
    <div class="profile_link_box">
        <a style="display: none;">
            <p class="{{ Route::is('editFdFourFormData') || Route::is('addFdFourFormData') || Route::is('fdFourOneForm.index') ||  Route::is('fdFourOneForm.create') || Route::is('fdFourOneForm.view')  || Route::is('fdFourOneForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourFormOne.fdFourOneForm')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('formNoFour.index') }}">
            <p class="{{ Route::is('formNoFour.index') ||  Route::is('formNoFour.create') || Route::is('formNoFour.view')  || Route::is('formNoFour.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFour.formNoFour')}}</p>
        </a>
    </div>


    <div class="profile_link_box">
        <a href="{{ route('formNoSeven.index') }}">
            <p class="{{ Route::is('formNoSeven.index') ||  Route::is('formNoSeven.create') || Route::is('formNoSeven.view')  || Route::is('formNoSeven.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoSeven.formNoSeven')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('formNoFive.index') }}">
            <p class="{{ Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.view')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('complain.index') }}">
            <p class="{{ Route::is('complain.index') ||  Route::is('complain.create') || Route::is('complain.view')  || Route::is('complain.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.complain')}}</p>
        </a>
    </div>
    {{-- <div class="profile_link_box">
        <a href="{{ route('duplicateCertificate.index') }}">
            <p class="{{ Route::is('duplicateCertificate.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf1')}}</p>
        </a>
    </div>
    <div class="profile_link_box">
        <a href="{{ route('approvalOfConstitution.index') }}">
            <p class="{{ Route::is('approvalOfConstitution.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf2')}}</p>
        </a>
    </div>



    <div class="profile_link_box">
        <a href="{{ route('executiveCommitteeApproval.index') }}">
            <p class="{{ Route::is('executiveCommitteeApproval.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf3')}}</p>
        </a>
    </div> --}}



    <div class="profile_link_box">
        <a href="{{ route('logout') }}">
            <p class=""><i class="fa fa-cog pe-2"></i>{{ trans('fd9.l')}}</p>
        </a>
    </div>

</div>
@else
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
        <a href="{{ route('fc1Form.index') }}">
            <p class="{{ Route::is('fc1Form.index') ||  Route::is('fc1Form.create') || Route::is('fc1Form.view') || Route::is('addFd2DetailForFc1') || Route::is('editFd2DetailForFc1') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc1')}}</p>
        </a>
    </div>


    <div class="profile_link_box">
        <a href="{{ route('fc2Form.index') }}">
            <p class="{{ Route::is('fc2Form.index') ||  Route::is('fc2Form.create') || Route::is('fc2Form.view') || Route::is('addFd2DetailForFc2') || Route::is('editFd2DetailForFc2') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc2')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('fd3Form.index') }}">
            <p class="{{ Route::is('fd3Form.index') ||  Route::is('fd3Form.create') || Route::is('fd3Form.view') || Route::is('addFd2DetailForFd3') || Route::is('editFd2DetailForFd3') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd3')}}</p>
        </a>
    </div>



    <div class="profile_link_box">
        <a href="{{ route('fdFiveForm.index') }}">
            <p class="{{ Route::is('fdFiveForm.index') ||  Route::is('fdFiveForm.create') || Route::is('fdFiveForm.view')  || Route::is('fdFiveForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd5')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('formNoFour.index') }}">
            <p class="{{ Route::is('formNoFour.index') ||  Route::is('formNoFour.create') || Route::is('formNoFour.view')  || Route::is('formNoFour.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFour.formNoFour')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('formNoSeven.index') }}">
            <p class="{{ Route::is('formNoSeven.index') ||  Route::is('formNoSeven.create') || Route::is('formNoSeven.view')  || Route::is('formNoSeven.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoSeven.formNoSeven')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('formNoFive.index') }}">
            <p class="{{ Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.view')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
        </a>
    </div>


    <div class="profile_link_box">
        <a href="{{ route('complain.index') }}">
            <p class="{{ Route::is('complain.index') ||  Route::is('complain.create') || Route::is('complain.view')  || Route::is('complain.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.complain')}}</p>
        </a>
    </div>



    {{-- <div class="profile_link_box">
        <a href="{{ route('duplicateCertificate.index') }}">
            <p class="{{ Route::is('duplicateCertificate.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf1')}}</p>
        </a>
    </div>
    <div class="profile_link_box">
        <a href="{{ route('approvalOfConstitution.index') }}">
            <p class="{{ Route::is('approvalOfConstitution.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf2')}}</p>
        </a>
    </div>



    <div class="profile_link_box">
        <a href="{{ route('executiveCommitteeApproval.index') }}">
            <p class="{{ Route::is('executiveCommitteeApproval.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf3')}}</p>
        </a>
    </div> --}}

    <div class="profile_link_box">
        <a href="{{ route('logout') }}">
            <p class=""><i class="fa fa-cog pe-2"></i>{{ trans('fd9.l')}}</p>
        </a>
    </div>

</div>

@endif
