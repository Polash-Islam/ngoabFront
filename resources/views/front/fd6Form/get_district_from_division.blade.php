<option value="">--- অনুগ্রহ করে জেলা নির্বাচন করুন ---</option>
@foreach($districtList as $districtListAll)
<option value="{{ $districtListAll->district_bn }}">{{ $districtListAll->district_bn }}</option>
@endforeach
