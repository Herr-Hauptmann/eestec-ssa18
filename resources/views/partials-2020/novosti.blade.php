<div class="container novosti-kontejner" id="novosti">
    <div class="row">
      <div class="col-6 text-left">
        <h1 class="news-heading">
          Novosti
        </h1>
      </div>

      <div class="col-6 text-right">
        <i onclick="scrollL()" class="fas fa-long-arrow-alt-left strijele"></i>
        <i onclick="scrollR()" class="fas fa-long-arrow-alt-right strijele"></i>
      </div>

    </div>
    @php
        $newsCount= count($posts);
    @endphp
    <div class="row flex-nowrap  overflow-hidden ">
        
        @foreach($posts as $post)

            <div class='col-12 col-sm-6 col-md-4 col-lg-3 p-2 novostba'>
                <a href="{{ route('jednaNovost', $post->id) }}">
                    <div class="novost-div">

                        <div class="novost-image-div">
                            <img class="novost-thumb" src="{{ asset($post->image_url) }}" alt="">
                        </div>
                        
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
                    </div>
                </a>
            </div>
        @endforeach


    </div>

</div>

<script>
    var pixls = screen.width;
    if (pixls < 576) {
      var mks = {{ $newsCount}} -1 ;
    } else if(pixls < 768){
      var mks = {{$newsCount}} -2;
    } else if(pixls < 992){
      var mks = {{$newsCount}} -3;
    } else{
      var mks = {{$newsCount}} -4;
    }
    var pg = 0;
    // treba ubaciti provjeru za zadnju stranu
  
  
  
    function scrollL() {
      if (pg > 0) {
        demoId = document.querySelectorAll('.novostba');
        --pg;
        demoId.forEach(element => {
          element.style.transform = 'translateX(' + -(pg) + '00%)';
        });
      }
    }
  
    function scrollR() {
      if (pg < mks) {
        demoId2 = document.querySelectorAll('.novostba');
        ++pg;
        demoId2.forEach(element => {
          element.style.transform = 'translateX(' + -(pg) + '00%)';
        });
      }
    }
  </script>