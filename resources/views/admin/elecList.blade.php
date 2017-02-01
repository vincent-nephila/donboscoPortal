@extends('layouts.appadmin')
@section('content')
<div class="form-group">
    <label for="elective">Elective</label>
    <select class="form-control" name="elective" id="elective" onchange="viewreport()">
        @foreach($elective as $elect)
        <option value="{{$elect->elecode}}">{{$elect->elective}}</option>
        @endforeach
    </select>
</div>
<hr>
<div id="reports">
</div>
<script>
    function viewreport(){
        $.ajax({
            type:"GET",
            url:"/getview/"+$("#elective").val(),
            success:function(data){
                $("#reports").html(data);
            }
        });
    }
</script>
@endsection