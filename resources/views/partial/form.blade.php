@inject("countries","App\Http\Utilities\Country")

<div class="row">
  @if (count($errors) > 0)
    <div class='alert alert-danger col-md-6 col-md-offset-3'>
      <ul>
        @foreach ($errors->all()  as $error)
          <li> {{ $error }} </li>
        @endforeach
      </ul>
    </div>
  @endif
  <form  action="/flyers" method="post" id="form-create">
      {{csrf_field()}}
      <div class="col-md-6">
        <div class="form-group">
          <label for="street">Street:</label>
          <input type="text" name="street" id="street" class="form-control" value="{{ old('street') }}" required>
        </div>
        <div class="form-group">
          <label for="city">City:</label>
          <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
        </div>
        <div class="form-group">
          <label for="state">State:</label>
          <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}" required>
        </div>
        <div class="form-group">
          <label for="zip">Zip/Postal code:</label>
          <input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip') }}" required>
        </div>
        <div class="form-group">
          <label for="country">Country</label>
          <select class="form-control" name="country" id="country">
            @foreach ($countries->getCountry() as $country => $code)
              <option value="{{$code}}">{{$country}}</option>
            @endforeach
          </select>
        </div>
      </div> <!-- End col-md-6 -->
      <div class="col-md-6">
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea name="description" class="form-control" id="description">{{old('description')}}</textarea>
        </div>
      </div>
      <div class="col-md-12">
        <hr>
        <button type="submit"class="btn btn-warning">Create</button>
      </div>
  </form>
</div>
