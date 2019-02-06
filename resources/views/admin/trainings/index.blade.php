@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Treninzi</div>
                    <div class="panel-body">
                        <a href="{{ route('trainings.create') }}" class="btn btn-success btn-sm" title="Add New Training">
                            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj novi
                        </a>

                        <form method="GET" action="{{ url()->current() }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Pretraga..." value="{{ request('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Naziv</th>
                                        <th>Trening drzi</th>
                                        <th>Slika</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($trainings as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td><a href="{{ route('trainers.show', $item->trainer->id) }}">{{ $item->trainer->name }}</a></td>
                                        <td>
                                            <img src="{{ env('APP_URL') . $item->image }}" class="img-responsive" style="height: 50px;" />
                                        </td>
                                        <td>
                                            <a href="{{ route('trainings.show', $item->id) }}" title="View Training"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Detaljnije</button></a>
                                            <a href="{{ route('trainings.edit', $item->id) }}" title="Edit Training"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Izmjeni</button></a>

                                            <form method="POST" action="{{ route('trainings.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Training" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Izbrisi</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $trainings->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
