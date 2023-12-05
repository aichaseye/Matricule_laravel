@extends('partition.nav')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb text-center">
        <div class="pull-left">
            <h2>Ajouter un nouveau produit</h2>
        </div>

    </div>
</div>

@include('message.succes')
@include('message.error')
<form action="{{ route('etablissements.store') }}" method="POST">
    @csrf
    <!-- debut -->
    <div class="container bg-light shadow-lg p-3 m-3  rounded">
        <div class="row gx-5">

            <div class="col-md-6 ">
                <input type="text" name="nomEtab" class="form-control" placeholder="Nom etabmissement" >
            </div>
            <div class="col-md-6">
                <input type="email" name="emailEtab" class="form-control" placeholder="Email " aria-label="Last name">
            </div>
           
            <div class="col-md-6 mt-4">
                <input type="text" name="typeEtab" class="form-control" placeholder="Type" aria-label="Adresse">
            </div>
            <div class="col-md-6 mt-4">
                <input type="text" name="statusEtab" class="form-control" placeholder="Status" aria-label="Genre">
            </div>
            <div class="col-md-12 mt-4 ">
                <input type="text" name="adresseEtab" class="form-control" placeholder="Adresse" aria-label="Email">
            </div>
            <div class="col-md-6 mt-4 ">
                <input type="text" name="dateCreation" class="form-control" placeholder="Date Creation" aria-label="Telephone">
            </div>
            <div class="col-md-6 mt-4 ">
                <input type="text" name="codeIA" class="form-control" placeholder="Code IA" aria-label="matricule">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 m-3 text-center ">
            <a class="btn btn-primary" href="{{ route('etablissements.index') }}"> Back</a>

            <button type="submit" class="btn btn-success ">Submit</button>
        </div>
    </div>

</form>

@endsection