<x-layout title="Sign Up Page">
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-7 p-0 h-100">
                <img src="{{ asset('imgs/img1.jpeg')}}" class="w-100 h-100" alt="">
            </div>
        <!-- </div> -->
        <!-- <div class="row"> -->
            <div class="col-5 d-flex flex-column justify-content-center">
                <h2 class="text-center  mb-3">Create An Account To Start</h2>
                <form action="{{route("signup.store")}}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="Fname" class="form-control " id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">First Name</label>
                    </div>
                    @error("Fname")
                    <p class="text-danger">{{$message}}</p>
                        
                    @enderror()
                        
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="Lname" class="form-control " id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    @error("Lname")
                    <p class="text-danger">{{$message}}</p>
                        
                    @enderror()
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control " id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                        @error("email")
                        <p class="text-danger">{{$message}}</p>
                            
                        @enderror()
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        @error("password")
                        <p class="text-danger">{{$message}}</p>
                            
                        @enderror()
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password Confirmation</label>
                    </div>
                    <div class="d-flex mb-3">
                        <button type="submit" style="background-color: #42b72a;" class="btn btn-success flex-grow-1"><strong>SING-UP</strong></button>
                    </div>
                </form>
                <div class="d-flex mt-2 justify-content-center">
                    <a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="{{route("login")}}"
                        ><strong>Login To Your Account If You Have One</strong></a
                    >
                </div>
                
            </div>
        </div>
    </div>
</x-layout>