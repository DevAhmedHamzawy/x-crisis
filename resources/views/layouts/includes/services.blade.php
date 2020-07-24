<section class="ftco-section ftco-no-pb ftco-no-pt ftco-services bg-light" id="services-section">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-4 ftco-animate py-5 nav-link-wrap">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            @php $i = 1; @endphp
            @foreach ($services as $service)

                <a class="nav-link px-4 @if($i == 1) active @endif" id="v-pills-{{ $i }}-tab" data-toggle="pill" href="#v-pills-{{ $i }}" role="tab" aria-controls="v-pills-{{ $i }}" aria-selected="true"><span class="mr-3 flaticon-ideas"></span>{{ $service->title }}</a>
                @php $i++; @endphp

            @endforeach


          </div>
        </div>
        <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center">
          
          <div class="tab-content pl-md-5" id="v-pills-tabContent">

            @php $i = 1; @endphp
            @foreach ($services as $service)

                <div class="tab-pane fade show  @if($i == 1) active @endif py-5" id="v-pills-{{ $i }}" role="tabpanel" aria-labelledby="v-pills-{{ $i }}-tab">
                    <span class="icon mb-3 d-block {{ $service->icon }}"></span>
                    <h2 class="mb-4">{{ $service->title1 }}</h2>
                    <p>{{ $service->description }}</p>
            
                </div>
                @php $i++; @endphp

            @endforeach

           
           
              
          </div>
        </div>
      </div>
    </div>
  </section>
