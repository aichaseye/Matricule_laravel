@extends('partition.nav')


@section('content')


<div class="d-flex justify-content-between align-items-center">
    <h1>liste des etablissements</h1>
    <a class="btn btn-primary  " style="width: 6rem" href="{{ route('etablissements.create') }}">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </a>
</div>

@include('message.succes')

<table class="table table-striped table-hover bg-light shadow-lg p-3 mb-3  rounded">
    <thead>
        <tr>

            <th>Id</th>
            <th>Etabmissement</th>
            <th>Email</th>
            <th>Type </th>
            <th>Status</th>
            <th>Adresse</th>
            <th>Anne Creation</th>
            <th>Code IA</th>
            <th>Matricule</th>
            <th class="text-end " width="290px">Action</th>
        </tr>,
    </thead>
    <tbody>
        @foreach ($etablissements as $etablissement)
        <tr>

        <td>{{ $etablissement->id }}</td>
        <td>{{ $etablissement->nomEtab }}</td>
        <td>{{ $etablissement->emailEtab }}</td>
        <td>{{ $etablissement->typeEtab }}</td>
        <td>{{ $etablissement->statusEtab }}</td>
        <td>{{ $etablissement->adresseEtab }}</td>
        <td>{{ $etablissement->dateCreation }}</td>
        <td>{{ $etablissement->codeIA }}</td>
        <td>{{ $etablissement->matriculeEtab }}</td>
        <td >

                <form action="{{ route('etablissements.destroy',$etablissement->id) }}" method="POST">
                    <a class="btn btn-info" href="{{route('etablissements.show',$etablissement->id) }}">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a class="btn btn-warning" href="{{ route('etablissements.edit',$etablissement->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- les pages -->
{!! $etablissements->links() !!}
@endsection