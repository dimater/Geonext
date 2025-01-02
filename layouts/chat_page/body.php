<body class='<?php echo(Registry::load('appearance')->body_class) ?> overflow-hidden'>
 
    <?php include 'assets/headers_footers/chat_page/body.php'; ?>

    <div class="preloader">
        <div class="content">
            <div>
                <div class="loader_image">
                    <?php if (Registry::load('current_user')->color_scheme === 'dark_mode') {
                        ?>
                        <img src="<?php echo Registry::load('config')->site_url.'assets/files/defaults/loading_image_dark_mode.png'.$cache_timestamp; ?>" />
                        <?php
                    } else {
                        ?>
                        <img src="<?php echo Registry::load('config')->site_url.'assets/files/defaults/loading_image_light_mode.png'.$cache_timestamp; ?>" />
                        <?php
                    } ?>
                </div>
                <div class="loader">
                    <div class="loading">
                    </div>
                </div>
            </div>
        </div>
    </div>
     
    <?php include 'layouts/chat_page/header_site_adverts.php'; ?>

    <section class="main main_window" <?php echo(Registry::load('appearance')->main_window_style) ?> last_realtime_log_id=0>
        <div class='window fh'>
            <div class="container-fluid fh">
                <div class="row fh nowrap page_row chat_page_container">
                    <?php if (Registry::load('current_user')->logged_in) {
                        include 'layouts/chat_page/side_navigation.php';
                    } ?>
                    <?php include 'layouts/chat_page/aside.php'; ?>
                    <?php include 'layouts/chat_page/middle.php'; ?>
                    <?php include 'layouts/chat_page/form.php'; ?>
                    <?php include 'layouts/chat_page/info_panel.php'; ?>
                </div>
            </div>
        </div>
    </section>


    <?php include 'layouts/chat_page/footer_site_adverts.php'; ?>


    <?php if (Registry::load('current_user')->logged_in) {
        if (isset(Registry::load('config')->app_version) && !empty(Registry::load('config')->app_version)) {
            if (role(['permissions' => ['wallet' => 'topup_wallet']])) {
                include 'layouts/chat_page/wallet_topup_modal.php';
            }
        }
    } ?>

    <?php if (Registry::load('settings')->adblock_detector === 'enable') {
        include 'layouts/chat_page/ad_block_detector.php';
    } ?>

    <?php
    if (Registry::load('settings')->video_chat !== 'disable') {
        if (role(['permissions' => ['private_conversations' => 'video_chat']])) {
            ?>
            <div class="call_notification d-none" current_call_id=0>
                <div class="user-image"></div>
                <div class="call_notification-text">
                    <p>
                        <strong class="user_name"></strong> <?php echo Registry::load('strings')->is_calling_text ?>
                    </p>
                </div>
                <div class="action-buttons">
                    <button class="action-button attend_video_call"><?php echo Registry::load('strings')->join ?></button>
                    <button class="action-button reject_video_call"><?php echo Registry::load('strings')->reject ?></button>
                </div>
                <div class="d-none">
                    <audio class="call_ringtone" controls loop>
                        <source src="<?php echo(Registry::load('config')->site_url) ?>assets/files/defaults/call_notification.mp3" type="audio/mpeg">
                    </audio>
                </div>
            </div>
            <?php
        }
    }
    ?>

    

    <div class="on_site_load  ">
        <?php if (isset(Registry::load('config')->load_user_profile) && !empty(Registry::load('config')->load_user_profile)) {
            ?>
            <span class="get_info" user_id="<?php echo(Registry::load('config')->load_user_profile) ?>">Profile</span>
            <?php
        } else if (isset(Registry::load('config')->load_membership_packages)) {
            ?>
            <span class="load_membership_info" package_id="<?php echo(Registry::load('config')->load_membership_package_id) ?>">Membership Packages</span>
            <?php
        } else if (isset(Registry::load('config')->load_user_wallet)) {
            ?>
            <span class="show_statistics stat_menu_item" stat_title="wallet" statistics="wallet">User Wallet</span>
            <?php
        } else if (isset(Registry::load('config')->load_private_conversation) && !empty(Registry::load('config')->load_private_conversation)) {
            ?>
            <span class="load_conversation" user_id="<?php echo(Registry::load('config')->load_private_conversation) ?>">Group</span>
            <?php
        } else if (isset(Registry::load('config')->load_group_conversation) && !empty(Registry::load('config')->load_group_conversation)) {
            ?>
            <span class="load_conversation" group_id="<?php echo(Registry::load('config')->load_group_conversation) ?>">Group</span>
            <?php
        } else if (isset(Registry::load('config')->join_group_conversation) && !empty(Registry::load('config')->join_group_conversation)) {
            ?>
            <span class="load_form" form="join_group" data-group_secret_code="<?php echo(Registry::load('config')->join_group_secret_code) ?>" data-group_id="<?php echo(Registry::load('config')->join_group_conversation) ?>">Group</span>
            <?php
        } else if (isset(Registry::load('config')->load_page) && !empty(Registry::load('config')->load_page)) {
            ?>
            <span class="load_page" page_id="<?php echo(Registry::load('config')->load_page) ?>">Page</span>
            <?php
        } else if (Registry::load('current_user')->logged_in && !isset(Registry::load('config')->load_user_profile)) {
            if (role(['find' => 'load_profile_on_page_load']) === 'yes') {
                ?>
                <span class="get_info load_profile_on_page_load">User Profile</span>
                <?php
            }
        } else if (isset(Registry::load('config')->load_demo)) {
            ?>
            <span class="show_demo stat_menu_item load_demo" stat_title="Demo" statistics="demo">demo</span>
            <?php
        }
        ?>
    </div>

    <div class="content_on_page_load d-none">
        <?php
        if (Registry::load('current_user')->logged_in) {
            $left_panel_content_on_page_load = role(['find' => 'left_panel_content_on_page_load']);

            if ($left_panel_content_on_page_load === 'group_categories' && Registry::load('settings')->categorize_groups !== 'yes') {
                $left_panel_content_on_page_load = 'groups';
            }
            ?>
            <span class="left_panel_content_on_page_load"><?php echo $left_panel_content_on_page_load; ?></span>
            <span class="main_panel_content_on_page_load"><?php echo role(['find' => 'main_panel_content_on_page_load']); ?></span>
            <?php
        }
        ?>
    </div>

    <div class="load_on_refresh d-none"></div>

    <div class="language_strings d-none">
        <span class="string_uploading_files"><?php echo(Registry::load('strings')->uploading_files) ?></span>
        <span class='string_loading'><?php echo(Registry::load('strings')->loading) ?></span>
        <span class='string_sort'><?php echo(Registry::load('strings')->sort) ?></span>
        <span class='string_error'><?php echo(Registry::load('strings')->error) ?></span>
        <span class='string_error_message'><?php echo(Registry::load('strings')->error_message) ?></span>
        <span class='string_choose_file'><?php echo(Registry::load('strings')->choose_file) ?></span>
        <span class='string_load_more'><?php echo(Registry::load('strings')->load_more) ?></span>
        <span class='string_new'><?php echo(Registry::load('strings')->new) ?></span>
        <span class='string_sharing_your_location'><?php echo(Registry::load('strings')->sharing_your_location) ?></span>
        <span class='string_sharing_video'><?php echo(Registry::load('strings')->sharing_video) ?></span>
        <span class='string_new_message_notification'><?php echo(Registry::load('strings')->new_message_notification) ?></span>
        <span class='string_is_typing'><?php echo(Registry::load('strings')->is_typing) ?></span>
        <span class='string_recording'><?php echo(Registry::load('strings')->recording) ?></span>
        <span class='string_message_textarea_placeholder'><?php echo(Registry::load('strings')->message_textarea_placeholder) ?></span>
        <span class='string_wallet'><?php echo(Registry::load('strings')->wallet) ?></span>
        <span class='string_statistics'><?php echo(Registry::load('strings')->statistics) ?></span>
    </div>

    <div class="system_variables d-none">
        <span class="variable_message_alignment"><?php echo(Registry::load('settings')->message_alignment) ?></span>
        <span class="variable_own_message_alignment"><?php echo(Registry::load('settings')->own_message_alignment) ?></span>
        <span class="variable_video_chat"><?php echo(Registry::load('settings')->video_chat) ?></span>
        <span class="variable_audio_chat"><?php echo(Registry::load('settings')->audio_chat) ?></span>
        <span class="variable_refresh_rate"><?php echo(Registry::load('settings')->refresh_rate) ?></span>
        <span class="variable_ffmpeg"><?php echo(Registry::load('settings')->ffmpeg) ?></span>
        <span class="variable_enter_is_send"><?php echo(Registry::load('settings')->enter_is_send) ?></span>
        <span class="variable_fingerprint_module"><?php echo(Registry::load('settings')->fingerprint_module) ?></span>
        <span class="variable_load_group_info_on_group_load"><?php echo(Registry::load('settings')->load_group_info_on_group_load) ?></span>
        <span class="variable_show_profile_on_pm_open"><?php echo(Registry::load('settings')->show_profile_on_pm_open) ?></span>
        <span class="variable_people_nearby_feature"><?php echo(Registry::load('settings')->people_nearby_feature) ?></span>
        <span class="variable_search_on_change_of_input"><?php echo(Registry::load('settings')->search_on_change_of_input) ?></span>
        <span class="variable_show_side_navigation_on_load"><?php echo(Registry::load('settings')->show_side_navigation_on_load) ?></span>
        <span class="variable_allowed_file_types"><?php echo(Registry::load('current_user')->allowed_file_types) ?></span>
        <span class="variable_current_title"></span>
        <?php
        if (isset($_GET['embed_url']) && !empty($_GET['embed_url'])) {
            if (isset(Registry::load('config')->load_group_conversation) && !empty(Registry::load('config')->load_group_conversation)) {
                $embed_url = Registry::load('config')->site_url.'group/'.Registry::load('config')->load_group_conversation.'/?embed_url=yes';
                ?>
                <span class="variable_embed_url"><?php echo $embed_url; ?></span>
                <?php
            }
        }
        if (!isset($_GET['login_session_id']) && !isset($_GET['session_time_stamp'])) {
            if (isset(Registry::load('config')->samesite_cookies_current) && strtolower(Registry::load('config')->samesite_cookies_current) === 'none') {
                ?>
                <span class="variable_login_from_storage">true</span>
                <?php
            }
        }
        ?>
    </div>

    <div class="site_sound_notification">
        <div>
            <audio controls>
                <source src="<?php echo(Registry::load('settings')->notification_tone) ?>" type="audio/mpeg">
            </audio>
        </div>
    </div>

    <?php include 'layouts/chat_page/web_push_service_variables.php'; ?>

    <script>
        var video_preview=null;
        var group_header_contents=null;
        var load_group_header_request=null;
        var video_chat_available=!1;
        var videoChatStatusUpdateTimeoutId;
        var videoChatStatusUpdateRequest;
        var call_notification_timeout_id;

        
        $('body').on('click','.load_demo',function(e){open_column('second'); load_demo();});


        $('body').on('click', '.load_comment', function(e) { 
            
            });
        $('body').on('click', '.load_more_comments', function(e) {
            var postId = $(this).data('post-id');
            var commentsShown = $(this).data('comments-shown');
            var user_id = "<?php echo Registry::load('current_user')->id ?>"    ;
            var total_comments = $(this).data('total-comments');
            var data = {
                load: 'load_comments',
                post_id: postId,
                user_id: user_id,
                comments_shown: commentsShown
            };

            $.ajax({
                url: 'https://geonetmarketplace.com/api?table=post_comment_more&token=4622',
                method: 'POST',
                data: data,
                success: function(response) {
                    console.log(JSON.stringify(response));
                    if (response.comments && response.comments.length > 0) {
                        response.comments.forEach(function(comment) {

                           
                            var commentHtml = `<div class="comment">
                                <div class="comment_user_image image_loaded profile_picture">
                                    <img src="${comment.comment_user_profile_picture}" alt="User Image">
                                </div>
                                <div>
                                    <div class="comment_content comment_input">
                                        <span class="comment_user_name">${comment.comment_user}<br></span>
                                        <span class="comment_text">${comment.comment_content}</span>
                                    </div>
                                </div>
                            </div>`;
                            $(commentHtml).insertBefore('.load_more_comments[data-post-id="' + postId + '"]');

                            
 
                        });

                            commentsShown += response.comments.length;
                             
                            $('.load_more_comments[data-post-id="' + postId + '"]').data('comments-shown', commentsShown);
                            if (commentsShown >= total_comments) { 
                                $('.load_more_comments[data-post-id="' + postId + '"]').addClass('d-none');
                            } else {
                                 
                            }
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $('body').on('click', '.init_post', function(e) {
            var data={load:'new_post'};
            if($(this).attr('user_id')!==undefined)
            {data.user_id=$(this).attr('user_id') 
            }
            
            if($(window).width()<767.98){$('.main .chat_page_container').removeClass('show_navigation')} 
            
            open_column('third');
            $('.page_column[column="fourth"]').addClass('d-none');
            //$('.page_column[column="first"]').addClass('d-none');
             $('.page_column[column="third"]').removeClass('d-none') 
            
            $('.main .middle').removeClass('col-lg-9');
            $('.main .middle').addClass('col-lg-6'); 
            $('.main .page_column[column="third"]   .head > .title').html(' Publicar en la comunidad  ');
            
           // $('.main .page_column[column="third"]   .head > .title').html(' Publicar en la comunidad  ');
           
            $('.main .page_column[column="third"]   .fields ').html('');
             
            
            $('.main .page_column[column="third"]   .fields ').html(` <div class="error" style="display: none;"></div>
            <form method="post" autocomplete="off" class="dataform" spellcheck="false">
                <div class="formdata">                
                    <div class="field">
                        
                        <textarea id="post_content" name="post_content" rows="6" autocomplete="off">¿Qué estas pensando ? </textarea>
                    </div>
                    <div class="col-12 row">
                    
                        <div class="col-4 bloqueicono text-amarillo" id="post_imagen">                         
                            <span class="selector"> 
                                <input type="file" id="post_images" name="post_images[]" accept="image/png,image/x-png,image/gif,image/jpeg,image/webp" multiple style="display: none;">
                                <label for="post_images" class="file-browse">
                                    <i class="bi bi-images text-amarillo" style="  font-size: x-large;"></i> <span>  Imagen</span>  
                                </label> 
                            </span>
                        </div>

                         <div class="col-4 bloqueicono text-verde" id="bton-youtobe">
                         <i class="bi bi-caret-right-square-fill"></i>
                            <span>Youtobe</span>
                        </div>

                        <div class="col-4 bloqueicono text-azul" id="bton-link"> 
                         <i class="bi bi-link"></i>
                            <span>Link</span>
                        </div>
                    
                    
                    </div>
                     
                  
                    <div class="field post_video_url " id="post_url" style="display: none;">                       
                        <input id="post_video_url" placeholder="https://"  name="post_video_url" type="url" value=""  autocomplete="off">
                        <br>
                         <label style=" font-size: 10px;">Link URL</label>
                    </div> 
                     
                </div>
            </form> `);
 
            $('.main .page_column[column="third"]   .bottom > .submit').html(' Enviar  ');

        


        });

        function cambiotipopost() {
            var selectedValue = $('#tipopost').val();
            if (selectedValue == '3') {
                $('.field.filebrowse').removeClass('d-none');
               // $('.field.post_video_url').removeClass('d-none');
            } else if (selectedValue == '2') {
               // $('.field.post_video_url').addClass('d-none');
                $('.field.filebrowse').removeClass('d-none');
            } else {
              //  $('.field.post_video_url').addClass('d-none');
                $('.field.filebrowse').addClass('d-none');
            }
        }

        $('body').on('click', '#post_imagen', function(e) {
            $('#post_url').css('display', 'none');
        });

        $('body').on('click', '#bton-youtobe', function(e) {
            console.log(' youtobe');
            $('#post_url label').text('Link de Youtobe');
            $('#post_video_url').attr('placeholder', 'https://www.youtube.com/watch?v='); 
            $('#post_url').css('display', 'block');
        }); 
        $('body').on('click', '#bton-link', function(e) {
            console.log('link');
            $('#post_url  label').text('Link  ');
            $('#post_video_url').attr('placeholder', 'https://');
            $('#post_url').css('display', 'block');
        });
        $('  .bottom > .submit').on('click', function(e) {
                e.preventDefault();
                
                var form = $('.main .page_column[column="third"]   .fields > .formdata');
                var datapost = new FormData(form[0]);
                datapost.append('load', 'new_post');
                datapost.append('user_id', '<?php echo Registry::load('current_user')->id ?>'); 
                datapost.append('post_title', $('#post_title').val());
                datapost.append('post_content', $('#post_content').val());
                var postImageInput =  $('#post_images').val() ? document.getElementById('post_image') : null;
                if (postImageInput && postImageInput.files.length > 0) {
                    for (var i = 0; i < postImageInput.files.length; i++) {
                        datapost.append('post_images[]', postImageInput.files[i]);
                    }
                }
                datapost.append('post_video_url', $('#post_video_url').val());

                console.log(datapost); 

                

                $.ajax({
                    url: 'https://geonetmarketplace.com/api?table=post3&token=4622',
                    method: 'POST',
                    data: datapost,
                    contentType: false,
                    processData: false,
                    success: function(response) { 
                        console.log(response);
                         //load_demo();
                    },
                    error: function( error ) {  
                        console.log(error); 
                    }
                });
        });

       
        $('body').on('click', '.interaction', function(e) {
                var postId = $(this).data('post');
                var user_id = "<?php echo Registry::load('current_user')->id ?>"    ;
                var like_count = $(this).find('.count').text(); 
                var like = $(this).find('.icon').hasClass('bi-balloon-heart-fill');
                  like = like ? 0 : 1;  

                var data = {
                    load: 'like_post',
                    post_id: postId,
                    user_id: user_id,
                    like: like
                };

                if(like_count == 'Sé el primero en dar like'){
                    like_count = 0;
                }

                console.log(like_count);
                $.ajax({
                    url: 'https://geonetmarketplace.com/api?table=post_like&token=4622',
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        console.log(response);


                        if (like) {
                            like_count++;
                            $(this).find('.icon >i').removeClass('bi-balloon-heart');
                            $(this).find('.icon >i').addClass('bi-balloon-heart-fill'); 
                             $(this).find('.count').text(like_count);
                        }  
                        else {
                            like_count--;
                            $(this).find('.icon >i').removeClass('bi-balloon-heart-fill');
                            $(this).find('.icon >i').addClass('bi-balloon-heart'); 
                            $(this).find('.count').text(like_count);
                        } 

                        console.log(like_count);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                }); 

                console.log(postId);
        });

        //enviar comentario
        $('body').on('click', '.send_icon', function(e) {
            var postId = $(this).data('post');
            var user_id = "<?php echo Registry::load('current_user')->id ?>"    ;
            var comment = $('#post_' + postId).val();

            if (comment.length <= 3) {
                alert('Comment must be greater than 3 characters.');
                return;
            }

            var data = {
                load: 'new_comment',
                post_id: postId,
                user_id: user_id,
                comment: comment
            };

            console.log(data);
            $.ajax({
                url: 'https://geonetmarketplace.com/api?table=post_comment&token=4622',
                method: 'POST',
                data: data,
                success: function(response) {

                    console.log(response.comment); 
                    $('#post_' + postId).val('');
                    var commentHtml = `<div class="comment">
                        <div class="comment_user_image image_loaded profile_picture">
                            <img src="${response.comment.comment_user_profile_picture}" alt="User Image">
                        </div>
                        <div>
                            <div class="comment_content comment_input">
                                <span class="comment_user_name">${response.comment.comment_user}<br></span>
                                <span class="comment_text">${response.comment.comment_content}</span>
                            </div>
                        </div>
                    </div>`;
                    $(commentHtml).insertBefore('.load_more_comments[data-post-id="' + postId + '"]');

                },
                error: function(error) {
                    console.log(error);
                }
            });

        });

        $('body').on('click', '.comments', function(e) {
            var postId = $(this).data('post');
            var user_id = "<?php echo Registry::load('current_user')->id ?>"    ;
            var data = {
                load: 'load_comments',
                post_id: postId,
                user_id: user_id
            };

            $.ajax({
                url: 'https://geonetmarketplace.com/api?table=post_comment&token=4622',
                method: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            }); 

            console.log(postId);
        });


        $('body').on('click', '.post_options', function(e) {
            var postId = $(this).data('post');
            var optionsMenu = $(this).find('.options_menu');
            optionsMenu.toggleClass('show');

            console.log(postId); 
 
            Swal.fire({
                title: 'Desea eliminar este post?',
                text: "No podra revertir esta accion!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrarlo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the delete action here
                    $.ajax({
                        url: 'https://geonetmarketplace.com/api?table=post_delete&token=4622',
                        method: 'POST',
                        data: { post_id: postId },
                        success: function(response) {

                            

                            Swal.fire(
                                'Deleted!',
                                'Your post has been deleted.',
                                'success'
                            );
                            // Optionally, remove the post from the DOM
                            $('.post_card[data-post-id="' + postId + '"]').remove();
                        },
                        error: function(error) {
                            Swal.fire(
                                'Error!',
                                'There was an error deleting your post.',
                                'error'
                            );
                        }
                    });
                }
            });
                
                
             
            
        });


        function formatDate($date) {
                        return date('F j, Y', strtotime($date));
                    }

        function sanitizeContent($content) {
                        return htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
                    }

        function open50post (post){

            var postCard = ` <div class="post_card">
                                            <div class="post_header site_record_item user get_info" user_id="`+post.user_id+`">
                                                <div class="left image_loaded profile_picture">
                                                    <img src="`+post.profile_picture+`" alt="Profile Picture">
                                                    <span class="online_status online"></span>
                                                </div>
                                                <div class="post_info">
                                                    <span class="user_name">  `+post.display_name+`</span>
                                                    <span class="post_date"> `+post.post_date+`</span>
                                                </div> `; 


                                                if (post.user_id == <?php echo Registry::load('current_user')->id ?>  || 'administrators' == '<?php echo  Registry::load('current_user')->site_role_attribute ?>' ) { 
                                               postCard += ` <div class="post_options" data-post="` + post.post_id+`">
                                                                <span class="options prevent_default"><i class="iconic_three-dots"></i>
                                                                    <div class="options_menu">
                                                                        <span>Edit Post</span>
                                                                    </div>
                                                                </span>
                                                             </div>`; 
                                                }


                                            postCard += ` </div>
                                            <div class="post_content"> `;  

                                                if (post.post_content) { 
                                                      postCard += post.post_content;

                                                }

                                                if (post.video_url) { 
                                                
                                                    if (post.video_url.includes('youtube.com') || post.video_url.includes('youtu.be')  ) {

                                                        $embed_url =post.video_url ;
                                                              
                                                            var embed_url = post.video_url.replace('watch?v=', 'embed/');
                                                          


                                                        postCard +=  "<iframe width='100%' height='450' src='"+embed_url+"' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
 
                                                        } else { 

  
                                                                                                    
                                                             postCard +=  "<a href='"+post.video_url+"' target='_blank'>"; 
                                                            if (!post.media_url) { 
                                                              postCard += `  <div class="visit_url_button">  Visitar Link : ` +post.video_url+`    </div>` ;
                                                            }

                                                            if (post.media_url) {
                                                            postCard +=  " <div class='post_image' ><img src='"+post.media_url+"' alt='"+post.post_title+"'> </div>";
                                                            }
 
                                                    }

    

                                                    
                                                }else{

                                                    media_urls = JSON.parse(post.media_urls);
 

                                                    if ( post.media_count > 1) {  
                                                        postCard +=  "<div class='post_images'>";
                                                      
                                                         postCard +=  "<div class='row'> ";
                                                        media_urls.forEach(function(media_url) {
                                                                var  index = media_urls.indexOf(media_url);
                                                            postCard += `<div class='col-6 col-md-4 col-lg-4'>
                                                                            <img src='${media_url.media_url}' class='d-block w-100' alt='${media_url.media_url}' style='width: 100%; height: 380px; object-fit: cover;'>
                                                                         </div>`;

                                                        });
 
                                                                     
                                                        
                                                        postCard +=  "</div> </div>";


                                                    }
                                                    else{


                                                        if (post.media_url) {
                                                         postCard +=  " <div class='post_image' ><img src='"+post.media_url+"' alt='"+post.media_url+"'> </div>";
                                                
                                                        }

                                                    } 
                                                }
 

                                            if (post.video_url) {
                                                if (post.video_url.includes('youtube.com') || post.video_url.includes('youtu.be')) 
                                                    {
                                                         
                                                    }else{
                                                        postCard +=  "</a>";
                                                    } 
                                                }
 
                                                postCard = postCard +`  </div>  
                                            <div class="post_footer">`; 


                                                if (post.like_count == 0) {
                                                    postCard += `<div class="interaction no-likes" data-post="` + post.post_id+`">
                                                                    <span class="icon"><i class="bi bi-balloon-heart"></i></span>
                                                                    <span class="count">Sé el primero en dar like</span>
                                                                </div>`;
                                                } else {
                                                    postCard += `<div class="interaction" data-post="` + post.post_id+`">
                                                                    <span class="icon"><i class="bi bi-balloon-heart-fill"></i></span>
                                                                    <span class="count">` + post.like_count + `</span>
                                                                </div>`;
                                                }
                                                

                                                if (post.comment_count == 0) {
                                                    postCard += `<div class="comments no-comments" data-post="` + post.post_id+`">
                                                                    <span class="icon"><i class="bi bi-chat"></i></span>
                                                                    <span class="count">Sé el primero en comentar</span>
                                                                </div>`;
                                                } else {
                                                    postCard += `<div class="comments" data-post="` + post.post_id+`">
                                                                    <span class="icon"><i class="bi bi-chat-dots-fill"></i></span>
                                                                    <span class="count">` + post.comment_count + `+</span>
                                                                </div>`;
                                                }

                                                
                                                 

                                                postCard = postCard +`     <div class="share" data-post="` + post.post_id+`">
                                                    <span class="icon social_media_share" share_on="facebook" share_url="https://chat.geonet.top/demo" ><i class="bi bi-share"></i></span>
                                                </div>`; 

                                                 postCard = postCard +`
                                            </div>
                                            <div class="load_comment comment_section">

                                                <div class="image_loaded profile_picture ">
                                                <img class="logged_in_user_avatar" loading="lazy" onerror="handleImageError(this)"
                                                    src="<?php echo (get_img_url(['from' => 'site_users/profile_pics', 'image' => Registry::load('current_user')->profile_picture, 'gravatar' => Registry::load('current_user')->email_address])) ?>">                                                               
                                                </div>
                                                 <div class="comment_input">
                                                    <input type="text" id="post_` + post.post_id+`" placeholder="Add a comment...">
                                                    <span class="send_icon send_message" data-post="` + post.post_id+`"> 
                                                        <svg fill="currentColor" width="23px" height="23px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.975 17.504l14.287.001-6.367 6.366L16.021 26l10.004-10.003L16.029 6l-2.128 2.129 6.367 6.366H5.977z"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                 
                                            </div> `;
 
                                           

                                             
                                            post.comments = JSON.parse(post.comments);
                                             var comments_to_show = 5;
                                            var total_comments = post.comment_count;
                                            var comments_shown = 0;

                                            if (Array.isArray(post.comments)) {

                                                post.comments.forEach(function(comment, index) { 
                                                if (index >= comments_to_show) {
                                                    return;
                                                }

                                                if(comment.comment_user != null)  
                                                    {
                                                comments_shown++;
                                                postCard += `<div class="comment">
                                                    <div class="comment_user_image  image_loaded profile_picture ">
                                                        <img src="${comment.comment_user_profile_picture}" alt="User Image">
                                                    </div>
                                                    <div>
                                                        <div class="comment_content comment_input">
                                                            <span class="comment_user_name">${comment.comment_user}<br></span>
                                                            <span class="comment_text">${comment.comment_content}</span>
                                                        </div>
                                                    </div>
                                                </div>`;

                                                }
                                            });

                                            if (total_comments > comments_shown) {
                                                postCard += `<button class="load_more_comments" total-comments="` +total_comments+` " data-post-id="${post.post_id}" data-comments-shown="${comments_shown}">Ver más comentarios</button>`;
                                            }else {
                                                postCard += `<button class="load_more_comments d-none" total-comments="` +total_comments+` " data-post-id="${post.post_id}" data-comments-shown="${comments_shown}">Sin comentarios</button>`;
                                          

                                            }
                                        postCard = postCard +`  </div>   `;    
                                        
                                    }; 
                                   
            $('#postCard').append(postCard);
            
                
        }
        
        //cerrar menu  cuando sale de la columna
        var sideNavigation = document.getElementsByClassName('side_navigation')[0];
        var targetDiv = document.getElementsByClassName('chat_page_container ')[0];

        sideNavigation.addEventListener('mouseleave', function() {
            if (window.innerWidth > 1024) { // Check if it's desktop
                targetDiv.classList.remove('show_navigation');
            }
        });

 



        function cargarpost ( limit = 50, offset = 0){
            console.log('cargarpost');
             $.ajax({
                            url: 'https://geonetmarketplace.com/api?table=post2&token=4622&limit='+limit+'&offset='+offset,
                            method: 'GET',
                            success: function(response) {
                                // Cache the response
                                localStorage.setItem('demo_response', response); 
 
                                response.forEach(function(post) {

                                     open50post(post);

                                       //console.log(post);
                                   
                                });

 

                                // Use the response
                               // $('.main .middle > .content > .custom_page > .page_content > div').html(publicaciones);
                            },
                            error: function( error ) {
                                console.log(error);
                                console.error('Failed to load demo content');
                            }
                        });
        }

        function load_demo(){
            if(!$(this).hasClass('processing')){
                console.log('loading demo');
                $(this).addClass('processing');
                open_column('second');
                var browser_title=default_meta_title;var browser_address_bar=baseurl;
                var element=$(this);

                $('.page_column[column="fourth"]').addClass('d-none');
                //$('.page_column[column="first"]').addClass('d-none');
                $('.page_column[column="third"]').addClass('d-none') 
                $('.main .middle').removeClass('col-lg-6');
                $('.main .middle').addClass('col-lg-9'); 

                if($(this).attr('loader')!==undefined){$($(this).attr('loader')).show()}
                $('.main .middle > .content > div').addClass('d-none');
                $('.main .middle > .content > .custom_page').removeClass('d-none');
                $('.main .middle > .content > .custom_page > .page_content').hide();
                $('.main .middle > .content > .custom_page > .page_content > div').html('');
                $('.main .middle > .content > .custom_page > .page_content').show(); 
                var top =`<div class="col-md-9" >
                             
                            <div id="postCard"></div> 
                            
                        </div>
                        <div class="col-md-3 ADS"> 

                        <div class="video_home   rounded bordered  padding-10 sombra  " style=" height: auto;margin-bottom: 20px;   padding: 10px;">
                                <iframe width="100%" height="155" src="https://www.youtube.com/embed/DLxYfKj5o_8?si=zaHi4DTnOPRFcV-D" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                                        <div style=" padding: 10px;   display: block;  text-align: justify;">
                                            <div class="nombre_producto text3 col-12" style=" float: left; display: contents; margin-bottom: 10px; ">  
                                            Sé parte de la innovación en el mercado de la topografía, brinda servicio técnico en tu localidad  con la mejor plataforma digital . <br> </div>
                                                
                                                
                                        </div>
                                        <a target="_blank" href="https://wa.me/16592574462?text=w19207515">  
                                                    <div class="descuento btn  " data-cod="1872">Más Información  </div>
                                                </a>
                                    
                        </div>

                        <div class="video_home">
                         <a target="_blank" href="https://geonetmarketplace.com/index.php?view=item&cod=2372">
                             <div class="recommended_product_banner rounded bordered padding-10 sombra" style="height: auto; margin-bottom: 20px; padding: 10px;">
                                <img src="https://geonetmarketplace.com/assets/images/empresas/463429imgen64.jpg" alt="Recommended Product" style="width: 100%; height: auto;">
                              </div
                              ></a>
                        </div>


                        <div class="social_follow_buttons sticky-banner video_home">
                            <h3>Síguenos</h3>
                            <div class="social_buttons">
                                <a href="https://www.facebook.com" class="social_button facebook" target="_blank">
                                    <i class="bi bi-facebook"></i>
                                    
                                </a>
                                 
                                <a href="https://www.instagram.com" class="social_button instagram" target="_blank">
                                    <i class="bi bi-instagram"></i> 
                                </a>
                                <a href="https://www.youtube.com" class="social_button youtube" target="_blank">
                                  <i class="bi bi-youtube"></i>
                                </a>
                                <a href="https://www.tiktok.com" class="social_button tiktok" target="_blank">
                                  <i class="bi bi-tiktok"></i>

                                </a>
                                 
                            </div>
                        </div>
                        <style>
                            .sticky-banner {
                                position: -webkit-sticky;
                                position: sticky;
                                top: 10px;
                                z-index: 1000; 
                                padding: 10px;
                                border-radius: 5px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                        </style>

                        <style>
                            .social_follow_buttons { 
                                bottom: 10px;
                                right: 10px;
                                background: #fff;
                                padding: 10px;
                                border-radius: 5px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            .social_follow_buttons h3 {
                                margin-bottom: 10px;
                                font-size: 16px;
                                text-align: center;
                            }
                            .social_buttons {
                                display: flex; 
                                gap: 10px;
                            }
                            .social_button {
                                display: flex;
                                align-items: center;
                                padding: 10px;
                                border-radius: 5px;
                                color: #fff;
                                text-decoration: none;
                                font-size: 14px;
                            }
                            .social_button i {
                                margin-right: 10px;
                                font-size: 18px;
                            }
                            .social_button.facebook { background: #3b5998; }
                            .social_button.youtube { background: red; }
                            .social_button.instagram { background: #e4405f; }
                            .social_button.tiktok { background: #000000; }
                        </style>
                            <!-- geonet columna2 -->
                            <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-client="ca-pub-7680806035842389"
                                data-ad-slot="6841416885"
                                data-ad-format="auto"
                                data-full-width-responsive="true"></ins> 
                            </div>`;


                $('.main .middle > .content > .custom_page > .page_content > div').append(top);

                 // Check if the response is cached
                  
                        var publicaciones ="";

                       cargarpost();
                    

                 
                var data={load:'custom_page_content',
                    page_id:-1, 
                    demo:'yes',
                    browser_title:'Demo',
                    browser_address_bar:baseurl+'demo',
                    title:' ',
                    subtitle: `<div class="comment_input init_post  comment_section" user_id="<?php echo Registry::load('current_user')->id ?>">
                                                    Hola <?php echo Registry::load('current_user')->name ?> , que nos cuentas hoy?
                                                     
                                                </div>`,
                    page_content:'  <div> Muy pronto</div> <div class="load_post"> </div>'};

                };
                    if(user_csrf_token!==null){data.csrf_token=user_csrf_token}

                    if(user_login_session_id!==null&&user_access_code!==null&&user_session_time_stamp!==null)
                        {data.login_session_id=user_login_session_id;data.access_code=user_access_code;
                            data.session_time_stamp=user_session_time_stamp}

                    if(data.browser_title!==undefined){browser_title=data.browser_title}
 

                        if(data.browser_address_bar!==undefined){browser_address_bar=data.browser_address_bar}
                        if(data.title!=undefined){$('.main .middle > .content > .custom_page > .header > .left > .title').replace_text(data.title)}
                        //if(data.subtitle!=undefined){$('.main .middle > .content > .custom_page > .header > .left > .sub_title').replace_text(data.subtitle)}else{$('.main .middle > .content > .custom_page > .header > .left > .sub_title').replace_text('')}
                        $('.main .middle > .content > .custom_page > .header > .left ').css('display','contents');
                        $('.main .middle > .content > .custom_page > .header > .left > .sub_title').css('width','100%');
                        $('.main .middle > .content > .custom_page > .header > .left > .sub_title').html(data.subtitle);

                            if(data.page_content!=undefined){
                         //  $('.main .middle > .content > .custom_page > .page_content > div').html(data.page_content);

                            $('.main .middle > .content > .custom_page > .page_content > div').css({
                                'background': 'transparent',
                                'border': '0px'
                            })

                            $('.main .middle > .content > .custom_page > .page_content > div').addClass('row');
 


                            $('.main .middle > .content > .custom_page > .page_content').show()
                        
                        }else{console.log('ERROR : '+data)}
                        if(element.attr('loader')!==undefined){$(element.attr('loader')).hide()

            }
        }
    </script>
</body>