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

                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>
                                    <button type="submit" class="btn btn-outline-success accougnt-image-reset mb-4 upload submitOk" data-img="{{ Session::get('images') }}">
                                        <i class="bx bx-reset d-block d-sm-none "></i>
                                        <span class="d-none d-sm-block">OK</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                <hr class="my-0" />
                <div class="card-body">
                <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Name</label>
                        <input
                        class="form-control"
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Name"
                        autofocus
                        />
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Description</label>
                        <input class="form-control" type="text" name="description" id="description" placeholder="Description" />
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Price</label>
                        <input
                        class="form-control"
                        type="text"
                        id="price"
                        name="price"
                        placeholder="Price"
                        />
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Price status</label>
                        <select id="price_status" class="select2 form-select">
                        <option value="Show" selected>Show</option>
                        <option value="Hidden">Hidden</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Category</label>
                        <select id="category" class="select2 form-select">
                            @if (isset($partyData['category']) && count($partyData['category']) > 0)
                                @foreach ($partyData['category'] as $party)
                                    <option value="{{ $party->id }}"
                                            @if($relatedPartie->party_id == $party->id) selected @endif>{{ $party->description }}</option>
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
                                            @if($relatedPartie->party_id == $party->id) selected @endif>{{ $party->description }}</option>
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
                                            @if($relatedPartie->party_id == $party->id) selected @endif>{{ $party->description }}</option>
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
                                            @if($relatedPartie->party_id == $party->id) selected @endif>{{ $party->description }}</option>
                                @endforeach
                            @else
                                <option value="" disabled>Không có danh mục</option>
                            @endif
                        </select>
                    </div>
                    </div>
                    <div class="mt-2" style="text-align: right">
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success me-2">Save </button>
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


@endsection
