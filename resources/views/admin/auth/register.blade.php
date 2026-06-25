<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - Foundida</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        navy: '#0B1F3A',
                        gold: '#D4A843',
                        light: '#F8FAFC',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-tr from-[#06101d] via-navy to-[#1a365d] min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <!-- Logo/Branding -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gold/10 rounded-2xl border border-gold/30 text-gold mb-4 shadow-lg shadow-gold/5">
                <i class="fas fa-user-shield text-3xl"></i>
            </div>
            <h1 class="text-3xl font-extrabold font-serif text-white tracking-wide">Register<span class="text-gold">Admin</span></h1>
            <p class="text-gray-400 mt-2 text-sm">Create a new Administrator account for Foundida</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white/5 backdrop-blur-xl rounded-3xl p-8 border border-white/10 shadow-2xl relative overflow-hidden group">
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-gold via-[#e9c164] to-gold"></div>

            <form action="{{ route('admin.register.submit') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Display Errors -->
                @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/30 text-red-200 text-sm p-4 rounded-xl flex items-start gap-3">
                        <i class="fas fa-circle-exclamation mt-0.5 text-red-400"></i>
                        <div>
                            <p class="font-bold">Registration Failed</p>
                            <ul class="list-disc list-inside mt-1 text-xs text-red-300/90 space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-xs font-bold text-gray-300 uppercase tracking-wider mb-2">Full Name</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="w-full bg-white/5 border border-white/10 rounded-xl py-3 pl-10 pr-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm"
                            placeholder="John Doe">
                    </div>
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-bold text-gray-300 uppercase tracking-wider mb-2">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl py-3 pl-10 pr-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm"
                            placeholder="name@example.com">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-bold text-gray-300 uppercase tracking-wider mb-2">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" type="password" name="password" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl py-3 pl-10 pr-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-gray-300 uppercase tracking-wider mb-2">Confirm Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-circle-check"></i>
                        </span>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl py-3 pl-10 pr-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-gold to-[#bfa03b] hover:from-[#e2b54d] hover:to-[#a88d30] text-navy font-bold py-3.5 px-4 rounded-xl transition-all shadow-lg shadow-gold/10 hover:shadow-gold/20 flex items-center justify-center gap-2 text-sm uppercase tracking-wider mt-2">
                    <span>Create Admin Account</span>
                    <i class="fas fa-user-plus text-xs"></i>
                </button>
            </form>
        </div>

        <!-- Extra links -->
        <p class="text-center mt-6 text-sm text-gray-400">
            Already have an admin account? 
            <a href="{{ route('admin.login') }}" class="text-gold font-semibold hover:underline">Sign In</a>
        </p>
    </div>

</body>
</html>
