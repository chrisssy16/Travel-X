<div class="page-section bg-light">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Latest Tour Packages</h1>
        <div class="row mt-5">
            @foreach ($tourpacks as $tourpack)
                <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <!-- Display the destination from the tour package -->
                                <a href="#">{{ $tourpack->destination }}</a>
                            </div>
                            <a href="#" class="post-thumb">
                                <!-- Display the tour package image -->
                                <img src="{{ asset('tourpackimages/' . $tourpack->image) }}" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <!-- Display the tour package name -->
                            <h5 class="post-title"><a href="#">{{ $tourpack->packagename }}</a></h5>
                            <div class="site-info">
                                <!-- Display the tour package date -->
                                <span class="mai-time"></span> {{ $tourpack->date }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12 text-center mt-4 wow zoomIn">
                <a href="blog.html" class="btn btn-primary">Explore More</a>
            </div>
        </div>
    </div>
</div>
