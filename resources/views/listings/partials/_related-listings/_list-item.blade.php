<div class="listings-slider__item bg-light">
    <div class="listings-slider__item__inner">
        <div class="listings-slider__item__thumbnail">
            <a
                href="{{ $listingUrl}}"
            >
                @if( isset($image) && ! empty($image) )
                    <img src="{{ fullImageUrl('listing-thumb-360w', $listing->files()->first()->path) }}" class="listing-card__image__resource d-block w-100">
                @else
                    <img src="https://placehold.co/250x200?text=Image" class="listing-card__image__resource d-block w-100" alt="...">
                @endif
            </a>
        </div>
        <div class="listings-slider__item__details py-2">
            <h2 class="listings-slider__item__title mb-md-1 mb-0">
                <a
                    href="{{ $listingUrl}}"
                >
                    {{ $title }}
                </a>
            </h2>

            <div class="listings-slider__item__address mb-1">
                <span class="town-suburb d-inline-block">Grand-Yoff,</span>
                <span class="province font-weight-bold d-inline-block">Dakar</span>
            </div>

            <h3 class="listings-slider__item__price text-uppercase font-weight-bold mb-1">
                {!! $price !!}
            </h3>

            <div class="listings-slider__item__footer">
                <div class="listings-slider__item__date">
                    <p class="time m-0">{{ $displayDate }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
