@extends('partition.nav')


@section('content')


<div class="d-flex justify-content-between align-items-center">
    <h1>liste des apprenants</h1>
    <a class="btn btn-primary  " style="width: 6rem"  href="{{ route('apprenants.create') }}">  
        <i class="fa fa-plus" aria-hidden="true"></i>
    </a>
</div>

<!-- @if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{ $message }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif -->
@include('message.succes')

<table class="table table-striped table-hover bg-light shadow-lg p-3 mb-3  rounded">
    <thead>
        <tr>

            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Genre</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Matricule</th>
            <th class="text-end " width="290px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($apprenants as $apprenant)
    <tr>
       
        <td>{{ $apprenant->id }}</td>
        <td>{{ $apprenant->nom }}</td>
        <td>{{ $apprenant->prenom }}</td>
        <td>{{ $apprenant->genre }}</td>
        <td>{{ $apprenant->adresse }}</td>
        <td>{{ $apprenant->email }}</td>
        <td>{{ $apprenant->num_tel }}</td>
        <td>{{ $apprenant->matricule }}</td>
        <td >
            
        <form action="{{ route('apprenants.destroy',$apprenant->id) }}" method="POST" >
                <a class="btn btn-info" href="{{route('apprenants.show',$apprenant->id) }}" >
                    <i class="fa fa-eye"></i>
                </a>

                <a class="btn btn-warning" href="{{ route('apprenants.edit',$apprenant->id) }}" >
                    <i class="fa fa-edit"></i>
                </a>
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">
                    <i class="fa fa-trash"  ></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<!-- les pages -->
{!! $apprenants->links() !!}
@endsection