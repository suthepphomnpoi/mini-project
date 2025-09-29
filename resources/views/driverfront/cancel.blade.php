
@extends('layouts.vehicle')


    

@section('content')
    <div class="row g-3">
            <!-- กล่องรายละเอียดงาน -->
            <div class="col-md-6">
                <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-danger px-3 py-2">สาย 1</span>
                        <button class="btn btn-outline-primary btn-sm">สแกน QR Code</button>
                    </div>
                    <h5 class="fw-bold">
                        เวลาออกรถ <span class="text-dark">9:30 น.</span>
                    </h5>
                    <hr />
                    <div>
                        <p class="mb-1">เส้นทาง</p>
                        <p class="mb-0"><strong>จาก :</strong> มหาวิทยาลัยเทคโนโลยีมหานคร</p>
                        <p class="mb-0">⬇</p>
                        <p class="mb-0"><strong>ถึง :</strong> มหาวิทยาลัยเทคโนโลยีมหานคร</p>
                        <p class="mb-0">รถทะเบียน : <strong>สย 2591</strong></p>
                        <p class="mb-0">ผู้โดยสาร : <strong>9 คน</strong></p>
                    </div>
                    <div class="arrow-group">
                        <a href="{{ route('success') }}" button class="arrow-btn left-btn">
                            <span class="arrow left"></span>
                        </a></button>

                        <a href="{{ route('scan') }}" button class="btn btn-danger px-5 py-2">
                            ยกเลิก
                        </a></button>

                        <a href="{{ route('success') }}" button class="arrow-btn right-btn">
                            <span class="arrow right"></span>
                        </a></button>
                    </div>
                    
                </div>
            </div>

            <!-- กล่องเส้นทาง -->
            <div class="col-md-6 d-flex">
                <div class="card p-3 h-100 w-100">
                    <ul class="timeline">
                        <li class="active">
                            <span class="dot"></span>
                            <span class="fw-bold">มหาวิทยาลัยเทคโนโลยีมหานคร</span>
                        </li>
                        <li><span class="dot"></span> โลตัสหนองจอก</li>
                        <li><span class="dot"></span> โรงพยาบาลหนองจอก</li>
                        <li><span class="dot"></span> Big C หนองจอก</li>
                        <li><span class="dot"></span> โรงพยาบาลหนองจอก</li>
                        <li><span class="dot"></span> โลตัสหนองจอก</li>
                        <li class="active">
                            <span class="dot"></span>
                            <span class="fw-bold">มหาวิทยาลัยเทคโนโลยีมหานคร</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- กล่องสถานะผู้โดยสาร -->
        <div class="card mt-3 p-3">
            <h6 class="fw-bold">ผู้โดยสารทั้งหมด 9 คน</h6>
            <div class="row text-center mt-2">
                <div class="col-md-4">
                    <div class="status-box success">
                        <div class="fw-bold">ขึ้นแล้ว</div>
                        <div class="fw-bold fs-1">5</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="status-box danger">
                        <div class="fw-bold">ยังไม่ขึ้น</div>
                        <div class="fw-bold fs-1">3</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="status-box neutral">
                        <div class="fw-bold">ว่าง</div>
                        <div class="fw-bold fs-1">1</div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <style scoped>
/* Card */
.card {
    border: 1px solid #ddd;
    border-radius: 8px;
    background: #fff;
    height: 100%;
}

/* Timeline */
.timeline {
    list-style: none;
    padding-left: 0;
    margin: 0;
    position: relative;
}

.timeline::before {
    content: "";
    position: absolute;
    left: 6px;
    
    width: 2px;
    top: 10px;
    bottom: 10px;
    background: #ccc;
}

.timeline li {
    position: relative;
    padding-left: 30px;
    margin-bottom: 20px;
    color: #666;
    font-size: 17px;
}

.timeline li .dot {
    position: absolute;
    left: -2px;
    top: 2px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #ccc;
    z-index: 1;
}

.timeline li.active .dot {
    left: -3px;
    width: 20px;
    height: 20px;
    background: #28a745;
}

.timeline li.active span.fw-bold {
    color: #000;
}

/* Status Box */
.status-box {
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 300px;
    padding: 50px;
    margin: 20px auto;
    cursor: pointer;
    transition: all 0.2s ease;
}

.status-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.status-box.success {
    border-color: #28a745;
    color: #28a745;
}

.status-box.danger {
    border-color: #dc3545;
    color: #dc3545;
}

.status-box.neutral {
    border-color: #555;
    color: #555;
}

/* Arrow Buttons */
.arrow-group {
    display: flex;
    justify-content: center;
    align-items: center;
}

.arrow-btn {
    width: 50px;
    height: 45px;
    border: 1px solid #000;
    background: #fff;
    border-radius: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
}

.arrow {
    display: inline-block;
    width: 12px;
    height: 12px;
    border-top: 2px solid #000;
    border-right: 2px solid #000;
}

.arrow.left {
    transform: rotate(-135deg);
}

.arrow.right {
    transform: rotate(45deg);
}

.left-btn {
    margin-right: 60px;
}

.right-btn {
    margin-left: 60px;
}

/* Custom Modal */
.custom-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1050;
}

.custom-modal-content {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    width: 400px;
    max-height: 80vh;
    overflow-y: auto;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.report-content {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.passenger-list {
    list-style: none;
    padding: 0;
    text-align: left;
}

.passenger-list li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}

.passenger-list li:last-child {
    border-bottom: none;
}

/* QR Scanner Backdrop */
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

.modal-content {
    border-radius: 12px;
}
</style>

@endsection