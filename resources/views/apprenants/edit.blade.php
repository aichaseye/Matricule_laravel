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
            <form action="{{ route('apprenants.update',$apprenant->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- debut -->
    <div class="container bg-light shadow-lg p-3 m-3  rounded">
        <div class="row gx-5">
        <div class="col-md-12 mt-4 ">
                <input type="text" name="matricule" class="form-control" placeholder="Matricule" aria-label="matricule" value="{{ $apprenant->matricule }}" readonly>
            </div>
            <div class="col-md-6 mt-4">
                <input type="text" name="nom" class="form-control" placeholder="Nom" aria-label="First name" value="{{ $apprenant->nom }}" >
            </div>
            <div class="col-md-6 mt-4">
                <input type="text" name="prenom" class="form-control" placeholder="Prenom" aria-label="Last name" value="{{ $apprenant->prenom }}" >
            </div>

            <div class="col-md-12 mt-4">
                <input type="text" name="adresse" class="form-control" placeholder="Adresse" aria-label="Adresse" value="{{ $apprenant->adresse }}" >
            </div>
            <div class="col-md-6 mt-4">
                <input type="text" name="genre" class="form-control" placeholder="Genre" aria-label="Genre" value="{{ $apprenant->genre }}">
            </div>
            <div class="col-md-6 mt-4 ">
                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ $apprenant->email }}">
            </div>
            <div class="col-md-12 mt-4 ">
                <input type="text" name="num_tel" class="form-control" placeholder="Telephone" aria-label="Telephone" value="{{ $apprenant->num_tel }}">
            </div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 m-3 text-center ">
            <a class="btn btn-primary" href="{{ route('apprenants.index') }}"> Back</a>

            <button type="submit" class="btn btn-success ">Submit</button>
        </div>
    </div>

            </form>
        </div>
    </div>

@endsection