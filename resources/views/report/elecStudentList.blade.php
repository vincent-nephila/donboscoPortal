<div class="container">
    <div class="col-md-10 col-md-offset-1">
        @if(count($students) > 0)
        
        <table class="tbl table-striped" width="100%">
            <tr>
                <th>Name</th>
                <th>Elective</th>
            </tr>
            @foreach($students as $student)
            <?php $info=  \dbtiPortal\User::where('idno',$student->idno)->first();?>
            <tr>
                <td>
                    {{$info->lastname}}, {{$info->firstname}} {{substr($info->lastname,0,0)}}
                </td>
                <td>
                    {{$student->elective}}
                </td>
            </tr>
            @endforeach
        </table>
        
        @else
        <div class="panel panel-default">
            <div class="panel-body">
                No record has been found
            </div>
        </div>
        @endif
    </div>
</div>