<?php


class Elementor_Team_Member_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Blank widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'blank_widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Blank widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'Blank Widget', 'ebe' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Blank widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'fa fa-code';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Blank widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

	

	/**
	 * Register Blank widget content ontrols.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'team_member' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Title', 'team_member' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'team_member' ),
				
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => esc_html__( 'Description', 'team_member' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Default Description', 'team_member' ),
				
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'team_member' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'name',
			[
				'label' => esc_html__( 'Name', 'team_member' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Name' , 'team_member' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'designation',
			[
				'label' => esc_html__( 'Designation', 'team_member' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Name' , 'team_member' ),
				'label_block' => true,
			]
		);

		

		$this->add_control(
			'teams',
			[
				'label' => esc_html__( 'Repeater List', 'team_member' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();

	}
	/**
	 * Render Blank widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings   = $this->get_settings_for_display();
		$heading= $settings['heading'];
		$heading_description= $settings['heading_description'];
		$teams= $this->get_settings_for_display('teams');
		
		
		 ?>
         <section class="fdb-block team-1">
      <div class="container">
        <div class="row text-center justify-content-center">
          <div class="col-8">
            <h1><?php echo esc_html($settings['heading']); ?></h1>
            <p class="lead"><?php echo esc_html($settings['heading_description']); ?></p>
          </div>
        </div>
    
        <div class="row-50"></div> 
        <div class="row">
		<?php
		 if($heading){
			foreach($teams as $team){
				?>
			<div class="col-sm-3 text-left">
            <div class="fdb-box p-0">
              <img alt="image" class="img-fluid rounded-0" src="<?php echo $team['image']['url']; ?>">
              <div class="content p-3">
                <h3><strong><?php echo esc_html($team['name']); ?></strong></h3>
                <p><?php echo esc_html($team['designation']); ?></p>
              </div>
            </div>
          </div>
			<?php
			}
		 } 
		  ?>
        </div>
      </div>
    </section>
     

		<?php
	}

	/**
	 * Render Blank widget output on the frontend.
	 *
	 * Written in JS and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
	
	}

}