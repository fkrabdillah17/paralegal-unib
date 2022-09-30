{{-- Modal --}}
@if (Request::segment(2) == 'profile')
    {{-- Division Modal --}}
    <div class="modal fade" id="divisionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="divisionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="divisionModalLabel">Data Divisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($division as $divisi)
                        <div class="input-group input-group-sm mb-3">
                            <form action="{{ route('admin.division.destroy', $divisi->id) }}" class="d-inline" method="post"
                                onsubmit="return confirm('Apakah Anda Yakin Menghapus Data Divisi {{ $divisi->name }} ?')">
                                @method('delete')
                                @csrf
                                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"
                                    class="btn btn-outline-danger no-bg-color-hover btn-sm" id="button-delete"><i class="bi bi-trash-fill text-danger"
                                        style="font-size: 15px"></i></button>
                            </form>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon"
                                aria-describedby="button-delete" value="{{ $divisi->name }}" disabled>
                        </div>
                    @endforeach
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="divisionModalLabel">Tambah Divisi</h5>
                </div>
                <form action="{{ route('admin.division.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="division_name" class="form-label">Nama Divisi</label>
                            <input type="text" class="form-control @error('division_name') is-invalid @enderror" id="division_name" name="division_name"
                                value="{{ old('division_name') }}">
                            @error('division_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Sub Division Modal --}}
    <div class="modal fade" id="subDivisionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="subDivisionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="divisionModalLabel">Data Sub Divisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($sub_division as $sub_divisi)
                        <div class="input-group input-group-sm mb-3">
                            <form action="{{ route('admin.sub.division.destroy', $sub_divisi->id) }}" class="d-inline" method="post"
                                onsubmit="return confirm('Apakah Anda Yakin Menghapus Sub Divisi {{ $sub_divisi->name }} ?')">
                                @method('delete')
                                @csrf
                                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"
                                    class="btn btn-outline-danger no-bg-color-hover btn-sm"><i class="bi bi-trash-fill text-danger"
                                        style="font-size: 15px"></i></button>
                            </form>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon"
                                aria-describedby="button-delete" value="{{ $sub_divisi->division->name }} - {{ $sub_divisi->name }}" disabled>
                        </div>
                    @endforeach
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="subDivisionModalLabel">Tambah Sub Divisi</h5>
                </div>
                <form action="{{ route('admin.sub.division.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <select class="form-select @error('division_name_in') is-invalid @enderror" id="division_name_in"
                                aria-label="Floating label select example" name="division_name_in">
                                <option value="{{ old('division_name_in') }}">{{ old('division_name_in') ? old('division_name_in') : '-- Pilihan --' }}
                                </option>
                                @foreach ($division as $divisi)
                                    <option value="{{ $divisi->name }}">{{ $divisi->name }}</option>
                                @endforeach
                            </select>
                            <label for="division_name_in">Divisi</label>
                            @error('division_name_in')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sub_division_name" class="form-label">Nama Sub Divisi</label>
                            <input type="text" class="form-control @error('sub_division_name') is-invalid @enderror" id="sub_division_name"
                                name="sub_division_name" value="{{ old('sub_division_name') }}">
                            @error('sub_division_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Position Modal --}}
    <div class="modal fade" id="positionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="positionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="divisionModalLabel">Data Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($position as $position)
                        <div class="input-group input-group-sm mb-3">
                            <form action="{{ route('admin.position.destroy', $position->id) }}" class="d-inline" method="post"
                                onsubmit="return confirm('Apakah Anda Yakin Menghapus Sub Divisi {{ $position->name }} ?')">
                                @method('delete')
                                @csrf
                                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"
                                    class="btn btn-outline-danger no-bg-color-hover btn-sm"><i class="bi bi-trash-fill text-danger"
                                        style="font-size: 15px"></i></button>
                            </form>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon"
                                aria-describedby="button-delete" value="{{ $position->name }}" disabled>
                        </div>
                    @endforeach
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="positionModalLabel">Tambah Jabatan</h5>
                </div>
                <form action="{{ route('admin.position.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="position_name" class="form-label">Nama Jabatan</label>
                            <input type="text" class="form-control @error('position_name') is-invalid @enderror" id="position_name" name="position_name"
                                value="{{ old('position_name') }}">
                            @error('position_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@if (Request::segment(2) == 'content')
    {{-- Tag Modal --}}
    <div class="modal fade" id="tagModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tagModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="divisionModalLabel">Data Tag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($tag as $data)
                        <div class="input-group input-group-sm mb-3">
                            <form action="{{ route('admin.tag.destroy', $data->id) }}" class="d-inline" method="post"
                                onsubmit="return confirm('Apakah Anda Yakin Menghapus Sub Divisi {{ $data->name }} ?')">
                                @method('delete')
                                @csrf
                                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"
                                    class="btn btn-outline-danger no-bg-color-hover btn-sm"><i class="bi bi-trash-fill text-danger"
                                        style="font-size: 15px"></i></button>
                            </form>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon"
                                aria-describedby="button-delete" value="{{ $data->name }}" disabled>
                        </div>
                    @endforeach
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="tagModalLabel">Tambah Tag</h5>
                </div>
                <form action="{{ route('admin.tag.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tag_name" class="form-label">Nama Tag</label>
                            <input type="text" class="form-control @error('tag_name') is-invalid @enderror" id="tag_name" name="tag_name"
                                value="{{ old('tag_name') }}">
                            @error('tag_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-labeled btn-secondary" data-bs-dismiss="modal"><span class="btn-label"><i
                                    class="bi bi-x-lg"></i></span>Tutup</button>
                        <button type="submit" class="btn btn-labeled btn-success"><span class="btn-label"><i
                                    class="bi bi-plus-lg"></i></span>Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Category Modal --}}
    <div class="modal fade" id="categoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="categoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="divisionModalLabel">Data Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($category as $data)
                        <div class="input-group input-group-sm mb-3">
                            <form action="{{ route('admin.category.destroy', $data->id) }}" class="d-inline" method="post"
                                onsubmit="return confirm('Apakah Anda Yakin Menghapus Sub Divisi {{ $data->name }} ?')">
                                @method('delete')
                                @csrf
                                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"
                                    class="btn btn-outline-danger no-bg-color-hover btn-sm"><i class="bi bi-trash-fill text-danger"
                                        style="font-size: 15px"></i></button>
                            </form>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon"
                                aria-describedby="button-delete" value="{{ $data->tag->name }} - {{ $data->name }}" disabled>
                        </div>
                    @endforeach
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Tambah Kategori</h5>
                </div>
                <form action="{{ route('admin.category.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <select class="form-select @error('tag_name_in') is-invalid @enderror" id="tag_name_in"
                                aria-label="Floating label select example" name="tag_name_in">
                                <option value="{{ old('tag_name_in') }}">{{ old('tag_name_in') ? old('tag_name_in') : '-- Pilihan --' }}
                                </option>
                                @foreach ($tag as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                            <label for="tag_name_in">Tag</label>
                            @error('tag_name_in')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name"
                                value="{{ old('category_name') }}">
                            @error('category_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-labeled btn-secondary" data-bs-dismiss="modal"><span class="btn-label"><i
                                    class="bi bi-x-lg"></i></span>Tutup</button>
                        <button type="submit" class="btn btn-labeled btn-success"><span class="btn-label"><i
                                    class="bi bi-plus-lg"></i></span>Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
