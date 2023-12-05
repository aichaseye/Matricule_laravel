@extends('partition.nav')

@section('content')

        <h2> Show Apprenants</h2>
        <div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('apprenants.index') }}"> Back</a>
        </div>
    </div>
</div>
   
<div class=" col-md-8 bg-light shadow-lg p-3 m-5  rounded">
    
    <div>
        <p>ID: {{ $apprenant->id}}</p>
        <p>Nom: {{ $apprenant->nom}}</p>
        <p>Prenom: {{ $apprenant->prenom}}</p>
        <p>Email: {{ $apprenant->email }}</p>
        <p>Adresse: {{ $apprenant->adresse}}</p>
        <p>Telephone: {{ $apprenant->num_tel}}</p>
        <p>Matricule: {{ $apprenant->matricule}}</p>
    </div>


</div>

@endsection