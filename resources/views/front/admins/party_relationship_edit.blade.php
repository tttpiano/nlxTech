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
                        <label class="form-label">Categoty</label>
                        <input
                        class="form-control"
                        type="text"
                        id="categoty"
                        name="categoty"
                        placeholder="Categoty"
                        autofocus
                        />
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Categoty Child</label>
                        <input class="form-control" type="text" name="categoty_child" id="categoty_child" placeholder="Categoty Child" />
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Brand</label>
                        <div>
                        <select id="brand1" name="brand"  multiple>
                        <option value="1">Show</option>
                        <option value="2">Hidden</option>
                        <option value="3">Show</option>
                        <option value="4">Hidden</option>
                        <option value="5">Show</option>
                        <option value="6">Hidden</option>
                        <option value="7">Show</option>
                        <option value="8">Hidden</option>
                        </select>
                        </div>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Wattage</label>
                        <input class="form-control" type="text" name="wattage" id="wattage" placeholder="Wattage" />
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Tag</label>
                        <input class="form-control" type="text" name="tag" id="tag" placeholder="Tag" />
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
