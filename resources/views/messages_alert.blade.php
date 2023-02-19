@if(Session::has('error')||(isset($errors)&&count($errors)))
<div class="row mr-2 ml-2">
    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
            id="type-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </button>
</div>
@endif

<style>
    ul {
    list-style-type: none;
    }
</style>

@if (session()->has('add'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('admin/messages.add') }}",
                type: "success"
            });
        }+

    </script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('admin/messages.edit') }}",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('admin/messages.delete') }}",
                type: "success"
            });
        }

    </script>
@endif


@if (session()->has('accept'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('admin/messages.accept') }}",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('error'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('admin/messages.error') }}",
                type: "danger"
            });
        }

    </script>
@endif

@if (session()->has('edit_booking'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('admin/messages.edit_booking') }}",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('cancelled'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('admin/messages.cancelled') }}",
                type: "warning"
            });
        }

    </script>
@endif

@if (session()->has('cannot_cancel'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('admin/messages.cannot_cancel') }}",
                type: "danger"
            });
        }

    </script>
@endif