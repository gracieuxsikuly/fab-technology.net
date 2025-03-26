<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Introuvable - Fab Technology</title>
    <style>
        :root {
            --primary: #4e54c8;
            --secondary: #8f94fb;
            --dark: #1a1a2e;
            --light: #f8f9fa;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        
        .error-container {
            max-width: 800px;
            padding: 2rem;
            animation: fadeIn 1s ease-out;
        }
        
        h1 {
            font-size: 6rem;
            margin: 0;
            line-height: 1;
            text-shadow: 3px 3px 0 rgba(0,0,0,0.1);
        }
        
        h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }
        
        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: white;
            color: var(--primary);
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid white;
            color: white;
        }
        
        .error-animation {
            font-size: 8rem;
            margin-bottom: 1rem;
            display: inline-block;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="error-container">
        <div class="error-animation">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h1>404</h1>
        <h2>Oups ! Page introuvable</h2>
        <p>La page que vous cherchez a peut-être été déplacée ou n'existe plus.</p>
        <div>
            <a href="{{ route('home', ) }}" class="btn"><i class="fas fa-home"></i> Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>