<div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
    <form id="search" action="{{ route("categories.index") }}">
        <div class="input-group">
            <input id="term" type="text" name="term" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Go!</button>
            </span>
        </div>
    </form>
    </div>
</div>