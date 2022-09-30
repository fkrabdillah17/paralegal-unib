<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Slide;
use App\Models\Profile;
use App\Models\Content;
use App\Models\Division;
use App\Models\Aspiration;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function __construct()
    {
        //Get Data
        $footer_news = Content::where('tag_id', 1)->where('status', 1)->orderBy('published_at', 'desc')->take(5)->get(); // Get 5 Content News Published ID From Tags Table
        $profile_link = Division::orderBy('name', 'desc')->get();
        $archives_news = Content::where('tag_id', 1)->where('status', 1)->selectRaw('year(published_at) year, month(published_at) month,monthname(published_at) months, count(*) published')
            ->groupBy('year', 'month', 'months')
            ->orderByRaw('min(published_at) desc')
            ->get()
            ->toArray();
        $archives_arsip = Content::where('tag_id', 3)->where('status', 1)->selectRaw('year(published_at) year, month(published_at) month,monthname(published_at) months, count(*) published')
            ->groupBy('year', 'month', 'months')
            ->orderByRaw('min(published_at) desc')
            ->get()
            ->toArray();
        // dd($archives);


        // Share Data to All Function in HomeController
        View::share('archives_news', $archives_news);
        View::share('archives_arsip', $archives_arsip);
        View::share('footer_news', $footer_news);
        View::share('profile_link', $profile_link);
        View::share('profile_link', $profile_link);
    }
    // Home
    public function home()
    {
        $slide = Slide::latest()->get();
        $pembina = Profile::where('position_id', 6)->get(); //ID Pembina Table Position
        $bph = Profile::where('division_id', 1)->orderBy('position_id')->get(); //ID BPH Inti Table Division
        $karo = Profile::where('position_id', 3)->get(); //ID Kepala Biro Table Position
        // dd($bph);
        return view('user.home', [
            'slide' => $slide,
            'bph' => $bph,
            'karo' => $karo,
            'pembina' => $pembina
        ]);
    }

    // Profile
    public function profile(Division $division)
    {
        // dd($division->id);
        $data = Profile::where('division_id', $division->id)->orderBy('position_id', 'asc')->get();
        return view('user.profile', [
            'data' => $data,
            'divisi' => $division
        ]);
    }

    // Account
    public function login()
    {
        if (Auth::user() != null) {
            return redirect()->route('admin.home');
        } else {
            return view('auth.index');
        }
    }

    public function login_handle(Request $request)
    {
        $rules = [
            'email' => 'required|string|email|exists:users',
            'password' => 'required|string'
        ];

        $message = [
            'email.required' => 'Email harus diisi!',
            'email.exists' => 'Email tidak terdaftar!',
            'password.required' => 'Password harus diisi!',
        ];

        $validate = $this->validate($request, $rules, $message);
        if ($validate) {
            // Ckeck Role User
            $check = User::where('email', $request->email)->value('role');
            if (Auth::attempt($request->only('email', 'password'))) {
                if ($check == 1) {
                    return redirect()->route('admin.home')->with('sukses', 'Selamat datang di Menu Admin');
                } else {
                    return redirect()->route('home')->with('sukses', 'Anda Berhasil Login');
                }
            } else {
                return redirect()->route('login')->with('status', 'Periksa kembali email atau password anda!');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function register_handle(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];

        $message = [
            'name.required' => 'Nama lengkap harus diisi!',
            'email.required' => 'Email address harus diisi!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password!'
        ];

        $validate = $this->validate($request, $rules, $message);

        if ($validate) {
            //Save data
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
                'role' => 0,
            ]);
            //End Save
            event(new Registered($user));

            Auth::login($user);

            return redirect()->route('verification.notice')->with('status', 'Akun berhasil dibuat!');
        }
    }
    public function verified()
    {
        return view('auth.verified');
    }
    public function notification()
    {
        return view('auth.notification');
    }

    // Aspiration
    public function aspiration()
    {
        return view('user.aspiration_create');
    }
    public function aspiration_store(Request $request)
    {
        // Start validasi
        $rules = [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'nomor' => 'required',
            'npm' => 'required',
            'jurusan' => 'required',
            'title' => 'required|max:150',
            'aspirasi' => 'required',
        ];
        $message = [
            'name.required' => 'Kolom Wajib diisi !',
            'email.required' => 'Kolom wajib diisi!',
            'email.email' => 'Email anda tidak valid!',
            'nomor.required' => 'Kolom wajib diisi!',
            'npm.required' => 'Kolom wajib diisi!',
            'jurusan.required' => 'Kolom wajib diisi!',
            'aspirasi.required' => 'Kolom wajib diisi!',
            'title.required' => 'Kolom wajib diisi!',
            'title.unique' => 'Judul telah ada',
            'title.max' => 'Judul maksimal 150 karakter',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        if ($validate) {
            // Start Save Data
            Aspiration::create([
                'name' => $request->name,
                'email' => $request->email,
                'nomor' => $request->nomor,
                'npm' => $request->npm,
                'jurusan' => $request->jurusan,
                'title' => $request->title,
                'aspirasi' => $request->aspirasi
            ]);
            // End Save Data
            return redirect()->route('aspiration')->with('status', 'Aspirasi Anda Berhasil Dikirim!');
        }
    }
    // Arsip
    public function arsip()
    {
        $data = Content::where('tag_id', 3)->where('status', 1)->orderBy('published_at', 'desc')->take(5)->get();
        return view('user.arsip', compact('data'));
    }
    public function arsip_list()
    {
        $data = Content::where('tag_id', 3)->where('status', 1)->orderBy('published_at', 'desc')->paginate(5);
        return view('user.arsip_list', compact('data'));
    }
    public function arsip_archive_list($months, $month, $year)
    {
        $data = Content::where('tag_id', 3)
            ->where('status', 1)
            ->whereMonth('published_at', $month)
            ->whereYear('published_at', $year)
            ->orderBy('published_at', 'desc')
            ->paginate(5);
        return view('user.arsip_archive_list', compact('data', 'months', 'year'));
    }
    public function arsip_detail(Content $content)
    {
        return view('user.arsip_detail', compact('content'));
    }
    // News
    public function news_list()
    {
        $data = Content::where('tag_id', 1)->where('status', 1)->orderBy('published_at', 'desc')->paginate(5);
        return view('user.news_list', compact('data'));
    }
    public function news_archive_list($months, $month, $year)
    {
        $data = Content::where('tag_id', 1)
            ->where('status', 1)
            ->whereMonth('published_at', $month)
            ->whereYear('published_at', $year)
            ->orderBy('published_at', 'desc')
            ->paginate(5);
        return view('user.news_archive_list', compact('data', 'months', 'year'));
    }
    public function news_detail(Content $content)
    {
        return view('user.news_detail', compact('content'));
    }
    public function news_search(Request $request)
    {
        $rules = [
            'keyword' => 'required',
        ];
        $message = [
            'keyword.required' => 'Kolom Wajib Di isi !',
        ];
        $validate = $this->validate($request, $rules, $message);
        if ($validate) {
            $key = trim($request->keyword);

            $data = Content::query()
                ->where('tag_id', 1)
                ->where('status', 1)
                ->where('title', 'like', "%{$key}%")
                ->orWhere('description', 'like', "%{$key}%")
                ->orderBy('published_at', 'desc')
                ->paginate(5);
            $countdata = $data->count();

            return view('user.news_search_list', [
                'key' => $key,
                'data' => $data,
                'countdata' => $countdata
            ]);
        }
    }
}
