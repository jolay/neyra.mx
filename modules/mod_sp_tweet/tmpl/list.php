<?php
	/*
	# mod_sp_tweet - Twitter Module by JoomShaper.com
	# -----------------------------------------------
	# Author    JoomShaper http://www.joomshaper.com
	# Copyright (C) 2010 - 2012 JoomShaper.com. All Rights Reserved.
	# license - PHP files are licensed under  GNU/GPL V2
	# license - CSS  - JS - IMAGE files  are Copyrighted material
	# Websites: http://www.joomshaper.com
	*/
    // no direct access
    defined( '_JEXEC' ) or die( 'Restricted access' );
?>

<div class="sp-tweet">
    <?php foreach($data as $i=>$value) { ?>
		<div class="sp-tweet-list">
			<div class="tweet-user-info">
				<?php if ($avatar) { ?>
                <?php if ($linked_avatar) { ?>
                    <a target="<?php echo $target ?>" href="http://twitter.com/<?php echo $value['user']['screen_name'] ?>">
                        <img class="tweet-avatar" src="<?php echo $value['user']['profile_image_url'] ?>" alt="<?php echo $value['user']['name'] ?>" title="<?php echo $value['user']['name'] ?>" width="<?php echo $avatar_width ?>" height="<?php echo $avatar_width ?>" />
                    </a>
                    <?php } else { ?>
                    <img class="tweet-avatar" src="<?php echo $value['user']['profile_image_url']  ?>" alt="<?php echo $value['user']['name']?>" title="<?php echo $value['user']['name'] ?>" width="<?php echo $avatar_width ?>" height="<?php echo $avatar_width ?>" />
                    <?php } ?>
                <?php }else{ ?>
					<i class="icon-twitter"></i>
                <?php } ?>	
			</div>
			
			<div class="tweet-text" style="margin-left:<?php echo ($avatar) ? ($avatar_width + 16).'px' : '40px' ?>">
				<?php if($tweet_time) { ?>
					<?php if ($tweet_time_linked) { ?>
						<div class="date"><a target="<?php echo $target ?>" href="http://twitter.com/<?php echo $value['user']['screen_name'] ?>/status/<?php 
						echo  $value['id_str'] ?>"><?php echo  JText::_('ABOUT') . '&nbsp;' . $helper->timeago( $value['created_at'] ) . '&nbsp;' . JText::_('AGO');    ?></a></div>	
						<?php } else { ?>	
						<div class="date"><?php echo $value['created_at'] ?></div>	
					<?php } ?>	
				<?php } ?>	
				<?php if($tweet_src) { ?>
					<div class="source"><?php echo JText::_('FROM') . ' ' . $value['source'] ?></div>
				<?php } ?>
				<?php echo $value['text'] ?>
			</div>
			<div class="sp-tweet-clr"></div>
		</div>
	<?php } ?>	
</div>

<?php if ($follow_us) { ?> 
	<a class="followme" target="<?php echo $target ?>" href="http://twitter.com/<?php echo $data[0]['user']['screen_name'] ?>"><?php echo JText::_('FOLLOW') . ' ' . $data[0]['user']['name'] . ' ' . JText::_('ON_TWITTER') ?></a>
<?php } ?>
<div class="sp-tweet-clr"></div>