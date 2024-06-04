<x-main-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name :</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter first name..">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email :</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Enter email address..">
                                </div>
                                <div class="mb-3">
                                    <label for="division" class="form-label">Division :</label>
                                    <select name="division" class="form-select changeLocation" id="division">
                                        <option value="">Select Division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{$division['division']}}">{{$division['division']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="upazila" class="form-label">Upazila :</label>
                                    <select name="upazila" class="form-select changeLocation" id="upazilas">
                                        <option value="" selected>Select Upazila</option>
                                    </select>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="address" class="form-label">Address :</label>
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Enter full  address..">
                                </div> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name :</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter last name..">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number :</label>
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number..">
                                </div>
                                <div class="mb-3">
                                    <label for="district" class="form-label">District :</label>
                                    <select name="district" class="form-select changeLocation" id="districts">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6>Order Summery</h6>
                        <hr>
                        <div>
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                  </tr>
                                </thead>
                                @php
                                    $total_price = 0;
                                @endphp
                                <tbody>
                                    @forelse ($cartItems as $item)
                                    <tr>
                                      <td>{{$item->product->name}}</td>
                                      <td>{{$item->quantity}}</td>
                                      <td>{{$item->product->selling_price * $item->quantity}}</td>
                                    </tr>
                                    @php
                                        $total_price += ($item->product->selling_price * $item->quantity);
                                    @endphp
                                    @empty
                                        
                                    @endforelse
                                    <tr>
                                        <td colspan="2">Delivery charge :</td>
                                        <td>150</td>
                                    </tr>
                                </tbody>
                              </table>
                              <div>
                                <h6>Total Price : {{$total_price + 150}} BDT</h6>
                              </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const endPoint = "https://bdapis.com/api/v1.2/division/";
            async function bdApi(url) {
            const res = await fetch(url)
            return res.json();
        }
        const locationD = $('.changeLocation');
        $(locationD).change(function (e) { 
        const districtsList = $('#districts');
        const selected_division = $('#division').val();
        e.preventDefault();
        bdApi(endPoint+selected_division)
        .then(districts => {
            districtsList.empty();
            const allDistricts = districts.data;
            allDistricts.forEach(district => {
            const li = document.createElement("option");
            li.textContent = district.district;
            districtsList.append(li);
            })
        })
        .catch(error => {
            console.error('Error::', error);
        });
        });
    </script>


</x-main-layout>