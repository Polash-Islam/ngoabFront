@extends('front.master.master')

@section('title')
@if(session()->get('locale') == 'en' || empty(session()->get('locale')))
নোটিশ বোর্ড | {{ trans('header.ngo_ab')}}
@else
Notice Board| {{ trans('header.ngo_ab')}}
@endif
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="card">
            <div class="card-body p-3">
                <h4 class="card-title pb-3">
                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                    সকল নোটিশ
                    @else
                 All Notice
                    @endif

                </h4>
                <table id="" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr role="row">
                        <th style="width: 5%;">ক্রমিক</th>
                        <th style="width: 70%;">শিরোনাম</th>
                        <th style="width: 15%;">প্রকাশের তারিখ</th>
                        <th style="width: 10%;">ডাউনলোড</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $count = count($noticeList) ?>
                        @foreach($noticeList as $key=>$allNoticeList)

                    <tr>
                        <td>{{$count-$key }}</td>
                        <td>{{ $allNoticeList->headline }}</td>
                        <td>{{App\Http\Controllers\NGO\CommonController::englishToBangla( Carbon\Carbon::parse($allNoticeList->created_at)->toDateString()) }}</td>
                        <td>
                            <a href="{{ route('viewNotice',$allNoticeList->id) }}" target="_blank""> <i class="bi bi-file-earmark-pdf fs-2"></i> </a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
@endsection
