@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Hashes</div>

                    <div class="panel-body">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>
                                </th>
                                <th>
                                    word
                                </th>
                                <th>
                                    hash
                                </th>
                                <th>
                                    algorithm
                                </th>
                            </tr>
                            </thead>
                            <tbody class = "table_body">
                            @foreach($hashes as $hash)
                                <tr>
                                    <td>
                                        <i class="glyphicon glyphicon-remove-circle" style="color:#86c9fd"></i>
                                    </td>
                                    <td>
                                        {!! $hash->word !!}
                                    </td>
                                    <td>
                                        {!! $hash->hash !!}
                                    </td>
                                    <td>
                                        {!! $hash->algorithm !!}
                                    </td>
                                    <td class = "hidden hidden_id">
                                        {!! $hash->id !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function(){
        var id;
        var mod;
        var row;

            $('.table_body').on('click', 'i', function (event) {
                mod = $("#myModal").modal('show');
                row = $(this).closest('tr');
                id = $.trim(row.find('.hidden_id').text());
            });

            $('#myModal').on('click', '.confirm', function (event) {
                mod.modal('hide');
                $.ajax({
                    type: "DELETE",
                    url: '/hash' + '/' + id,
                    success: function(response){ // What to do if we succeed
                        console.log(response);
                        row.remove();
                    },
                    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
            });
        });
    </script>

    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <div style = "text-align: center" class="modal-body" style="padding:40px 50px;">
                        <h3>
                            Delete hash?
                        </h3>
                        <button class="btn btn-default confirm">
                            ok
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection