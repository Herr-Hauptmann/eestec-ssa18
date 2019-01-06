<div class="title">
    <div class="container-fluid">
        @if (config('ssa.prijave_otvorene'))
            <div class="row countdown-timer text-center">
                
                <a class="ghost-button" href="{{ route('prijava.create') }}">Prijavi se</a>
                <br/><br/>
                <h3>Prijave traju do: <strong>19. 2.</strong></h3>
                <br/>
                <!-- <h1 data-countdown="2018-02-19 00:00:00" id="countdown" style="font-weight: bolder;"> -->

                </h1>
            </div>
        @else
            {{-- <div class="row text-center countdown-timer">
                <h1 style="font-weight: bolder;">Prijave su zatvorene</h1>
            </div> --}}
        @endif
        <div class="row">

            <div class="title-text ">
                <div class="title-text-one">
                    <p>Besplatna trodnevna radionica ličnih i profesionalnih vještina</p>
                </div>
                <div class="white-border_bottom_full"></div>
                <div class="title-text-two">
                    <p>Soft skills academy Sarajevo</p>
                </div>
                <div class="title-text-three">
                    <p>8 - 10. mart 2019. godine</p>
                </div>
            </div>


        </div>
    </div>
</div>
<script>
    // Set the date we're counting down to
    var vrijemeZatvaranjaPrijava = $('#countdown').data('countdown');
    var countDownDate = new Date(vrijemeZatvaranjaPrijava).getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>