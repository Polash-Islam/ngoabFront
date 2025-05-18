<?php
$ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');

?>


@if($ngoTypeInfo == 'দেশিও')



<div class="d-flex justify-content-between mb-4">
    <div class="p-2">
        <h5>{{ trans('other_doc.all_doc')}}</h5>
    </div>
    <div class="p-2">
        {{-- <button class="btn btn-primary btn-custom" type="button" onclick="location.href = '{{ route('ngoDocument.create') }}';">
            {{ trans('other_doc.add_new_document')}}
        </button> --}}
    </div>
</div>


  <?php
                        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
                        $ngoOtherDocLists = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneFormId)->latest()->get();


                                                ?>


<div class="file-content">
    <div class="card">
        <div class="card-body file-manager">


            <!-- new code for table strat -->

            <table class="table table-border">
                @foreach($ngoOtherDocLists as $key=>$all_ngo_list_all)
                <?php
            $file_path = url($all_ngo_list_all->pdf_file_list);
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);
            ?>
                <tr>
                    <td>
                        @if($key+1 == 1)

                        @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        <h6>ফরম নং - ৮</h6>
                        @else

                        <h6>Form No - 8</h6>
                        @endif

                        @elseif($key+1 == 2)

                        @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                        <h6> নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ জাতীয় পরিচয়পত্রে সত্যায়িত অনুলিপি</h6>
                        @else

                        <h6>Certificate Of Incorporation in the Country Of Origin</h6>
                        @endif

                    @elseif($key+1 == 3)

                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                    <h6>প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি </h6>
                    @else

                    <h6>Attested copy of constitution</h6>
                    @endif

                    @elseif($key+1 == 4)

                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                    <h6>গঠনতন্ত্রের (প্রাথমিক নিবন্ধন কতৃপক্ষ কর্তৃক অনুমোদিত ) সত্যায়িত অনুলিপি </h6>
                    @else

                    <h6>Activity report of the organization</h6>
                    @endif

                    @elseif($key+1 == 5)


                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                    <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                    @else

                    <h6>Decision Of the Committee/Board To Open Office In Bangladesh</h6>
                    @endif



                    @elseif($key+1 == 6)

                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                    <h6>দাতা সংস্থার প্রতিশ্রুতিপত্র (সংস্থার প্রধান কর্তৃক সত্যায়িত )</h6>
                    @else

                    <h6>Letter Of Appoinment Of The Country Representative</h6>
                    @endif

                    @elseif($key+1 == 7)

                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                    <h6>সংস্থার নির্বাহী কমিটি গঠন সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি (উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ )</h6>
                    @else

                    <h6>Letter Of Intent </h6>
                    @endif
                    @elseif($key+1 == 8)

                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                    <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা (প্রত্যেক সদস্যদের স্বাক্ষরসহ নাম, পিতা /মাতা, স্বামী/স্ত্রী'র নাম ও ঠিকানা ,জাতীয় পরিচয়পত্র নম্বর )</h6>
                    @else

                    <h6>Letter Of Intent </h6>
                    @endif
                    @endif
                    <h6>{{ $filename }}</h6>
                            <p class="mb-1">{{ $all_ngo_list_all->file_size }} {{ trans('other_doc.m_b')}}</p>
                    </td>
                    <td>

                        <div class="buttons d-flex  mt-4">


                            <button data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $all_ngo_list_all->id  }}"><i class="fa fa-pencil"></i></button>

                                    <!--modal -->
                                    <div class="modal fade" id="exampleModal{{ $all_ngo_list_all->id  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">

                                                        @if($key+1 == 1)

                                                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                                    <h6>ফরম নং - ৮</h6>
                                                    @else

                                                    <h6>Form No - 8</h6>
                                                    @endif

                                                    @elseif($key+1 == 2)

                                                    @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                                    <h6> নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ জাতীয় পরিচয়পত্রে সত্যায়িত অনুলিপি</h6>
                                                    @else

                                                    <h6>Certificate Of Incorporation in the Country Of Origin</h6>
                                                    @endif

                                                @elseif($key+1 == 3)

                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                <h6>প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি </h6>
                                                @else

                                                <h6>Attested copy of constitution</h6>
                                                @endif

                                                @elseif($key+1 == 4)

                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                <h6>গঠনতন্ত্রের (প্রাথমিক নিবন্ধন কতৃপক্ষ কর্তৃক অনুমোদিত ) সত্যায়িত অনুলিপি </h6>
                                                @else

                                                <h6>Activity report of the organization</h6>
                                                @endif

                                                @elseif($key+1 == 5)


                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                                                @else

                                                <h6>Decision Of the Committee/Board To Open Office In Bangladesh</h6>
                                                @endif



                                                @elseif($key+1 == 6)

                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                <h6>দাতা সংস্থার প্রতিশ্রুতিপত্র (সংস্থার প্রধান কর্তৃক সত্যায়িত )</h6>
                                                @else

                                                <h6>Letter Of Appoinment Of The Country Representative</h6>
                                                @endif

                                                @elseif($key+1 == 7)

                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                <h6>সংস্থার নির্বাহী কমিটি গঠন সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি (উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ )</h6>
                                                @else

                                                <h6>Letter Of Intent </h6>
                                                @endif
                                                @elseif($key+1 == 8)

                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা (প্রত্যেক সদস্যদের স্বাক্ষরসহ নাম, পিতা /মাতা, স্বামী/স্ত্রী'র নাম ও ঠিকানা ,জাতীয় পরিচয়পত্র নম্বর )</h6>
                                                @else

                                                <h6>Letter Of Intent </h6>
                                                @endif
                                                @endif

                                                </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="form" method="post" action="{{ route('ngoDocument.update',$all_ngo_list_all->id ) }}" enctype="multipart/form-data">

                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">

                                                            <input type="file" name="pdf_file_list" class="form-control" id="">

                                                            <iframe src="{{ asset('/') }}{{'public/'. $all_ngo_list_all->pdf_file_list  }}"
    style="width:300px; height:150px;" frameborder="0"></iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">{{ trans('form 8_bn.update')}}</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--model end -->

                            <a data-toggle="tooltip" data-placement="top" title="Download" class="btn btn-sm btn-registration" style="margin-left:5px;" target="_blank"  href = '{{ route('ngoDocumentDownload',$all_ngo_list_all->id) }}'><i class="fa fa-download"></i></a>
                            {{-- <button  onclick="deleteTag({{ $all_ngo_list_all->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button> --}}
                        </div>

                    </td>
                </tr>
                @endforeach
            </table>


            <!-- new code for table end -->

        </div>
    </div>
</div>

@else

<div class="d-flex justify-content-between mb-4">
    <div class="p-2">
        <h5>{{ trans('other_doc.all_doc')}}</h5>
    </div>
    <div class="p-2">
        <button class="btn btn-primary btn-custom" type="button" onclick="location.href = '{{ route('ngoDocument.create') }}';">
            {{ trans('other_doc.add_new_document')}}
        </button>
    </div>
</div>


  <?php
                        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
                        $ngoOtherDocLists = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneFormId)->latest()->get();


                                                ?>


<div class="file-content">
    <div class="card">
        <div class="card-body file-manager">
            <div class="files">

                @foreach($ngoOtherDocLists as $key=>$all_ngo_list_all)

            <?php

            $file_path = url($all_ngo_list_all->pdf_file_list);
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);






            ?>


                <div class="file-box">

                    @if($key+1 == 1)



                                                                                <h6> Certificate Of Incorporation in the Country Of Origin </h6>


                                                                            @elseif($key+1 == 2)



                                                                            <h6>Constitution</h6>


                                                                            @elseif($key+1 == 3)



                                                                            <h6>Activities Report</h6>


                                                                            @elseif($key+1 == 4)




                                                                            <h6>Decision Of the Committee/Board To Open Office In Bangladesh</h6>




                                                                            @elseif($key+1 == 5)



                                                                            <h6>Deed Of Agreement Stamp Of TK.300/-with the landlord in Support Of Opening the Office In Bangladesh</h6>

                                                                            @elseif($key+1 == 6)


                                                                            <h6>Letter Of Intent</h6>

                                                                            @endif



                    <div class="file-top">
                        <i class="fa fa-file-pdf-o txt-primary"></i>
                    </div>
                    <div class="mt-2">
                        <h6>{{ $filename }}</h6>
                        <p class="mb-1">{{ $all_ngo_list_all->file_size }} {{ trans('other_doc.m_b')}}</p>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $all_ngo_list_all->id  }}"><i class="fa fa-pencil"></i></button>

                                <!--modal -->
                                <div class="modal fade" id="exampleModal{{ $all_ngo_list_all->id  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    @if($key+1 == 1)



                                                                                <h6> Certificate Of Incorporation in the Country Of Origin </h6>


                                                                            @elseif($key+1 == 2)



                                                                            <h6>Constitution</h6>


                                                                            @elseif($key+1 == 3)



                                                                            <h6>Activities Report</h6>


                                                                            @elseif($key+1 == 4)




                                                                            <h6>Decision Of the Committee/Board To Open Office In Bangladesh</h6>




                                                                            @elseif($key+1 == 5)



                                                                            <h6>Deed Of Agreement Stamp Of TK.300/-with the landlord in Support Of Opening the Office In Bangladesh</h6>

                                                                            @elseif($key+1 == 6)


                                                                            <h6>Letter Of Intent</h6>

                                                                            @endif

                                            </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form" method="post" action="{{ route('ngoDocument.update',$all_ngo_list_all->id ) }}" enctype="multipart/form-data">

                                                    @csrf
                                                    @method('PUT')

                                                    <div class="mb-3">

                                                        <input type="file" name="pdf_file_list" class="form-control" id="">

                                                        <iframe src="{{ asset('/') }}{{'public/'. $all_ngo_list_all->pdf_file_list  }}"
style="width:300px; height:150px;" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">{{ trans('form 8_bn.update')}}</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--model end -->

                        <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('ngoDocumentDownload',$all_ngo_list_all->id) }}'><i class="fa fa-download"></i></a>
                        {{-- <button  onclick="deleteTag({{ $all_ngo_list_all->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button> --}}
                    </div>
                </div>
                <form id="delete-form-{{ $all_ngo_list_all->id }}" action="{{ route('ngoDocument.destroy',$all_ngo_list_all->id) }}" method="POST" style="display: none;">

                    @csrf
@method('DELETE')
                </form>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endif
