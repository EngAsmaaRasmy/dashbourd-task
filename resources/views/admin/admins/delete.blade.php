<!-- Modal -->
<div class="modal fade" id="delete{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('admin/receptionType.delete_admin')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.delete')}}" method="post">
                {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $admin->id }}">
                <h5>{{trans('admin/admin.Warning')}}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin/admin.Close')}}</button>
                <button type="submit" class="btn btn-danger">{{trans('admin/admin.submit')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
