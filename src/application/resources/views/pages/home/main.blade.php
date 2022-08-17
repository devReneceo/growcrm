<div class="row mainTopRow">
    <div class=" col-md-12 background">

        <div class="col-lg-12 topLogoRow" >
        <div class="row">
        <div class="col-md-3 col-sm-12"></div>
            <div class="col-md-6 col-sm-12">
            <img src="{{ url('/') }}/public/images/hit_60_logo.svg" class='img-fluid' style="margin: -120px 2px 52px 0px;"/>
            </div>
            <div class="col-md-3 col-sm-12"></div>
        </div>
       
        
        <!-- <h2 style="transform: rotate(-90deg);">Hit </h2> <h2>60</h2> -->
        <div class="text-center p-t-5 p-b-40 m-b-30">
            <h3 class="sub-title">The Formula is will be in you email in a few minutes. For now, take the next steps to get you going.</h3> 
            <br><br><h5 class="sub-title2">For now. take the next steps to get you going.</h5> 
        </div>

        </div>

<div class="row" id="categories-container" style="    margin-top: 100px;" >
<div class="col-md-12 box-wrapper">
    <div class="box-main-woraper" >
        <!--each category-->
<div class="col-sm-12 col-md-12 col-lg-4 customBox" >
    <div class="card kb-category">
        <div class="card-body">
            <!--visibility-->
                        <!-- <span class="kb-hover-icons hidden x-team label label-with-icon" style="display: none;"><i class="sl-icon-eye"></i>
                Everyone</span> -->
                        <!--category icon-->
            <div class="kb-category-icon"><span><i class="ti-facebook"></i></span></div>
            <!--title-->
            <div class="innerCard">
            <h5 class="card-title">Get Support: Join Our Community</h5>
            <!--description-->
            <div class="card-text">Join our community of other on the same journey. Click below to join our Facebook Group. You will need your email and your personal passcode to be given access.

<p class="text-left" style="margin: 15px;"> Email: {{auth()->user()->email}} <br>
Passcode: {{auth()->user()->group_keyword}}
</p>

</div>
            
        </div>
        <a href="/kb/articles/1-frequently-asked-questions"  class="btn btn-light car-btn">Join Group</a>
        </div>
    </div>
</div>
<!--each category-->

        <!--each category-->

    <div class="col-sm-12 col-md-12 col-lg-4 customBox" >
    <div class="card kb-category">
        <div class="card-body">
            <!--visibility-->
                        <!-- <span class="kb-hover-icons hidden x-team label label-with-icon" style="display: none;"><i class="sl-icon-eye"></i>
                Everyone</span> -->
                        <!--category icon-->
            <div class="kb-category-icon"><span><i class="ti-gift"></i></span></div>
            
            <div class="innerCard">
            <!--title-->
            <h5 class="card-title">Get Support: Invite Friends</h5>
            <!--description-->
        <div class="card-text">There is not better way to get committed than to invite friends that commit with you. And we will reward you for it. We have monthly prize giveaways in our community those with the most friends invited will have more chances to win. Use your personal link below to invite friends.</div>
            
        </div>
        <a href="/kb/articles/1-frequently-asked-questions" class="btn btn-rounded-x btn-primary car-btn">www.hit60/r/abcvode1234</a>
</div>

    </div>
</div>
<!--each category-->

        <!--each category-->
        <div class="col-sm-12 col-md-12 col-lg-4 customBox" >
    <div class="card kb-category">
        <div class="card-body">
            <!--visibility-->
                        <!-- <span class="kb-hover-icons hidden x-team label label-with-icon" style="display: none;"><i class="sl-icon-eye"></i>
                Everyone</span> -->
                        <!--category icon-->
            <div class="kb-category-icon"><span><i class="ti-stats-up"></i></span></div>
            <!--title-->
            <div class="innerCard">
            <h5 class="card-title">Grow Pro: Get Results</h5>
            <!--description-->
            <div class="card-text">Get results by going Pro and getting our tracking app. Easily tracking accomplishments, store progress pics, get reminders and share milestone badges with friends.</div>
                   
        </div>
        <a href="/kb/articles/1-frequently-asked-questions" class="btn btn-light car-btn">Learn More ...</a> 
        </div>
    </div>
</div>

<!--each category-->
</div>
</div> <!-- wraper-->
<div class="footer-wraper col-md-12"> </div>
    </div>

    </div>

</div>
<style type="text/css">
    .kb-category {
        height:350px;
    }
    .background {
        background-image: url("{{ url('/') }}/public/images/positive-woman-win-prize-in-the-internet-and-try-to-dancing-on-the-chair.jpg");
        background-size: cover;
        background-position: center center;
        /* background-size:contain; */
        background-repeat: no-repeat;
        background-position: 0px -180px;
     
    }
    .box-wrapper{
        background: #c87a0096;
        display: inherit;
        padding:80px;
        max-height: 350px;
    }
    .footer-wraper {
        background:#3fbdc3;
        height:150px;
    }
    .customBox {
        /* position: absolute;
    z-index: 1; */
    }
    /* #3fbdc3 bottom footer*/ 
    /* #c87a0096 background boxes */
    .card {
        background-color: transparent !important;
    }
    .innerCard {
        border: 3px solid #fff;
    padding: 15px;
        height: 380px;
    }
    .card-text, .card-title {
        color: #fff;
    font-weight: bold !important;
    }
    .sub-title {
        font-size: 30px;
    color: #000;
    font-weight: bold;
    }
    .sub-title2 {
        font-size: 25px;
    color: #000;
    font-weight: bold;
    }
    .card-title {
     line-height:40px !important;
     font-size: 40px;
     margin-top:5px;
    }
    .kb-category .card-body .card-text {
        font-size: 17px;
    }
    .car-btn {
        margin-top: -120px;
    }
    .kb-category .card-body .kb-category-icon span {
        margin-bottom: -20px;
        width: 120px;
    height: 120px;
    font-size: 60px;
    }

    .topLogoRow{
    padding:80px; margin-bottom: -150px;
}
.box-main-woraper{display: inherit;z-index: 1;margin-top: -155px;}
@media only screen
and (min-width: 320px)
and (max-width: 736px)
{
    .topLogoRow{
    padding:0px; 
    margin-bottom: 0px;
    margin-top: 100px;
    }
    .mainTopRow {
        margin-top: -20px;
    }
    .box-wrapper {
        display:contents;
        padding: 0px;
    }
    .background {
        background-position: -1618px -439px;
    }
    .innerCard{
        height:auto;
        width: 119%;
    margin-left: -29px;
    }
    .box-main-woraper {
        display:block;
    }
    .kb-category{
        height:auto;
    }
    .car-btn {
        margin-top: 20px;
        width: 100%;
    }
    .kb-category .card-body .kb-category-icon span {
        width: 70px;
    height: 70px;
    font-size: 30px;
    }
    
    html body .page-wrapper {
    background: #3fbdc3;
}
}

@media only screen and (max-width: 868px) {
    .topLogoRow{
    padding:0px; 
    margin-bottom: 0px;
    margin-top: 100px;
    }
    .mainTopRow {
        margin-top: -20px;
    }
    .box-wrapper {
        display:contents;
        padding: 0px;
    }
    .background {
        background-position: -1084px -409px;
    }
    .innerCard{
        height:auto;
        width: auto;
    margin-left: 0;
    }
    .box-main-woraper {
        display:block;
    }
    .kb-category{
        height:auto;
    }
    .car-btn {
        margin-top: 20px;
        width: 100%;
    }
    .kb-category .card-body .kb-category-icon span {
        width: 70px;
    height: 70px;
    font-size: 30px;
    }
    
    html body .page-wrapper {
    background: #3fbdc3;
}
}
</style>