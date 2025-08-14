@extends('backend.layout.public')

@section('title', 'Notifications')

@section('content')
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Notifications</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Notifications</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            
            @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 1-->
                <div class="small-box text-bg-primary">
                  <div class="inner">
                    <h3>{{ $totalCount }}</h3>
                    <p>Total Notifications</p>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                  >
                    <path
                      d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                    ></path>
                  </svg>
                </div>
                <!--end::Small Box Widget 1-->
              </div>
              <!--end::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 2-->
                <div class="small-box text-bg-warning">
                  <div class="inner">
                    <h3>{{ $unreadCount }}</h3>
                    <p>Unread Notifications</p>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                  >
                    <path
                      d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"
                    ></path>
                  </svg>
                </div>
                <!--end::Small Box Widget 2-->
              </div>
              <!--end::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 3-->
                <div class="small-box text-bg-success">
                  <div class="inner">
                    <h3>{{ $readCount }}</h3>
                    <p>Read Notifications</p>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                  >
                    <path
                      d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
                    ></path>
                  </svg>
                </div>
                <!--end::Small Box Widget 3-->
              </div>
              <!--end::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 4-->
                <div class="small-box text-bg-info">
                  <div class="inner">
                    <h3>{{ $unreadCount > 0 ? round(($readCount / $totalCount) * 100) : 100 }}<sup class="fs-5">%</sup></h3>
                    <p>Read Rate</p>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                  >
                    <path
                      clip-rule="evenodd"
                      fill-rule="evenodd"
                      d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"
                    ></path>
                    <path
                      clip-rule="evenodd"
                      fill-rule="evenodd"
                      d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"
                    ></path>
                  </svg>
                </div>
                <!--end::Small Box Widget 4-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row">
              <div class="col-12">
                                 <div class="card">
                   <div class="card-header">
                     <h3 class="card-title">
                       <i class="bi bi-bell"></i> All Notifications
                       <small class="text-muted">(Click on any row to view related page)</small>
                     </h3>
                     <div class="card-tools">
                       @if($unreadCount > 0)
                         <form action="{{ route('notifications.markAllAsRead') }}" method="POST" style="display: inline;">
                           @csrf
                           <button type="submit" class="btn btn-success btn-sm">
                             <i class="bi bi-check2-all"></i> Mark All as Read
                           </button>
                         </form>
                       @endif
                     </div>
                   </div>
                  <div class="card-body">
                    @if($notifications->count() > 0)
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Status</th>
                              <th>Title</th>
                              <th>Message</th>
                              <th>Type</th>
                              <th>Date</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                                                     <tbody>
                             @foreach($notifications as $notification)
                               <tr class="{{ $notification->is_read ? '' : 'table-warning' }} notification-row" 
                                   data-notification-id="{{ $notification->id }}"
                                   data-notification-type="{{ $notification->title }}"
                                   style="cursor: pointer;"
                                   title="Click to view related page">
                                                                 <td>
                                   @if($notification->is_read)
                                     <span class="badge bg-success">Read</span>
                                   @else
                                     <span class="badge bg-warning">Unread</span>
                                   @endif
                                   <i class="bi bi-arrow-right-circle text-muted ms-1" style="font-size: 0.8rem;"></i>
                                 </td>
                                <td>
                                  <strong>{{ $notification->title }}</strong>
                                </td>
                                <td>{{ $notification->message }}</td>
                                <td>
                                  @switch($notification->type)
                                    @case('info')
                                      <span class="badge bg-info">Info</span>
                                      @break
                                    @case('success')
                                      <span class="badge bg-success">Success</span>
                                      @break
                                    @case('warning')
                                      <span class="badge bg-warning">Warning</span>
                                      @break
                                    @case('error')
                                      <span class="badge bg-danger">Error</span>
                                      @break
                                    @default
                                      <span class="badge bg-secondary">{{ ucfirst($notification->type) }}</span>
                                  @endswitch
                                </td>
                                <td>{{ $notification->created_at->format('d M Y H:i') }}</td>
                                                                 <td>
                                   <div class="btn-group" role="group">
                                     @if(!$notification->is_read)
                                       <a href="{{ route('notifications.markAsReadAndRedirect', $notification->id) }}" 
                                          class="btn btn-sm btn-outline-success" 
                                          title="Mark as read and go to related page">
                                         <i class="bi bi-check2"></i>
                                       </a>
                                     @endif
                                     
                                     @if(str_contains($notification->title, 'Pendaftar Baru'))
                                       <a href="{{ route('pendaftar.index') }}" 
                                          class="btn btn-sm btn-outline-primary" 
                                          title="View Pendaftar">
                                         <i class="bi bi-people"></i> View Pendaftar
                                       </a>
                                     @elseif(str_contains($notification->title, 'Pendaftar Diterima'))
                                       <a href="{{ route('pendaftar.diterima.index') }}" 
                                          class="btn btn-sm btn-outline-info" 
                                          title="View Diterima">
                                         <i class="bi bi-check-circle"></i> View Diterima
                                       </a>
                                     @endif
                                     
                                     <form action="{{ route('notifications.destroy', $notification->id) }}" 
                                           method="POST" 
                                           style="display: inline;"
                                           onsubmit="return confirm('Are you sure you want to delete this notification?')">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                         <i class="bi bi-trash"></i>
                                       </button>
                                     </form>
                                   </div>
                                 </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      
                      <!-- Pagination -->
                      <div class="d-flex justify-content-center">
                        {{ $notifications->links() }}
                      </div>
                    @else
                      <div class="text-center py-5">
                        <i class="bi bi-bell-slash" style="font-size: 3rem; color: #ccc;"></i>
                        <h5 class="mt-3">No notifications found</h5>
                        <p class="text-muted">You don't have any notifications yet.</p>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
             </main>
       <!--end::App Main-->
 @endsection

 @push('styles')
 <style>
   .notification-row:hover {
     background-color: rgba(0, 123, 255, 0.1) !important;
   }
   
   .notification-row.unread:hover {
     background-color: rgba(255, 193, 7, 0.2) !important;
   }
   
   .btn-group {
     position: relative;
     z-index: 10;
   }
   
   .btn-group .btn {
     position: relative;
     z-index: 11;
   }
   
   .notification-row {
     transition: all 0.2s ease;
   }
   
   .notification-row:hover {
     box-shadow: 0 2px 8px rgba(0,0,0,0.1);
   }
   
   .notification-row.loading {
     opacity: 0.7;
     pointer-events: none;
   }
   
   .loading-spinner {
     position: absolute;
     top: 50%;
     left: 50%;
     transform: translate(-50%, -50%);
     z-index: 1000;
   }
 </style>
 @endpush

 @push('scripts')
 <script>
   document.addEventListener('DOMContentLoaded', function() {
     // Handle row clicks
     document.querySelectorAll('.notification-row').forEach(function(row) {
       row.addEventListener('click', function(e) {
         // Don't trigger if clicking on buttons
         if (e.target.closest('.btn-group') || e.target.closest('button') || e.target.closest('a')) {
           return;
         }
         
         // Add loading state
         this.style.opacity = '0.7';
         this.style.pointerEvents = 'none';
         
         // Show loading indicator
         const loadingSpinner = document.createElement('div');
         loadingSpinner.className = 'position-absolute top-50 start-50 translate-middle';
         loadingSpinner.innerHTML = '<div class="spinner-border spinner-border-sm text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
         loadingSpinner.style.zIndex = '1000';
         this.style.position = 'relative';
         this.appendChild(loadingSpinner);
         
         const notificationId = this.dataset.notificationId;
         const notificationType = this.dataset.notificationType;
         
         // Determine destination based on notification type
         let destination = '';
         let destinationName = '';
         
         if (notificationType.includes('Pendaftar Baru')) {
           destinationName = 'Pendaftar page';
         } else if (notificationType.includes('Pendaftar Diterima')) {
           destinationName = 'Diterima page';
         } else {
           destinationName = 'related page';
         }
         
         // Show confirmation dialog
         if (confirm(`Mark this notification as read and go to ${destinationName}?`)) {
           window.location.href = `/notifications/${notificationId}/read-and-redirect`;
         } else {
           // Remove loading state if user cancels
           this.style.opacity = '1';
           this.style.pointerEvents = 'auto';
           if (loadingSpinner) {
             loadingSpinner.remove();
           }
         }
       });
     });
     
     // Add visual feedback for clickable rows
     document.querySelectorAll('.notification-row').forEach(function(row) {
       row.addEventListener('mouseenter', function() {
         this.style.transform = 'scale(1.01)';
         this.style.transition = 'transform 0.1s ease';
       });
       
       row.addEventListener('mouseleave', function() {
         this.style.transform = 'scale(1)';
       });
     });
   });
 </script>
 @endpush
