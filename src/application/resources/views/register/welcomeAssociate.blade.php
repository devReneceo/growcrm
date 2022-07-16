@extends('layout.wrapper') @section('content')
<!-- main content -->
<div class="container-fluid">

  <div class="row">
      <div class="col-md-12">
          @if($status == 'success')
            <div class="alert alert-sucess">
                <h1>congratulations you now are part of hit association</h1>
                <h3> <a href="/leads" class="btn btn-primary">Leads Dashboard</a></h3>

            </div>
            @endif
            @if($status == 'error')
            <div class="alert alert-danger">
                <h1>Somnthing when wrong plase try again or contact support.</h1>
                    <a href="/becomeAssociate"> Become Lead Associate   </a>

            </div>
            @endif
      </div>
</div>
  
</div>
<!--main content -->
@endsection