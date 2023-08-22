@extends('front.admins.layouts.master')
@section('admin-container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Category</label>
                                        <select id="category_child" class="category_child form-select">
                                            @if (isset($partyData['category_child']) && count($partyData['category_child']) > 0)
                                                @foreach ($partyData['category_child'] as $party)
                                                    <option value="{{ $party->id }}"
                                                            @if($relatedPartie->party_id == $party->id) selected @endif>{{ $party->description }}</option>
                                                @endforeach
                                            @else
                                                <option value="" disabled>Không có danh mục</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Category_child</label>
                                        <select id="brand" class="brand form-select">
                                            @if (isset($partyData['brand']) && count($partyData['brand']) > 0)
                                                @foreach ($partyData['brand'] as $party)
                                                    <option value="{{ $party->id }}"
                                                            @if($relatedPartie->child_id == $party->id) selected @endif>{{ $party->description }}</option>
                                                @endforeach
                                            @else
                                                <option value="" disabled>Không có danh mục</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2" style="text-align: right">
                                    
                                    <<a href="{{route('admin_party_relationship')}}">
                                    <button type="button" class="btn btn-outline-danger"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                </a>
                                    <button type="submit" class="btn btn-outline-success me-2 edit_category">Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
    <script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.edit_category').click(function () {
                var url = new URL(window.location.href);
                var categoryId = url.pathname.split('/').pop();
                var category = $('#category_child option:selected').val();
                var selectedOptions1 = $('#brand option:selected');
                var selectedValues1 = selectedOptions1.map(function () {
                    return $(this).val();
                }).get();


                console.log(selectedValues1);
                console.log(categoryId + category);
                $.ajax({
                    type: 'PUT',
                    url: '{{ route('party_relationship_category_update2') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: categoryId,
                        category_child: category,
                        brand: selectedValues1,
                    },
                    success: function (response) {
                        if (response.success) {
                            swal("Sửa Thành Công", "You clicked the button!", "success");


                        } else {
                            swal(response.message, "", "warning");
                        }
                    },
                    error: function () {
                        swal("ERROR!!!.", "You clicked the button!", "warning");
                    }
                });
            });
        });
    </script>
@endsection
