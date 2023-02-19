<div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('admin/products.delete_product')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('products.delete')}}" method="post">
                {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <h5>{{trans('admin/products.Warning')}}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin/products.Close')}}</button>
                <button type="submit" class="btn btn-danger">{{trans('admin/products.submit')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
