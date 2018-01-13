@extends('layouts.home')
@section('content')
    <div class="marginContainer">
        <div class="container-fluid">
            <div class="logoTitleGallery firstTitle"><b>{{ $dan }}. DAN</b></div>
            <div id="links">
               @foreach($images as $image)
                   <div class="slika">
                       <a href="{{ '../../' . $image }}" data-gallery>
                           <img src="{{ '../../' . $image }}" />
                       </a>
                   </div>
                @endforeach
            </div>
            <div id="blueimp-gallery" class="blueimp-gallery">
                <!-- The container for the modal slides -->
                <div class="slides"></div>
                <!-- Controls for the borderless lightbox -->
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
                <!-- The modal dialog, which will be used to wrap the lightbox content -->
                <div class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body next"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left prev">
                                    <i class="glyphicon glyphicon-chevron-left"></i>
                                    Previous
                                </button>
                                <button type="button" class="btn btn-primary next">
                                    Next
                                    <i class="glyphicon glyphicon-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script src="{{ asset('js/galerija/blueimp-gallery.js') }}"></script>
    <script>
        document.getElementById('links').onclick = function (event) {
            event = event || window.event;
            let target = event.target || event.srcElement,
                link = target.src ? target.parentNode : target,
                options = {index: link, event: event},
                links = this.getElementsByTagName('a');
            window.blueimp.Gallery(links, options);
        };

        $('#gallery').photobox('a', { thumbs:true });
    </script>
@endsection