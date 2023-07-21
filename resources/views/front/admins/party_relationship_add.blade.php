@extends('front.admins.layouts.master')
@section('admin-container')

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">


                <div class="col-md-12">
                    <div class="card mb-4">
                        <!-- Account -->

                        <div class="card-body">
                            <form id="formAccountSettings" method="POST" onsubmit="return false">

                                <div class="row">

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Category</label>

                                        <select id="category" class="category form-select">
                                            @foreach ($partyData['category'] as $party)
                                                <option value="{{ $party->id }}">{{ $party->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Category_child</label>
                                        <select id="category_child" class="category_child form-select">
                                            @foreach ($partyData['category_child'] as $party)
                                                <option value="{{ $party->id }}">{{ $party->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Brand</label>
                                        <div>
                                            <select id="brand1" name="brand"  multiple>
                                                @foreach ($partyData['brand'] as $party)
                                                    <option value="{{ $party->id }}">{{ $party->description }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Wattage</label>
                                        <select id="wattage" class="wattage form-select">
                                            @foreach ($partyData['wattage'] as $party)
                                                <option value="{{ $party->id }}">{{ $party->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Tag</label>
                                        <select id="tag" class="tag form-select">
                                            <option value="show" selected>Show</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2" style="text-align: right">
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-outline-success me-2 add_party">Save</button>
                                </div>

                            </form>
                        </div>
                        <!-- /Account -->

                    </div>

                </div>

            </div>

        </div>
        <!-- / Content -->
    </div>

    <script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('.add_party').click(function () {--}}

{{--                var categoty = $('#categoty').val();--}}
{{--                var categoty_child = $('#categoty_child').val();--}}
{{--                var brand = $('#brand').val();--}}
{{--                var wattage = $('#wattage').val();--}}
{{--                var tag = $('#tag').val();--}}

{{--                console.log(categoty + categoty_child +brand+ tag + wattage);--}}
{{--                $.ajax({--}}
{{--                    type: 'POST',--}}
{{--                    url: '{{ route('party.add') }}',--}}
{{--                    data: {--}}
{{--                        _token: '{{ csrf_token() }}',--}}
{{--                        categoty: categoty,--}}
{{--                        categoty_child: categoty_child,--}}
{{--                        brand: brand,--}}
{{--                        wattage: wattage,--}}
{{--                        tag: tag,--}}
{{--                    },--}}
{{--                    success: function (response) {--}}
{{--                        if (response.success) {--}}
{{--                            swal("Thêm Thành công", "You clicked the button!", "success");;--}}

{{--                        } else {--}}
{{--                            swal("Thêm không thành công", "You clicked the button!", "warning");--}}
{{--                        }--}}
{{--                    },--}}
{{--                    error: function () {--}}
{{--                        swal("Thêm không thành công.", "You clicked the button!", "warning");--}}
{{--                    }--}}
{{--                });--}}

{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection
