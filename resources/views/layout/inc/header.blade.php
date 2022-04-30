 <!-- Page Header-->
 <header class="masthead" style="background-image: url('{{ asset('/assets/images/about-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    @if (Auth::check())
                        @if(Route::has('/'))
                            <h1>Hello {{ Auth::user()->username }}</h1>
                                <h2>Welcome <h2>
                                <h2>{{ $title }}<h2>
     

                        @endif
                        
                    @endif
                   
                        {{-- <h1>{{ $title }}<h1> --}}
                    
                    

                </div>
            </div>
        </div>
    </div>
</header>