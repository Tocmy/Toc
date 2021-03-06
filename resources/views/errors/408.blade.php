@extends()
@section('title')

@endsection
@section('page-header')

@endsection
@section()
<div class="container">
    <div class="row error">
        <div class="col-lg-12 ground-color text-center">
           <div class="container-error">
               <div class="clip">
                 <div class="shadow"><span class="digit thirdDigit"></span></div>
               </div>
               <div class="clip">
                 <div class="shadow"><span class="digit secondDigit"></span></div>
               </div>
               <div class="clip">
                 <div class="shadow"><span class="digit firstDigit"></span></div>
               </div>
               <div class="msg">Oh!<span class="triangle"></span></div>
             </div>
             <h2 class="h1">__('Request Time Out')</h2>
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
      function randomNum() {
           "use strict";
           return Math.floor(Math.random() * 9) + 1;
         }
         var loop1, loop2, loop3, time = 30,
           i = 0,
           number, selector3 = document.querySelector('.thirdDigit'),
           selector2 = document.querySelector('.secondDigit'),
           selector1 = document.querySelector('.firstDigit');
         loop3 = setInterval(function() {
           "use strict";
           if (i > 40) {
             clearInterval(loop3);
             selector3.textContent = 4;
           } else {
             selector3.textContent = randomNum();
             i++;
           }
         }, time);
         loop2 = setInterval(function() {
           "use strict";
           if (i > 80) {
             clearInterval(loop2);
             selector2.textContent = 0;
           } else {
             selector2.textContent = randomNum();
             i++;
           }
         }, time);
         loop1 = setInterval(function() {
           "use strict";
           if (i > 100) {
             clearInterval(loop1);
             selector1.textContent = 8;
           } else {
             selector1.textContent = randomNum();
             i++;
           }
         }, time);
</script>
@endpush


