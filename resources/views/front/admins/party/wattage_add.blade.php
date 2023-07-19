@extends('front.admins.layouts.master')
@section('admin-container')


    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <!-- Account -->
                    <hr class="my-0"/>
                    <div class="card-body">
                        <form id="formAccountSettings" method="GET"
                              onsubmit="return false" enctype="multipart/form-data">

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Wattage</label>
                                    <input class="form-control" type="text" name="wattage"
                                           id="wattage" placeholder="wattage" required/>
                                    <input class="form-control" type="text" name="wattage"
                                           id="wattage" placeholder="wattage" required/>
                                    <input class="form-control" type="text" name="wattage"
                                           id="wattage" placeholder="wattage" required/>
                                    <input class="form-control" type="text" name="wattage"
                                           id="wattage" placeholder="wattage" required/>

                                </div>

                            </div>
                            <div class="mt-2" style="text-align: right">
                                <button type="reset" class="btn btn-outline-secondary">Reset
                                </button>
                                <button type="button" class="btn btn-outline-danger"
                                        data-bs-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-outline-success me-2 add_post">Save
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




@endsection
