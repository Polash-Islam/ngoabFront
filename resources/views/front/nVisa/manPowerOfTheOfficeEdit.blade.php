<div class="card-header custom-color">
    F. Manpower of the office
</div>
<div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th colspan="3">Local (a)</th>                                            </th>
            <th colspan="3">Foreign (b)</th>
            <th rowspan="2">Grand Total  <br>(a+b) </th>
            <th colspan="2">Ratio</th>
        </tr>
        <tr>
            <td>Executive</td>
            <td>Supporting Staff </td>
            <td>Total</td>
            <td>Executive</td>
            <td>Supporting Staff</td>
            <td>Total</td>
            <td>Local </td>
            <td>Foreign</td>
        </tr>
        @if(!$nVisaEdit->nVisaManpowerOfTheOffice)
        <tr>
            <td><input type="text" class="form-control" name="local_executive" id=""></td>
            <td><input type="text" class="form-control" name="local_supporting_staff" id=""></td>
            <td><input type="text" class="form-control" name="local_total" id=""></td>
            <td><input type="text" class="form-control" name="foreign_executive" id=""></td>
            <td><input type="text" class="form-control" name="foreign_supporting_staff" id=""></td>
            <td><input type="text" class="form-control" name="foreign_total" id=""></td>
            <td><input type="text" class="form-control" name="gand_total" id=""></td>
            <td><input type="text" class="form-control" name="local_ratio" id=""></td>
            <td><input type="text" class="form-control" name="foreign_ratio" id=""></td>
        </tr>
        @else
        <tr>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_executive }}" name="local_executive" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_supporting_staff }}" name="local_supporting_staff" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_total }}" name="local_total" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_executive }}" name="foreign_executive" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_supporting_staff }}" name="foreign_supporting_staff" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_total }}" name="foreign_total" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->gand_total }}" name="gand_total" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_ratio }}" name="local_ratio" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_ratio }}" name="foreign_ratio" id=""></td>
        </tr>
        @endif
    </table>
</div>
