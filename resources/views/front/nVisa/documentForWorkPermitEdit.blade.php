<div class="card-header custom-color">
    G. Necessary Document for Work Permit (PDF)
</div>
<div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Required Attachment</th>
            <th>Action</th>
        </tr>
        {{-- <tr>
            <td>1</td>
            <td>Copy of buyer's nomination letter in case of employment of buyer;s representative</td>
            <td>
                <input type="file" accept="application/pdf" name="nomination_letter_of_buyer" class="form-control" id="">

                @if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit)

                @else
                <?php

                if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->nomination_letter_of_buyer){

                }else{



                $file_path = url($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->nomination_letter_of_buyer);
                $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                echo $filename.'.'.$extension ;
                }


                ?>

                @endif
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Copy of registration letter of board of investment, if not submitted earlier</td>
            <td>
                <input type="file" accept="application/pdf" name="registration_letter_of_board_of_investment" class="form-control" id="">

                @if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit)

                @else
                <?php

if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->registration_letter_of_board_of_investment){

}else{



$file_path = url($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->registration_letter_of_board_of_investment);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);

$extension = pathinfo($file_path, PATHINFO_EXTENSION);
echo $filename.'.'.$extension ;
}




                ?>

                @endif
            </td>
        </tr> --}}
        <tr>
            <td>1</td>
            <td>Copy of service contract/agreement/ appointment letter in case of employee<br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></td>
            <td>
                <input type="file" accept="application/pdf" name="employee_contract_copy" class="form-control" id="nVisaDoc1">

                <p id="nVisaDoc1_text" class="text-danger mt-2" style="font-size:12px;"></p>

                @if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit)

                @else
                <?php

if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->employee_contract_copy){

}else{



$file_path = url($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->employee_contract_copy);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);

$extension = pathinfo($file_path, PATHINFO_EXTENSION);
echo $filename.'.'.$extension ;
}




                ?>

                @endif
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Decision of the board of the directors of the company regarding employment of foreign nationals (In case of limited company) showing salary & other facility only signed by directors present in the meeting<br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></td>
            <td>
                <input type="file" accept="application/pdf" name="board_of_the_directors_sign_letter" class="form-control" id="nVisaDoc2">
                <p id="nVisaDoc2_text" class="text-danger mt-2" style="font-size:12px;"></p>
                @if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit)

                @else
                <?php

if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->board_of_the_directors_sign_letter){

}else{



$file_path = url($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->board_of_the_directors_sign_letter);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);

$extension = pathinfo($file_path, PATHINFO_EXTENSION);
echo $filename.'.'.$extension ;
}




                ?>

                @endif
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>	Memorandum & Articles of Association of the company duly signed by shareholders along with certificate of incorporation (In case of limited company), if not sumitted earlier <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></td>
            <td>
                <input type="file" accept="application/pdf" name="share_holder_copy"  class="form-control" id="nVisaDoc3">
                <p id="nVisaDoc3_text" class="text-danger mt-2" style="font-size:12px;"></p>
                @if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit)

                @else
                <?php

if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->share_holder_copy){

}else{



$file_path = url($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->share_holder_copy);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);

$extension = pathinfo($file_path, PATHINFO_EXTENSION);
echo $filename.'.'.$extension ;
}




                ?>

                @endif
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Photocopy of passport with E-type visa for employees/PI-type visa for Investors <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></td>
            <td>
                <input type="file" accept="application/pdf" name="passport_photocopy"  class="form-control" id="nVisaDoc4">
                <p id="nVisaDoc4_text" class="text-danger mt-2" style="font-size:12px;"></p>
                @if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit)

                @else
                <?php

if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->passport_photocopy){

}else{



$file_path = url($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->passport_photocopy);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);

$extension = pathinfo($file_path, PATHINFO_EXTENSION);
echo $filename.'.'.$extension ;
}




                ?>

                @endif
            </td>
        </tr>
    </table>
</div>
