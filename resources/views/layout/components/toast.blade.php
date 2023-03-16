@if(session('success-message'))
<!-- BEGIN: Success Notification Content -->
<div id="success-notification-content" class="flex hidden toastify-content">
    <i class="text-success" data-lucide="check-circle"></i>
    <div class="ml-4 mr-4">
        <div class="font-medium">Yeay!</div>
        <div class="mt-1 text-slate-500">
            {!! session('success-message') !!}
        </div>
    </div>
</div>
<script>

document.onload = function() {
    window.showAlert('success');
    feather.replace();
};

</script>
<!-- END: Success Notification Content -->
@elseif(session('error-message'))
<!-- BEGIN: Failed Notification Content -->
<div id="failed-notification-content" class="flex hidden toastify-content">
    <i class="text-danger" data-lucide="x-circle"></i>
    <div class="ml-4 mr-4">
        <div class="font-medium">Oops!</div>
        <div class="mt-1 text-slate-500">
            {!! session('error-message') !!}
        </div>
    </div>
</div>
<script>

</script>
<!-- END: Failed Notification Content -->
@endif
