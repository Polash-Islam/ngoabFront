
@extends('front.master.master')

@section('title')
{{ trans('ngo_member_doc.nid_and_images')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

@include('front.form.ngo_registration_form_nid_image_info')




@endsection

@section('script')

@endsection
