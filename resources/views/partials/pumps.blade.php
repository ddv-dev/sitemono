{{-- resources/views/partials/pumps.blade.php --}}

@if(isset($pumps) && $pumps->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th style="width: 50px;">#</th>
                    <th>Тип</th>
                    <th style="width: 130px;">Длина стрелы</th>
                    <th style="width: 180px;">Смена (7+1 ч)</th>
                    <th>Где применяется</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pumps as $index => $pump)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $pump['type'] }}</strong></td>
                        <td>
                            <span class="badge bg-primary">{{ $pump['boom_length'] }} м</span>
                        </td>
                        <td class="fw-bold text-success">
                            {{ $pump['formatted_price'] }}
                        </td>
                        <td class="text-start">
                            <small>{{ $pump['application'] }}</small>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-truck" style="font-size: 2rem;"></i>
                                <p class="mt-2">Информация о автобетононасосах временно не доступна</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <p class="text-muted">
                <i class="bi bi-info-circle"></i> 
                Всего моделей: <strong>{{ $pumps->count() }}</strong>
            </p>
        </div>
        <div class="col-md-6 text-md-end">
            <span class="badge bg-success">Актуально на {{ date('d.m.Y') }}</span>
        </div>
    </div>
@else
    <div class="alert alert-info text-center py-4">
        <i class="bi bi-truck" style="font-size: 2rem;"></i>
        <p class="mt-2 mb-0">Данные о автобетононасосах временно не доступны</p>
    </div>
@endif