@extends('layout.master')

@section('content')


            {{-- <section class="content"> --}}
        <div class="container text-center" style="margin-left: 25%; padding:10px;">
          <!-- Small boxes (Stat box) -->
          <div class="row p-2">
              <div class="col-lg-3 p-2">
                <!-- small box -->
                <div class="small-box bg-success p-2" >
                  <div class="inner m-4 p-2">
                    <h2>{{ $posts->count() }}</h2>
                    <p style="color:black; font-weight:700; padding:10px;">Your All Post</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="{{ route('personal-dashboard') }}" class="small-box-footer" style="color:black; font-weight:700; padding:10px;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6 p-2">
                <!-- small box -->
                <div class="small-box bg-info p-2">
                    <div class="inner m-4 p-2">
                      
                    <h3>{{ $pending->count() }}</h2>

                    <p style="color:black; font-weight:700; padding:10px;">Pending For Approvel</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer" style="color:black; font-weight:700; padding:10px;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6 p-2">
                <!-- small box -->
                <div class="small-box bg-danger p-2">
                    <div class="inner m-4 p-2">
                        <h3>{{ $reject->count() }}</h3>
                        <p style="color:black; font-weight:700; padding:10px;">Rejected Post</p>
                    </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer" style="color:black; font-weight:700; padding:10px;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
          </div>
       
        </div>





@endsection
