@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">Edit-Banner</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <!-- Account -->
                    <div class="card-body">
                        <label
                            class="form-label">Banner</label>
                        <form method="post" enctype="multipart/form-data" action="{{ route('image.banner') }}">
                            @csrf
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    @if($message = Session::get('success'))
                                        <img
                                            src="{{ asset('images/'.Session::get('images')) }}"
                                            alt="user-avatar"
                                            class="d-block rounded img_edit"
                                            height="100"
                                            width="100"
                                            id="fileUpload"
                                        />
                                    @else
                                        <img
                                            src="{{ asset($banner->image_path) }}"
                                            alt="user-avatar"
                                            class="d-block rounded img_edit"
                                            height="100"
                                            width="100"
                                            id="fileUpload"
                                        />
                                    @endif
                                    <div class="button-wrapper">

                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input
                                                type="file"
                                                id="upload"
                                                name="fileUpload"
                                                class="account-file-input"
                                                hidden
                                                accept="image/png, image/jpeg, image/jpg"
                                            />
                                        </label>

                                        <button type="button"
                                                class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>
                                        <button
                                            class="btn btn-outline-success accougnt-image-reset mb-4 upload submitOk"
                                            data-img="{{ Session::get('images') }}">
                                            <i class="bx bx-reset d-block d-sm-none "></i>
                                            <span class="d-none d-sm-block">OK</span>
                                        </button>


                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="POST"
                              enctype="multipart/form-data" onsubmit="return false">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Order</label>
                                    <input class="form-control"
                                           type="number" name="order"
                                           id="order"
                                           placeholder="order"
                                           value="{{ $banner->order }}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Active</label>
                                    <input type="checkbox" id="active" name="active" value="1"
                                           @if($banner->active) checked @endif/>
                                </div>
                            </div>
                            <div class="mt-2"
                                 style="text-align: right">

                                <a href="{{route('admin.banners.index')}}">
                                    <button type="button" class="btn btn-outline-danger"
                                    >
                                        Close
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-primary edit_banner">Save</button>

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
            var check = 0;
            var fileName = "";
            var imageElement = $('.img_edit');

            // Get the "src" attribute of the image
            var imageSrc = imageElement.attr('src');

            // Split the imageSrc to get the filename
            var fileimg = imageSrc.split('/').pop();

            if (fileimg !== null) {
                fileName = fileimg
            }

            $('#active').on('change', function () {

                // Check if the checkbox is checked
                if ($(this).is(':checked')) {
                    // Get the value of the checkbox
                    var value = $(this).val();
                    check = value;
                    // Use the value as needed
                    console.log('Checkbox is checked. Value:', value);
                    // Do something with the value
                } else {
                    console.log('Checkbox is not checked.');
                    // Do something when the checkbox is not checked
                }
            });
            console.log('Image filename:', fileName);
            var altValue = $('#fileUpload').attr('alt');
            console.log('Alt attribute value: ' + altValue);
            $('.edit_banner').click(function () {
                var url = new URL(window.location.href);
                var bannerId = url.pathname.split('/').pop();
                console.log(bannerId)
                var order = $('#order').val();
                $.ajax({
                    type: 'PUT',
                    url: '{{ route('admin.banners.update') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: bannerId,
                        img: fileName,
                        order: order,
                        active: check,

                    },
                    success: function (response) {
                        if (response.success) {
                            swal("sửa Thành công", "You clicked the button!", "success");


                        } else {
                            swal("", "You clicked the button!", "warning");
                        }
                    },
                    error: function () {
                        swal("sửa không thành công.", "You clicked the button!", "warning");
                    }
                });
            });
        });
    </script>
@endsection
