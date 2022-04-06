<div class="modal fade" id="showPersonModal{{$person->id}}" tabindex="-1" role="dialog" aria-labelledby="showPersonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="showPersonModalLabel">Show Tag ID #{{$person->id}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="#">
               {{ csrf_field() }}
               <input type="hidden" name="id" value="{{$person->id}}" disabled>
               <div class=" row align-items-center">
                  <div class="form-group col-sm-9">
                     <label for="fname">Full Name:</label>
                     <input type="text" class="form-control" id="fname" name="full_name" value="{{$person->full_name}}" disabled>
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="fcpf">CPF:</label>
                     <input type="text" class="form-control cpf" id="fname" name="cpf" value="{{$person->cpf}}" disabled>
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="fnickname">Nickname:</label>
                     <input type="text" class="form-control" id="fnickname" name="nickname" value="{{$person->nickname}}" disabled>
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="fgender">Gender:</label>
                     <select name="gender" id="">
                        <option value="{{$person->gender}}" selected>{{$person->gender}}</option>
                     </select>
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="fphone">Phone:</label>
                     <input type="text" class="form-control phone" id="fphone" name="phone" value="{{$person->phone}}" disabled>
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="fcep">CEP:</label>
                     <input type="text" class="form-control cep" id="fcep" name="cep" value="{{$person->cep}}" disabled>
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="image">Street:</label>
                     <input type="text" class="form-control" id="fstreet" name="street" value="{{$person->street}}" disabled>
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="fsneighborhood">Neighborhood:</label>
                     <input type="text" class="form-control" id="fsneighborhood" name="sneighborhood" value="{{$person->sneighborhood}}" disabled>
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="fcity">City:</label>
                     <input type="text" class="form-control" id="fcity" name="city" value="{{$person->city}}" disabled>
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="fdescription">Description:</label>
                     <input type="text" class="form-control" id="fdescription" name="description" value="{{$person->description}}" disabled>
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="image">Image:</label>
                     <img src="{{ url('public/images/'.$person->image) }}" alt="" title="" />
                  </div>
               </div>
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