




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
                        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Banner</label>
                                    <input type="file"  id="image" name="image">
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Order</label>
                                    <input class="form-control"
                                           type="number" name="order"
                                           id="order"
                                           placeholder="order"
                                          />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Active</label>
                                    <input  type="checkbox" id="active" name="active" value="1"/>
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
                                <button type="submit" class="btn btn-primary">Save</button>

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
