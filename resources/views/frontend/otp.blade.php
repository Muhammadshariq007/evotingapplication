@extends('frontend/layout')
@section('container')

<div class="mainBg">
    <div class="innerform">
        <h1 class="text-center fs-3 fw-bold">Electronic Voting System</h1>
        @if(Session::has('message'))
        <p class="m-0 text-center text-danger">{{ Session::get('message') }}</p>
        @endif
        <form method="post" action="{{route('front.verification')}}">
            @csrf
        <div class="form-group">
            <div class="otp-field">
              <input type="text" class="otp-input" name="otpcode[]" id="digit-1" oninput="moveToNext(this, 'digit-2')" maxlength="1" />
              <input type="text" class="otp-input" name="otpcode[]" id="digit-2" oninput="moveToNext(this, 'digit-3')" maxlength="1"  />
              <input type="text" class="otp-input" name="otpcode[]" id="digit-3" oninput="moveToNext(this, 'digit-4')" maxlength="1"  />
              <input type="text" class="otp-input" name="otpcode[]" id="digit-4" oninput="moveToNext(this, 'digit-5')" maxlength="1"  />
              <input type="text" class="otp-input" name="otpcode[]" id="digit-5" oninput="moveToNext(this, 'digit-6')" maxlength="1"  />
              <input type="text" class="otp-input" name="otpcode[]" id="digit-6" oninput="moveToNext(this, 'digit-7')" maxlength="1"  />
              <input type="text" class="otp-input" name="otpcode[]" id="digit-7" oninput="moveToNext(this, 'digit-8')" maxlength="1"  />
              <input type="text" class="otp-input" name="otpcode[]" id="digit-8" oninput="moveToNext(this)" maxlength="1"  />
            </div>
        </div>
        <div class="form-group mb-0">
           <button type="submit" class="btn btn-primary">Continue <span>></span></button>
            <!--<a href="#" class="resentotp text-center d-block m-auto mt-3 text-decoration-none" id="resendBtn" disabled>Resend OTP in</a>-->
            <p class="m-0 text-center py-md-2" id="timer"></p>
        </div>
        </form>
    </div>
</div>


<script>
  document
    .querySelector(".otp-field")
    .addEventListener("paste", (e) => {
      e.preventDefault();
      const pasteData = (e.clipboardData || window.clipboardData)
        .getData("text")
        .trim();
      if (pasteData.length === 8 && /^\d+$/.test(pasteData)) {
        const inputs = document.querySelectorAll(".otp-input");
        inputs.forEach((input, index) => {
          input.value = pasteData[index] || "";
        });
      }
    });

  function moveToNext(current, nextId) {
      console.log("current",current);
    if (current.value.length === 1 && nextId) {
      document.getElementById(nextId).focus();
    }
  }

  document.querySelectorAll(".otp-input").forEach((input, index, arr) => {
    input.addEventListener("keydown", (e) => {
      if (e.key === "Backspace" && input.value === "") {
        const prevInput = arr[index - 1];
        if (prevInput) {
          prevInput.focus();
          prevInput.value = ""; // Clear the previous input
        }
      }
    });
  });
</script>

<script>
    let timer = 60; // 60 seconds cooldown
    const resendBtn = document.getElementById('resendBtn');
    const timerSpan = document.getElementById('timer');

    function startTimer() {
        // resendBtn.disabled = true;
        let countdown = setInterval(() => {
            timer--;
            timerSpan.textContent = `Resend OTP In ${timer}`;

            if (timer <= 0) {
                clearInterval(countdown);
                // resendBtn.disabled = false;
                resendBtn.textContent = "";
            }
        }, 1000);
    }

    startTimer(); // Start the timer when OTP is sent

//     resendBtn.addEventListener("click", function () {
//     fetch("/resend-otp", {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json",
//             "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
//         },
//         body: JSON.stringify({ email: "user@example.com" }) // Replace with actual user email
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.message === "OTP sent successfully!") {
//             timer = 60;
//             startTimer();
//         } else {
//             alert(data.message);
//         }
//     });
// });

</script>

@endsection