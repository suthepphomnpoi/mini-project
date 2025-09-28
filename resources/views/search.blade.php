@extends('layouts.app')

@section('content')
    <div class="card p-4" style="max-width:1120px; margin:0 auto;">
        <div class="fw-bold mb-1">ค้นหาเส้นทางรถ</div>
        <small class="text-muted">เลือกจุดขึ้น–ลง และช่วงเวลา (ถ้ามี)</small>

        <!-- ฟอร์มค้นหา -->
        <form action="{{ route('search') }}" method="GET">
            <div class="row g-3 align-items-end mt-3">
                <!-- จุดเริ่มต้น -->
                <div class="col-lg-4">
                    <label class="form-label">จุดเริ่มต้น (ขึ้นรถ)</label>
                    <select class="form-select" name="origin" required>
                        <option value="">เลือก...</option>
                        @foreach ($places as $place)
                            <option value="{{ $place->PLACE_ID }}">{{ $place->NAME }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- ไอคอนลูกศร -->
                <div class="col-lg-1 d-flex align-items-center justify-content-center">
                    <i class="bi bi-arrow-left-right fs-4 text-muted"></i>
                </div>

                <!-- จุดปลายทาง -->
                <div class="col-lg-4">
                    <label class="form-label">จุดปลายทาง (ลงรถ)</label>
                    <select class="form-select" name="destination" required>
                        <option value="">เลือก...</option>
                        @foreach ($places as $place)
                            <option value="{{ $place->PLACE_ID }}">{{ $place->NAME }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- ปุ่มค้นหา + แสดงเส้นทาง -->
                <div class="col-lg-3 d-flex flex-column gap-2">
                    <button type="submit" class="btn btn-danger">ค้นหา</button>
                    <a href="{{ route('routes.all') }}" class="btn btn-light border">แสดงเส้นทางทั้งหมด</a>
                </div>
            </div>
        </form>
    </div>

    <!-- กล่องคำแนะนำ -->
    <div class="card border mt-4" style="max-width:1120px; margin:0 auto;">
        <div class="card-body text-center text-muted">
            เลือกจุดขึ้นรถ–ปลายทาง แล้วกด <b>ค้นหา</b> หรือกด <b>แสดงเส้นทางทั้งหมด</b>
        </div>
    </div>
@endsection
