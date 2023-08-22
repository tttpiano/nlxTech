




@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">Add-Banner</h5>
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
                                            class="d-block rounded"
                                            height="100"
                                            width="100"
                                            id="fileUpload"
                                        />
                                    @else
                                        <img
                                            src="{{ asset('storage/img/uptoload.jpg')}}"
                                            alt="user-avatar"
                                            class="d-block rounded"
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
                                        <span style="color: #ca0202;margin-left: 20px;border: 1px solid;padding: 5px 10px;font-size: 13px;border-radius: 5px;">
                                            Lưu ý Upload ảnh trước! 
                                            <strong>' nhấn OK '</strong>
                                            ,  sau đó rồi mới nhập dữ liệu ở dưới
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </form>

                        <form method="POST" enctype="multipart/form-data"  onsubmit="return false">

                            <div class="row">

                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Order</label>
                                    <input class="form-control"
                                           type="number" name="order"
                                           id="order"
                                           min="0"
                                           max="4"
                                           placeholder="order"
                                    />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Active</label>
                                    <input type="checkbox" id="active" name="active" value="1"/>
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
                                <button type="submit" class="btn btn-primary create_banner">Save</button>

                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
<script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script>
    $(document).ready(function () {
        var check = 0;
        // When the checkbox state changes
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

        $('.create_banner').click(function () {
            var order = $('#order').val();


            $.ajax({
                type: 'POST',
                url: '{{ route('admin.banners.store') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    order: order,
                    active: check
                },
                success: function (response) {
                    if (response.success) {
                        swal("Thêm Thành Công", "You clicked the button!", "success");


                    } else {
                        swal('response.message', "You clicked the button!", "warning");
                    }
                },
                error: function () {
                    swal("Thêm Không Thành Công.", "You clicked the button!", "warning");
                }
            });

        });
    });

</script>
