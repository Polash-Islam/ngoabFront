<option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে উপজেলা নির্বাচন করুন ---</option>
@foreach($upozilaList as $upozilaListAll)
<option value="{{ $upozilaListAll->thana_bn }}">{{ $upozilaListAll->thana_bn }}</option>
@endforeach
