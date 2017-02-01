<div>
    <table>
        <tr>
            <td>
                Name: 
            </td>
            <td>
                {{$info->lastname}},{{$info->firstname}} {{$info->middlename}}
            </td>
        </tr>
        <tr>
            <td>
                Student ID: 
            </td>
            <td>
                {{$info->idno}}
            </td>
        </tr>
        <tr>
            <td>
                New Password: 
            </td>
            <td>
                {{$password}}
            </td>
        </tr>
    </table>
    
    Please log in at {{url('/login')}}
</div>