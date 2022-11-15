<?php
class Elementor_Hubspot_Form_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hubspot_form_widget';
	}

	public function get_title() {
		return esc_html__( 'Hubspot Form Widget', 'hubspot-form-elementor' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'hubspot', 'form' ];
	}

    protected function register_controls() {
		// Content Tab Start
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'hubspot-form-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'formId',
			[
				'label' => esc_html__( 'Form ID', 'hubspot-form-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'noid', 'hubspot-form-elementor' ),
			]
		);

        $this->add_control(
			'region',
			[
				'label' => esc_html__( 'Region', 'hubspot-form-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'na1', 'hubspot-form-elementor' ),
			]
		);

        $this->add_control(
			'portalId',
			[
				'label' => esc_html__( 'Portal ID', 'hubspot-form-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'noportal', 'hubspot-form-elementor' ),
			]
		);

		$this->end_controls_section();
		// Content Tab End
	}


	protected function render() {
        $settings = $this->get_settings_for_display();
		?>

        <!--[if lte IE 8]>
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
        <![endif]-->
        <script defer onload="hsformwidget_createForm()" charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
        <script>
            function hsformwidget_createForm() {
                console.log("Generated HS form");
                hbspt.forms.create({
                    region: "<?php echo $settings['region'] ?>",
                    portalId: "<?php echo $settings['portalId'] ?>",
                    formId: "<?php echo $settings['formId'] ?>",
                });
            }
        </script>

        <?php
    }
}
