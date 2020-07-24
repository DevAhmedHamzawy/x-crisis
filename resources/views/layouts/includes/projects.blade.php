<section class="ftco-section ftco-project bg-light" id="projects-section">
    <div class="container px-md-5">
        <div class="row justify-content-center pb-5">
      <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Accomplishments</span>
        <h2 class="mb-4">Our Projects</h2>
      </div>
    </div>
        <div class="row">
            <div class="col-md-12 testimonial">
        <div class="carousel-project owl-carousel">
           
            @foreach ($projects as $project)

            <div class="item">
                <div class="project">
                            <div class="img">
                                <img src="{{ $project->img_path }}" class="img-fluid" alt="X-Crisis">
                                <div class="text px-4">
                                <h3><a href="{{ $project->link }}">{{ $project->name }}</a></h3>
                                    <span>{{ $project->description }}</span>
                                </div>
                            </div>
                </div>
            </div>
                
            @endforeach
           
         
     
        
            
        </div>
      </div>
        </div>
    </div>
</section>
    