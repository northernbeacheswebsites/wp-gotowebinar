<div id="postbox-container" class="postbox-container">
    

                <div class="meta-box-sortables">
                    <div class="postbox">
                        <div class="handlediv" title="Click to toggle">
                            <br>
                        </div>
                        <!-- Toggle -->
                        <h2 class="hndle"><span><?php esc_attr_e(
									'Free Support', 'wp_admin_style'
								); ?></span></h2>
                        <div class="inside">
                            
                            
                            <p>Before making a support request please read over the <a class="open-tab" href="#faq">FAQ</a> tab thoroughly as it is likely your request is already answered there. On this page you will also see a walkthrough of all the main features of the plugin. Also make sure you are using the latest version of WordPress and this plugin.</p>
                            
                            <p><strong style="color:#CC0000; font-size: 16px; font-weight:900;">Before you create a support request on the WordPress Forum, please include the following information otherwise your request may not be answered.</strong></p>

                            <p><code><?php echo 'PHP Version: <strong>'.phpversion().'</strong>'; ?></br>
                            <?php echo 'Wordpress Version: <strong>'.get_bloginfo('version').'</strong>'; ?></br>
                            Plugin Version: <strong><?php echo wpgotowebinar_plugin_get_version(); ?></strong></br>
                            Current Theme: <strong><?php 
                            $user_theme = wp_get_theme();    
                            echo esc_html( $user_theme->get( 'Name' ) );
                            ?></strong></br>

                            Active Plugins:</br> 
                            <?php 
                            $active_plugins=get_option('active_plugins');
                            $plugins=get_plugins();
                            $activated_plugins=array();
                            foreach ($active_plugins as $plugin){           
                            array_push($activated_plugins, $plugins[$plugin]);     
                            } 

                            foreach ($activated_plugins as $key){  
                            echo '<strong>'.$key['Name'].'</strong></br>';
                            }

                            ?></code></p>
                            
                            <p>URL's and Screenshots of issues can also be extremely helpful in diagnosing things so please include this where possible.</p>

                            <a class="button-secondary" target="_blank" href="https://wordpress.org/support/plugin/wp-gotowebinar" >Create a support request on the forum</a>
   
                            <p>For priority support please <a target="_blank" href="https://northernbeacheswebsites.com.au/wp-gotowebinar-pro/">upgrade to the pro version of the plugin</a>.</p>
                            

                            
                        </div>
                        <!-- .inside -->
                    </div>
                    <!-- .postbox -->
                </div>

</div>