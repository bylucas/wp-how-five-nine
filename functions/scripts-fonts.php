<?php
/***************************************************
SCRIPTS and FONTS - Load and manage scripts and fonts
*****************************************************
* @since wp-phone1st 1.0
*/
 
/**
 * Register Google Fonts
 */
//Google Fonts
function add_google_fonts() {
 wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Source+Code+Pro', false );
 }
 add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

// include custom jQuery
function phone1st_custom_jquery() {

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), null, true);

}

add_action('wp_enqueue_scripts', 'phone1st_custom_jquery');

/**
 * Enqueue scripts and styles.
 */
function phone1st_scripts() {

    wp_enqueue_style( 'phone1st-style', get_template_directory_uri() . '/assets/css/style.css' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // adding vue.js
wp_enqueue_script('phone1st-vue-js', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js', array(), '', true);

    wp_enqueue_script( 'phone1st-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/min/skip-link-focus-fix-min.js', array(), '20151215', true );
wp_enqueue_script('phone1st-sweetalert', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js', array(), '', true);

// adding vue firebase
wp_enqueue_script('phone1st-vue-fire', 'https://cdnjs.cloudflare.com/ajax/libs/vuefire/2.1.2/vuefire.min.js', array(), '', true);
//add firebase
wp_enqueue_script('phone1st-firebase', 'https://www.gstatic.com/firebasejs/6.4.1/firebase-app.js', array(), '', true);

//add firestore datbase
wp_enqueue_script('phone1st-firestore', 'https://www.gstatic.com/firebasejs/6.4.1/firebase-firestore.js', array(), '', true);

// add the code script (alteranative to google code), to all pages
wp_enqueue_script( 'phone1st-code', get_template_directory_uri() . '/assets/js/min/prism-min.js', array( 'jquery' ), '', true );

//add the moving header and avatar scrips to the post pages
if ( is_single() ) {
     wp_enqueue_script( 'phone1st-floating-header', get_template_directory_uri() . '/assets/js/min/floating-header-min.js', array(), 'null', true );
 }

    wp_enqueue_script( 'phone1st-scripts', get_template_directory_uri() . '/assets/js/min/scripts-min.js', array(), 'null', true );
    // load the vue-js script
wp_enqueue_script( 'phone1st-vue-scripts', get_template_directory_uri() . '/assets/js/min/app-min.js', array( 'jquery' ), '', true );

    // load the ajax search function
 wp_localize_script( 'phone1st-scripts', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
}
add_action( 'wp_enqueue_scripts', 'phone1st_scripts' );

// Global add vue template scripts to footer
function add_vuetemplates() { ?>
    <script type="text/x-template" id="spinner-loader">
        <div class="sl-spinner" v-show="status" :style="spinnerStyle"></div>
    </script>

    <script type="text/x-template" id="backtotop">
        <div class="goTop" v-if="isVisible" @click="backToTop">
            Top
        </div>
    </script>

    <script type="text/x-template" id="modal-template">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">
                        <div class="modal-body">
                            <slot name="body">
                                default body
                            </slot>
                            <slot name="footer">
                                <div class="modal-close" @click="$emit('close')">
                                    X
                                </div>
                            </slot>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </script>

    <script type="text/x-template" id="contact">
        <section class="contact-form">
            <h2>Stay up to date!</h2>
            <p class="hide">Get all the latest &amp; greatest posts delivered straight to your inbox</p>
            <div class="form-wrap">
                <input class="subscribe" type="text" id="name" v-model="newUser.name" placeholder="your name" />

                <input class="subscribe" type="email" id="email" v-model="newUser.email" placeholder="youremail@example.com" />

            </div>
            <button v-on:click="submitForm" type="button">Subscribe</button>
            <p>Or if you prefer you can contact me via the <em>regular email route</em> at <a href="mailto:h@bylucas.co.uk?Subject=Enquiry%20from%20the%20bylucas-website">h@bylucas.co.uk</a></p>

        </section>
    </script>

    <?php }
add_action('wp_footer', 'add_vuetemplates');
