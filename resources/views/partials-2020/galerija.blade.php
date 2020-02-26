<div class="container">
    @php
        $galleriesCount= count($albums);
    @endphp

    <div class="row " >
        <i onclick="scrollLevlje()" class="far fa-arrow-alt-circle-left"></i>
        <i onclick="scrollRight()"class="far fa-arrow-alt-circle-right"></i>
    </div>

    <div class="row flex-nowrap flex-row-reverse overflow-hidden">
        @foreach ($albums as $name => $cover)
            <div class="kartica col-3" style="transform:translateX({{$galleriesCount-4}}00%)">
                <div class="ih-item square effect6 from_top_and_bottom">
                <a href="{{ route('album', $name) }}">
                        <img src="{{ asset($cover) }}" style="width:100%"/>
                        <div class="info">
                            <h3> SSA '{{ substr($name, 2) }}  </h3>
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