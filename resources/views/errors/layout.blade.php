<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Foundida</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800;900&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8F9FA; color: #1A1A2E; margin: 0; padding: 0; display: flex; flex-direction: column; min-height: 100vh; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .bg-navy { background-color: #0B1F3A; }
        .text-navy { color: #0B1F3A; }
        .text-gold { color: #D4A843; }
        .bg-gold { background-color: #D4A843; }
        
        .error-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        /* Background abstract circles */
        .bg-shape-1 { position: absolute; top: -10%; left: -5%; width: 400px; height: 400px; border-radius: 50%; background: radial-gradient(circle, rgba(212,168,67,0.1) 0%, rgba(212,168,67,0) 70%); z-index: 0; }
        .bg-shape-2 { position: absolute; bottom: -10%; right: -5%; width: 500px; height: 500px; border-radius: 50%; background: radial-gradient(circle, rgba(11,31,58,0.05) 0%, rgba(11,31,58,0) 70%); z-index: 0; }

        .error-content {
            width: 100%;
            max-w: 640px;
            background: white;
            padding: 4rem 3rem;
            border-radius: 32px;
            box-shadow: 0 20px 60px -15px rgba(11, 31, 58, 0.08);
            position: relative;
            z-index: 1;
            border: 1px solid rgba(0,0,0,0.03);
        }
        .icon-box {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #FFF3D6 0%, #FDE9A0 100%);
            color: #B8892E;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin: 0 auto 1.5rem;
            position: relative;
            z-index: 1;
            box-shadow: 0 10px 25px -5px rgba(212, 168, 67, 0.3);
        }
        .error-code {
            font-size: 5.5rem;
            font-weight: 900;
            line-height: 1;
            color: #D4A843;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
            letter-spacing: -2px;
        }
        .error-title {
            font-size: 2rem;
            font-weight: 800;
            color: #0B1F3A;
            margin-bottom: 1.25rem;
            position: relative;
            z-index: 1;
            line-height: 1.2;
        }
        .error-message {
            font-size: 1.125rem;
            color: #64748B;
            margin-bottom: 3rem;
            line-height: 1.6;
            position: relative;
            z-index: 1;
            max-w: 480px;
            margin-left: auto;
            margin-right: auto;
        }
        .button-group {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            position: relative;
            z-index: 1;
        }
        .btn-home {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background-color: #0B1F3A;
            color: white;
            font-weight: 700;
            padding: 1rem 2rem;
            border-radius: 14px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        .btn-home:hover {
            background-color: #1a2b5e;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px -5px rgba(11, 31, 58, 0.3);
        }
        .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background-color: white;
            color: #0B1F3A;
            font-weight: 700;
            padding: 1rem 2rem;
            border-radius: 14px;
            text-decoration: none;
            border: 2px solid #E2E0D8;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        .btn-outline:hover {
            border-color: #0B1F3A;
            background-color: #f8fafc;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.05);
        }
        .header {
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: center;
            background: white;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            position: relative;
            z-index: 10;
        }
        .header img {
            height: 36px;
        }
        @media (max-width: 640px) {
            .error-code { font-size: 4.5rem; }
            .error-title { font-size: 1.75rem; }
            .button-group { flex-direction: column; width: 100%; gap: 0.75rem; }
            .btn-home, .btn-outline { width: 100%; box-sizing: border-box; }
            .error-content { padding: 3rem 1.5rem; border-radius: 24px; }
            .icon-box { width: 64px; height: 64px; font-size: 1.5rem; margin-bottom: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="/">
            <img src="{{ asset('logo.png') }}" alt="Foundida Logo" onerror="this.style.display='none'">
        </a>
    </div>

    <div class="error-container">
        <div class="bg-shape-1"></div>
        <div class="bg-shape-2"></div>
        
        <div class="error-content">
            <div class="icon-box">
                @hasSection('icon')
                    @yield('icon')
                @else
                    <i class="fas fa-exclamation-triangle"></i>
                @endif
            </div>

            <div class="error-code font-serif">@yield('code')</div>
            <h1 class="error-title font-serif">@yield('title')</h1>
            <p class="error-message">@yield('message')</p>
            
            <div class="button-group">
                <a href="/" class="btn-home">
                    <i class="fas fa-arrow-left"></i> Back to Homepage
                </a>
                <a href="/contact" class="btn-outline">
                    <i class="fas fa-headset"></i> Support
                </a>
            </div>
        </div>
    </div>
</body>
</html>
