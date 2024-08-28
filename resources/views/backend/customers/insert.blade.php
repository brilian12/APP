<x-component.backend.layouts>
    <div class="container-fluid">
        <h3 class="text-dark mb-1"></h3>
        <div class="row register-form">
            <div class="col-md-8 offset-md-2">
                <form action="/backend/addcust" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <a class="text-decoration-none" href="{{ url('/backend/dashboard') }}">
                        <i class="fas fa-arrow-left fs-4 d-lg-flex justify-content-lg-start"></i>
                    </a>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </div>
    {{-- @endsection --}}
</x-component.backend.layouts>
