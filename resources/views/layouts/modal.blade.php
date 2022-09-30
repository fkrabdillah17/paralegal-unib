<!-- Modal -->
<div class="modal fade" id="searchNews" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="searchNewsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-black">
            <div class="modal-header">
                <h5 class="modal-title" id="searchNewsLabel">Pencarian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('news.search') }}" method="get">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="keyword" class="form-label">Kata Kunci</label>
                        <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword"
                            value="{{ old('keyword') }}">
                    </div>
                    @error('keyword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>
