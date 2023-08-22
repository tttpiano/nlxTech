@extends('front.admins.layouts.master')
@section('admin-container')


    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
            <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">Edit-Category_Child</h5>
                <div class="card mb-4">
                    <!-- Account -->
                    <hr class="my-0"/>
                    <div class="card-body">
                        <form id="formAccountSettings" method="GET"
                              onsubmit="return false" enctype="multipart/form-data">

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category_Child</label>
                                    <input class="form-control" type="text"  name="category_child" value="{{$party->description}}"
                                           id="category_child" placeholder="Category_Child" required/>
                                </div>

                            </div>
                            <div class="mt-2" style="text-align: right">
                                
                                <a href="{{route('category_child')}}">
                                    <button type="button" class="btn btn-outline-danger"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-outline-success me-2 edit_category_child">Save
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
            $('.edit_category_child').click(function () {
                var url = new URL(window.location.href);
                var category_childId = url.pathname.split('/').pop();

                var category_child = $('#category_child').val();


                console.log(category_child);

                $.ajax({
                    type: 'PUT',
                    url: '{{ route('category_child_update') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id:category_childId,
                        category_child: category_child,
                    },
                    success: function (response) {
                        if (response.success) {
                            swal("Sửa Thành Công", "You clicked the button!", "success");
                            ;

                        } else {
                            swal("Sửa Không Thành Công", "You clicked the button!", "warning");
                        }
                    },
                    error: function () {
                        swal("Sửa Không Thành Công.", "You clicked the button!", "warning");
                    }
                });
            });
        });
    </script>



@endsection
