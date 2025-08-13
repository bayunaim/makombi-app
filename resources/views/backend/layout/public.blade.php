<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Public Page')</title>
    
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media='all'"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body" role="navigation" aria-label="Top navigation">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
           
            
            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#" id="notificationDropdown">
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-warning" id="notificationBadge">0</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end" id="notificationMenu">
                <span class="dropdown-item dropdown-header" id="notificationHeader">0 Notifikasi</span>
                <div class="dropdown-divider"></div>
                <div id="notificationList">
                  <!-- Notifications will be loaded here -->
                </div>
                <div class="dropdown-divider"></div>
                <a href="{{ route('notifications.page') }}" class="dropdown-item dropdown-footer">View All Notifications</a>
              </div>
            </li>
            <!--end::Notifications Dropdown Menu-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu-->
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-1"></i>
                <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'User' }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <span class="dropdown-item-text">
                    <i class="bi bi-person me-2"></i>{{ Auth::user()->name ?? 'User' }}
                  </span>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <a href="{{ route('logout') }}" class="dropdown-item text-danger">
                    <i class="bi bi-box-arrow-right me-2"></i>Sign Out
                  </a>
                </li>
              </ul>
            </li>
            <!--end::User Menu-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
       <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark" aria-label="Sidebar navigation">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ route('dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('img/adminlte/AdminLTELogo.png') }}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Makombi</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                  
                  </p>
                </a>
                </li>
                  <li class="nav-item">
                    <a href="{{ route('pendaftar.index') }}" class="nav-link">
                      <i class="bi bi-people-fill nav-icon"></i>
                      <p>Pendaftar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pendaftar.diterima.index') }}" class="nav-link">
                      <i class="bi bi-check2-circle nav-icon"></i>
                      <p>Diterima</p>
                    </a>
                  </li>
                              <li class="nav-item">
              <a href="{{ route('notifications.page') }}" class="nav-link">
                <i class="bi bi-bell nav-icon"></i>
                <p>
                  Notifikasi
                  @if(\App\Models\Notification::unread()->count() > 0)
                    <span class="badge badge-warning right">{{ \App\Models\Notification::unread()->count() }}</span>
                  @endif
                </p>
              </a>
            </li>
            
            <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link">
                      <i class="bi bi-chat-dots nav-icon"></i>
                      <p>Pesan Masuk</p>
                    </a>
                  </li>
                
              
              
                
              
              
              
              
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->

    
    @yield('content')

    </div>
    <!--end::App Wrapper-->

    <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2025&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->

    
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>
    <!-- sortablejs -->
    <script>
      new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <!-- ChartJS -->
    
    <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
      integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
      crossorigin="anonymous"
    ></script>
    <!--end::Script-->
    
    @stack('styles')
    @stack('scripts')
    
    <!-- Notification System JavaScript -->
    <script>
        class NotificationSystem {
            constructor() {
                this.notificationBadge = document.getElementById('notificationBadge');
                this.notificationHeader = document.getElementById('notificationHeader');
                this.notificationList = document.getElementById('notificationList');
                
                this.init();
            }
            
            init() {
                this.loadNotifications();
                this.startPolling();
            }
            
            async loadNotifications() {
                try {
                    const response = await fetch('/notifications/unread');
                    const data = await response.json();
                    
                    this.updateNotificationBadge(data.unread_count);
                    this.updateNotificationHeader(data.unread_count);
                    this.renderNotifications(data.notifications);
                } catch (error) {
                    console.error('Error loading notifications:', error);
                }
            }
            
            updateNotificationBadge(count) {
                this.notificationBadge.textContent = count;
                this.notificationBadge.style.display = count > 0 ? 'inline' : 'none';
            }
            
            updateNotificationHeader(count) {
                this.notificationHeader.textContent = `${count} Notifications`;
            }
            
            renderNotifications(notifications) {
                if (notifications.length === 0) {
                    this.notificationList.innerHTML = '<div class="dropdown-item text-muted">No new notifications</div>';
                    return;
                }
                
                this.notificationList.innerHTML = notifications.map(notification => `
                    <a href="#" class="dropdown-item notification-item" data-id="${notification.id}">
                        <i class="bi bi-people-fill me-2"></i> ${notification.message}
                        <span class="float-end text-secondary fs-7">${this.formatTime(notification.created_at)}</span>
                    </a>
                `).join('');
                
                // Add click event to redirect to notification page
                this.notificationList.querySelectorAll('.notification-item').forEach(item => {
                    item.addEventListener('click', (e) => {
                        e.preventDefault();
                        const notificationId = item.dataset.id;
                        // Redirect to notification page with the specific notification
                        window.location.href = `/notifications/${notificationId}/read-and-redirect`;
                    });
                });
            }
            

            

            
            formatTime(timestamp) {
                const date = new Date(timestamp);
                const now = new Date();
                const diffInMinutes = Math.floor((now - date) / (1000 * 60));
                
                if (diffInMinutes < 1) return 'Just now';
                if (diffInMinutes < 60) return `${diffInMinutes} mins`;
                
                const diffInHours = Math.floor(diffInMinutes / 60);
                if (diffInHours < 24) return `${diffInHours} hours`;
                
                const diffInDays = Math.floor(diffInHours / 24);
                return `${diffInDays} days`;
            }
            
            startPolling() {
                // Poll for new notifications every 30 seconds
                setInterval(() => {
                    this.loadNotifications();
                }, 30000);
            }
        }
        
        // Initialize notification system when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            window.notificationSystem = new NotificationSystem();
        });
    </script>
    
    <style>
    /* User Menu Styling */
    .nav-item.dropdown .nav-link {
        display: flex;
        align-items: center;
        padding: 0.5rem 1rem;
        color: #6c757d;
        text-decoration: none;
        transition: color 0.15s ease-in-out;
        border-radius: 0.375rem;
    }
    
    .nav-item.dropdown .nav-link:hover {
        color: #495057;
        background-color: rgba(0, 0, 0, 0.05);
    }
    
    .nav-item.dropdown .dropdown-toggle::after {
        margin-left: 0.5rem;
        transition: transform 0.15s ease-in-out;
    }
    
    .nav-item.dropdown.show .dropdown-toggle::after {
        transform: rotate(180deg);
    }
    
    .dropdown-item-text {
        color: #6c757d;
        font-weight: 500;
        padding: 0.5rem 1rem;
    }
    
    .dropdown-item.text-danger {
        transition: all 0.15s ease-in-out;
    }
    
    .dropdown-item.text-danger:hover {
        background-color: #f8d7da;
        color: #721c24 !important;
        transform: translateX(2px);
    }
    
    .dropdown-item.text-danger:focus {
        background-color: #f8d7da;
        color: #721c24 !important;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .nav-item.dropdown .nav-link span {
            display: none;
        }
        
        .nav-item.dropdown .nav-link {
            padding: 0.5rem;
        }
        
        .dropdown-item-text {
            padding: 0.5rem;
        }
    }
    </style>
</body>
</html>
