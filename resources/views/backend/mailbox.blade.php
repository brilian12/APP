<x-component.backend.layouts>
    <div class="container-fluid">
        <h3 class="text-dark mb-1"></h3>
            <div class="col-md-8 offset-md-2">
                <form action="/backend/addcust" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <a class="text-decoration-none" href="{{ url('/backend/dashboard') }}">
                        <i class="fas fa-arrow-left fs-4 d-lg-flex justify-content-lg-start"></i>
                    </a>
                    <div class="row form-group">
                    <div class="col-sm-4 text-start label-column"><label>Name</label></div>
                    <div class="col-sm-6 input-column">
                        <select name="id_pack" class="form-control" id="cars">
                            @foreach ($customers as $add)
                                <option value={{ $add->id }}> {{ $add->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-sm-4 text-start label-column"><label>Email</label></div>
                    <div class="col-sm-6 input-column">
                        <select name="id_pack" class="form-control" id="cars">
                            @foreach ($customers as $add)
                                <option value={{ $add->id }}> {{ $add->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
            </div>
    </div>
    {{-- @endsection --}}
</x-component.backend.layouts>
