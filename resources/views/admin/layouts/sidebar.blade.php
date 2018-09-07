<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li class="active">
                <a href="{{ route('home') }}">
                    <i class="icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-list-alt"></i>
                    <span>Categories</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('categories') }}">All Categories</a></li>
                    <li><a href="{{ route('category.create') }}">Create New Category</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="icon-tags"></i>
                    <span>Tags</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('tags') }}">All Tags</a></li>
                    <li><a href="{{ route('tag.create') }}">Create New Tag</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Posts</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('posts') }}">All Posts</a></li>
                    <li><a href="{{ route('post.trashed') }}">All Trashed Posts</a></li>
                    <li><a href="{{ route('post.create') }}">Create New Post</a></li>
                </ul>
            </li>

            @if(auth()->user()->admin)
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('users') }}">All Users</a></li>
                    <li><a href="{{ route('user.trashed') }}">All Trashed Users</a></li>
                    <li><a href="{{ route('user.create') }}">Create New User</a></li>
                </ul>
            </li>
            @endif

            <li>
                <a href="{{ route('settings') }}">
                    <i class="icon-cogs"></i>
                    <span>Settings</span>
                </a>
            </li>
            
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->