<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->slug]) }}">{{ $property->title }}</a>
        </h5>
        <p class="card-text">{{  $property->surface }} m² - {{  $property->city }} {{ $property->postal_code }}</p>
        <div class="text-primary bold" style="font-size:1.4 rem">
        {{ $property->formatted_price }}
        </div>
        <div>
            <p class="card-list">
                @forelse ($property->options as $option )
                <span class="badge bg-primary">{{ $option->name }}</span>
                @empty
                <span class="badge bg-primary">Aucune option</span>
                @endforelse
            </p>
        </div>
        <div  id='sold'>
            //todo : sold or not javascript
            
            {{ $property->sold ? 'Vendu' : 'Disponible' }}

        </div>
    </div>

</div>

