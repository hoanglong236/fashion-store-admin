<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data5 table-radius">
        <thead>
            <tr>
                <th>#</th>
                <th>Address</th>
                <th>Type</th>
                <th>Default</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customerAddresses as $index => $customerAddress)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $customerAddress->specific_address .
                        ', ' .
                        $customerAddress->ward .
                        ', ' .
                        $customerAddress->district .
                        ', ' .
                        $customerAddress->city }}
                    </td>
                    <td>{{ $customerAddress->address_type }}</td>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">&nbsp;</label>
                            <input class="form-check-input" type="checkbox" @checked($customerAddress->default_flag)>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
