<table>
    <thead>
    </thead>
    <tbody>
        <tr>    
            <td>
                @php
                  $createdBy = \App\User::find($quotation->created_by);    
                @endphp
                {{ $createdBy->firstName }}</td>
        </tr>
        <tr>
            <td>{{ $customer->name }}</td>
        </tr>
        <tr>
            <td>{{ $customer->address }}</td>
        </tr> 
        <tr>
            <td>{{ $customer->contact_number }}</td>
        </tr> 
        <tr>
            <td>{{ $customer->email }}</td>
        </tr> 
        <tr>
            <td>{{ $quotationDetails->discount_rate }}</td>
        </tr>
        <tr>
            <td>{{ $quotation->id }}</td>
        </tr> 
    </tbody>
</table>
<table>
    <thead>
    </thead>
    <tbody>
    @foreach($quotationRecords as $quotationRecord)
        <tr>
            <td>{{ $quotationRecord->area }}</td>
            @php
                $productCategory = \App\ProductCategory\ProductCategory::find( $quotationRecord->product_category_id);
            @endphp
            <td>{{ $productCategory->name }}</td>
            <td>{{ $quotationRecord->product_id }}</td>
            @php
               $product = \App\Product\Product::find($quotationRecord->product_id); 
            @endphp
            <td>
               @php
                $watt = \App\ProductCategory\Watt::find($product->watt_id);    
               @endphp
                {{ $watt->watt }}
            </td>
            <td>
                @php
                 $voltage = \App\ProductCategory\Voltage::find($product->voltage_id);    
                @endphp
                {{ $voltage->voltage }}
            </td>
            <td>
                @php
                 $diffuser = \App\ProductCategory\Diffuser::find($product->diffuser_id);    
                @endphp
                {{ $diffuser->diffuserType }}
            </td>
            <td>
                @php
                 $cct = \App\ProductCategory\CCT::find($quotationRecord->cct_id);    
                @endphp
                 {{$cct->cct}}
            </td>
            <td>
                @php
                 $fittingColor = \App\ProductCategory\FittingColor::find($product->fitting_color_id);    
                @endphp
                {{ $fittingColor->fittingColor }}
            </td>
            <td>{{ $product->is_water_proofed }}</td>
            <td>{{ $quotationRecord->price }}</td>
            <td>{{ $quotationRecord->quantity }}</td>
        </tr>
    @endforeach
    </tbody>
</table>