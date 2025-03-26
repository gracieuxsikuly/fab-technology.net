<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur Serveur - Fab Technology</title>
    <style>
        :root {
            --error: #e74c3c;
            --dark: #2c3e50;
            --light: #ecf0f1;
        }
        
        body {
            font-family: 'Raleway', sans-serif;
            background-color: var(--dark);
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
            border-left: 5px solid var(--error);
            animation: slideIn 0.8s ease-out;
        }
        
        h1 {
            font-size: 6rem;
            margin: 0;
            color: var(--error);
            line-height: 1;
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
            background: var(--error);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid var(--light);
            color: var(--light);
        }
        
        .pulse {
            animation: pulse 2s infinite;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateX(-50px);
            }
            to { 
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="error-container">
        <div class="pulse">
            <i class="fas fa-server fa-5x"></i>
        </div>
        <h1>500</h1>
        <h2>Erreur serveur</h2>
        <p>Notre équipe technique a été notifiée et travaille à résoudre le problème.</p>
        <div>
            <a href="{{ route('home') }}" class="btn"><i class="fas fa-sync-alt"></i> Réessayer</a>
            <a href="mailto:info@fab-technology.net" class="btn btn-outline"><i class="fas fa-life-ring"></i> Support technique</a>
        </div>
    </div>
</body>
</html>