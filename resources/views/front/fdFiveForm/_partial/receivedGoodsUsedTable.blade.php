<table class="table table-bordered">
    <tr>
        <th colspan="6">ব্যবহার/বিবরণ </th>
    </tr>
    <tr style="text-align: center;">
        <th>সংস্থার ব্যবহারের পরিমাণ</th>
        <th>যাকে প্রদান করা হয়েছে তাঁর বিবরণ প্রদানের কারণ </th>
        <th>কোন মালামাল বিক্রয় করা হয়ে থাকলে তার বিবরণ (ব্যুরোর অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
        <th>কোন মালামাল হস্তান্তর করা হয়ে থাকলে তার বিবরণ (ব্যুরোর অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
        <th>যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে তার বিবরণ (ব্যুরো অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
        <th>অবশিষ্ট মালামালের বিবরণ (যদি থাকে)</th>
        <th></th>
    </tr>

@foreach($receivedGoodUsedList  as $receivedGoodLists)
    <tr>
        <td>{{ $receivedGoodLists->organization_usage_volume }}</td>
        <td>{!! $receivedGoodLists->person_detail !!}</td>
        <td>
            {!! $receivedGoodLists->details_of_any_goods_sold !!}

            @if(empty($receivedGoodLists->bureau_approval_file_goods_sold))

            @else
            ব্যুরোর অনুমোদনপত্র: <a target="_blank" href="{{ route('fdFiveReceivedGoodsUsedpdf',[
            'title' =>'bureau_approval_file_goods_sold',
             'id' => $receivedGoodLists->id
          ]
     ) }}" class="btn btn-success btn-sm">
     <i class="fa fa-file-pdf-o"></i>
   </a>
            @endif
        </td>
        <td>
        {!! $receivedGoodLists->goods_transferred_detail !!}

        @if(empty($receivedGoodLists->bureau_approval_file_transferred_detail))

        @else
        ব্যুরোর অনুমোদনপত্র: <a target="_blank" href="{{ route('fdFiveReceivedGoodsUsedpdf',[
            'title' =>'bureau_approval_file_transferred_detail',
             'id' => $receivedGoodLists->id
          ]
     ) }}" class="btn btn-success btn-sm">
     <i class="fa fa-file-pdf-o"></i>
   </a>
        @endif
        </td>
        <td>
        {!! $receivedGoodLists->detail_of_goods_medium !!}

        @if(empty($receivedGoodLists->bureau_approval_file_goods_medium))

        @else
        ব্যুরোর অনুমোদনপত্র: <a target="_blank" href="{{ route('fdFiveReceivedGoodsUsedpdf',[
            'title' =>'bureau_approval_file_goods_medium',
             'id' => $receivedGoodLists->id
          ]
     ) }}" class="btn btn-success btn-sm">
     <i class="fa fa-file-pdf-o"></i>
   </a>
        @endif
        </td>
        <td>{!! $receivedGoodLists->details_of_remaining_goods !!}</td>

      <td>

        <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalDataUpdateUsed{{ $receivedGoodLists->id }}" >
            <i class="fa fa-pencil"></i>
        </button>
        @include('front.fdFiveForm._partial.usedModalEdit')


        <button type="button" onclick="deleteTagReceivedGoodsUsed({{ $receivedGoodLists->id}})" class="btn btn-sm btn-outline-danger"><i
            class="bi bi-trash"></i></button>

      </td>
    </tr>
@endforeach

</table>
