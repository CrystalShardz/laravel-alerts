@if(Alert::exists())
    <div class="alert alert-{{ Alert::level() }} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Alert::message() }}
    </div>
@endif