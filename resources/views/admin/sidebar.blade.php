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
                    <div class="row" style="border-bottom: 1px solid #ddd; margin-bottom: 5px; padding-bottom: 5px;">
                        <form method="POST" action="{{ route('otvori.prijave') }}" accept-charset="UTF-8" class="col-sm-6">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-success btn-sm" title="Otvori prijave"
                                    onclick="return confirm('Sigurno zelis otvoriti prijave?')">
                                <i class="fa fa-play" aria-hidden="true"></i> Otvori prijave
                            </button>
                        </form>
                        <form method="POST" action="{{ route('zatvori.prijave') }}" accept-charset="UTF-8" class="col-sm-6">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Zatvori prijave"
                                    onclick="return confirm('Sigurno zelis zatvoriti prijave?')">
                                <i class="fa fa-ban" aria-hidden="true"></i> Zatvori prijave
                            </button>
                        </form>
                    </div>
                    <button class="btn btn-success btn-block" onclick="location.href = '{{ route('posts.index') }}'">
                        Novosti
                    </button>
                    <button class="btn btn-success btn-block" onclick="location.href = '{{ route('kontakt.index') }}'">
                        Kontakt
                    </button>
                    <button class="btn btn-info btn-block" onclick="location.href = '{{ route('participants.index') }}'">
                        Participanti
                    </button>
                    <button class="btn btn-default btn-block" onclick="location.href = '{{ route('partners.index') }}'">
                        Partneri
                    </button>
                    <button class="btn btn-default btn-block" onclick="location.href = '{{ route('media.index') }}'">
                        Mediji
                    </button>

                </li>
            </ul>
        </div>
    </div>
</div>
