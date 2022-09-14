<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Menus</th>
            <th>Tables</th>
            <th>Server</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Payment Type</th>
            <th>Payment Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
                <td>
                    {{ $sale->id }}
                </td>
                <td>
                    @foreach($sale->menus()->where("sales_id",$sale->id)->get() as $menu)
                        <h5>
                            {{ $menu->title }}
                        </h5>
                        <h5>
                            {{ $menu->price }} DH
                        </h5>
                    @endforeach
                </td>
                <td>
                    @foreach($sale->tables()->where("sales_id",$sale->id)->get() as $table)
                        <h5>
                            {{ $table->name }}
                        </h5>
                    @endforeach
                </td>
                <td>
                    {{ $sale->servant->name}}
                </td>
                <td>
                    {{ $sale->quantity}}
                </td>
                <td>
                    {{ $sale->total_received}}
                </td>
                <td>
                    {{ $sale->payment_type === "cash" ? "cash" : "bank transfer"}}
                </td>
                <td>
                    {{ $sale->payment_status === "paid" ? "paid" : "unpaid"}}
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5">
                Report of {{ $from }} à {{ $to }}
            </td>
            <td>
                {{ $total }} Naira
            </td>
        </tr>
    </tbody>
</table>
