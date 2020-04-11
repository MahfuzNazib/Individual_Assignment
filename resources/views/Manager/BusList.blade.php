@extends('Layouts.ManagerApp')
@section('content')
    <center>
        <h3>Bus Lists</h3>
        <hr>
    </center>

    <div class="container bg card">
        <table class="table">
            <tr>
                <th>Bus ID</th>
                <th>Bus Name</th>
                <th>Oparetor</th>
                <th>Location</th>
                <th>Seats</th>
                <th>Action</th>
            </tr>
        
            @foreach($busList as $bus)
                <tr>
                    <td>{{$bus['id']}}</td>
                    <td>{{$bus['name']}}</td>
                    <td>{{$bus['oparetor']}}</td>
                    <td>{{$bus['location']}}</td>
                    <td>{{$bus['seats']}}</td>
                    <td>
                        <a href="#">
                            <input type="submit" class="btn btn-primary" value="Edit">
                        </a>

                        <a href="#">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </a>
                    </td>
                </tr>
                
            @endforeach
        </table>
    </div>
@endsection
