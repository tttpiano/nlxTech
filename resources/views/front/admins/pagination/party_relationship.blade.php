<table class="table">
    <thead>
    <tr class="color_tr">
        <th>STT</th>
        <th>Categoty</th>
        <th>Categoty Child</th>

        <th>Action</th>
    </tr>
    </thead>
    <tbody class="table-border-bottom-0">
   
    @foreach ($relatedParties as $relatedParty)

        <tr>

        <td>{{$relatedParty->stt}}</td>
        <td>{{ $relatedParty->party->description}} </td>
        <td>{{ $relatedParty->child->description }}</td>
        <td>
            <a href="{{route('party_relationship_edit',$relatedParty->id)}}" class="btn btn-outline-info"><i
                    class="bx bx-edit-alt me-1"></i>Edit</a><br><br>
            <form id="delete-form" action="{{ route('party_relationship.destroy1', $relatedParty->id) }}"
                    method="POST"
                    style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#delete{{$relatedParty->id}}">Xoá
                </button>
                <!-- Modal -->
                <div class="modal fade" id="delete{{$relatedParty->id}}" tabindex="-1"
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
<div class="pagin1">
{{$relatedParties->links('pagination::bootstrap-4')}}
</div>

