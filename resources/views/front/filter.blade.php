<form action="{{route('filter.shop')}}" method="post" class="container"
          style="    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset !important;
          border-radius: 10px;
          background: #38A7FF;
          padding: 10px 25px 20px 40px;"
    >
        @csrf
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3" style="margin-top: 10px">
                <input value="" name="search" class="form-control" placeholder="Nhập tên sản phẩm">
            </div>
            <div class=" col-6 col-md-4 col-lg-2" style="margin-top: 10px">
                <select name="category" id="category" class="form-select ">
                    <option value="-1" >Kiểu Loại</option>
                    @if (isset($partyData['category']) && count($partyData['category']) > 0)
                        @foreach ($partyData['category'] as $party)
                            <option value="{{ $party->id }}"> {{ $party->description }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>Không có danh mục</option>
                    @endif
                </select>
            </div>
            <div class="col-6 col-md-4 col-lg-2" style="margin-top: 10px">
                <select name="category_child" id="category_child" class="select2 form-select">
                    <option  value="-1">Loại</option>
                    @if (isset($partyData['category_child']) && count($partyData['category_child']) > 0)
                        @foreach ($partyData['category_child'] as $party)
                            <option value="{{ $party->id }}">{{ $party->description }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>Không có danh mục</option>
                    @endif
                </select>
            </div>

            <div class="col-6 col-md-4 col-lg-2" style="margin-top: 10px">
                <select name="brand"  id="brand" class="select2 form-select">
                    <option value="-1">Thương Hiệu</option>
                    @if (isset($partyData['brand']) && count($partyData['brand']) > 0)
                        @foreach ($partyData['brand'] as $party)
                            <option value="{{ $party->id }}">{{ $party->description }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>Không có danh mục</option>
                    @endif
                </select>
            </div>
            <div class="col-6 col-md-4 col-lg-2" style="margin-top: 10px">
                <select id="wattage" name="wattage" class="select2 form-select" >
                    <option  value="-1">Công Suất</option>
                    @if (isset($partyData['wattage']) && count($partyData['wattage']) > 0)
                        @foreach ($partyData['wattage'] as $party)
                            <option value="{{ $party->id }}">{{ $party->description }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>Không có danh mục</option>
                    @endif
                </select>
            </div>
            <div class="col-6 col-md-4 col-lg-1" style="margin-top: 10px">
                <button class="btn btn-danger" type="submit">Lọc</button>
            </div>
        </div>
    </form>
