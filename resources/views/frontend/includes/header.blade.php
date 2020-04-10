<header class="">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
        <a href="{{ url('/') }}" class="py-4">
            <img src="https://www.neuefische.de/static/neuefische-gmbh-logo.svg" />
        </a>
        <a class="btn" href="cart.html">
            Cart
            <span class="ml-1 badge badge-dark">3</span>
        </a>
    </div>
    <div class="bg-dark">
        <div class="container d-flex justify-content-between">
            <nav>
                @foreach($categories as $category)
                <a class="py-2 pr-3 d-md-inline-block text-white" href="{{ url("categories/{$category->id}") }}">{{ $category->name }}</a>
                @endforeach
            </nav>
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Your query...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>