@extends('frontend/layout')
@section('container')
<form method="post" action="{{route('front.ballotdone')}}">
@csrf
<div class="mainBg ballotbg flex-column">
<h1 class="text-center fs-3 fw-bold pb-3">Electronic Voting System</h1>

@if(count($Nomineedata) > 0)
@foreach($Nomineedata as $nomineeitems)
<div class="innerform ballotinner">
    <h1 class="text-start fs-4 fw-bold pb-2">{{$nomineeitems->nomineeName}} @if($nomineeitems->selectionStatus == 'single') <b>(Select any One)</b> @else
    @endif</h1>
    
    <input type="hidden" name="nominee_ids[]" value="{{$nomineeitems->id}}">
    <div class="row">
        @if(count($nomineeitems->getCandidatesdetails))
            @foreach($nomineeitems->getCandidatesdetails as $candidateitems)
                <div class="col-md-6">
                    <label class="radio-option">
                        <div class="content p-2">
                            <img src="{{asset('frontAsset/img/SOGPicon.webp')}}" width="40">
                            <p class="mb-0 fw-bold">{{$candidateitems->candidateName}}</p>
                        </div>

                        {{-- Render input based on selectionStatus --}}
                        @if($nomineeitems->selectionStatus === 'single')
                            <input type="radio" 
                                   name="candidateselection[{{$nomineeitems->id}}]" 
                                   value="{{$candidateitems->id}}">
                        @elseif($nomineeitems->selectionStatus === 'multiple')
                            <input type="checkbox" class="limit-six"
                                   name="candidateselection[{{$nomineeitems->id}}][]" 
                                   value="{{$candidateitems->id}}">
                        @endif
                    </label>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <label class="radio-option">
                    <div class="content p-2">
                        <img src="{{asset('frontAsset/img/notfound.png')}}" alt="No Candidate">
                        <p class="mb-0">No Candidate Found</p>
                    </div>
                    <input type="radio" disabled>
                </label>
            </div>
        @endif
    </div>
</div>
@endforeach


@else

<!--<div class="innerform ballotinner">-->
<!--    <h1 class="text-start fs-4 fw-bold pb-2">CEO</h1>-->
<!--    <div class="row">-->
<!--        <div class="col-md-12">-->
<!--            <label class="radio-option">-->
<!--            <div class="content p-2">-->
<!--              <img src="{{asset('frontAsset/img/notfound.png')}}" alt="Option 1">-->
<!--              <p class="mb-0">No Candidate Found</p>-->
<!--            </div>-->
<!--            <input type="radio" name="option" value="1" disabled>-->
<!--          </label>-->
<!--        </div>-->

<!--    </div>-->
<!--</div>-->

@endif


<div class="form-group mt-3">
<button type="submit" class="btn btn-primary submitData">Submit</button>
</div>

</div>
</form>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const maxAllowed = 6;
    const checkboxes = document.querySelectorAll('.limit-six');

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', (e) => {
        const checkedCount = Array.from(checkboxes).filter(chk => chk.checked).length;
        if (checkedCount > maxAllowed) {
          e.target.checked = false;  // uncheck this one
          alert(`You can only select up to ${maxAllowed} options.`);
        }
      });
    });
  });
</script>


@endsection