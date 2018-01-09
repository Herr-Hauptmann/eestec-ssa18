<section class="container-fluid marginContainer novosti-cont">
    <p class="sectionHeadline"><b>novosti</b></p>
    <p class="sectionHeadlineBottomRed"></p>
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-6">
            <div class="mainNewsDiv">
                <div>
                    <img class="img-responsive newsImg" src="{{ asset('img/proba.jpg') }}" />
                </div>
                <div class="newsMainDate">
                    <p class="newsDayMargin">14.</p>
                    <p>Dec</p>
                </div>
                <div>
                    <p class="newsArticleHeader">{{ $post->title }}</p>
                    <p class="newsArticleText">{{ $post->content }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="container-fluid newsMoreDiv">
        <p><a class="newsMoreText" href="{{ route('novosti') }}">Više novosti...</a></p>
    </div>
    <script>
        $(function() {
            $(window).resize(function() {
                responsiveDateDiv();
            });

            let responsiveDateDiv = function() {
                let imgHeight = $($(".newsImg")[0]).height();
                if (imgHeight != 0) {
                    $.each($(".newsMainDate"), function(index, value) {
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
</section>