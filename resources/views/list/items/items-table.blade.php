<div class="flex flex-col">
    <table>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                @if ($item->url)
                    <td>{{ $item->url }}</td>
                @else
                    <td>...</td>
                @endif
                @if ($item->url)
                    <td>{{ $item->url }}</td>
                @else
                    <td>...</td>
                @endif
            </tr>
        @endforeach
    </table>
</div>
