<div class="container">
    <h1 style="text-align:center;    font-size: 40px;
    font-weight: 600;
    text-transform: uppercase;">Our Partners</h1>
    <br>
   <section class="customer-logos slider">
       @foreach ($partners as $partner)
            <div class="slide">
                <img src="{{ $partner->img_path }}">
            </div>
       @endforeach
      
   </section>
</div>
<br><br>