<!--ALL THIRD PART JAVASCRIPTS-->
<script src="https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/public/vendor/js/vendor.footer.js?v={{ config('system.versioning') }}"></script>

<!--nextloop.core.js-->
<script src="https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/public/js/core/ajax.js?v={{ config('system.versioning') }}"></script>

<!--MAIN JS - AT END-->
<script src="https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/public/js/core/boot.js?v={{ config('system.versioning') }}"></script>

<!--EVENTS-->
<script src="https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/public/js/core/events.js?v={{ config('system.versioning') }}"></script>

<!--CORE-->
<script src="https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/public/js/core/app.js?v={{ config('system.versioning') }}"></script>

<!--BILLING-->
<script src="https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/public/js/core/billing.js?v={{ config('system.versioning') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/brands.min.js"> </script>
<!--project page charts-->
@if(@config('visibility.projects_d3_vendor'))
<script src="https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/public/vendor/js/d3/d3.min.js?v={{ config('system.versioning') }}"></script>
<script src="https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/public/vendor/js/c3-master/c3.min.js?v={{ config('system.versioning') }}"></script>
@endif

<!--form builder-->
@if(@config('visibility.web_form_builder'))
<script src="https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/public/vendor/js/formbuilder/form-builder.min.js?v={{ config('system.versioning') }}"></script>
<script src="https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/public/js/webforms/webforms.js?v={{ config('system.versioning') }}"></script>
@endif

<script src="https://js.stripe.com/v3/"></script>