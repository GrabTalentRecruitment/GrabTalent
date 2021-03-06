<header class="home-header">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<a href="index.php" rel="home"><img src="/images/logo.png" width="250" /></a>
			</div>
			<div class="col-md-9">
				<ul class="site-menu alignright">
					<?php
					    if( ($this->uri->segment(2) == 'home') ) {
					        echo '<li class="current-menu-item"><a href="'.http_url($this->lang->lang().'/home').'">'.lang('home.index').'</a></li>';
					    } else {
					        echo '<li><a href="'.http_url($this->lang->lang().'/home').'">'.lang('home.index').'</a></li>';
					    }
					                                
					    if( $this->uri->segment(2) == 'aboutus'){
					        echo '<li class="current-menu-item"><a href="'.http_url($this->lang->lang().'/aboutus').'">'.lang('home.about').'</a></li>';
					    } else {
					        echo '<li><a href="'.http_url($this->lang->lang().'/aboutus').'">'.lang('home.about').'</a></li>';
					    }
					                                
					    if( $this->uri->segment(2) == 'contact'){
					        echo '<li class="current-menu-item"><a href="'.http_url($this->lang->lang().'/contact').'">'.lang('home.contact').'</a></li>';
					    } else {
					        echo '<li><a href="'.http_url($this->lang->lang().'/contact').'">'.lang('home.contact').'</a></li>';
					    }
					?>
					<li><a href="<?php echo https_url($this->lang->lang().'/candidate', true); ?>" class="button" style="border: 1px solid #F6BA33; color:#fff;">Login</a></li>
					<li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					    <?php 
					        if($this->lang->lang() == 'en') { 
					            echo "<img src='/images/flags/united-kingdom.png'/>&nbsp;&nbsp;&nbsp;English"; 
					        } else if($this->lang->lang() == 'fr') {
					            echo "<img src='/images/flags/france.png'/>&nbsp;&nbsp;&nbsp;French"; 
					        } else if($this->lang->lang() == 'ch') {
					            echo "<img src='/images/flags/china.png'/>&nbsp;&nbsp;&nbsp;&#20013;&#22269;"; 
					        }
					    ?><span class="caret"></span></a>
					    <ul class="dropdown-menu dropdown-cart" role="menu">
					        <li style="<?php if($this->lang->lang() == 'en'){ echo "background-color: #f5f5f5;"; } ?>" >
					            <a href="<?php echo http_url($this->lang->switch_uri('en'),'English');?>">
					                <img src="/images/flags/united-kingdom.png"/>&nbsp;&nbsp;&nbsp;English
					            </a>
					        </li>
					        <li style="<?php if($this->lang->lang() == 'fr'){ echo "background-color: #f5f5f5;"; } ?>" >
					            <a href="<?php echo http_url($this->lang->switch_uri('fr'),'French');?>">
					                <img src="/images/flags/france.png"/>&nbsp;&nbsp;&nbsp;French
					            </a>
					        </li>
					        <li style="<?php if($this->lang->lang() == 'ch'){ echo "background-color: #f5f5f5;"; } ?>" >
					            <a href="<?php echo http_url($this->lang->switch_uri('ch'),'Chinese');?>">
					                <img src='/images/flags/china.png'/>&nbsp;&nbsp;&nbsp;&#20013;&#22269;
					            </a>
					        </li>
					    </ul>
					</li>                        
				</ul>
			</div>
		</div>
	</div>
</header>