@extends('assets.frontend.layout')
@php
if(isset($metadata) && !empty($metadata->title)) {
	$title = $metadata->title;
}else {
	$title = 'Home';
}
@endphp
@section('title',$title)
@section('content')
<div class="covid-stripe">
	<div class="container">
		<div class="covid-stripe-text"><span>Offering same day STI Screening with absolute privacy guaranteed. Use a pseudonym and pay in cash with no appointment needed.&nbsp;</span></div></div></div>
<section class="banner">
	<source srcset="public/assets/frontend/images/banner.webp">&nbsp;
	<source srcset="public/assets/frontend/images/banner.jpg"> <img src="public/assets/frontend/images/banner.jpg" alt="stdcheck" class="img-fluid home-banner-img fr-fic fr-dii">
	<div class="banner-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-12"><span class="caption1">Private, Confidential <span class="highlight">&nbsp;Sexual Health Testing</span>, Treatment and Contraceptive services</span>

					<ul>
						<li><strong>Offering Gold Standard STD Testing Exclusively.</strong></li>
						<li>Fast, Private &amp; Affordable <strong>STD</strong> Testing</li>
						<li>100% Confidential <strong>STD</strong> Testing</li>
						<li><strong>Same-Day STD Testing Available</strong> Without Appointments</li>
					</ul>
					<a href="#" data-bs-toggle="modal" data-bs-target="#appoinment_modal" data-backdrop="static" data-keyboard="false" class="book_appoinment"><img src="public/assets/frontend/images/appoinment.png" alt="BOOK AN APPOINTMENT" class="fr-fic fr-dii"><span>BOOK AN APPOINTMENT<i class="btn-note"><small>Absolute discretion</small></i></span></a></div></div></div></div>
</section>
<section class="welcome-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="welcome-content">

					<h1>Welcome to the STD Check Clinic in London</h1>

					<h2>Private Sexual Health Clinic for Same day STD Testing</h2>

					<p>We&#39;re a leading private sexual health (GUM) clinic situated in London&#39;s heart. At STD Check Clinic in London, we provide private STI testing and STD Screening in a secure, welcoming environment. Discuss your sexual health concerns openly with our dedicated team of doctors, nurses, and health care assistants, all committed to ensuring your sexual and reproductive health.</p>

					<h2>Details about the Clinic:</h2>

					<p>We recognise that STD/STI testing and treatment are intensely personal. Thus, discretion and absolute privacy are foundational to our services. Let us guide you in selecting the right sexual health screen tailored to your needs. For urgent situations, book a same-day appointment with our general practitioners or walk in during our business hours. You can also consult our specialist about contraceptive options and laboratory-conducted pregnancy <a href="https://www.stdcheck.london/blood-test">blood testing</a> for definitive results.</p>

					<h2>Testing Details:</h2>

					<p>We exclusively employ PCR (Polymerase Chain Reaction) testing, the gold standard in sexual health diagnostics. This method surpasses cheaper culture testing in terms of reliability. Some services might cut corners with less expensive tests, potentially offering inaccurate results to patients.</p>

					<p>Our dedication to superior service means we never compromise on our tests&#39; clinical quality. All analyses are carried out using PCR testing at Central London&#39;s largest laboratory, our trusted partner for over ten years. A courier personally collects our samples, ensuring your sample is processed at the laboratory typically within an hour of your clinic appointment.</p>

					<h2>Conclusion:</h2>

					<p>Are you looking for same day STI testing near you? Find your nearest Walk-in STD clinic in London today.</p><a class="btn_std" href="https://www.stdcheck.london/sti-and-std-test">What are STDs?</a></div></div>
			<div class="col-lg-4 border_left">
				<div class="video-section">
					<figure class="figure">
						<a class="js-embed-iframe" href="https://www.youtube.com/embed/ucpGqmAlJkM?autoplay=1&rel=0" target="_blank"><img src="public/assets/frontend/images/video-bg-min.jpg" alt="Private, Confidential Sexual Health Testing, Treatment and Contraceptive services" class="img-fluid fr-fic fr-dii"></a>
						<figcaption>Private, Confidential Sexual Health Testing, Treatment and Contraceptive services</figcaption>
					</figure>
				</div></div>
			<div class="col-md-12">

				<h2>Sexual Health Testing:</h2>
				<div class="treatments_div">
					<div class="row">
						<div class="col-md-3">

							<ul class="bullet_points home-list">
								<li><a href="#">HIV.</a></li>
								<li><a href="#">Chlamydia.</a></li>
							</ul>
						</div>
						<div class="col-md-3">

							<ul class="bullet_points home-list">
								<li><a href="#">Syphilis.</a></li>
								<li><a href="#">Herpes.</a></li>
							</ul>
						</div>
						<div class="col-md-3">

							<ul class="bullet_points home-list">
								<li><a href="#">Gonorrhoea.</a></li>
								<li><a href="#">Hepatitis.</a></li>
							</ul>
						</div>
						<div class="col-md-3">

							<ul class="bullet_points home-list">
								<li><a href="#">HPV.</a></li>
								<li>Bacterial.</li>
							</ul>
						</div></div></div></div></div></div>
</section>
<section class="home-services">
	<div class="container">
		<div class="row pd">
			<div class="col-lg-6 col-md-12">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6 box first-box">

						<h3>Private and Accurate Sexual Health Screening</h3>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 box second-box">

						<h3>Fast and Appropriate Treatment</h3>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 box second-box">

						<h3>Same Day, Evening and Weekend Walk-in Services</h3>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 box first-box">

						<h3>Contraceptive and Gynaecological Services</h3>
					</div></div></div>
			<div class="col-lg-6 col-md-12">

				<h2>Our doctors can assist you with:</h2>

				<ul class="bullet_points home-list">
					<li>Testing and treatment for sexually transmitted infections.</li>
					<li>Emergency Contraception.</li>
					<li>Pregnancy testing.</li>
					<li>Information and referrals for abortions.</li>
					<li>Testing for bacterial vaginosis.</li>
					<li>Free condoms.</li>
					<li>Rapid HIV testing.</li>
					<li>Proper counseling related to sexual health problems, lessen risks and improve relationship.</li>
					<li>Vaccinations for HIV, HPV and pre IVF STI testing.</li>
					<li>Information about PReP.</li>
					<li>Counseling and advice for safe sex.</li>
					<li>HIV PEP for Post Exposure Prophylaxis.</li>
					<li>HIV PrEP support for Pre Exposure Prophylaxis.</li>
				</ul>
			</div></div>
		<div class="why-choose-section">
			<div class="row no-gutters">
				<div class="col-md-6 p-0">
					<div class="why_choose_us_description">

						<h2>Why Choose Our Walk in Sexual Health (GUM) Clinic in London for STI testing?</h2>

						<ul class="bullet_points">
							<li>Guaranteed Discretion and Confidentiality &ndash; your results are never shared or accessed without your consent.</li>
							<li>Same day private STI testing services in London without the need to book an appointment.</li>
							<li>Open weekday evenings until 9pm and both Saturday and Sunday from 10am-2pm.</li>
							<li>Fast results with Serology testing returning within 24hrs.</li>
							<li>Guaranteed results with the gold standard PCR testing in world-renowned laboratories.</li>
							<li>Treatment options, guidance and prescriptions if a positive result is confirmed.</li>
							<li>Wide range of contraceptive and counseling services at your disposal.</li>
							<li>Same Day appointments or Book Online.</li>
							<li>Fast Screening without the need for intrusive swabs.</li>
							<li>Early STD screen including HIV from 10 days post contact.</li>
							<li>HIV test results within 4 hours.</li>
							<li>Female/Male HPV testing for high risk subtypes by simple swab.</li>
							<li>Competitive rates &ndash; Our individual test prices are industry standard and our packages offer an unbeatable combination of comprehensive examination, testing and treatment.</li>
							<li>Simple procedure for testing &ndash; At STD Check London, our doctors make the testing procedure easy and convenient.</li>
							<li>Quick and Discreet &ndash; You can use a pseudonym when registering at the clinic, for complete discretion, and testing typically takes 15-20 minutes.</li>
							<li>Complete satisfaction &ndash; We take proper care of all our patients. If you have any queries or doubts, our doctors will be happy to assist anytime you give us a call.</li>
						</ul>
					</div></div>
				<div class="col-md-6 p-0">
					<div class="why-choose-img">
						<source srcset="public/assets/frontend/images/why-choose-us.jpg" type="image/webp">&nbsp;
						<source srcset="public/assets/frontend/images/why-choose-us.jpg" type="image/jpeg"> <img id="image" src="public/assets/frontend/images/why-choose-us.jpg" alt="why choose us" class="img-fluid fr-fic fr-dii"></div></div></div></div></div>
</section>
<div class="text-center callout">

	<h3>Take Charge of Your Health</h3>

	<p>Getting tested is not only <strong>quick and easy</strong>, it&rsquo;s the only way to <strong>know for sure</strong> if you do or do not have an STD.</p><a data-bs-toggle="modal" data-bs-target="#appoinment_modal" data-backdrop="static" data-keyboard="false" class="large button_new ffab fa-arrow-right">Put Your Mind at Ease Today</a>

	<p class="txt-cent cta-txt">or<strong class="d-block"><a href="tel:020 37457523"><i class="fa fa-phone"></i> 020 37457523</a></strong></p>
</div>
<div class="blog_content">
	<br>
</div>
<section class="faq">
	<div class="container">

		<h2 class="text-center">FAQs on STD Testing:</h2>
		<div class="accordion" id="accordionExample">
			<div class="row panel-group">
				<div class="col-md-6">
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingOne">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">&nbsp;What are sexually transmited infections or STIs?&nbsp;</button>
						</h3>
						<div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Sexually transmitted diseases or STDs, also known as sexually transmitted infections (STIs) or venereal diseases (VD), are infections that passes due to anal, oral and vaginal sex. Generally, STIs do not show any symptoms at the initial stage and hence, it is necessary to perform screening regularly.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingTwo">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">&nbsp;What STD tests are done?&nbsp;</button>
						</h3>
						<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">There are various options available for patients wishing to screen for STDs. Our packages offer the best combination of value and comprehensiveness &ndash; with options to screen for the most prevalent infections through to the full range of complete STD screening as well as specific testing for individual infections if you have any suspicions.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingThree">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">&nbsp;When will get my STD tests results?&nbsp;</button>
						</h3>
						<div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Our standard blood tests for HIV, Syphilis and Hepatitis have a turnaround time of 24 hours, and urine cultures for Chlamydia, Gonorrhoea, Mycoplasma, Trichomoniasis, Ureaplasma, Gardenerella and Herpes I &amp; II takes between 2 and 4 days to get accurate results.
								<br>
								<br>We also offer an expedited service with results within 4 hours for HIV, Syphilis, Hepatitis, Chlamydia and Gonorrhoea. Please note these tests incur an additional fee.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingFour">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">&nbsp;Do sexually transmitted diseases go away?&nbsp;</button>
						</h3>
						<div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Sometimes you can have an STD without showing any signs or symptoms. If left untreated or undetected the consequences may be severe. As such, it is recommended to undergo regular screening if you are sexually active. It is rare for bacterial infections to resolve themselves, but they can be cured if treated promptly. Other such as Herpes and HIV are not curable but their symptoms can be managed with appropriate medication.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingFive">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">&nbsp;Is it possible to get an STD from kissing?&nbsp;</button>
						</h3>
						<div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Yes, you can catch herpes by kissing someone on the mouth. There is also a very small risk of catching HIV by kissing someone who has a sore or cut in the mouth whilst you also have an open sore or cut in the mouth.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingSix">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">&nbsp;How will I know if I am having an STD?&nbsp;</button>
						</h3>
						<div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">You need to get tested to know if you have any sexually transmitted disease. Many STDs do not show obvious symptoms. If you remain sexually active, then this includes anal and/or oral sex as well as vaginal intercourse. When the doctors ask this question, they want to know if you have had sex since your last screening that might expose you to an STD or pregnancy. STD tests are an important part of your routine check-up. Thus, if you have any serious concerns about an STD, it is advised to visit a doctor and get tested immediately.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingSeven">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven">&nbsp;What are the symptoms of having STDs?&nbsp;</button>
						</h3>
						<div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Many STDs don&rsquo;t have any symptoms or show signs that are extremely mild to notice. However, if you have any of these symptoms, it is advised to consult with your doctor as you may have an STD.

								<ul>
									<li>None</li>
									<li>Discharge or abnormal fluid that may be yellow or white from the penis or vagina.</li>
									<li>Unexplained rash</li>
									<li>Burning sensation at the time of urination.</li>
									<li>Sores, blisters, bumps or warts in your genital area along with inner and outer lips, clitoris and vagina for women. However, in case of men, this includes testicles and penis.</li>
								</ul>
							</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingEight">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight">&nbsp;How do I prevent getting an STD?&nbsp;</button>
						</h3>
						<div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Several things can be done to lessen the chances of getting an STD.

								<ul>
									<li><strong>Stay faithful</strong> &ndash; When you have sex with one person whom you trust. Having intercourse with someone who is not infected means you will not get an STD from them and they too won&rsquo;t get it from you.</li>
									<li><strong>Use condoms</strong> &ndash; Wear polyurethane or latex condoms as they provide proper protection against STDs when used in the right way every time you enjoy sex with your partner.</li>
									<li><strong>Choose fewer partners</strong> &ndash; The more people you enjoy sex with, the greater will be your chances of getting an STD. If you have had sex with new partners, it is important to get tested.</li>
									<li>Do not mix alcohol and drugs with sex. Getting drunk or high may affect your ability to take smart decisions related to sex.</li>
									<li>It is suggested not to use IV street drugs and never share needles as many STDs get transmitted through blood.</li>
									<li>Do not have sex as abstinence is the most effective way to prevent an STD.</li>
								</ul>
							</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingNine">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine">&nbsp;Is it possible to get an STD if I am virgin?&nbsp;</button>
						</h3>
						<div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">It actually depends on how you treat yourself as a virgin. STDs may get transmitted due to anal and oral sex, but many people consider if they haven&rsquo;t had vaginal intercourse, they are still a virgin. Some STDs usually spread through intimate skin-to-skin contact though there is not any kind of penetration.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingTen">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen">&nbsp;How are condoms effective against all STDs?&nbsp;</button>
						</h3>
						<div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Condoms are not completely effective but when used correctly every time, they can help to stay protected from STDs that spread due to body fluids such as &ndash; vaginal secretions or semen. They do not protect you against STDs that get transmitted due to skin-to-skin contact.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingEleven">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingEleven">&nbsp;Can I get sexually transmitted disease more than once?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingEleven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">It is quite possible to get Herpes through kissing, but the chances are less with most STDs.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingTwelve">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingTwelve">&nbsp;Can you detect an STD from a blood test?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingTwelve" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Most STDs can be tested with a blood test and urine sample. At STD Check London, our doctors check for the following STDs:

								<ul>
									<li>Gonorrhoea</li>
									<li>Chlamydia</li>
									<li>Syphilis</li>
									<li>Herpes</li>
									<li>HIV</li>
									<li>Mycoplasma Genitalium</li>
									<li>Hepatitis</li>
								</ul>There are certain cases when the blood tests are not accurate as other kinds of testing. It might take one month or longer after getting exposed to some STIs for appropriate blood tests. For example, if HIV has been contracted, it may take almost 28 days to fewer months for the tests to detect the infection.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingThirteen">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingThirteen">&nbsp;Do STD urine tests provide accurate results?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingThirteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Common way to get negative Gonorrhoea and Chlamydia tests would be by testing often after you had sex or by urinating soon when the test is done with urine. With Gonorrhoea, the results will be accurate just one week after exposure, however, with Chlamydia, most results are accurate just 2 weeks after the exposure.</div></div></div></div>
				<div class="col-md-6">
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingFourteen">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingFourteen">&nbsp;What STDs can be cured?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingFourteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">STDs that occur due to bacteria may be cured by taking antibiotics. Some bacterial STDs consist of &ndash;Gonorrhoea, Chlamydia, Mycoplasma Genitalium and Ureaplasma. STDs caused by viruses can be controlled, but not treated. In case you get a viral STD, you will have it always.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingFifteen">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingFifteen">&nbsp;How much time will it take to get results from urine test for STDs?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingFifteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">It usually requires 3 to 4 days to get the results from either a urine test or a swab for different STDs.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingSeventeen">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingSeventeen">&nbsp;How much does it cost to get tested for different STDS?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingSeventeen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">With different health care centres, the costs might differ depending on the area to choose. The prices for different tests usually range between &pound;50 and &pound;1250.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingSeventeen">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingSeventeen">&nbsp;Can sexually transmitted diseases go on their own?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingSeventeen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Some STDs such as syphilis, HIV and hepatitis B may lead to some infections in your body. Sometimes, you may get an STD without any signs or symptoms. However, at other times, the symptoms might go away by themselves. Though you cannot treat some STDs, most of them can be treated when detected on time.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingEighteen">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingEighteen">&nbsp;What are some signs of sexually transmitted infections?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingEighteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Some signs are irregular discharge from the penis, anus or vagina during urination, skin growths or lumps around the genitals or anus.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingNineteen">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingNineteen">&nbsp;Is it possible to see your GP for STI testing?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingNineteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">If you are having sexually transmitted infection or STI, it is advised to visit your nearest sexual health clinic in London. It is usually possible to treat STIs successfully, but you need to check the symptoms at an early stage.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingTwenty">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingTwenty">&nbsp;What is a GUM clinic?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingTwenty" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">A genitourinary medicine or GUM clinic is where you need to attend a session between the doctor and the patient. These are usually located at the health care centre or hospital that offers different sexual health services such as &ndash; contraception and contraception advice, testing as well as treating sexually transmitted infections. Certain STI include &ndash; chlamydia, syphilis, genital warts, gonorrhea and counselling for HIV and AIDS.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingTwentyOne">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingTwentyOne">&nbsp;What is the work of a GUM clinic?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingTwentyOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Sexual health clinics usually provide different services such as treating and testing different sexually transmitted infections or STIs.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingTwentyTwo">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingTwentyTwo">&nbsp;What do GUM clinics need to test for?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingTwentyTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Performing necessary tests and treating sexually transmitted infections is confidential and most infections can be cured. A genitourinary medicine (GUM) clinic has some specialists who have done specialisation in sexual health. They help in conducting tests and treatments for different STIs.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingTwentyThree">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingTwentyThree">&nbsp;Is it possible to get a disease after enjoying oral sex?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingTwentyThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Yes, it is quite possible to get an STD from receiving oral sex without using a condom. Herpes may spread easily from one partner to other at the time of oral sex as it gets transmitted through skin-to-skin contact and not fluids only. Others such as chlaymdia and gonorrhoea may cause infection to the throat.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingTwentyFour">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingTwentyFour">&nbsp;Is it possible to treat STD completely?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingTwentyFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">Bacterial STDs may get treated by taking antibiotics when the treatment starts early. Though you cannot treat viral STDs, you will be able to manage its symptoms with proper medications. There is a vaccine available against hepatitis B, however, it will not be of much help if you are suffering from this disease.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingTwentyFive">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingTwentyFive">&nbsp;How can an STD start?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingTwentyFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">STDs usually get transmitted through direct contact with infected body fluids such as &ndash; blood, semen or vaginal fluids. They may spread by contact with infected skin, mucous membranes and mouth sores. You might get exposed to infected body fluids and skin through oral, anal or vaginal sex.</div></div></div>
					<div class="accordion-item panel-default">

						<h3 class="accordion-header" id="headingTwentySix">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleheadingTwentySix">&nbsp;How do you know if you are having an STD?&nbsp;</button>
						</h3>
						<div id="collapseEleheadingTwentySix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
							<div class="accordion-body">STD symptoms may range from mild to severe. Many women suspects an STD infection when there is an abnormal symptom in the genital region, such as rash, discharge, itching, pelvic or vaginal pain. The only way to know if you have an STD is to get tested on time.</div></div></div></div></div></div></div>
</section>
@endsection
