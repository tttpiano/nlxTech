
<table class="table">
    <thead>
    <tr class="color_tr">
        <th>STT</th>
        <th>Categoty Child</th>
        <th>Brand</th>

        <th>Action</th>
    </tr>
    </thead>
    <tbody class="table-border-bottom-0">
   
    @foreach ($relatedParties2 as $related)

        <tr>

            <td>{{$related->stt}}</td>
            <td>{{ $related->party->description}} </td>
            <td>{{ $related->child->description }}</td>
            <td>
                <a href="{{route('party_relationship_edit2',$related->id)}}" class="btn btn-outline-info"><i
                        class="bx bx-edit-alt me-1"></i>Edit</a><br><br>
                <form id="delete-form" action="{{ route('party_relationship.destroy2', $related->id) }}"
                        method="POST"
                        style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{$related->id}}">Xoá
                    </button>
                   
                    <div class="modal fade" id="delete{{$related->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xoá bài viết này?
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
</table>
<div class="pagin2">
{{$relatedParties2->links('pagination::bootstrap-4')}}
</div>