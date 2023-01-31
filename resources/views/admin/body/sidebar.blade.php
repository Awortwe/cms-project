<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route('dashboard') }}" class="waves-effect">
                <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                <span>Dashboard</span>
            </a>
        </li>


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Manage Categories</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('categories.index') }}">All Categories</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Manage Posts</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('posts.index') }}">All Posts</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Manage Tags</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('tags.index') }}">All Tags</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Trashed Posts</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('trashed.posts') }}">All Trashed Posts</a></li>
            </ul>
        </li>


    </ul>
</div>
