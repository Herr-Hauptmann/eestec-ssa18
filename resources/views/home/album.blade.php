@extends('layouts.home')
@section('content')
    <style>
        #wrap{ overflow:hidden; padding:3%; }
        #pbOverlay.show ~ #wrap{ -webkit-filter:blur(2px) grayscale(.4); }

        #gallery{ padding:20px; }
        #gallery li{ list-style:none; perspective:100px; -webkit-perspective:100px; margin:1px; float:right; position:relative; -webkit-transition:.1s; transition:.1s; -webkit-transition:0.1s; }
        #gallery li.video::before{ content:'\25BA'; color:#FFF; font-size:20px; height:20px; width:20px; line-height:0.9; position:absolute; bottom:3px; left:4px; z-index:1; background:rgba(0,0,0,0.4); box-shadow:0 0 0 3px rgba(0,0,0,0.4); border-radius:0 3px 0 0; pointer-events:none; opacity:0; -webkit-transition:.5s 0.2s; transition:.5s 0.2s; }
        #gallery li.loaded.video::before{ opacity:1; }
        #gallery a{ display:block; width:75px; height:68px; vertical-align:bottom; overflow:hidden; background:rgba(0,0,0,0.1);
            -webkit-transition:.4s ease-out;
            transition:.4s ease-out; -webkit-transition:0.4s ease-out; -webkit-transform:rotateX(90deg) translate(-50px,-50%); transform:rotateX(90deg) translate(-50px,-50%); }
        #gallery a:active, #gallery a:focus{ outline:none; }
        #gallery a img{ min-height:100%; width:100%; -webkit-transition:.3s ease-out; transition:.3s ease-out; -webkit-transition:0.3s ease-out; }
        #gallery .loaded a{ -webkit-transform:rotateX(0deg) translate(0,0); transform:rotateX(0deg) translate(0,0); }
        #gallery li.loaded:hover{ z-index:2; transform:scale(1.5); -webkit-transform:scale(1.5); }
        #gallery li.loaded a:hover{ box-shadow:0 0 0 2px #FFF, 0 0 20px 5px #000; -webkit-transition:.1s; transition:.1s; -webkit-transition:0.1s; }
        #gallery li.loaded:hover img{ transform:scale(1.2); -webkit-transform:scale(1.2); }
        #gallery li.loaded.video:hover::before{ opacity:0; }
    </style>
    <div class="marginContainer">
        <div class="container-fluid">
            <div class="logoTitleGallery firstTitle"><b>{{ $dan }}. DAN</b></div>
            <ul id="gallery">
               @foreach($images as $image)
                   <li class="slika">
                       <a href="{{ $image }}">
                           <img src="{{ asset($image) }}" />
                       </a>
                   </li>
                @endforeach
            </ul>
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