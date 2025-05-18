<div class="modal modal-xl fade" id="prokolpoDonor{{ $donationLists->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    ইতোপূর্বে গৃহীত অনুদানের বিবরণ

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">


                            <div class="row">

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">উদ্দেশ্য / কার্যক্রম</label>
                                        <input type="text" value="{{ $donationLists->purpose_or_activities }}" name="purpose_or_activities" class="form-control" id="purpose_or_activities{{ $donationLists->id }}"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">এনজিও বিষয়ক ব্যুরো কর্তৃক অনুমোদনের স্বারক নম্বর <span class="text-danger">*</span></label>
                                        <input type="text"  value="{{ $donationLists->registration_sarok_number }}" name="registration_sarok_number" class="form-control" id="registration_sarok_number{{ $donationLists->id }}"
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">এনজিও বিষয়ক ব্যুরো কর্তৃক অনুমোদনের তারিখ<span class="text-danger">*</span></label>
                                        <input type="text"  value="{{ $donationLists->registration_date }}" name="registration_date" class="form-control datepickerOne" id="registration_date{{ $donationLists->id }}"
                                        placeholder="" >
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">দাতা সংস্থার নাম</label>
                                        <input type="text" value="{{ $donationLists->donor_name }}" name="donor_name" class="form-control" id="donor_name{{ $donationLists->id }}"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">টাকার পরিমাণ</label>
                                        <input type="number" value="{{ $donationLists->money_amount }}" name="money_amount" class="form-control" id="money_amount{{ $donationLists->id }}"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">অডিট রিপোর্ট দাখিল এবং ব্যুরো কর্তৃক গৃহীত হয়েছে কিনা</label>
                                        <input type="text" value="{{ $donationLists->audit_report }}" name="audit_report" class="form-control" id="audit_report{{ $donationLists->id }}"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">সমাপ্তি প্রতিবেদন দাখিল করা হয়েছে কিনা?</label>
                                        <input type="text" value="{{ $donationLists->final_report }}" name="final_report" class="form-control" id="final_report{{ $donationLists->id }}"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">স্থানীয় প্রশাসনের প্রত্যয়ন পত্র দাখিল করা হয়েছে কিনা ?</label>
                                        <input type="text" value="{{ $donationLists->local_certificate }}" name="local_certificate" class="form-control" id="local_certificate{{ $donationLists->id }}"
                                        placeholder="">
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">মন্তব্য<span class="text-danger">*</span></label>
                                        <textarea  name="comment" class="form-control" id="comment{{ $donationLists->id }}" placeholder="">{{ $donationLists->comment }}</textarea>
                                    </div>

                            </div>
                            <a id="{{ $donationLists->id }}"  class="btn btn-registration fc1DonationAjaxEdit">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
