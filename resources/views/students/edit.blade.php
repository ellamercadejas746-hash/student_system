<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* 🌸 Pastel animated background */
        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #ffd1dc, #ffe4ec, #c2e9fb, #e0c3fc);
            background-size: 400% 400%;
            animation: pastelBG 18s ease infinite;
        }

        @keyframes pastelBG {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        /* ✨ Fade in */
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(15px);}
            to {opacity: 1; transform: translateY(0);}
        }

        /* 💖 Glass card */
        .card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255,255,255,0.4);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        /* 🌸 Title */
        h2 {
            text-align: center;
            font-weight: 800;
            color: #ffffff;
            text-shadow: 0 2px 10px rgba(0,0,0,0.15);
            margin-bottom: 20px;
        }

        /* 🌷 Labels */
        label {
            font-weight: 600;
            color: #d63384;
        }

        /* 💕 Inputs */
        .form-control {
            border-radius: 15px;
            border: none;
            padding: 12px;
            transition: 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 12px rgba(255, 182, 193, 0.8);
            transform: scale(1.02);
        }

        /* 🔘 Buttons */
        .btn {
            border-radius: 15px;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .btn-primary {
            background: linear-gradient(45deg, #ff9a9e, #fad0c4);
            border: none;
        }

        .btn-secondary {
            background: linear-gradient(45deg, #c2e9fb, #a1c4fd);
            border: none;
            color: #333;
        }

        /* 📦 Container */
        .container {
            max-width: 600px;
        }

        /* 🧁 Header spacing */
        .top-text {
            text-align: center;
            color: rgba(255,255,255,0.9);
            margin-bottom: 15px;
        }
    </style>
</head>

<body class="container py-5">

<div class="fade-in">

    <!-- HEADER -->
    <h2> Edit Student Record</h2>
    <p class="top-text">Update student information </p>

    <!-- FORM CARD -->
    <div class="card p-4">

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label> Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ $student->name }}" required>
            </div>

            <div class="mb-3">
                <label> Course</label>
                <input type="text" name="course" class="form-control"
                       value="{{ $student->course }}" required>
            </div>

            <div class="mb-3">
                <label> Year Level</label>
                <input type="number" name="year_level" class="form-control"
                       value="{{ $student->year_level }}" required>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary w-100">
                     Update
                </button>

                <a href="{{ route('students.index') }}" class="btn btn-secondary w-100">
                    Cancel
                </a>
            </div>

        </form>

    </div>

</div>

</body>
</html>