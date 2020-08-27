<section class="section">
    <form action="/search" method="post" role="search">
        {{ csrf_field() }}
        <div class="navbar">
            <input type="text" name="iName"
                placeholder="Search name"> <span class="icon">
                <button type="submit" class="control">Search</button>
            </span>
        </div>
    </form>