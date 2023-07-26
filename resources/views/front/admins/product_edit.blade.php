@extends('front.admins.layouts.master')
@section('admin-container')


    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <!-- Account -->
                        <form method="post" enctype="multipart/form-data" action="{{ route('image.store') }}">
                            @csrf
                            <div class="card-body">

                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    @if($message = Session::get('success'))
                                        @if ($imageInfo)
                                        <img
                                            src="{{ asset('images/'.Session::get('images')) }}"
                                            class="d-block rounded"
                                            height="100"
                                            width="100"
                                            id="fileUpload"
                                            alt="{{$imageInfo['id']}}"
                                        />
                                        @endif
                                    @else
                                        @if ($imageInfo)
                                        <img src="{{ asset('images/' . $imageInfo['file_name']) }}" alt="{{$imageInfo['id']}}" id="fileUpload"
                                             class="d-block rounded" height="100" width="100">
                                        @endif
                                    @endif
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" name="fileUpload" class="account-file-input"
                                                   hidden accept="image/png, image/jpeg, image/jpg">
                                        </label>
                                        <button type="button"
                                                class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>
                                        <button type="submit"
                                                class="btn btn-outline-success account-image-reset mb-4 upload submitOk"
                                                data-img="{{ Session::get('images') }}">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">OK</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr class="my-0"/>
                        <div class="card-body">
                            <form id="formAccountSettings" method="PUT" onsubmit="return false">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Name</label>
                                        <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                               autofocus value="{{ $product->name }}">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Description</label>
                                        <textarea
                                            style="resize: none"
                                            rows="8"
                                            class="form-control"
                                            id="description"
                                            name="description">{{$product->description}}</textarea>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Price</label>
                                        <input class="form-control" type="number" min="0" id="price" name="price"
                                               placeholder="Price"
                                               value="{{ $product->price }}">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Price status</label>
                                        <select id="price_status" class="select2 form-select">
                                            <option value="Show" @if($product->price_status === 'Show') selected @endif>
                                                Show
                                            </option>
                                            <option value="Hidden"
                                                    @if($product->price_status === 'Hidden') selected @endif>Hidden
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">url_seo</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="url_seo"
                                            name="url_seo"
                                            placeholder="url_seo"
                                            autofocus
                                            value="{{$product->url_seo}}"
                                        />
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Category</label>
                                        <select id="category" class="select2 form-select">
                                            @if (isset($partyData['category']) && count($partyData['category']) > 0)
                                                @foreach ($partyData['category'] as $party)
                                                    <option value="{{ $party->id }}"
                                                            @if(in_array($party->id, $linkedCategories)) selected @endif
                                                            data-party-relationship-id="{{ $relationshipIdsByType['category'][$party->id] ?? '' }}">
                                                        {{ $party->description }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="" disabled>Không có danh mục</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Category Child</label>
                                        <select id="category_child" class="select2 form-select">
                                            @if (isset($partyData['category_child']) && count($partyData['category_child']) > 0)
                                                @foreach ($partyData['category_child'] as $party)
                                                    <option value="{{ $party->id }}"
                                                            @if(in_array($party->id, $linkedCategories)) selected @endif
                                                            data-party-relationship-id="{{ $relationshipIdsByType['category_child'][$party->id] ?? '' }}">
                                                        {{ $party->description }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="" disabled>Không có danh mục</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Brand</label>
                                        <select id="brand" class="select2 form-select">
                                            @if (isset($partyData['brand']) && count($partyData['brand']) > 0)
                                                @foreach ($partyData['brand'] as $party)
                                                    <option value="{{ $party->id }}"
                                                            @if(in_array($party->id, $linkedCategories)) selected @endif
                                                            data-party-relationship-id="{{ $relationshipIdsByType['brand'][$party->id] ?? '' }}">
                                                        {{ $party->description }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="" disabled>Không có danh mục</option>
                                            @endif
                                        </select>

                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Wattage</label>
                                        <select id="wattage" class="select2 form-select">
                                            @if (isset($partyData['wattage']) && count($partyData['wattage']) > 0)
                                                @foreach ($partyData['wattage'] as $party)
                                                    <option value="{{ $party->id }}"
                                                            @if(in_array($party->id, $linkedCategories)) selected @endif
                                                            data-party-relationship-id="{{ $relationshipIdsByType['wattage'][$party->id] ?? '' }}">
                                                        {{ $party->description }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="" disabled>Không có danh mục</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                                <div class="mt-2" style="text-align: right">
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-outline-success me-2 edit_product">Save
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
    </div>
    <script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('upload.image', ['_token' => csrf_token()]) }}"
        });
        $("#name").on("keyup input", function() {
            // Lấy giá trị nhập vào
            var inputValue = $(this).val();
            var trimmedValue = inputValue.replace(/\s+$/, "");

            // Thay thế các khoảng trắng còn lại bằng dấu _
            var formattedValue = trimmedValue
                .normalize("NFD")
                .replace(/[\u0300-\u036f]/g, "")
                .replace(/\s+/g, "_");


            $("#url_seo").val(formattedValue);// Hiển thị giá trị nhập vào trong console
        });
        var originalRelationshipIds = []; // Mảng lưu giá trị tạm thời

        $(document).ready(function () {
            $('select').each(function (index) {
                var originalRelationshipId = $(this).find('option:selected').data('party-relationship-id');
                originalRelationshipIds[index] = originalRelationshipId;

                // Log giá trị originalRelationshipId của mỗi select
                console.log('Select ' + (index + 1) + ' Original Relationship ID:', originalRelationshipId);
            });
        });

        $(document).ready(function () {
            var altValue = $('#fileUpload').attr('alt');
            console.log('Alt attribute value: ' + altValue);
            $('.edit_product').click(function () {
                var url = new URL(window.location.href);
                var productId = url.pathname.split('/').pop();
                var name = $('#name').val();
                var price = $('#price').val();
                var url_seo = $('#url_seo').val();
                console.log(name + price);
                var description = CKEDITOR.instances.description.getData();
                console.log(description);
                var price_status = $('#price_status option:selected').text();
                console.log(price_status)
                var category = $('#category option:selected').val();
                console.log(category)
                var category_child = $('#category_child option:selected').val();
                console.log(category_child)
                var brand = $('#brand option:selected').val();
                console.log(brand)
                var wattage = $('#wattage option:selected').val();
                console.log(wattage)
                console.log(originalRelationshipIds[1])
                console.log('Alt attribute value: ' + altValue);

                $.ajax({
                    type: 'PUT',
                    url: '{{ route('product.update') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: productId,
                        name: name,
                        price: price,
                        description: description,
                        category: category,
                        category_child: category_child,
                        brand: brand,
                        wattage: wattage,
                        price_status: price_status,
                        url_seo: url_seo,
                        categoryPartyRelationshipId: originalRelationshipIds[1],
                        categoryChildPartyRelationshipId: originalRelationshipIds[2],
                        brandPartyRelationshipId: originalRelationshipIds[3],
                        wattagePartyRelationshipId: originalRelationshipIds[4],
                        imgID: altValue

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
