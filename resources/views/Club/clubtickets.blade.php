@extends('layout.admin')

@section('content')

    <b style="color:#0D47A1;font-size: large;margin-right:40%;">لیست تیکت های باشگاه</b>

<table id="example" class="display"  >
    <thead >
    <tr >
        <th>عکس</th>
        <th>کد</th>
        <th> عنوان تور</th>
        <th>تاریخ شروع</th>
        <th>تاریخ پایان</th>
        <th>تاریخ ایجاد</th>
        <th>تاریخ بروزرسانی</th>
        <th>آدرس</th>
        <th>وضعیت</th>
    </tr>
    </thead>
    <tbody >

    @for($i=0 ; $i<count($tickets); $i++)

    <tr >
        <td><a ><img height="50" width="50" src="{{$tickets[$i]['avatar_id'] ? config('constant.ticket_avatar').$tickets[$i]['avatar_path'] :config('constant.ticket_avatar').config('constant.noImageTicket')}}"  > </a></td>
        <td>{{$tickets[$i]['id']}}</td>
        <td>{{$tickets[$i]['name']}}</td>
        <td>{{$tickets[$i]['date']}}</td>
        <td>{{$tickets[$i]['endDate']}}</td>
        <td>{{$tickets[$i]['created_at']}}</td>
        <td>{{$tickets[$i]['updated_at']}}</td>
        <td>{{$tickets[$i]['address']}}</td>
        <td>{{$tickets[$i]['state']}}</td>
    </tr>
    @endfor

    </tbody>

</table>


@endsection