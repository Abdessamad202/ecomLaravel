<x-layout title="Login Page">
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-7 p-0 h-100">
                <img src="{{ asset('imgs/img1.jpeg')}}" class="w-100 h-100">                </div>
        <!-- </div> -->
        <!-- <div class="row"> -->
            <div class="col-5 d-flex flex-column justify-content-center">
                <h2 class="text-center mb-5">Login to Continue</h2>
                <form action="{{route("check")}}" method="post">
                    @csrf
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
                    <div class="d-flex mb-3">
                        <button type="submit" class="btn btn-primary flex-grow-1"><strong>LOGIN</strong></button>
                    </div>
                </form>
                <div class="d-flex mt-5 justify-content-center">

                    <a
                        name=""
                        id=""
                        style="background-color: #42b72a;"
                        class="btn btn-success"
                        href="{{route("signup.index")}}"
                        ><strong>Create a New Account</strong></a
                    >
                </div>
                
            </div>
        </div>
    </div>
</x-layout>