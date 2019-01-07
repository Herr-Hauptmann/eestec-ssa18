@extends('layouts.home')

@section('content')
    <div class='row' style='margin:0px;'>
        <div class='col-md-12'>
            <div class='mainNewsDivOne'>
                <div>
                    <img class='img-responsive newsImgOne' src='{{ asset($post->image_url) }}' />
                </div>
                <div class='newsMainDateOne'>
                    <p class='newsDayMargin'>{{ $post->created_at->day }}.{{$post->created_at->month}}.</p>
                <!-- <p>{{ jdmonthname($post->created_at->month, 0) }}</p> -->
                </div>
                <div>
                    <p class='newsArticleHeaderOne'>{{ $post->title }}</p>
                    <div class='newsArticleTextOne'>{!! $post->content !!}</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $(window).resize(function() {
                responsiveDateDiv();
            });

            var responsiveDateDiv = function() {
                var imgHeight = $($(".newsImgOne")[0]).height();
                if (imgHeight != 0) {
                    $.each($(".newsMainDateOne"), function(index, value) {
                        if ($(window).width() > 768) {
                            $(value).css("top", (imgHeight - 80) + "px");
                        } else {
                            $(value).css("top", (imgHeight - 35) + "px");
                        }
                    });
                }
            };
            responsiveDateDiv();           
        });
    </script>

@endsection
