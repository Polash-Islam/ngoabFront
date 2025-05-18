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
                <object
            data='{{ $adminUrl }}{{ 'public/'.$noticeList }}'
            type="application/pdf"
            width="100%"
            height="900"
          >

            <iframe
              src='{{ $adminUrl }}{{ 'public/'.$noticeList }}'
              width="100%"
              height="900"
            >
            <p>This browser does not support PDF!</p>
            </iframe>
          </object>
            </div>
        </div>

    </div>
</section>
@endsection
