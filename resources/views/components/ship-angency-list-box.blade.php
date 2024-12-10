@php
    use App\Models\ShipAgency;
    $shipAgencies = ShipAgency::select('code', 'name')->get();
@endphp


<div class="form-group row">
    <label class="col-md-3 form-label">Ship Agency</label>
    <div class="col-md-9">
        <select name="shipagency" id="select-countries" class="form-control custom-select select2">
            @if(isset($shipAgencies) && count($shipAgencies) > 0)
                @foreach ($shipAgencies as $shipAgency)
                    <option value="{{ $shipAgency->code }}">{{ $shipAgency->name }}</option>
                @endforeach
            @else
                <option value="">No Ship Agencies Available</option>
            @endif
        </select>
    </div>
</div>