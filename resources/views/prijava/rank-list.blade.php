@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Prijave</div>
                    <div class="panel-body">
                        <form method="GET" action="{{ url()->current() }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="show_with_asterix" id="show_with_asterix" title="Hide project costs"{{ request()->has('show_with_asterix') ? 'checked' : ''}}>
                                    Prikaži samo prijave koje su označene zvjezdicom    
                                </label>
                            </div>

                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Rank</th><th>Ime i prezime</th><th>Glasali</th><th>Zvjezdica</th><th>Bodovi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $counter = ($participants->currentPage() - 1) * $perPage + 1 ?>
                                @foreach($participants as $item)
                                    <tr {{ $counter <= 40 ? 'style=background-color:#02ddc9;' : '' }}>
                                        <td>{{ $counter++ }}</td>
                                        <td>
                                            <a href="{{ route('prijava.show', $item->id) }}">
                                                {{ $item->ime . ' ' . $item->prezime }}
                                            </a>
                                        </td>
                                        <td>{{ $item->glasali }}</td>
                                        <td>{{ $item->asterix ? 'DA' : 'NE' }}</td>
                                        <td>{{ $item->ukupno_bodova }}</td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $participants->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
