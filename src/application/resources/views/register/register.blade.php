<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hit 60</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
        <h1>Hit 60 Register Form</h1>
        </div>
        <div class="row">
        <div class="col-md-12 text-center">
        <form>
                <div class="mb-3">
                <label for="name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp">    
                <div class="valid-feedback">
                    Looks good!
                    </div>      
                    <div id="validationName" class="invalid-feedback">
                    
                    </div>      
                </div>
                <div class="mb-3">
                <label for="name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" aria-describedby="nameHelp">    
                <div class="valid-feedback">
                    Looks good!
                    </div>      
                    <div id="validationlastName" class="invalid-feedback">
                    
                    </div>      
                </div>
             
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                <div class="valid-feedback">
                    Looks good!
                    </div>      
                    <div id="validationEmail" class="invalid-feedback">
                    
                    </div>   
                </div>
           
                <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp">   
                <div class="valid-feedback">
                    Looks good!
                    </div>      
                    <div id="validationPhone" class="invalid-feedback">
                    
                    </div>                
                </div>
             
                <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
                <div class="valid-feedback">
                    Looks good!
                    </div>      
                    <div id="validationPassword" class="invalid-feedback">
                    
                    </div>   
                </div>
                <div class="mb-3">
                <label for="confirmpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmpassword">
                <div class="valid-feedback">
                    Looks good!
                    </div>      
                    <div id="validationConfirmPassword" class="invalid-feedback">
                    
                    </div>  
                </div>
                <p id= "submit" class="btn btn-primary">Submit</p>
                </form>
        </div>
    
    </div>
      
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        $(()=>{
         

            // if(check_cookie_name('_user')) {
            //             location.href='http://localhost/';
            //         }
             
        });
        $('#submit').click(()=>{
            if(hasErrors()) {return;}
            const queryString = window.location.search;
           
           const urlParams = new URLSearchParams(queryString);
         
           const late = urlParams.get('la');
            console.log('calling ajax....');
                $.ajax({
                url:'/signup',
                type: 'POST',
                data:{lead_associate:late,"password_confirmation":$('#confirmpassword').val(), "_token": "{{ csrf_token() }}",client_company_name:'Hit 60',first_name:$('#name').val(),last_name:$('#lastname').val(),email:$('#email').val(), phone:$('#phone').val(), password: $('#password').val()},
                datatype: 'json',
                success: function (data) { 
                    console.log('response.....::');
                    console.log(data)
                    location.href='http://localhost/';
                },
                error: function (jqXHR, textStatus, errorThrown) { 
                    console.error(textStatus);
                    alert('Somthing When Wrong plase try again or contact support team');
                }
                });

        });


        function check_cookie_name(name) 
    {
      var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
      if (match) {
        console.log(match[2]);
        return true;
      }
      else{
          return false;
      }
   }
    
        function hasErrors() {
            rgxemail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            let errors = false;

        if ($('#name').val() === '') {
            $('#name').addClass('is-invalid');
            $('#validationName').html('First Name is required.');
            errors = true;
        } else {
            $('#name').removeClass('is-invalid');
            $('#name').addClass('is-valid');
        }
        if ($('#lastname').val() === '') {
            $('#lastname').addClass('is-invalid');
            $('#validationlastName').html('Last Name is required.');
            errors = true;
        } else {
            $('#name').removeClass('is-invalid');
            $('#name').addClass('is-valid');
        }
        if ($('#email').val() === '') {
            errors = true;
            $('#email').addClass('is-invalid');
            $('#validationEmail').html('Email is required.')
                
        }else if (!$('#email').val().match(rgxemail)) {                               
            errors = true;
            $('#email').addClass('is-invalid');
            $('#validationEmail').html('Email is invalid.')
        }else {
            $('#email').removeClass('is-invalid');
            $('#email').addClass('is-valid');
        }

        rgcPhone = /^(1\s?)?((\([0-9]{3}\))|[0-9]{3})[\s\-]?[\0-9]{3}[\s\-]?[0-9]{4}$/g
    
     if ($('#phone').val() === '') {        
        $('#phone').addClass('is-invalid');
        $('#validationPhone').html('Phone is required.');
        errors = true;

      } else if (!$('#phone').val().match(rgcPhone)) {
        errors = true;
        $('#phone').addClass('is-invalid');
        $('#validationPhone').html('Invalid Phone Number.');
      }else if ($('#phone').val()==='000 000 00 00' || $('#phone').val() === '0000000000') {
        errors = true;
        $('#phone').addClass('is-invalid');
        $('#validationPhone').html('Invalid Phone Number.');
        }else {
            $('#phone').removeClass('is-invalid');
            $('#phone').addClass('is-valid');
        }


        if ($('#password').val()==='') {
            errors = true;
            $('#password').addClass('is-invalid');
        $('#validationPassword').html('Password is required.');
        }else {
            $('#password').removeClass('is-invalid');
            $('#password').addClass('is-valid');
        }

        if ($('#confirmpassword').val()==='') {
            errors = true;
            $('#confirmpassword').addClass('is-invalid');
            $('#validationConfirmPassword').html('Confirm Password is required.');
        } else {
            if ($('#password').val() != $('#confirmpassword').val()) {
                errors = true;
                $('#confirmpassword').addClass('is-invalid');
            $('#validationConfirmPassword').html('Confirm Password dosent match password.');
            } else {
                $('#confirmpassword').removeClass('is-invalid');
                    $('#confirmpassword').addClass('is-valid');
            }
        }

        return errors;
        }
    </script>
  </body>
</html>