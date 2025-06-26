@props([
    'headers' => [],
    'rows' => [],
])

<div class="table-responsive">
    <table class="table datatable">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th scope="col">
                        {{ $header['label'] }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    @foreach ($headers as $header)
                        <td>
                            {!! $row[$header['key']] ?? '-' !!}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
