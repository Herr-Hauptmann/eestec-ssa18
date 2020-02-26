<div class="container novosti-kontejner">
    <div class="row">
        <h1 class="news-heading">
            Novosti
        </h1>
    </div>

    <div class="row justify-content-around">
        
        @foreach($posts as $post)

            <div class='col-6 col-lg-3 p-2'>
                <div class="novost-div">

                    <a href="{{ route('jednaNovost', $post->id) }}">
                        <div class="novost-image-div">
                            <img class="novost-thumb" src="{{ asset($post->image_url) }}" alt="fali slika bajo moj">
                        </div>
                    </a>
                    
                    <div class="novost-tekst-div p-3">
                        <div class="row novost-naslov-div">

                            <div class="col-7">
                            </div>
                            
                            <div class="col-4 datum-div m-1">
                                <p class="datum-tekst text-center">{{ $post->created_at->day }}.{{$post->created_at->month}}.</p>
                                
                            </div>
                        </div>
                        
                        <div class="text-center novost-naslov p-3 ">
                            <p class='naslov text-wrap text-truncate'>{{ $post->title }}</p>
                        </div>
                    </div>



                    {{-- <a href="{{ route('jednaNovost', $post->id) }}" class="a-mainNewsDiv">
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
                    </a> --}}
                </div>
            </div>
        @endforeach


    </div>

</div>