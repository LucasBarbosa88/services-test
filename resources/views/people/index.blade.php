@extends('layouts/app')

@section('content')

<div class="container note-details">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-block card-stretch">
                <div class="card-body custom-notes-space mb-4">
                    <h3 class="">{{$title}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button class="btn btn-info" data-toggle="modal" data-target="#createPersonModal"> New Person</button>
    </div>
    <div class="card card-block card-stretch mt-2">
        <div class="row">
            <div class="col ml-2 mr-2">
                <table class="table table-striped tbl-server-info mt-4 responsive">
                    <thead>
                        <tr class="ligth">
                            <th style="color: black!important">ID</th>
                            <th style="color: black!important">Full Name</th>
                            <th style="color: black!important">CPF</th>
                            <th style="color: black!important">Nickname</th>                            
                            <th style="color: black!important">Created</th>
                            <th style="color: black!important">Updated</th>
                            <th style="color: black!important">Actions</th>
                        </tr>
                    </thead>
                    @foreach($people as $person)
                    <tbody>
                        <tr>
                            <td>{{$person->id}}</td>
                            <td>{{$person->full_name}}</td>
                            <td>{{$person->cpf}}</td>
                            <td>{{$person->nickname}}</td>
                            <td>{{$person->created_at}}</td>
                            <td>{{$person->updated_at}}</td>
                            <td>@include('people/partials/actions_person')</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="ml-3" style="margin-right: 2px;padding-top: 15px;float: right;">
                    {{ $people->appends(request()->all())->render("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createPersonModal" tabindex="-1" role="dialog" aria-labelledby="createPersonModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPersonModalLabel">Create a new Person</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{URL::action('PersonController@store')}}">
                    <div class=" row align-items-center">
                        <div class="form-group col-sm-9">
                            <label for="fname">Full Name:</label>
                            <input type="text" class="form-control" id="fname" name="full_name" value="{{$person->full_name}}">
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="fcpf">CPF:</label>
                            <input type="text" class="form-control cpf" id="fname" name="cpf" value="{{$person->cpf}}">
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="fnickname">Nickname:</label>
                            <input type="text" class="form-control" id="fnickname" name="nickname" value="{{$person->nickname}}">
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="fgender">Gender:</label>
                            <select name="gender" id="">
                                <option value="{{$person->gender}}" selected>{{$person->gender}}</option>
                                <option value="Male">Male</option>
                                <option value="Male">Male</option>
                                <option value="O">Other</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="fphone">Phone:</label>
                            <input type="text" class="form-control phone_with_ddd" id="fphone" name="phone" value="{{$person->phone}}">
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="fcep">CEP:</label>
                            <input type="text" class="form-control cep" id="fcep" name="cep" value="{{$person->cep}}">
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="image">Street:</label>
                            <input type="text" class="form-control" id="fstreet" name="street" value="{{$person->street}}">
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="fsneighborhood">Neighborhood:</label>
                            <input type="text" class="form-control" id="fsneighborhood" name="sneighborhood" value="{{$person->sneighborhood}}">
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="fcity">City:</label>
                            <input type="text" class="form-control" id="fcity" name="city" value="{{$person->city}}">
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="fdescription">Description:</label>
                            <input type="text" class="form-control" id="fdescription" name="description" value="{{$person->description}}">
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{$person->image}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="text/javascript">
        $(document).ready(function(){
        $('.cep').mask('00000-000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        });
    </script>
@endsection