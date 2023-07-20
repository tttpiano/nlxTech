@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">Add-Category</h5>
                <div class="card mb-4">
                    <!-- Account -->
                    <hr class="my-0"/>
                    <div class="card-body">
                        <form id="formAccountSettings" method="GET"
                              onsubmit="return false" enctype="multipart/form-data">

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category 1</label>
                                    <input class="form-control" type="text" name="category1"
                                           id="category1" placeholder="Enter data here..." required/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category 2</label>
                                    <input class="form-control" type="text" name="category2"
                                           id="category2" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category 3</label>
                                    <input class="form-control" type="text" name="category3"
                                           id="category3" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category 4</label>
                                    <input class="form-control" type="text" name="category4"
                                           id="category4" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category 5</label>
                                    <input class="form-control" type="text" name="category5"
                                           id="category5" placeholder="Can be left empty..."/>

                                </div>

                            </div>
                            <div class="mt-2" style="text-align: right">
                                <button type="reset" class="btn btn-outline-secondary">Reset
                                </button>
                                <a href="{{route('category')}}">
                                    <button type="button" class="btn btn-outline-danger"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                </a>

                                <button type="submit" class="btn btn-outline-success me-2 add_category">Save
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
            $('.add_category').click(function () {
                var category1 = $('#category1').val();
                var category2 = $('#category2').val();
                var category3 = $('#category3').val();
                var category4 = $('#category4').val();
                var category5 = $('#category5').val();

                console.log(category1 + category2 + category3 + category4 + category5);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('category.add') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        category1: category1,
                        category2: category2,
                        category3: category3,
                        category4: category4,
                        category5: category5,
                    },
                    success: function (response) {
                        if (response.success) {
                            swal("Thêm Thành công", "You clicked the button!", "success");
                            ;

                        } else {
                            swal("Thêm không thành công", "You clicked the button!", "warning");
                        }
                    },
                    error: function () {
                        swal("Thêm không thành công.", "You clicked the button!", "warning");
                    }
                });
            });
        });
    </script>

@endsection
