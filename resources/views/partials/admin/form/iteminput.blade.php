<section class="section">
<div class="item-box">
    <!-- Success message -->
    @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

    <form action="{{ route('item.store') }}" method="post" name="addItem">
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
                        <button type="submit" name="submitbutton" value="add" class="button">Add</button>
                    </div>
                </div>
            </form>
        <div class="navbar">
        <button type="submit" name="submitbutton" value="search" class="button" onclick="window.location='{{ route('item.itemFilter') }}'">Search</button>
        </div>
    </div>

