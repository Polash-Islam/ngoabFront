<option value="">--নির্বাচন করুন--</option>
@foreach($getTargetDescription as $getTargetDescriptions)
<option value="{{$getTargetDescriptions->id}}">{{$getTargetDescriptions->description}}</option>
@endforeach