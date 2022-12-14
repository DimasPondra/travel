<div class="form-group mb-3">
    <label for="file" class="mb-2">
        Image
        <span class="required">*</span>
    </label>
    <input
        type="file"
        name="file"
        id="file"
        class="form-control @error('file')
            is-invalid
        @enderror"
    >
    @error('file')
        <p class="text-danger text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-sm btn-success">Save</button>
</div>
