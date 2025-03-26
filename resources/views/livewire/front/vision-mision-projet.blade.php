<div>
    <section id="blog-posts" class="blog-posts section">

        <div class="container">
          <div class="row gy-4">
    
            <div class="col-lg-4">
                @foreach ($visons as $vision)
                <article class="d-flex flex-column">
    
                    <div class="post-img">
                      <img src="{{ asset('assets/img/vision/'.$vision->image) }}" alt="" class="img-fluid">
                    </div>
        
                    <h2 class="title">
                      <a href="{{ route('visionmissionprojet', ['designation'=>$vision->title,'id'=>$vision->id]) }}">{{$vision->title}}</a>
                    </h2>
        
                    <div class="content">
                      <p>
                        {{ Str::limit($vision->description, 200) }}
                      </p>
                    </div>
        
                    <div class="read-more mt-auto align-self-end">
                      <a href="{{ route('visionmissionprojet', ['designation'=>$vision->title,'id'=>$vision->id]) }}">Lire plus</a>
                    </div>
        
                  </article>
                @endforeach
           
            </div><!-- End post list item -->
    
            <div class="col-lg-4">
                @foreach ($missions as $mission)
                <article class="d-flex flex-column">
    
                    <div class="post-img">
                      <img src="{{ asset('assets/img/mission/'.$mission->image) }}" alt="" class="img-fluid">
                    </div>
        
                    <h2 class="title"> 
                      <a href="{{ route('visionmissionprojet', ['designation'=>$mission->title,'id'=>$mission->id]) }}">{{$mission->title}}</a>
                    </h2>
        
                    <div class="content">
                      <p>
                        {{ Str::limit($mission->description, 400) }}
                      </p>
                    </div>
        
                    <div class="read-more mt-auto align-self-end">
                      <a href="{{ route('visionmissionprojet', ['designation'=>$mission->title,'id'=>$mission->id]) }}">Lire plus</a>
                    </div>
        
                  </article>
                @endforeach
            </div><!-- End post list item -->
    
            <div class="col-lg-4">
                @foreach ($projets as $projet)
                <article class="d-flex flex-column">
    
                    <div class="post-img">
                      <img src="{{ asset('assets/img/projet/'.$projet->image) }}" alt="" class="img-fluid">
                    </div>
        
                    <h2 class="title">
                      <a href="{{ route('visionmissionprojet', ['designation'=>$projet->title,'id'=>$projet->id]) }}">{{$projet->title}}</a>
                    </h2>
        
                    <div class="content">
                      <p>
                        {{ Str::limit($projet->description, 400) }}
                      </p>
                    </div>
        
                    <div class="read-more mt-auto align-self-end">
                      <a href="{{ route('visionmissionprojet', ['designation'=>$projet->title,'id'=>$projet->id]) }}">Lire plus</a>
                    </div>
        
                  </article>
                @endforeach
            </div><!-- End post list item -->
          </div>
        </div>
    
      </section>
</div>
