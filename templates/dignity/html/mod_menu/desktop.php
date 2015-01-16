<!--<ul class="standard-nav visible-lg">-->
<!--    <li><a id="intro-linker" class="scroll" href="#intro">Home</a></li>-->
<!--    <li><a id="about-linker" class="scroll" href="#about">About</a></li>-->
<!--    <li><a id="services-linker" class="scroll" href="#services">Services</a></li>-->
<!--    <li><a id="team-linker" class="scroll" href="#team">Team</a></li>-->
<!--    <li><a id="portfolio-linker" class="scroll" href="#portfolio">Portfolio</a></li>-->
<!--    <li><a id="contact-linker" class="scroll" href="#contact">Contact</a></li>-->
<!--    <li><a href="single-project.html">Single Project</a></li>-->
<!--</ul>-->

<?php

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>


<ul class="standard-nav visible-lg">



        <?php foreach ($list as $i => &$item) : ?>

            <?php if($item->type !="component"){ ?>
                <li><a class="scroll" href="<?php echo $item->flink; ?>"><?php echo $item->title; ?></a></li>
            <?php } else {?>
                <li><a  href="<?php echo $item->flink; ?>"><?php echo $item->title; ?></a></li>
            <?php }?>
        <?php endforeach; ?>
</ul>

