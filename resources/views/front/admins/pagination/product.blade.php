<table class="table">
    <thead>
    <tr class="color_tr">
        <th>STT</th>
        <th>Name</th>
        <th>Images</th>
        <th>Description</th>
        <th>Price</th>
        <th>Price_status</th>
        <th>Url_seo</th>
        <th>Category</th>
        <th>Category Child</th>
        <th>Brand</th>
        <th>Wattage</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody class="table-border-bottom-0">
    @php
        $count1 = 1;
        $id = 0;
    @endphp
    @foreach($products as $product)
        <tr class="alldata"  data-product="{{$product->id}}"
            >
            <td>{{$count1++}}</td>
            <td>{{ $product->name }}</td>
            <td>
                @if($product->images->count() > 0)
                    <img style="width: 100px;"
                            src="{{asset('images/' . $product->images->first()->image->file_name) }}"
                            alt="Image">
                @endif
            </td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->price_status }}</td>
            <td>{{ $product->url_seo }}</td>
            <td>
                @foreach($product->partyRelationship as $relationship)
                    @if($relationship->party_type === 'category')
                        {{ $relationship->party->description }}
                    @endif

                @endforeach
                @empty($product->partyRelationship->where('party_type', 'category')->first())
                    <strong style="color: red !important;">Trống</strong>
                @endempty
            </td>
            <td>
                @foreach($product->partyRelationship as $relationship)
                    @if($relationship->party_type === 'category_child')
                        {{ $relationship->party->description }}
                    @endif
                @endforeach
                @empty($product->partyRelationship->where('party_type', 'category_child')->first())
                    <strong style="color: red !important;">Trống</strong>
                @endempty
            </td>
            <td>
                @foreach($product->partyRelationship as $relationship)
                    @if($relationship->party_type === 'brand')
                        {{ $relationship->party->description }}
                    @endif
                @endforeach
                @empty($product->partyRelationship->where('party_type', 'brand')->first())
                    <strong style="color: red !important;">Trống</strong>
                @endempty
            </td>
            <td>
                @foreach($product->partyRelationship as $relationship)
                    @if($relationship->party_type === 'wattage')
                        {{ $relationship->party->description }}
                    @endif
                @endforeach
                @empty($product->partyRelationship->where('party_type', 'wattage')->first())
                    <strong style="color: red !important;">Trống</strong>
                @endempty
            </td>
            <td>
                <a href="{{ route('product_edit', $product->id) }}" class="btn btn-outline-info"><i
                        class="bx bx-edit-alt me-1"></i>Edit</a><br><br>
                <form id="delete-form" action="{{ route('product.destroy', $product->id) }}"
                        method="POST"
                        style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{$product->id}}">Xoá
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="delete{{$product->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xoá <strong><b>{{ $product->name }}</b></strong>
                                    này?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng
                                    </button>
                                    <button type="submit" class="btn btn-danger">Xoá</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tbody id="Content" class="searchdata">
</table>
{{$products->links('pagination::bootstrap-4')}}