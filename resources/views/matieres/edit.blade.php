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
<form action="{{ route('matieres.update',$matiere->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- debut -->
    <div class="container bg-light shadow-lg p-3 m-3  rounded">
        <div class="row gx-5">

            <div class="col-md-6 ">
                <input type="text" name="nom" class="form-control" placeholder="Nom Matiere" value="{{ $matiere->nom }}" >
            </div>
            <div class="col-md-6">
                <input type="text" name="categorie" class="form-control" placeholder="Categorie " value="{{ $matiere->categorie }}" aria-label="Last name">
            </div>
           
            <div class="col-md-6 mt-4">
                <input type="text" name="codeIA" class="form-control" placeholder="Code IA" value="{{ $matiere->codeIA }}" aria-label="codeIA">
            </div>
            <div class="col-md-6 mt-4">
                <input type="text" name="structureCible" class="form-control" placeholder="Structure Cible" value="{{ $matiere->structureCible }}" aria-label="structureCible">
            </div>
            <!-- <div class="col-md-6 mt-4 ">
                <input type="text" name="image" class="form-control" placeholder="Image" aria-label="image">
            </div> -->
            <!-- <div class="col-md-12 mt-4 ">
                <input type="text" name="matricule" class="form-control" placeholder="Adresse" aria-label="Email">
            </div> -->
            
            <!-- <div class="col-md-6 mt-4 ">
                <input type="text" name="codeIA" class="form-control" placeholder="Code IA" aria-label="matricule">
            </div> -->
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 m-3 text-center ">
            <a class="btn btn-primary" href="{{ route('matieres.index') }}"> Back</a>

            <button type="submit" class="btn btn-success ">Submit</button>
        </div>
    </div>

</form>
</div>
</div>

@endsection