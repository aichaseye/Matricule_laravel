@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </ul>
</div>
@endif