@extends('layouts.home')

@section('content')

    <section class="container-fluid marginContainer novosti-cont">
        <p class="sectionHeadline"><b>sve novosti</b></p>
        <p class="sectionHeadlineBottomRed"></p>
        <div class="row">

            @foreach($posts as $post)

            <div class='col-md-6 novostiDiv'>
                <a href="{{ route('jednaNovost', $post->id) }}" class="a-mainNewsDiv">
                    <div class='mainNewsDiv'>
                        <div>
                            <img class='img-responsive newsImg' src="{{ asset($post->image_url) }}"/>
                        </div>
                        <div class="newsMainDate">
                            <p class="newsDayMargin">{{ $post->created_at->day }}.{{$post->created_at->month}}.</p> 
                            <!-- <p>{{ jdmonthname($post->created_at->month, 0) }}</p> -->
                        </div>
                        <div>
                            <p class='newsArticleHeader'>{{ $post->title }}</p>
                            <div class='newsArticleText'>{!! $post->content !!}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <!-- <div class="container-fluid newsMoreDiv">
            <p><a href="sveNovosti.php"class="newsMoreText">Više novosti...</a></p>
        </div> -->
        <script>
            $(function () {

                $(window).resize(function () {
                    responsiveDateDiv();
                });

                let responsiveDateDiv = function () {
                    let imgHeight = $($(".newsImg")[0]).height();
                    if (imgHeight != 0) {
                        $.each($(".newsMainDate"), function (index, value) {
                            if ($(window).width() > 768) {
                                $(value).css("top", (imgHeight - 80) + "px");
                            } else {
                                $(value).css("top", (imgHeight - 35) + "px");
                            }
                        });
                    }
                };
                responsiveDateDiv();

                $(".novostiDiv").on('click', function (event) {
                    console.log(event);


                    location.href = $(this).data('href')
                });
            });
        </script>
    </section>
@endsection
