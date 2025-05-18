<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_one.Step_1')}}</h3>
                    </div>
                    <ul class="progress-bar">

                        @if($foreignNgoType == 'Old')
                            <li class="active">{{ trans('fd_one_step_one.fd8')}}</li>
                        @else
                            <li class="active">{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        @endif

                        <li>{{ trans('fd_one_step_one.other_doc_title')}}</li>
                    </ul>
                </div>
                <div class="right-side">
                    <div class="committee_container active">

                        <div class="text">
                            <h2>{{ trans('fd_one_step_one.Particulars_of_Organisation')}}</h2>

                        </div>

                        <div class="fd01_tablist">
                            <div class="fd01_tab fd01_checked"></div>
                            <div class="fd01_tab"></div>
                            <div class="fd01_tab"></div>
                            <div class="fd01_tab"></div>
                        </div>

                        <div class="mt-3">
                            <?php

                            $allParticularsOfOrganisation = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->first();

                            ?>

                            @if(!$allParticularsOfOrganisation)
                                <!--error message start-->
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                @endif

                                @if ($errors->has('digital_signature'))
                                    <span class="text-danger">{{ $errors->first('digital_signature') }}</span>
                                @endif

                                <br>
                                @if ($errors->has('digital_seal'))
                                    <span class="text-danger">{{ $errors->first('digital_seal') }}</span>
                                @endif
                                <!-- error message end --->

                        </div>

                        <form action="{{ route('particularsOfOrganisationPost') }}" method="post"
                              enctype="multipart/form-data" id="form" data-parsley-validate="">
                            @csrf
                            <div class="mb-3">
                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <label for="" class="form-label">সংস্থার নাম (বাংলা) <span
                                            class="text-danger">*</span> </label>
                                @else
                                    <label for="" class="form-label">Organization Name (Bangla) <span
                                            class="text-danger">*</span> </label>
                                @endif
                                <input type="text" class="form-control only-bangla" value=""
                                       name="organization_name_ban"
                                       data-parsley-required id="">
                            </div>

                            <div class="mb-3">
                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <label for="" class="form-label">সংস্থার নাম (English) <span
                                            class="text-danger">*</span> </label>
                                @else
                                    <label for="" class="form-label">Organization Name (English) <span
                                            class="text-danger">*</span> </label>
                                @endif
                                <input type="text" class="form-control only-english" value="" name="organization_name"
                                       data-parsley-required id="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Organization_address')}}
                                    <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control"
                                       value="{{ Session::get('organization_address') }}" name="organization_address"
                                       data-parsley-required id="">
                            </div>
                            <div class="mb-3">
                                <label for=""
                                       class="form-label">{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}
                                    (Bangla)<span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control only-bangla" value="" name="address_of_head_office"
                                       data-parsley-required id="">
                            </div>


                            <div class="mb-3">
                                <label for=""
                                       class="form-label">{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}
                                    (English)<span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control only-english" value="" name="address_of_head_office_eng"
                                       data-parsley-required id="">
                            </div>
                                <?php

                                $countryList = DB::table('countries')->where('id', '!=', 209)->orderBy('id', 'asc')->get();

                                $ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)->value('ngo_type');

                                $getCityzenshipData = DB::table('countries')->whereNotNull('country_people_english')->whereNotNull('country_people_bangla')->orderBy('id', 'asc')->get();

                                ?>

                            @if($ngoTypeInfo == 'দেশিও')
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Country_of_Origin')}}
                                        <span class="text-danger">*</span> </label>
                                    <select name="country_of_origin"
                                            class="js-example-basic-single form-control custom-form-control"
                                            data-parsley-required name="">
                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            <option value="বাংলাদেশ">বাংলাদেশ</option>
                                        @else
                                            <option value="Bangladesh">Bangladesh</option>
                                        @endif
                                    </select>


                                    @else
                                        <div class="mb-3">
                                            <label for=""
                                                   class="form-label">{{ trans('fd_one_step_one.Country_of_Origin')}}
                                                <span class="text-danger">*</span> </label>
                                            <select name="country_of_origin"
                                                    class="js-example-basic-single form-control custom-form-control"
                                                    data-parsley-required name="">
                                                <option value="">{{ trans('civil.select')}}</option>
                                                @foreach($countryList as $allCountryList)
                                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                        <option
                                                            value="{{ $allCountryList->country_name_bangla }}">{{ $allCountryList->country_name_bangla }}</option>
                                                    @else
                                                        <option
                                                            value="{{ $allCountryList->country_name_english }}">{{ $allCountryList->country_name_english }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if($foreignNgoType == 'Old')
                                        <div class="mb-3">
                                            <label for="" class="form-label">Telephone Number<span
                                                    class="text-danger">*</span> </label>
                                            <input type="text" data-parsley-required name="org_phone"
                                                   class="form-control" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mobile Number<span
                                                    class="text-danger">*</span> </label>
                                            <input type="text"
                                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                   type="number"
                                                   maxlength="11" minlength="11" data-parsley-required name="org_mobile"
                                                   class="form-control" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email Address<span
                                                    class="text-danger">*</span> </label>
                                            <input type="email" data-parsley-required name="org_email"
                                                   class="form-control" id="">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Website <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" data-parsley-required name="web_site_name"
                                                   class="form-control" id="">
                                        </div>

                                    @else

                                    @endif

                                    <!-- district list -->

                                        <?php

                                        $allDistrictList = DB::table('districts')->get();


                                        ?>
                                    @if($ngoTypeInfo == 'দেশিও')

                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ trans('fd_one_step_one.district')}}
                                                    <span class="text-danger">*</span> </label>
                                                <select name="district_id"
                                                        class="js-example-basic-single form-control custom-form-control"
                                                        data-parsley-required name="">
                                                    <option value="">{{ trans('civil.select')}}</option>
                                                    @foreach($allDistrictList as $allDistrictLists)

                                                        <option
                                                            value="{{ $allDistrictLists->id }}">{{ $allDistrictLists->bn_name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        @else

                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ trans('fd_one_step_one.district')}}
                                                    <span class="text-danger">*</span> </label>
                                                <select name="district_id"
                                                        class="js-example-basic-single form-control custom-form-control"
                                                        data-parsley-required name="">
                                                    <option value="">{{ trans('civil.select')}}</option>
                                                    @foreach($allDistrictList as $allDistrictLists)

                                                        <option
                                                            value="{{ $allDistrictLists->id }}">{{ $allDistrictLists->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <!-- end district list -->
                                    @endif
                                    <div class="mb-3">
                                        <h5 class="form_middle_text">
                                            {{ trans('fd_one_step_one.Particulars_of_Head_of_the_Organization_in_Bangladesh')}}
                                        </h5>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('fd_one_step_one.name')}} <span
                                                class="text-danger">*</span> </label>
                                        <input type="text" required name="name_of_head_in_bd"
                                               value="{{ Session::get('name_of_head_in_bd') }}" class="form-control"
                                               id="">
                                    </div>


                                    <div class="mb-3">
                                        <label for=""
                                               class="form-label">{{ trans('fd_one_step_one.Whether_part_time_or_full_time')}}
                                            <span class="text-danger">*</span> </label>
                                        <div class="mt-2 mb-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" data-parsley-checkmin="1"
                                                       data-parsley-required type="radio" name="job_type" id=""
                                                       value="{{  trans('fd_one_step_one.Part_Time') }}" {{ trans('fd_one_step_one.Part_Time') == Session::get('job_type') ? 'checked':'' }}>
                                                <label class="form-check-label"
                                                       for="inlineRadio1">{{  trans('fd_one_step_one.Part_Time') }}</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" data-parsley-checkmin="1"
                                                       data-parsley-required type="radio" name="job_type" id=""
                                                       value="{{ trans('fd_one_step_one.Full_Time') }}" {{ trans('fd_one_step_one.Full_Time') == Session::get('job_type') ? 'checked':'' }}>
                                                <label class="form-check-label"
                                                       for="inlineRadio2">{{ trans('fd_one_step_one.Full_Time')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('fd_one_step_one.Address')}} <span
                                                class="text-danger">*</span> </label>
                                        <input type="text" required name="address" value="{{ Session::get('address') }}"
                                               class="form-control" id="">
                                    </div>

                                    @if($foreignNgoType == 'Old')

                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('fd_one_step_one.nn')}} <span
                                                    class="text-danger">*</span> </label>
                                            <input type="text" data-parsley-required name="nationality"
                                                   class="form-control" id="">
                                        </div>
                                    @else

                                    @endif

                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('fd_one_step_one.tele')}}</label>
                                        <input type="number" name="tele_phone_number" class="form-control" id="">
                                    </div>


                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}}
                                            <span class="text-danger">*</span> </label>
                                        <input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number"
                                            maxlength="11" data-parsley-required minlength="11"
                                            data-parsley-trigger=“keyup” name="phone"
                                            value="{{ Session::get('phone') }}" class="form-control" id="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span
                                                class="text-danger">*</span> </label>
                                        <input type="email" data-parsley-required name="email"
                                               value="{{ Session::get('email') }}" class="form-control" id="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('fd_one_step_one.Citizenship')}} <span
                                                class="text-danger">*</span> </label>


                                        <select class="js-example-basic-multiple form-control" data-parsley-required
                                                name="citizenship[]"
                                                multiple="multiple">
                                            <option value="">{{ trans('civil.select')}}</option>
                                            @foreach($getCityzenshipData as $allGetCityzenshipData)
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                    <option
                                                        value="{{ $allGetCityzenshipData->country_people_bangla }}">{{ $allGetCityzenshipData->country_people_bangla }}</option>
                                                @else
                                                    <option
                                                        value="{{ $allGetCityzenshipData->country_people_english }}">{{ $allGetCityzenshipData->country_people_english }}</option>
                                                @endif
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('fd_one_step_one.Profession')}} <span
                                                class="text-danger">*</span> </label>
                                        <input type="text" data-parsley-required
                                               value="{{ Session::get('profession') }}" name="profession"
                                               class="form-control" id="">
                                    </div>


                                    <div class="mb-3">
                                        <h5 class="form_middle_text">
                                            Chief Executive Information
                                        </h5>
                                    </div>


                                    <!--new code for ngo-->
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" data-parsley-required name="chief_name" class="form-control"
                                               id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label mt-3">{{ trans('mview.ttThree')}}: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" data-parsley-required name="chief_desi" class="form-control"
                                               placeholder="{{ trans('mview.ttThree')}}">
                                    </div>


                                    @if($foreignNgoType == 'Old')

                                    @else

                                        <div class="mb-3">
                                            <label for="" class="form-label mt-3">Place: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" data-parsley-required name="place" class="form-control"
                                                   placeholder="Place">
                                        </div>

                                    @endif


                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span
                                                class="text-danger">*</span>
                                            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
                                        <br>
                                        <button type="button"
                                                class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
                                        <br>
                                        <input type="hidden" required name="image_base64">
                                        <div class="croppedInput mt-2">

                                        </div>
                                        <!-- new code for image cropper start --->
                                        @include('front.signature_modal.sign_main_modal')
                                        <!-- new code for image cropper end -->

                                    </div>


                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span
                                                class="text-danger">*</span>
                                            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b>
                                        </label></span>
                                        <br>
                                        <button type="button"
                                                class="btn btn-custom btn-sm next_button btn22ss">{{ trans('zoom.upload')}}</button>

                                        <input type="hidden" required name="image_seal_base64">
                                        <div class="croppedInputss mt-2">

                                        </div>
                                        <!-- new code for image cropper start --->
                                        @include('front.signature_modal.seal_main_modal')
                                        <!-- new code for image cropper end -->
                                    </div>
                                    <!-- end new code -->
                                    <!-- end new code -->


                                    <div class="buttons d-flex justify-content-end ">
                                        <button class="btn btn-danger me-2" name="submit_value"
                                                value="save_and_exit_from_one"
                                                type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
                                        <button class="btn btn-custom next_button" name="submit_value"
                                                value="next_step_from_one"
                                                type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
                                    </div>
                        </form>

                        @else



                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- modal start --->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="modalLabel">{{ trans('oldorg.digiSign')}}</h5> --}}
                <h4 id="mmT"></h4>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelImage" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>
<!--  modal end -->
