@extends('front.admins.layouts.master')
@section('admin-container')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">


            <div class="col-md-12">
                <div class="card mb-4">
                    <!-- Account -->
                    <h5 class="card-header" style="background-color: #696cff;margin-bottom: 40px;
    border-color: #696cff; color:#fff">Category</h5>
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" onsubmit="return false">

                            <div class="row">

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category</label>

                                    <select id="category" class="category form-select">
                                        @if (isset($partyData['category']) && count($partyData['category']) > 0)
                                        @foreach ($partyData['category'] as $party)
                                        <option value="{{ $party->id }}">{{ $party->description }}</option>
                                        @endforeach
                                        @else
                                        <option value="" disabled>Không có danh mục</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category_child</label>
                                    <select id="category_child" name="category_child" multiple>
                                        @if (isset($partyData['category_child']) && count($partyData['category_child']) > 0)
                                        @foreach ($partyData['category_child'] as $party)
                                        <option value="{{ $party->id }}">{{ $party->description }}</option>
                                        @endforeach
                                        @else
                                        <option value="" disabled>Không có danh mục</option>
                                        @endif
                                    </select>
                                </div>


                            </div>
                            <div class="mt-2" style="text-align: right">
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                <a href="{{route('admin_party_relationship')}}">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-outline-success me-2 add_category">Save</button>
                            </div>

                        </form>
                    </div>
                    <!-- /Account -->


                </div>

            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <!-- Account -->
                    <h5 class="card-header" style="background-color: #696cff;margin-bottom: 40px;
    border-color: #696cff; color:#fff">Categorychild</h5>
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" onsubmit="return false">

                            <div class="row">


                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Category_child</label>
                                    <select id="category_child2" class="category_child form-select">
                                        @if (isset($partyData['category_child']) && count($partyData['category_child']) > 0)
                                        @foreach ($partyData['category_child'] as $party)
                                        <option value="{{ $party->id }}">{{ $party->description }}</option>
                                        @endforeach
                                        @else
                                        <option value="" disabled>Không có danh mục</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Brand</label>
                                    <div>
                                        <select id="brand1" name="brand" multiple>
                                            @if (isset($partyData['brand']) && count($partyData['brand']) > 0)
                                            @foreach ($partyData['brand'] as $party)
                                            <option value="{{ $party->id }}">{{ $party->description }}</option>
                                            @endforeach
                                            @else
                                            <option value="" disabled>Không có danh mục</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="mt-2" style="text-align: right">
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                <a href="{{route('admin_party_relationship')}}">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-outline-success me-2 add_categoryChild">Save</button>
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

<script>
    $(document).ready(function() {
        $('.add_category').click(function() {

            var category = $('#category option:selected').val();
            var selectedOptions1 = $('#category_child option:selected');
            var selectedValues1 = selectedOptions1.map(function() {
                return $(this).val();
            }).get();



            console.log(selectedValues1);
            $.ajax({
                type: 'POST',
                url: '{{ route('party_relationship.addcategory') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    category: category,
                    category_child: selectedValues1,

                },
                success: function(response) {
                    if (response.success) {
                        swal("Thêm Thành công", "", "success");;

                    } else {
                        swal(response.message, "", "warning");
                    }
                },
                error: function() {
                    swal("Thêm không thành công.", "You clicked the button!", "warning");
                }
            });

        });

        $('.add_categoryChild').click(function() {


            var category_child2 = $('#category_child2 option:selected').val();
            var selectedOptions = $('#brand1 option:selected');
            var selectedValues = selectedOptions.map(function() {
                return $(this).val();
            }).get();

            console.log('Selected options:', selectedValues);
            // var wattage = $('#wattage').val();
            // var tag = $('#tag').val();

            console.log(category_child2);
            $.ajax({
                type: 'POST',
                url: '{{ route('party_relationship.addcategorychild') }}',
                data: {
                    _token: '{{ csrf_token() }}',

                    category_child2: category_child2,
                    brand: selectedValues,
                },
                success: function(response) {
                    if (response.success) {
                        swal("Thêm Thành Công", "", "success");;

                    } else {
                        swal(response.message, "", "warning");
                    }
                },
                error: function() {
                    swal("ERORR!!!", "You clicked the button!", "warning");
                }
            });
        });
    });
</script>
@endsection