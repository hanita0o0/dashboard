@extends('layout.admin')

@section('content')

<div class="container " style="width:50%;">
    <b style="color:#0D47A1;font-size: large;margin-right:30%;">لیست مشترکین باشگاه</b><hr>
    <table id="example" class="display"  >
        <thead>
        <tr >
            <th>کدمشترک</th>
            <th> نام کاربری مشترک</th>
        </tr>
        </thead>
        <tbody >

        @foreach($subscribe as $sub)

            <tr >

                <td>{{$sub->user_id}}</td>
                <td>{{$sub->name}}</td>

            </tr>
        @endforeach

        </tbody>

    </table>
</div>

@endsection