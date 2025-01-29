<div class="bg-light border-top border-bottom">
    <div class="container-lg text-center py-4">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-1 g-sm-2">
            @foreach($leagues as $league)
                <div class="col">
                    <div class="position-relative text-bg-secondary p-3 border rounded">
                        <a href="{{ route('league', $league->slug) }}" class="stretched-link link-light text-decoration-none">
                            {{ $league->name }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
