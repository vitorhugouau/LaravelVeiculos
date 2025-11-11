<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registro - AutoVendas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #dc2626;
            --primary-dark: #b91c1c;
            --primary-light: #ef4444;
            --secondary: #991b1b;
            --accent: #dc2626;
            --danger: #dc2626;
            --success: #10b981;

            /* White Theme Colors */
            --bg-darker: #ffffff;
            --bg-dark: #f9fafb;
            --bg-card: #ffffff;
            --bg-elevated: #f3f4f6;
            --bg-hover: #e5e7eb;

            --text-primary: #1f2937;
            --text-secondary: #4b5563;
            --text-muted: #6b7280;

            --border-subtle: #e5e7eb;
            --border-medium: #d1d5db;

            --shadow-sm: rgba(220, 38, 38, 0.1);
            --shadow-md: rgba(220, 38, 38, 0.2);
            --shadow-lg: rgba(220, 38, 38, 0.3);

            --glow-primary: rgba(220, 38, 38, 0.4);
            --glow-accent: rgba(220, 38, 38, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-darker);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 20px;
        }

        body::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(220, 38, 38, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(220, 38, 38, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
        }

        .auth-container-2 {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        .auth-card {
            background: var(--bg-card);
            border: 2px solid var(--primary);
            border-radius: 20px;
            padding: 36px 32px;
            box-shadow: 0 15px 45px var(--shadow-lg), 0 0 0 1px rgba(220, 38, 38, 0.1);
            position: relative;
            overflow: hidden;
            transform: scale(1);
            transition: transform 0.2s ease;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%);
            box-shadow: 0 0 20px var(--glow-primary);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .auth-logo {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            box-shadow: 0 8px 24px var(--glow-primary);
            border: 3px solid rgba(255, 255, 255, 0.2);
        }

        .auth-logo i {
            font-size: 2.2rem;
            color: #ffffff;
        }

        .auth-title {
            font-size: 1.75rem;
            font-weight: 900;
            color: var(--text-primary);
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .auth-subtitle {
            font-size: 0.9rem;
            color: var(--text-secondary);
            font-weight: 400;
        }

        .auth-form {
            margin-top: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: var(--primary);
            font-size: 1rem;
        }

        .form-input {
            width: 100%;
            padding: 14px 18px;
            background: var(--bg-elevated);
            border: 2px solid var(--border-medium);
            border-radius: 12px;
            color: var(--text-primary);
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--glow-primary);
            background: #ffffff;
        }

        .form-input.error {
            border-color: var(--danger);
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.2);
        }

        .form-input::placeholder {
            color: var(--text-muted);
        }

        .form-error {
            margin-top: 8px;
            color: var(--danger);
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-hint {
            display: block;
            margin-top: 8px;
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .btn-submit {
            width: 100%;
            padding: 14px 24px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 20px var(--glow-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 28px var(--glow-primary);
        }

        .auth-links {
            margin-top: 24px;
            padding-top: 24px;
            border-top: 2px solid var(--border-subtle);
        }

        .auth-link {
            text-align: center;
        }

        .auth-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .auth-link a:hover {
            color: var(--primary-light);
            gap: 10px;
        }

        .auth-divider {
            text-align: center;
            margin: 18px 0;
            color: var(--text-muted);
            font-size: 0.875rem;
            position: relative;
        }

        .auth-divider::before,
        .auth-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: var(--border-subtle);
        }

        .auth-divider::before {
            left: 0;
        }

        .auth-divider::after {
            right: 0;
        }

        .back-link {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 10;
        }

        .back-link a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 10px 16px;
            background: var(--bg-card);
            border: 2px solid var(--primary);
            border-radius: 10px;
            transition: all 0.3s;
        }

        .back-link a:hover {
            color: #ffffff;
            background: var(--primary);
            border-color: var(--primary-dark);
            transform: translateX(-4px);
            box-shadow: 0 4px 12px var(--glow-primary);
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
                align-items: flex-start;
                padding-top: 20px;
            }

            .auth-card {
                padding: 28px 24px;
            }

            .auth-title {
                font-size: 1.5rem;
            }

            .auth-logo {
                width: 60px;
                height: 60px;
                margin-bottom: 16px;
            }

            .auth-logo i {
                font-size: 2rem;
            }

            .auth-header {
                margin-bottom: 24px;
            }

            .form-group {
                margin-bottom: 18px;
            }

            .back-link {
                position: relative;
                top: 0;
                left: 0;
                margin-bottom: 15px;
                text-align: center;
            }

            .back-link a {
                display: inline-flex;
            }
        }
    </style>
</head>

<body>
    <div class="back-link">
        <a href="{{ route('vehicles.index') }}">
            <i class="fas fa-arrow-left"></i> Voltar ao site
        </a>
    </div>

    <div class="auth-container-2">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-logo">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h1 class="auth-title">Criar Conta</h1>
                <p class="auth-subtitle">Crie sua conta e comece a usar</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i> Nome Completo
                    </label>
                    <input id="name"
                        type="text"
                        class="form-input @error('name') error @enderror"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autocomplete="name"
                        autofocus
                        placeholder="Seu nome completo">

                    @error('name')
                    <div class="form-error">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input id="email"
                        type="email"
                        class="form-input @error('email') error @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="seu@email.com">

                    @error('email')
                    <div class="form-error">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i> Senha
                    </label>
                    <input id="password"
                        type="password"
                        class="form-input @error('password') error @enderror"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Mínimo 8 caracteres">

                    @error('password')
                    <div class="form-error">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </div>
                    @enderror
                    <small class="form-hint">
                        A senha deve ter no mínimo 8 caracteres
                    </small>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="form-label">
                        <i class="fas fa-lock"></i> Confirmar Senha
                    </label>
                    <input id="password-confirm"
                        type="password"
                        class="form-input"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirme sua senha">
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-user-plus"></i> Criar Conta
                </button>

                <div class="auth-links">
                    <!-- <div class="auth-divider">ou</div> -->

                    <div class="auth-link">
                        <span style="color: var(--text-muted);">Já tem uma conta? </span>
                        <a href="{{ route('login') }}">
                            Fazer login <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
