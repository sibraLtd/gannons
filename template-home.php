<?php
/*
Template Name: Sibra Home

*/
?>
<?php get_header(); ?>

<?php $mt_slider_on_off = ot_get_option( 'mt_slider_on_off', 'on');

	if($mt_slider_on_off == 'on'):
 ?>

<section id="slider-home">
    <div class="flexslider flexslider-home">
    <ul class="slides">
    
     <?php
	    $mt_slides = ot_get_option( 'mt_slides', array() ); 
		
		if(!empty($mt_slides)) :
                                                
		foreach( $mt_slides as $mt_slide ) {      
		
		?>
        
        <li> <img src="<?php echo $mt_slide['mt_slide_image']?>" alt="" />
          <div class="flex-caption">
            <h3><?php echo $mt_slide['mt_caption_title']?></h3>
            <?php /*if (!empty(trim($mt_slide['mt_caption_subtitle']))) { ?><h4><?php echo $mt_slide['mt_caption_subtitle']?></h4><?php } */ ?>
          </div>
        </li>
    
	<?php  }//end foreach 
	
		endif;
	 ?>	
    
    </ul>
    <div class="gannons-search-sm gannons-search-home" style="position: absolute;bottom: 20px;margin: 0 auto;text-align: center;z-index: 999;float: right;left: 0;right: 0;"><?php get_search_form();  ?></div>
    </div><!--end flexslider-->
  </section><!--slider-home-->
  
<?php endif;?> 
  <?php get_template_part( 'top-fixed-menu' ); ?>   
  
  
 <div class="container-fluid homeTop homePage"> 
     <div class="row">
      <div class="container"> 
          <div class="row">
              <div class="col-xs-12 col-md-8 ">
                  <div class="intro-msg">                                
                      <h2>Gannons commercial solicitors:-</h2>                    
                        <ul>
                        <li><strong>A boutique commercial law firm;</strong></li> 
                        <li><strong>Serving private companies, individuals, partnerships, shareholders and investors;</strong></li>
                        <li><strong>Commercial, experienced, proportionate;</strong></li>                        
                        <li><strong>Based in central London.</strong></li>
                        </ul>
                        <div class="clearFloat"></div>
                   </div>
              </div> <!-- /col-md-8 -->
              <div class="hidden-xs hidden-sm visible-md-4 col-md-4 homePageBoxes">

                      <?php ubermenu( 'events' ); ?>

                  </div>
              
              
              
              
          </div> <!-- /row -->
      </div> <!-- container -->
     </div> 
 </div>

  
  
  
  
<div class="container-fluid practiceAreas homePage">
      <div class="row">  
          <div class="container">
              <div class="row"> 
                  <div class="col-md-12">
                      <h2 class="section-title practice">Commercial practice areas</h2>
                  </div>
              </div>
              <div class="row practices">
                  <div class="col-xs-6 col-sm-4  col-md-2">
                      <div class="practice-item">
                          <a href="<?php echo get_site_url(); ?>/company/"> 
                              <div class="hoverInfo">
                               <ul>
                                  <li>Company formation</li>
                                  <li>Directors' duties</li>
                                  <li>Investment</li> 
                                  <li>Shareholders</li> 
                                  <li>Acquisitions & disposals</li>
                              </ul>
                              </div> <!-- hoverInfo -->
                              <div class="practice-icon"><i class="fa fa-university"></i></div>
                              <h5 class="practice-title">Company</h5>                                  
                          </a>
                          </div> <!-- practice-item --> 
                  </div> <!-- col-twenty --> 
                          
                  <div class="col-xs-6 col-sm-4  col-md-2">
                      <div class="practice-item">
                          <a href="<?php echo get_site_url(); ?>/contract/">
                              <div class="hoverInfo">
                                  <ul> 
                                      <li>Commercial agreements</li>
                                      <li>Confidentiality</li>
                                      <li>Commercial debt</li>
                                      <li>Media contracts</li>
                                      <li>Contract termination</li>
                                  </ul>
                              </div> <!-- hoverInfo -->
                              <div class="practice-icon"><i class="fa fa-certificate"></i></div>
                              <h5 class="practice-title">Contracts</h5>
                          </a>
                      </div> <!-- practice-item --> 
                  </div> <!-- col-twenty --> 
                  
                    <div class="col-xs-6 col-sm-4  col-md-2">
                      <div class="practice-item">
                          <a href="<?php echo get_site_url(); ?>/employee-shares/">
                              <div class="hoverInfo">
                                 <ul> 
                                   <li>Company share option plan</li>
                                   <li>EMI Scheme</li>
                                   <li>Growth shares</li>                                    
                                   <li>Long term incentive plans</li>
                                   <li>Taxable value unquoted shares</li>
                                  </ul>
                              </div> <!-- hoverInfo -->
                              <div class="practice-icon"><i class="fa fa-trophy"></i></div>
                              <h5 class="practice-title">Shares for employees</h5>
                          </a>
                      </div> <!-- practice-item --> 
                  </div> <!-- col-twenty --> 
                  
                  
                  
                  <div class="col-xs-6 col-sm-4  col-md-2">
                      <div class="practice-item">
                          <a href="<?php echo get_site_url(); ?>/employment/">
                              <div class="hoverInfo">
                                <ul> 
                                    <li>Employees
                                        <ul>
                                            <li>Bonus disputes</li>
                                            <li>Settlement agreements</li>
                                        </ul></li> 
                                    <li>Employers
                                        <ul><li>Alter employment terms</li>
                                            <li>Disciplinary</li>
                                            <li>Redundancy</li>
                                        </ul>
                                    </li>
                                  </ul>  
                              </div> <!-- hoverInfo -->
                              <div class="practice-icon"><i class="fa fa-users"></i></div>
                              <h5 class="practice-title">Employment</h5>
                          </a>
                      </div> <!-- practice-item --> 
                  </div> <!-- col-twenty --> 
                  
                  <div class="col-xs-6 col-sm-4  col-md-2">
                      <div class="practice-item">
                          <a href="<?php echo get_site_url(); ?>/intellectual-property/">
                              <div class="hoverInfo">
                                 <ul>                                  
                                     <li>IP Ownership<ul>
                                             <li>Copyright</li>
                                             <li>Design rights</li>
                                             <li>Trademarks</li>
                                         </ul></li>
                                     <li>IP Exploitation</li>
                                   <li>IP Infringement & disputes</li> 
                                   <li>IP Tax benefits</li>                                    
                                  </ul>
                              </div> <!-- hoverInfo -->
                              <div class="practice-icon"><i class="fa fa-cogs"></i></div>
                              <h5 class="practice-title">Intellectual Property</h5>
                          </a>
                      </div> <!-- practice-item --> 
                  </div> <!-- col-twenty --> 
                  
                  
                   <div class="col-xs-6 col-sm-4  col-md-2">
                      <div class="practice-item">
                          <a href="<?php echo get_site_url(); ?>/litigation-disputes/">
                              <div class="hoverInfo">
                                  <ul> 
                                      <li>Derivative claims</li>
                                      <li>Injunctions<ul>
                                              <li>Asset recovery</li>
                                              <li>Restrict activities</li>
                                              <li>vs damages</li>
                                          </ul></li>
                                      <li>Mediation</li>
                                  </ul>
                              </div> <!-- hoverInfo -->
                              <div class="practice-icon"><i class="fa fa-gavel"></i></div>
                              <h5 class="practice-title">Litigation & disputes</h5>
                          </a>
                      </div> <!-- practice-item --> 
                  </div> <!-- col-twenty --> 
                  

                  

                  
                  
              </div> <!-- row practices -->
          </div> <!-- /container -->  
      </div>  <!-- row --> 
  </div> <!-- container fluid practiceAreas --> 
 
  <div class="container-fluid latestStuff homePage">
      <div class="row">         
           <div class="container">
              <div class="row">
                  
                  <div class="hidden-xs hidden-sm visible-md-4 col-md-4 homePageBoxes">
                        <?php ubermenu( 'insights' ); ?>            
                  </div>
                  <div class="hidden-xs hidden-sm visible-md-4 col-md-4 homePageBoxes">
                           <?php ubermenu( 'latestcasestudies' ); ?>    
                  </div>
                  <div class="hidden-xs hidden-sm visible-md-4 col-md-4">
                   <div class="practice-item quickFact">
                         
                              <h5 class="practice-title"><i class="fa fa-info-circle"></i>&nbsp;Quick Fact.....</h5>
                              <p>Our team includes lawyers, specialist tax advisors and accountants delivering commercial depth. Experience matters.</p>
                              <div class="recruiting">
                              <p><strong>We're recruiting</strong></p>
                              <?php ubermenu( 'home-page-jobs' ); ?>  
                               </div> 
                                               </div> <!-- practice-item -->  
                  
              </div>
                  
              </div> <!-- /row --> 
           </div> <!-- container -->
        
           
      </div> <!-- /row --> 
  </div> <!-- container-fluid latestStuff --> 
      
      
  
  <div class="container-fluid news homePage">    
      <div class="row">          
          <div class="container background">
           
             <div class="row"> 
                  <div class="hidden-xs hidden-sm visible-md-12 col-md-12">
                      <h2 class="section-title practice">
                          Creating The News
                      </h2>
                  </div>
              </div>  
               
          <div class="row">
              
 <div class="hidden-xs hidden-sm visbible-md-4 col-md-4">
 <video width="320" height="240" controls poster="http://www.gannons.co.uk/wp-content/themes/sibra/videos/matt-gingell-on-sky-tv.png">
  <source src="http://www.gannons.co.uk/wp-content/themes/sibra/videos/matt-gingell-discusses-employment-law-and-deliveroo-on-sky-tv.mp4" type="video/mp4">

 
Your browser does not support the video tag.
</video>
     <p style:"text-align:left;">Matt Gingell explains whether Deliveroo riders are self-employed or workers on Sky TV</p> 
  </div>
<div class="hidden-xs hidden-sm visbible-md-2 col-md-2">
<div class="article"><a title="Patent box is simply a reduced corporation tax rate on profits from patentable activies. R&D tax credit incentivises R&D spending" href="http://www.gannons.co.uk/wp-content/uploads/2016/09/Lexis-Nexis-tax-credits-a-national-interest-test.pdf" target="_blank"><img title="Since 2000, over 120,000 R&D claims have been made for a combined tax relief of over £11bn" src="http://www.gannons.co.uk/wp-content/uploads/2016/09/Lexis-Nexis-tax-credits-a-national-interest-test.png" alt="The UK is renowned for its knowledge based economy." />Lexis Nexis: Tax credits - a national interest test</a></div>
</div>
              
              
              
              
              <div class="hidden-xs hidden-sm visbible-md-2 col-md-2">
<div class="article"><a title="Employees and workers have rights. Firms like Uber and Deliveroo classify their people as self-employed. Matt explains the relevant employment law." href="http://www.gannons.co.uk/wp-content/uploads/2016/09/guardian-is-employment-law-fit-for-the-gig-economy-matt-gingell.pdf" target="_blank"><img title="Employees and workers have rights. Firms like Uber and Deliveroo classify their people as self-employed. Matt explains the relevant employment law." src="http://www.gannons.co.uk/wp-content/uploads/2016/09/guardian-is-employment-law-fit-for-the-gig-economy-matt-gingell.jpg" alt="The key point is what is written in the contract does not determine employment status" />Guardian: Is employment law fit for the gig economy?</a></div>
</div>

<div class="hidden-xs hidden-sm visbible-md-2 col-md-2">
<div class="article"><a title="Should businesses be able to stop ex-employees competing against them" href="http://www.gannons.co.uk/wp-content/uploads/2016/06/Should-businesses-stop-ex-employees-competing-against-them-matt-gingell-The-Independent.pdf" target="_blank"><img title="Should businesses be able to stop ex-employees competing against them. Government is reviewing non-compete restrictions" src="http://www.gannons.co.uk/wp-content/uploads/2016/06/Should-businesses-stop-ex-employees-competing-against-them-matt-gingell-The-Independent.jpg" alt="Should businesses be able to stop ex-employees competing against them. Government is reviewing non-compete restrictions, but doesn't existing law provide sufficient safeguards" />Independent: Should businesses stop ex-employees competing against them?</a></div>
</div>
 
<div class="hidden-xs hidden-sm visbible-md-2 col-md-2">
<div class="article"><a title="Catherine Gannons quote on Facebook stock scheme" href="http://www.gannons.co.uk/wp-content/uploads/2016/05/Catherine-Gannon-Facebook-hit-by-lawsuit-The-Independent.pdf" target="_blank"><img  title="It is not uncommon for a company to issue various classes of share, says Catherine Gannon." src="http://www.gannons.co.uk/wp-content/uploads/2016/05/Catherine-Gannon-Facebook-hit-by-lawsuit-The-Independent-2.png" alt="Non voting shares are issued where a company wishes to raise funds but retain control says Catherine Gannon." />The Independent: Catherine Gannon quoted on Facebook's stock scheme</a></div>
</div>
              
 
          </div> <!-- /row -->
      </div> <!-- /container --> 
    </div> <!-- /col-md-12 --> 
  </div> <!-- row -->
</div> <!-- /container-fluid news -->
  
<div class="container-fluid yourTeam homePage">
      <div class="row">          
              <div class="container">
                <div class="row"> 
                      <div class="col-md-12">
                          <h2 class="section-title practice">
                              Your partners
                          </h2>
                      </div> <!-- col-md-12 -->
                  </div> <!-- /row --> 
          
                  
              
              <div class="row">
                  <div class="col-xs-6 col-sm-4  col-md-2">
                       <h2>Commercial</h2>
                      <a href="<?php echo get_site_url(); ?>/solicitor/john-deane/" target="_blank" 
                         title="25 years’ experience providing corporate and commercial legal services to SMEs and their investors.">
                      <img style="margin-right:5px; width:100%" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/john-deane-formal-200.jpg" 
                            title="25 years’ experience providing corporate and commercial legal services to SMEs and their investors."
                            alt="John Deane: specialises in the creative industries – advertising and marketing, design (product/graphic/fashion), Theatre film and TV, IT software and computer services, publishing, galleries, music and performing arts,">
                      <h2>John Deane</h2></a>
                      <h2>Latest insight</h2>
                      <?php wp_reset_query(); $temp_query = $wp_query; ?>
	<?php query_posts("author=32&showposts=1"); ?>
                      <ul class="authorPosts">
	<?php while (have_posts()) : the_post(); ?>
                          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                      </ul>    
                  </div>
                  
                   <div class="col-xs-6 col-sm-4  col-md-2">
                     <h2>Company</h2>
                    <a href="<?php echo get_site_url(); ?>/solicitor/helen-curtis/" target="_blank" 
                         title="Helen has considerable experience in corporate advisory work advising companies, investors and shareholders.">
                      <img style="margin-right:5px; width:100%" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/helen-curtis-200.jpg" 
                           title="Helen’s clients are mainly private companies and SMEs, partnerships and other businesses."
                           alt="Helen Curtis specialises in company commercial work and provide general advisory and transactional services to corporate businesses " >
                      <h2>Helen Curtis</h2></a>
                      <h2>Latest insight</h2>
                      <?php wp_reset_query(); $temp_query = $wp_query; ?>
	<?php query_posts("author=8&showposts=1"); ?>
                      <ul class="authorPosts">
	<?php while (have_posts()) : the_post(); ?>
                          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                      </ul>    
                  </div>
                  
                  
                  
                   <div class="col-xs-6 col-sm-4  col-md-2">
                       <h2>Dispute resolution</h2>
                      <a href="<?php echo get_site_url(); ?>/solicitor/alex-kleanthous/" target="_blank" 
                         title="Alex is a sharp and tenacious problem-solver specialising in contentious and non-contentious employment law, commercial litigation, TUPE and advice on team moves.">
                      <img style="margin-right:5px; width:100%" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/alex-kleanthous-formal-200.jpg" 
                            title="Alex advises both employees and employers and has a strong corporate client base who come to him to resolve their difficult business disputes."
                            alt="Alex Kleanthous is a sharp and tenacious problem-solver specialising in litigation and dispute resolution">
                      <h2>Alex Kleanthous</h2></a>
                      <h2>Latest insight</h2>
                      <?php wp_reset_query(); $temp_query = $wp_query; ?>
	<?php query_posts("author=5&showposts=1"); ?>
                      <ul class="authorPosts">
	<?php while (have_posts()) : the_post(); ?>
                          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                      </ul>    
                  </div>
                  
                 
                  
                  <div class="col-xs-6 col-sm-4   col-md-2">
                      <h2>Employee share scheme</h2>
                      <a href="<?php echo get_site_url(); ?>/solicitor/catherine-gannon/" target="_blank" 
                         title="Catherine finds and drives through solutions to the full spectrum of complex problems clients need to thrive.">
                      <img style="margin-right:5px; width:100%" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/catherine-gannon-navy-200.jpg" alt="Catherine Gannon is passionate about helping SMEs grow and thrive. With a tax and accountancy as well as legal background, Catherine stands out from the average lawyer and has the rare ability to put commerciality into practice." 
                            title="As the Managing Partner of Gannons, Catherine has presided over substantial growth in the firm, seeing turnover increase annually.  Gannons posted record results last year and the current year is looking stronger." >
                      <h2>Catherine Gannon</h2></a>
                      <h2>Latest insight</h2>
                      <?php wp_reset_query(); $temp_query = $wp_query; ?>
	<?php query_posts("author=2&showposts=1"); ?>
                      <ul class="authorPosts">
	<?php while (have_posts()) : the_post(); ?>
                          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                      </ul>    
                  </div>
                  
                
                  
                  <div class="col-xs-6 col-sm-4  col-md-2">
                      <h2>Employment</h2>
                     <a href="<?php echo get_site_url(); ?>/solicitor/matt-gingell/" target="_blank" 
                         title="Matt has considerable experience in contentious and non-contentious employment law, and advises both employers and employees across a range of sectors.">
                      <img style="margin-right:5px; width:100%" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/matt-gingell-formal-200.jpg" 
                           title="Matt advises organisations on all HR matters including grievance and disciplinary procedures, redundancy situations, restrictive covenants, TUPE and business immigration"
                           alt="Matt Gingell advises organisations on HR matters including grievance and disciplinary procedures, redundancy situations, restrictive covenants, TUPE and business immigration. " >
                      <h2>Matt Gingell</h2></a>
                      <h2>Latest insight</h2>
                      <?php wp_reset_query(); $temp_query = $wp_query; ?>
	<?php query_posts("author=4&showposts=1"); ?>
                      <ul class="authorPosts">
	<?php while (have_posts()) : the_post(); ?>
                          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                      </ul>    
                  </div>
                  
                  
                  <div class="col-xs-6 col-sm-4   col-md-2">
                      <h2>Intellectual Property</h2>
                      <a href="<?php echo get_site_url(); ?>/solicitor/himanshu-dasare/" target="_blank" 
                         title="Himanshu advises across the full spectrum of intellectual property issues, including registration and defence of trademarks, designs, copyright and patents.">
                      <img style="width:100%" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/himanshu-dasare-formal-200.jpg" 
                           
                            title="My practice also covers intellectual property enforcement procedures in the specialist Intellectual Property Court and High Court"
                            alt="I am a solicitor who specialises in contentious and non-contentious intellectual property protection" >
                      <h2>Himanshu Dasare</h2></a>
                      <h2>Latest insight</h2>
                      <?php wp_reset_query(); $temp_query = $wp_query; ?>
	<?php query_posts("author=23&showposts=1"); ?>
                      <ul class="authorPosts">
	<?php while (have_posts()) : the_post(); ?>
                          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                      </ul>    
                  </div>
              </div> <!-- /row -->
              </div>
      </div>
</div>
          
              
 <div class="container-fluid yourTeam homePage">
      <div class="row">
          
              <div class="container">
                <div class="row"> 
                      <div class="col-md-12">
                          <h2 class="section-title practice">
                              Recent Awards
                          </h2>
                      </div> <!-- col-md-12 -->
                  </div> <!-- /row -->   
              
              
              
              
              
              <div class="row">
                  <div class="col-xs-6 col-sm-4 col-md-2"> 
                      <div class="awards">                                               
                          
                        <img class="first" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/Gannons-Intellectual-property-practioner-of-the-year-Winners-Logo-300.png" alt="Gannons: Intellectual property practitioner of the year - Himanshu Dasare" style="margin-bottom:5px;">
                        </div>
                  </div>
            
                  
                  
                
                  
                  
                  
                  
                  <div class="col-xs-6 col-sm-4 col-md-2"> 
                      <div class="awards">                                               
                          
                        <img class="first" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/02/finance-award-helen-curtis.jpg" alt="Helen Curtis Finance awards Corporate Livewire winner 2015" style="margin-bottom:5px;">
                        </div>
                  </div>
                   
                  <div class="col-xs-6 col-sm-4 col-md-2"> 
                      <div class="awards">        
                         <img  src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/10/best-boutique-commercial-law-firm-2016.png" alt="Gannons: Best boutique commercial law firm 2016; Corporate LiveWire Legal Awards"  style="margin-bottom:5px;" >
                       </div>
                  </div> 
                  
                  
                  <div class="col-xs-6 col-sm-4 col-md-2"> 
                      <div class="awards">  
                        <img  src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/01/Recognised-Leader-in-UK-Tax-Labour-Laws.jpg" alt="Gannons: Leading solicitors Tax & Labour law " style="margin-bottom:5px;">  
                        </div>
                  </div> 
                  

                  <div class="col-xs-6 col-sm-4 col-md-2"> 
                      <div class="awards">  
                        <img  src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/07/Best-Boutique-Commercial-Law-Firm-UK-2015.png" alt="A1 Finance: Gannons best boutique commercial law firm UKFinance Monthly: Dealmake of the year" style="margin-bottom:5px;">  
                        </div>
                  </div> 
                  
                  
                         
                  <div class="col-xs-6 col-sm-4 col-md-2"> 
                      <div class="awards">  
                        <img  src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/02/Legal-500.png" alt="Gannons: member of legal 500" style="margin-bottom:5px;">  
                        </div>
                  </div>     
          
      
          
          
          
          
                  
              </div> <!-- /row --> 
              </div> <!-- /container -->
         
      </div> <!-- /row -->
</div> <!-- container-fluid yourTeam --> 
  
  
  
  
  

	

<?php get_footer(); ?>
