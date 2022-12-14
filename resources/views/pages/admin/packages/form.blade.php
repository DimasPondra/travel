<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="name" class="mb-2">
                Name
                <span class="required">*</span>
            </label>
            <input
                type="text"
                class="form-control @error('name')
                    is-invalid
                @enderror"
                id="name"
                name="name"
                value="{{ old('name', $package->name) }}"
            >
            @error('name')
                <p class="text-danger text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="location" class="mb-2">
                Location
                <span class="required">*</span>
            </label>
            <input
                type="text"
                class="form-control @error('location')
                    is-invalid
                @enderror"
                id="location"
                name="location"
                value="{{ old('location', $package->location) }}"
            >
            @error('location')
                <p class="text-danger text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

<div class="form-group mb-3">
    <label for="description" class="mb-2">
        Description
        <span class="required">*</span>
    </label>
    <textarea
        class="form-control @error('description')
            is-invalid
        @enderror"
        name="description"
        id="description"
        cols="30"
        rows="10"
    >{{ old('description', $package->description) }}</textarea>
    @error('description')
        <p class="text-danger text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="featured_event" class="mb-2">
                Featured Event
            </label>
            <input
                type="text"
                class="form-control @error('featured_event')
                    is-invalid
                @enderror"
                id="featured_event"
                name="featured_event"
                value="{{ old('featured_event', $package->featured_event) }}"
            >
            @error('featured_event')
                <p class="text-danger text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="language" class="mb-2">
                Language
            </label>
            <input
                type="text"
                class="form-control @error('language')
                    is-invalid
                @enderror"
                id="language"
                name="language"
                value="{{ old('language', $package->language) }}"
            >
            @error('language')
                <p class="text-danger text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="foods" class="mb-2">
                Foods
            </label>
            <input
                type="text"
                class="form-control @error('foods')
                    is-invalid
                @enderror"
                id="foods"
                name="foods"
                value="{{ old('foods', $package->foods) }}"
            >
            @error('foods')
                <p class="text-danger text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="departure_date" class="mb-2">
                Departure Date
                <span class="required">*</span>
            </label>
            <input
                type="date"
                class="form-control @error('departure_date')
                    is-invalid
                @enderror"
                id="departure_date"
                name="departure_date"
                value="{{ old('departure_date', $package->departure_date) }}"
            >
            @error('departure_date')
                <p class="text-danger text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="duration" class="mb-2">
                Duration
                <span class="required">*</span>
            </label>
            <input
                type="text"
                class="form-control @error('duration')
                    is-invalid
                @enderror"
                id="duration"
                name="duration"
                value="{{ old('duration', $package->duration) }}"
            >
            @error('duration')
                <p class="text-danger text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="type" class="mb-2">
                Type
            </label>
            <input
                type="text"
                class="form-control @error('type')
                    is-invalid
                @enderror"
                id="type"
                name="type"
                value="{{ old('type', $package->type) }}"
            >
            @error('type')
                <p class="text-danger text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="price" class="mb-2">
                Price
                <span class="required">*</span>
            </label>
            <input
                type="number"
                class="form-control @error('price')
                    is-invalid
                @enderror"
                id="price"
                name="price"
                value="{{ old('price', $package->price_format_number) }}"
            >
            @error('price')
                <p class="text-danger text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

<div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-sm btn-success">Save</button>
</div>

@push('after-script')
    <script src="{{ asset('backend/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endpush
