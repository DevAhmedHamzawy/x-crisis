<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Contact</span>
          <h2 class="mb-4">Contact Us</h2>
          <p>{{ $settings->contact_title }}</p>
        </div>
      </div>
     
      <div class="row no-gutters block-9">
        <div class="col-md-12 order-md-last d-flex">
          <form class="bg-light p-5 contact-form">
            <div id="success-message"></div>
            <div class="form-group">
              <input type="text" id="name" class="name form-control" placeholder="Your Name">
              <span class="name-contact-error invalid-feedback" role="alert"></span>
            </div>
            <div class="form-group">
              <input type="email" id="email" class="email form-control" placeholder="Your Email">
              <span class="email-contact-error invalid-feedback" role="alert"></span>
            </div>
            <div class="form-group">
              <input type="text" id="subject" class="subject form-control" placeholder="Subject">
              <span class="subject-contact-error invalid-feedback" role="alert"></span>
            </div>
            <div class="form-group">
              <textarea id="message" class="message form-control" cols="30" rows="7" placeholder="Message"></textarea>
              <span class="message-contact-error invalid-feedback" role="alert"></span>
            </div>
            <div class="form-group">
              <input onclick="sendContact();return false;" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        
        </div>

      </div>
    </div>
  </section>


