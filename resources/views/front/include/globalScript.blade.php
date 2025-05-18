
{{--<script>--}}
{{--    var i = 0;--}}
{{--    $("#dynamic-ar").click(function () {--}}
{{--        ++i;--}}
{{--        $("#dynamicAddRemove").append('<tr><td style="width: 95%"><div class="row"><div class="col-lg-4 mb-3"><label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label><select required name="division_name[]" class="form-control division_name" id="division_name' + i + '"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>@foreach($divisionList as $districtListAll)<option value="{{ $districtListAll->division_bn }}">{{ $districtListAll->division_bn }}</option>@endforeach</select></div><div class="col-lg-4 mb-3"><label for="" class="form-label">জেলা <span class="text-danger">*</span></label><select required name="district_name[]" class="form-control district_name" id="district_name' + i + '"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div><div class="col-lg-4 mb-3"><label for="" class="form-label">সিটি কর্পোরেশন</label><select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name' + i + '"><option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div><div class="col-lg-3 mb-3"><label for="" class="form-label">উপজেলা</label><input type="text" name="upozila_name[]" class="form-control" id="upozila_name' + i + '" placeholder=""></div><div class="col-lg-3 mb-3"><label for="" class="form-label">থানা <span class="text-danger">*</span></label><input type="text" name="thana_name[]" class="form-control" id="thana_name' + i + '" placeholder="" required></div><div class="col-lg-3 mb-3"><label for="" class="form-label">পৌরসভা</label><input type="text" name="municipality_name[]" class="form-control" id="municipality_name' + i + '" placeholder=""></div><div class="col-lg-3 mb-3"><label for="" class="form-label">ওয়ার্ড</label><input type="text" name="ward_name[]" class="form-control" id="ward_name' + i + '"placeholder=""></div><div class="col-lg-4 mb-3"><label for="" class="form-label">প্রকল্পের ধরণ<span class="text-danger">*</span></label><select required name="prokolpoType[]" class="form-control " id="prokolpoType' + i + '" placeholder=""><option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>@foreach($projectSubjectList as $projectSubjectLists)<option value="{{ $projectSubjectLists->id }}">{{ $projectSubjectLists->name }}</option>@endforeach</select></div><div class="col-lg-4 mb-3"><label for="" class="form-label">বরাদ্দকৃত বাজেট<span class="text-danger">*</span></label><input type="text" required name="allocated_budget[]" class="form-control" id="allocated_budget' + i + '" placeholder=""></div><div class="col-lg-4 mb-3"><label for="" class="form-label">মোট উপকারভোগীর সংখ্যা<span class="text-danger">*</span></label><input type="text" required name="beneficiaries_total[]" class="form-control" id="beneficiaries_total' + i + '" placeholder=""></div></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');--}}
{{--    });--}}
{{--    $(document).on('click', '.remove-input-field', function () {--}}
{{--        $(this).parents('tr').remove();--}}
{{--    });--}}

{{--</script>--}}

<script>


    $(document).on('change', '.new_area_type', function () {

        var main_id = $(this).attr('id');
        var get_id_from_main = main_id.slice(13);
        var thisAreaType = $(this).val();


        //alert(thisAreaType);

        if (thisAreaType == 'জেলা') {


            $('#districtDiv' + get_id_from_main).show();
            $('#upoDiv' + get_id_from_main).show();
            $('#thanaDiv' + get_id_from_main).show();
            $('#munDiv' + get_id_from_main).show();
            $('#wardDiv' + get_id_from_main).show();
            $('#cityDiv' + get_id_from_main).hide();


        } else if (thisAreaType == 'সিটি কর্পোরেশন') {

            $('#districtDiv' + get_id_from_main).hide();
            $('#upoDiv' + get_id_from_main).hide();
            $('#thanaDiv' + get_id_from_main).hide();
            $('#munDiv' + get_id_from_main).hide();
            $('#wardDiv' + get_id_from_main).show();
            $('#cityDiv' + get_id_from_main).show();


        } else {


            $('#districtDiv' + get_id_from_main).show();
            $('#upoDiv' + get_id_from_main).show();
            $('#thanaDiv' + get_id_from_main).show();
            $('#munDiv' + get_id_from_main).show();
            $('#wardDiv' + get_id_from_main).show();
            $('#cityDiv' + get_id_from_main).show();

        }

    });
</script>
