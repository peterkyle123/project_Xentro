<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subdivisions</title>
  @vite('resources/css/app.css')
  <link rel="icon" href="{{ asset('images/palm-tree.png') }}" type="image/x-icon">
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin: 0;
      padding: 0;
      background: url('{{ asset("images/Green.jpg") }}') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    .header {
      background: none;
      color: white;
      padding: 16px;
      display: flex;
      justify-content: flex-start;
      align-items: center;
    }
    .header .home-btn {
      background-color: white;
      color: #2e7d32;
      padding: 8px 16px;
      font-size: 16px;
      font-weight: bold;
      border-radius: 8px;
      text-decoration: none;
      margin-left: 20px;
      box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
      transition: background 0.3s ease;
    }
    .header .home-btn:hover {
      background-color: #e0e0e0;
    }
    .content-wrapper {
      flex: 1;
      padding: 20px;
    }
    .option-container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      gap: 40px;
      flex-wrap: wrap;
      margin-top: 20px;
    }
    .option {
      width: 400px;
      height: 400px;
      color: white;
      border-radius: 15px;
      cursor: pointer;
      transition: 0.3s;
      text-align: center;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding-bottom: 20px;
      background-size: cover;
      background-position: center;
      text-decoration: none;
      overflow: hidden;
      position: relative;
    }
    .option:hover {
      transform: scale(1.05);
    }
    .option-text {
      padding: 20px;
      font-size: 24px;
      font-weight: bold;
      background: rgba(0, 0, 0, 0.6);
    }
    .description-text {
      padding: 20px;
      font-size: 16px;
      background: rgba(0, 0, 0, 0.6);
      text-align: left;
    }
  </style>
</head>
<body>
    <header class="header">
        </header>
    <div class="content-wrapper">
        <h1 class="text-2xl font-bold mb-4">Subdivisions</h1>
        <div class="option-container">
            @foreach ($subdivisions as $subdivision)
                <a href="{{ route('sub_queries.create', ['subdivision_id' => $subdivision->id]) }}" class="option" style="background-image: url('{{ asset('storage/' . $subdivision->image) }}');">
                    <div class="option-text">{{ $subdivision->sub_name }}</div>
                    <div class="description-text">
                        <p><strong>Blocks:</strong> {{ $subdivision->block_number }}</p>
                        <p><strong>Houses:</strong> {{ $subdivision->house_number }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</body>
</html>
