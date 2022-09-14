@foreach ($tables as $table)
    @foreach ($table->sales as $sale)
    <div style="border : dashed pink" class="mb-2 mt-2 shadow w-100" id="">
            <div class="card">
                <div class="card-body d-flex
                        flex-column justify-content-center
                        align-items-center">
                    @foreach ($sale->menus()->where("sales_id",$sale->id)->get() as $menu)
                        <h5 class="font-weight-bold mt-2">
                            {{ $menu->title }}
                        </h5>
                        <span class="text-muted">
                            {{ $menu->price }} Naira
                        </span>
                    @endforeach
                    <h5 class="font-weight-bold mt-2">
                        <span class="badge badge-danger">
                            Server: {{ $sale->servant->name }}
                        </span>
                    </h5>
                    <h5 class="font-weight-bold mt-2">
                        <span class="badge badge-light">
                            Quantity: {{ $sale->quantity }}
                        </span>
                    </h5>
                    <h5 class="font-weight-bold mt-2">
                        <span class="badge badge-light">
                            Price : {{ $sale->total_price }} Naira
                        </span>
                    </h5>
                    <h5 class="font-weight-bold mt-2">
                        <span class="badge badge-light">
                            Total : {{ $sale->total_received }} Naira
                        </span>
                    </h5>
                    <h5 class="font-weight-bold mt-2">
                        <span class="badge badge-light">
                            Change : {{ $sale->change }} Naira
                        </span>
                    </h5>
                    <h5 class="font-weight-bold mt-2">
                        <span class="badge badge-light">
                            Payment Type :
                            {{ $sale->payment_type === "Cash" ?
                                "Cash" : "Bank Transfer" }}
                        </span>
                    </h5>
                    <h5 class="font-weight-bold mt-2">
                        <span class="badge badge-light">
                            Payment Status:
                            {{ $sale->payment_status === "paid" ?
                                "Paid" : "Unpaid" }}
                        </span>
                    </h5>
                    <hr>
                    <div class="d-flex
                        flex-column justify-content-center
                        align-items-center">
                        <span class="font-weight-bold">
                            The Cashew Restaurant
                        </span>
                        <span>
                            13B, Chevron Drive, Lekki, Lagos
                        </span>
                        <span>
                            08189505050
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach

