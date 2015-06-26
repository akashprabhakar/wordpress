<?php
/*
  Plugin Name: Asplundh About
  Plugin URI: HTTP://WWW.ANNET.COM
  Description: About
  Author: Annet Technologies
  Version: 1.0
  Author URI: http://www.annet.com/
 */

/* ----------------------------------------- Register About post type --------------------------------------------------- */


add_action('init', 'register_custom_post_type_asp_about');

function register_custom_post_type_asp_about() {
    $labels = array(
        'name' => _x('About', 'asp-about'),
        'post_type' => _x('About', 'asp-about'),
        'singular_name' => _x('About', 'asp-about'),
        'add_new' => _x('Add New', 'asp-about'),
        'add_new_item' => _x('Add New About', 'asp-about'),
        'edit_item' => _x('Edit About', 'asp-about'),
        'new_item' => _x('New About', 'asp-about'),
        'view_item' => _x('View About', 'asp-about'),
        'search_items' => _x('Search About', 'asp-about'),
        'not_found' => _x('No About found', 'asp-about'),
        'not_found_in_trash' => _x('No About found in Trash', 'asp-about'),
        'parent_item_colon' => _x('Parent About:', 'asp-about'),
        'menu_name' => _x('About', 'asp-about'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'About',
        'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'taxonomies' => array('category'),
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => 'asp-about',
        'can_export' => true,
        'rewrite' => array('slug' => 'asp-about'),
        'capability_type' => 'post',
    );

    register_post_type('asp-about', $args);
}

/* ----------------------------------------- Register History post type --------------------------------------------------- */

add_action('init', 'register_custom_post_type_asp_history');

function register_custom_post_type_asp_history() {
    $labels = array(
        'name' => _x('History', 'asp-history'),
        'post_type' => _x('History', 'asp-history'),
        'singular_name' => _x('History', 'asp-history'),
        'add_new' => _x('Add New', 'asp-history'),
        'add_new_item' => _x('Add New History', 'asp-history'),
        'edit_item' => _x('Edit History', 'asp-history'),
        'new_item' => _x('New History', 'asp-history'),
        'view_item' => _x('View History', 'asp-history'),
        'search_items' => _x('Search History', 'asp-history'),
        'not_found' => _x('No History found', 'asp-history'),
        'not_found_in_trash' => _x('No History found in Trash', 'asp-history'),
        'parent_item_colon' => _x('Parent History:', 'asp-history'),
        'menu_name' => _x('History', 'asp-history'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'History',
        'supports' => array('title', 'editor', 'page-attributes', 'thumbnail','custom-fields'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'taxonomies' => array('category'),
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => 'asp-history',
        'can_export' => true,
        'rewrite' => array('slug' => 'asp-history'),
        'capability_type' => 'post',
    );

    register_post_type('asp-history', $args);
}

/* ----------------------------------------- Display About - About --------------------------------------------------- */

function displayAbout() {
    echo "<div style='float:left;'>";
    echo "<ul>";
    global $wpdb;

    $args_post = array(
        'numberposts' => -1,
        'category_name' => 'about',
        'child_of' => 0,
        'orderby' => 'title',
        'order' => 'ASC',
        'post_type' => 'asp-about',
        'post_status' => 'publish');
    $arg_post_data = get_posts($args_post);

    if ($arg_post_data) {
        foreach ($arg_post_data as $post_data) {
            $each_faq = (array) $post_data;
            $id = $each_faq['ID'];
            $post_title = $each_faq['post_title'];
            $post_content = $each_faq['post_content'];
            $details .= '<h4>' . $post_title . '</h4>';
            $details .= $post_content;
        }
        echo $str .= $details;
    } else {
        echo "No data";
    }
}

add_shortcode('about-about', 'displayAbout');

/* ----------------------------------------- Display About - History --------------------------------------------------- */

function displayHistory() {


    $args_post = array(
        'numberposts' => -1,
        'child_of' => 0,
        'order' => 'ASC',
        'post_type' => 'asp-history',
        'post_status' => 'publish');

    $arg_post_data = get_posts($args_post);
    $first_slug = $arg_post_data[0]->post_name;
    $first_id = $arg_post_data[0]->ID;

    if (isset($_REQUEST['history'])) {
        $about_param = filter_input(INPUT_GET, history, FILTER_SANITIZE_SPECIAL_CHARS);
        $about_param = strtolower($about_param);
    } else {
        $about_param = $first_id;
    }

    echo"<div class='width100 mb30 hist-nav'>";
    echo "<div class='line'>";

    foreach ($arg_post_data as $post) {
        $post_title = $post->post_title;
        $post_name = $post->post_name;
        $post_id = $post->ID;
        $top_post_title = nl2br(str_replace("-","\n",$post_title));
        echo "<div class='box'>";
        if ($about_param == $post_id) {
            echo "<div class='tophis'><a href='javascript:void(0)' onclick='history_target($post_id);'  id='" . $post_id . "' class = '".$post_id." active_color'></a></div>";
        } else {
            echo "<div class='tophis'><a href='javascript:void(0)' onclick='history_target($post_id);'  id='" . $post_id . "' class = '".$post_id."'></a></div>";
        }
        echo "<div class='bottomhis'>$top_post_title</div>";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";

    echo "<div id='historycont'>";
    echo "<div class = 'width100 accordion-history'>";
    $loop2 = new WP_Query(array('post_type' => 'asp-history', 'posts_per_page' => -1));
    while ($loop2->have_posts()) : $loop2->the_post();
        $postid = get_the_ID();
        $title_about_history = get_the_title();
        if ($postid == $first_id) {
            $history_title = "active";
            $history_desc = "default";
        } else {
            $history_title = "";
            $history_desc = "";
        }
        // echo "<div class='accordion-toggle-history $history_title' id='" . $postid . "'><a>$title_about_history</a></div>";
        echo "<div class='accordion-toggle-history $history_title' data-id='" . $postid . "'><a>$title_about_history</a></div>";
        // echo "<div class='accordion-content-history $history_desc' id='" . $postid . "'>";
        echo "<div class='accordion-content-history $history_desc'>";

        $content_about_history = get_post_field('post_content', $postid);
        if ($content_about_history) {
            echo wpautop($content_about_history);
        }
        echo "</div>";
    endwhile;
    echo "</div>";
    echo "</div>";
}

add_shortcode('about-history', 'displayHistory');


/* ----------------------------------------- Display About - History Mobile--------------------------------------------------- */

function displayHistoryMobile() {


    $args_post = array(
        'numberposts' => -1,
        'child_of' => 0,
        'order' => 'ASC',
        'post_type' => 'asp-history',
        'post_status' => 'publish');

    $arg_post_data = get_posts($args_post);
    $first_slug = $arg_post_data[0]->post_name;
    $first_id = $arg_post_data[0]->ID;

    if (isset($_REQUEST['history'])) {
        $about_param = filter_input(INPUT_GET, history, FILTER_SANITIZE_SPECIAL_CHARS);
        $about_param = strtolower($about_param);
    } else {
        $about_param = $first_id;
    }

   
?>
<div id="history_mob">
    <div class="dropdownback">
         <div class="droparrow">
                <select class="dropdown" onchange = "location = js_base_home + '?about=198&history=' + this.value + '#history_mob'">
                      <?php if (isset($_REQUEST['history'])) {
                                             $history_mobile = filter_input(INPUT_GET, history, FILTER_SANITIZE_SPECIAL_CHARS);
                       $history_mobile_title = get_the_title($history_mobile);
                       ?>
                        <option value="<?php echo $history_mobile_title; ?>" selected="selected"><?php echo $history_mobile_title; ?></option>
                   <?php
                   
                   }
                   else
                       { ?>
                    <option value="" selected="selected">Choose a Year</option>
    <?php
                       }
    foreach ($arg_post_data as $postdata) {
        $post_title = $postdata->post_title;
        $post_name = $postdata->post_name;
        $post_id = $postdata->ID;
        ?>
                        <option  value ="<?php echo $post_id ?>" ><?php echo $post_title ?></option>
                        <?php
                    }
                    ?>
                </select>
    </div>
    </div>
    <?php
      echo "<div id='historycont_mob'>";
    echo "<div class = 'width100'>";
     if (isset($_REQUEST['history'])) {
         $post_id_fetch = $_REQUEST['history'];                       
                        $content_post = get_post($post_id_fetch);
                         echo  "<span class='history_h'>" . $content_title_content = $content_post->post_title . "</span>";
                   $content_contact = $content_post->post_content;
                   echo wpautop($content_contact);
                
     }
    echo "</div>";
    echo "</div>";
     echo "</div>";
}

add_shortcode('about-history-mobile', 'displayHistoryMobile');

/* ----------------------------------------- Display About - FAQS --------------------------------------------------- */

function displayFAQS() {

    $args = array(
        'orderby' => 'name',
        'hierarchical' => 1,
        'style' => 'none',
        'taxonomy' => 'category',
        'hide_empty' => 0,
        'title_li' => '',
        'parent' => 7,
        'child_of' => 0,
    );

    $categories = get_categories($args);
      $first_static_cat =  $categories[0]->name;
      $second_static_cat =  $categories[1]->name;
      $third_static_cat =  $categories[2]->name;
    foreach ($categories as $post) {
        $internal_faq_category_name = $post->name;
        echo "<div class='width100 mb70'>";

        echo "<section class='allauto'><h3>" . $internal_faq_category_name . "</h3></section>";

        $internal_faq_category_slug = $post->slug;
        $internal_faq_category_id = $post->cat_ID;

        if ($internal_faq_category_id == 12) {
            //check internal categories
            $args_internal = array(
                'hierarchical' => 1,
                'hide_empty' => 0,
                'title_li' => '',
                'parent' => 12,
                'child_of' => 0,
            );

            $categories_internal = get_categories($args_internal);
            $first_id = $categories_internal[0]->slug;
            if ($categories_internal) {

                if (isset($_REQUEST['about'])) {
                    $about_param = filter_input(INPUT_GET, about, FILTER_SANITIZE_SPECIAL_CHARS);
                    $about_param = strtolower($about_param);
                }
                if (isset($_REQUEST['faq_cat'])) {
                    $faq_cat_param = filter_input(INPUT_GET, faq_cat, FILTER_SANITIZE_SPECIAL_CHARS);
                    $faq_cat_param = strtolower($faq_cat_param);
                } else {
                    $faq_cat_param = $first_id;
                }
echo "<div class='allauto'>";
                foreach ($categories_internal as $category) {
                    $category_id = $category->cat_ID;
                    $category_slug = $category->slug;
                    $category_name_lower = strtolower($category->name);
                    
                    if ($faq_cat_param == $category_slug) {
                        echo $internal_category = "<div  class='menus'><a id='$category_slug' href='?about=$about_param&faq_cat=$category_slug#$category_slug' class='selected'>$category->name</a></div>";
                    } else {
                        echo $internal_category = "<div  class='menus'><a id='$category_slug' href='?about=$about_param&faq_cat=$category_slug#$category_slug' class=''>$category->name</a></div>";
                    }
                   
                }
                    echo "</div>";
                }
            $loop2 = new WP_Query(array('post_type' => 'asp-about', 'posts_per_page' => -1, 'category_name' => $faq_cat_param, 'post_status' => 'publish', 'child_of' => 0));
        } else {
            $loop2 = new WP_Query(array('post_type' => 'asp-about', 'posts_per_page' => -1, 'category_name' => $internal_faq_category_slug, 'post_status' => 'publish', 'child_of' => 0));
        }
        echo "<div id='faqcont'>";
        echo "<div class = 'accordion-faq'>";
   if ($second_static_cat == $internal_faq_category_name)
        {
            echo "<p>Weâ€™ve gathered together on this page some of the questions most asked by our employees. The questions are arranged topically by Home Office Department.
If you don't see your question answered here, please feel free to contact us at the Home Office toll-free at <a href='tel:1.800.248.8733' class='orangecolor'>1.800.248.TREE</a> or e-mail <a href='mailto:info@asplundh.com'>info@asplundh.com.</a></p>";
        }
        else if ($third_static_cat == $internal_faq_category_name)
        {
            echo "<p>Here are some of the most asked questions about our utility pruning operations. If you donâ€™t see your question answered here, please feel free to contact us at the Home Office toll-free at <a href='tel:1.800.248.8733' class='orangecolor'>1.800.248.TREE</a> or e-mail<a href='mailto:info@asplundh.com'> info@asplundh.com.</a></p>";
        }

        while ($loop2->have_posts()) : $loop2->the_post();
            $postid = get_the_ID();
            $title_about_history = get_the_title();
            echo "<div class='accordion-toggle-faq'><a>$title_about_history</a></div>";
            echo "<div class='accordion-content-faq'>";
            $content_about_history = get_post_field('post_content', $post->ID);
            if ($content_about_history) {
                echo $content_about_history;
            }
            echo "</div>";
        endwhile;
       
//        if ($first_static_cat == $internal_faq_category_name){
//            echo "<p>Users of Asplundh-manufactured equipment, aerial devices, lifts or trucks: Please click <a href='#'>here</a> for critical safety information.</p>";
//        }
//        else 
     
        echo "</div>";
        echo "</div>";
        echo "</div>";
       
    }
}

add_shortcode('about-faqs', 'displayFAQS');



/* ----------------------------------------- Display About - News --------------------------------------------------- */

function displayNews() {

    $args = array(
        'orderby' => 'name',
        'hierarchical' => 1,
        'style' => 'none',
        'taxonomy' => 'category',
        'hide_empty' => 0,
        'title_li' => '',
        'parent' => 8,
        'child_of' => 0,
        'order' => 'ASC',
    );

    $categories = get_categories($args);

    foreach ($categories as $post) {
        echo "<section class='news'>";
        $internal_news_category_name = $post->name;
        echo "<h2>" . $internal_news_category_name . "</h2>";
        $internal_news_category_slug = $post->slug;
             $parentcat = $post->cat_ID;
           
            $args_internal = array(
                'hierarchical' => 1,
                'hide_empty' => 0,
                'title_li' => '',
                'parent' => $parentcat,
                'child_of' => 0,
                'order' => 'ASC',
            );

           $categories_internal1 = get_categories($args_internal);
            
            $categories_internal = json_decode(json_encode($categories_internal1), true); //converting std object to array : 2045
        
            //sorting the array : 2045    
            //foreach ($categories_internal as $key => $row) {
                //$name[$key]  = $row['name'];
            //}
            //array_multisort($name,SORT_DESC,$categories_internal);


		$name = array();
		foreach ($categories_internal as $key => $row)
		{
		    $name[$key] = $row['name'];
		}
		array_multisort($name, SORT_DESC, $categories_internal);

		
	//echo "<pre>";
	//print_r($categories_internal);
	//echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
	
        
       foreach ($categories_internal as $cat_inter)
        {
             $cat_slug = $cat_inter['slug'];
             $cat_name = $cat_inter['cat_name'];
              
            $args_post = array(
            'category_name' => $cat_slug,
            'child_of' => 0,
            'orderby' => 'title',
            'order' => 'ASC',
            'post_type' => 'asp-about',
            'post_status' => 'publish'
            );
        $arg_post_data = get_posts($args_post);

//        echo "<pre>";
//        print_r($arg_post_data);
//        echo "</pre>";
        
        if ($arg_post_data) {
echo "<article class='items'>";
 echo "<h3>" . $cat_name . "</h3>";
             
			 //print_r($arg_post_data);exit;
            foreach ($arg_post_data as $post) {
                $post_title = $post->post_title;
                $post_name = $post->post_name;
                $post_id = $post->ID;
                $post_guid = $post->guid;
				//global $post;
				$key_1_values = get_post_meta( $post->ID, 'external_link' );
				$externallink=$key_1_values[0][0]['external-link'];
			    $count=strlen($post->post_content);
				if($count>0)
			{			
				echo "<li><a href = '".$post_guid."' style='color:#000'>".$post_title."</a></li>";								
			}else
			{
			 if(!empty($externallink))
			  echo "<li><a href = '".$externallink."' target='_blank' style='color:#000'>".$post_title."</a></li>";
			  else
			  {
			  echo "<li><a href = '".$post_guid."' style='color:#000'>".$post_title."</a></li>";								
			  }
			}
			
				// if(!empty($externallink))
				// {
				  // echo "<a href=".$externallink." target='_balnk' style='color:#000'>".$post_title."</a>";
				// }
				// else
				// {
				// echo "<a href=".$post_guid." target='_balnk' style='color:#000'>".$post_title."</a>";
				// }
            }
        }
           echo "</article>";
        }
     
        

        echo "</section>";
    }
  
}

add_shortcode('about-news', 'displayNews');



/* ----------------------------------------- Display About - Latest News --------------------------------------------------- */

function displayLatestNews() {
    ?>
    <div class="orangeheader">
        <div id = "lat" class="container">
            <section class="heading"><h1>Latest News</h1></section>
        </div>
    </div>
    <div class="newsboxmain">
        <div class="newsbox">
            <section class="top">
                <ul>
                    <?php
                    $args = array(
                        'orderby' => 'name',
                        'hierarchical' => 1,
                        'style' => 'none',
                        'taxonomy' => 'category',
                        'hide_empty' => 0,
                        'title_li' => '',
                        'parent' => 8,
                        'child_of' => 0,
                    );

                    $categories = get_categories($args);
                   $first_category = $categories[0]->name;
                  $first_category_id = $categories[0]->cat_ID;
                  
                  if(isset($_REQUEST['lat_news']))
                  {
                        $lat_news_param = filter_input(INPUT_GET, lat_news, FILTER_SANITIZE_SPECIAL_CHARS);
                  }
                  else {
                    $lat_news_param = $first_category_id;
                  }
                  
                        foreach ($categories as $post) {
                       $internal_news_category_name = $post->name;
                       $internal_news_category_id = $post->cat_ID;
                        $internal_news_category_slug = $post->slug;
                     
                        if ($lat_news_param == $internal_news_category_id) {
            echo "<li><a class='selected' href='?lat_news=$internal_news_category_id#lat'>$internal_news_category_name</a><span id='dropdown_menu_arrow'></span></li>";
        } else {
            echo "<li><a class='' href='?lat_news=$internal_news_category_id#lat'>$internal_news_category_name</a><span id='dropdown_menu_arrow'></span></li>";
        }
        
                    }
                    ?>
                </ul>
            </section>
            <div class="data">
               
    <?php 
    
    if(isset($_REQUEST['lat_news'])){
         $latest_param = filter_input(INPUT_GET, lat_news, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    else {$latest_param = $lat_news_param;}
     $category_slug_param = get_categories('orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$latest_param);
//     echo "<pre>";
//     print_R($category_slug_param);
//     echo "</pre>";
     
       $latest_slug =  $category_slug_param[0]->slug;
    query_posts('category_name='.$latest_slug.'&order=ASC&orderby=date&post_type=asp-about&post_status=publish&posts_per_page=3'); ?>

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="parts">
                           <?php if ( has_post_thumbnail($post->ID) ) { ?>
                            <section class="image">

            <?php
            the_post_thumbnail($post->ID, "latest-news");
            ?> <?php } ?>
                            </section>
                          
                            <section class="content">
            <?php
            
            $get_post = get_post($post->ID, ARRAY_A);
          
			 global $post;
		    $key_1_values =get_post_meta( $post->ID, 'external_link' );
			$externallink=$key_1_values[0][0]['external-link'];
     
$entire_post_content = $get_post['post_content'];
$post_guid = $get_post['guid'];
         
            $count = strlen($entire_post_content);
           
			/*if (strpos($entire_post_content,'href') !== false) {
			echo $get_post['post_title']."<br>";
			echo $entire_post_content."Read more</a>";
			}
		else
		{
		    echo $get_post['post_title']."<br>";
			echo "<a href=".get_site_url().$entire_post_content." target='_balnk'>Read more</a>";
		}	*/	
			if($count>0)
			{
            if ($count > 200) {
                $string = substr($entire_post_content, 0, 200);
                echo $s = substr($string, 0, strrpos($string, ' ')) . '...';
              //if(!empty($externallink))
			  //echo "</br><a href = '".$externallink."' target='_blank'>Read more</a>";
			  //else
                echo "</br><a href = '".$post_guid."'>Read more</a>";
            } else {
			
                echo $entire_post_content;
            /*if(!empty($externallink))
			  echo "</br><a href = '".$externallink."' target='_blank'>Read more</a>";
			}*/
			}
			
			}else
			{
			 if(!empty($externallink))
                         {
                             echo $post->post_title;
                              echo "</br><a href = '".$externallink."' target='_blank'>Read More</a>";
                         }
			 
            }
            ?>
                            </section>
                        </article>
        <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}

add_shortcode('about-latest-news', 'displayLatestNews');



/* ----------------------------------------- Display About Sections --------------------------------------------------- */

function displayAboutSections() {
    $obj = get_post_type_object('asp-about');
    ?>
    <div id="aboutpart1">
        <div class="orangeheader">
            <div id="abt" class="container">
                <section class="heading"><h1><?php echo $obj->labels->singular_name; ?></h1></section>
            </div>
        </div>
        <!-- part 2 starts here-->
        <div class="abox">
            <div class="aboutdata">
                <section class="top">
                    <ul>
    <?php
    $cat_slug_about = "about-menus";
    $args_post = array(
        'numberposts' => -1,
        'category_name' => $cat_slug_about,
        'child_of' => 0,
        'orderby' => 'title',
        'order' => 'ASC',
        'post_type' => 'asp-about',
        'post_status' => 'publish');

    $arg_post_data = get_posts($args_post);
    $first_slug = $arg_post_data[0]->post_name;
    $first_id = $arg_post_data[0]->ID;

    if (isset($_REQUEST['about'])) {
        $about_param = filter_input(INPUT_GET, about, FILTER_SANITIZE_SPECIAL_CHARS);
        $about_param = strtolower($about_param);
    } else {
        $about_param = $first_id;
    }


    foreach ($arg_post_data as $post) {
        $post_title = $post->post_title;
        $post_name = $post->post_name;
        $post_id = $post->ID;
        if ($about_param == $post_id) {
            echo "<li><a class='selected' href='?about=$post_id#abt'>$post_title</a><span id='dropdown_menu_arrow'></span></li>";
        } else {
            echo "<li><a class='' href='?about=$post_id#abt'>$post_title</a><span id='dropdown_menu_arrow'></span></li>";
        }
    }
    ?>
                    </ul>
                </section>
                <div class="data">
    <?php
    if ($arg_post_data) {
        $close_three_div = "</div></div></div>";
        if ($about_param == 198) {
            echo do_shortcode('[about-history]');
           echo do_shortcode('[about-history-mobile]');
            echo $close_three_div;
        } else if ($about_param == 195) {
            echo do_shortcode('[about-faqs]');
            echo $close_three_div;
        } else if ($about_param == 196) {
            echo do_shortcode('[about-news]');
            echo $close_three_div;
        } else if ($about_param == 199) {
            // echo do_short
            code('[about-library]');
            echo wpautop(get_post_field('post_content', $about_param));
            echo $close_three_div;
        } else if ($about_param == 197) {
            echo wpautop(get_post_field('post_content', $about_param));
            echo $close_three_div;
            ?>
                            <div id="aboutpart2">
                                <div class="orangeheader">
                                    <div class="container">
                                        <section class="heading"><h1><?php
                $post_id = 233;
                echo get_the_title($post_id);
                ?> </h1></section>
                                    </div>
                                </div>
                                <div class="abox2">
                                    <div class="aboutdata2">
                                        <div class="data1">
                                            <?php echo get_post_field('post_content', $post_id); ?>
                                        </div>
                                    </div>
                                </div>                      
                            </div>
                            <?php
                        } else if ($about_param == 194) {
                            echo wpautop(get_post_field('post_content', $about_param));
                            echo $close_three_div;
                            ?>
                            <!-- Testimonials -->

                            <div class="midbanner1">
                                <div class="container">
                                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('asplundh-inner-quotes')) : else : ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- mid header starts here -->  
                            <div id="aboutpart2">
                                <?php echo do_shortcode('[about-latest-news]'); ?> 
                            </div>
                        <?php
                        }
                        else {
                            echo wpautop(get_post_field('post_content', $about_param));
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "No data";
                    }
                    ?>


                    <?php
                }

                add_shortcode('about-sections', 'displayAboutSections');
                
                
                
                