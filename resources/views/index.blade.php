@session('success')
    <div class="alert alert-primary" role="alert">
        <strong>{{$value}}</strong>
    </div>
@endsession
@auth
    <form action="{{route("logout")}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger ">deconnexion</button>
    </form>
@endauth