@extends('partition.nav')


@section('content')


<div class="d-flex justify-content-between align-items-center">
    <h1>liste des matieres</h1>
    <a class="btn btn-primary  " style="width: 6rem" href="{{ route('matieres.create') }}">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </a>
</div>

@include('message.succes')

<table class="table table-striped table-hover bg-light shadow-lg p-3 mb-3  rounded">
    <thead>
        <tr>

            <th>Nom</th>
            <th>Categorie</th>
            <th>CodeIA </th>
            <th>StructureCible</th>
            <th> Image</th>
            <th>Matricule</th>
            <th class="text-end " width="290px">Action</th>
        </tr>,
    </thead>
    <tbody>
        @foreach ($matieres as $matiere)
        <tr>

            <td>{{ $matiere->nom }}</td>
            <td>{{ $matiere->categorie }}</td>
            <td>{{ $matiere->codeIA }}</td>
            <td>{{ $matiere->structureCible }}</td>
            <td>{{ $matiere->image }}</td>
            <td>{{ $matiere->matricule }}</td>
            
            
            <td>

                <form action="{{ route('matieres.destroy',$matiere->id) }}" method="POST">
                    <a class="btn btn-info" href="{{route('matieres.show',$matiere->id) }}">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a class="btn btn-warning" href="{{ route('matieres.edit',$matiere->id) }}">
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
{!! $matieres->links() !!}
@endsection