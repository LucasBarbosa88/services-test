<a href="#deletePersonModal{{$person->id}}" data-toggle="modal" class="btn btn-warning">Delete</a>
<a class="btn btn-info" id="editButton" data-toggle="modal" href="#editPersonModal{{$person->id}}">Edit</a>
<a class="btn btn-info" id="showButton" data-toggle="modal" href="#showPersonModal{{$person->id}}">Show</a>

@extends('people/partials/edit')
@extends('people/partials/delete_person')
@extends('people/partials/show')