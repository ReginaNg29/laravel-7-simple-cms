<section class="section">
<div class="item-box">
    <form id="login" method="POST" action="{{ route('auth.login.post') }}">
                <div class="navbar">
                    <div class="control">
                        <label>ID:</label>
                        <input type="number" name="id">
                    </div>
                    <div class="control">
                        <label>Amount:</label>
                        <input type="number" name="amount">
                    </div>
                    <div class="control">
                        <label>Name:</label>
                        <input type="number" name="name">
                    </div>
                    <div class="control">
                        <label>Description:</label>
                        <input type="text" name="description">
                    </div>
                        <button type="submit" value="Update" class="button">Update</button>
                    </div>
                </div>
            </form>
    </div>