@extends('partition.nav')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb text-center">
        <div class="pull-left">
            <h2>Modification</h2>
        </div>

    </div>
</div>

                @include('message.succes')
                @include('message.error')
            <form action="{{ route('etablissements.update',$etablissement->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- debut -->
                <div class="container bg-light shadow-lg p-3 m-3  rounded">
        <div class="row gx-5">
            <div class="col-md-12 mt-4 ">
                <input type="text" name="matricule" class="form-control" placeholder="Matricule" aria-label="matricule" value="{{ $etablissement->matricule }}" readonly>
            </div>
            <div class="col-md-6 ">
                <input type="text" name="nomEtab" class="form-control" placeholder="Nom etabmissement" value="{{ $etablissement->nomEtab }}" >
            </div>
            <div class="col-md-6">
                <input type="email" name="emailEtab" class="form-control" placeholder="Email "  value="{{ $etablissement->emailEtab }}">
            </div>
           
            <div class="col-md-6 mt-4">
                <input type="text" name="typeEtab" class="form-control" placeholder="Type"  value="{{ $etablissement->typeEtab }}" >
            </div>
            <div class="col-md-6 mt-4">
                <input type="text" name="statusEtab" class="form-control" placeholder="Status"  value="{{ $etablissement->statusEtab }}" >
            </div>
            <div class="col-md-12 mt-4 ">
                <input type="text" name="adresseEtab" class="form-control" placeholder="Adresse" aria-label="adresse" value="{{ $etablissement->adresseEtab }}">
            </div>
            <div class="col-md-6 mt-4 ">
                <input type="text" name="dateCreation" class="form-control" placeholder="Date Creation" aria-label="dateCreation" value="{{ $etablissement->dateCreation }}">
            </div>
            <div class="col-md-6 mt-4 ">
                <input type="text" name="codeIA" class="form-control" placeholder="Code IA" aria-label="codeIA" value="{{ $etablissement->codeIA }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 m-3 text-center ">
            <a class="btn btn-primary" href="{{ route('etablissements.index') }}"> Back</a>

            <button type="submit" class="btn btn-success ">Submit</button>
        </div>
    </div>
            </form>
        </div>
    </div>

@endsection