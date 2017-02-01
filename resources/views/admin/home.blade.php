@extends('layouts.appadmin')
@section('content')

<table class="tbl table-striped" width="100%">
    <tr>
        <td>Idno</td><td>Name</td><td>Status</td>
    </tr>
    @foreach($students as $student)
    <tr>
        <td>{{$student->idnum}}</td><td>{{$student->lastname}}, {{$student->firstname}} {{$student->middlename}}</td><td>{{$student->stat==1 ? 'Active' :'Inactive'}}</td>
    </tr>
    @endforeach
</table>

@endsection