
<div class="row">
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)</label>
        <input type="number" value="{{ $fd6FormList->grants_received_from_abroad }}" name="grants_received_from_abroad" class="form-control" id="grants_received_from_abroad{{ $fd6FormList->id}}"
        placeholder="বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান</label>
        <input type="number" value="{{ $fd6FormList->donations_made_by_foreign_donors }}" name="donations_made_by_foreign_donors" class="form-control" id="donations_made_by_foreign_donors{{ $fd6FormList->id}}"
        placeholder="দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)</label>
        <input type="number" value="{{ $fd6FormList->local_grants }}" name="local_grants" class="form-control" id="local_grants{{ $fd6FormList->id}}"
        placeholder="স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)">
    </div>

    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">মোট অনুদান</label>
        <input type="number" value="{{ $fd6FormList->grant_total  }}" readonly name="grants_total" class="form-control" id="grants_total{{ $fd6FormList->id}}"
        placeholder="মোট">
    </div>

    <div class="col-lg-12 mb-3">
        <label for="" class="form-label">প্রকল্প বর্ষ</label>
        <input type="text" value="{{ $fd6FormList->prokolpo_year_grant  }}" readonly name="prokolpo_year_grant" class="form-control" id="prokolpo_year_grant{{ $fd6FormList->id}}"
        placeholder="প্রকল্প বর্ষ">
    </div>

    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">প্রকল্পের মেয়াদ শুরুর তারিখ</label>
        <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_start_date}}"  name="prokolpo_year_grant_start_date" class="form-control datepicker2334" id="prokolpo_year_grant_start_date{{ $fd6FormList->id}}"
        placeholder="প্রকল্পের মেয়াদ শুরুর তারিখ">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">প্রকল্পের মেয়াদ সমাপ্তির তারিখ </label>
        <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_end_date}}"  name="prokolpo_year_grant_end_date" class="form-control datepicker2334" id="prokolpo_year_grant_end_date{{ $fd6FormList->id}}"
        placeholder="প্রকল্পের মেয়াদ সমাপ্তির তারিখ">
    </div>

    <?php  
    $fd6FormEstimateListComment = \App\Models\EstimateCost::where('fd6_form_id',$fd6FormList->fd6_form_id)
                                  ->whereNotNull('comment')
                                  ->orderBy('id','desc')->value('comment');
    
    ?>

    <div class="col-lg-12 mb-3">
        <label for="" class="form-label">মন্তব্য</label>
        <textarea  name="comment_grant" class="form-control" id="comment_grant{{ $fd6FormList->id}}" placeholder="">{{ $fd6FormEstimateListComment }}</textarea>
    </div>
</div>


<a id="{{ $fd6FormList->id}}"  class="btn btn-registration GrantAjaxEdit">দাখিল করুন</a>


