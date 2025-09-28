<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Reservation System</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Bus Reservation</a>
            <div class="ms-auto d-flex align-items-center gap-3">
                @php($user = Auth::guard('web')->user())
                @if($user)
                    <span>สวัสดี, {{ $user->first_name ?? $user->email }}</span>
                    <form action="{{ route('auth.users.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-box-arrow-right"></i> ออกจากระบบ
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </nav>

    <nav class="bg-light mt-1" aria-label="breadcrumb">
        <div class="container py-2 d-flex align-items-center gap-2">
            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="history.back()">←</button>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('scan') }}">โฮม</a></li>
                <li class="breadcrumb-item active" aria-current="page">รายละเอียดงาน</li>
            </ol>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center mt-4 mb-3 text-muted">
        © 2025 Bus Reservation System
    </footer>

        <!-- Modal สำหรับแสดงรายชื่อผู้โดยสารที่ขึ้นแล้ว -->
<div id="successModal" class="custom-modal" style="display: none;">
    <div class="custom-modal-content">
        <h4 class="fw-bold mb-4">ขึ้นแล้ว</h4>
        <ul class="passenger-list mb-4">
            <li>นาย ก ขึ้นแล้ว</li>
            <li>นาย ข ขึ้นแล้ว</li>
            <li>นาย ค ขึ้นแล้ว</li>
            <li>นาย ง ขึ้นแล้ว</li>
            <li>นาย จ ขึ้นแล้ว</li>
        </ul>
        <button class="btn btn-danger px-4" onclick="closeSuccessModal()">ปิด</button>
    </div>
</div>

        <!-- Modal สำหรับแสดงรายชื่อผู้โดยสารที่ยังไม่ขึ้น -->
<div id="dangerModal" class="custom-modal" style="display: none;">
    <div class="custom-modal-content">
        <h4 class="fw-bold mb-4">ยังไม่ขึ้น</h4>
        <ul class="passenger-list mb-4">
            <li>นาย ฉ ยังไม่ขึ้น</li>
            <li>นาย ช ยังไม่ขึ้น</li>
            <li>นาย ซ ยังไม่ขึ้น</li>
        </ul>
        <button class="btn btn-danger px-4" onclick="closeDangerModal()">ปิด</button>
    </div>
</div>

    <script>
    // status box success ขึ้นแล้ว
    // เปิด modal
    function openSuccessModal() {
        document.getElementById('successModal').style.display = 'flex';
    }
    // ปิด modal
    function closeSuccessModal() {
        document.getElementById('successModal').style.display = 'none';
    }
    // เพิ่ม event ให้ status box success
    document.addEventListener('DOMContentLoaded', function() {
        var box = document.querySelector('.status-box.success');
        if(box) {
            box.addEventListener('click', openSuccessModal);
        }
    });


    //status box danger ยังไม่ขึ้น
        // เปิด modal danger
    function openDangerModal() {
        document.getElementById('dangerModal').style.display = 'flex';
    }

    // ปิด modal danger
    function closeDangerModal() {
        document.getElementById('dangerModal').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        // กล่อง status success (ขึ้นแล้ว)
        var successBox = document.querySelector('.status-box.success');
        if(successBox) {
            successBox.addEventListener('click', openSuccessModal);
        }

        // กล่อง status danger (ยังไม่ขึ้น)
        var dangerBox = document.querySelector('.status-box.danger');
        if(dangerBox) {
            dangerBox.addEventListener('click', openDangerModal);
        }
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
