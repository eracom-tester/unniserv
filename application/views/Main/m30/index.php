

<!-- banner top begin -->
<section class="banner-section">
    <div class="overlay">
        <div class="video-overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="<?= $panel_url;?>img/football.mp4" type="video/mp4">
        </video>

        <div class="container">
            <div class="total-slide">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="banner-text">
                            <h1 class="font-light">Take Your</h1>
                            <h1 class="font-bold">Invest Startegy</h1>
                            <h1 class="font-regular">to the next level</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3 class="banner-bottom-text">WE PROVIDE BEST FINANCIAL SOLUTIONS FOR YOUR BUSINESS</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="get-start">
                            <a href="<?= base_url();?>login">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="statics-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                        <div class="single-statics no-border">
                            <div class="icon-box">
                                <i class="ren-reguser"></i>
                            </div>
                            <div class="text-box">
                                <span class="d-none counter">1030</span>
                                <span class="counter">1030</span>
                                <h4>Registered users</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                        <div class="single-statics">
                            <div class="icon-box">
                                <i class="ren-web"></i>
                            </div>
                            <div class="text-box">
                                <span class="counter">108</span>
                                <h4>Countries  supported</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                        <div class="single-statics">
                            <div class="icon-box">
                                <i class="ren-withdraw"></i>
                            </div>
                            <div class="text-box">
                                <span class="counter">208000</span>
                                <h4>Withdrawn each month</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                        <div class="single-statics">
                            <div class="icon-box">
                                <i class="ren-people"></i>
                            </div>
                            <div class="text-box">
                                <span class="counter">500</span>
                                <h4>Active investors daily</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner top end -->

<!-- calculator top begin -->
<section class="calculate-aria">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="calculate-left">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <div class="icon-box">
                                <i class="ren-calculator"></i>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                            <div class="form-group">
                                <h2 class="amount">Enter Investment Amount</h2>
                                <div class="input-dropdown">
                                    <input type="text" name="text" placeholder="$200" class="main-form calculator-invest">
                                    <div class="form-dropdown">
                                        <select class="form-btn-dropdown calculator-profit">
                                            <option value="1">1% Daily For Ever</option>
                                            <option value="2">2% Daily For Ever</option>
                                            <option value="3">3% Daily For Ever</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 text-center">
                <div class="calculate-right">
                    <div class="row justify-content-end">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="text-box">
                                <span class="counter calculator-result-daily">212</span>
                                <h4>Daily Profit</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="text-box">
                                <span class="counter calculator-result-weekly">1484</span>
                                <h4>Weekly Profit</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="text-box">
                                <span class="counter calculator-result-monthly">6360</span>
                                <h4>Monthly Profit</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- calculator top end -->

<!-- about section begin -->
<section class="about-section navigation" id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="about-left">
                    <div class="about-text">
                        <h5 class="about-title">Welcome To <?php echo $this->conn->company_info('company_name');?></h5>
                        <h2 class="about-subtitle">A few words About Us</h2>
                        <h5 class="about-details">We Are The <span>Best Financial Solutions</span> Company Ever.<br> Your Complete Financial Solutions.</h5>  
                        <p class="about-description"><?php echo $this->conn->company_info('company_name');?> Business services are a recognisable subset of economic services, and share their characteristics. The essential difference is that <?php echo $this->conn->company_info('company_name');?> are concerned about the building of service systems in order to deliver value to their customers and to act in the roles of service provider and service consumer.</p>
                    </div>

                    <div class="about-box">
                        <div class="row text-center">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="single-about-box">
                                    <div class="icon-box-outer bg-eff">
                                        <div class="icon-box">
                                            <i class="ren-efficiency"></i>
                                        </div>
                                    </div>
                                    <h3>Professional team</h3>
                                    <div class="hover-box hover-left">
                                        <a href="#"><i class="ren-arrowright"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="single-about-box">
                                    <div class="icon-box-outer bg-ex">
                                        <div class="icon-box">
                                            <img src="<?= $panel_url;?>img/expierence.svg" alt="#">
                                        </div>
                                    </div>
                                    <h3>Profitable <br> plans</h3>
                                    <div class="hover-box hover-top">
                                        <a href="#"><i class="ren-arrowright"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="single-about-box">
                                    <div class="icon-box-outer bg-security">
                                        <div class="icon-box">
                                            <i class="ren-security"></i>
                                        </div>
                                    </div>
                                    <h3>Instant payments</h3>
                                    <div class="hover-box hover-right">
                                        <a href="#"><i class="ren-arrowright"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="single-about-box">
                                    <div class="icon-box-outer bg-trans">
                                        <div class="icon-box">
                                            <i class="ren-transparent"></i>
                                        </div>
                                    </div>
                                    <h3>Great referral system</h3>
                                    <div class="hover-box hover-left">
                                        <a href="#"><i class="ren-arrowright"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="single-about-box">
                                    <div class="icon-box-outer bg-simple">
                                        <div class="icon-box">
                                            <i class="ren-simple"></i>
                                        </div>
                                    </div>
                                    <h3>24/7 <br> live support</h3>
                                    <div class="hover-box hover-bottom">
                                        <a href="#"><i class="ren-arrowright"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="single-about-box">
                                    <div class="icon-box-outer bg-com">
                                        <div class="icon-box">
                                            <i class="ren-compliant"></i>
                                        </div>
                                    </div>
                                    <h3>Professional Advisor</h3>
                                    <div class="hover-box hover-right">
                                        <a href="#"><i class="ren-arrowright"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="about-right">
                    <div class="video-box">
                        <img src="<?= $panel_url;?>img/about-bg.jpg" alt="#">
                        <div class="icon-box">
                            <a href="" class="video-play-btn popup-video"><i class="ren-playicon"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->

<!-- choose section begin -->
<section class="choose-section">
    <div class="overlay">
        <div class="container-fruit text-center">
            <div class="row mr-0 ml-0 d-flex justify-content-center">
                <div class="col-xl-8 col-lg-12">
                    <div class="choose-text">
                        <h5 class="choose-title">Boost Your Money</h5>
                        <h2 class="choose-subtitle">Why Should Choose Us?</h2>
                        <p class="choose-title-describe">Our service gives you better result and savings, as per your requirement and you can manage your investments from anywhere either form home or work place, at any time.</p>
                    </div>
                </div>
            </div>

            <div class="choose-section-carousel">

                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/daily-income.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Investment Planning</h2>
                            <h3 class="single-item-description">Investment planning is the method of matching your monetary dreams and targets with your economic resources. Investment planning is a technique that starts offevolved when you are clear on your monetary dreams and objectives.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/withdraw1.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Development Planning</h2>
                            <h3 class="single-item-description">Business improvement plans supply education to companies in purpose, which includes mission, imaginative and prescient and values, as properly as product or service, goal target audience and the techniques they will use to reap success.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/invest-fild.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Performance Evaluation</h2>
                            <h3 class="single-item-description">Performance assessment is the technique by means of which supervisor or guide examines and evaluates an employee's work conduct with the aid of evaluating it with preset standards, archives the outcomes of the evaluation and makes use of the results.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/security.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Financial Planning</h2>
                            <h3 class="single-item-description">Is the mission of deciding how a enterprise will have enough money to attain its strategic dreams and objectives. Usually, a business enterprise creates a Financial Plan right away after the imaginative and prescient and targets have been set.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/customer-service.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Business Growth</h2>
                            <h3 class="single-item-description">Business Growth is a stage the place the enterprise reaches the factor for enlargement and seeks additional preferences to generate extra profit.It is a feature of the commercial enterprise lifecycle, industry increase trends.</h3>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/daily-income.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Investor Reporting</h2>
                            <h3 class="single-item-description">Investors in non-public fairness and actual asset dollars more and more require excessive satisfactory and regularly occurring reporting about their investments in the shape of documents, dashboards and uncooked data.</h3>
                        </div>
                    </div>
                </div>
                <!--<div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/withdraw1.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">FASTEST PAYMENTS</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/invest-fild.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Easy to Use</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/security.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">HIGH SECURITY</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/customer-service.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">24/7 Support</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/daily-income.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Daily Income</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/withdraw1.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">FASTEST PAYMENTS</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/invest-fild.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Easy to Use</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/security.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">HIGH SECURITY</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/customer-service.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">24/7 Support</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/daily-income.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Daily Income</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/withdraw1.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">FASTEST PAYMENTS</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/invest-fild.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Easy to Use</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/security.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">HIGH SECURITY</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/customer-service.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">24/7 Support</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/daily-income.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Daily Income</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/withdraw1.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">FASTEST PAYMENTS</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/invest-fild.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Easy to Use</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/security.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">HIGH SECURITY</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/customer-service.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">24/7 Support</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/daily-income.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Daily Income</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/withdraw1.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">FASTEST PAYMENTS</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/invest-fild.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Easy to Use</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/security.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">HIGH SECURITY</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="<?= $panel_url;?>img/customer-service.svg" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">24/7 Support</h2>
                            <h3 class="single-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                        </div>
                    </div>
                </div>-->

            </div>
        </div>
    </div>
</section>
<!-- choose section end -->

<!-- invest section begin -->
<section class="invest-section">
    <div class="overlay">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="invest-text">
                        <h5 class="invest-title">How You Can Invest Your</h5>
                        <h2 class="invest-subtitle">Money More Smartly</h2>
                        <p class="invest-title-describe">It’s a simple way to start to invest. You don’t need a deep wallet to start behalf. Pick an amount you can afford, and build your behalf over time.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 text-center reunir-content-center">
                    <div class="single-box location-left">
                        <div class="img-box">
                            <div class="font-side">
                                <img src="<?= $panel_url;?>img/sign-up.svg" alt="#">
                            </div>
                            <div class="back-side">
                                <img src="<?= $panel_url;?>img/sign-up.svg" alt="#">
                            </div>
                        </div>
                        <div class="text-box">
                            <a href="#">FIRST STEP<i class="ren-arrowright"></i></a>
                            <h3>SING UP</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center reunir-content-center">
                    <div class="single-box">
                        <div class="img-box">
                            <div class="font-side">
                                <img src="<?= $panel_url;?>img/deposit.svg" alt="#">
                            </div>
                            <div class="back-side">
                                <img src="<?= $panel_url;?>img/deposit.svg" alt="#">
                            </div>
                        </div>
                        <div class="text-box">
                            <a href="#">SECOND STEP<i class="ren-arrowright"></i></a>
                            <h3>Make a Deposit</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center reunir-content-center">
                    <div class="single-box location-right">
                        <div class="img-box">
                            <div class="font-side">
                                <img src="<?= $panel_url;?>img/withdraw-1.svg" alt="#">
                            </div>
                            <div class="back-side">
                                <img src="<?= $panel_url;?>img/withdraw-1.svg" alt="#">
                            </div>
                        </div>
                        <div class="text-box">
                            <a href="#">THIRD STEP<i class="ren-arrowright"></i></a>
                            <h3>Withdraw</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- invest section end -->

<!-- advantage section begin -->
<section class="advantage-section">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="advantage-text">
                        <h5 class="advantage-title">Our Biggest</h5>
                        <h2 class="advantage-subtitle">Advantage</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                    <div class="single-box">
                        <div class="icon-box">
                            <i class="ren-team"></i>
                        </div>
                        <div class="text-box">
                            <h2>PROFESSIONAL TEAM</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                    <div class="single-box">
                        <div class="icon-box">
                            <i class="ren-profitable-plan"></i>
                        </div>
                        <div class="text-box">
                            <h2>PROFITABLE PLANS</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                    <div class="single-box">
                        <div class="icon-box">
                            <i class="ren-control-panel"></i>
                        </div>
                        <div class="text-box">
                            <h2>Secure Control Panel</h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- advantage section end -->

<!-- investment section begin -->
<section class="investment-section" id="investment-section">
    <div class="overlay">
        <div class="container text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="investment-text">
                        <h5 class="investment-title">INVESTMENT OFFER</h5>
                        <h2 class="investment-subtitle">Our Investment Plans</h2>
                        <p class="investment-title-describe"><?php echo $this->conn->company_info('company_name');?> provides a straightforward and transparent mechanism to attract investments and make more profits.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="investment-section-carousel">

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit1.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>6</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$10</b></span>
                                        <span class="right">Max.: <b>$249</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit2.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>7</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$250</b></span>
                                        <span class="right">Max.: <b>$9999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit3.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$1000</b></span>
                                        <span class="right">Max.: <b>$4999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit4.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$5k</b></span>
                                        <span class="right">Max.: <b>$10k</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit1.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>6</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$10</b></span>
                                        <span class="right">Max.: <b>$249</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit2.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>7</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$250</b></span>
                                        <span class="right">Max.: <b>$9999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit3.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$1000</b></span>
                                        <span class="right">Max.: <b>$4999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit4.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$5k</b></span>
                                        <span class="right">Max.: <b>$10k</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit1.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>6</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$10</b></span>
                                        <span class="right">Max.: <b>$249</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit2.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>7</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$250</b></span>
                                        <span class="right">Max.: <b>$9999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit3.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$1000</b></span>
                                        <span class="right">Max.: <b>$4999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit4.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$5k</b></span>
                                        <span class="right">Max.: <b>$10k</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit1.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>6</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$10</b></span>
                                        <span class="right">Max.: <b>$249</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit2.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>7</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$250</b></span>
                                        <span class="right">Max.: <b>$9999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit3.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$1000</b></span>
                                        <span class="right">Max.: <b>$4999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit4.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$5k</b></span>
                                        <span class="right">Max.: <b>$10k</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit1.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>6</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$10</b></span>
                                        <span class="right">Max.: <b>$249</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit2.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>7</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$250</b></span>
                                        <span class="right">Max.: <b>$9999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit3.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$1000</b></span>
                                        <span class="right">Max.: <b>$4999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit4.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$5k</b></span>
                                        <span class="right">Max.: <b>$10k</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit1.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>6</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$10</b></span>
                                        <span class="right">Max.: <b>$249</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit2.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>7</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$250</b></span>
                                        <span class="right">Max.: <b>$9999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit3.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$1000</b></span>
                                        <span class="right">Max.: <b>$4999</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                    <img src="<?= $panel_url;?>img/deposit-bg.jpg" alt="#">
                                </div>
                                <div class="icon-box">
                                    <img src="<?= $panel_url;?>img/deposit4.svg" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>8</b>%</span>
                                    <h3>Daily For Even</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>$5k</b></span>
                                        <span class="right">Max.: <b>$10k</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="#">Make Deposit</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- investment section end -->

<!-- calculator bottom begin -->
<section class="calculate-aria-second">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="calculate-left">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <div class="icon-box">
                                <i class="ren-calculator"></i>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                            <div class="form-group">
                                <h2 class="amount">Enter Investment Amount</h2>
                                <div class="input-dropdown">
                                    <input type="text" name="text" placeholder="$200" class="main-form calculator-area-invest">
                                    <div class="form-dropdown">
                                        <select class="form-btn-dropdown calculator-area-profit">
                                            <option value="1">1% Daily For Ever</option>
                                            <option value="2">2% Daily For Ever</option>
                                            <option value="3">3% Daily For Ever</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 text-center">
                <div class="calculate-right">
                    <div class="row justify-content-end">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="text-box">
                                <span class="counter calculator-result-area-daily">212</span>
                                <h4>Daily Profit</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="text-box">
                                <span class="counter calculator-result-area-weekly">1484</span>
                                <h4>Weekly Profit</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="text-box">
                                <span class="counter calculator-result-area-monthly">6360</span>
                                <h4>Monthly Profit</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- calculator bottom end -->

<!-- affiliate section begin -->
<section class="affiliate-section" id="affiliate-section">
    <div class="overlay">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="affiliate-text">
                        <h5 class="affiliate-title">What You’ll Get As</h5>
                        <h2 class="affiliate-subtitle">An Affiliate Partner</h2>
                        <p class="affiliate-title-describe">We give you the opportunity to earn money by recommending our website to others. You can start
                            earning money even if you do not invest. Promote our website wherever you are. Create posts on online
                            forums and social networks. Remember to use the referral link. Build your structure and receive
                            a commission from three levels whenever someone makes a deposit.
                            Earnings from the affiliate program are immediately available in the account balance. You can
                            invest or withdraw funds at any time.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="part-cart">
                        <a href="#">I want to Join</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- affiliate section end -->

<!-- referral section begin -->
<section class="referral-section">
    <div class="container">
        <div class="row referral-section-item">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="referral-img">
                    <img src="<?= $panel_url;?>img/referral-img.png" alt="#">
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="referral-section-right">
                    <div class="referral-text">
                        <h5 class="referral-title">Referral commission and</h5>
                        <h2 class="referral-subtitle">Membership Level</h2>
                        <p class="referral-title-describe">Refferal Commmission and Membership Levels are of 3 levels as below</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-11 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="referral-single-item">
                                        <div class="icon-box">
                                            <i class="ren-people1"></i>
                                        </div>
                                        <div class="text-box">
                                            <span class="percentage">8%</span>
                                            <h4 class="item-text">Direct Referral</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="referral-single-item">
                                        <div class="icon-box">
                                            <i class="ren-people2 bg-second"></i>
                                        </div>
                                        <div class="text-box">
                                            <span class="percentage">4%</span>
                                            <h4 class="item-text">Second Line</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="referral-single-item">
                                        <div class="icon-box">
                                            <i class="ren-people3 bg-third"></i>
                                        </div>
                                        <div class="text-box">
                                            <span class="percentage">2%</span>
                                            <h4 class="item-text">Third Line</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- referral section end -->

<!-- deposit section begin -->
<section class="deposit-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="deposit-text">
                    <h5 class="deposit-title">Convenient Money</h5>
                    <h2 class="deposit-subtitle">Deposit & Withdrawal</h2>
                    <p class="deposit-title-describe">Depositing or withdrawing money is simple.We support several payment methods, which depend on what country your payment account is located in.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-12 reunir-content-center">
                <div class="row d-flex justify-content-start">
                    <div class="col-lg-8">
                        <div class="payment-methods-outer">
                            <div class="payment-methods">
                                <div class="icon-gallery">
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="<?= $panel_url;?>img/card-icon.png" alt="#">
                                        </div>
                                        <h5 class="icon-title">Credit Card</h5>
                                    </div>
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="<?= $panel_url;?>img/paypal.png" alt="#">
                                        </div>
                                        <h5 class="icon-title">Paypal</h5>
                                    </div>
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="<?= $panel_url;?>img/bitcoin.png" alt="#">
                                        </div>
                                        <h5 class="icon-title">Bitcoin</h5>
                                    </div>
                                </div>
                                <div class="icon-gallery">
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="<?= $panel_url;?>img/litecoin.png" alt="#">
                                        </div>
                                        <h5 class="icon-title">Litecoin</h5>
                                    </div>
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="<?= $panel_url;?>img/ethereum.png" alt="#">
                                        </div>
                                        <h5 class="icon-title">Ethereum</h5>
                                    </div>
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="<?= $panel_url;?>img/ripple.png" alt="#">
                                        </div>
                                        <h5 class="icon-title">Ripple</h5>
                                    </div>
                                </div>
                                <div class="link-box">
                                    <a href="#">View All Option</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12 mt-4">
                <div class="deposit-section-right">
                    <div class="icon-box-outer">
                        <div class="icon-box">
                            <i class="ren-withdraw2"></i>
                        </div>
                    </div>
                    <div class="icon-text">
                        <h2 class="icon-title">No Limit</h2>
                        <p class="icon-title-describe">Unlimited maximum withdrawal amount</p>
                    </div>
                </div>
                <div class="deposit-section-right">
                    <div class="icon-box-outer">
                        <div class="icon-box icon-box-orange">
                            <i class="ren-deposit5"></i>
                        </div>
                    </div>
                    <div class="icon-text">
                        <h2 class="icon-title">Withdrawal in 24 /7</h2>
                        <p class="icon-title-describe">Deposit – instantaneous</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- deposit section end -->

<!-- transaction section begin -->
<section class="transaction-section">
    <div class="right-img">
        <img class="right-ellipse1" src="<?= $panel_url;?>img/transaction-bg-ellipse-01.png" alt="#">
        <img class="right-shape1" src="<?= $panel_url;?>img/transaction-bg-shape-01.png" alt="#">
        <img class="right-shape2" src="<?= $panel_url;?>img/transaction-bg-shape-01.png" alt="#">
        <img class="right-ellipse2" src="img/transaction-bg-ellipse-02.png" alt="#">
    </div>
    <div class="left-img">
        <img class="left-ellipse1" src="<?= $panel_url;?>img/transaction-bg-ellipse-03.png" alt="#">
        <img class="left-ellipse2" src="<?= $panel_url;?>img/transaction-bg-ellipse-03.png" alt="#">
        <img class="left-ellipse3" src="<?= $panel_url;?>img/transaction-bg-ellipse-03.png" alt="#">
        <img class="left-shape1" src="<?= $panel_url;?>img/transaction-bg-shape-01.png" alt="#">
        <img class="left-shape2" src="<?= $panel_url;?>img/transaction-bg-shape-01.png" alt="#">
        <img class="left-shape3" src="<?= $panel_url;?>img/transaction-bg-shape-01.png" alt="#">
        <img class="left-shape4" src="<?= $panel_url;?>img/transaction-bg-shape-01.png" alt="#">
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="transaction-text text-center">
                    <h5 class="transaction-title">User Statistics</h5>
                    <h2 class="transaction-subtitle">Latest Transaction</h2>
                    <p class="transaction-title-describe">Our goal is to simplify investing so that anyone can be an investor. With this in mind, we hand-pick the investments we offer on our platform.</p>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7 col-md-11">

                <ul class="nav nav-pills mb-3 justify-content-center transaction-bnt-outline" id="transaction-pills-tab" role="tablist">
                    <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link active" id="transaction-pills-deposits-tab" data-toggle="pill" href="#pills-deposits" role="tab" aria-controls="pills-deposits" aria-selected="true">
                            <span class="d-flex align-items-center"><i class="ren-deposits d-flex align-items-center"></i>LAST<br>DEPOSITS</span>
                        </a>
                    </li>
                    <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link" id="transaction-pills-withdrawal-tab" data-toggle="pill" href="#pills-withdrawals" role="tab" aria-controls="pills-withdrawal" aria-selected="false">
                            <span class="d-flex align-items-center"><i class="ren-investo d-flex align-items-center"></i>TOP<br>WITHDRAWALS</span>
                        </a>
                    </li>
                    <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link" id="transaction-pills-investing-tab" data-toggle="pill" href="#pills-invest" role="tab" aria-controls="pills-invest" aria-selected="false">
                            <span class="d-flex align-items-center"><i class="ren-people3 d-flex align-items-center"></i>LAST<br>INVESTORS</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content transaction-tab-content" id="transaction-pills-tabContent">
                    <div class="tab-pane fade show active transaction-tab-pane" id="pills-deposits" role="tabpanel" aria-labelledby="transaction-pills-deposits-tab">
                        <table class="table table-responsive transaction-table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Daily Dividend</th>
                                <th scope="col">Amounts</th>
                                <th scope="col">Deposit By</th>
                                <th scope="col">Currency</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img1.png" alt="#">
                                    </div>
                                    <span>Jim Adams</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-bitcoins"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img2.png" alt="#">
                                    </div>
                                    <span>Willie Barton</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-ethereum1"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img3.png" alt="#">
                                    </div>
                                    <span>Kim Mccoy</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-bitcoins"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img4.png" alt="#">
                                    </div>
                                    <span>Sheryl Tran</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-ripple"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img5.png" alt="#">
                                    </div>
                                    <span>Toby Davis</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-dollar"></i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade transaction-tab-pane" id="pills-withdrawals" role="tabpanel" aria-labelledby="transaction-pills-withdrawal-tab">
                        <table class="table table-responsive transaction-table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Daily Dividend</th>
                                <th scope="col">Amounts</th>
                                <th scope="col">Deposit By</th>
                                <th scope="col">Currency</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img1.png" alt="#">
                                    </div>
                                    <span>Jim Adams</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-bitcoins"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img2.png" alt="#">
                                    </div>
                                    <span>Willie Barton</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-ethereum1"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img3.png" alt="#">
                                    </div>
                                    <span>Kim Mccoy</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-bitcoins"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img4.png" alt="#">
                                    </div>
                                    <span>Sheryl Tran</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-ripple"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img5.png" alt="#">
                                    </div>
                                    <span>Toby Davis</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-dollar"></i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade transaction-tab-pane" id="pills-invest" role="tabpanel" aria-labelledby="transaction-pills-investing-tab">
                        <table class="table table-responsive transaction-table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Daily Dividend</th>
                                <th scope="col">Amounts</th>
                                <th scope="col">Deposit By</th>
                                <th scope="col">Currency</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img1.png" alt="#">
                                    </div>
                                    <span>Jim Adams</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-bitcoins"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img2.png" alt="#">
                                    </div>
                                    <span>Willie Barton</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-ethereum1"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img3.png" alt="#">
                                    </div>
                                    <span>Kim Mccoy</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-bitcoins"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img4.png" alt="#">
                                    </div>
                                    <span>Sheryl Tran</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-ripple"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="<?= $panel_url;?>img/table-img5.png" alt="#">
                                    </div>
                                    <span>Toby Davis</span>
                                </th>
                                <td>$10.50</td>
                                <td>$0.05</td>
                                <td>$718</td>
                                <td>21 DAYS</td>
                                <td><i class="ren-dollar"></i></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="part-cart">
                    <a href="#">Browse More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- transaction section end -->

<!-- download section begin -->
<section class="download-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <div class="download-text">
                    <h5 class="download-title"></h5>
                    <h2 class="download-subtitle">Why Choose Us</h2>
                    <p class="download-title-describe">What We Are Offering To Customers</p>
                </div>
                <div class="app-features">
                    <div class="single-features">
                        <div class="icon-box-outer">
                            <div class="icon-box">
                                <i class="ren-calculator1"></i>
                            </div>
                        </div>
                        <h3 class="single-features-text">DAILY CLOSING DAILY WITHDRAWAL</h3>
                    </div>
                    <div class="single-features">
                        <div class="icon-box-outer">
                            <div class="icon-box">
                                <i class="ren-paperless"></i>
                            </div>
                        </div>
                        <h3 class="single-features-text">MINIMUM WITHDRWAL 200</h3>
                    </div>
                    
                    <div class="single-features">
                        <div class="icon-box-outer">
                            <div class="icon-box">
                                <i class="ren-dashboard"></i>
                            </div>
                        </div>
                        <h3 class="single-features-text">WITHDRWAL REQUEST TIME 9 AM TO 2 PM </h3>
                    </div>
                    <div class="single-features">
                        <div class="icon-box-outer">
                            <div class="icon-box">
                                <i class="ren-dashboard"></i>
                            </div>
                        </div>
                        <h3 class="single-features-text">TDS 5 % ADMIN 10% TOTAL 15 % DIDUCT </h3>
                    </div>
                </div> 
                <!--<div class="download-buttons">
                    <div class="group-btn">
                        <a href="#" class="btn"><i class="ren-google-play"></i>GET IT ON <br><b>GOOGLE PLAY</b></a>
                        <a href="#" class="btn">DOWNLOAD ON THE <br><b>APP STORE</b><i class="ren-apple-store"></i></a>
                    </div>
                </div>-->
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="right-area">
                    <img class="ellipse-01" src="<?= $panel_url;?>img/download-bg-ellipse-01.png" alt="#">
                    <img class="ellipse-02" src="<?= $panel_url;?>img/download-bg-ellipse-02.png" alt="#">
                    <img class="ellipse-03" src="<?= $panel_url;?>img/download-bg-ellipse-03.png" alt="#">
                    <img class="ellipse-04" src="<?= $panel_url;?>img/download-bg-ellipse-04.png" alt="#">
                    <img class="smart-phone" src="<?= $panel_url;?>img/download-smart-phone.png" alt="#">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- download section end -->

<!-- testimonial section begin -->
<section class="testimonial-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="testimonial-text text-center">
                    <h5 class="testimonial-title">Happy Clients</h5>
                    <h2 class="testimonial-subtitle">Testimonial of Clients</h2>
                    <p class="testimonial-title-describe">We have many happy investors invest with us .Some impresions from our Customers! PLease read some of the lovely things our Customers say about us.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">


                <div class="testimonial-carousel">
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <p class="client-describe">"<?php echo $this->conn->company_info('company_name');?> explained how things work and why it would help. We are pleased with the result and we highly recommend<?php echo $this->conn->company_info('company_name');?>."</p>
                            <h2 class=""></h2>
                            <h4 class="client-date">Vikas Sharma</h4>
                        </div>
                        <div class="carousel-img">
                            <div class="img-outline">
                                <img src="<?= $panel_url;?>img/table-img1.png" alt="#">
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <p class="client-describe">"Each client story module links to the client's website, Facebook page, and app in both the Android and Apple app stores and sets people up for success."</p>
                           
                            <h4 class="client-date">Munish Panday</h4>
                        </div>
                        <div class="carousel-img">
                            <div class="img-outline">
                                <img src="<?= $panel_url;?>img/table-img3.png" alt="#">
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <p class="client-describe">"Even though I am a pro commercial enterprise proprietor myself, I am certain that there may be constantly room for growth, inspiration, and new ideas."</p>
                            <h4 class="client-date">Shiwani Gupta</h4>
                        </div>
                        <div class="carousel-img">
                            <div class="img-outline">
                                <img src="<?= $panel_url;?>img/table-img2.png" alt="#">
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <p class="client-describe">"Our consultant used to be very educated and helpful. <?php echo $this->conn->company_info('company_name');?> made a range of hints to assist enhance our systems."</p>
                            <h4 class="client-date">Palak Dua</h4>
                        </div>
                        <div class="carousel-img">
                            <div class="img-outline">
                                <img src="<?= $panel_url;?>img/table-img4.png" alt="#">
                            </div>
                        </div>
                    </div>

                    <!--<div class="carousel-item">
                        <div class="carousel-caption">
                            <p class="client-describe">“Great service! I have been worried about investing. But when I came here. I don't have to worry anymore’’</p>
                            <h2 class="client-name">Joy Kelley</h2>
                            <h4 class="client-date">United kingdom, 28th April,2019</h4>
                        </div>
                        <div class="carousel-img">
                            <div class="img-outline">
                                <img src="<?= $panel_url;?>img/table-img2.png" alt="#">
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <p class="client-describe">“Great service! I have been worried about investing. But when I came here. I don't have to worry anymore’’</p>
                            <h2 class="client-name">Joy Kelley</h2>
                            <h4 class="client-date">United kingdom, 28th April,2019</h4>
                        </div>
                        <div class="carousel-img">
                            <div class="img-outline">
                                <img src="<?= $panel_url;?>img/table-img2.png" alt="#">
                            </div>
                        </div>
                    </div>-->

                </div>

            </div>
        </div>
    </div>
</section>
<!-- testimonial section end -->

<!-- questions section begin --
<div class="questions-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <div class="questions-text">
                    <h5 class="questions-title">Got Any Questions</h5>
                    <h2 class="questions-subtitle">We've Got Answers</h2>
                 </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <ul class="nav nav-pills mb-3 justify-content-center questions-nav-pills" id="questions-pills-tab" role="tablist">
                    <li class="nav-item questions-nav-item">
                        <a class="nav-link questions-nav-link active" id="questions-pills-basic-tab" data-toggle="pill" href="#pills-basic" role="tab" aria-controls="questions-pills-basic-tab" aria-selected="true">Basic Question</a>
                    </li>
                    <li class="nav-item questions-nav-item">
                        <a class="nav-link questions-nav-link" id="questions-pills-investing-tab" data-toggle="pill" href="#pills-investing" role="tab" aria-controls="questions-pills-investing-tab" aria-selected="false">Investing Question</a>
                    </li>
                    <li class="nav-item questions-nav-item">
                        <a class="nav-link questions-nav-link" id="questions-pills-withdrawal-tab" data-toggle="pill" href="#pills-withdrawal" role="tab" aria-controls="questions-pills-withdrawal-tab" aria-selected="false">Withdrawal Question</a>
                    </li>
                    <li class="nav-item questions-nav-item">
                        <a class="nav-link questions-nav-link" id="questions-pills-referral-tab" data-toggle="pill" href="#pills-referral" role="tab" aria-controls="questions-pills-referral-tab" aria-selected="false">Referral Program</a>
                    </li>
                </ul>
                <div class="tab-content questions-tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active questions-tab-pane" id="pills-basic" role="tabpanel" aria-labelledby="questions-pills-basic-tab">
                        <div class="questions-accordion" id="withdrawal-accordion">
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="withdrawal-headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link questions-btn-link" data-toggle="collapse" data-target="#withdrawal-collapseOne" aria-expanded="true" aria-controls="questions-pills-basic-tab">
                                            What Are The Main Advantages Of Reunir?
                                        </button>
                                    </h5>
                                </div>

                                <div id="withdrawal-collapseOne" class="collapse show questions-show" aria-labelledby="withdrawal-headingOne" data-parent="#withdrawal-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="withdrawal-headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#withdrawal-collapseTwo" aria-expanded="false" aria-controls="questions-pills-investing-tab">
                                            Is It Free Of Charge To Open An Account?
                                        </button>
                                    </h5>
                                </div>
                                <div id="withdrawal-collapseTwo" class="collapse questions-show" aria-labelledby="withdrawal-headingTwo" data-parent="#withdrawal-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="withdrawal-headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#withdrawal-collapseThree" aria-expanded="false" aria-controls="questions-pills-withdrawal-tab">
                                            How Secure User Accounts And Personal Data?
                                        </button>
                                    </h5>
                                </div>
                                <div id="withdrawal-collapseThree" class="collapse questions-show" aria-labelledby="withdrawal-headingThree" data-parent="#withdrawal-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="withdrawal-headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#withdrawal-collapseFour" aria-expanded="false" aria-controls="questions-pills-referral-tab">
                                            How Many Accounts Can I Open On The Site?
                                        </button>
                                    </h5>
                                </div>
                                <div id="withdrawal-collapseFour" class="collapse questions-show" aria-labelledby="withdrawal-headingFour" data-parent="#withdrawal-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade questions-tab-pane" id="pills-investing" role="tabpanel" aria-labelledby="questions-pills-investing-tab">
                        <div class="questions-accordion" id="investing-accordion">
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="investing-headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link questions-btn-link" data-toggle="collapse" data-target="#investing-collapseOne" aria-expanded="true" aria-controls="questions-pills-basic-tab">
                                            What Are The Main Advantages Of Reunir?
                                        </button>
                                    </h5>
                                </div>

                                <div id="investing-collapseOne" class="collapse show questions-show" aria-labelledby="investing-headingOne" data-parent="#investing-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="investing-headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#investing-collapseTwo" aria-expanded="false" aria-controls="questions-pills-investing-tab">
                                            Is It Free Of Charge To Open An Account?
                                        </button>
                                    </h5>
                                </div>
                                <div id="investing-collapseTwo" class="collapse questions-show" aria-labelledby="investing-headingTwo" data-parent="#investing-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="investing-headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#investing-collapseThree" aria-expanded="false" aria-controls="questions-pills-withdrawal-tab">
                                            How Secure User Accounts And Personal Data?
                                        </button>
                                    </h5>
                                </div>
                                <div id="investing-collapseThree" class="collapse questions-show" aria-labelledby="investing-headingThree" data-parent="#investing-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="investing-headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#investing-collapseFour" aria-expanded="false" aria-controls="questions-pills-referral-tab">
                                            How Many Accounts Can I Open On The Site?
                                        </button>
                                    </h5>
                                </div>
                                <div id="investing-collapseFour" class="collapse questions-show" aria-labelledby="investing-headingFour" data-parent="#investing-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade questions-tab-pane" id="pills-withdrawal" role="tabpanel" aria-labelledby="questions-pills-withdrawal-tab">
                        <div class="questions-accordion" id="basic-accordion">
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="basic-headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link questions-btn-link" data-toggle="collapse" data-target="#basic-collapseOne" aria-expanded="true" aria-controls="questions-pills-basic-tab">
                                            What Are The Main Advantages Of Reunir?
                                        </button>
                                    </h5>
                                </div>

                                <div id="basic-collapseOne" class="collapse show questions-show" aria-labelledby="basic-headingOne" data-parent="#basic-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="basic-headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#basic-collapseTwo" aria-expanded="false" aria-controls="questions-pills-investing-tab">
                                            Is It Free Of Charge To Open An Account?
                                        </button>
                                    </h5>
                                </div>
                                <div id="basic-collapseTwo" class="collapse questions-show" aria-labelledby="basic-headingTwo" data-parent="#basic-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="basic-headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#basic-collapseThree" aria-expanded="false" aria-controls="questions-pills-withdrawal-tab">
                                            How Secure User Accounts And Personal Data?
                                        </button>
                                    </h5>
                                </div>
                                <div id="basic-collapseThree" class="collapse questions-show" aria-labelledby="basic-headingThree" data-parent="#basic-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="basic-headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#basic-collapseFour" aria-expanded="false" aria-controls="questions-pills-referral-tab">
                                            How Many Accounts Can I Open On The Site?
                                        </button>
                                    </h5>
                                </div>
                                <div id="basic-collapseFour" class="collapse questions-show" aria-labelledby="basic-headingFour" data-parent="#basic-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade questions-tab-pane" id="pills-referral" role="tabpanel" aria-labelledby="questions-pills-referral-tab">
                        <div class="questions-accordion" id="referral-accordion">
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="referral-headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link questions-btn-link" data-toggle="collapse" data-target="#referral-collapseOne" aria-expanded="true" aria-controls="questions-pills-basic-tab">
                                            What Are The Main Advantages Of Reunir?
                                        </button>
                                    </h5>
                                </div>

                                <div id="referral-collapseOne" class="collapse show questions-show" aria-labelledby="referral-headingOne" data-parent="#referral-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="referral-headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#referral-collapseTwo" aria-expanded="false" aria-controls="questions-pills-investing-tab">
                                            Is It Free Of Charge To Open An Account?
                                        </button>
                                    </h5>
                                </div>
                                <div id="referral-collapseTwo" class="collapse questions-show" aria-labelledby="referral-headingTwo" data-parent="#referral-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="referral-headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#referral-collapseThree" aria-expanded="false" aria-controls="questions-pills-withdrawal-tab">
                                            How Secure User Accounts And Personal Data?
                                        </button>
                                    </h5>
                                </div>
                                <div id="referral-collapseThree" class="collapse questions-show" aria-labelledby="referral-headingThree" data-parent="#referral-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="referral-headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#referral-collapseFour" aria-expanded="false" aria-controls="questions-pills-referral-tab">
                                            How Many Accounts Can I Open On The Site?
                                        </button>
                                    </h5>
                                </div>
                                <div id="referral-collapseFour" class="collapse questions-show" aria-labelledby="referral-headingFour" data-parent="#referral-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- questions section end -->

<!-- signup section begin -->
<section class="signup-section">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="signup-text">
                        <h5 class="signup-title">CREATE YOUR PERSONAL ACCOUNT</h5>
                        <h2 class="signup-subtitle">Get Started Now</h2>
                        <p class="signup-title-describe">Get Started Now, Create your personal account as a first step to become a sucessfull investor. Are you ready to start earning with us?</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 d-flex justify-content-end align-items-center reunir-content-center">
                    <div class="signup-right-text">
                        <a href="#">Signup Now<i class="ren-arrowright"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- signup section end -->

<!-- contact-us section begin -->
<section class="contact-us-section" id="contact-us-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="contact-us-text">
                    <h5 class="contact-us-title">Contact Us</h5>
                    <h2 class="contact-us-subtitle">Get in Touch</h2>
                    <p class="contact-us-title-describe">Please feel free to contact us through our support center. Simply choose the appropriate support options to send us your questions, concerns and/or feedback.Our customer service team is ready to overcome any issues that might occur.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-img">
                    <img src="<?= $panel_url;?>img/contact-us.jpg" alt="#">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="contact-form">
                    <form id="contactForm" method="post" class="contact-form-aqua">
                        <h2 class="contact-head">Send Us a Massage</h2>
                        <input type="text" name="name" required="" placeholder="Name *" class="contact-frm active">
                        <input type="email" name="email" required="" placeholder="Email *" class="contact-frm">
                        <textarea name="message" id="message" placeholder="Message *" class="contact-msg"></textarea>
                        <input id="form-submit" type="submit" value="SUBMIT NOW" class="contact-btn">
                        <br>
                        <br>
                        <span class="msgSubmit"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-us section end -->

