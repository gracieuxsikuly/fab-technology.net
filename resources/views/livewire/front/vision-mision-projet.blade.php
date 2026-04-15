<div>
    <section id="blog-posts" class="blog-posts section">

        <div class="container">
          <div class="row gy-4">
    
            <div class="col-lg-4">
                @forelse ($visions as $vision)
                <article class="d-flex flex-column">
    
                    <div class="post-img">
                      <img src="{{ asset('assets/img/vision/'.$vision->image) }}" alt="" class="img-fluid">
                    </div>
        
                    <h2 class="title">
                      <a href="{{ route('visionmissionprojet', ['type'=>'vision','id'=>$vision->id]) }}">{{$vision->title}}</a>
                    </h2>
        
                    <div class="content">
                      <p>
                        {{ Str::limit($vision->description, 200) }}
                      </p>
                    </div>
        
                    <div class="read-more mt-auto align-self-end">
                      <a href="{{ route('visionmissionprojet', ['type'=>'vision','id'=>$vision->id]) }}">{{ __('app.read_more') }}</a>
                    </div>
        
                  </article>
                @empty
                <p class="text-muted">{{ __('app.no_data') }}</p>
                @endforelse
           
            </div><!-- End post list item -->
    
            <div class="col-lg-4">
                @forelse ($missions as $mission)
                <article class="d-flex flex-column">
    
                    <div class="post-img">
                      <img src="{{ asset('assets/img/mission/'.$mission->image) }}" alt="" class="img-fluid">
                    </div>
        
                    <h2 class="title"> 
                      <a href="{{ route('visionmissionprojet', ['type'=>'mission','id'=>$mission->id]) }}">{{$mission->title}}</a>
                    </h2>
        
                    <div class="content">
                      <p>
                        {{ Str::limit($mission->description, 400) }}
                      </p>
                    </div>
        
                    <div class="read-more mt-auto align-self-end">
                      <a href="{{ route('visionmissionprojet', ['type'=>'mission','id'=>$mission->id]) }}">{{ __('app.read_more') }}</a>
                    </div>
        
                  </article>
                @empty
                <p class="text-muted">{{ __('app.no_data') }}</p>
                @endforelse
            </div><!-- End post list item -->
    
            <div class="col-lg-4">
                @forelse ($projets as $projet)
                <article class="d-flex flex-column">
    
                    <div class="post-img">
                      <img src="{{ asset('assets/img/projet/'.$projet->image) }}" alt="" class="img-fluid">
                    </div>
        
                    <h2 class="title">
                      <a href="{{ route('visionmissionprojet', ['type'=>'projet','id'=>$projet->id]) }}">{{$projet->title}}</a>
                    </h2>
        
                    <div class="content">
                      <p>
                        {{ Str::limit($projet->description, 400) }}
                      </p>
                    </div>
        
                    <div class="read-more mt-auto align-self-end">
                      <a href="{{ route('visionmissionprojet', ['type'=>'projet','id'=>$projet->id]) }}">{{ __('app.read_more') }}</a>
                    </div>
        
                  </article>
                @empty
                <p class="text-muted">{{ __('app.no_data') }}</p>
                @endforelse
            </div><!-- End post list item -->
          </div>
        </div>
    
      </section>
</div>
