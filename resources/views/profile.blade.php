<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WLTugas2</title>
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #FEC5BB, #FFEDD5);
        }

        .navbar {
            position: absolute;
            top: 0;
            width: 100%;
            background-color: transparent;
            padding: 20px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            color: #D6708E;
        }

        .profile-container {
            text-align: center;
            background-color: #FFE4E1;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            transition: transform 0.3s ease;
        }

        .profile-container:hover {
            transform: translateY(-10px);
        }

        .profile-container img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 5px solid #D6708E;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease;
        }

        .profile-container img:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .profile-container .info {
            margin: 10px 0;
            font-size: 18px;
            color: #555;
            font-weight: 600;
        }

        .profile-container .info .name {
            font-size: 24px;
            font-family: 'Montserrat', sans-serif;
            color: #D6708E;
        }

        .profile-container .info strong {
            color: #D6708E;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <!-- Ensure proper path to the image using Blade syntax -->
        <img src="{{ asset('upload/img/' . $user->foto) }}" alt="foto-profile">
        <div class="info">
            <strong>Nama:</strong> {{ $user->nama }}
        </div>
        <div class="info">
            <strong>Kelas:</strong> {{ $user->nama_kelas }}
        </div>
        <div class="info">
            <strong>NPM:</strong> {{ $user->npm }}
        </div>
    </div>
</body>

</html>
