@extends('Layouts.App')
@section('content')
    <center>
        <h3>Bus Counter List</h3>
        <hr>

        <input id="token" name="_token" type="hidden" value="{{csrf_token()}}">

        <?php $lists = DB::table('bus_counters')->get(); ?>
        <div class="container">
            <center>
                <input type="text" class="form-control" placeholder="Searche Here..." onkeyup="search()" id="search">
            </center>
        </div>

        <br><br>

        <table class="table " id="genaraldata">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Operator</th>
                    <th>Manager</th>
                    <th>Name</th>
                    <th>Location</th>
                </tr>
            </thead>

            <tbody id="">
                @foreach($lists as $list)
                    <tr>
                        <td>{{ $list->id }}</td>
                        <td>{{ $list->oparetor }}</td>
                        <td>{{ $list->manager }}</td>
                        <td>{{ $list->name }}</td>
                        <td>{{ $list->location }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <table class="table " style="display: none" id="ajaxdata">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Operator</th>
                    <th>Manager</th>
                    <th>Name</th>
                    <th>Location</th>
                </tr>
            </thead>

            <tbody id="">
                    <tr>
                        
                    </tr>
            </tbody>
        </table>


        <!-- AJAX Code -->

        <script type="text/javascript">
            function search(){
                var search = $('#search').val();

                if(search){
                    $("#genaraldata").hide();
                    $("#ajaxdata").show();
                }
                else{
                    $("#genaraldata").show();
                    $("#ajaxdata").hide();
                }
                // console.log(search);
                $.ajax({
                    type: "POST",
                    url: '{{URL::to("/home/search")}}',
                    data : {
                        search : search,
                        _token : $('#token').val()
                    },
                    datatype : 'html',
                    success : function(response){
                        console.log(response);
                        $("#success").html(response);
                    }
                });
            }
        </script>
        
@endsection