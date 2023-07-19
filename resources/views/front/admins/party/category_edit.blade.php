@extends('front.admins.layouts.master')
@section('admin-container')


    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <!-- Account -->
                    <hr class="my-0"/>
                    <div class="card-body">
                        <form id="formAccountSettings" method="GET"
                              onsubmit="return false" enctype="multipart/form-data">

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category</label>
                                    <input class="form-control" type="text"  name="category" value="{{$party->description}}"
                                           id="category" placeholder="category" required/>
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
                                <button type="submit" class="btn btn-outline-success me-2 edit_category">Save
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
            $('.edit_category').click(function () {
                var url = new URL(window.location.href);
                var categoryId = url.pathname.split('/').pop();

                var category = $('#category').val();


                console.log(category);

                $.ajax({
                    type: 'PUT',
                    url: '{{ route('category_update') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id:categoryId,
                        category: category,
                    },
                    success: function (response) {
                        if (response.success) {
                            swal("Sửa Thành công", "You clicked the button!", "success");
                            ;

                        } else {
                            swal("Sửa không thành công", "You clicked the button!", "warning");
                        }
                    },
                    error: function () {
                        swal("Sửa không thành công.", "You clicked the button!", "warning");
                    }
                });
            });
        });
    </script>



@endsection
