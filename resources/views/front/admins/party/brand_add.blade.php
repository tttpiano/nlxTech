@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">Add-Brand</h5>
                <div class="card mb-4">
                    <!-- Account -->
                    <hr class="my-0"/>
                    <div class="card-body">
                        <form id="formAccountSettings" method="GET"
                              onsubmit="return false" enctype="multipart/form-data">

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Brand 1</label>
                                    <input class="form-control" type="text" name="brand1"
                                           id="brand1" placeholder="Enter data here..." required/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Brand 2</label>
                                    <input class="form-control" type="text" name="brand2"
                                           id="brand2" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Brand 3</label>
                                    <input class="form-control" type="text" name="brand3"
                                           id="brand3" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Brand 4</label>
                                    <input class="form-control" type="text" name="brand4"
                                           id="brand4" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Brand 5</label>
                                    <input class="form-control" type="text" name="brand5"
                                           id="brand5" placeholder="Can be left empty..."/>

                                </div>

                            </div>
                            <div class="mt-2" style="text-align: right">
                                <button type="reset" class="btn btn-outline-secondary">Reset
                                </button>
                                <a href="{{route('brand')}}">
                                    <button type="button" class="btn btn-outline-danger"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                </a>

                                <button type="submit" class="btn btn-outline-success me-2 add_brand">Save
                                </button>

                            </div>


                        </form>

                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>

    <!-- / Content -->
    <script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.add_brand').click(function () {
                var brand1 = $('#brand1').val();
                var brand2 = $('#brand2').val();
                var brand3 = $('#brand3').val();
                var brand4 = $('#brand4').val();
                var brand5 = $('#brand5').val();

                console.log(brand1 + brand2 + brand3 + brand4 + brand5);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('brand.add') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        brand1: brand1,
                        brand2: brand2,
                        brand3: brand3,
                        brand4: brand4,
                        brand5: brand5,
                    },
                    success: function (response) {
                        if (response.success) {
                            swal("Thêm Thành Công", "You clicked the button!", "success");
                            ;

                        } else {
                            swal("Thêm Không Thành Công", "You clicked the button!", "warning");
                        }
                    },
                    error: function () {
                        swal("Thêm Không Thành Công.", "You clicked the button!", "warning");
                    }
                });
            });
        });
    </script>

@endsection
