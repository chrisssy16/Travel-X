<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">TOUR SITES</h1>

        <div class="row">
            @foreach($toursites as $toursite)
                <div class="col-md-4 mb-4">
                    <div class="card-toursites">
                        <img src="{{ asset('toursitesimage/' . $toursite->image) }}" style="width: 300px; height: 200px; border-radius: 5px;">
                        <div class="body">
                            <p class="text-xl mb-0">{{ $toursite->destination }}</p>
                            <span class="text-sm text-grey">{{ $toursite->description }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-4 wow zoomIn">
            <a href="blog.html" class="btn btn-primary">Explore More</a>
        </div>
    </div>
</div>
