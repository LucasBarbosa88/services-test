<div class="modal fade" id="editPersonModal{{$person->id}}" tabindex="-1" role="dialog" aria-labelledby="editPersonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editPersonModalLabel">Edit Tag ID #{{$person->id}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{URL::action('PersonController@update')}}" enctype="multipart/form-data">
               {{ csrf_field() }}
               <input type="hidden" name="id" value="{{$person->id}}">
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
               <button type="submit" class="btn btn-primary mr-2">Submit</button>
               <a href="{{URL::action('PersonController@index')}}" class="btn iq-bg-danger">Cancel</a>
            </form>
         </div>
      </div>
   </div>
</div>

@section('scripts')
   <script src="text/javascript">
      $(document).ready(function(){
      $('.cep').mask('00000-000');
      $('.phone_with_ddd').mask('(00) 0000-0000');
      $('.cpf').mask('000.000.000-00', {reverse: true});
      });
   </script>
@endsection