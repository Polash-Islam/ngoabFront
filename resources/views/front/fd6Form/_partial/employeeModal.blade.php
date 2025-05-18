<div class="modal modal-xl fade" id="ProkolppoKormokorta"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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

              <?php


$newNationality =  DB::table('countries')->whereNotNull('country_people_bangla')
                                           ->groupBy('country_people_bangla')
                                           ->select('country_people_bangla')->get();



            ?>
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">কর্মকর্তা-কর্মচারীর নাম<span class="text-danger">*</span></label>
                                <input type="text"  name="name" class="form-control" id="name0"
                                placeholder="কর্মকর্তা-কর্মচারীর নাম">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">কর্মকর্তা-কর্মচারীর পদবি<span class="text-danger">*</span></label>
                                <input type="text"  name="designation" class="form-control" id="designation0"
                                placeholder="কর্মকর্তা-কর্মচারীর পদবি">
                            </div>

                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">কর্মকর্তা-কর্মচারীর জাতীয়তা<span class="text-danger">*</span></label>
                                {{-- <input type="text"  name="nationality" class="form-control" id="nationality0"
                                placeholder="কর্মকর্তা-কর্মচারীর জাতীয়তা"> --}}

                                <select  name="nationality" class="form-control" id="nationality0"
                                placeholder="কর্মকর্তা-কর্মচারীর জাতীয়তা">

                                <option value="">অনুগ্রহ করে নির্বাচন করুন</option>

                                @foreach ($newNationality as $newNationalitys)
                                <option value="{{ $newNationalitys->country_people_bangla }}">{{ $newNationalitys->country_people_bangla }}</option>
                                @endforeach

                                </select>


                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">কর্মকর্তা-কর্মচারীর মেয়াদ (জনমাস)<span class="text-danger">*</span></label>
                                <input type="text"  name="duration" class="form-control" id="duration0"
                                placeholder="কর্মকর্তা-কর্মচারীর মেয়াদ (জনমাস)">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">কর্মকর্তা-কর্মচারীর শিক্ষাগত যোগ্যতা<span class="text-danger">*</span></label>
                                <input type="text"  name="educational_qualification" class="form-control" id="educational_qualification0"
                                placeholder=" কর্মকর্তা-কর্মচারীর শিক্ষাগত যোগ্যতা">
                            </div>


                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">কর্মকর্তা-কর্মচারীর অভিজ্ঞতা<span class="text-danger">*</span></label>
                                <input type="text"  name="experience" class="form-control" id="experience0"
                                placeholder="কর্মকর্তা-কর্মচারীর অভিজ্ঞতা">
                            </div>


                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">কর্মকর্তা-কর্মচারীর দায়িত্বসমূহ<span class="text-danger">*</span></label>
                                <input type="text"  name="responsibility" class="form-control" id="responsibility0"
                                placeholder="কর্মকর্তা-কর্মচারীর দায়িত্বসমূহ">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">কর্মকর্তা-কর্মচারীর বেতন-ভাতাদি(এই প্রকল্প হতে)<span class="text-danger">*</span></label>
                                <input type="text"  name="salary_from_this_project" class="form-control" id="salary_from_this_project0"
                                placeholder="কর্মকর্তা-কর্মচারীর বেতন-ভাতাদি(এই প্রকল্প হতে)">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">কর্মকর্তা-কর্মচারীর বেতন-ভাতাদি(অন্যান্য প্রকল্প হতে)<span class="text-danger">*</span></label>
                                <input type="text"  name="salary_from_other_project" class="form-control" id="salary_from_other_project0"
                                placeholder="কর্মকর্তা-কর্মচারীর বেতন-ভাতাদি(অন্যান্য প্রকল্প হতে)">
                            </div>


                        </div>
                        <a id="employeeInfoPost"  class="btn btn-registration">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
