<option value="">--নির্বাচন করুন--</option>
@foreach($getIndicatorDescription as $getIndicatorDescriptions)
<option value="{{$getIndicatorDescriptions->id}}">{{$getIndicatorDescriptions->description}}</option>
@endforeach