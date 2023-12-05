@extends('partition.nav')

@section('content')

        <h2> Show matieres</h2>
        <div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('matieres.index') }}"> Back</a>
        </div>
    </div>
</div>
   
<div class=" col-md-8 bg-light shadow-lg p-3 m-5  rounded">
<div>
        <p>ID: {{ $matiere->id}}</p>
        <p>Matiere: {{ $matiere->nom}}</p>
        <p>Categorie: {{ $matiere->categorie}}</p>
        <p>Code IA : {{ $matiere->codeIA }}</p>
        <p>Structure Cible  : {{ $matiere->structureCible}}</p>
        <p>Matricule : {{ $matiere->matricule  }}</p>
        <p>Image : {{ $matiere->image}}</p>
       
    </div>
    
</div>

@endsection