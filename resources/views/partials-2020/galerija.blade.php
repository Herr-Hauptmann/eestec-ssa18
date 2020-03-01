<div class="container">
    @php
        $galleriesCount= count($albums);
    @endphp

    <div class="row novosti-kontejner" >
        <div class="col-6 text-left">
            <h1 class="news-heading">
                Galerija Slika
            </h1>
        </div>
        <div class="col-6 text-right">
            <i onclick="scrollLevlje()" class="fas fa-long-arrow-alt-left strijele"></i>
            <i onclick="scrollRight()"class="fas fa-long-arrow-alt-right strijele"></i>
        </div>

    </div>

    <div class="row flex-nowrap flex-row-reverse overflow-hidden galerija-div">
        @foreach ($albums as $name => $cover)
            <div class="kartica col-3" style="transform:translateX({{$galleriesCount-4}}00%)">
                <div class="ih-item square effect6 from_top_and_bottom">
                <a href="{{ route('album', $name) }}">
                        <img src="{{ asset($cover) }}" style="width:100%"/>
                        <div class="info">
                            <h3 class="gallery-title"> SSA '{{ substr($name, 2) }}  </h3>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
    </div>

</div>

<script>
    var max = {{ $galleriesCount - 4}};
    var page = {{ $galleriesCount - 4}};
    // treba ubaciti provjeru za zadnju stranu

    

    function scrollRight () {
        if(page > 0) {
            demoId = document.querySelectorAll('.kartica');
            --page;
            demoId.forEach(element => {
                element.style.transform = 'translateX(' + (page) + '00%)';
            });
        }
    }

    function scrollLevlje () {
        if(page < max) {
            demoId2 = document.querySelectorAll('.kartica');
            ++page;
            demoId2.forEach(element => {
                element.style.transform = 'translateX(' + (page) + '00%)';
            });
        }
    }
</script>