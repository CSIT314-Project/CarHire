@extends('main')

@section('Title','Register')
  
@section('register')
    <!--Display logo image-->
    <div class="col-xs-1" align="center">
      <img src="{{ asset('images\logo.png') }}"/>
      <h1><strong>Register</strong></h1>
    </div> 
    
   <div class="row">
      <div class="col-md-4"></div>
      <div class="col-*-*">   
      <form class="needs-validation" novalidate>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationFirstName">First name</label>
              <input type="text" class="form-control" id="validationFirstName" placeholder="First name" value="Leeroy" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationLastName">Last name</label>
              <input type="text" class="form-control" id="validationLastName" placeholder="Last name" value="Jenkins" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationUsername">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
                <input type="text" class="form-control" id="validationUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationCity">City</label>
              <input type="text" class="form-control" id="validationCity" placeholder="City" required>
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationState">State</label>
              <input type="text" class="form-control" id="validationState" placeholder="State" required>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationZip">Zip</label>
              <input type="text" class="form-control" id="validationZip" placeholder="Zip" required>
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
              <label class="form-check-label" for="invalidCheck">
                I the above information provided is correct and agree to terms and conditions of the website. 
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
      </div>
      <div class="col-md-4""></div>
    </div>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
 
@endsection

