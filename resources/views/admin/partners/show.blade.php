@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Partner '{{ $partner->name }}'</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/partners') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Nazad</button></a>
                        <a href="{{ url('/admin/partners/' . $partner->id . '/edit') }}" title="Edit Partner"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Izmjeni</button></a>

                        <form method="POST" action="{{ url('admin/partners' . '/' . $partner->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Partner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Obrisi</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $partner->id }}</td>
                                    </tr>
                                    <tr><th> Naziv </th><td> {{ $partner->name }} </td></tr>
                                    <tr>
                                        <th> Logo </th>
                                        <td> <img class="img-responsive" src="{{ asset($partner->logo) }}" style="height: 150px;" /> </td>
                                    </tr><tr><th> Kategorija </th><td> {{ $partner->category }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
