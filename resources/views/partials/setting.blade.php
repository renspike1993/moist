<div class="sidebar-body">
    <a href="#" class="settings-sidebar-toggler">
        <i data-feather="settings"></i>
    </a>
    <h6 class="text-muted">Theme</h6>
    <div class="form-group border-bottom">
        <!-- 
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
                            Light
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
                            Dark
                        </label>
                    </div>
                     -->
    </div>
    <div class="theme-wrapper">
        <?php if ($user->theme == 0) { ?>
            <h6 class="text-muted mb-2">Switch to Light</h6>
            <a class="theme-item active" href="{{ route('change_theme') }}">
                <img src="{{ asset('template/assets/images/screenshots/light.jpg') }}" alt="light theme">
            </a>
        <?php } else { ?>
            <h6 class="text-muted mb-2">Switch to Dark</h6>
            <a class="theme-item" href="{{ route('change_theme') }}">
                <img src="{{ asset('template/assets/images/screenshots/dark.jpg') }}" alt="light theme">
            </a>
        <?php } ?>
    </div>
</div>