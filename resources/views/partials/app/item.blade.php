<section class="section">
    <div class="footer">
        <table style="width:100%; border: 1px solid #ddd; text-align: left;">
            <tr style="border: 1px solid #ddd;">
                <th>Id</th>
                <th>Amount</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created Data</th>
                <th>Updated Data</th>
            </tr>
            @foreach ($items as $item)
            <tr style="border: 1px solid #ddd;">
                <td>{{ $item->id }}</td>
                <td>{{ $item->amount }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->createdData }}</td>
                <td>{{ $item->updatedData }}</td>
            </tr>
            @endforeach
        </table>
    </div>
