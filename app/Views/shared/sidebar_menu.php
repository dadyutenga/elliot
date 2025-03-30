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
        <ul class="submenu" style="display: <?= strpos(current_url(), 'exam') !== false ? 'block' : 'none' ?>; padding-left: 1rem;">
            <li><a href="<?= base_url('exam') ?>">Add Exams</a></li>
            <li><a href="<?= base_url('exam/subjects') ?>">Add Exam Subjects</a></li>
        </ul>
    </li>
    <li><a href="#" class="<?= strpos(current_url(), 'results') !== false ? 'active' : '' ?>">
        <i class="fas fa-chart-bar"></i> Results
    </a></li>
    <li><a href="#" class="<?= strpos(current_url(), 'settings') !== false ? 'active' : '' ?>">
        <i class="fas fa-cog"></i> Settings
    </a></li>
</ul>