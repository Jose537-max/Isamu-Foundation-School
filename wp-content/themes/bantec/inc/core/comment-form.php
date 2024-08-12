<?php

function bantec_comment_form($bantec_comment_form_fields)
{
    $bantec_comment_form_fields['author'] = '
    <div class="row">
    <div class="col-sm-6 mb-25"> 
        <div class="theme_blog_details-left-form-item">            
            <input type="text" name="author" placeholder="' . esc_attr__('Full Name*', 'bantec') . '">
        </div>										
    </div>
    ';

    $bantec_comment_form_fields['email'] =  '
    <div class="col-sm-6 sm-mb-25">
        <div class="theme_blog_details-left-form-item">            
            <input type="email" name="email" placeholder="' . esc_attr__('Email Address*', 'bantec') . '">		
        </div>									
    </div>									
    ';

    $bantec_comment_form_fields['url'] = '
    <div class="col-sm-12 mb-25"> 
        <div class="theme_blog_details-left-form-item">            
            <input type="text" name="url" placeholder="' . esc_attr__('https://', 'bantec') . '">
        </div>										
    </div>
    </div>
    ';

    return $bantec_comment_form_fields;
}

add_filter('comment_form_default_fields', 'bantec_comment_form');

function bantec_comment_default_form($default_form)
{

    $default_form['comment_field'] = '
    <div class="non-row">
    <div class="col-sm-12 mb-25"> 
        <div class="theme_blog_details-left-form-item">            
            <textarea name="comment" required="required" placeholder="' . esc_attr__('Your Comment*', 'bantec') . '"></textarea>
        </div>										
    </div>
    ';

    $default_form['submit_button'] = '
    <button class="btn-one" type="submit">'.esc_html__('Submit Comment', 'bantec').'<i class="fa-regular fa-angle-right"></i></button>
    ';

    $default_form['submit_field'] = '<div class="col-lg-12"><div class="theme_blog_details-left-form-item">%1$s %2$s</div></div></div>';
    $default_form['comment_notes_before'] = '<div class="comment-required-title mb-25">' . esc_html__('Fields (*) Mark are Required', 'bantec') . '</div>';
    $default_form['title_reply'] = esc_html__('Leave A Comment', 'bantec');
    $default_form['title_reply_before'] = '<h3 class="comments-heading">';
    $default_form['title_reply_after'] = '</h3>';
    $default_form['title_reply_after'] = '</h3>';
    $default_form['class_container'] = 'theme_blog_details-left-form comment-respond';

    return $default_form;
}

add_filter('comment_form_defaults', 'bantec_comment_default_form');


function bantec_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    $cookies_field = $fields['cookies'];
    unset($fields['comment']);
    unset( $fields['cookies'] );
    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;
    return $fields;
}

add_filter('comment_form_fields', 'bantec_move_comment_field_to_bottom');
