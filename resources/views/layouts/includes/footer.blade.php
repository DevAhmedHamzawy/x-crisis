<footer class="ftco-footer ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">About X-Crisis</h2>
            <p>{{ $settings->description }}</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="{{ $settings->twitter }}"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="{{ $settings->facebook }}"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="{{ $settings->instagram }}"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Links</h2>
            <ul class="list-unstyled">

              @foreach ($footercolone as $p)
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>{{ $p->title }}</a></li>
              @endforeach
              
            </ul>
          </div>
        </div>
        <div class="col-md">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Services</h2>
            <ul class="list-unstyled">
              @foreach ($footercoltwo as $p)
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>{{ $p->title }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{ $settings->telephone  }}</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{ $settings->email }}</span></a></li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved X-Crisis.com
</p>
        </div>
      </div>
    </div>
  </footer>