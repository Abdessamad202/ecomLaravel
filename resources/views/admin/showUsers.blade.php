<x-layout title="Show Users">
    @include("partial.nav")
    <div class="container my-5 ">
        {{-- <div class="row gy-3"> --}}
            <table class="table text-center mt-3">
                <tr class='table-dark'>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>created At</th>
                    <th>Updated At</th>
                </tr>
            @foreach ($users as $user )
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->Fname}}</td>
                    <td>{{$user->Lname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
            @endforeach
            </table>
        {{-- </div> --}}
    </div>
</x-layout>