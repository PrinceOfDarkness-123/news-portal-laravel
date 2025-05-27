@extends('layouts.app')

    @section('content')
       <div class="custom-404-container">
         <h5 class="mb-4">🆕 Category: {{$category_name}}</h5>
   
       <!-- Error 404 Template 1 - Bootstrap Brain Component -->
       <section class="py-3 py-md-5 min-vh-100 d-flex justify-content-center align-items-center">
         <div class="container py-5" style="transform: scale(1.5);">
           <div class="row">
             <div class="col-12">
               <div class="text-center">
                 <h2 class="d-flex justify-content-center align-items-center gap-2 mb-4">
                   <span class="display-1 fw-bold text-primary">4</span>
                   <i class="bi bi-exclamation-circle-fill text-danger display-4"></i>
                   <span class="display-1 fw-bold bsb-flip-h text-primary">4</span>
                 </h2>
                 <h3 class="h2 mb-2">Oops! You're lost.</h3>
                 <p class="mb-5">The page you are looking for was not found.</p>
               </div>
             </div>
           </div>
         </div>
       </section>
      </div>
   @endsection