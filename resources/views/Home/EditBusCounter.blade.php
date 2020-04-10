@extends('Layouts.App')
@section('content')
    <center>
        <h2>Edit Bus Counter Information</h2>
        <hr>
    </center>

    <div class="container bg card">
        <table>

            <tr>
                <td>ID</td>
                <td>
                    <input type="text" readonly class="form-control" name="id" value="{{ $busCounter['id'] }}">
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" class="form-control" name="name" value="{{$busCounter['name']}}">
                </td>
            </tr>

            <tr>
                <td>Oparetor</td>
                <td>
                    <input type="text" class="form-control" name="oparetor" value="{{ $busCounter['oparetor'] }}">
                </td>
            </tr>

            <tr>
                <td>Manager</td>
                <td>
                    <input type="text" class="form-control" name="manager" value="{{ $busCounter['manager'] }}">
                </td>
            </tr>

            <tr>
                <td>Location</td>
                <td>
                    <input type="text" class="form-control" name="location" value="{{ $busCounter['location'] }}">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <center>
                        <a href="{{ route('home.addbuscounter') }}">
                            <input type="submit" class="btn btn-success" value="Update">
                        </a>
                    </center>
                </td>
            </tr>
        </table>
    </div>
@endsection