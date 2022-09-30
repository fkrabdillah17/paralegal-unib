<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\Pengaduan;
use App\Models\Division;
use App\Models\Sub_division;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Content;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    // Home
    public function home()
    {
        if (Auth::user()->role != 1) {
            $pengaduantotal = Pengaduan::where('id_pelapor', Auth::user()->id)->count();
            $pengaduanditolak = Pengaduan::where([['id_pelapor', Auth::user()->id], ['status', 2]])->count();
            $pengaduanditerima = Pengaduan::where([['id_pelapor', Auth::user()->id], ['status', 1]])->count();
            $pengaduandiproses = Pengaduan::where([['id_pelapor', Auth::user()->id], ['status', 0]])->count();
        } else {
            $pengaduantotal = Pengaduan::all()->count();
            $pengaduanditerima = Pengaduan::where('status', 1)->count();
            $pengaduanditolak = Pengaduan::where('status', 2)->count();
            $pengaduandiproses = Pengaduan::where('status', 0)->count();
        }
        return view('admin.home', [
            'pengaduantotal' => $pengaduantotal,
            'pengaduandiproses' => $pengaduandiproses,
            'pengaduanditerima' => $pengaduanditerima,
            'pengaduanditolak' => $pengaduanditolak
        ]);
    }

    // Profile
    public function profile_index()
    {
        $profile = Profile::latest()->get();
        return view('admin.profile_index', [
            'profile' => $profile
        ]);
    }
    public function profile_create()
    {
        $division = Division::orderBy('name')->get();
        $sub_division = Sub_division::orderBy('name')->get();
        $position = Position::orderBy('name')->get();
        return view('admin.profile_create', [
            "division" => $division,
            "sub_division" => $sub_division,
            "position" => $position
        ]);
    }

    public function profile_show(Profile $profile)
    {
        return view('admin.profile_show', compact('profile'));
    }
    public function profile_edit(Profile $profile)
    {
        $division = Division::orderBy('name')->get();
        $sub_division = Sub_division::orderBy('name')->get();
        $position = Position::orderBy('name')->get();
        return view('admin.profile_edit', [
            "division" => $division,
            "sub_division" => $sub_division,
            "position" => $position,
            'profile' => $profile
        ]);
    }

    public function profile_update(Request $request, Profile $profile)
    {
        // Cek Nama
        if ($request->name != $request->oldName) {
            $rulesTitle = 'required|unique:profiles,name|max:150';
        } else {
            $rulesTitle = 'required|max:150';
        }

        // Cek Foto
        if ($request->hasFile('photo')) {
            // Start validasi
            $rules = [
                'name' => $rulesTitle,
                'division' => 'required',
                'position' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            ];
            $message = [
                'position.required' => 'Wajib Pilih Jabatan!',
                'division.required' => 'Wajib Pilih Divisi!',
                'name.required' => 'Nama wajib diisi!',
                'name.unique' => 'Nama telah ada',
                'name.max' => 'Nama maksimal 150 karakter',
                'photo.image' => 'File Harus Gambar!',
                'photo.mimes' => 'Format File jpeg,jpg atau png!',
                'photo.max' => 'Ukuran File Maksimum 2 Mb!',
            ];
            $validate = $this->validate($request, $rules, $message);
            // End validasi

            // Get ID
            $division_id = Division::select('id')->where('name', $request->division)->value('id');
            $position_id = Position::select('id')->where('name', $request->position)->value('id');
            if ($request->sub_division != null) {
                $sub_division_id = Sub_division::select('id')->where('name', $request->sub_division)->value('id');
            } else {
                $sub_division_id = NULL;
            }

            // dd($request->oldPhoto);
            if ($validate) {
                if ($request->oldPhoto != null) {
                    // Start Upload Gambar
                    $awal = $profile->photo;
                    $request->photo->move(public_path() . '/assets/files/team', $awal);
                    //End Upload Data

                    // Start Save Data
                    $profile->update([
                        'name' => $request->name,
                        'division_id' => $division_id,
                        'sub_division_id' => $sub_division_id,
                        'position_id' => $position_id,
                        'photo' => $awal,
                    ]);
                } else {
                    // Start Upload Gambar
                    $item = $request->photo;
                    $imageName = time() . rand(100, 999) . "." . $item->getClientOriginalExtension();
                    $item->move(public_path() . '/assets/files/team', $imageName);
                    //End Upload Data

                    // Start Save Data
                    $profile->update([
                        'name' => $request->name,
                        'division_id' => $division_id,
                        'sub_division_id' => $sub_division_id,
                        'position_id' => $position_id,
                        'photo' => $imageName
                    ]);
                }
                return redirect()->route('admin.profile')->with('status', 'Data Profile berhasil diubah!');
            }
        } else {
            // Start validasi
            $rules = [
                'name' => $rulesTitle,
                'division' => 'required',
                'position' => 'required',
            ];
            $message = [
                'position.required' => 'Wajib Pilih Jabatan!',
                'division.required' => 'Wajib Pilih Divisi!',
                'name.required' => 'Nama wajib diisi!',
                'name.unique' => 'Nama telah ada',
                'name.max' => 'Nama maksimal 150 karakter',
            ];
            $validate = $this->validate($request, $rules, $message);
            // End validasi

            // Get ID
            $division_id = Division::select('id')->where('name', $request->division)->value('id');
            $position_id = Position::select('id')->where('name', $request->position)->value('id');
            if ($request->sub_division != null) {
                $sub_division_id = Sub_division::select('id')->where('name', $request->sub_division)->value('id');
            } else {
                $sub_division_id = NULL;
            }

            if ($validate) {
                // Start Save Data
                $profile->update([
                    'name' => $request->name,
                    'division_id' => $division_id,
                    'sub_division_id' => $sub_division_id,
                    'position_id' => $position_id,
                ]);
                return redirect()->route('admin.profile')->with('status', 'Data Profile berhasil diubah!');
            }
        }
    }

    public function profile_destroy(Profile $profile)
    {
        if (File::exists(public_path('assets/files/team/' . $profile->photo))) {
            File::delete(public_path('assets/files/team/' . $profile->photo));
            $profile->delete();
            return redirect()->route('admin.profile')->with('status', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('admin.profile')->with('warning', 'File Foto Tidak Ada, Data Gagal Dihapus');
        }
    }

    public function Filter($division_name_op)
    {
        $division_id = Division::select('id')->where('name', $division_name_op)->value('id');
        echo json_encode(Sub_division::where('division_id', $division_id)->get());
    }
    public function profile_store(Request $request)
    {
        // Validasi
        $rules = [
            'name' => 'required|unique:profiles,name|max:150',
            'division' => 'required',
            'position' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
        $message = [
            'position.required' => 'Wajib Pilih Jabatan!',
            'division.required' => 'Wajib Pilih Divisi!',
            'name.required' => 'Nama wajib diisi!',
            'name.unique' => 'Nama telah ada',
            'name.max' => 'Nama maksimal 150 karakter',
            'photo.image' => 'File Harus Gambar!',
            'photo.mimes' => 'Format File jpeg,jpg atau png!',
            'photo.max' => 'Ukuran File Maksimum 2 Mb!',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        // Get ID
        $division_id = Division::select('id')->where('name', $request->division)->value('id');
        $position_id = Position::select('id')->where('name', $request->position)->value('id');
        if ($request->sub_division != null) {
            $sub_division_id = Sub_division::select('id')->where('name', $request->sub_division)->value('id');
        } else {
            $sub_division_id = NULL;
        }

        if ($validate) {
            if ($request->hasFile('photo')) {

                // Start Upload Gambar
                $item = $request->photo;
                $imageName = time() . rand(100, 999) . "." . $item->getClientOriginalExtension();
                $item->move(public_path() . '/assets/files/team', $imageName);
                //End Upload Data

                // Start Save Data
                Profile::create([
                    'name' => $request->name,
                    'photo' => $imageName,
                    'division_id' => $division_id,
                    'sub_division_id' => $sub_division_id,
                    'position_id' => $position_id
                ]);
            } else {
                // Start Save Data
                Profile::create([
                    'name' => $request->name,
                    'division_id' => $division_id,
                    'sub_division_id' => $sub_division_id,
                    'position_id' => $position_id
                ]);
                // End Save Data
            }
            return redirect()->route('admin.profile')->with('status', 'Data Profil berhasil ditambahkan!');
        }
    }
    public function division_store(Request $request) //Store Division
    {
        // Start validasi
        $rules = [
            'division_name' => 'required|max:150|unique:divisions,name',
        ];
        $message = [
            'division_name.required' => 'Kolom wajib diisi!',
            'division_name.unique' => 'Divisi Sudah Ada!',
            'division_name.max' => 'Judul maksimal 150 karakter',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        if ($validate) {
            // Generate Slug
            $slug = Str::of($request->division_name)->slug('-');

            // Start Save Data
            Division::create([
                'name' => $request->division_name,
                'slug' => $slug
            ]);
            // End Save Data
            return redirect()->back()->with('status', 'Data Divisi Berhasil Ditambah!');
        }
    }
    public function division_destroy(Division $division) // Division Delete
    {
        $division->delete();
        return redirect()->back()->with('status', 'Data Divisi Berhasil Dihapus');
    }
    public function sub_division_store(Request $request) //Store Sub Division
    {
        // Start validasi
        $rules = [
            'division_name_in' => 'required',
            'sub_division_name' => 'required|max:150|unique:sub_divisions,name',
        ];
        $message = [
            'division_name_in.required' => 'Kolom wajib diisi!',
            'sub_division_name.required' => 'Kolom wajib diisi!',
            'sub_division_name.unique' => 'Divisi Sudah Ada!',
            'sub_division_name.max' => 'Judul maksimal 150 karakter',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        // Get Division ID
        $division_id = Division::select('id')->where('name', $request->division_name_in)->value('id');

        if ($validate) {
            // Start Save Data
            Sub_division::create([
                'division_id' => $division_id,
                'name' => $request->sub_division_name
            ]);
            // End Save Data
            return redirect()->back()->with('status', 'Data Sub Divisi Berhasil Ditambah!');
        }
    }
    public function sub_division_destroy(Sub_division $sub_division) // Sub Division Delete
    {
        $sub_division->delete();
        return redirect()->back()->with('status', 'Data Sub Divisi Berhasil Dihapus');
    }
    public function position_store(Request $request) //Store Position
    {
        // Start validasi
        $rules = [
            'position_name' => 'required|max:150|unique:positions,name',
        ];
        $message = [
            'position_name.required' => 'Kolom wajib diisi!',
            'position_name.unique' => 'Jabatan Sudah Ada!',
            'position_name.max' => 'Judul maksimal 150 karakter',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        if ($validate) {
            // Start Save Data
            Position::create([
                'name' => $request->position_name
            ]);
            // End Save Data
            return redirect()->back()->with('status', 'Data Jabatan Berhasil Ditambah!');
        }
    }
    public function position_destroy(Position $position) // Position Delete
    {
        $position->delete();
        return redirect()->back()->with('status', 'Data Jabatan Berhasil Dihapus');
    }

    // Laporan Aspirasi
    public function aspiration_report_index()
    {
        $aspiration = aspiration::latest()->get();
        return view('admin.aspiration_report_index', [
            'aspiration' => $aspiration
        ]);
    }
    public function aspiration_report_show(Aspiration $aspiration)
    {
        return view('admin.aspiration_report_show', [
            'aspiration' => $aspiration
        ]);
    }
    public function aspiration_report_destroy(Aspiration $aspiration)
    {
        $aspiration->delete();
        return redirect()->route('admin.aspiration.report.index')->with('status', 'Data Aspirasi Berhasil Dihapus');
    }
    // Pengaduan
    public function pengaduan_index()
    {
        if (Auth::user()->role != 1) {
            $pengaduan = Pengaduan::where('id_pelapor', Auth::user()->id)->latest()->get();
        } else {
            $pengaduan = Pengaduan::latest()->get();
        }
        return view('admin.pengaduan_index', [
            'pengaduan' => $pengaduan
        ]);
    }
    public function pengaduan_create()
    {
        return view('admin.pengaduan_create');
    }
    public function pengaduan_store(Request $request)
    {
        // Start validasi
        $rules = [
            'title' => 'required|max:150',
            'description' => 'required',
        ];
        $message = [
            'description.required' => 'Kolom wajib diisi!',
            'title.required' => 'Kolom wajib diisi!',
            'title.max' => 'Judul maksimal 150 karakter',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        if ($validate) {
            // Start Save Data
            Pengaduan::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => 0,
                'id_pelapor' => Auth::user()->id,
            ]);
            // End Save Data
            return redirect()->route('admin.pengaduan.index')->with('status', 'Pengaduan Anda Berhasil Dikirim!');
        }
    }

    public function pengaduan_show(Pengaduan $pengaduan)
    {
        if (Auth::user()->role != 1) {
            if (Auth::user()->id == $pengaduan->id_pelapor) {
                return view('admin.pengaduan_show', [
                    'pengaduan' => $pengaduan
                ]);
            } else {
                return redirect()->back()->with('warning', 'Anda Melanggar Privasi');
            }
        } else {
            return view('admin.pengaduan_show', [
                'pengaduan' => $pengaduan
            ]);
        }
    }
    public function pengaduan_edit(Pengaduan $pengaduan)
    {
        if (Auth::user()->role != 1) {
            if (Auth::user()->id == $pengaduan->id_pelapor) {
                return view('admin.pengaduan_edit', [
                    'pengaduan' => $pengaduan
                ]);
            } else {
                return redirect()->back()->with('warning', 'Anda Melanggar Privasi');
            }
        } else {
            return view('admin.pengaduan_edit', [
                'pengaduan' => $pengaduan
            ]);
        }
    }

    public function pengaduan_update(Request $request, Pengaduan $pengaduan)
    {
        // Start validasi
        $rules = [
            'title' => 'required|max:150',
            'description' => 'required',
        ];
        $message = [
            'description.required' => 'Kolom wajib diisi!',
            'title.required' => 'Kolom wajib diisi!',
            'title.max' => 'Judul maksimal 150 karakter',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        if ($validate) {
            // Start Save Data
            $pengaduan->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            // End Save Data
            return redirect()->route('admin.pengaduan.index')->with('status', 'Pengaduan Anda Berhasil Diubah!');
        }
    }

    public function pengaduan_destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return redirect()->route('admin.pengaduan.index')->with('status', 'Data Pengaduan Berhasil Dihapus');
    }
    // Laporan Pengaduan
    public function laporan_pengaduan_index()
    {
        $pengaduan = Pengaduan::latest()->get();
        return view('admin.laporan_pengaduan_index', [
            'pengaduan' => $pengaduan
        ]);
    }
    public function laporan_pengaduan_show(Pengaduan $pengaduan)
    {
        return view('admin.laporan_pengaduan_show', [
            'pengaduan' => $pengaduan
        ]);
    }
    public function laporan_pengaduan_edit(Pengaduan $pengaduan)
    {
        return view('admin.laporan_pengaduan_edit', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function laporan_pengaduan_update(Request $request, Pengaduan $pengaduan)
    {
        // Start validasi
        $rules = [
            'status' => 'required',
            'feedback' => 'required',
        ];
        $message = [
            'feedback.required' => 'Kolom wajib diisi!',
            'status.required' => 'Kolom wajib diisi!',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        if ($validate) {
            // Start Save Data
            $pengaduan->update([
                'status' => $request->status,
                'feedback' => $request->feedback,
                'id_penjawab' => Auth::user()->id
            ]);
            // End Save Data
            return redirect()->route('admin.laporan.pengaduan.index')->with('status', 'Pengaduan Berhasil Ditanggapi!');
        }
    }
    public function content_index()
    {
        $content = Content::latest()->get();
        return view('admin.content_index', [
            'content' => $content
        ]);
    }
    public function content_create()
    {
        $tag = Tag::latest()->get();
        $category = Category::orderBy('tag_id')->orderBy('name')->get();
        return view('admin.content_create', [
            'tag' => $tag,
            'category' => $category
        ]);
    }

    public function Filter_category($tags_op)
    {
        $tag_id = Tag::select('id')->where('name', $tags_op)->value('id');
        echo json_encode(Category::where('tag_id', $tag_id)->get());
    }

    public function tag_store(Request $request) //Store tag
    {
        // Start validasi
        $rules = [
            'tag_name' => 'required|max:150|unique:tags,name',
        ];
        $message = [
            'tag_name.required' => 'Kolom wajib diisi!',
            'tag_name.unique' => 'Divisi Sudah Ada!',
            'tag_name.max' => 'Judul maksimal 150 karakter',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        // Generate Slug
        $slug = Str::of($request->tag_name)->slug('-');

        if ($validate) {
            // Start Save Data
            Tag::create([
                'name' => $request->tag_name,
                'slug' => $slug
            ]);
            // End Save Data
            return redirect()->back()->with('status', 'Data Tag Berhasil Ditambah!');
        }
    }
    public function tag_destroy(tag $tag) // tag Delete
    {
        $tag->delete();
        return redirect()->back()->with('status', 'Data Tag Berhasil Dihapus');
    }

    public function category_store(Request $request) //Store category
    {
        // Start validasi
        $rules = [
            'tag_name_in' => 'required',
            'category_name' => 'required|max:150|unique:categories,name',
        ];
        $message = [
            'tag_name_in.required' => 'Kolom wajib diisi!',
            'category_name.required' => 'Kolom wajib diisi!',
            'category_name.unique' => 'Divisi Sudah Ada!',
            'category_name.max' => 'Judul maksimal 150 karakter',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        // Get Tag ID
        $tag_id = Tag::select('id')->where('name', $request->tag_name_in)->value('id');

        // Generate Slug
        $slug = Str::of($request->category_name)->slug('-');

        if ($validate) {
            // Start Save Data
            category::create([
                'name' => $request->category_name,
                'slug' => $slug,
                'tag_id' => $tag_id
            ]);
            // End Save Data
            return redirect()->back()->with('status', 'Data Kategori Berhasil Ditambah!');
        }
    }
    public function category_destroy(category $category) // category Delete
    {
        $category->delete();
        return redirect()->back()->with('status', 'Data Kategori Berhasil Dihapus');
    }

    public function content_store(Request $request)
    {
        // dd($request->all());

        // Start validasi
        $rules = [
            'tag' => 'required',
            'category' => 'required',
            'description' => 'required',
            'title' => 'required|unique:contents,title|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
        $message = [
            'tag.required' => 'Pilih Tag !',
            'category.required' => 'Pilih Kategori !',
            'description.required' => 'Kolom wajib diisi!',
            'title.required' => 'Kolom wajib diisi!',
            'title.unique' => 'Judul telah ada',
            'title.max' => 'Judul maksimal 255 karakter',
            'thumbnail.required' => 'Wajib menggunakan thumbnail!',
            'thumbnail.image' => 'File Harus Gambar!',
            'thumbnail.mimes' => 'Format File jpeg,jpg atau png!',
            'thumbnail.max' => 'Ukuran File Maksimum 2 Mb!',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        if ($validate) {
            if ($request->hasFile('thumbnail')) {
                // Get Tag & Category ID
                $tag_id = Tag::select('id')->where('name', $request->tag)->value('id');
                $category_id = Category::select('id')->where('name', $request->category)->value('id');

                //SLug
                $slug = Str::of($request->title)->slug('-');

                // Start Upload Gambar
                $item = $request->thumbnail;
                $imageName = time() . rand(100, 999) . "." . $item->getClientOriginalExtension();
                $item->move(public_path() . '/assets/files/pictures/arsip', $imageName);
                //End Upload Data

                // Start Save Data
                Content::create([
                    'status' => 0,
                    'user_id' => Auth::user()->id,
                    'tag_id' => $tag_id,
                    'category_id' => $category_id,
                    'title' => $request->title,
                    'slug' => $slug,
                    'description' => $request->description,
                    'thumbnail' => $imageName,
                ]);
                // End Save Data
            } else {
                return redirect()->back()->with('warning', 'Data Tidak Lengakap');
            }
            return redirect()->route('admin.content')->with('status', 'Data Konten berhasil ditambahkan!');
        }
    }

    public function content_publish(Content $content)
    {
        $content->update([
            'status' => 1,
            'published_at' => now(),
        ]);
        return redirect()->back()->with('status', 'Konten Berhasil Di Terbitkan');
    }

    public function content_show(Content $content)
    {
        return view('admin.content_show', compact('content'));
    }
    public function content_edit(Content $content)
    {
        $tag = Tag::latest()->get();
        $category = Category::orderBy('tag_id')->orderBy('name')->get();
        return view('admin.content_edit', [
            'content' => $content,
            'tag' => $tag,
            'category' => $category
        ]);
    }

    public function content_update(Request $request, Content $content)
    {
        // dd($request->all());
        // Cek Judul
        if ($request->title != $request->oldTitle) {
            $rulesTitle = 'required|unique:contents,title|max:255';
        } else {
            $rulesTitle = 'required';
        }

        if ($request->hasFile('thumbnail')) {
            // Start validasi
            $rules = [
                'title' => $rulesTitle,
                'tag' => 'required',
                'category' => 'required',
                'description' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
            $message = [
                'tag.required' => 'Kolom wajib diisi',
                'category.required' => 'Kolom wajib diisi',
                'description.required' => 'Kolom wajib diisi',
                'title.required' => 'Kolom wajib diisi!',
                'title.unique' => 'Judul telah ada',
                'title.max' => 'Judul maksimal 255 karakter',
                'thumbnail.required' => 'Pilih File !',
                'thumbnail.image' => 'File Harus Gambar!',
                'thumbnail.mimes' => 'Format File jpeg,jpg atau png!',
                'thumbnail.max' => 'Ukuran File Maksimum 2 Mb!',
            ];
            $validate = $this->validate($request, $rules, $message);
            // End validasi

            if ($validate) {
                // SLug
                $slug = Str::of($request->title)->slug('-');

                // Get Tag ID & Category ID
                $tag_id = Tag::select('id')->where('name', $request->tag)->value('id');
                $category_id = Category::select('id')->where('name', $request->category)->value('id');

                // Start Upload Gambar
                $awal = $content->thumbnail;
                $request->thumbnail->move(public_path() . '/assets/files/pictures/arsip', $awal);
                //End Upload Data

                // Start Save Data
                $content->update([
                    'thumbnail' => $awal,
                    'title' => $request->title,
                    'description' => $request->description,
                    'slug' => $slug,
                    'tag_id' => $tag_id,
                    'category_id' => $category_id
                ]);
                return redirect()->route('admin.content')->with('status', 'Data Konten berhasil diubah!');
            }
        } else {
            // Start validasi
            $rules = [
                'title' => $rulesTitle,
                'description' => 'required',
                'tag' => 'required',
                'category' => 'required',
            ];
            $message = [
                'tag.required' => 'Kolom wajib diisi',
                'category.required' => 'Kolom wajib diisi',
                'description.required' => 'Kolom wajib diisi',
                'title.required' => 'Kolom wajib diisi!',
                'title.unique' => 'Judul telah ada',
                'title.max' => 'Judul maksimal 255 karakter',
            ];
            $validate = $this->validate($request, $rules, $message);
            // End validasi

            if ($validate) {
                // SLug
                $slug = Str::of($request->title)->slug('-');

                // Get Tag ID & Category ID
                $tag_id = Tag::select('id')->where('name', $request->tag)->value('id');
                $category_id = Category::select('id')->where('name', $request->category)->value('id');

                // Start Save Data
                $content->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'slug' => $slug,
                    'tag_id' => $tag_id,
                    'category_id' => $category_id
                ]);
                return redirect()->route('admin.content')->with('status', 'Data Konten berhasil diubah!');
            }
        }
    }

    public function content_destroy(Content $content)
    {
        if (File::exists(public_path('assets/files/pictures/arsip/' . $content->thumbnail))) {
            File::delete(public_path('assets/files/pictures/arsip/' . $content->thumbnail));
            $content->delete();
            return redirect()->route('admin.content')->with('status', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('admin.content')->with('warning', 'File Foto Tidak Ada, Data Gagal Dihapus');
        }
    }

    public function user_index()
    {
        $user = User::where('role', 0)->get();
        return view('admin.user_index', [
            'user' => $user,
            'title' => 'User'
        ]);
    }
    public function admin_index()
    {
        $user = User::where('role', 1)->get();
        return view('admin.user_index', [
            'user' => $user,
            'title' => 'Admin'
        ]);
    }

    public function user_destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user')->with('status', 'Data Berhasil Dihapus');
    }

    public function slide_index()
    {
        $slide = Slide::latest()->get();
        return view('admin.slide_index', compact('slide'));
    }

    public function slide_create()
    {
        return view('admin.slide_create');
    }
    public function slide_store(Request $request)
    {
        // dd($request->overlay);

        // Start validasi
        $rules = [
            'title' => 'required|unique:slides,title|max:255',
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
        $message = [
            'title.required' => 'Kolom wajib diisi!',
            'title.unique' => 'Judul telah ada',
            'title.max' => 'Judul maksimal 255 karakter',
            'picture.required' => 'Wajib menggunakan Gambar!',
            'picture.image' => 'File Harus Gambar!',
            'picture.mimes' => 'Format File jpeg,jpg atau png!',
            'picture.max' => 'Ukuran File Maksimum 2 Mb!',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        if ($validate) {
            if ($request->hasFile('picture')) {

                // Start Upload Gambar
                $item = $request->picture;
                $imageName = time() . rand(100, 999) . "." . $item->getClientOriginalExtension();
                $item->move(public_path() . '/assets/files/pictures/arsip', $imageName);
                //End Upload Data

                // Start Save Data
                Slide::create([
                    'title' => $request->title,
                    'caption' => $request->description,
                    'overlay' => $request->overlay,
                    'picture' => $imageName,
                ]);
                // End Save Data
            } else {
                return redirect()->back()->with('warning', 'Data Tidak Lengakap');
            }
            return redirect()->route('admin.slide')->with('status', 'Data Slide berhasil ditambahkan!');
        }
    }
    public function slide_show(Slide $slide)
    {
        return view('admin.slide_show', compact('slide'));
    }
    public function slide_edit(Slide $slide)
    {
        return view('admin.slide_edit', compact('slide'));
    }
    public function slide_update(Request $request, Slide $slide)
    {
        // dd($request->all());
        // Cek Judul
        if ($request->title != $request->oldTitle) {
            $rulesTitle = 'required|unique:slides,title|max:255';
        } else {
            $rulesTitle = 'required';
        }

        if ($request->hasFile('picture')) {
            // Start validasi
            $rules = [
                'title' => $rulesTitle,
                'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
            $message = [
                'title.required' => 'Kolom wajib diisi!',
                'title.unique' => 'Judul telah ada',
                'title.max' => 'Judul maksimal 255 karakter',
                'picture.required' => 'Pilih File !',
                'picture.image' => 'File Harus Gambar!',
                'picture.mimes' => 'Format File jpeg,jpg atau png!',
                'picture.max' => 'Ukuran File Maksimum 2 Mb!',
            ];
            $validate = $this->validate($request, $rules, $message);
            // End validasi

            if ($validate) {
                // Start Upload Gambar
                $awal = $slide->picture;
                $request->picture->move(public_path() . '/assets/files/pictures/arsip', $awal);
                //End Upload Data

                // Start Save Data
                $slide->update([
                    'picture' => $awal,
                    'title' => $request->title,
                    'caption' => $request->description,
                    'overlay' => $request->overlay
                ]);
                return redirect()->route('admin.slide')->with('status', 'Data Konten berhasil diubah!');
            }
        } else {
            // Start validasi
            $rules = [
                'title' => $rulesTitle,
            ];
            $message = [
                'title.required' => 'Kolom wajib diisi!',
                'title.unique' => 'Judul telah ada',
                'title.max' => 'Judul maksimal 255 karakter',
            ];
            $validate = $this->validate($request, $rules, $message);
            // End validasi

            if ($validate) {
                // Start Save Data
                $slide->update([
                    'title' => $request->title,
                    'caption' => $request->description,
                    'overlay' => $request->overlay
                ]);
                return redirect()->route('admin.slide')->with('status', 'Data Konten berhasil diubah!');
            }
        }
    }

    public function slide_destroy(Slide $slide)
    {
        if (File::exists(public_path('assets/files/pictures/arsip/' . $slide->picture))) {
            File::delete(public_path('assets/files/pictures/arsip/' . $slide->picture));
            $slide->delete();
            return redirect()->route('admin.slide')->with('status', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('admin.slide')->with('warning', 'File Foto Tidak Ada, Data Gagal Dihapus');
        }
    }
}
