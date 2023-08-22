@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">Add-Wattage</h5>
                <div class="card mb-4">
                    <!-- Account -->
                    <hr class="my-0"/>
                    <div class="card-body">
                        <form id="formAccountSettings" method="GET"
                              onsubmit="return false" enctype="multipart/form-data">

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Wattage 1</label>
                                    <input class="form-control" type="text" name="wattage1"
                                           id="wattage1" placeholder="Enter data here..." required/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Wattage 2</label>
                                    <input class="form-control" type="text" name="wattage2"
                                           id="wattage2" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Wattage 3</label>
                                    <input class="form-control" type="text" name="wattage3"
                                           id="wattage3" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Wattage 4</label>
                                    <input class="form-control" type="text" name="wattage4"
                                           id="wattage4" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Wattage 5</label>
                                    <input class="form-control" type="text" name="wattage5"
                                           id="wattage5" placeholder="Can be left empty..."/>

                                </div>

                            </div>
                            <div class="mt-2" style="text-align: right">
                                <button type="reset" class="btn btn-outline-secondary">Reset
                                </button>
                                <a href="{{route('wattage')}}">
                                    <button type="button" class="btn btn-outline-danger"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                </a>

                                <button type="submit" class="btn btn-outline-success me-2 add_wattage">Save
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
            $('.add_wattage').click(function () {
                var wattage1 = $('#wattage1').val();
                var wattage2 = $('#wattage2').val();
                var wattage3 = $('#wattage3').val();
                var wattage4 = $('#wattage4').val();
                var wattage5 = $('#wattage5').val();

                console.log(wattage1 + wattage2 + wattage3 + wattage4 + wattage5);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('wattage.add') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        wattage1: wattage1,
                        wattage2: wattage2,
                        wattage3: wattage3,
                        wattage4: wattage4,
                        wattage5: wattage5,
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
