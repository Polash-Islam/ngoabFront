<table class="table table-bordered">
    <tr>
        <td>ত্রু: নং</td>
        <td>শিরোনাম/বিষয়</td>
        <td>তারিখ,সময় ও স্থান (সম্ভাব্য)</td>
        <td>সংখ্যা</td>
        <td>অংশগ্রহণকারীর সংখ্যা</td>
        <td>বাজেট</td>
        <td>মন্তব্য</td>
        <td></td>
    </tr>

    @foreach($fd6AdjoiningGList as $key=>$fd6AdjoiningGLists)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $fd6AdjoiningGLists->subject }}</td>
        <td>{{ $fd6AdjoiningGLists->seminer_date }},{{ $fd6AdjoiningGLists->seminer_time }} ও {{ $fd6AdjoiningGLists->seminer_place }}</td>
        <td>{{ $fd6AdjoiningGLists->seminer_number }}</td>
        <td>{{ $fd6AdjoiningGLists->seminer_perticipantion }}</td>
        <td>{{ $fd6AdjoiningGLists->seminer_budget }}</td>
        <td>{{ $fd6AdjoiningGLists->comment }}</td>
        <td>

            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#adjoiningGModalEdit{{ $fd6AdjoiningGLists->id }}" >
                <i class="fa fa-pencil"></i>
            </button>
            @include('front.fd6Form.partTwo.adjoiningGModalEdit')


            <button type="button" onclick="deleteTagFd6AdjoiningG({{ $fd6AdjoiningGLists->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>

        </td>
    </tr>
    @endforeach
</table>
