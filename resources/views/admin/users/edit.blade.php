@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 0;">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#info">Osnovni podaci</a></li>
                            <li><a data-toggle="tab" href="#i_permisije">Permisije</a></li>
                            {{--<li><a data-toggle="tab" href="#d_permisije">Direktne permisije</a></li>--}}
                        </ul>
                    </div>
                    <div class="panel-body tab-content">
                        <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div id="info" class="tab-pane fade in active">
                            <form method="POST" action="{{ url('/admin/users/' . $user->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                @include ('admin.users.form', ['submitButtonText' => 'Update'])

                            </form>
                        </div>

                        <div id="i_permisije" class="tab-pane fade">
                            <form method="POST" action="{{ route('permissions.indirect.change', $user->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                @include ('admin.permissions.indirect-all')
                            </form>
                        </div>

                        {{--<div id="d_permisije" class="tab-pane fade">--}}
                            {{--<form method="POST" action="{{ route('permissions.direct.change', $user->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">--}}
                                {{--{{ method_field('PATCH') }}--}}
                                {{--{{ csrf_field() }}--}}
                                {{--@include ('admin.permissions.direct-all')--}}
                            {{--</form>--}}
                        {{--</div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
