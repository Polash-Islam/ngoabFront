<table class="table table-bordered">
    <tr>
        <td>ক্রমিক নং</td>
        <td>আইটেমের নাম</td>
        <td>পরিমান</td>
        <td>একক মূল্য</td>
        <td>মোট ব্যায়</td>

        <td></td>
    </tr>
    <?php

    $totalExpenseTwo = 0;

    ?>

    @foreach($fd6FurnitureEquipmentsTwo as $key=>$fd6FurnitureEquipmentsList)
    <input type="hidden"  value="{{ $fd6FurnitureEquipmentsList->stepFiveType }}" id="deleteEditType{{ $fd6FurnitureEquipmentsList->id }}"/>
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $fd6FurnitureEquipmentsList->item_name }}</td>
        <td>{{ $fd6FurnitureEquipmentsList->item_quantity }} {{ DB::table('units')->where('id',$fd6FurnitureEquipmentsList->unit_name)->value('name')}}</td>
        <td>{{ $fd6FurnitureEquipmentsList->item_net_price }}</td>
        <td>{{ $fd6FurnitureEquipmentsList->item_total_price }}</td>
        <td>

            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#adjoiningfModalEdit{{ $fd6FurnitureEquipmentsList->id }}" >
                <i class="fa fa-pencil"></i>
            </button>
            @include('front.fd6Form.partTwo.adjoiningfModalEdit')


            <button type="button" onclick="deleteTagAdjoiningf({{ $fd6FurnitureEquipmentsList->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>

        </td>
    </tr>
    <?php $totalExpenseTwo = $totalExpenseTwo + $fd6FurnitureEquipmentsList->item_total_price  ?>
    @endforeach
    <tr>
        <td colspan="4">সর্বমোট </td>
        <td colspan="2">{{ $totalExpenseTwo }}</td>
    </tr>

</table>
