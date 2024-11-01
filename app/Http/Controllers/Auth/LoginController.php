use Illuminate\Support\Facades\Auth;

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Login berhasil, arahkan ke dashboard
        return redirect()->route('dashboard');
    }

    // Jika login gagal, kembali ke halaman login dengan pesan error
    return redirect()->back()->withErrors([
        'email' => 'Email atau password tidak cocok.',
    ]);
}
