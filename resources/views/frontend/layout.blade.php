<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Evoting System</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <style>
        .mainBg.ballotbg{
            background:#F8F8F8;
            height:auto;
            padding:2rem 0;
                
        }
        .mainBg{
            background:#45256C;
           display: flex;
    justify-content: center;
    align-items: center;
            height:100vh;
        }
        .innerform.ballotinner{
            max-width: 60%;
            margin: 10px 0;
        }
            .innerform {
  
    display: flex;
    flex-direction: column;
    justify-content: center;
    background:#fff;
    padding:2rem 2rem;
    border-radius:20px;
    width: 100%;
    max-width: 35%;
}
.innerform .form-group{
    position:relative;
    margin:10px 0;
}
.innerform .form-group label {
    position: relative;
    top: 11px;
    left: 18px;
    font-weight:700;
}
.innerform .form-group  label.form-check-label{
    top:0;
    left:0;
}
.innerform .form-group button{
    background:#00742D;
    border-color:#00742D;
    width:100%;
    padding:10px 0;
    border-radius:10px;
    font-size:20px;
    font-weight:700;
    box-shadow:none;
}
.innerform .form-group .form-control{
    height:auto;
    padding-top:1rem;
    padding-bottom:1rem;
}
.innerform .form-control:focus{
    box-shadow: none;
        border: 1px solid #ced4da;
}

.otp-field {
  flex-direction: row;
  column-gap: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.otp-field input {
  height: 50px;
  width: 50px;
  border-radius: 6px;
  outline: none;
  font-size: 1.125rem;
  text-align: center;
  border: 1px solid #ddd;
}
.otp-field input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.otp-field input::-webkit-inner-spin-button,
.otp-field input::-webkit-outer-spin-button {
  display: none;
}
.resentotp{
    color:#00742D;
    font-size:18px;
}

.radio-option {
    display: flex;
    justify-content: space-between;
    border: 1px solid #3333;
    border-radius: 33px;
    margin: 6px 0;
}
   .radio-option .content {
    display: flex;
    align-items: center;
    gap: 16px;
}
.radio-option input[type="radio"] {
    margin: 10px 20px;
    width: 20px;
}
.submitData{
    background:#00742D;
    border-color:#00742D;
    width:100%;
    padding:8px 3rem;
    border-radius:10px;
    font-size:20px;
    font-weight:700;
    box-shadow:none;
}


/* Small devices (phones, 320px and up) */
@media (min-width: 320px) and (max-width: 480px) {
  /* CSS for phones */
  .innerform{
      max-width:89%;
      padding: 2rem 1rem;
  }
  .otp-field{
      column-gap: 5px;
  }
  .otp-field input {
    height: 37px;
    width: 37px;
    border-radius: 6px;
    outline: none;
    font-size: 1.125rem;
    text-align: center;
    border: 1px solid #ddd;
}
.innerform.ballotinner {
    max-width: 89%;
    margin: 10px 0;
}
.submitData{
    min-width:358px;
}
}



@media only screen 
  and (min-device-width: 360px) 
  and (max-device-width: 360px) 
  and (min-device-height: 740px) 
  and (max-device-height: 740px) 
  and (-webkit-device-pixel-ratio: 4) {
  /* CSS specific to Samsung Galaxy S8 */
    .otp-field input {
    height: 31px;
    width: 31px;
    border-radius: 6px;
    outline: none;
    font-size: 1.125rem;
    text-align: center;
    border: 1px solid #ddd;
}
.innerform.ballotinner {
    max-width: 89%;
    margin: 10px 0;
}
.submitData{
    min-width:316px;
}
}

        </style>
  </head>
  <body>
    
    
    @section('container')
    @show
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js"></script>
    
   
    <script>
    
    function bindLocalInputOnly() {
    // Unbind any previous event handler to avoid duplicates
    $('.typechange').off('input.restrictToNumbers');

    // Bind only if the current ID is phone
    if ($('#phone').length) {
        $('#phone').on('input.restrictToNumbers', function() {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    }
}
    
        $(document).ready(function() {
            Inputmask("99999999999").mask("#phone");
        });
        bindLocalInputOnly();
    </script>
    
     <script>
     function onchangeRadio(radio) {
    const value = radio.value;
    const label = document.getElementById('typeText');
     const input = document.querySelector('.form-control.typechange');
    

    if (value === 'local') {
      label.textContent = 'Mobile Number';
      input.type = 'text';
      input.placeholder = 'XXXXXXXXXXX';
      input.name = 'mobileNo';
      input.id = 'phone';
      
          // Clear any previous input mask
        Inputmask.remove(input);
        
        // Apply new mask
        Inputmask("99999999999").mask(input);
      
      
    } else if (value === 'international') {
      label.textContent = 'Email Address';
      input.type = 'email';
      input.placeholder = 'example@example.com';
      input.name = 'memberEmail';
      input.id = 'email';
      
       Inputmask.remove(input);
      
       bindLocalInputOnly();
    }
  }
    </script>

  </body>
</html>