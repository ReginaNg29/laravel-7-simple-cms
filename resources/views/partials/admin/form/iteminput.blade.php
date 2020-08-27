<section class="section">
<div class="item-box">
    <!-- Success message -->
    @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

    <form action="" method="post" action="{{ route('item.store') }}">
    @csrf
                <div class="navbar">
                    <div class="control">
                        <label for="amount">Amount:</label>
                        <input type="number" name="amount">
                    </div>
                    <div class="control">
                        <label for="name">Name:</label>
                        <input type="text" name="name">
                    </div>
                    <div class="control">
                        <label for="description">Description:</label>
                        <input type="text" name="description">
                    </div>
                        <button type="submit" value="Update" class="button">Add</button>
                        <button type="submit" value="Search" class="button" href="{{ route('item.store') }}">Search</button>
                    </div>
                </div>
            </form>
    </div>

