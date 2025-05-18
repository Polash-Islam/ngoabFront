<?php
 $allFdOneData = DB::table('fd_one_forms')
       ->where('user_id',Auth::user()->id)->first();

 $all_partiw = DB::table('form_eights')->where('fd_one_form_id',$allFdOneData->id)
 ->latest()->get();



$complete_status_fd_eight_id = DB::table('form_eights')->where('fd_one_form_id',$allFdOneData->id)->value('id');
$complete_status_fd_eight = DB::table('form_eights')->where('fd_one_form_id',$allFdOneData->id)->value('complete_status');
$complete_status_fd_eight_pdf = DB::table('form_eights')->where('fd_one_form_id',$allFdOneData->id)->value('verified_form_eight');


?>


                    @include('flash_message')
                    <div class="user_dashboard_right">
                        <h4>{{ trans('fd_one_step_one.form_eight_title')}} </h4>
                    </div>

                  <div class="card-body mt-3 mb-3">
                        <div class="card-body">
                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                            <p>ফরম নং-৮ পিডিএফ ডাউনলোড করে, প্রধান নির্বাহির সিল, স্বাক্ষর সহ আপলোড করুন</p>
                            @else

                            <p>Download Form No-8 PDF, upload with seal, signature of Chief Executive</p>
                            @endif
                            <table class="table table-bordered">
                                <tr>
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <td>পিডিএফ ডাউনলোড</td>
                                    {{-- <td>পিডিএফ আপলোড</td> --}}
                                    <td>তথ্য সংশোধন করুন</td>
                                    @else
                                    <td>PDF Download</td>
                                    {{-- <td>PDF Upload</td> --}}
                                    <td>Update Information</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>
                                         <a class="btn btn-sm btn-success" target="_blank" href = "{{ route('formEightNgoCommitteeMemberPdf') }}">
                            {{ trans('form 8_bn.download_pdf')}}
                        </a>
                                    </td>
                                    {{-- <td>
                                       @if($complete_status_fd_eight == 'complete')

                        @if($complete_status_fd_eight_pdf == 0)
                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#formEightexampleModal">
                            {{ trans('form 8_bn.upload_pdf')}}
                        </button>
                        @else

                        <?php

                        $file_path = url($complete_status_fd_eight_pdf);
                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                        ?>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#formEightexampleModal">
                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                            পুনরায় আপলোড করুন
                            @else
                            Re-upload
                            @endif
                        </button><br>
                        <p class="badge bg-success rounded">{{ $filename.'.'.$extension }}</p>
                        @endif
<!-- Modal -->
<div class="modal fade" id="formEightexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('uploadFromEightPdf') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                @csrf

                <div class=" mb-3">
                    <label for="" class="form-label">{{ trans('form 8_bn.pdf')}}:</label>
                    <input type="file" data-parsley-required accept=".pdf" name="verified_form_eight"  class="form-control" id="">
                    <input type="hidden" data-parsley-required  name="id"  value="{{ $complete_status_fd_eight_id }}" class="form-control" id="">
                </div>

                <button class="btn btn-sm btn-success" type="submit">
                    {{ trans('form 8_bn.upload_pdf')}}
                </button>
            </form>
        </div>

      </div>
    </div>
  </div>


                        @else


                        @endif
                                    </td> --}}
                                    <td>
                                         <button class="btn btn-sm btn-success" onclick="location.href = '{{ route('formEightNgoCommitteeMemberViewFormEdit') }}';">
                            {{ trans('form 8_bn.update_eight')}}
                        </button>
                                    </td>
                                </tr>
                            </table>

                            <?php

                    $data = DB::table('form_eights')->where('fd_one_form_id',$allFdOneData->id)
                           ->first();




$count = 0;
foreach ($data   as $a) {
    if (is_null($a)) {
        $count++;
  }
}
//dd($count);


                    ?>

                    @if($count == 0)
                    <p class="badge bg-success rounded">{{ trans('form 8_bn.complete_status')}}</p>

                            @else

                            <p class="badge bg-danger rounded">{{ trans('form 8_bn.un_complete_status')}}</p>

                            @endif
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-body">


                            <table class="table table-borderless">
                                <tbody>

                                @foreach($all_partiw as $key=>$all_all_parti)
                                <tr>
                                    <td></td>
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}.</td>
                                    <td>{{ trans('form 8_bn.member')}} {{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}</td>
                                    @else
                                    <td>{{ $key+1}}.</td>
                                    <td>{{ trans('form 8_bn.member')}}  {{$key+1}}</td>
                                    @endif
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.a')}} )</td>
                                    <td>{{ trans('form 8_bn.name')}}</td>
                                    <td>: {{ $all_all_parti->name }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.b')}})</td>
                                    <td>{{ trans('form 8_bn.designation')}}</td>
                                    <td>: {{ $all_all_parti->desi }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.c')}})</td>
                                    <td>{{ trans('form 8_bn.date_of_birth')}}</td>
                                    <td>:

                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                        <?php

                                        $newDate12 = date("d-m-Y", strtotime($all_all_parti->dob));

                                                                                        ?>


                                                                                    {{ App\Http\Controllers\NGO\CommonController::englishToBangla($newDate12)}}

@else

<?php

                                        $newDate12 = date("d-m-Y", strtotime($all_all_parti->dob));

                                                                                        ?>
{{ $newDate12 }}

@endif

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.d')}})</td>
                                    <td>{{ trans('form 8_bn.present_address')}}</td>
                                    <td>: {{ $all_all_parti->present_address }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.e')}})</td>
                                    <td>{{ trans('form 8_bn.permanent_address')}}</td>
                                    <td>: {{ $all_all_parti->permanent_address }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.f')}})</td>
                                    <td>{{ trans('form 8_bn.nid_no')}}</td>
                                    <td>:
                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_all_parti->nid_no) }}
                                        @else
                                        {{ $all_all_parti->nid_no }}
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.g')}})</td>
                                    <td>{{ trans('form 8_bn.mobile_no')}}</td>
                                    <td>:  @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_all_parti->phone) }}
                                        @else
                                        {{ $all_all_parti->phone }}
                                        @endif</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.h')}})</td>
                                    <td>{{ trans('form 8_bn.fathers_name')}}</td>
                                    <td>: {{ $all_all_parti->father_name }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.i')}})</td>
                                    <td>{{ trans('form 8_bn.name_of_spouse')}} </td>
                                    <td>: {{ $all_all_parti->name_supouse }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.j')}})</td>
                                    <td>{{ trans('form 8_bn.Educational_Qualification')}}</td>
                                    <td>: {{ $all_all_parti->edu_quali }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.k')}})</td>
                                    <td>{{ trans('form 8_bn.profession')}} </td>
                                    <td>: {{ $all_all_parti->profession }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.l')}})</td>
                                    <td>{{ trans('form 8_bn.description_of_job')}}</td>
                                    <td>: {{ $all_all_parti->job_des }}</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.m')}})</td>
                                    <td>{{ trans('form 8_bn.member_of_service_holder_of_Any_other_ngo')}}</td>
                                    <td>: {{ $all_all_parti->service_status }}</td>
                                </tr>



                                {{-- <tr>
                                    <td></td>
                                    <td>(ণ)</td>
                                    <td>স্বাক্ষর</td>
                                    <td>:  <img src="{{ asset('/') }}{{ $all_all_parti->image  }}" style="height:50px;" /></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>(ত)</td>
                                    <td>তারিখ</td>
                                    <td>: {{ $all_all_parti->main_date }}</td>
                                </tr> --}}
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>



