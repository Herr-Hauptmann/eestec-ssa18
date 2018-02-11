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
                                    <input type="checkbox" name="hide_scored" id="hide_scored" title="Hide project costs"{{ request()->has('hide_scored') ? 'checked' : ''}}>
                                    Prikaži samo prijave koje nisi bodovao/la   
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
                                        <th>#</th><th>Ime</th><th>Prezime</th><th>Email</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $counter = ($participants->currentPage() - 1) * $perPage + 1 ?>
                                @foreach($participants as $item)
                                    @if ($item->glasano)
                                        <tr title="Već si bodovao/la ovu prijavu" data-toggle="tooltip" style="background-color:#02ddc9">
                                    @else 
                                        <tr>
                                    @endif
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $item->ime }}</td><td>{{ $item->prezime }}</td><td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{ route('prijava.show', $item->id) }}" title="View participant"><button class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Boduj</button></a>
                                        </td>
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
