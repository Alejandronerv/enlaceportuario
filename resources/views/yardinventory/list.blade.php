 <!-- Files Row -->
 @section('content')
     <div class="row">

         {{-- Star here --}}
         <div class="row">

             @foreach ($inventoryFiles as $inventoryFile)
                 <div class="col-sm-6 col-lg-3 mt-4">
                     <a class="" href="#">
                         <div class="border p-0 text-center">
                             <img src="{{ asset('images/files/file2.png') }}" alt="img" class="w-40 mx-auto">
                         </div>
                         <div class="bg-light p-3 border border-top-0">
                             <i class="fa fa-file-excel-o mr-1"></i> xlsdocument.xls
                         </div>
                     </a>
                 </div>
             @endforeach
         </div>
         {{-- End Here --}}


     </div>
     <!--Files End Row-->
