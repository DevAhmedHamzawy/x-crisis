<section class="ftco-section-2 img" style="background-image: url({!! $settings->service_two_path !!})">
    <div class="container">
        <div class="row d-md-flex justify-content-end">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">

                        @foreach ($servicestwo as $service)
                            <a class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>{{ $service->title }}</h2>
                            </a>
                        @endforeach
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br>