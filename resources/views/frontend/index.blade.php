@extends('frontend/layout')
@section('container')

<div class="mainBg">
    <div class="innerform">
        <h1 class="text-center fs-2 fw-bold">Electronic Voting System</h1>


        @if($status == 'open')

        @if(Session::has('message'))

        <p class="m-0 text-center text-danger">{{ Session::get('message') }}</p>

        @endif


        @elseif($status == 'closed')

        <form method="post" action="{{route('front.caste')}}">
            @csrf
            <div class="form-group d-flex flex-wrap gap-2">
                <div class="form-check">
                    <input class="form-check-input onchangeRadio" type="radio" name="votetype" id="localVoters"
                        value="local" checked onchange="onchangeRadio(this)">
                    <label class="form-check-label" for="localVoters">
                        Pakistani Voters
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input onchangeRadio" type="radio" name="votetype" id="internaltionVoters"
                        value="international" onchange="onchangeRadio(this)">
                    <label class="form-check-label" for="internaltionVoters">
                        Overseas Voters
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label id="typeText">Mobile Number</label>
                <input type="text" name="mobileNo" id="phone" class="form-control typechange"
                    placeholder="XXXXXXXXXXX" />
            </div>
            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">Continue <span>></span></button>
            </div>
        </form>

        <h5 class="text-danger text-center">Voting is closed.</h5>
        @else

        <h5 class="text-center text-danger">Voting starts soon. Please wait.</h5>

        <div id="countdown" class="text-center fs-3"></div>
        <script>
        // JavaScript to handle countdown
        let remainingTime = {
            {
                $remainingTime
            }
        }; // Time in seconds

        function updateCountdown() {
            const hours = Math.floor(remainingTime / 3600);
            const minutes = Math.floor((remainingTime % 3600) / 60);
            const seconds = remainingTime % 60;
            document.getElementById('countdown').innerText = `${hours}h ${minutes}m ${seconds}s`;

            // Check if countdown has ended
            if (remainingTime > 0) {
                remainingTime--;
            } else {
                clearInterval(countdownInterval);
                document.getElementById('countdown').innerText = "Voting has started!";
                setTimeout(function() {
                    window.location.reload();
                }, 1000); // Delay to let the message display briefly before reload
                // Optional: Reload the page or display voting interface here
            }
        }

        // Start the countdown
        updateCountdown(); // Initial call
        const countdownInterval = setInterval(updateCountdown, 1000);
        </script>

        @endif

    </div>
</div>

@endsection