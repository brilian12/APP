<x-component.backend.layouts>
    <form action="/backend/addtrans" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row form-group">
            <div class="col-sm-4 text-start label-column"><label>Customers
                    Name</label></div>
            <div class="col-sm-6 input-column">
                <select name="id_cust" class="form-control" id="cars">
                    @foreach ($cust as $add)
                        <option value={{ $add->id }}> {{ $add->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4 text-start label-column"><label>Packet
                    Name</label></div>
            <div class="col-sm-6 input-column">
                <select name="id_pack" class="form-control" id="cars">
                    @foreach ($pack as $add)
                        <option value={{ $add->id }}> {{ $add->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4 text-start label-column"><label>Packet
                    Price</label></div>
            <div class="col-sm-6 input-column">
                <select name="price" class="form-control" id="cars">
                    @foreach ($pack as $add)
                        <option value={{ $add->id }}> {{ $add->price }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @php $i = 1 @endphp
        <div class="form-outline mb-4">
            <label class="form-label" for="form6Example5">Qty</label>
            <input type="number" id="form6Example5" class="form-control" name="qty" />
        </div>


        {{-- <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form6Example5" class="form-control" />
            <label class="form-label" for="form6Example5">Email</label>
        </div>

        <!-- Number input -->
        <div class="form-outline mb-4">
            <input type="number" id="form6Example6" class="form-control" />
            <label class="form-label" for="form6Example6">Phone</label>
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
            <textarea class="form-control" id="form6Example7" rows="4"></textarea>
            <label class="form-label" for="form6Example7">Additional information</label>
        </div> --}}


        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Add Transaction</button>
    </form>
</x-component.backend.layouts>
