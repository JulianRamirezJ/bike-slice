<div class="bikes-container">
    <input wire:model="search" type="text" class="form-control mb-3" placeholder="Search Bikes...">
    <div class="row g-3">
        @foreach ($viewData["bikes"] as $bike)
        <div class="col-md-3">
            <a href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}" wire:key="bike-{{ $bike->getId() }}" class="card-link">
                <div class="card">
                    <img src="{{'https://storage.googleapis.com/project-bike/'.$bike->getImage().'?authuser=2'}}" class="card-img-top" alt="{{ $bike->getName() }}">
                    <div class="card-body">
                        <h5 class="card-title nostyle">{{ $bike->getName() }}</h5>
                        <p class="card-text">{{ $bike->getPrice() }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>