@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Detalji o treningu</div>
                    <div class="panel-body">

                        <a href="{{ back()->getTargetUrl() }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Nazad</button></a>
                        <a href="{{ route('trainings.edit', $training->id) }}" title="Edit Training"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Izmjeni</button></a>

                        <form method="POST" action="{{ route('trainings.destroy', $training->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Training" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Izbrisi</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $training->id }}</td>
                                    </tr>
                                    <tr><th> Naziv </th><td> {{ $training->title }} </td></tr>
                                    <tr><th> Opis </th><td> {!! $training->description !!} </td></tr>
                                    <tr><th> Trening drzi </th>
                                        <td> <a href="{{ route('trainers.show', $training->trainer->id) }}">{{ $training->trainer->name }}</a> </td>
                                    </tr>
                                    <tr>
                                        <th> Slika </th>
                                        <td> <img class="img-responsive" src="{{ asset($training->image) }}" style="height: 150px;" /> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
