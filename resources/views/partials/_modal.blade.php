<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                &times;</span></button>
            <h4 class="modal-title" id="myModalLabel">New Pegawai</h4>
        </div>
        <form action="{{ route('pegawai.store') }}" method="post">
            {{ csrf_field() }}
            <div class="modal-body">
                @include('pages.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                &times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Pegawai</h4>
        </div>
        <form action="{{ route('pegawai.update', 'test') }}" method="post">
            {{ csrf_field() }}
            <div class="modal-body">
                @include('pages.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>