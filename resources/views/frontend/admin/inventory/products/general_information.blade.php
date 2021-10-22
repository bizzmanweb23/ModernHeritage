<div style="padding-top: 1.5rem;">
    <div class="row mb-2">
        <div class="col-md-6">
            <span class="mb-2 ">Product Type:
                <select name="product_type" id="product_type" class="form-control" required>
                    <option value="">select</option>
                </select>
            </span>
        </div>
        <div class="col-md-6">
            <span class="mb-2 ">Sales Price:
                <input type="number" name="sales_price" id="sales_price" value="" placeholder="₹" class="form-control"
                    required />
            </span>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <span class="mb-2 ">Product Category:
                <select name="product_category" id="product_category" class="form-control" required>
                    @foreach($product_categories as $pc)
                        <option value="{{ $pc->id }}">{{ $pc->category_name }}</option>
                    @endforeach
                </select>
            </span>
        </div>
        <div class="col-md-6">
            <span class="mb-2">Customer Taxes:
                <select name="customer_taxes" id="customer_taxes" class="form-control" multiple="multiple">
                    @foreach($tax as $t)
                        <option value="{{ $t }}">{{ $t->tax_name }}</option>
                    @endforeach
                </select>
            </span>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <span class="mb-2 ">Internal Reference:
                <input type="text" name="internal_reference" id="internal_reference" class="form-control">
            </span>
        </div>
        <div class="col-md-6">
            <span class="mb-2 ">Cost:
                <input type="number" name="cost" id="cost" value="0.00" placeholder="₹" class="form-control" />
            </span>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <span class="mb-2 ">Barcode:
                <input type="text" name="barcode" id="barcode" class="form-control">
            </span>
        </div>
        <div class="col-md-6">
            <span class="mb-2 ">Unit of Measure:
                <select name="unit_of_measure" id="unit_of_measure" class="form-control" onchange="on_unit_of_measure_change()">
                    <option value="">--select--</option>
                    @foreach($uom as $u)
                        <option value="{{ $u->id }}">{{ $u->uom }}</option>
                    @endforeach
                </select>
            </span>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <span class="mb-2 ">HSN/ SAC Code:
                <input type="text" name="saccode" id="saccode" class="form-control">
            </span>
        </div>
        <div class="col-md-6">
            <span class="mb-2 ">Purchase Unit of Measure:
                <select name="purchase_unit_of_measure" id="purchase_unit_of_measure" class="form-control">
                    <option value="">--select--</option>
                    @foreach($uom as $u)
                        <option value="{{ $u->id }}">{{ $u->uom }}</option>
                    @endforeach
                </select>
            </span>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <span class="mb-2 ">HSN/ SAC Description:
                <input type="text" name="sacdescription" id="sacdescription" class="form-control">
            </span>
        </div>
    </div>
    <div class="row mb-2">
        <h4 class="text-dark mb-2">Internal Notes</h4>
        <input name="internal_notes" id="internal_notes" class="form-control"
            placeholder="This note is only for internal purposes">
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#customer_taxes').select2({
            width: '100%',
            placeholder: "select tax",
            allowClear: true
        });
    })

    function on_unit_of_measure_change()
    {
        var uom = $('#unit_of_measure').val();
        $('#purchase_unit_of_measure').val(uom);
    }
</script>
