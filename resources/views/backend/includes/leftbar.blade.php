<!-- ########## START: LEFT PANEL ########## -->
@php
  $auth_id = Auth::guard('userinfo')->user()->id
@endphp
    <div class="br-logo"><a href=""><span>[</span>Blog <i>plus</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{Route('dashboard')}}" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="mailbox.html" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Mailbox</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
      @if(Auth::guard('userinfo')->user()->status == 1)
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Category</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{Route('category.add')}}" class="sub-link">Add Category</a></li>
            <li class="sub-item"><a href="{{Route('category.manage')}}" class="sub-link">Manage Category</a></li>
          </ul>
        </li>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="fas fa-tags"></i>
            <span class="menu-item-label">Tags</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{Route('tag.add')}}" class="sub-link">Add Tag</a></li>
            <li class="sub-item"><a href="{{Route('tag.manage')}}" class="sub-link">Manage Tag</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="fas fa-users"></i>
            <span class="menu-item-label">Users Management</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{Route('manage_user')}}" class="sub-link">Manage User</a></li>
            <li class="sub-item"><a href="{{Route('adduser')}}" class="sub-link">Add User</a></li>
          </ul>
        </li>
      @endif
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub">
          <i class="fas fa-book-open"></i>
          <span class="menu-item-label">Blog Post</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
          <li class="sub-item"><a href="{{Route('blog.add')}}" class="sub-link">Add Blog</a></li>
          <li class="sub-item"><a href="{{Route('your_blogs',$auth_id)}}" class="sub-link">Your Blogs</a></li>
          @if(Auth::guard('userinfo')->user()->status==1)
          <li class="sub-item"><a href="{{Route('blog.manage')}}" class="sub-link">Manage Blog</a></li>
          <li class="sub-item"><a href="{{Route('request.blog')}}" class="sub-link">Blog Request</a></li>
          @endif
        </ul>
      </li>
      </ul><!-- br-sideleft-menu -->

      <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Information Summary</label>

      <div class="info-list">
        <div class="info-list-item">
          <a target="_blank" href="http://localhost:8000/" class="btn btn-primary">Visit Mini-Blog</a>
        </div><!-- info-list-item -->

        <div class="info-list-item">
          <div>
            <p class="info-list-label">CPU Usage</p>
            <h5 class="info-list-amount">140.05</h5>
          </div>
          <span class="peity-bar" data-peity='{ "fill": ["#1C7973"], "height": 35, "width": 60 }'>4,3,5,7,12,10,4,5,11,7</span>
        </div><!-- info-list-item -->

        <div class="info-list-item">
          <div>
            <p class="info-list-label">Disk Usage</p>
            <h5 class="info-list-amount">82.02%</h5>
          </div>
          <span class="peity-bar" data-peity='{ "fill": ["#8E4246"], "height": 35, "width": 60 }'>1,2,1,3,2,10,4,12,7</span>
        </div><!-- info-list-item -->

        <div class="info-list-item">
          <div>
            <p class="info-list-label">Daily Traffic</p>
            <h5 class="info-list-amount">62,201</h5>
          </div>
          <span class="peity-bar" data-peity='{ "fill": ["#9C7846"], "height": 35, "width": 60 }'>3,12,7,9,2,3,4,5,2</span>
        </div><!-- info-list-item -->
      </div><!-- info-list -->

      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
