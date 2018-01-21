@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Participants</div>
                    <div class="panel-body">
                        <a href="{{ route('participants.create') }}" class="btn btn-success btn-sm" title="Add New participant">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url()->current() }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $item->ime }}</td><td>{{ $item->prezime }}</td><td>{{ $item->email }}</td>
                                        <td>
                                            {{--<a href="{{ url('/admin/participants/' . $item->id) }}" title="View participant"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>--}}
                                            {{--<a href="{{ url('/admin/participants/' . $item->id . '/edit') }}" title="Edit participant"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}

                                            {{--<form method="POST" action="{{ url('/admin/participants' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                                                {{--{{ method_field('DELETE') }}--}}
                                                {{--{{ csrf_field() }}--}}
                                                {{--<button type="submit" class="btn btn-danger btn-xs" title="Delete participant" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
                                            {{--</form>--}}
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
