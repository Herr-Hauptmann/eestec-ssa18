<style>
    .nav > li > a:hover {
        background-color: inherit;
    }
</style>

<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            Sidebar
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <button class="btn btn-success btn-block" onclick="location.href = '{{ route('posts.index') }}'">
                        Novosti
                    </button>
                    <button class="btn btn-success btn-block" onclick="location.href = '{{ route('kontakt.index') }}'">
                        Kontakt
                    </button>
                    <button class="btn btn-info btn-block" onclick="location.href = '{{ route('participants.index') }}'">
                        Participanti
                    </button>


                </li>
            </ul>
        </div>
    </div>
</div>
