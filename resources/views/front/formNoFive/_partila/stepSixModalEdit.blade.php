<!--modal-->
<div class="modal modal-xl fade" id="exampleModalSix{{ $formNoFiveStepFiveDatas->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    বিবরণী

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <input type="hidden" class="form-control" value="{{ $formNoFiveStepFiveDatas->id }}" name="id" id="id{{ $formNoFiveStepFiveDatas->id }}"  >
                        <input type="hidden" class="form-control" value="{{ $formNoFiveStepFiveDatas->form_no_fives_id }}" name="decode_id"  id="decode_id{{ $formNoFiveStepFiveDatas->id }}">
                            <div class="row">



                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর নাম<span class="text-danger">*</span> </label>
                                    <input id="name_of_the_officer_depend_on_salary{{ $formNoFiveStepFiveDatas->id }}" value="{{ $formNoFiveStepFiveDatas->name_of_the_officer_depend_on_salary }}" name="name_of_the_officer_depend_on_salary"  type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর জাতীয়তা<span class="text-danger">*</span> </label>
                                    <input id="nationality_of_the_officer_depend_on_salary{{ $formNoFiveStepFiveDatas->id }}" value="{{ $formNoFiveStepFiveDatas->nationality_of_the_officer_depend_on_salary }}" name="nationality_of_the_officer_depend_on_salary"  type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর পদবি<span class="text-danger">*</span> </label>
                                    <input id="designation_of_the_officer_depend_on_salary{{ $formNoFiveStepFiveDatas->id }}" value="{{ $formNoFiveStepFiveDatas->designation_of_the_officer_depend_on_salary }}" name="designation_of_the_officer_depend_on_salary"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর দায়িত্ব<span class="text-danger">*</span> </label>
                                    <input id="responsbility_of_the_officer_depend_on_salary{{ $formNoFiveStepFiveDatas->id }}" value="{{ $formNoFiveStepFiveDatas->responsbility_of_the_officer_depend_on_salary }}" name="responsbility_of_the_officer_depend_on_salary"  type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর শিক্ষাগত যোগ্যতা<span class="text-danger">*</span> </label>
                                    <input id="education_of_the_officer_depend_on_salary{{ $formNoFiveStepFiveDatas->id }}" value="{{ $formNoFiveStepFiveDatas->education_of_the_officer_depend_on_salary }}" name="education_of_the_officer_depend_on_salary"  type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর অভিজ্ঞতা <span class="text-danger">*</span> </label>
                                    <input id="experience_of_the_officer_depend_on_salary{{ $formNoFiveStepFiveDatas->id }}" value="{{ $formNoFiveStepFiveDatas->experience_of_the_officer_depend_on_salary }}" name="experience_of_the_officer_depend_on_salary"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর বয়স <span class="text-danger">*</span> </label>
                                    <input id="age_of_the_officer_depend_on_salary{{ $formNoFiveStepFiveDatas->id }}" value="{{ $formNoFiveStepFiveDatas->age_of_the_officer_depend_on_salary }}" name="age_of_the_officer_depend_on_salary"  type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর বেতন <span class="text-danger">*</span> </label>
                                    <input id="salary_of_the_officer_depend_on_salary{{ $formNoFiveStepFiveDatas->id }}" value="{{ $formNoFiveStepFiveDatas->salary_of_the_officer_depend_on_salary }}" name="salary_of_the_officer_depend_on_salary"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর অন্যান্য ভাতা/সুবিধাদি<span class="text-danger">*</span> </label>
                                    <input id="other_allowances_or_benefits_of_the_officer_depend_on_salary{{ $formNoFiveStepFiveDatas->id }}" value="{{ $formNoFiveStepFiveDatas->other_allowances_or_benefits_of_the_officer_depend_on_salary }}" name="other_allowances_or_benefits_of_the_officer_depend_on_salary"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর সংস্থায় চাকুরীর মেয়াদ<span class="text-danger">*</span> </label>
                                    <input id="job_duration_of_the_officer_depend_on_salary{{ $formNoFiveStepFiveDatas->id }}" value="{{ $formNoFiveStepFiveDatas->job_duration_of_the_officer_depend_on_salary }}" name="job_duration_of_the_officer_depend_on_salary"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর অন্য কোনো প্রকল্প থেকে/গৃহীত আর্থিক বা অন্যান্য সুবিধার বর্ণনা <span class="text-danger">*</span> </label>
                                    <input id="financial_benefit_received_from_any_other_scheme{{ $formNoFiveStepFiveDatas->id }}" value="{{ $formNoFiveStepFiveDatas->financial_benefit_received_from_any_other_scheme }}" name="financial_benefit_received_from_any_other_scheme"  type="text" class="form-control">
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">মন্তব্য</label>
                                    <textarea name="comment"  class="form-control" id="comment{{ $formNoFiveStepFiveDatas->id }}" placeholder="">{{ $formNoFiveStepFiveDatas->comment }}</textarea>
                                </div>

                            </div>


                            {{-- <a id="stepSixAjax" class="btn btn-registration">জমা দিন</a> --}}

                            <a id="{{ $formNoFiveStepFiveDatas->id }}"  class="btn btn-registration stepSixAjaxUpdate">আপডেট করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
