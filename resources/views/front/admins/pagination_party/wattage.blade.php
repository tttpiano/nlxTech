<table class="table">
    <thead>
    <tr class="color_tr">
        <th>STT</th>
        <th>Wattage</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody class="table-border-bottom-0 alldata">
    @foreach($wattage as $wattages)
        <tr>
            <td>{{$wattages->stt}}</td>
            <td>{{$wattages -> description}}</td>
            <td>
                <a href="{{route('wattage_edit',$wattages -> id)}}" class="btn btn-outline-info"><i
                        class="bx bx-edit-alt me-1"></i>Edit</a>
                <br><br>
                <form id="delete-form" action="{{ route('wattage.destroy', $wattages->id) }}"
                        method="POST"
                        style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{$wattages->id}}">Xoá
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="delete{{$wattages->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xoá <strong style="text-transform: uppercase;"> {{$wattages -> description}}</strong> này? <br>
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
{{$wattage->links('pagination::bootstrap-4')}}
