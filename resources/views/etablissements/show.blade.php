@extends('partition.nav')

@section('content')

        <h2> Show etablissements</h2>
        <div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('etablissements.index') }}"> Back</a>
        </div>
    </div>
</div>
   
<div class=" col-md-8 bg-light shadow-lg p-3 m-5  rounded">
<div>
        <p>ID: {{ $etablissement->id}}</p>
        <p>Etablissement: {{ $etablissement->nomEtab}}</p>
        <p>Email: {{ $etablissement->emailEtab}}</p>
        <p>Type de l'établissement: {{ $etablissement->typeEtab }}</p>
        <p>Status de l'établissement : {{ $etablissement->statusEtab}}</p>
        <p>Adresse de l'établissement: {{ $etablissement->adresseEtab  }}</p>
        <p>Date de Creation: {{ $etablissement->dateCreation}}</p>
        <p>Code de l'IA: {{ $etablissement->codeIA}}</p>
        <p>Matricule de l'établissement: {{ $etablissement->matriculeEtab}}</p>
    </div>
    
    <!-- <div>
        <p>ID: {{ $etablissement->id}}</p>
        <p>Nom: {{ $etablissement->nom}}</p>
        <p>Prenom: {{ $etablissement->prenom}}</p>
        <p>Email: {{ $etablissement->email }}</p>
        <p>Adresse: {{ $etablissement->adresse}}</p>
        <p>Telephone: {{ $etablissement->num_tel}}</p>
        <p>Matricule: {{ $etablissement->matricule}}</p>
    </div> -->


</div>

@endsection