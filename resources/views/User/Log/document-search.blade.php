<div class="card">
    <div class="card-body">
        <div class="table-responsive" style="height: 460px;">
            @foreach ($transactions as $transaction)
                <div class="d-flex mb-5">
                    <div style="border-right: 1px solid black"><span class="mr-2">{{ Illuminate\Support\Carbon::parse($transaction->updated_at)->format('F d, Y | h:ia') }}</span></div>
                    <span class="fw-bold ml-2">•</span>
                    <div class="ml-1">
                        <span>{{ $transaction->title }}</span><br>
                        <span>{{ $transaction->short_description }}</span><br>
                        <span>To: {{ $transaction->department }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>