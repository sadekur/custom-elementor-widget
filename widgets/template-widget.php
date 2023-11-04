<?php
namespace Elementor;

class MYEW_Preview_Template_Widget extends Widget_Base {

   public function get_name() {
    return  'myew-nav-widget-id';
   }

    public function get_title() {
        return esc_html__( 'Template Widget', 'my-elementor-widget' );
    }

    public function get_icon() {
         return 'eicon-navigation-horizontal';
    }

    public function get_categories() {
        return [ 'myew-for-elementor' ];
    }

    public function get_script_depends() {
        return [
            'mainjs',
            'jquerys',
            'bootstrap',
            'validate',
            'carousel',
            'bxslider',
            'waypoints',
            'counterup',
            'isotope',
            'platform',
            'retina'
        ];
    }

    public function get_style_depends() {
        return [
            'googleapis',
            'font-awesome',
            'bootstrap',
            'owl-carousel',
            'bxslider',
            'styles',
            'responsive',
            'main-color'
        ];
    }

    protected function register_controls() {
        //Content
        $this->start_controls_section(
            'my_content_section',
            [
                'label' => esc_html__( 'Content', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]

        );
        $this->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => esc_html__( 'Title', 'my-elementor-widget' ),
                'placeholder' => esc_html__( 'Enter title', 'my-elementor-widget' ),
            ]
        );

        $this->add_control(
            'size',
            [
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label' => esc_html__( 'Size', 'my-elementor-widget' ),
                'placeholder' => '0',
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
            ]
        );

        $this->add_control(
            'open_lightbox',
            [
                'type' => \Elementor\Controls_Manager::SELECT,
                'label' => esc_html__( 'Lightbox', 'my-elementor-widget' ),
                'options' => [
                    'default' => esc_html__( 'Default', 'my-elementor-widget' ),
                    'yes' => esc_html__( 'Yes', 'my-elementor-widget' ),
                    'no' => esc_html__( 'No', 'my-elementor-widget' ),
                ],
                'default' => 'no',
            ]
        );

        $this->add_control(
            'alignment',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__( 'Alignment', 'my-elementor-widget' ),
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'my-elementor-widget' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'my-elementor-widget' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'my-elementor-widget' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
            ]
        );

        // Top badge
            $this->add_control(
                'show_top_badges',
                [
                    'label' => __( 'Show Top Badge', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

        $this->add_control(
                'items_description',
                [
                    'label' => __( 'Description', 'my-elementor-widget' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'Default description', 'my-elementor-widget' ),
                    'placeholder' => __( 'Type your description here', 'my-elementor-widget' ),
                ]
            );
        // Middle badge
            $this->add_control(
                'show_middle_badges',
                [
                    'label' => __( 'Show Middle Badge', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Middle Badge Text
            $this->add_control(
                'middle_badge_texts',
                [
                    'label' => __( 'Middle Badge Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '$19.99', 'plugin-domain' ),
                    'placeholder' => __( 'Type your title here', 'plugin-domain' ),
                    'condition' => [
                        'show_middle_badge' => 'yes'
                    ]
                ]
            );

            // Bottom badge
            $this->add_control(
                'show_bottom_badges',
                [
                    'label' => __( 'Show Bottom Badge', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Bottom Badge Text
            $this->add_control(
                'bottom_badge_texts ',
                [
                    'label' => __( 'Bottom Badge Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '$19.99', 'plugin-domain' ),
                    'placeholder' => __( 'Type your title here', 'plugin-domain' ),
                    'condition' => [
                        'show_bottom_badge' => 'yes'
                    ]
                ]
            );

        $this->end_controls_section();

        // Image Settings
        $this->start_controls_section(
            'image_sections',
            [
                'label' => __( 'Image', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'slider_images',
            [
                'label'   => __( 'Image', 'my-elementor-widget' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ],
        );
            // Show Image link
            $this->add_control(
                'show_image_links',
                [
                    'label' => __( 'Show Image Link', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Image Link
            $this->add_control(
                'image_links',
                [
                    'label' => __( 'Image Link', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                    'condition' => [
                        'show_image_link' => 'yes'
                    ]
                ]
            );

        $this->end_controls_section();

        // Button Settings
        $this->start_controls_section(
            'button_sections',
            [
                'label' => __( 'Button', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Button Link
            $this->add_control(
                'button_links',
                [
                    'label' => __( 'Link', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );

            // Button Text
            $this->add_control(
                'button_texts',
                [
                    'label' => __( 'Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Buy Now', 'plugin-domain' ),
                    'placeholder' => __( 'Type your text here', 'plugin-domain' ),
                ]
            );

        $this->end_controls_section();

        // Slider Settings
        $this->start_controls_section(
            'sliders_settings',
            [
                'label' => __( 'Slider Settings', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
            // show Loop
            $this->add_control(
                'loops',
                [
                    'label' => __( 'Loop', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => true,
                    'default' => true,
                ]
            );

            // show Dots
            $this->add_control(
                'dotss',
                [
                    'label' => __( 'Dots', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => true,
                    'default' => true,
                ]
            );

            // Show Navs
            $this->add_control(
                'navss',
                [
                    'label' => __( 'Navs', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => true,
                    'default' => true,
                ]
            );

            // Margin
            $this->add_control(
                'margins',
                [
                    'label' => __( 'Margin', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 10,
                    'placeholder' => __( 'Enter the margin between to slides', 'plugin-domain' ),
                ]
            );
            $this->end_controls_section();


            /*Pricing Tab*/
            // Header Settings
        $this->start_controls_section(
            'header_section',
            [
                'label' => __( 'Header', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Title
            $this->add_control(
                'header_title',
                [
                    'label' => __( 'Title', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Pricing Title', 'plugin-domain' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your title here', 'plugin-domain' ),
                ]
            );

            // Description
            $this->add_control(
                'header_description',
                [
                    'label' => __( 'Description', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'rows' => 5,
                    'default' => __( 'Default description', 'plugin-domain' ),
                    'placeholder' => __( 'Type your description here', 'plugin-domain' ),
                ]
            );

            // Show Badge
            $this->add_control(
                'show_badge',
                [
                    'label' => __( 'Show Badge', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Badge Text
            $this->add_control(
                'header_badge_text',
                [
                    'label' => __( 'Badge Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Popular', 'plugin-domain' ),
                    'label_block' => true,
                    'placeholder' => __( 'Badge text', 'plugin-domain' ),
                    'condition' => [
                        'show_badge' => 'yes'
                    ]
                ]
            );

        $this->end_controls_section();

        // Price Settings
        $this->start_controls_section(
            'price_section',
            [
                'label' => __( 'Pricing', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Price
            $this->add_control(
                'pricing_price',
                [
                    'label' => __( 'Price', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '$99', 'plugin-domain' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your price here', 'plugin-domain' ),
                ]
            );

            // Duration
            $this->add_control(
                'pricing_duration',
                [
                    'label' => __( 'Duration', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'year', 'plugin-domain' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your duration here', 'plugin-domain' ),
                ]
            );
            $this->add_control(
                'feature_text',
                [
                    'label' => __( 'Feature Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '' , 'plugin-domain' ),
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $this->add_control(
                'feature_text',
                [
                    'label' => __( 'Feature Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '' , 'plugin-domain' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'feature_icon',
                [
                    'label' => __( 'Feature Icon', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-check',
                        'library' => 'solid',
                    ],
                ]
            );
            $this->add_control(
                'list',
                [
                    'label' => __( 'Repeater List', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'feature_text' => __( 'upto 5 users', 'plugin-domain' ),
                        ],
                        [
                            'feature_text' => __( 'max 100 items/month', 'plugin-domain' ),
                        ],
                        [
                            'feature_text' => __( '500 quries', 'plugin-domain' ),
                        ],
                        [
                            'feature_text' => __( 'basic statistic', 'plugin-domain' ),
                        ],
                    ],
                    'title_field' => '{{{ feature_text }}}',
                ]
            );
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="wrapper">
            <nav id="navigation">
                <div class="contact-bar">
                    <div class="container">
                        <div class="social-icons pull-left">
                            <ul class="nav nav-tabs">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="contact-bar--text pull-left">
                            <p><a href="mailto:support@example.com"><i class="fa fm fa-envelope-o"></i>support@example.com</a></p>
                        </div>
                        <div class="contact-bar--text pull-left">
                            <p><a href="tel:+444000000000"><i class="fa fm fa-phone"></i>+444-000-000-000</a></p>
                        </div>
                        <div class="contact-bar--text text-capitalize pull-right">
                            <p><a href="login.html"><i class="fa fm fa-user"></i>login</a><span class="slash">/</span><a href="http://billing.ywhmcs.com/register.php?systpl=OrDomainCV1"><i class="fa fm fa-user-plus"></i>signup</a></p>
                        </div>
                    </div>
                </div>
                <div class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- Logo Start -->
                            <a href="index.html" class="navbar-brand"><span><i class="fa fa-globe"></i> Or</span>Domain</a>
                            <!-- Logo End -->
                        </div>
                        <div id="navbar" class="navbar-collapse collapse navbar-right reset-padding">
                            <!-- Navigation Links Start -->
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hosting <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="shared-hosting.html">Shared</a></li>
                                        <li><a href="reseller-hosting.html">Reseller</a></li>
                                        <li><a href="vps-hosting-1.html">VPS Style 1</a></li>
                                        <li><a href="vps-hosting-2.html">VPS Style 2</a></li>
                                        <li><a href="dedicated-hosting-1.html">Dedicated Style 1</a></li>
                                        <li><a href="dedicated-hosting-2.html">Dedicated Style 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="domains.html">Domains</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="datacenter.html">Datacenter</a></li>
                                        <li><a href="testimonial.html">Testimonial</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="affiliate.html">Affiliate</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog_sidebar-left.html">Blog Sidebar Left</a></li>
                                        <li><a href="blog_sidebar-right.html">Blog Sidebar Right</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                            <!-- Navigation Links End -->
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="service" class="service-primary" data-bg-img="<?php echo plugin_dir_url( __FILE__ ) . 'img/background-img/services-bg.jpg'; ?>">
            <div class="vc-parent">
                <div class="vc-child">
                    <div class="service-slider">
                        <div class="item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="image">
                                            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/service-slider-bg/slider-01.png'; ?>">
                                        </div>
                                        <div class="price-tag bg-green">
                                            <p>starting at<span>$10<em>/mo</em></span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Service Item Content Start -->
                                        <div class="content">
                                            <h2 class="text-green"><span class="text-white">shared</span>hosting</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis dolores ducimus pariatur optio sint autem odio, provident quia debitis in.</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="content--footer">
                                                <a href="#" class="btn btn-lg btn-custom btn-green">Get Started</a>
                                            </div>
                                        </div>
                                        <!-- Service Item Content End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="image">
                                            <img src="img/service-slider-bg/slider-02.png" alt="">
                                        </div>
                                        <div class="price-tag bg-green">
                                            <p>starting at<span>$10<em>/mo</em></span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Service Item Content Start -->
                                        <div class="content">
                                            <h2 class="text-green"><span class="text-white">VPS</span>hosting</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis dolores ducimus pariatur optio sint autem odio, provident quia debitis in.</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="content--footer">
                                                <a href="#" class="btn btn-lg btn-custom btn-green">Get Started</a>
                                            </div>
                                        </div>
                                        <!-- Service Item Content End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="image">
                                            <img src="img/service-slider-bg/slider-03.png" alt="">
                                        </div>
                                        <div class="price-tag bg-green">
                                            <p>starting at<span>$10<em>/mo</em></span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Service Item Content Start -->
                                        <div class="content">
                                            <h2 class="text-green"><span class="text-white">dedicated</span>hosting</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis dolores ducimus pariatur optio sint autem odio, provident quia debitis in.</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="content--footer">
                                                <a href="#" class="btn btn-lg btn-custom btn-green">Get Started</a>
                                            </div>
                                        </div>
                                        <!-- Service Item Content End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service Area End -->
        <!-- Feature Area Start -->
        <div id="feature">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span>why choose us</span>our services</h2>
                </div>
                <!-- Section Title End -->
                <div class="row AdjustRow">
                    <!-- Feature Item Start -->
                    <div class="col-md-3 col-sm-6 feature-item">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="content">
                            <h3 class="heading">Email Hosting</h3>
                            <p class="desc">Duis posuere blandit orci sed tincidunt. Curabitur porttitor nisi ac nunc ornare, in fringilla.</p>
                        </div>
                    </div>
                    <!-- Feature Item End -->
                    <!-- Feature Item Start -->
                    <div class="col-md-3 col-sm-6 feature-item">
                        <div class="icon">
                            <i class="fa fa-windows"></i>
                        </div>
                        <div class="content">
                            <h3 class="heading">Windows Server</h3>
                            <p class="desc">Duis posuere blandit orci sed tincidunt. Curabitur porttitor nisi ac nunc ornare, in fringilla.</p>
                        </div>
                    </div>
                    <!-- Feature Item End -->
                    <!-- Feature Item Start -->
                    <div class="col-md-3 col-sm-6 feature-item">
                        <div class="icon">
                            <i class="fa fa-linux"></i>
                        </div>
                        <div class="content">
                            <h3 class="heading">Linux Server</h3>
                            <p class="desc">Duis posuere blandit orci sed tincidunt. Curabitur porttitor nisi ac nunc ornare, in fringilla.</p>
                        </div>
                    </div>
                    <!-- Feature Item End -->
                    <!-- Feature Item Start -->
                    <div class="col-md-3 col-sm-6 feature-item">
                        <div class="icon">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="content">
                            <h3 class="heading">Domain Registration</h3>
                            <p class="desc">Duis posuere blandit orci sed tincidunt. Curabitur porttitor nisi ac nunc ornare, in fringilla.</p>
                        </div>
                    </div>
                    <!-- Feature Item End -->
                    <!-- Feature Item Start -->
                    <div class="col-md-3 col-sm-6 feature-item">
                        <div class="icon">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="content">
                            <h3 class="heading">Whois Search</h3>
                            <p class="desc">Duis posuere blandit orci sed tincidunt. Curabitur porttitor nisi ac nunc ornare, in fringilla.</p>
                        </div>
                    </div>
                    <!-- Feature Item End -->
                    <!-- Feature Item Start -->
                    <div class="col-md-3 col-sm-6 feature-item">
                        <div class="icon">
                            <i class="fa fa-exchange"></i>
                        </div>
                        <div class="content">
                            <h3 class="heading">Domain Transfar</h3>
                            <p class="desc">Duis posuere blandit orci sed tincidunt. Curabitur porttitor nisi ac nunc ornare, in fringilla.</p>
                        </div>
                    </div>
                    <!-- Feature Item End -->
                    <!-- Feature Item Start -->
                    <div class="col-md-3 col-sm-6 feature-item">
                        <div class="icon">
                            <i class="fa fa-shopping-basket"></i>
                        </div>
                        <div class="content">
                            <h3 class="heading">Bulk Domains</h3>
                            <p class="desc">Duis posuere blandit orci sed tincidunt. Curabitur porttitor nisi ac nunc ornare, in fringilla.</p>
                        </div>
                    </div>
                    <!-- Feature Item End -->
                    <!-- Feature Item Start -->
                    <div class="col-md-3 col-sm-6 feature-item">
                        <div class="icon">
                            <i class="fa fa-tag"></i>
                        </div>
                        <div class="content">
                            <h3 class="heading">Low Domain Pricing</h3>
                            <p class="desc">Duis posuere blandit orci sed tincidunt. Curabitur porttitor nisi ac nunc ornare, in fringilla.</p>
                        </div>
                    </div>
                    <!-- Feature Item End -->
                </div>
            </div>
        </div>
        <!-- Feature Area End -->
        <!-- Banner Area Start -->
        <div id="banner" class="banner-primary" data-bg-img="<?php echo plugin_dir_url( __FILE__ ) . 'img/background-img/banner-bg.jpg'; ?>">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span>looking a premium quality</span>domain name?</h2>
                </div>
                <!-- Section Title End -->
                <!-- Banner Content Start -->
                <div class="banner-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="domain--search" data-form-validation="true">
                                <form action="http://billing.ywhmcs.com/domainchecker.php?systpl=OrDomainCV1" method="post" id="domainSearchForm" class="clearfix">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="domain" class="form-control" placeholder="eg. example" required>
                                            <span class="input-group-addon">
                                                <input type="submit" value="Search" class="form-control">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row extensions">
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".com" id="extCom" checked>
                                            <label for="extCom">.com</label>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".net" id="extNet">
                                            <label for="extNet">.net</label>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".org" id="extOrg">
                                            <label for="extOrg">.org</label>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".info" id="extInfo">
                                            <label for="extInfo">.info</label>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".biz" id="extBiz">
                                            <label for="extBiz">.biz</label>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".us" id="extUs">
                                            <label for="extUs">.us</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="extension-slider-holder">
                                <div class="extension-slider owl-carousel text-center text-white" data-items="5">
                                    <div class="item">
                                        <p class="ext--name">.com</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.org</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.net</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.info</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.biz</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.io</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.me</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.bd</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="domain--addons">
                                <h2>Free with every Domain Name!</h2>
                                
                                <ul>
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        <h3>Free Email Account</h3>
                                        <p>Receive 2 personalized Email Addresses.</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-mail-forward"></i>
                                        <h3>Domain Forwarding</h3>
                                        <p>Point your domain name to another website for free!</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-globe"></i>
                                        <h3>DNS Management</h3>
                                        <p>Free DNS service which allows you to manage your records.</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-cog"></i>
                                        <h3>Bulk Tools</h3>
                                        <p>Easy-to-use bulk tools to help you Register, Renew, Transfer.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Banner Content End -->
            </div>
        </div>
        <!-- Banner Area End -->
        <!-- Pricing Area Start -->
        <div id="pricing">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span>our popular</span>pricing</h2>
                </div>
                <!-- Section Title End -->
                <div class="pricing-tab-filter">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tabA" class="btn-custom-reverse" aria-controls="tabA" role="tab" data-toggle="tab">Shared Hosting</a></li>
                        <li role="presentation"><a href="#tabB" class="btn-custom-reverse" aria-controls="tabB" role="tab" data-toggle="tab">RESELLER Hosting</a></li>
                        <li role="presentation"><a href="#tabC" class="btn-custom-reverse" aria-controls="tabC" role="tab" data-toggle="tab">VPS Hosting</a></li>
                        <li role="presentation"><a href="#tabD" class="btn-custom-reverse" aria-controls="tabD" role="tab" data-toggle="tab">Dedicated Hosting</a></li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="tabA">
                        <div class="row">
                            <!-- Pricing Table Start -->
                            <div class="pricing-table">
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item">
                                    <div class="pricing-item-content">
                                        <div class="head">
                                            <h3 class="title">Basic</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$9.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>2GB RAM</li>
                                                    <li>2GB RAM</li>
                                                    <li>20GB SSD Cloud Storage</li>
                                                    <li>Monthly Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item active">
                                    <div class="pricing-item-content">
                                        <div class="ribbon ribbon-small text-white">
                                            <?php if( 'yes' == $settings[ 'show_badge' ] ) : ?>
                                                <div class="ribbon-content bg-green text-uppercase">Populer</div>
                                            <?php endif; ?>
                                            <div class="ribbon-content bg-green text-uppercase">Popular</div>
                                        </div>
                                        <div class="head">
                                            <h3 class="title">Advance</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$19.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>4GB RAM</li>
                                                    <li>4GB RAM</li>
                                                    <li>40GB SSD Cloud Storage</li>
                                                    <li>Weekly Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item">
                                    <div class="pricing-item-content">
                                        <div class="head">
                                            <h3 class="title">Business</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$29.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>10GB RAM</li>
                                                    <li>10GB RAM</li>
                                                    <li>100GB SSD Cloud Storage</li>
                                                    <li>Daily Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                            </div>
                            <!-- Pricing Table End -->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabB">
                        <div class="row">
                            <!-- Pricing Table Start -->
                            <div class="pricing-table">
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item">
                                    <div class="pricing-item-content">
                                        <div class="head">
                                            <h3 class="title">Basic</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$9.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>2GB RAM</li>
                                                    <li>2GB RAM</li>
                                                    <li>20GB SSD Cloud Storage</li>
                                                    <li>Monthly Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item active">
                                    <div class="pricing-item-content">
                                        <div class="ribbon ribbon-small text-white">
                                            <div class="ribbon-content bg-green text-uppercase">Popular</div>
                                        </div>
                                        <div class="head">
                                            <h3 class="title">Advance</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$19.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>4GB RAM</li>
                                                    <li>4GB RAM</li>
                                                    <li>40GB SSD Cloud Storage</li>
                                                    <li>Weekly Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item">
                                    <div class="pricing-item-content">
                                        <div class="head">
                                            <h3 class="title">Business</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$29.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>10GB RAM</li>
                                                    <li>10GB RAM</li>
                                                    <li>100GB SSD Cloud Storage</li>
                                                    <li>Daily Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                            </div>
                            <!-- Pricing Table End -->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabC">
                        <div class="row">
                            <!-- Pricing Table Start -->
                            <div class="pricing-table">
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item">
                                    <div class="pricing-item-content">
                                        <div class="head">
                                            <h3 class="title">Basic</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$9.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>2GB RAM</li>
                                                    <li>2GB RAM</li>
                                                    <li>20GB SSD Cloud Storage</li>
                                                    <li>Monthly Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item active">
                                    <div class="pricing-item-content">
                                        <div class="ribbon ribbon-small text-white">
                                            <div class="ribbon-content bg-green text-uppercase">Popular</div>
                                        </div>
                                        <div class="head">
                                            <h3 class="title">Advance</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$19.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>4GB RAM</li>
                                                    <li>4GB RAM</li>
                                                    <li>40GB SSD Cloud Storage</li>
                                                    <li>Weekly Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item">
                                    <div class="pricing-item-content">
                                        <div class="head">
                                            <h3 class="title">Business</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$29.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>10GB RAM</li>
                                                    <li>10GB RAM</li>
                                                    <li>100GB SSD Cloud Storage</li>
                                                    <li>Daily Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                            </div>
                            <!-- Pricing Table End -->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabD">
                        <div class="row">
                            <!-- Pricing Table Start -->
                            <div class="pricing-table">
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item">
                                    <div class="pricing-item-content">
                                        <div class="head">
                                            <h3 class="title">Basic</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$9.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>2GB RAM</li>
                                                    <li>2GB RAM</li>
                                                    <li>20GB SSD Cloud Storage</li>
                                                    <li>Monthly Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item active">
                                    <div class="pricing-item-content">
                                        <div class="ribbon ribbon-small text-white">
                                            <div class="ribbon-content bg-green text-uppercase">Popular</div>
                                        </div>
                                        <div class="head">
                                            <h3 class="title">Advance</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$19.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>4GB RAM</li>
                                                    <li>4GB RAM</li>
                                                    <li>40GB SSD Cloud Storage</li>
                                                    <li>Weekly Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <!-- Pricing Item Start -->
                                <div class="col-md-4 pricing-item">
                                    <div class="pricing-item-content">
                                        <div class="head">
                                            <h3 class="title">Business</h3>
                                            <p class="desc">Cras ex justo bibendum eget sollicitudin lobortis libero</p>
                                            <div class="price"><div>Start at</div><div><span>$29.99</span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <ul>
                                                    <li>10GB RAM</li>
                                                    <li>10GB RAM</li>
                                                    <li>100GB SSD Cloud Storage</li>
                                                    <li>Daily Backups</li>
                                                    <li>DDoS Protection</li>
                                                    <li>Full Root Access</li>
                                                    <li>24/7/365 Tech Support</li>
                                                </ul>
                                            </div>
                                            <div class="buy-now">
                                                <a href="#" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                            </div>
                            <!-- Pricing Table End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing Area End -->
        <!-- Counter Area Start -->
        <div id="counter" data-bg-img="<?php echo plugin_dir_url( __FILE__ ) . 'img/background-img/counter-bg.png'; ?>">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span>company</span>statistics</h2>
                </div>
                <!-- Section Title End -->
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <!-- Counter Item Start -->
                        <div class="counter-holder">
                            <div class="counter-number-holder">
                                <i class="fa fa-globe"></i>
                                <span class="counter-number">670</span>
                            </div>
                            <p class="counter-text">domains registered</p>
                        </div>
                        <!-- Counter Item End -->
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <!-- Counter Item Start -->
                        <div class="counter-holder">
                            <div class="counter-number-holder">
                                <i class="fa fa-users"></i>
                                <span class="counter-number">980</span>
                            </div>
                            <p class="counter-text">happy clients</p>
                        </div>
                        <!-- Counter Item End -->
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <!-- Counter Item Start -->
                        <div class="counter-holder">
                            <div class="counter-number-holder">
                                <i class="fa fa-server"></i>
                                <span class="counter-number">250</span>
                            </div>
                            <p class="counter-text">vps servers sold</p>
                        </div>
                        <!-- Counter Item End -->
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <!-- Counter Item Start -->
                        <div class="counter-holder">
                            <div class="counter-number-holder">
                                <i class="fa fa-tasks"></i>
                                <span class="counter-number">275</span>
                            </div>
                            <p class="counter-text">dedicated servers sold</p>
                        </div>
                        <!-- Counter Item End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Area End -->
        <!-- Feedback Area Start -->
        <div id="feedback">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span>clients &amp; feedback</span>our clients &amp; feedback</h2>
                </div>
                <!-- Section Title End -->
            </div>
            <div class="clients-holder">
                <div class="clients-slider owl-carousel">
                    <!-- Client Item Start -->
                    <div class="item" data-id="1">
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/testimonial-img/01.jpg'; ?>" alt="" class="img-responsive">
                    </div>
                    <!-- Client Item End -->
                    <!-- Client Item Start -->
                    <div class="item" data-id="2">
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/testimonial-img/02.jpg'; ?>" alt="" class="img-responsive">
                    </div>
                    <!-- Client Item End -->
                    <!-- Client Item Start -->
                    <div class="item" data-id="3">
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/testimonial-img/03.jpg';?>" alt="" class="img-responsive">
                    </div>
                    <!-- Client Item End -->
                </div>
            </div>
            <div class="feedback-slider owl-carousel">
                <!-- Feedback Item Start -->
                <div class="feedback-item">
                    <div class="feedback-comment link-color--child">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum similique ad, magnam, odit repellat reprehenderit. Consequatur consectetur aspernatur ad assumenda a. Aspernatur fugit numquam quod rerum sint facere ex ullam. A, blanditiis quod, tempore magni veniam perferendis aliquid vitae saepe.</p>
                    </div>
                    <div class="feedback-info">
                        <span class="feedback-name">Mohammad Al Omayer,</span>
                        <span class="feedback-role">Company</span>
                    </div>
                </div>
                <!-- Feedback Item End -->
                <!-- Feedback Item Start -->
                <div class="feedback-item">
                    <div class="feedback-comment link-color--child">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum similique ad, magnam, odit repellat reprehenderit. Consequatur consectetur aspernatur ad assumenda a. Aspernatur fugit numquam quod rerum sint facere ex ullam. A, blanditiis quod, tempore magni veniam perferendis aliquid vitae saepe.</p>
                    </div>
                    <div class="feedback-info">
                        <span class="feedback-name">Mohammad Al Omayer,</span>
                        <span class="feedback-role">Company</span>
                    </div>
                </div>
                <!-- Feedback Item End -->
                <!-- Feedback Item Start -->
                <div class="feedback-item">
                    <div class="feedback-comment link-color--child">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum similique ad, magnam, odit repellat reprehenderit. Consequatur consectetur aspernatur ad assumenda a. Aspernatur fugit numquam quod rerum sint facere ex ullam. A, blanditiis quod, tempore magni veniam perferendis aliquid vitae saepe.</p>
                    </div>
                    <div class="feedback-info">
                        <span class="feedback-name">Mohammad Al Omayer,</span>
                        <span class="feedback-role">Company</span>
                    </div>
                </div>
                <!-- Feedback Item End -->
            </div>
        </div>
        <!-- Feedback Area End -->
        <!-- Subscribe Area Start -->
        <div id="subscribe" data-bg-img="<?php echo plugin_dir_url( __FILE__ ) . 'img/subscribe-bg/subscribe-bg.jpg'; ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h2>subscribe to get our newsletter</h2>
                        <!-- Subscribe Form Start -->
                        <div data-form-validation="true">
                            <form action="http://themelooks.us12.list-manage.com/subscribe/post?u=50e1e21235cbd751ab4c1ebaa&amp;id=ac81d988e4" method="post" name="mc-embedded-subscribe-form" target="_blank" id="subscribeForm" novalidate="novalidate">
                                <input type="text" value="" name="EMAIL" placeholder="Enter your email address" class="input-box" required>
                                <input type="submit" value="Subscribe" class="submit-button btn-green">
                            </form>
                        </div>
                        <!-- Subscribe Form End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribe Area End -->
        <!-- Blog Area Start -->
        <div id="blog">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span>latest post</span>recent blog post</h2>
                </div>
                <!-- Section Title End -->
                <div class="row res-col">
                    <div class="col-md-4">
                        <!-- Post Item Start -->
                        <div class="post-item">
                            <!-- Post Image Start -->
                            <div class="post-image">
                                <a href="#"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/blog-img/recent-post-1.jpg'; ?>" alt="" class="img-responsive"></a>
                            </div>
                            <!-- Post Image End -->
                            <!-- Post Content Start -->
                            <div class="post-content">
                                <h2 class="title"><a href="#">Lorem ipsum dolor</a></h2>
                                <p class="meta">By <a href="#">Admin</a> in <a href="#">Category</a> at <a href="#">Feb 16, 2016</a></p>
                                <div class="summery">
                                    <p>Lorem ipsum dolor sit amet, consectetur elit. Consequatur delectus voluptatum, eius? Impedit natus iure, cumque ipsa architecto laborum corporis eius sed.</p>
                                </div>
                                <div class="footer clearfix">
                                    <a href="#"><i class="fa fa-angle-double-right"></i> Read More</a>
                                    <a href="#" class="pull-right"><i class="fa fa-comments-o"></i> 2 Comments</a>
                                </div>
                            </div>
                            <!-- Post Content End -->
                        </div>
                        <!-- Post Item End -->
                    </div>
                    <div class="col-md-4">
                        <!-- Post Item Start -->
                        <div class="post-item">
                            <!-- Post Image Start -->
                            <div class="post-image">
                                <a href="#"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/blog-img/recent-post-2.jpg'; ?>" alt="" class="img-responsive"></a>
                            </div>
                            <!-- Post Image End -->
                            <!-- Post Content Start -->
                            <div class="post-content">
                                <h2 class="title"><a href="#">Lorem ipsum dolor</a></h2>
                                <p class="meta">By <a href="#">Admin</a> in <a href="#">Category</a> at <a href="#">Feb 16, 2016</a></p>
                                <div class="summery">
                                    <p>Lorem ipsum dolor sit amet, consectetur elit. Consequatur delectus voluptatum, eius? Impedit natus iure, cumque ipsa architecto laborum corporis eius sed.</p>
                                </div>
                                <div class="footer clearfix">
                                    <a href="#"><i class="fa fa-angle-double-right"></i> Read More</a>
                                    <a href="#" class="pull-right"><i class="fa fa-comments-o"></i> 2 Comments</a>
                                </div>
                            </div>
                            <!-- Post Content End -->
                        </div>
                        <!-- Post Item End -->
                    </div>
                    <div class="col-md-4">
                        <!-- Post Item Start -->
                        <div class="post-item">
                            <!-- Post Image Start -->
                            <div class="post-image">
                                <a href="#"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/blog-img/recent-post-3.jpg'; ?>" alt="" class="img-responsive"></a>
                            </div>
                            <!-- Post Image End -->
                            <!-- Post Content Start -->
                            <div class="post-content">
                                <h2 class="title"><a href="#">Lorem ipsum dolor</a></h2>
                                <p class="meta">By <a href="#">Admin</a> in <a href="#">Category</a> at <a href="#">Feb 16, 2016</a></p>
                                <div class="summery">
                                    <p>Lorem ipsum dolor sit amet, consectetur elit. Consequatur delectus voluptatum, eius? Impedit natus iure, cumque ipsa architecto laborum corporis eius sed.</p>
                                </div>
                                <div class="footer clearfix">
                                    <a href="#"><i class="fa fa-angle-double-right"></i> Read More</a>
                                    <a href="#" class="pull-right"><i class="fa fa-comments-o"></i> 2 Comments</a>
                                </div>
                            </div>
                            <!-- Post Content End -->
                        </div>
                        <!-- Post Item End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->
        <div class="copyright">
            <div class="container">
                <p>Copyright 2017 &copy; <a href="#">OrDomain</a>. All Rights Reserved.</p>
            </div>
        </div>
        <div class="back-to-top">
            <button><i class="fa fa-angle-up"></i></button>
        </div>
    </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new MYEW_Preview_Template_Widget());