@extends('Layouts.App')
@section('content')
    <center>
        <h3>Bus Counter List</h3>
        <hr>

        <div class="container bg card">
        <table width="100%">
            <th>ID</th>
            <th>Oparator</th>
            <th>Manager</th>
            <th>Name</th>
            <th>Location</th>
            <th>Action</th>

            @for($i=0; $i< count($counter); $i++)
            <tr>
                <td>{{$counter[$i]['id']}}</td>
                <td width="15%">{{$counter[$i]['oparetor']}}</td>
                <td>{{$counter[$i]['manager']}}</td>
                <td>{{$counter[$i]['name']}}</td>
                <td>{{$counter[$i]['location']}}</td>

                <td>
                    <!-- <input type="submit" value="Edit" class="btn btn-info" href="/home/editUser/{{$counter[$i]['sid']}}"> -->
                    <a href="/home/editUser/{{$counter[$i]['id']}}">
                        <input type="button" value="Edit" class="btn btn-info">
                    </a>
                    
                        <a href="/home/delete/{{$counter[$i]['id']}}">
                            <input type="button" value="Delete" class="btn btn-danger">
                        </a>
                </td>
            </tr>
            @endfor
        </table>
        {{$counter->links()}}
    </div>
    </center>
@endsection