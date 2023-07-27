<table class="table">
    <thead>
    <tr class="color_tr">
    <th>STT</th>
    <th>Category_Child</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody class="table-border-bottom-0 alldata">
    @foreach($category_child as $category_childs)
    <tr>
        <td>{{$category_childs->stt}}</td>
        <td>{{$category_childs -> description}}</td>
        <td>
            <a href="{{route('category_child_edit',$category_childs -> id)}}" class="btn btn-outline-info"><i
                    class="bx bx-edit-alt me-1"></i>Edit</a>
            <br><br>
            <form id="delete-form" action="{{ route('category_child.destroy', $category_childs->id) }}"
                    method="POST"
                    style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#delete{{$category_childs->id}}">Xoá
                </button>
                <!-- Modal -->
                <div class="modal fade" id="delete{{$category_childs->id}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có muốn xoá <strong style="text-transform: uppercase;">{{$category_childs -> description}}</strong> này? <br>
                                Khi xóa mục này những bảng có liên kết cũng sẽ bị xóa theo
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
    <tbody class="searchdata" id="Content">

    </tbody>

</table>
{{$category_child->links('pagination::bootstrap-4')}}