@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Media '{{ $media->name }}'</div>
                    <div class="panel-body">

                        <a href="{{ back()->getTargetUrl() }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Nazad</button></a>
                        <a href="{{ route('media.edit', $media->id) }}" title="Edit media"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Izmjeni</button></a>

                        <form method="POST" action="{{ route('media.destroy', $media->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete media" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Obrisi</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $media->id }}</td>
                                    </tr>
                                    <tr><th> Naziv </th><td> {{ $media->name }} </td></tr>
                                    <tr>
                                        <th> Logo </th>
                                        <td> <img class="img-responsive" src="{{ asset($media->logo) }}" style="height: 150px;" /> </td>
                                    </tr><tr><th> Kategorija </th><td> {{ $media->category }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
