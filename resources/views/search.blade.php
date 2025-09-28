@extends('layouts.app')

@section('content')
    <!-- ฟอร์มค้นหา -->
    <div class="card p-4" style="max-width:1120px; margin:0 auto;">
        <div class="fw-bold mb-1">ค้นหาเส้นทางรถ</div>
        <small class="text-muted">เลือกจุดขึ้น–ลง และช่วงเวลา (ถ้ามี)</small>

        <form action="{{ route('search') }}" method="GET">
            <div class="row g-3 align-items-end mt-3">
                <!-- จุดเริ่มต้น -->
                <div class="col-lg-4">
                    <label class="form-label">จุดเริ่มต้น (ขึ้นรถ)</label>
                    <select class="form-select" name="origin" required>
                        <option value="">เลือก...</option>
                        @foreach ($places as $place)
                            <option value="{{ $place->place_id }}"
                                {{ isset($origin) && $origin == $place->place_id ? 'selected' : '' }}>
                                {{ $place->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- ไอคอน -->
                <div class="col-lg-1 d-flex align-items-center justify-content-center">
                    <i class="bi bi-arrow-left-right fs-4 text-muted"></i>
                </div>

                <!-- จุดปลายทาง -->
                <div class="col-lg-4">
                    <label class="form-label">จุดปลายทาง (ลงรถ)</label>
                    <select class="form-select" name="destination" required>
                        <option value="">เลือก...</option>
                        @foreach ($places as $place)
                            <option value="{{ $place->place_id }}"
                                {{ isset($destination) && $destination == $place->place_id ? 'selected' : '' }}>
                                {{ $place->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- ปุ่ม -->
                <div class="col-lg-3 d-flex flex-column gap-2">
                    <button type="submit" class="btn btn-danger">ค้นหา</button>
                    <a href="{{ route('routes.all') }}" class="btn btn-light border">แสดงเส้นทางทั้งหมด</a>
                </div>
            </div>
        </form>
    </div>

    <!-- กล่องผลลัพธ์ -->
    <div class="card border mt-4" style="max-width:1120px; margin:0 auto;">
        <div class="card-body">
            @if (isset($routes) && count($routes) > 0)
                @foreach ($routes as $route)
                    <div class="card mb-3">
                        <div class="card-header fw-bold">
                            {{ $route->name ?? 'เส้นทาง #' . $route->route_id }}
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>จุดที่</th>
                                        <th>สถานที่</th>
                                        <th>เวลา (นาที)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach ($route->routePlaces as $rp)
                                        <tr>
                                            <td>{{ $rp->sequence_no }}</td>
                                            <td>{{ $rp->place->name }}</td>
                                            <td>{{ $rp->duration_min }}</td>
                                        </tr>
                                        @php $total += (int) $rp->duration_min; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="fw-bold text-end">
                                เวลารวม {{ $total }} นาที
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center text-muted py-3">
                    เลือกจุดขึ้นรถ–ปลายทาง แล้วกด <b>ค้นหา</b> หรือกด <b>แสดงเส้นทางทั้งหมด</b>
                </div>
            @endif
        </div>
    </div>
@endsection
