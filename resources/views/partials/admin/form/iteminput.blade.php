<section class="section">
<div class="item-box">
    <button type="submit" class="button is-dark" style="float:right" onclick="window.location='{{ route("item.destroy") }}'">Logout</button>
    <form action="{{ route('item.store') }}" method="post" name="addItem">
    @csrf
        <div class="container">
            <div class="navbar-menu">
                <div class="navbar-start">
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
                            <button type="submit" value="add" class="button">Add</button>
                        </div>
                    </div>
    </form>

    <div class="navbar">
        <div class="control">
            Search by: <select name="search" onchange="window.location.href=this.value;">
                <option value="filterBy">Select Search Option</option>
                <option value="{{ route('item.itemFilterId') }}">Search by ID</option>
                <option value="{{ route('item.itemFilterName') }}">Search by Name</option>
                <option value="{{ route('item.itemFilterAmount') }}">Search by Amount</option>
                <option value="{{ route('item.itemFilterCreated') }}">Search by Created Data</option>
                <option value="{{ route('item.itemFilterUpdated') }}">Search by Updated Data</option>
            </select>
        </div>
    </div>
                    </div>
                </div>
            </div>
</div>

