<ul class="sidebar-menu">
    <li><a href="<?= base_url('dashboard') ?>" class="<?= current_url() == base_url('dashboard') ? 'active' : '' ?>">
        <i class="fas fa-home"></i> Dashboard
    </a></li>
    <li><a href="<?= base_url('student') ?>" class="<?= strpos(current_url(), 'student') !== false ? 'active' : '' ?>">
        <i class="fas fa-users"></i> Students
    </a></li>
    <li>
        <a href="#" class="expandable <?= strpos(current_url(), 'exam') !== false ? 'active' : '' ?>">
            <i class="fas fa-file-alt"></i> Exams
            <i class="fas fa-chevron-down toggle-icon" style="margin-left:auto;"></i>
        </a>
        <ul class="submenu <?= strpos(current_url(), 'exam') !== false ? 'show' : '' ?>">
            <li><a href="<?= base_url('exam') ?>"><i class="fas fa-plus-circle"></i> Add Exams</a></li>
            <li><a href="<?= base_url('exam/subjects') ?>"><i class="fas fa-book"></i> Add Exam Subjects</a></li>
            <li><a href="<?= base_url('exam/allocation') ?>"><i class="fas fa-chalkboard"></i> Allocate Classes</a></li>
            <li><a href="<?= base_url('exam/marks') ?>"><i class="fas fa-pen"></i> Add Exam Marks</a></li>
            <li><a href="<?= base_url ('exam/marks/bulk')?>"><i class="fas fa-upload"></i> Bulk Add Exam Marks</a></li>
            <li><a href="<?= base_url('exam/view') ?>"><i class="fas fa-file-alt"></i> View Exam</a></li>
            <li><a href="<?= base_url('exam/marks/view') ?>"><i class="fas fa-eye"></i> View Exam Marks</a></li>
        </ul>
    </li>
    <li>
        <a href="#" class="expandable <?= strpos(current_url(), 'results') !== false ? 'active' : '' ?>">
            <i class="fas fa-chart-bar"></i> Results
            <i class="fas fa-chevron-down toggle-icon" style="margin-left:auto;"></i>
        </a>
        <ul class="submenu <?= strpos(current_url(), 'results') !== false ? 'show' : '' ?>">
            <li><a href="<?= base_url('results/publish') ?>"><i class="fas fa-chart-bar"></i> Publish Results</a></li>
            <li><a href="<?= base_url('results/view')?>"><i class="fas fa-eye"></i> View Results</a></li>
        </ul>
    </li>
    <li>
        <a href="#" class="expandable <?= strpos(current_url(), 'alevel') !== false ? 'active' : '' ?>">
            <i class="fas fa-graduation-cap"></i> A-Level
            <i class="fas fa-chevron-down toggle-icon" style="margin-left:auto;"></i>
        </a>
        <ul class="submenu <?= strpos(current_url(), 'alevel') !== false ? 'show' : '' ?>">
            <li><a href="<?= base_url('alevel/combinations') ?>"><i class="fas fa-layer-group"></i> Manage Combinations</a></li>
            <li><a href="<?= base_url('alevel/subjects') ?>"><i class="fas fa-book"></i> Manage Subjects</a></li>
            <li><a href="<?= base_url('alevel/subjects/view') ?>"><i class="fas fa-eye"></i> View Subjects</a></li>
            <li><a href="<?= base_url('alevel/allocations') ?>"><i class="fas fa-chalkboard"></i> Allocate Classes</a></li>
            <li><a href="<?= base_url('alevel/allocations/view') ?>"><i class="fas fa-eye"></i> View Allocations</a></li>
            <li><a href="<?= base_url('alevel/allocate-exams') ?>"><i class="fas fa-chalkboard"></i> Allocate Exams</a></li>
            <li><a href="<?= base_url('alevel/view-exams') ?>"><i class="fas fa-eye"></i> View Exams</a></li>
            <li><a href="<?= base_url('alevel/marks') ?>"><i class="fas fa-plus-circle"></i> Add Exam Marks</a></li>
            <li><a href="<?= base_url('alevel/marks/bulk') ?>"><i class="fas fa-upload"></i> Bulk Marks Upload</a></li>
            <li><a href="<?= base_url('alevel/marks/view') ?>"><i class="fas fa-eye"></i> View Exam Marks</a></li>
           <li><a href="<?= base_url('alevel/results/publish') ?>"><i class="fas fa-chart-bar"></i> Publish Results</a></li>
           <li><a href="<?= base_url('alevel/results/view') ?>"><i class="fas fa-eye"></i> View Results</a></li>
        </ul>
    </li>
    <li><a href="<?= base_url('settings') ?>" class="<?= strpos(current_url(), 'settings') !== false ? 'active' : '' ?>">
        <i class="fas fa-cog"></i> Settings
    </a></li>
    <li class="logout-section">
        <a href="<?= base_url('logout') ?>" class="logout-link">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </li>
</ul>