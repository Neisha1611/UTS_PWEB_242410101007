<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen grid md:grid-cols-2">

    <div class="hidden md:flex bg-[#3d2b1f] text-white flex-col justify-between p-16 relative overflow-hidden">

        <div>
            <h1 class="text-3xl font-light tracking-widest">Lumière</h1>
            <p class="text-xs tracking-[0.3em] opacity-60">Fashion Studio</p>
        </div>

        <div>
            <h2 class="text-5xl font-light leading-tight">
                Where Style<br>
                <span class="italic text-yellow-500">Meets Soul.</span>
            </h2>

            <p class="mt-4 text-sm opacity-60 max-w-sm">
                Manage your fashion collections and track your trends.
            </p>
        </div>

        <p class="text-xs opacity-40 italic">
            "Fashion is the armor to survive everyday life."
        </p>
    </div>

    <div class="flex items-center justify-center bg-gray-50 p-6">

        <div class="w-full max-w-sm">

            <h2 class="text-2xl font-semibold mb-2">Sign In</h2>
            <p class="text-sm text-gray-400 mb-6">Masuk ke dashboard kamu</p>

            @if(session('error'))
                <div class="mb-4 text-sm text-red-600 bg-red-100 p-2 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('sukses'))
                <div class="mb-4 text-sm text-green-600 bg-green-100 p-2 rounded">
                    {{ session('sukses') }}
                </div>
            @endif

            <form action="/login/proses" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm mb-1">Username</label>
                    <input type="text" name="username"
                        value="{{ old('username') }}"
                        class="w-full border p-2 rounded"
                        placeholder="Masukkan username">
                </div>

                <div class="mb-6">
                    <label class="block text-sm mb-1">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="pwd"
                            class="w-full border p-2 rounded pr-10"
                            placeholder="Masukkan password">

                        <button type="button" onclick="togglePwd()"
                            class="absolute right-2 top-2 text-gray-400">
                            👁
                        </button>
                    </div>
                </div>

                <button class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                    Login
                </button>

            </form>
        </div>
    </div>

<script>
function togglePwd() {
    const input = document.getElementById('pwd');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>

</body>
</html>