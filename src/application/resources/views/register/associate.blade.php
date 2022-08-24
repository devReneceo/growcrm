<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hit 60</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        .modal-content {
     background-color: rgba(0,0,0,.0001) !important;
     border: 0px !important;
}
    </style>
  </head>
  <body>

  <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
   
      <div class="modal-body text-center">
      <div class="fa-5x">
    
    <i class="fas fa-spinner fa-pulse" style="color:#fff;"></i>
    
  </div>
      </div>
      
    </div>
  </div>
</div>
    <div class="container"> 
    @if(!$isLogedIn)
    <div class="row">
        <div class="col-md-12 text-center">
        <h1>Hit 60 Associate Register Form </h1>
     
        </div>



        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" 
        data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
        Don't have an account?</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" 
        role="tab" aria-controls="pills-profile" aria-selected="false">Already have an account?</button>
        </li>
       
        </ul>


<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
      <h1>Register</h1>
      <div id="msg_errors"></div>
  <form>
                <div class="col-mb-3">
                <label for="name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp">    
                <div class="valid-feedback">
                    Looks good!
                    </div>      
                    <div id="validationName" class="invalid-feedback">
                    
                    </div>      
                </div>
                <div class="col-mb-3">
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
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
<h1>Login</h1>
   <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="lemail" aria-describedby="emailHelp">
                <div class="valid-feedback">
                    Looks good!
                    </div>      
                    <div id="lvalidationEmail" class="invalid-feedback">
                    
                    </div>   
                </div>
                <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="lpassword">
                <div class="valid-feedback">
                    Looks good!
                    </div>      
                    <div id="lvalidationPassword" class="invalid-feedback">
                    
                    </div>   
                </div>
                <p id= "submitLogin" class="btn btn-primary">Submit</p>
            </form>
  </div>

</div>
@endif
      
@if($isLogedIn)    
<br>
<h1>asdsd: {{auth()->user()->associate }}</h1>
    @if(auth()->user()->associate == '')    
    <div>
    <h1>  Hi: {{auth()->user()->first_name}} {{auth()->user()->last_name}} </h1>
        <h3> Become an associate with $9 Dll per month</h3>
        <p class="btn btn-primary" id='joinassociate'> Join </p>
    </div>
@endif

    @if(auth()->user()->associate == 1)    
    <div>
    <h1>  Hi: {{auth()->user()->first_name}} {{auth()->user()->last_name}}  You already are associate with us </h1>        
        <a class="btn btn-primary" href="/leads"> Got to my leads </a>
    </div>
    @endif






<script>
$(document).on('click','#joinassociate', ()=> {

$.ajax({
    url:'/createAssociateStripesession',
    method: 'GET',
    dataType: 'json',
    data:{userId:'{{auth()->user()->id}}', 
    userName:'{{auth()->user()->first_name}} {{auth()->user()->last_name}}',
    userEmail:'{{auth()->user()->email}}'},
    success: function (response) {
        console.log(response);
        const stripe = Stripe(response.publickey);                            
        stripe.redirectToCheckout({
        sessionId: response.id
        });
    },
    error: function (error) {
        console.error(error);
    }
});


});
</script>

@endif

</div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"> </script>
   
   <script>
 
        $('#submit').click(()=>{
            var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'))
            myModal.show();
            if(hasErrors()) {
                setTimeout(function(){
                
                 myModal.hide();
               },1000);
                return;}       

                $.ajax({
                url:'/signup',
                type: 'POST',
                data:{"password_confirmation":$('#confirmpassword').val(), "_token": "{{ csrf_token() }}",client_company_name:'Hit 60',first_name:$('#name').val(),last_name:'Doe',email:$('#email').val(), phone:$('#phone').val(), password: $('#password').val()},
                datatype: 'json',
                success: function (data) { 
                 myModal.hide();
                    console.log('response.....::');
                    console.log(data)
                    location.href='https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/associate_subscription';
                },
                error: function (error) { 
                 
                 myModal.hide();
                    console.error(error.responseText);
                    error = JSON.parse(error.responseText);                    
                    console.log(error)
                    if (error.notification) {

                        $('#msg_errors').html(`<div class="alert alert-danger">${error.notification.value} </div>`).focus();
                    }else {
                        alert('Somthing When Wrong plase try again or contact support team');
                     
                    }
                }
                });

        });


$('#submitLogin').click(()=>{
    console.log('ok')
    if(LoginhasErrors()) {return;}
    
    $.ajax({
                url:'/login?action=initial',
                type: 'POST',
                data:{email:$('#lemail').val(), password:$('#lpassword').val(),remember_me: 'on'},
                datatype: 'json',
                success: function (data) { 
                    console.log('response.....::');
                    console.log(data)
                    //newLeadAssociate
                   /location.href='https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/associate_subscription';
                },
                error: function (jqXHR, textStatus, errorThrown) {  
                    console.log(textStatus);
                    console.log(jqXHR.responseJSON.notification.value);
                    if ( jqXHR.responseJSON.notification.value =='Invalid login details') {
                        alert('Invalid login details');
                    }else {
                        alert('Somthing When Wrong plase try again or contact support team');

                    }
                  
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
    function LoginhasErrors() {
        rgxemail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            let errors = false;
            if ($('#lemail').val() === '') {
            errors = true;
            $('#lemail').addClass('is-invalid');
            $('#lvalidationEmail').html('Email is required.')
                
        }else if (!$('#lemail').val().match(rgxemail)) {                               
            errors = true;
            $('#lemail').addClass('is-invalid');
            $('#lvalidationEmail').html('Email is invalid.')
        }else {
            $('#lemail').removeClass('is-invalid');
            $('#lemail').addClass('is-valid');
        }

        if ($('#lpassword').val()==='') {
            errors = true;
            $('#lpassword').addClass('is-invalid');
        $('#lvalidationPassword').html('Password is required.');
        }else {
            $('#lpassword').removeClass('is-invalid');
            $('#lpassword').addClass('is-valid');
        }
        return errors;
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
            $('#lastname').removeClass('is-invalid');
            $('#lastname').addClass('is-valid');
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