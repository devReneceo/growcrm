<!-- Invoice - Due-->
<div class="col-lg-3 col-md-6 click-url cursor-pointer" data-url="<?php echo e(url('invoices/search?ref=list&filter_bill_status[]=due')); ?>">
    <div class="card">
        <div class="card-body p-l-15 p-r-15">
            <div class="d-flex p-10 no-block">
                <span class="align-slef-center">
                    <h2 class="m-b-0"><?php echo e(runtimeMoneyFormat($payload['invoices']['due'])); ?></h2>
                    <h6 class="text-muted m-b-0"><?php echo e(cleanLang(__('lang.invoices'))); ?> - <?php echo e(cleanLang(__('lang.due'))); ?></h6>
                </span>
                <div class="align-self-center display-6 ml-auto"><i class="text-warning icon-Coin"></i></div>
            </div>
        </div>
        <div class="progress">
            <div class="progress-bar bg-warning w-100 h-px-3" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
    </div>
</div><?php /**PATH /Applications/MAMP/htdocs/nextcrm/application/resources/views/pages/home/admin/widgets/first-row/invoices-due.blade.php ENDPATH**/ ?>