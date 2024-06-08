@if(count($product_ids) > 0)
<div class="container mt-4">
    <table class="table table-bordered aiz-table">
        <thead class="">
            <tr>
                <th width="40%">
                    <span>{{ translate('Product') }}</span>
                </th>
                <th width="20%">
                    <span>{{ translate('Quantity') }}</span>
                </th>
                <th width="20%">
                    <span>{{ translate('Base Price') }}</span>
                </th>
                <th width="20%">
                    <span>{{ translate('Price for Group Product') }}</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product_ids as $key => $id)
                @php
                    $product = \App\Models\Product::findOrFail($id);
                @endphp
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="mr-3">
                                <img class="img-thumbnail" src="{{ uploaded_asset($product->thumbnail_img) }}" alt="{{ $product->getTranslation('name') }}" style="width: 60px; height: 60px;">
                            </div>
                            <div>
                                <span>{{ $product->getTranslation('name') }}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input type="number" placeholder="{{ translate('Quantity') }}" name="quantity[{{ $id }}]" class="form-control quantity" data-id="{{ $id }}" required>
                    </td>
                    <td>
                        <span>{{ number_format($product->unit_price, 2) }}</span>
                    </td>
                    <td>
                        <input type="number" placeholder="{{ translate('Price') }}" name="price[{{ $id }}]" class="form-control price" data-id="{{ $id }}" required>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
