@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">Add-Category_Child</h5>
                <div class="card mb-4">
                    <!-- Account -->
                    <hr class="my-0"/>
                    <div class="card-body">
                        <form id="formAccountSettings" method="GET"
                              onsubmit="return false" enctype="multipart/form-data">

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category_Child 1</label>
                                    <input class="form-control" type="text" name="category_child1"
                                           id="category_child1" placeholder="Enter data here..." required/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category_Child 2</label>
                                    <input class="form-control" type="text" name="category_child2"
                                           id="category_child2" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category_Child 3</label>
                                    <input class="form-control" type="text" name="category_child3"
                                           id="category_child3" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category_Child 4</label>
                                    <input class="form-control" type="text" name="category_child4"
                                           id="category_child4" placeholder="Can be left empty..."/>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category_Child 5</label>
                                    <input class="form-control" type="text" name="category_child5"
                                           id="category_child5" placeholder="Can be left empty..."/>

                                </div>

                            </div>
                            <div class="mt-2" style="text-align: right">
                                <button type="reset" class="btn btn-outline-secondary">Reset
                                </button>
                                <a href="{{route('category_child')}}">
                                    <button type="button" class="btn btn-outline-danger"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                </a>

                                <button type="submit" class="btn btn-outline-success me-2 add_category_child">Save
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
            $('.add_category_child').click(function () {
                var category_child1 = $('#category_child1').val();
                var category_child2 = $('#category_child2').val();
                var category_child3 = $('#category_child3').val();
                var category_child4 = $('#category_child4').val();
                var category_child5 = $('#category_child5').val();

                console.log(category_child1 + category_child2 + category_child3 + category_child4 + category_child5);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('category_child.add') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        category_child1: category_child1,
                        category_child2: category_child2,
                        category_child3: category_child3,
                        category_child4: category_child4,
                        category_child5: category_child5,
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
