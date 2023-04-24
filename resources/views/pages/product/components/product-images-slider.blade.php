<div class="card card-radius">
    <div id="carouselExampleIndicators" class="carousel slide d-block m-3" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($productImages as $key => $productImage)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}">
                </li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($productImages as $key => $productImage)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset('storage/' . $productImage->image_path) }}"
                        alt="Slide {{ $key }}">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon carousel-control-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon carousel-control-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
