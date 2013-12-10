	<div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-user"></i>權限</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li ><a href="<?=base_url("/userapplication/users")?>">權限申請狀況</a></li>
			<li ><a href="<?=base_url("/userapplication/usersadmin")?>">權限管理</a></li>
        </ul>

        <a href="#accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-folder-open"></i>專案</i></a>
        <ul id="accounts-menu" class="nav nav-list collapse in">
            <li ><a href="<?=base_url("/projectadmin/project_home")?>">專案管理</a></li>
            <li ><a href="users-testlist.html">受測名單</a></li>
        </ul>

        <a href="#error-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-search"></i>追蹤</a>
        <ul id="error-menu" class="nav nav-list collapse in">
            <li ><a href="users-track.html">追蹤名單</a></li>
        </ul>

        <a href="#legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-th-list"></i>圖表</a>
        <ul id="legal-menu" class="nav nav-list collapse in">
            <li ><a href="#">評測結果</a></li>
            <li ><a href="#">匯出檔案</a></li>
        </ul>
    </div>